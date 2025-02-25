<?php session_start(); 
    $_SESSION['idb'] = $_GET['billets'];
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<body class="noflow">
    <a href="blog.php"><button class="button fa fa-chevron-circle-left">Back</button></a>
    <?php
include '../../ouvrirBdd.php';

// Récupération du billet
$req = $bdd->prepare('SELECT * FROM billets WHERE id = ?');
$req->execute(array($_GET['billets']));
$donnees = $req->fetch();

if ($_SESSION['login'] == $donnees['auteur']) {
    ?>
    <div class="news">
        <h3 class="news-h"><?php echo htmlspecialchars($donnees['titre']); ?></h3>
        <div class="news-credit">
            <p class="fa fa-calendar"> <?php  echo inversDate(htmlspecialchars($donnees['la_date']))." à ".htmlspecialchars($donnees['heure']); ?></p>
            <p class="fa fa-user-circle"> <?php echo htmlspecialchars($donnees['auteur']);?></p>
        </div>
        <p class="news-p">
            <?php
                $texte = preg_replace('#(https://|http://)*([a-z0-9._/-]+\.[a-z0-9._/-]+)#i', '<a href="http://$2">$0</a>', $donnees['contenu']);
                echo $texte; 
            ?>
        </p>
    </div>
    <form class="modifA" action="modifArticle_post.php" method="post">
        <input type="text" name="ntitre" id="titre" value="<?php echo $donnees['titre']; ?>" required/><br />
        <textarea cols="100" rows="10" name="ncontenu"><?php echo $donnees['contenu']; ?></textarea>
        <input type="submit" value="Envoyer"/>
    </form>
    <?php  
}

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

</body>


