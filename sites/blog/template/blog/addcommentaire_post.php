<?php session_start();
// Connexion à la base de données
include '../../ouvrirBdd.php';


// Insertion du message à l'aide d'une requête préparée
$req = $bdd->prepare('INSERT INTO commentaires (id_billet, auteur, commentaire, la_dateC, heureC) VALUES(?, ?, ?, NOW(), NOW())');
$req->execute(array($_SESSION['billet'], $_SESSION['login'], $_POST['commentaire']));


// Redirection du visiteur vers la page du blog
//header('Location: blog.php');
?>
<script type="text/javascript">
	history.go(-1);
</script>