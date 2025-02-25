<?php session_start(); 
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
    <link rel="stylesheet" type="text/css" href="../all.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
</head>
<body class="noflow">
    <?php include '../../menuHD.php'; ?>
    <a href="../../accueil.php"><button class="button fa fa-chevron-circle-left">Back</button></a>
	<h1>All articles</h1>
        
        <section class="scrollbar" id="style-7">
            <?php
                // Connexion à la base de données
                include '../../ouvrirBdd.php';

                // Récupération des 10 derniers messages
                $reponse = $bdd->query('SELECT * FROM billets ORDER BY id DESC');

                // Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
                while ($donnees = $reponse->fetch())
                {
                    ?>
                    <div class="news">
                        <h3 class="news-h"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
                        <div class="news-credit">
                            <p class="fa fa-calendar"> <?php  echo inversDate(htmlspecialchars($donnees['la_date']))." à ".htmlspecialchars($donnees['heure']); ?></p>
                            <p class="fa fa-user-circle"> <?php echo htmlspecialchars($donnees['auteur']);?></p>
                            <a href="commentaire.php?billets=<?php echo $donnees['id']; ?>"><p class="news-a fa fa-comment"> Comments</p></a>
                            <?php if ($_SESSION['login'] == $donnees['auteur'] || $_SESSION['login'] == "root") { ?>
                                <a class="noBlue news-a" href="modifArticle.php?billets=<?php echo $donnees['id']; ?>"><p class="fa fa-pencil-square-o">Edit</p></a>
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
                }

                $reponse->closeCursor();
            ?>

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
        </section>
        <div class="centre">
            <a href="addarticle.php"><button class="bas button fa fa-plus-circle" style="vertical-align:middle"><span>Add an article</span></button></a>
        </div>
</body>
</html>