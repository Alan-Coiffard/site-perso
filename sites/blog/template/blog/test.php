<?php

try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
 
?>
<fieldset>
    <legend><h1>Add a news</h1></legend>
    <form method="post" enctype="multipart/form-data">
        <label for="img">Image</label>
        <input type="hidden" name="MAX_FILE_SIZE" value="100000"/>
        <input type="file" name="img" />
        <br><br>
        <input type="submit" id="bouton" name="ajouter_actualite" value="AJOUTER L' ACTUALIT&Eacute;"/>
    </form> 
</fieldset>

<?php 
    $verif = false;
    if (!empty($_POST)) {
        $image = basename($_FILES['img']['name']);
        $lien = basename($_FILES['img']['tmp_name']);
        echo $image."<br>";
        echo $lien;
        var_dump($_FILES['img']['name']);
        $dossier = 'imgUP';
        $extensions = array('.png', '.gif', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['img']['name'], '.');
         
        if(!in_array($extension, $extensions))
            //Si l'extension n'est pas dans le tableau
        {
            echo "Vous devez uploader un fichier de type png, gif, jpg ou jpeg...<br>";
            $verif = false;
        } else {
            echo "il s'agit bien d'une image !<br>";
            $verif = true;
        }
    }
echo $lien."<br>";
$lien = str_replace ( "\\" , "/" , $lien );
echo $lien."<br>";
echo $lien."/".$image;
    if ($verif == true) {
        if ($extension == '.jpg') {
            $image = imagecreatefromjpeg($lien."/".$image);
            imagejpeg($image, "imgUP/monimage.jpg"); // on enregistre l'image dans le dossier "images"
        }elseif ($extension == '.png') {
            $image = imagecreatefrompng($lien."/".$image);
            imagepng($image, "imgUP/monimage.jpg"); // on enregistre l'image dans le dossier "images"
        }
    }
    
?>
<br>
<img src="imgUP/monimage.jpg">