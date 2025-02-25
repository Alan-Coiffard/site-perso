<?php session_start(); 
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>My super blog</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php include 'menu.php'; ?>
		
	<main class="main">
        <h1>My others websites</h1>
        
        <ul>
            <li><a href="">Mon premier site</a></li>
            <li><a href="">Mon premier site</a></li>
        </ul>

    </main>
	
		
	
	
</body>
</html>