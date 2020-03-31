<div class="container">
    <h1>Suppression de votre compte</h1>
    <div class="supprime_compte">
        <?php 
        if (isset($_SESSION['erreur'])) :
        ?>
            <div class="erreur">
                <?= $_SESSION['erreur']; ?>
            </div>
        <?php
            endif;
            unset($_SESSION['erreur']);
        ?>
        <form method="POST" action="./inc/supprimer_compte.php">
            <p>Je souhaite :</p>
            <div class="form_ligne cgu">
                <input type="radio" name="type_suppression" id="desactiver_compte" value="0">
                <label for="desactiver_compte">Désactiver temporairement mon compte <span class="avertissement">(Après 2 mois sans connexion il sera supprimé automatiquement)</span></label>
            </div>
            <div class="form_ligne cgu">
                <input type="radio" name="type_suppression" id="supprimer_compte" value="1">
                <label for="supprimer_compte">Supprimer définitivement mon compte</label>
            </div>
            <p>Motif de suppression :</p>
            <div class="form_ligne">
                <select name="motif_suppression">
                    <?php foreach (req_liste_motifs_suppression() as $motif) : ?>
                        <option value="<?= $motif['id']; ?>"><?= $motif['libelle']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <p>Commentaires sur le site :</p>
            <div class="form_ligne cgu">
                <input type="checkbox" name="garder_commentaires" id="garder_commentaires">
                <label for="garder_commentaires">
                    En cochant cette case vous permettez à Polyphonia de conserver vos commentaires sur le site 
                    avec la motion "Utilisateur supprimé", afin que les aides que vous avez pu fournir restent 
                    accessibles. Dans le cas contraire, tous vos commentaires seront supprimés. <span class="avertissement">Les commentaires
                    sont automatiquement gardés en cas de désactivation du compte.</span>
                </label>
            </div>
            <div class="form_ligne">
                <label>Mot de passe</label>
                <input type="password" name="pass">
            </div>
            <button type="submit" name="supprimer_compte">Valider</button>
        </form>
    </div>
</div>