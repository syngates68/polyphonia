<nav>
    <div class="logo_polyphonia">
        <img src="./assets/img/logo.png">
        <a href="./">Polyphonia</a>
    </div>
    <div class="nav_liens">
        <a href="./">Accueil</a>
        <a href="blog.html">Blog</a>
        <a href="forum.html">Forum</a>
        <a href="contact.html">Contact</a>
    </div>
</nav>
<div class="container">
    <?php
    if (file_exists('vues/'.$var_page.'.php'))
        include($var_page.'.php');
    else
        include('404.php');
    ?>
</div>
