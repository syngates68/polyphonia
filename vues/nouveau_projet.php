<h1>Ajouter un nouveau projet</h1>

<div class="nouveau_projet">
    <form method="POST" enctype="multipart/form-data">
        <div class="form_ligne">
            <div class="form_col">
                <label>Titre</label>
                <input type="text" name="titre">
            </div>
            <div class="form_col">
                <input type="file" name="illustration">
            </div>
        </div>
        <label>Contenu</label>
        <textarea name="contenu"></textarea>
        <button type="submit" name="ajouter_projet">Ajouter</button>
    </form>
</div>

<?php 

if (isset($_POST['ajouter_projet']))
{
    if (isset($_POST['titre']) && !empty($_POST['titre']))
    {
        if (isset($_POST['contenu']) && !empty($_POST['contenu']))
        {
            $max_size = 1000000;
            $types = array('image/jpg', 'image/png', 'image/jpeg');
            $fichier_temp = $_FILES['illustration']['tmp_name'];
        
            $name = $_FILES['illustration']['name'];
            $type = $_FILES['illustration']['type'];
            $size = $_FILES['illustration']['size'];
            $dossier = 'assets/img/';
        
            if(in_array($type, $types))
            {
                if ($type == 'image/jpg')
                    $type = '.jpg';
        
                if ($type == 'image/png')
                    $type = '.png';
        
                if ($type == 'image/jpeg')
                    $type = '.jpeg';
        
                if ($type == 'image/gif')
                    $type = '.gif';
        
                if($size < $max_size)
                {
                    $char = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        
                    $string = '';
                    for($j = 0; $j < 9; $j++)
                    {
                        $string .= $char[rand(0, strlen($char)-1)];
                    }
        
                    $nom_fichier = $string.$type;
                    $url = $dossier.$nom_fichier;
        
                    if(move_uploaded_file($fichier_temp, $url))
                    {
                        ajouter_projet($_POST['titre'], $_POST['contenu'], $url);
                    }
                    else
                    {
                        echo 'Erreur innatendue';
                    }
                }
                else
                {
                    echo 'Erreur taille fichier';
                }
            }
            else
            {
                echo 'Erreur type de fichier';
            }
        }
        else
        {
            echo 'Contenu vide';
        }
    }
    else
    {
        echo 'Titre vide';
    }
}