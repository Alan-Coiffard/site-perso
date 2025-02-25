<?php session_start(); $_SESSION['billet'] = $_GET['billets'];  
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>comment space</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body>
	<?php include '../../menuHD.php'; ?>
	<a href="blog.php"><button class="button fa fa-chevron-circle-left">Back</button></a>
	<h1>comment space</h1>

	<?php
		// Connexion à la base de données
		include '../../ouvrirBdd.php';

		// Récupération du billet
		$req = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
		$req->execute(array($_GET['billets']));
		$donnees = $req->fetch();
	?>

	<div class="news">
	    <h3 class="news-h"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
	    <div class="news-credit">
	        <p class="fa fa-calendar"> <?php  echo inversDate(htmlspecialchars($donnees['la_date']))." à ".htmlspecialchars($donnees['heure']); ?></p>
	        <p class="fa fa-user-circle"> <?php echo htmlspecialchars($donnees['auteur']);?></p>
	        <?php if ($_SESSION['login'] == $donnees['auteur'] || $_SESSION['login'] == "root") { ?>
	            <a class="noBlue news-a" href="modifArticle.php?billets=<?php echo $donnees['id']; ?>"><p class="fa fa-pencil-square-o"> Edit</p></a>
	            <a class="noBlue news-a" href="suppArticle.php?billets=<?php echo $donnees['id']; ?>"><p class="fa fa-trash"> Delete</p></a>
	        <?php } ?>
	    </div>
	    <p class="news-p">
	        <?php
	            $texte = preg_replace('#(https://|http://)*([a-z0-9._/-]+\.[a-z0-9]+)#i', '<a href="http://$2">$0</a>', $donnees['contenu']);
	            echo $texte; 
	        ?>
        </p>
	</div>

	<?php 
        function inversDate($date)
        {
            $date = explode('-', $date);
            $jour = $date[2];
            $mois = $date[1];
            $anne = $date[0];
            $date = "$jour-$mois-$anne";
            return $date;
        }

    ?>
	
	<h2>Comments</h2>

	<div class="blockCom">
	<?php 

		// Récupération des 10 derniers messages
        $reponse = $bdd->query('SELECT * FROM commentaires WHERE id_billet = ?  ORDER BY id DESC');

        $req = $bdd->prepare('SELECT * FROM commentaires WHERE id_billet = ? ORDER BY la_dateC');
		$req->execute(array($_GET['billets']));


		while ($donnees = $req->fetch())
            {
                ?>
                <div class="com">
                	<?php 
                		if ($_SESSION['login'] == $donnees['auteur'] || $_SESSION['login'] == "root") {
                        ?>
                            <a href="suppComm.php?com=<?php echo $donnees['id']; ?>"><button class="del fa fa-trash"></button></a>
                        <?php 
                    	}
                	?>
					<strong><?php echo htmlspecialchars($donnees['auteur'])." le ".inversDate(htmlspecialchars($donnees['la_dateC']))." à ".htmlspecialchars($donnees['heureC']); ?></strong>
					<p><?php 
						$com = preg_replace('#http://[a-z0-9._/-]+#i', '<a href="$0">$0</a>', $donnees['commentaire']);
						echo htmlspecialchars($com) 
					?></p>		
				</div>
                <?php 
            }

            $req->closeCursor();

	?>
	</div>
	



    <?php include 'addcommentaire.php'; ?>

    <script type="text/javascript">
    	function retour() {
    		history.go(-1);
    	}
    	
    </script>
	
</body>
</html>

