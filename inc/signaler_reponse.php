<h2>Signaler une réponse</h2>
<input type="hidden" name="id_type" value="<?= $_GET['id_reponse']; ?>">
<input type="hidden" name="type" value="reponse">
<div class="erreur" style="display:none;"></div>
<p>Vous êtes sur le point de signaler cette réponse.</p>
<p>Veuillez indiquer ci-dessous le motif de votre signalement.</p>
<input type="text" name="motif">
<button class="btn btn-outline-blue signaler">Envoyer</button>