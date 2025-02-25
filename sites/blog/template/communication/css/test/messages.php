<?php
// TODO templates
session_start();

// Connexion à la base de données
            // Connexion à la base de données
try
{
    $bdd = new PDO('mysql:host=localhost;dbname=test_open;charset=utf8', 'root', '');
}
catch(Exception $e)
{
    die('Erreur : '.$e->getMessage());
}
// Récupération des 10 derniers messages

// récupérer l'identifiant et le rejeter s'il y a un souci quelconque
$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);

// empêcher que le navigateur mette la réponse précédente en cache (ça donnerait l'impression de ne jamais changer)
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// Récupération du message demandé
$reponse = $bdd->query('SELECT * FROM minichat WHERE id > ' . $id . ' ORDER BY id DESC');

// Affichage de chaque message (toutes les données sont protégées par htmlspecialchars)
$donnees = $reponse->fetch();

    if ($donnees['pseudo'] == $_SESSION['login']) {
        ?><div class="moi"><p class="date"><?php 
        if ($_SESSION['login'] == $donnees['pseudo'] || $_SESSION['login'] == "root") {
            ?>
                <a href="suppMSG.php?msg=<?php echo $donnees['ID']; ?> "><button class="del fa fa-trash"></button></a>
            <?php 
        }
        echo ' '.htmlspecialchars($donnees['la_date']).' </p><p class="msg" id="0" style="visible: hidden">' . htmlspecialchars($donnees['message']) . '</p></div>';
    }else {
        ?><div><p class="date" id="0" style="visible: hidden"></p><?php 
        if ($_SESSION['login'] == $donnees['pseudo'] || $_SESSION['login'] == "root") {
            ?>
                <a href="suppMSG.php?msg=<?php echo $donnees['id']; ?> "><button class="del fa fa-trash"></button></a>
            <?php 
        }
        echo ' '.htmlspecialchars($donnees['la_date']).' <strong>' . htmlspecialchars($donnees['pseudo']) . '</strong> : </p><p class="msg" id="0" style="visible: hidden">' . htmlspecialchars($donnees['message']) . '</p></div>';
    }


?>

