<?php
if (isset($_GET['slug']) && is_numeric($_GET['slug']))
{
    if (count_sujet_by_id($_GET['slug']))
    {
        $sujet = req_sujet_by_id($_GET['slug']);
        $tmp = '';
        if ($sujet['resolu'] == 1)
            $tmp = 'Résolu - ';
        if ($sujet['ouvert'] == 0)
            $tmp = 'Fermé - ';

        $page_title = $tmp.$sujet['titre'];
    ?>
        <div class="container sujet_container">
            <h1 class="titre_sujet"><?= $sujet['titre']; ?></h1>
            <?php 
            //Message de succès après signalement
            if (isset($_SESSION['succes'])) : 
            ?>
                <div class="succes succes_vanishing">
                    <?= $_SESSION['succes']; ?>
                </div>
            <?php 
            unset($_SESSION['succes']);
            endif;
            
            //Message de sujet résolu
            if ($sujet['resolu'] == 1) : ?>
                <div class="succes">Ce sujet a été résolu.</div>
            <?php
            endif;

            //Message de sujet fermé
            if ($sujet['ouvert'] == 0) : ?>
                <div class="erreur">Ce sujet a été fermé.</div>
            <?php 
            endif; 
            ?>

            <div class="post_sujet">
                <div class="content">
                    <div class="content_top">
                        <div class="avatar_container">
                            <img class="avatar" src="<?= BASEURL; ?><?= $sujet['avatar']; ?>">
                        </div>
                        <div class="description">
                            <div class="infos">
                                Sujet ouvert par <a href="<?= BASEURL; ?>utilisateur/<?= $sujet['nom_utilisateur']; ?>.html"><?= $sujet['nom_utilisateur']; ?></a> 
                                <p class="date_post"><?= ecart_date($sujet['date_sujet']); ?></p>
                            </div>
                        </div>
                    </div>
                    <div class="contenu"><?= nl2br($sujet['contenu']); ?></div>
                    <?php if (isset($_SESSION['utilisateur']) && $sujet['ouvert'] == 1) : ?>
                        <div class="content_footer">
                            <?php if ($_SESSION['utilisateur'] != $sujet['id_utilisateur'] && $sujet['resolu'] == 0) : ?>
                                <!--<button class="btn btn-outline-blue">Suivre</button>-->
                            <?php elseif ($_SESSION['utilisateur'] == $sujet['id_utilisateur'] && $sujet['resolu'] == 0) : ?>
                                <div class="action">
                                    <span class="material-icons">done</span>
                                    <a class="sujet_resolu" sujet="<?= $_GET['slug']; ?>" href="#">Résolu</a>
                                </div>
                            <?php elseif ($_SESSION['utilisateur'] == $sujet['id_utilisateur'] && $sujet['resolu'] == 1) : ?>
                                <div class="action">
                                    <span class="material-icons">cancel</span>
                                    <a class="sujet_non_resolu" sujet="<?= $_GET['slug']; ?>" href="#">Non Résolu</a>
                                </div>
                            <?php endif; ?>

                            <?php if ((req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 1 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 2 || req_utilisateur_by_id($_SESSION['utilisateur'])['id_droit'] == 3) && $sujet['resolu'] == 0) : ?>
                                <div class="action">
                                    <span class="material-icons">cancel</span>
                                    <a id="fermer_<?= $_GET['slug']; ?>" class="fermer" href="#">Fermer le sujet</a>
                                </div>
                            <?php endif; ?>
                            <?php if ($_SESSION['utilisateur'] != $sujet['id_utilisateur']) : ?>
                                <div class="action">
                                    <span class="material-icons">format_quote</span>
                                    Citer
                                </div>
                                <div class="action">
                                    <span class="material-icons">error</span>
                                    <a href="<?= BASEURL; ?>inc/signaler_sujet?id_sujet=<?= $_GET['slug']; ?>" rel="modal:open" class="signaler">Signaler</a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div class="nbr_reponses"><?= count_reponses_by_sujet($_GET['slug']); ?> <?= (count_reponses_by_sujet($_GET['slug']) > 1) ? "réponses" : "réponse"; ?></div>
            <?php if (count_reponses_by_sujet($_GET['slug']) > 0) : ?>
                <?php foreach (req_reponses_by_sujet($_GET['slug']) as $reponse) : ?>
                    <div class="reponse_sujet" id="reponse_sujet_<?= $reponse['id']; ?>">
                        <div class="content">
                            <div class="reponse_top">
                                <div class="avatar_container">
                                    <img class="avatar" src="<?= BASEURL; ?><?= ($reponse['avatar'] != NULL) ? $reponse['avatar'] : 'assets/utilisateurs/default.jpg'; ?>">
                                </div>
                                <div class="infos">
                                    <?php if ($reponse['nom_utilisateur'] != NULL) : ?>
                                        <a href="<?= BASEURL; ?>utilisateur/<?= $reponse['nom_utilisateur']; ?>.html"><?= $reponse['nom_utilisateur']; ?></a>
                                    <?php else : ?>
                                        compte supprimé
                                    <?php endif; ?>
                                    <?php if ($reponse['rang'] == 'superadmin' || $reponse['rang'] == 'admin' || $reponse['rang'] == 'moderateur') : ?>
                                        <span class="badge_rang">
                                            <?= $reponse['libelle_site']; ?>
                                        </span>
                                    <?php endif; ?>
                                    <p class="date_post"><?= ecart_date($reponse['date_post']); ?> <?php if ($reponse['modifie'] == 1) : ?> - Modifié <?php endif; ?></p>
                                </div>
                            </div>
                            <div class="div_reponse" id="div_reponse_<?= $reponse['id']; ?>">
                                <div class="reponse">
                                    <?= $reponse['contenu']; ?>
                                </div>
                                <div class="votes">
                                    <span id="good_<?= $reponse['id']; ?>" class="material-icons <?php if (isset($_SESSION['utilisateur'])) : ?> good <?php endif; ?> <?php if(isset($_SESSION['utilisateur']) && req_note_by_utilisateur_reponse($reponse['id'], $_SESSION['utilisateur']) == 1) : ?> actif <?php endif; ?>">thumb_up</span>
                                    <span id="note_<?= $reponse['id']; ?>"><?= req_note_by_reponse($reponse['id']); ?></span>
                                    <span id="bad_<?= $reponse['id']; ?>" class="material-icons <?php if (isset($_SESSION['utilisateur'])) : ?> bad <?php endif; ?> <?php if(isset($_SESSION['utilisateur']) && req_note_by_utilisateur_reponse($reponse['id'], $_SESSION['utilisateur']) == '-1') : ?> actif <?php endif; ?>">thumb_down</span>
                                </div>

                                <?php if (isset($_SESSION['utilisateur'])) : ?>
                                    <div class="content_footer">
                                        <?php if ($_SESSION['utilisateur'] != $reponse['id_utilisateur']) : ?>
                                            <div class="action">
                                                <span class="material-icons">format_quote</span>
                                                Citer
                                            </div>
                                            <div class="action">
                                                <span class="material-icons">error</span>
                                                <a href="<?= BASEURL; ?>inc/signaler_reponse?id_reponse=<?= $reponse['id']; ?>" rel="modal:open" class="signaler signaler_reponse">Signaler</a>
                                            </div>
                                        <?php else : ?>
                                            <div class="action">
                                                <span class="material-icons">create</span>
                                                <a href="#" id="modifier_reponse_<?= $reponse['id']; ?>" show="1" class="modifier">Modifier</a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="div_modifier_reponse" id="div_modifier_reponse_<?= $reponse['id']; ?>">
                                <div class="erreur"></div>
                                <textarea name="contenu_reponse" id="contenu_reponse_<?= $reponse['id']; ?>"></textarea>
                                <div class="ligne_button">
                                    <button class="btn btn-blue valider_modification" id="valider_modification_<?= $reponse['id']; ?>">Modifier</button>
                                    <button class="btn btn-outline-red annuler_modification" show="0" id="annuler_modification_<?= $reponse['id']; ?>">Annuler</button>
                                </div>
                                <script>
                                    CKEDITOR.replace('contenu_reponse_<?= $reponse['id']; ?>', {
                                        height: 200
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($sujet['resolu'] == 0 && $sujet['ouvert'] == 1) : ?>
                <?php if (isset($_SESSION['utilisateur'])) : ?>
                    <div class="form_reponse">
                        <div class="erreur" style="display:none;"></div>
                        <form>
                            <div class="form_ligne">
                                <label>Votre réponse</label>
                                <textarea name="reponse" id="reponse"></textarea>
                            </div>
                            <input type="hidden" name="utilisateur" value="<?= $_SESSION['utilisateur']; ?>">
                            <input type="hidden" name="sujet" value="<?= $_GET['slug']; ?>">
                            <input type="hidden" name="posteur" value="<?= $sujet['id_utilisateur']; ?>">
                            <div class="button_ligne">
                                <button type="submit" class="btn btn-blue">Répondre</button>
                            </div>
                        </form>
                    </div>
                    <script>
                        CKEDITOR.replace('reponse', {
                            height: 200
                        });
                    </script>
                <?php else : ?>
                    <div class="connectez_vous">
                        Afin de répondre à ce sujet, veuillez <a href="<?= BASEURL; ?>connexion.html">vous connecter</a>.
                    </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
        <!-- Modal de signalement -->
        <div id="signaler" class="modal modal_signaler">
        </div>
        <script src="<?= BASEURL; ?>assets/js/aide.js"></script>
        <script>
            $(document).ready(function()
            {
                var ancre = window.location.hash
                if (ancre != '')
                    $(ancre).css('background', '#ff00004d')
            })
        </script>
    <?php
    }
    else
        echo "Toujours rien";
}
else
    echo "Hoho, j'ai rien trouvé!";