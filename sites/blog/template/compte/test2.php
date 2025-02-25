<?php

function is_session_started()
{
    if ( php_sapi_name() !== 'cli' ) {
        if ( version_compare(phpversion(), '7.4.0', '>=') ) {
            return session_status() === PHP_SESSION_ACTIVE ? TRUE : FALSE;
        } else {
            return session_id() === '' ? FALSE : TRUE;
        }
    }
    return FALSE;
}

// Example
if ( is_session_started() === FALSE ) session_start();
include '../../ouvrirBdd.php';

$_SESSION['imageProfil'] = '';
// Constantes
define('TARGET', 'images/');    // Repertoire cible
define('MAX_SIZE', 10000000);    // Taille max en octets du fichier
define('WIDTH_MAX', 10000);    // Largeur max de l'image en pixels
define('HEIGHT_MAX', 10000);    // Hauteur max de l'image en pixels
 
// Tableaux de donnees
$tabExt = array('jpg','gif','png','jpeg');    // Extensions autorisees
$infosImg = array();
 
// Variables
$extension = '';
$message = '';
$nomImage = '';
 
/************************************************************
 * Creation du repertoire cible si inexistant
 *************************************************************/
if( !is_dir(TARGET) ) {
  if( !mkdir(TARGET, 0755) ) {
    exit('Error: target directory could not be created! Check that you have sufficient rights to do so or create it manually !');
  }
}
 
/************************************************************
 * Script d'upload
 *************************************************************/
if(!empty($_POST))
{
  // On verifie si le champ est rempli
  if( !empty($_FILES['fichier']['name']) )
  {
    // Recuperation de l'extension du fichier
    $extension  = pathinfo($_FILES['fichier']['name'], PATHINFO_EXTENSION);
 
    // On verifie l'extension du fichier
    if(in_array(strtolower($extension),$tabExt))
    {

      // On recupere les dimensions du fichier
      $infosImg = getimagesize($_FILES['fichier']['tmp_name']);
 
      // On verifie le type de l'image
      if($infosImg[2] >= 1 && $infosImg[2] <= 14)
      {
        // On verifie les dimensions et taille de l'image
        if(($infosImg[0] <= WIDTH_MAX) && ($infosImg[1] <= HEIGHT_MAX) && (filesize($_FILES['fichier']['tmp_name']) <= MAX_SIZE))
        {
          // Parcours du tableau d'erreurs
          if(isset($_FILES['fichier']['error']) 
            && UPLOAD_ERR_OK === $_FILES['fichier']['error'])
          {
            // On renomme le fichier
            $nomImage = $_SESSION['login'].".".$extension;

            $filename = TARGET.$_SESSION['login'].".".$extension;

            if(move_uploaded_file($_FILES['fichier']['tmp_name'], TARGET.$nomImage))
            {
              
              $_SESSION['imageProfil'] = TARGET.$nomImage;

              $req = $bdd->prepare('SELECT * FROM compte WHERE login = ?');
              $req->execute(array($_SESSION['login']));
              $donnees = $req->fetch();

              $req = $bdd->prepare('UPDATE compte SET imageProfil = :npro WHERE login = :idj');
              $req->execute(array(
                'npro' => $filename,
                'idj' => $_SESSION['login']
                ));
              
              $message = 'Upload successful !';

            }
            else
            {
              // Sinon on affiche une erreur systeme
              $message = 'Problem during upload !';
            }
          }
          else
          {
            $message = 'An internal error prevented the image from being uploaded !';
          }
        }
        else
        {
          // Sinon erreur sur les dimensions et taille de l'image
          $message = 'Image dimensions error !';
        }
      }
      else
      {
        // Sinon erreur sur le type de l'image
        $message = 'The file to upload is not an image !';
      }
    }
    else
    {
      // Sinon on affiche une erreur pour l'extension
      $message = 'The file extension is incorrect !';
    }
  }
  else
  {
    // Sinon on affiche une erreur pour le champ vide
    $message = 'Please fill out the form !';
  }
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
  <head>
    <title>Upload image !</title>
  </head>
  <body>
 <?php
      if( !empty($message) ) 
      {
        echo '<p>',"\n";
        echo "\t\t<strong>", htmlspecialchars($message) ,"</strong>\n";
        echo "\t</p>\n\n";
      }
    ?>
    <!-- Debut du formulaire -->
   <form enctype="multipart/form-data" action="#" method="post">
    <fieldset>
        <legend>Profile picture</legend>
          <p>
            <label for="fichier_a_uploader" title="Find the file !">Send file :</label>
            <input type="hidden" name="MAX_FILE_SIZE" value="<?php echo MAX_SIZE; ?>" />
            <input name="fichier" type="file" id="fichier_a_uploader" />
            <input type="submit" name="submit" value="Upload" />
          </p>
      </fieldset>
    </form>
    <!-- Fin du formulaire -->

    <?php 

      $req = $bdd->prepare('SELECT * FROM compte WHERE login = ?');
      $req->execute(array($_SESSION['login']));
      $donnees = $req->fetch();

      if (!empty($donnees['imageProfil'])) {
        ?>
        <img class="imgperso" src="<?php echo $donnees['imageProfil'] ?>" width="100px;" alt="">
        <?php
        $_SESSION['imageProfil'] = $donnees['imageProfil'];
      } else {
        ?>
        <img class="imgperso" src="image/image-perso.jpg" width="100px;" alt="">
        <?php 
      }
    ?>
