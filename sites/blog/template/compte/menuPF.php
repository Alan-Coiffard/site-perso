<link rel="stylesheet" href="../../css/styleMenu.css">
<nav>
  <img src="./image/logo.png" alt="logo" class="logo">
  <div class="container pt-menu" onclick="myFunction(this)">
    <div class="bar1"></div>
    <div class="bar2"></div>
    <div class="bar3"></div>
  </div>
  <ul>

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