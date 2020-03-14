<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['editer_projet']))
{
    if (isset($_POST['titre']) && !empty($_POST['titre']))
    {
        if (isset($_POST['contenu']) && !empty($_POST['contenu']))
        {
            $msg = '';
            $illustration = req_by_id($_GET['id'])['illustration'];

            if ($_FILES['illustration']['error'] == 0)
            {
                $rep = upload_image($_FILES['illustration']);

                if (substr($rep[0], 0, 1) == '0')
                    $msg = substr($rep[0], 1);
                else
                {
                    unlink('../'.$illustration);
                    $illustration = $rep[1];
                }
            }

            if ($msg == '')
            {
                update_projet($_POST['titre'], $_POST['contenu'], $_GET['id'], str_replace('../', '', $illustration), $_POST['tags']);
    
                $_SESSION['succes'] = "Le projet a bien été édité";
                header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
            }
            else
            {
                $_SESSION['erreur'] = $msg;
                header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
            }
        }
        else
        {
            $_SESSION['erreur'] = 'Le contenu est obligatoire.';
            header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
        }
    }
    else
    {
        $_SESSION['erreur'] = 'Le titre est obligatoire.';
        header('Location:'.BASEURL.'editer_projet/'.$_GET['id'].'.html');
    }
}