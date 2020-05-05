<?php
session_start();

include('../config/config.php');
include('../config/fonctions.php');

if (isset($_POST['inscription']))
{
    if (champs_non_vides([$_POST['email'], $_POST['nom_utilisateur'], $_POST['pass'], $_POST['pass2']]))
    {
        if (isset($_POST['cgu']))
        {
            if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
            {
                if ($_POST['pass'] == $_POST['pass2'])
                {
                    if (verifie_nom_utilisateur($_POST['nom_utilisateur']) == 0)
                    {
                        if (verifie_email($_POST['email']) == 0)
                        {
                            //Code de confirmation
                            $code = '';

                            for ($i = 0; $i < 4; $i++)
                            {
                                $code .= rand(0, 9);
                            }

                            //Message de bienvenue aux nouveaux membres
                            $message = "Bienvenue sur Polyphonia ".$_POST['nom_utilisateur']." j'espère que tu trouveras ton bonheur sur le site.
                            Ce message est un message automatique envoyé aux nouveaux membres lors de leur inscription, si tu découvres le site et que tu as besoin d'aide, n'hésite pas à me contacter je me ferais un plaisir de te guider afin que tu puisses avoir la meilleure expérience possible sur le site.
                            Merci d'avoir rejoint l'aventure,<br/>
                            Quentin.";
                            ajouter_utilisateur($_POST['email'], $_POST['nom_utilisateur'], $_POST['pass'], $code);
                            ajoute_messagerie(1, req_utilisateur_by_nom_utilisateur($_POST['nom_utilisateur'])['id']);
                            ajouter_message(req_id_messagerie(1, req_utilisateur_by_nom_utilisateur($_POST['nom_utilisateur'])['id']), 1, req_utilisateur_by_nom_utilisateur($_POST['nom_utilisateur'])['id'], $message);
                            
                            //Envoi du mail de confirmation
                            envoi_mail('inscription', $_POST['email'], ['nom_utilisateur' => $_POST['nom_utilisateur'], 'code' => $code]);
                            $_SESSION['nom_utilisateur'] = $_POST['nom_utilisateur'];
                            header('Location:'.BASEURL.'confirmation.html');
                        }
                        else
                        {
                            $_SESSION['_email'] = $_POST['email'];
                            $_SESSION['_nom_utilisateur'] = $_POST['nom_utilisateur'];
                            $_SESSION['_pass'] = $_POST['pass'];
                            $_SESSION['_pass2'] = $_POST['pass2'];
                            $_SESSION['erreur'] = "Cette adresse mail n'est pas disponible.";
                            header('Location:'.BASEURL.'inscription.html');
                        }
                    }
                    else
                    {
                        $_SESSION['_email'] = $_POST['email'];
                        $_SESSION['_nom_utilisateur'] = $_POST['nom_utilisateur'];
                        $_SESSION['_pass'] = $_POST['pass'];
                        $_SESSION['_pass2'] = $_POST['pass2'];
                        $_SESSION['erreur'] = "Ce nom d'utilisateur n'est pas disponible.";
                        header('Location:'.BASEURL.'inscription.html');
                    }
                }
                else
                {
                    $_SESSION['_email'] = $_POST['email'];
                    $_SESSION['_nom_utilisateur'] = $_POST['nom_utilisateur'];
                    $_SESSION['_pass'] = $_POST['pass'];
                    $_SESSION['_pass2'] = $_POST['pass2'];
                    $_SESSION['erreur'] = "Les deux mots de passe doivent être identiques.";
                    header('Location:'.BASEURL.'inscription.html');
                }
            }
            else
            {
                $_SESSION['_email'] = $_POST['email'];
                $_SESSION['_nom_utilisateur'] = $_POST['nom_utilisateur'];
                $_SESSION['_pass'] = $_POST['pass'];
                $_SESSION['_pass2'] = $_POST['pass2'];
                $_SESSION['erreur'] = "L'adresse mail doit être au format correct abc@domaine.com.";
                header('Location:'.BASEURL.'inscription.html');
            }
        }
        else
        {
            $_SESSION['_email'] = $_POST['email'];
            $_SESSION['_nom_utilisateur'] = $_POST['nom_utilisateur'];
            $_SESSION['_pass'] = $_POST['pass'];
            $_SESSION['_pass2'] = $_POST['pass2'];
            $_SESSION['erreur'] = "Vous devez accepter les Conditions Générales d'Utilisation pour vous inscrire.";
            header('Location:'.BASEURL.'inscription.html');
        }
    }
    else
    {
        $_SESSION['_email'] = $_POST['email'];
        $_SESSION['_nom_utilisateur'] = $_POST['nom_utilisateur'];
        $_SESSION['_pass'] = $_POST['pass'];
        $_SESSION['_pass2'] = $_POST['pass2'];
        $_SESSION['erreur'] = "Tous les champs sont obligatoires.";
        header('Location:'.BASEURL.'inscription.html');
    }
}