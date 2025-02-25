<link rel="stylesheet" href="css/styleMenu.css">
<style type="text/css">
  nav {
    width: auto;
    position: relative;
    float: right;
    border-bottom-left-radius: 25px;
  }
</style>
<nav>
  <ul>
    <?php
      	if ($_SESSION['verif'] == 1) {
      		echo "<li><a href=\"../compte/inscription.php\">Register</a></li><br><li><a href=\"../compte/connexion.php\">Login</a></li>";	
      	}else {
          echo "<li><a class=\"fa fa-user\" href=\"../compte/profil.php\"> Profil</a></li>";
          echo "<li><a class=\"fa fa-power-off\" href=\"../compte/deco.php\"> Logout</a></li>";
        }
    ?>
  </ul>

  <ul class="gd-menu">
    <li><a class="" href="../../accueil.php">Home</a></li>
    <li><a href="../blog/blog.php">Blog</a></li>
    <li><a href="../communication/minichat.php">Chat</a></li>
  </ul>
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