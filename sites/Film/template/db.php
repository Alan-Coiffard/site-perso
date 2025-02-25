<?php 

	try {
		$db = new PDO('mysql:host=alancoiffmalan.mysql.db;dbname=alancoiffmalan','alancoiffmalan','Jallabfa1324');
		$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		// $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
		$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$db->exec('SET NAMES utf8');
	} catch (Exception $e) {
		echo "Impossible de se connecter à la db<br>";
		echo $e->getMessage();
		die();
	}
	
 ?>