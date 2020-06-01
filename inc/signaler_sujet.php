<h2>Signaler un sujet</h2>
<input type="hidden" name="id_type" value="<?= $_GET['id_sujet']; ?>">
<input type="hidden" name="type" value="sujet">
<div class="erreur" style="display:none;"></div>
<p>Vous êtes sur le point de signaler ce sujet.</p>
<p>Veuillez indiquer ci-dessous le motif de votre signalement.</p>
<input type="text" name="motif">
<button class="btn btn-outline-blue signaler">Envoyer</button>