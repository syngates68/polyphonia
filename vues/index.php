
    <?php
    if (file_exists('vues/'.$var_page.'.php'))
    {
    ?>
        <nav>
            <div class="nav_content">
                <div class="logo_polyphonia">
                    <img src="<?= BASEURL ?>assets/img/logo_orange.png">
                    <a href="<?= BASEURL ?>">Polyphonia</a>
                </div>
                <div class="nav_liens">
                    <a class="actif" href="<?= BASEURL ?>">Accueil</a>
                    <a href="<?= BASEURL ?>blog.html">Blog</a>
                    <a href="<?= BASEURL ?>forum.html">Forum</a>
                    <a href="<?= BASEURL ?>contact.html">Contact</a>
                    <?php if (!isset($_SESSION['utilisateur'])) : ?>
                        <a href="<?= BASEURL ?>connexion.html" class="btn_connexion">Connexion</a>
                    <?php else : ?>
                        <a href="#" id="dropdown"><img class="avatar" src="<?= BASEURL; ?><?= req_utilisateur_by_id($_SESSION['utilisateur'])['avatar']; ?>"></a>
                        <div class="dropdown">
                            <?php if (req_rang($_SESSION['utilisateur']) == 'admin') : ?>
                            <div class="dropdown_lien">
                                <i class="material-icons">how_to_reg</i>
                                <a href="<?= BASEURL ?>administration.html">Administration</a>
                            </div>
                            <?php endif; ?>
                            <div class="dropdown_lien">
                                <i class="material-icons">account_circle</i>
                                <a href="<?= BASEURL ?>mon_compte.html"><B><?= req_utilisateur_by_id($_SESSION['utilisateur'])['nom_utilisateur']; ?></B></a>
                            </div>
                            <div class="dropdown_lien">
                                <i class="material-icons">power_settings_new</i>
                                <a href="<?= BASEURL ?>deconnexion.html">Déconnexion</a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </nav>
        <div class="site_content">
            <?php
                include($var_page.'.php');
            ?>
        </div>
    <?php
    }
    else
        include('404.php');
    ?>