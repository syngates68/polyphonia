
    <?php
    if (file_exists('vues/'.$var_page.'.php'))
    {
    ?>
        <nav>
            <div class="logo_polyphonia">
                <img src="<?= BASEURL ?>assets/img/logo.png">
                <a href="<?= BASEURL ?>">Polyphonia</a>
            </div>
            <div class="nav_liens">
                <a href="<?= BASEURL ?>">Accueil</a>
                <a href="<?= BASEURL ?>blog.html">Blog</a>
                <a href="<?= BASEURL ?>forum.html">Forum</a>
                <a href="<?= BASEURL ?>contact.html">Contact</a>
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