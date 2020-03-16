<?php

include('database.php');

function req_liste_projets($page, $nbr_par_page, $admin = false, $recherche = NULL)
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

    $sql = "SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.brouillon, p.date_ajout, p.date_sauvegarde, p.slug, p.vues, p.tags, u.nom_utilisateur FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur".$where." ORDER BY p.id DESC".$limit;

    $req = db()->prepare($sql);
    
    if ($recherche != NULL)
        $req->execute([":recherche" => "%".$recherche."%"]);
    else
        $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_nbr_pages($nbr_par_page, $recherche = NULL)
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

function count_nbr_projets($recherche = NULL)
{
    $where = ' WHERE brouillon = 0 AND actif = 1';

    if ($recherche != NULL)
        $where .= ' AND CONCAT(titre, " ", contenu) LIKE :recherche';


    $count = db()->prepare("SELECT COUNT(*) FROM projets".$where);
    if ($recherche != NULL)
        $count->execute([":recherche" => "%".$recherche."%"]);
    else
        $count->execute();

    return $count->fetch(PDO::FETCH_NUM)[0];
}

function req_by_slug($slug)
{
    $req = db()->prepare("SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.date_ajout, p.slug, p.tags, u.nom_utilisateur FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur WHERE p.slug = ?");
    $req->execute([$slug]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

function count_by_slug($slug)
{
    $req = db()->prepare("SELECT COUNT(*) FROM projets WHERE slug = ?");
    $req->execute([$slug]);

    return $req->fetch(PDO::FETCH_NUM)[0];
}

function formate_date($date)
{
    return date("d/m/Y", strtotime($date)); 
}

function formate_date_heure($date)
{
    return date("d/m/Y à H:i:s", strtotime($date)); 
}

function extrait_texte($texte, $slug, $longueur, $id_projet)
{
    if (strlen($texte) <= $longueur)
        return $texte;
    
    $texte = substr($texte, 0, $longueur);
    $espace = strrpos($texte, ' ');

    if ($espace > 0)
        $texte = substr($texte, 0, $espace);

    return $texte.'...<br/><a class="btn_lire_projet" projet="'.$id_projet.'" href="'.BASEURL.'projet/'.$slug.'.html">En savoir plus</a>';
}

function slugify($string, $delimiter = '-') {
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

function ajouter_projet($titre, $contenu, $id_utilisateur, $illustration, $tags)
{
    $slug = slugify($titre);

    $ins = db()->prepare('INSERT INTO projets(titre, contenu, illustration, id_redacteur, slug, tags) VALUES (?, ?, ?, ?, ?, ?)');
    $ins->execute([$titre, $contenu, $illustration, $id_utilisateur, $slug, $tags]);
}

function brouillon_projet($titre, $contenu, $illustration, $id_utilisateur, $tags)
{
    $date_sauvegarde = date("Y-m-d H:i:s");

    $ins = db()->prepare('INSERT INTO projets(titre, contenu, id_redacteur, illustration, brouillon, date_sauvegarde, tags) VALUES (?, ?, ?, ?, 1, ?, ?)');
    $ins->execute([$titre, $contenu, $id_utilisateur, $illustration, $date_sauvegarde, $tags]);
}

function req_by_id($id_projet)
{
    $req = db()->prepare("SELECT * FROM projets WHERE id = ?");
    $req->execute([$id_projet]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

function update_vues($id_projet, $vues)
{
    $upd = db()->prepare("UPDATE projets SET vues = ? WHERE id = ?");
    $upd->execute([$vues, $id_projet]);
}

function check_connexion($nom_utilisateur)
{
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE nom_utilisateur = ?');
    $req->execute([$nom_utilisateur]);

    if ($req->rowCount() > 0)
        return $req->fetchAll(PDO::FETCH_ASSOC)[0];
    else
        return 0;
}

function update_projet($titre, $contenu, $id, $illustration, $tags)
{
    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, tags = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $tags, $id]);
}

function update_brouillon($titre, $contenu, $illustration, $id, $tags)
{
    $date_sauvegarde = date("Y-m-d H:i:s");

    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, date_sauvegarde = ?, tags = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $date_sauvegarde, $tags, $id]);
}

function valider_brouillon($titre, $contenu, $illustration, $id, $tags)
{
    $slug = slugify($titre);

    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, slug = ?, brouillon = 0, tags = ? WHERE id = ?');
    $upd->execute([$titre, utf8_encode($contenu), $illustration, $slug, $tags, $id]);
}

function req_nom_utilisateur($id)
{
    $req = db()->prepare('SELECT nom_utilisateur FROM utilisateurs WHERE id = ?');
    $req->execute([$id]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nom_utilisateur'];
}

function req_utilisateur_by_id($id)
{
    $req = db()->prepare('SELECT * FROM utilisateurs WHERE id = ?');
    $req->execute([$id]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

function upload_image($fichier)
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

function remettre_brouillon($id)
{
    $upd = db()->prepare('UPDATE projets SET brouillon = 1 WHERE id = ?');
    $upd->execute([$id]);
}

function supprimer_projet($id)
{
    $upd = db()->prepare('UPDATE projets SET actif = 0 WHERE id = ?');
    $upd->execute([$id]);
}


function req_rang($id)
{
    $req = db()->prepare('SELECT rang FROM utilisateurs WHERE id = ?');
    $req->execute([$id]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['rang'];
}

function update_avatar($avatar, $id)
{
    $upd = db()->prepare('UPDATE utilisateurs SET avatar = ? WHERE id = ?');
    $upd->execute([$avatar, $id]);
}