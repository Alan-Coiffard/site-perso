<?php 
  /**
   * Récupération de la liste des films
   */
  $select = $db->query('select * from les_films order by titre ASC');
  $films = $select->fetchAll();


  ?>