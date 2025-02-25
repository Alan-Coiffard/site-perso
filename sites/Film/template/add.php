<?php 
include 'db.php';

  /**
   * Ajouter un film
   */
  if (isset($_POST['titre']) && !empty($_POST['titre'])) {
    
    $titre = $db->quote($_POST['titre']);
    $db->query("insert into les_films set titre=$titre");

    $id = $db->lastInsertId();

    if (isset($_POST['resume']) && !empty($_POST['resume'])) {
      $resume = $db->quote($_POST['resume']);
      $db->query("update les_films set resume=$resume where id = $id");
    }

    if (isset($_POST['lien']) && !empty($_POST['lien'])) {
      $lien = $db->quote($_POST['lien']);
      $db->query("update les_films set lien=$lien where id = $id");
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
      $images_id = $db->lastInsertId();
      $image_name = 'film_' . $images_id . '.' . $extension;
      move_uploaded_file($image['tmp_name'], '../image' . '/mini/' . $image_name);
      resizeImage('..'.'/image' . '/mini/' . $image_name, 150, 150);

      $image_name = $db->quote($image_name);
      $db->query("update les_films set grande=$image_name where id = $images_id");


      $image_name = resizedName($image_name, 150, 150);
      $db->query("update les_films set miniature=$image_name where id = $images_id");
    }  
  }
  header('Location:../index.php');
  die();
  ?>