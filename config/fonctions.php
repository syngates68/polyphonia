<?php

include('database.php');

function db()
{
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=polyphonia;charset=utf8', USERNAME, PASSWORD);
    }
    catch(PDOException $e){
        print "Erreur : ". $e->getMessage()."<br/>";
        die();
    }

    return $bdd;
}

function req_liste_projets()
{
    $req = db()->query("SELECT * FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur");
    $req->execute();

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function req_by_slug($slug)
{
    $req = db()->prepare("SELECT * FROM projets p LEFT JOIN utilisateurs u ON u.id = p.id_redacteur WHERE p.slug = ?");
    $req->execute([$slug]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

function formate_date($date)
{
    return date("d/m/Y", strtotime($date)); 
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
