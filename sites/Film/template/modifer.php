<?php 
include 'db.php';

$id = $_GET['id'];

  /**
   * modifier un film
   */
  if (isset($_POST['titre']) && !empty($_POST['titre'])) {
    $titre = $db->quote($_POST['titre']);


    $db->query("update les_films set titre=$titre where id = $id");

  }

  if (isset($_POST['resume']) && !empty($_POST['resume'])) {
    $resume = $db->quote($_POST['resume']);
    $db->query("update les_films set resume=$resume where id = $id");
  }

  if (isset($_POST['lien']) && !empty($_POST['lien'])) {
    $lien = $db->quote($_POST['lien']);
    $db->query("update les_films set lien=$lien where id = $id");
  }

  if (isset($_FILES['miniature']) && !empty($_FILES['miniature'])) {

    $select = $db->query("select * from les_films where id=$id");
    $film = $select->fetch();
    $films = glob('../image' . '/mini/' . pathinfo($film['miniature'], PATHINFO_FILENAME) . '_*x*.*');
    if (is_array($films)) {
      foreach ($films as $v) {
        unlink($v);
      }
    }


    $files = $_FILES['miniature'];
    $images = array();
    require 'image.php';
    $image = array(
      'name' => $files['name'],
      'tmp_name' => $files['tmp_name']
    );      
    $extension = pathinfo($image['name'], PATHINFO_EXTENSION);
    if (in_array($extension, array('jpg','png'))) {

      $image_name = 'film_' . $id . '.' . $extension;
      move_uploaded_file($image['tmp_name'], '../image' . '/mini/' . $image_name);
      resizeImage('..'.'/image' . '/mini/' . $image_name, 150, 150);

      $image_name = $db->quote($image_name);
      
      $db->query("update les_films set grande=$image_name where id = $id");


      $image_name = resizedName($image_name, 150, 150);
      
      $db->query("update les_films set miniature=$image_name where id = $id");
    }  
  }





  header('Location:../index.php');
  die();
  ?>