<?php session_start(); 
    $_SESSION['ici']=$_SERVER['REQUEST_URI'];
?>
<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<form action="addarticle_post.php" class="modifA" method="post">
    <a href="blog.php"><button class="button fa fa-chevron-circle-left">Back</button></a>
    <?php 
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] != null) { ?>
                <ul class="connexion">
                    <button class="button"><a href="../compte/deco.php">Logout</a></button>
                </ul>
                <h1>Vous êtes <?php echo $_SESSION['login']; ?></h1>
                <input type="text" name="titre" id="titre" value="Title" required/><br />
                <textarea cols="100" rows="10" name="contenu">Your texte</textarea>
                <input type="submit" value="Send"/>
                <?php         
            }else {
                ?>
                <ul class="connexion">
                    <button class="button"><a href="../compte/inscription.php">Resgister</a></button>
                    <button class="button"><a href="../compte/connexion.php">Connect</a></button>
                </ul>
                <?php
            }    
        }else {
            ?>
                <ul class="connexion">
                    <button class="button"><a href="../compte/inscription.php">Resgister</a></button>
                    <button class="button"><a href="../compte/connexion.php">Connect</a></button>
                </ul>
            <?php
        }
    ?>
    
</form>

