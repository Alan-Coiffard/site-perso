<?php 

try
{
    $bdd = new PDO('mysql:host=alancoiffmalan.mysql.db;dbname=alancoiffmalan;charset=utf8', 'alancoiffmalan', 'Jallabfa1324');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}

?>