<?php
if (isset($_GET['slug']) && is_numeric($_GET['slug']))
{
    if (count_sujet_by_id($_GET['slug']))
    {
        $sujet = req_sujet_by_id($_GET['slug']);
    ?>
        <div class="container sujet_container">
            <?php if ($sujet['resolu'] == 1) : ?>
                <div class="succes">Ce sujet a été résolu</div>
            <?php endif; ?>
            <div class="post_sujet">
                <div class="content">
                    <div class="content_top">
                        <div class="avatar_container">
                            <img src="<?= BASEURL; ?><?= $sujet['avatar']; ?>">
                        </div>
                        <div class="description">
                            <div class="informations">
                                <div class="titre"><?= $sujet['titre']; ?></div>
                                <div class="infos">Sujet ouvert par <a href="<?= BASEURL; ?>utilisateur/<?= $sujet['nom_utilisateur']; ?>.html"><?= $sujet['nom_utilisateur']; ?></a> le <?= formate_date($sujet['date_sujet']); ?></div>
                            </div>
                            <?php if (isset($_SESSION['utilisateur'])) : ?>
                                <div class="actions">
                                    <?php if ($_SESSION['utilisateur'] != $sujet['id_utilisateur']) : ?>
                                        <button class="btn btn-outline-blue">Suivre</button>
                                    <?php elseif ($_SESSION['utilisateur'] == $sujet['id_utilisateur'] && $sujet['resolu'] == 0) : ?>
                                        <button class="btn btn-green-light sujet_resolu" sujet="<?= $_GET['slug']; ?>">Résolu</button>
                                    <?php else : ?>
                                        <button class="btn btn-red sujet_non_resolu" sujet="<?= $_GET['slug']; ?>">Non Résolu</button>
                                    <?php endif; ?>
                                    <span class="signaler">Signaler</span>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <p class="contenu"><?= nl2br($sujet['contenu']); ?></p>
                </div>
            </div>
            <div class="nbr_reponses"><?= count_reponses_by_sujet($_GET['slug']); ?> <?= (count_reponses_by_sujet($_GET['slug']) > 1) ? "réponses" : "réponse"; ?></div>
            <?php if (count_reponses_by_sujet($_GET['slug']) > 0) : ?>
                <?php foreach (req_reponses_by_sujet($_GET['slug']) as $reponse) : ?>
                    <div class="reponse_sujet" id="reponse_sujet_<?= $reponse['id']; ?>">
                        <div class="reponse_top">
                            <div class="avatar_container">
                                <img src="<?= BASEURL; ?><?= $reponse['avatar']; ?>">
                            </div>
                            <div class="informations">
                                <div class="infos">par <a href="<?= BASEURL; ?>utilisateur/<?= $reponse['nom_utilisateur']; ?>.html"><?= $reponse['nom_utilisateur']; ?></a> le <?= formate_date_heure($reponse['date_post']); ?></div>
                                <span class="signaler">Signaler</span>
                            </div>
                        </div>
                        <div class="reponse">
                            <?= $reponse['contenu']; ?>
                        </div>
                        <div class="votes">
                <span id="good_<?= $reponse['id']; ?>" class="material-icons <?php if (isset($_SESSION['utilisateur'])) : ?> good <?php endif; ?> <?php if(isset($_SESSION['utilisateur']) && req_note_by_utilisateur_reponse($reponse['id'], $_SESSION['utilisateur']) == 1) : ?> actif <?php endif; ?>">thumb_up</span>
                            <span id="note_<?= $reponse['id']; ?>"><?= req_note_by_reponse($reponse['id']); ?></span>
                            <span id="bad_<?= $reponse['id']; ?>" class="material-icons <?php if (isset($_SESSION['utilisateur'])) : ?> bad <?php endif; ?> <?php if(isset($_SESSION['utilisateur']) && req_note_by_utilisateur_reponse($reponse['id'], $_SESSION['utilisateur']) == '-1') : ?> actif <?php endif; ?>">thumb_down</span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <?php if ($sujet['resolu'] == 0) : ?>
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
                    <button type="submit" class="btn btn-blue">Répondre</button>
                </form>
            </div>
            <?php endif; ?>
        </div>
        <script src="<?= BASEURL; ?>assets/js/aide.js"></script>
        <script>
            CKEDITOR.replace('reponse', {
                height: 200
            });
        </script>
    <?php
    }
    else
        echo "Toujours rien";
}
else
    echo "Hoho, j'ai rien trouvé!";