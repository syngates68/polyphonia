<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['ajouter_projet']))
{
    if (isset($_POST['titre']) && !empty($_POST['titre']))
    {
        if (isset($_POST['contenu']) && !empty($_POST['contenu']))
        {
            $max_size = 1000000;
            $types = array('image/jpg', 'image/png', 'image/jpeg');
            $fichier_temp = $_FILES['illustration']['tmp_name'];
        
            $name = $_FILES['illustration']['name'];
            $type = $_FILES['illustration']['type'];
            $size = $_FILES['illustration']['size'];
            $dossier = '../assets/img/';
        
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
                    {
                        ajouter_projet($_POST['titre'], $_POST['contenu'], $_SESSION['utilisateur'], str_replace('../', '', $url));
                        
                        $_SESSION['succes'] = 'Votre projet <B>'.$_POST['titre'].'</B> a bien été ajouté.';
                        header('Location:'.BASEURL.'nouveau_projet.html');
                    }
                    else
                    {
                        $_SESSION['erreur'] = 'Une erreur innatendue s\'est produite durant le téléchargement de votre image.';
                        header('Location:'.BASEURL.'nouveau_projet.html');
                    }
                }
                else
                {
                    $_SESSION['erreur'] = 'L\'illustration choisie est trop lourde.';
                    header('Location:'.BASEURL.'nouveau_projet.html');
                }
            }
            else
            {
                $_SESSION['erreur'] = 'L\'illustration doit être au format PNG, JPG ou JPEG.';
                header('Location:'.BASEURL.'nouveau_projet.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = 'Le contenu est obligatoire.';
            header('Location:'.BASEURL.'nouveau_projet.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = 'Le titre est obligatoire.';
        header('Location:'.BASEURL.'nouveau_projet.html');
    }
}

if (isset($_POST['enregistrer_brouillon']))
{

    $titre = (!empty($_POST['titre'])) ? $_POST['titre'] : NULL;
    $contenu = (!empty($_POST['contenu'])) ? $_POST['contenu'] : NULL;
    $illustration = NULL;

    if ($_FILES['illustration']['error'] == 0)
    {
        $max_size = 1000000;
        $types = array('image/jpg', 'image/png', 'image/jpeg');
        $fichier_temp = $_FILES['illustration']['tmp_name'];
    
        $name = $_FILES['illustration']['name'];
        $type = $_FILES['illustration']['type'];
        $size = $_FILES['illustration']['size'];
        $dossier = '../assets/img/';
        
        if(in_array($type, $types) && $size < $max_size)
        {
            if ($type == 'image/jpg')
                $type = '.jpg';
    
            if ($type == 'image/png')
                $type = '.png';
    
            if ($type == 'image/jpeg')
                $type = '.jpeg';
    
            if ($type == 'image/gif')
                $type = '.gif';

            $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
            $string = '';
            for($j = 0; $j < 9; $j++)
            {
                $string .= $char[rand(0, strlen($char)-1)];
            }
    
            $nom_fichier = $string.$type;
            $illustration = $dossier.$nom_fichier;
    
            move_uploaded_file($fichier_temp, $illustration);
        }
    }

    brouillon_projet($titre, $contenu, str_replace('../', '', $illustration), $_SESSION['utilisateur']);
                        
    $_SESSION['succes'] = 'Votre projet <B>'.$_POST['titre'].'</B> a bien été enregistré en brouillon.';
    header('Location:'.BASEURL.'nouveau_projet.html');
}