<div class="container">
    <h1>Projet introuvable</h1>
    <div class="projet_introuvable">
        <p>Nous n'avons malheureusement pas pu trouver le projet correspondant à l'adresse demandée.</p>
        <img src="<?= BASEURL; ?>assets/img/sad.gif">
        <p>Peut-être trouverez-vous une idée de projet intéressant en naviguant sur <a href="<?= BASEURL; ?>">Polyphonia</a>?</p>
        <p>Ou recherchez un projet qui vous plaît grâce à la barre de recherche ci-dessous!</p>
        <div class="recherche_projet">
            <form method="GET" action="<?= BASEURL ?>recherche/">
                <input type="text" class="recherche" name="search" placeholder="Rechercher un projet">
                <button type="submit"><span class="material-icons">search</span></button>
            </form>
        </div>
    </div>
</div>