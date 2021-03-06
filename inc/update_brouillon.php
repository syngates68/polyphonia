<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['enregistrer_modifications']))
{
    $titre = (!empty($_POST['titre'])) ? $_POST['titre'] : NULL;
    $contenu = (!empty($_POST['contenu'])) ? $_POST['contenu'] : NULL;
    $illustration = (req_by_id($_GET['id'])['illustration'] != NULL && req_by_id($_GET['id'])['illustration'] != '') ? req_by_id($_GET['id'])['illustration'] : NULL;
    $tags = (!empty($_POST['tags'])) ? $_POST['tags'] : NULL;
    $nom_photographe = (!empty($_POST['nom_photographe'])) ? $_POST['nom_photographe'] : NULL;
    $lien_photo = (!empty($_POST['lien_photo'])) ? $_POST['lien_photo'] : NULL;

    if ($illustration == NULL || (isset($_FILES['illustration']) && $_FILES['illustration']['error'] == 0))
    {
        $rep = upload_image($_FILES['illustration']);

        if (substr($rep[0], 0, 1) == '1')
        {
            if ($illustration != NULL)
                unlink('../'.$illustration);
            $illustration = $rep[1];
        }
    }

    update_brouillon($titre, $contenu, str_replace('../', '', $illustration), $_GET['id'], $tags, $nom_photographe, $lien_photo);

    $_SESSION['succes'] = 'Votre brouillon a bien été sauvegardé.';
    header('Location:'.BASEURL.'brouillon/'.$_GET['id'].'.html');
}

if (isset($_POST['valider_brouillon']))
{
    if (isset($_POST['titre']) && !empty($_POST['titre']))
    {
        if (isset($_POST['contenu']) && !empty($_POST['contenu']))
        {
            $illustration = (req_by_id($_GET['id'])['illustration'] != NULL && req_by_id($_GET['id'])['illustration'] != '') ? req_by_id($_GET['id'])['illustration'] : NULL;
            $msg = '';
            
            if ($illustration == NULL || (isset($_FILES['illustration']) && $_FILES['illustration']['error'] == 0))
            {
                $rep = upload_image($_FILES['illustration']);

                if (substr($rep[0], 0, 1) == '0')
                    $msg = substr($rep[0], 1);
                else
                    $illustration = $rep[1];
            }

            if ($msg == '')
            {
                valider_brouillon($_POST['titre'], $_POST['contenu'], $illustration, $_GET['id'], $_POST['tags'], $_POST['nom_photographe'], $_POST['lien_photo']);
                            
                $_SESSION['succes'] = 'Votre projet <B>'.$_POST['titre'].'</B> a bien été ajouté.';
                header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
            }
            else
            {
                $_SESSION['erreur'] = $msg;
                header('Location:'.BASEURL.'brouillon/'.$_GET['id'].'.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = 'Le contenu est obligatoire.';
            header('Location:'.BASEURL.'brouillon/'.$_GET['id'].'.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = 'Le titre est obligatoire.';
        header('Location:'.BASEURL.'brouillon/'.$_GET['id'].'.html');
    }
}