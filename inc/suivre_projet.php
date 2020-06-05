<?php
session_start();

if (isset($_SESSION['utilisateur']))
{

}
else
{
    echo 'nope';
}