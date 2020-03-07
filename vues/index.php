
    <?php
    if (file_exists('vues/'.$var_page.'.php'))
    {
    ?>
        <nav>
            <div class="logo_polyphonia">
                <img src="<?= BASEURL ?>assets/img/logo_orange.png">
                <a href="<?= BASEURL ?>">Polyphonia</a>
            </div>
            <div class="nav_liens">
                <a class="actif" href="<?= BASEURL ?>">Accueil</a>
                <a href="<?= BASEURL ?>blog.html">Blog</a>
                <a href="<?= BASEURL ?>forum.html">Forum</a>
                <a href="<?= BASEURL ?>contact.html">Contact</a>
                <?php if (isset($_SESSION['utilisateur'])) : ?>
                    <a href="<?= BASEURL ?>administration.html">Administration</a>
                    <a href="<?= BASEURL ?>deconnexion.html">Déconnexion</a>
                <?php endif; ?>
            </div>
        </nav>
        <div class="container">
    <?php
        include($var_page.'.php');
    ?>
        </div>
    <?php
    }
    else
        include('404.php');
    ?>