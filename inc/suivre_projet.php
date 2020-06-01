<?php
session_start();

if (isset($_SESSION['utilisateur']))
{

}
else
{
    $_SESSION['redirect'] = $_POST['href'];
    echo 'nope';
}