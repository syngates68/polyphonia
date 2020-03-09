
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
                    <a href="#" id="dropdown"><i class="material-icons">person</i><?= req_nom_utilisateur($_SESSION['utilisateur']); ?></a>
                    <div class="dropdown">
                        <div class="dropdown_lien">
                            <a href="<?= BASEURL ?>administration.html"><i class="material-icons">account_circle</i>Administration</a>
                        </div>
                        <div class="dropdown_lien">
                            <a href="<?= BASEURL ?>deconnexion.html"><i class="material-icons">power_settings_new</i>Déconnexion</a>
                        </div>
                    </div>
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