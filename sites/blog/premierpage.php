<?php  
	session_start(); 
	$_SESSION['verif'] = 1; 
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Blog</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body class="contenant">
	<div class="pres">
		<h1>Hi evrery body !</h1>
		<p>Here is my first blog and my first dynamique website, I hope you will enjoy. This blog is for my trainning and aim to gather people, have a good time, and share fun</p>
		<ul class="connect">
			<li><a href="template/compte/inscription.php"><button class="button button2">Registration</button></a></li>
			<li><a href="accueil.php"><button class="button button2">Home</button></a></li>
			<li><a href="template/compte/connexion.php"><button class="button button2">connection</button></a></li>
		</ul>
	</div>		
</body>
</html>