<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

/**
 * Ajout d'un projet
 */
if (isset($_POST['ajouter_projet']))
{
    if (isset($_POST['titre']) && !empty($_POST['titre']))
    {
        if (isset($_POST['contenu']) && !empty($_POST['contenu']))
        {
            $rep = upload_image($_FILES['illustration']);

            if (substr($rep[0], 0, 1) == 1)
            {
                ajouter_projet($_POST['titre'], $_POST['contenu'], $_SESSION['utilisateur'], str_replace('../', '', $rep[1]), $_POST['tags'], $_POST['nom_photographe'], $_POST['lien_photo']);

                //Vérification des fichiers joints
                if (!empty($_POST['nom_fichier']))
                {
                    if (trim($_POST['nom_fichier']) != '')
                    {
                        if ($_FILES['fichier']['name'] != '')
                        {
                            if (move_uploaded_file($_FILES['fichier']['tmp_name'], '../assets/projets/fichiers/'.req_last_inserted_project().'/'.$_FILES['fichier']['name']))
                            {
                                ajouter_fichier_projet($_GET['id'], 'assets/projets/fichiers/'.req_last_inserted_project().'/'.$_FILES['fichier']['name'], $_POST['nom_fichier']);
                            }
                            else
                            {
                                $_SESSION['erreur'] = "Le fichier ".$_FILES['fichier']['name']." n'a pas pu être uploadé.";
                            }
                        }
                    }
                }
                
                $_SESSION['succes'] = 'Votre projet a bien été ajouté.';
                header('Location:'.BASEURL.'administration.html');
            }
            else
            {
                $_SESSION['erreur'] = substr($rep[0], 1);
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

/**
 * Enregistrement en brouillon
 */
if (isset($_POST['enregistrer_brouillon']))
{

    $titre = (!empty($_POST['titre'])) ? $_POST['titre'] : NULL;
    $contenu = (!empty($_POST['contenu'])) ? $_POST['contenu'] : NULL;
    $illustration = NULL;

    if (isset($_FILES['illustration']) && $_FILES['illustration']['error'] == 0)
    {
        $rep = upload_image($_FILES['illustration']);

        if (substr($rep[0], 0, 1) == '1')
            $illustration = $rep[1];
    }

    brouillon_projet($titre, $contenu, str_replace('../', '', $illustration), $_SESSION['utilisateur'], $_POST['tags'], $_POST['nom_photographe'], $_POST['lien_photo']);
                        
    $_SESSION['succes'] = 'Votre projet a bien été enregistré en brouillon.';
    header('Location:'.BASEURL.'nouveau_projet.html');
}