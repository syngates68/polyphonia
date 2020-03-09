<?php

include('database.php');

function req_liste_projets($admin = false)
{
    $where = '';

    if (!$admin)
        $where = ' WHERE p.brouillon = 0';

    $req = db()->query("SELECT p.id as id_projet, p.titre, p.contenu, p.illustration, p.brouillon, p.date_ajout, p.date_sauvegarde, p.slug, p.vues, u.nom_utilisateur FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur".$where." ORDER BY p.id DESC");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function count_nbr_projets()
{
    $count = db()->query("SELECT COUNT(*) FROM projets WHERE brouillon = 0");
    $count->execute();

    return $count->fetch(PDO::FETCH_NUM)[0];
}

function req_by_slug($slug)
{
    $req = db()->prepare("SELECT * FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur WHERE p.slug = ?");
    $req->execute([$slug]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0];
}

function formate_date($date)
{
    return date("d/m/Y", strtotime($date)); 
}

function formate_date_heure($date)
{
    return date("d/m/Y à H:i:s", strtotime($date)); 
}

function extrait_texte($texte, $longueur)
{
    if (strlen($texte) <= $longueur)
        return $texte;
    
    $texte = substr($texte, 0, $longueur);
    $espace = strrpos($texte, ' ');

    if ($espace > 0)
        $texte = substr($texte, 0, $espace);

    return $texte.'...';
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

function ajouter_projet($titre, $contenu, $id_utilisateur, $illustration)
{
    $slug = slugify($titre);

    $ins = db()->prepare('INSERT INTO projets(titre, contenu, illustration, id_redacteur, slug) VALUES (?, ?, ?, ?, ?)');
    $ins->execute([$titre, $contenu, $illustration, $id_utilisateur, $slug]);
}

function brouillon_projet($titre, $contenu, $illustration, $id_utilisateur)
{
    $date_sauvegarde = date("Y-m-d H:i:s");

    $ins = db()->prepare('INSERT INTO projets(titre, contenu, id_redacteur, illustration, brouillon, date_sauvegarde) VALUES (?, ?, ?, ?, 1, ?)');
    $ins->execute([$titre, $contenu, $id_utilisateur, $illustration, $date_sauvegarde]);
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

function update_projet($titre, $contenu, $id)
{
    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $id]);
}

function update_brouillon($titre, $contenu, $illustration, $id)
{
    $date_sauvegarde = date("Y-m-d H:i:s");

    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, date_sauvegarde = ? WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $date_sauvegarde, $id]);
}

function valider_brouillon($titre, $contenu, $illustration, $id)
{
    $slug = slugify($titre);

    $upd = db()->prepare('UPDATE projets SET titre = ?, contenu = ?, illustration = ?, slug = ?, brouillon = 0 WHERE id = ?');
    $upd->execute([$titre, $contenu, $illustration, $slug, $id]);
}

function req_nom_utilisateur($id)
{
    $req = db()->prepare('SELECT nom_utilisateur FROM utilisateurs WHERE id = ?');
    $req->execute([$id]);

    return $req->fetchAll(PDO::FETCH_ASSOC)[0]['nom_utilisateur'];
}