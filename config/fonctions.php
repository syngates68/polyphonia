<?php

include('database.php');

require dirname(__DIR__).'/vendor/autoload.php';
/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;*/

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

    $sql = "SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.brouillon, p.date_ajout, p.date_sauvegarde, p.slug, p.vues, p.tags, p.nom_photographe, p.lien_photo, u.nom_utilisateur FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur".$where." ORDER BY p.id DESC".$limit;

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
 * req_by_slug
 * 
 * @param string $slug
 * 
 * @return array
 */
function req_by_slug(string $slug)
{
    $req = db()->prepare("SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.date_ajout, p.slug, p.tags, p.nom_photographe, p.lien_photo, u.nom_utilisateur, u.avatar FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur WHERE p.slug = ?");
    $req->execute([$slug]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
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
    $req = db()->prepare("SELECT * FROM projets WHERE id = ?");
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
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE (nom_utilisateur = :login OR email = :login) AND supprime = 0');
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
 * 
 * @return void
 */
function update_projet(string $titre, string $contenu, int $id, string $illustration, ?string $tags, ?string $nom_photographe, ?string $lien_photo)
{
    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, tags = ?, nom_photographe = ?, lien_photo = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $tags, $nom_photographe, $lien_photo, $id]);
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
function desactive_compte(string $date_desactivation, int $motif_suppression, int $id)
{
    $sql = 'UPDATE utilisateurs SET actif = 0, date_desactive = ?, motif_supprime = ? WHERE id = ?';

    $upd = db()->prepare($sql);
    $upd->execute([$date_desactivation, $motif_suppression, $id]);
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
 * 
 * @return void
 */
function ajouter_utilisateur(string $email, string $nom_utilisateur, string $pass)
{
    $ins = db()->prepare('INSERT INTO utilisateurs(email, nom_utilisateur, pass, derniere_connexion, rang) VALUES(?, ?, ?, ?, "externe")');
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
    $req = db()->prepare('SELECT * FROM utilisateurs');
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/*function get_mail()
{
    define('MAIL_HOST', 'localhost');
    define('MAIL_SMTPAUTH', false);
    define('MAIL_SMTPSECURE', null);
    define('MAIL_PORT', 1025);
    define('SMTP_DEBUG', 1);

    $mail = new PHPMailer(true);

    $mail->CharSet = 'UTF-8';
    $mail->isMail();
    $mail->isHTML(true);
    $mail->SMTPDebug = SMTP_DEBUG;
    $mail->Host = MAIL_HOST;
    $mail->SMTPAuth = MAIL_SMTPAUTH;                       
    $mail->SMTPSecure = MAIL_SMTPSECURE;                            
    $mail->Port = MAIL_PORT;
    $mail->setFrom("quentin.schifferle@gmail.com", "Polyphonia");

    return $mail;
}

function mail_nouvelle_suggestion($nom_utilisateur, $email)
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