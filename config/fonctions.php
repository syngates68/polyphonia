<?php
include('database.php');

require dirname(__DIR__).'/vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * req_liste_projets
 * 
 * @param null|int $page
 * @param null|int $nbr_par_page
 * @param bool $admin
 * @param null|string $recherche
 * 
 * @return array
 */
function req_liste_projets(?int $page, ?int $nbr_par_page, bool $admin = false, ?string $recherche = NULL)
{
    $where = '';
    $limit = '';

    if ($page != NULL)
    {
        $offset = ($page - 1) * $nbr_par_page;
        $limit = ' LIMIT '.$nbr_par_page.' OFFSET '.$offset;
    }

    if (!$admin)
        $where .= ' WHERE p.brouillon = 0';

    if ($recherche != NULL)
    {
        if ($where != '')
            $where .= ' AND';
        else
            $where .= ' WHERE';

        $where .= ' CONCAT(p.titre, " ", p.contenu, " ", p.tags) LIKE :recherche';
    }

    if ($where == '')
        $where .= ' WHERE';
    else
        $where .= ' AND';
        
    $where .= ' p.actif = 1';

    $sql = "SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.brouillon, p.date_ajout, p.date_sauvegarde, p.date_update, p.slug, p.vues, p.tags, p.nom_photographe, p.lien_photo, u.nom_utilisateur FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur".$where." ORDER BY p.id DESC".$limit;

    $req = db()->prepare($sql);
    
    if ($recherche != NULL)
        $req->execute([":recherche" => "%".$recherche."%"]);
    else
        $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * req_nbr_pages
 * 
 * @param int $nbr_par_page
 * @param null|string $recherche
 * 
 * @return int
 */
function req_nbr_pages(int $nbr_par_page, ?string $recherche = NULL)
{
    $where = ' WHERE brouillon = 0 AND actif = 1';

    if ($recherche != NULL)
        $where .= ' AND CONCAT(titre, " ", contenu, " ", tags) LIKE :recherche';

    $nbr = db()->prepare('SELECT COUNT(*) FROM projets'.$where);

    if ($recherche != NULL)
        $nbr->execute([":recherche" => "%".$recherche."%"]);
    else
        $nbr->execute();

    $nbr = $nbr->fetch(PDO::FETCH_NUM)[0];

    return ceil($nbr/$nbr_par_page);
}

/**
 * count_nbr_projets
 * 
 * @param null|string $recherche
 * 
 * @return int
 */
function count_nbr_projets(?string $recherche = NULL)
{
    $where = ' WHERE brouillon = 0 AND actif = 1';

    if ($recherche != NULL)
        $where .= ' AND CONCAT(titre, " ", contenu, " ", tags) LIKE :recherche';


    $count = db()->prepare("SELECT COUNT(*) FROM projets".$where);
    if ($recherche != NULL)
        $count->execute([":recherche" => "%".$recherche."%"]);
    else
        $count->execute();

    return $count->fetch(PDO::FETCH_NUM)[0];
}

/**
 * count_by_slug
 *
 * @param string $slug
 * 
 * @return array
 */
function count_by_slug(string $slug)
{
    $req = db()->prepare("SELECT COUNT(*) FROM projets WHERE slug = ?");
    $req->execute([$slug]);

    return $req->fetch(PDO::FETCH_NUM)[0];
}

/**
 * count_by_id
 *
 * @param int $id
 * 
 * @return array
 */
function count_by_id(int $id)
{
    $req = db()->prepare("SELECT COUNT(*) FROM projets WHERE id = ? AND brouillon = 0 AND actif = 1");
    $req->execute([$id]);

    return $req->fetch(PDO::FETCH_NUM)[0];
}

/**
 * formate_date
 *
 * @param string $date
 * 
 * @return string
 */
function formate_date(string $date)
{
    return date("d/m/Y", strtotime($date)); 
}

/**
 * formate_date_heure
 *
 * @param string $date
 * 
 * @return string
 */
function formate_date_heure(string $date)
{
    return date("d/m/Y à H:i:s", strtotime($date)); 
}

/**
 * extrait_texte
 *
 * @param string $texte
 * @param int $longueur
 * 
 * @return string
 */
function extrait_texte(string $texte, int $longueur)
{
    if (strlen($texte) <= $longueur)
        return $texte;
    
    $texte = substr($texte, 0, $longueur);
    $espace = strrpos($texte, ' ');

    if ($espace > 0)
        $texte = substr($texte, 0, $espace);

    return $texte.'...';
}

/**
 * slugify
 *
 * @param string $string
 * @param string $delimiter
 * 
 * @return string
 */
function slugify(string $string, string $delimiter = '-') 
{
	$oldLocale = setlocale(LC_ALL, '0');
	setlocale(LC_ALL, 'en_US.UTF-8');
	$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
	$clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
	$clean = strtolower($clean);
	$clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
	$clean = trim($clean, $delimiter);
	setlocale(LC_ALL, $oldLocale);
	return $clean;
}

/**
 * ajouter_projet
 *
 * @param string $titre
 * @param string $contenu
 * @param int $id_utilisateur
 * @param string $illustration
 * @param null|string $tags
 * @param null|string $nom_photographe
 * @param null|string $lien_photo
 * 
 * @return void
 */
function ajouter_projet(string $titre, string $contenu, int $id_utilisateur, string $illustration, ?string $tags, ?string $nom_photographe, ?string $lien_photo)
{
    $slug = slugify($titre);

    $ins = db()->prepare('INSERT INTO projets(titre, contenu, illustration, id_redacteur, slug, tags, nom_photographe, lien_photo) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
    $ins->execute([$titre, $contenu, $illustration, $id_utilisateur, $slug, $tags, $nom_photographe, $lien_photo]);
}

/**
 * brouillon_projet
 *
 * @param null|string $titre
 * @param null|string $contenu
 * @param null|string $illustration
 * @param int $id_utilisateur
 * @param null|string $tags
 * @param null|string $nom_photographe
 * @param null|string $lien_photo
 * 
 * @return void
 */
function brouillon_projet(?string $titre, ?string $contenu, ?string $illustration, int $id_utilisateur, ?string $tags, ?string $nom_photographe, ?string $lien_photo)
{
    $date_sauvegarde = date("Y-m-d H:i:s");

    $ins = db()->prepare('INSERT INTO projets(titre, contenu, id_redacteur, illustration, brouillon, date_sauvegarde, tags, nom_photographe, lien_photo) VALUES (?, ?, ?, ?, 1, ?, ?, ?, ?)');
    $ins->execute([$titre, $contenu, $id_utilisateur, $illustration, $date_sauvegarde, $tags, $nom_photographe, $lien_photo]);
}

/**
 * req_by_id
 *
 * @param int $id_projet
 * 
 * @return array
 */
function req_by_id(int $id_projet)
{
    $req = db()->prepare("SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.brouillon, p.date_ajout, p.date_update, p.slug, p.vues, p.tags, p.nom_photographe, p.lien_photo, u.nom_utilisateur, u.avatar, u2.nom_utilisateur as utilisateur_update FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur LEFT JOIN utilisateurs u2 ON u2.id = p.id_update WHERE p.id = ?");
    $req->execute([$id_projet]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

/**
 * update_vues
 *
 * @param int $id_projet
 * @param int $vues
 * 
 * @return void
 */
function update_vues(int $id_projet, int $vues)
{
    $upd = db()->prepare("UPDATE projets SET vues = ? WHERE id = ?");
    $upd->execute([$vues, $id_projet]);
}

/**
 * check_connexion
 *
 * @param string $login
 * 
 * @return int|array
 */
function check_connexion(string $login)
{
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE (nom_utilisateur = :login OR email = :login) AND supprime = 0 AND confirm = 1');
    $req->execute(['login' => $login]);

    if ($req->rowCount() > 0)
        return $req->fetchAll(PDO::FETCH_ASSOC)[0];
    else
        return 0;
}

/**
 * update_projet
 *
 * @param string $titre
 * @param string $contenu
 * @param int $id
 * @param string $illustration
 * @param null|string $tags
 * @param null|string $nom_photographe
 * @param null|string $lien_photo
 * @param string $date_updaye
 * @param int $id_update
 * 
 * @return void
 */
function update_projet(string $titre, string $contenu, int $id, string $illustration, ?string $tags, ?string $nom_photographe, ?string $lien_photo, string $date_update, int $id_update)
{
    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, tags = ?, nom_photographe = ?, lien_photo = ?, date_update = ?, id_update = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $tags, $nom_photographe, $lien_photo, $date_update, $id_update, $id]);
}

/**
 * update_brouillon
 *
 * @param null|string $titre
 * @param null|string $contenu
 * @param null|string $illustration
 * @param int $id
 * @param null|string $tags
 * @param null|string $nom_photographe
 * @param null|string $lien_photo
 * 
 * @return void
 */
function update_brouillon(?string $titre, ?string $contenu, ?string $illustration, int $id, ?string $tags, ?string $nom_photographe, ?string $lien_photo)
{
    $date_sauvegarde = date("Y-m-d H:i:s");

    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, date_sauvegarde = ?, tags = ?, nom_photographe = ?, lien_photo = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $date_sauvegarde, $tags, $nom_photographe, $lien_photo, $id]);
}

/**
 * valider_brouillon
 *
 * @param string $titre
 * @param string $contenu
 * @param string $illustration
 * @param int $id
 * @param null|string $tags
 * @param null|string $nom_photographe
 * @param null|string $lien_photo
 * 
 * @return void
 */
function valider_brouillon(string $titre, string $contenu, string $illustration, int $id, ?string $tags, ?string $nom_photographe, ?string $lien_photo)
{
    $slug = slugify($titre);

    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, slug = ?, brouillon = 0, tags = ?, nom_photographe = ?, lien_photo = ? WHERE id = ?');
    $upd->execute([$titre, utf8_encode($contenu), $illustration, $slug, $tags, $nom_photographe, $lien_photo, $id]);
}

/**
 * req_utilisateur_by_id
 *
 * @param int $id
 * 
 * @return array
 */
function req_utilisateur_by_id(int $id)
{
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute([$id]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

/**
 * req_utilisateur_by_nom_utilisateur
 *
 * @param string $nom_utilisateur
 * 
 * @return array
 */
function req_utilisateur_by_nom_utilisateur(string $nom_utilisateur)
{
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE nom_utilisateur = ?');
    $req->execute([$nom_utilisateur]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

function count_utilisateur_by_nom_utilisateur($nom_utilisateur)
{
    $req = db()->prepare('SELECT COUNT(*) as nb FROM utilisateurs WHERE nom_utilisateur = ?');
    $req->execute([$nom_utilisateur]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

/**
 * upload_image
 *
 * @param array $fichier
 * 
 * @return array
 */
function upload_image(array $fichier)
{
    $max_size = 1000000;
    $types = array('image/jpg', 'image/png', 'image/jpeg');
    $fichier_temp = $fichier['tmp_name'];

    $type = $fichier['type'];
    $size = $fichier['size'];
    $dossier = '../assets/projets/';

    $msg = '';

    if(in_array($type, $types))
    {
        if ($type == 'image/jpg')
            $type = '.jpg';

        if ($type == 'image/png')
            $type = '.png';

        if ($type == 'image/jpeg')
            $type = '.jpeg';

        if ($type == 'image/gif')
            $type = '.gif';

        if($size < $max_size)
        {
            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

            $string = '';
            for($j = 0; $j < 9; $j++)
            {
                $string .= $char[rand(0, strlen($char)-1)];
            }

            $nom_fichier = $string.$type;
            $url = $dossier.$nom_fichier;

            if(move_uploaded_file($fichier_temp, $url))
                $msg = '1';
            else
                $msg = '0Une erreur innatendue s\'est produite durant le téléchargement de votre image.';
        }
        else
            $msg = '0L\'illustration choisie est trop lourde.';
    }
    else
        $msg = '0L\'illustration doit être au format PNG, JPG ou JPEG.';

    return [$msg, $url];
}

/**
 * remettre_brouillon
 *
 * @param int $id
 * 
 * @return void
 */
function remettre_brouillon(int $id)
{
    $upd = db()->prepare('UPDATE projets SET brouillon = 1 WHERE id = ?');
    $upd->execute([$id]);
}

/**
 * supprimer_projet
 *
 * @param int $id
 * @return void
 */
function supprimer_projet(int $id)
{
    $upd = db()->prepare('UPDATE projets SET actif = 0 WHERE id = ?');
    $upd->execute([$id]);
}

/**
 * update_avatar
 *
 * @param string $avatar
 * @param int $id
 * 
 * @return void
 */
function update_avatar(string $avatar, int $id)
{
    $upd = db()->prepare('UPDATE utilisateurs SET avatar = ? WHERE id = ?');
    $upd->execute([$avatar, $id]);
}

/**
 * update_profil
 *
 * @param string $email
 * @param string $nom_utilisateur
 * @param null|string $bio
 * @param string $id
 * 
 * @return void
 */
function update_profil(string $email, string $nom_utilisateur, ?string $bio, int $id)
{
    $sql = 'UPDATE utilisateurs SET email = :email, nom_utilisateur = :nom_utilisateur, bio = :bio WHERE id = :id';

    $upd = db()->prepare($sql);
    $upd->bindParam(':email', $email);
    $upd->bindParam(':nom_utilisateur', $nom_utilisateur);
    $upd->bindParam(':bio', $bio);
    $upd->bindParam(':id', $id);
    $upd->execute();
}

/**
 * update_mdp
 *
 * @param string $pass
 * @param int $id
 * 
 * @return void
 */
function update_mdp(string $pass, int $id)
{
    $sql = 'UPDATE utilisateurs SET pass = :pass WHERE id = :id';

    $upd = db()->prepare($sql);
    $upd->bindParam(':pass', $pass);
    $upd->bindParam(':id', $id);
    $upd->execute();
}

/**
 * desactive_compte
 *
 * @param string $date_desactivation
 * @param int $motif_suppression
 * @param int $id
 * 
 * @return void
 */
function desactive_compte(string $date_desactivation, int $id)
{
    $sql = 'UPDATE utilisateurs SET actif = 0, date_desactive = ? WHERE id = ?';

    $upd = db()->prepare($sql);
    $upd->execute([$date_desactivation, $id]);
}

/**
 * supprime_compte
 *
 * @param int $motif_suppression
 * @param int $id
 * 
 * @return void
 */
function supprime_compte(int $motif_suppression, int $id)
{
    $sql = 'UPDATE utilisateurs SET email = NULL, nom_utilisateur = NULL, pass = NULL, bio = NULL, rang = NULL, avatar = NULL, supprime = 1, motif_supprime = ? WHERE id = ?';

    $upd = db()->prepare($sql);
    $upd->execute([$motif_suppression, $id]);
}

/**
 * reactive_compte
 *
 * @param int $id
 * 
 * @return void
 */
function reactive_compte(int $id)
{
    $sql = 'UPDATE utilisateurs SET actif = 1, date_desactive = NULL, motif_supprime = NULL WHERE id = ?';

    $upd = db()->prepare($sql);
    $upd->execute([$id]);
}

/**
 * update_derniere_connexion
 *
 * @param string $date_connexion
 * @param int $id
 * 
 * @return void
 */
function update_derniere_connexion(string $date_connexion, int $id)
{
    $upd = db()->prepare('UPDATE utilisateurs SET derniere_connexion = ? WHERE id = ?');
    $upd->execute([$date_connexion, $id]);
}

/**
 * champs_non_vides
 *
 * @param array $champs
 * 
 * @return int
 */
function champs_non_vides(array $champs)
{
    $non_vides = 1;

    for ($i = 0; $i < sizeof($champs); $i++)
    {
        if (empty($champs[$i]) || str_replace(' ', '', $champs[$i]) == '')
        {
            $non_vides = 0;
            break;
        }
    }

    return $non_vides;
}

/**
 * verifie_nom_utilisateur
 *
 * @param string $nom_utilisateur
 * 
 * @return int
 */
function verifie_nom_utilisateur(string $nom_utilisateur)
{
    $req = db()->prepare('SELECT COUNT(*) as nb FROM utilisateurs WHERE nom_utilisateur = ?');
    $req->execute([$nom_utilisateur]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

/**
 * verifie_email
 *
 * @param string $email
 * 
 * @return int
 */
function verifie_email(string $email)
{
    $req = db()->prepare('SELECT COUNT(*) as nb FROM utilisateurs WHERE email = ?');
    $req->execute([$email]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

/**
 * ajouter_utilisateur
 *
 * @param string $email
 * @param string $nom_utilisateur
 * @param string $pass
 * @param string $code
 * 
 * @return void
 */
function ajouter_utilisateur(string $email, string $nom_utilisateur, string $pass, string $code)
{
    $ins = db()->prepare('INSERT INTO utilisateurs(email, nom_utilisateur, pass, derniere_connexion, rang, code_confirm) VALUES(?, ?, ?, ?, "externe", ?)');
    $ins->execute(
    [
        $email,
        $nom_utilisateur,
        password_hash($pass, PASSWORD_BCRYPT),
        date('Y-m-d H:i:s'),
        $code
    ]);

    mkdir('../assets/utilisateurs/'.$nom_utilisateur);
}

/**
 * ajouter_utilisateur_admin
 *
 * @param string $email
 * @param string $nom_utilisateur
 * @param string $pass
 * 
 * @return void
 */
function ajouter_utilisateur_admin(string $email, string $nom_utilisateur, string $pass)
{
    $ins = db()->prepare('INSERT INTO utilisateurs(email, nom_utilisateur, pass, derniere_connexion, rang, confirm) VALUES(?, ?, ?, ?, "admin", 1)');
    $ins->execute(
    [
        $email,
        $nom_utilisateur,
        password_hash($pass, PASSWORD_BCRYPT),
        date('Y-m-d H:i:s')
    ]);

    mkdir('../assets/utilisateurs/'.$nom_utilisateur);
}

/**
 * req_liste_motifs_suppression
 *
 * @return array
 */
function req_liste_motifs_suppression()
{
    $req = db()->prepare('SELECT * FROM motif_suppression');
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * req_liste_utilisateurs
 *
 * @return array
 */
function req_liste_utilisateurs()
{
    $req = db()->prepare('SELECT u.id, u.email, u.nom_utilisateur, u.rang, u.avatar, u.date_inscription, u.derniere_connexion, u.supprime, u.bloque, ms.libelle as motif_suppression FROM utilisateurs u LEFT JOIN motif_suppression ms ON ms.id = u.motif_supprime ORDER BY u.id');
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_liste_utilisateurs_actifs($id_utilisateur)
{
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE supprime = 0 AND actif = 1 AND id != ?');
    $req->execute([$id_utilisateur]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_nbr_messages_non_lus_by_user($id_utilisateur)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM messages WHERE id_reception = $id_utilisateur AND lu = 0");
    $count->execute();

    return $count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

function req_nbr_notifications_non_lus_by_user($id_utilisateur)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM notifications WHERE id_utilisateur = $id_utilisateur AND lu = 0");
    $count->execute();

    return $count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

function ajouter_message($id_messagerie, $id_envoi, $id_reception, $message)
{
    $ins = db()->prepare('INSERT INTO messages(id_messagerie, id_envoi, id_reception, contenu) VALUES (?, ?, ?, ?)');
    $ins->execute([$id_messagerie, $id_envoi, $id_reception, $message]);
}

function req_messages_by_conversation($id_utilisateur_1, $id_utilisateur_2)
{
    $req = db()->prepare("SELECT m.id as id_message, m.id_envoi, m.contenu, m.date_envoi, m.lu, m.date_lecture, u.nom_utilisateur, u.avatar, (SELECT id FROM messages WHERE (id_envoi = $id_utilisateur_1 AND id_reception = $id_utilisateur_2) OR (id_envoi = $id_utilisateur_2 AND id_reception = $id_utilisateur_1) ORDER BY id DESC LIMIT 1) as id_dernier_message FROM messages m LEFT JOIN utilisateurs u ON m.id_envoi = u.id WHERE (m.id_envoi = $id_utilisateur_1 AND m.id_reception = $id_utilisateur_2) OR (m.id_envoi = $id_utilisateur_2 AND m.id_reception = $id_utilisateur_1) ORDER BY m.id DESC");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_messages_by_user($id_utilisateur)
{
    $req = db()->prepare("SELECT ms.id, ms.id_utilisateur_1, ms.id_utilisateur_2, (SELECT contenu FROM messages WHERE id_messagerie = ms.id ORDER BY id DESC LIMIT 1) as dernier_message, (SELECT date_envoi FROM messages WHERE id_messagerie = ms.id ORDER BY id DESC LIMIT 1) as date_dernier_message, (SELECT lu FROM messages WHERE id_messagerie = ms.id ORDER BY id DESC LIMIT 1) as lu, (SELECT id_envoi FROM messages WHERE id_messagerie = ms.id ORDER BY id DESC LIMIT 1) as id_envoi FROM messagerie ms WHERE ms.id_utilisateur_1 = $id_utilisateur OR ms.id_utilisateur_2 = $id_utilisateur ORDER BY (SELECT date_envoi FROM messages WHERE id_messagerie = ms.id ORDER BY id DESC LIMIT 1) DESC");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function count_id_messagerie($id_utilisateur_1, $id_utilisateur_2)
{
    $req = db()->prepare("SELECT COUNT(*) as nb FROM messagerie WHERE (id_utilisateur_1 = $id_utilisateur_1 AND id_utilisateur_2 = $id_utilisateur_2) OR (id_utilisateur_1 = $id_utilisateur_2 AND id_utilisateur_2 = $id_utilisateur_1)");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

function req_id_messagerie($id_utilisateur_1, $id_utilisateur_2)
{
    $req = db()->prepare("SELECT id FROM messagerie WHERE (id_utilisateur_1 = $id_utilisateur_1 AND id_utilisateur_2 = $id_utilisateur_2) OR (id_utilisateur_1 = $id_utilisateur_2 AND id_utilisateur_2 = $id_utilisateur_1)");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
}

function ajoute_messagerie($id_utilisateur_1, $id_utilisateur_2)
{
    $ins = db()->prepare('INSERT INTO messagerie(id_utilisateur_1, id_utilisateur_2) VALUES (?, ?)');
    $ins->execute([$id_utilisateur_1, $id_utilisateur_2]);
}

function set_message_as_lus($id_reception, $id_envoi)
{
    $req = db()->prepare("SELECT * FROM messages WHERE id_envoi = $id_envoi AND id_reception = $id_reception AND lu = 0");
    $req->execute();

    foreach ($req->fetchAll(PDO::FETCH_ASSOC) as $message)
    {
        $upd = db()->prepare("UPDATE messages SET lu = 1, date_lecture = ? WHERE id = ?");
        $upd->execute([date("Y-m-d H:i:s"), $message['id']]);
    }
}

function ajouter_compte_social($type_reseau, $lien, $id_utilisateur)
{
    $upd = db()->prepare("UPDATE utilisateurs SET $type_reseau = ? WHERE id = ?");
    $upd->execute([$lien, $id_utilisateur]);
}

function bloquer_utilisateur($id_utilisateur, $bloque, $motif_bloque)
{
    $upd = db()->prepare("UPDATE utilisateurs SET bloque = ?, motif_bloque = ? WHERE id = ?");
    $upd->execute([$bloque, $motif_bloque, $id_utilisateur]);
}

function ajouter_fichier_projet($id_projet, $chemin_fichier, $nom_fichier)
{
    $ins = db()->prepare("INSERT INTO fichiers_projet(id_projet, chemin_fichier, nom_fichier) VALUES (?, ?, ?)");
    $ins->execute([$id_projet, $chemin_fichier, $nom_fichier]);
}

function req_fichiers_by_projet($id_projet)
{
    $req = db()->prepare("SELECT * FROM fichiers_projet WHERE id_projet = ?");
    $req->execute([$id_projet]);

    if ($req->rowCount() == 0)
        return 0;
    else
        return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

function confirme_compte($id)
{
    $upd = db()->prepare("UPDATE utilisateurs SET confirm = 1 WHERE id = ?");
    $upd->execute([$id]);
}

function req_last_inserted_project()
{
    $req = db()->prepare("SELECT id FROM projets ORDER BY id DESC LIMIT 1");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['id'];
}

function count_sujets_by_projet($id_projet)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM aide_sujet WHERE id_projet = ?");
    $count->execute([$id_projet]);

    return $count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

function req_sujets_by_projet($id_projet)
{
    $req = db()->prepare("SELECT a.id, a.titre_sujet as titre, a.contenu_sujet as contenu, a.date_sujet, a.resolu, u.nom_utilisateur, (SELECT date_post FROM aide_contenu WHERE id_sujet = a.id ORDER BY id DESC LIMIT 1) as date_derniere_reponse, (SELECT u.nom_utilisateur FROM aide_contenu c LEFT JOIN utilisateurs u ON u.id = c.id_utilisateur WHERE c.id_sujet = a.id ORDER BY c.id DESC LIMIT 1) as nom_utilisateur_derniere_reponse, (SELECT COUNT(*) FROM aide_contenu WHERE id_sujet = a.id) as nbr_reponses FROM aide_sujet a LEFT JOIN utilisateurs u ON u.id = a.id_utilisateur WHERE a.id_projet = ? ORDER BY a.id DESC");
    $req->execute([$id_projet]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function ajouter_sujet($titre, $contenu, $id_utilisateur, $id_projet)
{
    $ins = db()->prepare("INSERT INTO aide_sujet(titre_sujet, contenu_sujet, id_utilisateur, id_projet) VALUES(?, ?, ?, ?)");
    $ins->execute([$titre, $contenu, $id_utilisateur, $id_projet]);
}

function count_sujet_by_id($id_sujet)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM aide_sujet WHERE id = ?");
    $count->execute([$id_sujet]);

    return $count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

function req_sujet_by_id($id_sujet)
{
    $count = db()->prepare("SELECT a.titre_sujet as titre, a.contenu_sujet as contenu, a.date_sujet, a.id_utilisateur, a.resolu, u.nom_utilisateur, u.avatar FROM aide_sujet a LEFT JOIN utilisateurs u ON u.id = a.id_utilisateur WHERE a.id = ?");
    $count->execute([$id_sujet]);

    return $count->fetchAll(PDO::FETCH_ASSOC)[0];
}

function count_reponses_by_sujet($id_sujet)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM aide_contenu WHERE id_sujet = ?");
    $count->execute([$id_sujet]);

    return $count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'];
}

function req_reponses_by_sujet($id_sujet)
{
    $req = db()->prepare("SELECT c.id, c.contenu, c.date_post, u.nom_utilisateur, u.avatar FROM aide_contenu c LEFT JOIN utilisateurs u ON u.id = c.id_utilisateur WHERE c.id_sujet = ?");
    $req->execute([$id_sujet]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function ajouter_reponse_sujet($reponse, $id_utilisateur, $id_sujet)
{
    $ins = db()->prepare("INSERT INTO aide_contenu(contenu, id_utilisateur, id_sujet) VALUES (?, ?, ?)");
    $ins->execute([$reponse, $id_utilisateur, $id_sujet]);
}

function req_utilisateurs_sujet($id_sujet)
{
    $req = db()->prepare("(SELECT DISTINCT(id_utilisateur) FROM aide_contenu WHERE id_sujet = :id_sujet) UNION (SELECT id_utilisateur FROM aide_sujet WHERE id = :id_sujet)");
    $req->execute(['id_sujet' => $id_sujet]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function ajouter_notification($id_utilisateur, $contenu, $lien)
{
    $ins = db()->prepare("INSERT INTO notifications(id_utilisateur, contenu, lien_notification) VALUES (?, ?, ?)");
    $ins->execute([$id_utilisateur, $contenu, $lien]);
}

function req_notifications_by_user($id_utilisateur)
{
    $req = db()->prepare("SELECT * FROM notifications WHERE id_utilisateur = ? ORDER BY id DESC");
    $req->execute([$id_utilisateur]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function notification_lu($id_notif)
{
    $upd = db()->prepare("UPDATE notifications SET lu = 1 WHERE id = ?");
    $upd->execute([$id_notif]);
}

function sujet_resolu($id_sujet, $resolu)
{
    $upd = db()->prepare("UPDATE aide_sujet SET resolu = ? WHERE id = ?");
    $upd->execute([$resolu, $id_sujet]);
}

function req_note_by_reponse($id_reponse)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM note_reponse WHERE id_reponse = ?");
    $count->execute([$id_reponse]);

    if ($count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'] == 0)
        return 0;
    
    $req = db()->prepare("SELECT SUM(note) as note FROM note_reponse WHERE id_reponse = ?");
    $req->execute([$id_reponse]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['note'];
}

function req_note_by_utilisateur_reponse($id_reponse, $id_utilisateur)
{
    $count = db()->prepare("SELECT COUNT(*) as nb FROM note_reponse WHERE id_reponse = ? AND id_utilisateur = ?");
    $count->execute([$id_reponse, $id_utilisateur]);

    if ($count->fetchAll(PDO::FETCH_ASSOC)[0]['nb'] == 0)
        return 0;

    $req = db()->prepare("SELECT note FROM note_reponse WHERE id_reponse = ? AND id_utilisateur = ?");
    $req->execute([$id_reponse, $id_utilisateur]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['note'];
}

function ajouter_note($note, $id_reponse, $id_utilisateur)
{
    $ins = db()->prepare("INSERT INTO note_reponse(id_utilisateur, id_reponse, note) VALUES (?, ?, ?)");
    $ins->execute([$id_utilisateur, $id_reponse, $note]);
}

function delete_note($id_reponse, $id_utilisateur)
{
    $del = db()->prepare("DELETE FROM note_reponse WHERE id_reponse = ? AND id_utilisateur = ?");
    $del->execute([$id_reponse, $id_utilisateur]);
}

function envoi_mail($type, $email, $infos)
{
    define('MAIL_HOST', 'smtp.orange.fr');
    define('MAIL_SMTPAUTH', false);
    define('MAIL_SMTPSECURE', 'ssl');
    define('MAIL_PORT', 465);
    define('SMTP_DEBUG', 1);

    $mail = new PHPMailer(true);

    $mail->CharSet = 'UTF-8';
    $mail->isSMTP();
    $mail->isHTML(true);
    $mail->SMTPDebug = SMTP_DEBUG;
    $mail->Host = MAIL_HOST;
    $mail->SMTPAuth = MAIL_SMTPAUTH;                       
    $mail->SMTPSecure = MAIL_SMTPSECURE;                            
    $mail->Port = MAIL_PORT;
    $mail->From = "quentin.schifferle@gmail.com";
    $mail->FromName = "Polyphonia";

    if (DEV)
        $mail->addAddress('quentin.schifferle@gmail.com', "");
    else
        $mail->addAddress($email, "");

    $body = '<body style="font-family: \'Roboto\', sans-serif;font-size:25px;width:660px; padding: 10px;">';
    $body .= '<h1 style="text-align:center;color:#fa940f;">Polyphonia</h1>';
    $body .= '<p>Bonjour '.$infos['nom_utilisateur'].'</p>';
    if ($type == 'inscription')
    {
        $body .= '<p>Nous sommes ravis de vous compter parmis nos membres.</p>';
        $body .= '<p>Afin de confirmer votre inscription, veuillez rentrer le code suivant dans le champs indiqué sur Polyphonia : <B>'.$infos['code'].'</B></p>';
    }
    $body .= '<p>Cordialement,</p>';
    $body .= '<p><strong>L\'équipe administrative de Polyphonia</strong></p>';
    $body .= '</body>';

    try
    {
        if ($type == 'inscription')
        {
            $mail->Subject = "Confirmation d'inscription à Polyphonia";
            $mail->Body = $body;
            $mail->AltBody = "";
            $mail->send();
        }
    }
    catch(Exception $e)
    {
        echo $mail->ErrorInfo;
    }
}

/*function mail_nouvelle_suggestion($nom_utilisateur, $email)
{
    $mail = get_mail();
    $body = '<body style="font-family: \'Roboto\', sans-serif;font-size:15px;width:660px; padding: 10px;">';
    $body .= '<h1 style="text-align: center;">Polyphonia</h1>';
    $body .= '<p>Bonjour '.$nom_utilisateur.'</p>';
    $body .= '<p>Nous avons bien reçu votre suggestion concernant Polyphonia et nous vous en remercions.</p>';
    $body .= '<p>Votre proposition va être étudiée dans les plus brefs délais, et nous reviendrons vers vous si votre idée retient notre attention</p>';
    $body .= '<p>Cordialement,</p>';
    $body .= '<p><strong>L\'équipe administrative de Polyphonia</strong></p>';
    $body .= '</body>';

    try
    {
        $mail->addAddress($email, $nom_utilisateur);
        $mail->Subject = "Nouvelle suggestion d'amélioration";
        $mail->Body = $body;
        $mail->AltBody = "";
        $mail->send();
    }
    catch(Exception $e)
    {
        echo $mail->ErrorInfo;
    }
    
}*/