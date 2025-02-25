<link rel="stylesheet" href="css/styleMenu.css">
<nav>
  
  <div class="container pt-menu" onclick="myFunction(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </div>
  <ul class="ul">
    <?php
      	if ($_SESSION['verif'] == 1) {
      		echo "<li><a href=\"template/compte/inscription.php\">Registration</a></li><br><li><a href=\"template/compte/connexion.php\">Connection</a></li>";	
      	}else {
          if (!empty($_SESSION['imageProfil'])) {
            ?><img class="imgperso" style="clip:rect(0px,60px,200px,0px);overflow:hidden" src="template/compte/<?php echo $_SESSION['imageProfil'] ?>"height="50px" alt=""><?php 
          }
          echo "<li><a class=\"fa fa-user\" href=\"template/compte/profil.php\">Profile</a></li>";
          echo "<li><a class=\"fa fa-power-off\" href=\"template/compte/deco.php\">Logout</a></li>";
        }
    ?>
  </ul>

  <ul class="gd-menu">
    <li><a class="" href="accueil.php">Home</a></li>
    <li><a href="template/blog/blog.php">Blog</a></li>
    <li><a href="template/communication/minichat.php">Chat</a></li>
    <li><a href="devlpment.php">Presentation</a></li>
  </ul>

  <div class="pt-menu">
    <ul>
      <li><a href="accueil.php">Home</a></li>
      <li><a href="template/blog/blog.php">Blog</a></li>
      <li><a href="template/communication/minichat.php">Chat</a></li>
      <li><a href="devlpment.php">Presentation</a></li>
    </ul>
  </div>
</nav>

<script>
function myFunction(x) {
  x.classList.toggle("change");
}
</script>

    <script type="text/javascript" src="http://code.jquery.com/jquery.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $(".menu").hide();
        $("#boutton_menu").click(function(){
            $(".menu").slideToggle();
        });
    });
    
    $(document).ready(function(){
      $('#boutton_menu').click(function(){
        $(this).toggleClass('open');
      });
    });
  </script>