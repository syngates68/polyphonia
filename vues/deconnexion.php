<?php
session_destroy();
setcookie('auth', '', time() - 3600, '/', '', false, true);

header('Location:'.BASEURL);