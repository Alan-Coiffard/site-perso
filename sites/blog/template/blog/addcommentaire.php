<link rel="stylesheet" type="text/css" href="css/blogstyle.css">
<form action="addcommentaire_post.php" class="addComm" method="post">
    <?php 
        if (isset($_SESSION['login'])) {
            if ($_SESSION['login'] != null) { ?>
                <ul class="connexion">
                    <li class="aa"><?php echo $_SESSION['login']; ?></li>
                    <li><a href="../compte/deco.php">Logout</a></li>
                </ul>
                <!--<h1>Vous êtes <?php //echo $_SESSION['login']; ?></h1>-->
                <p class="commentaire">
                    <label class="labelC" for="commentaire">Comments : </label><textarea class="textareaC" name="commentaire" id="commentaire" required></textarea>
                    <input class="inputC" type="submit" value="Envoyer" />
                </p>
                <?php         
            }else {
                ?>
                <ul class="connexion">
                    <li class="insc"><a href="../compte/inscription.php">Resgister</a></li>
                    <li><a href="../compte/connexion.php">Connect</a></li>
                </ul>
                <?php
            }    
        }else {
            ?>
                <ul class="connexion">
                    <li class="insc"><a href="../compte/inscription.php">Resgister</a></li>
                    <li><a href="../compte/connexion.php">Connect</a></li>
                </ul>
            <?php
        }
    ?>
    
</form>

