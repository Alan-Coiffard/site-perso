<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
    <link rel="stylesheet" type="text/css" href="../all.css">
	<link rel="stylesheet" type="text/css" href="css/stylepro.css">
</head>

<style type="text/css">
	nav {
	  position: fixed;
	  width: 100%;
	  z-index: 10;
		background-color: rgba(200,200,200,0.5);
		font-weight: bold;
	  height: 75px;
	}
	nav.scrolled {
	  background: rgba(17, 17, 17, 0.9);
	}
	nav ul {
	  float: right;
	  list-style: none;
	  padding: 25px;
	  margin: 0;
	}
	nav li {
	  float: left;
	}
	nav a {
	  font-size: 0.9em;
	  color: black;
	  text-decoration: none;
	  margin: 5px 0 0 20px;
	  display: block;
	}
	nav a:hover {
	  color: #ededed;
	}

	.logo {
	  height: 75px;
	  float: left;
	}
	.logo:before, .logo:after {
	  position: absolute;
	  font-size: 7em;
	  font-weight: 300;
	  line-height: 0;
	  color: #fff;
	  top: 25px;
	}

	/*/ NAV /*//* Color Theme Swatches in Hex */
	.color-theme-1-hex { color: #73394E; }
	.color-theme-2-hex { color: #6D6873; }
	.color-theme-3-hex { color: #AEB4BF; }
	.color-theme-4-hex { color: #735C19; }
	.color-theme-5-hex { color: #734D2C; }

	/* Color Theme Swatches in RGBA */
	.color-theme-1-rgba { color: rgba(115, 57, 78, 1); }
	.color-theme-2-rgba { color: rgba(109, 104, 115, 1); }
	.color-theme-3-rgba { color: rgba(174, 180, 191, 1); }
	.color-theme-4-rgba { color: rgba(115, 92, 25, 1); }
	.color-theme-5-rgba { color: rgba(115, 77, 44, 1); }

	/* Color Theme Swatches in HSLA */
	.color-theme-1-hsla { color: hsla(338, 33, 33, 1); }
	.color-theme-2-hsla { color: hsla(267, 5, 42, 1); }
	.color-theme-3-hsla { color: hsla(218, 11, 71, 1); }
	.color-theme-4-hsla { color: hsla(44, 64, 27, 1); }
	.color-theme-5-hsla { color: hsla(27, 44, 31, 1); }

	.container {
	  display: inline-block;
	  cursor: pointer;
	    position: relative;
	  float: right;
	  padding-right: 10px;
	  padding-top: 18px;
	}

	.bar1, .bar2, .bar3 {
	  width: 35px;
	  height: 5px;
	  background-color: #333;
	  margin: 6px 0;
	  transition: 0.4s;
	}

	.change .bar1 {
	  -webkit-transform: rotate(-45deg) translate(-9px, 6px);
	  transform: rotate(-45deg) translate(-9px, 6px);
	}

	.change .bar2 {opacity: 0;}

	.change .bar3 {
	  -webkit-transform: rotate(45deg) translate(-8px, -8px);
	  transform: rotate(45deg) translate(-8px, -8px);
	}

	@media screen and (max-width: 700px){
	  .gd-menu {
	    display: none;
	  }
	  .pt-menu {
	    background: linear-gradient(to bottom left, #734D2C,rgba(115, 77, 44, 0.2));
	    position: fixed;
	    right: 0;
	    top: 75px;
	    width: 65%;
	    height: auto;
	    height: 200px;
	  }
	}

	@media screen and (min-width: 700px) {
	  .pt-menu {
	    display: none;
	  }
	}

	/*/ F-NAV /*/

.fond {
  background-color: rgba(200,200,200,0.7);
  padding: 10px;
  margin: 50px;
  border-radius: 10px;
}

</style>
<?php 
  include 'lib/form.php';
?>
<body>
	<?php include 'menuPF.php'; ?>
	<h1>Welcome to your profile <?php echo $_SESSION['prenom']." ".$_SESSION['nom']; ?></h1>

	<section>
		<h2><?php echo $_SESSION['login']; ?></h2>
		<?php include 'test2.php'; ?>
	</section>

<section>
    <h2>Personnal informations</h2>
    <?php if (empty($_SESSION['mail'])): ?>
      <h4>You don't already have registred e-mail </h4>
      <form action="" method="post">
        <div class="form-group">
          <label for="mail">Add an e-mail</label>
          <?= inputSpe('mail', 'email') ?>
        </div>
        <button type="submit" class="btn btn-success">Add</button>
      </form>
    <?php else: ?>
      <h4>Your e-mail is : <?= $_SESSION['mail']; ?></h4>
      <form action="" method="post">
        <div class="form-group">
          <label for="mail">Edit your e-mail</label>
          <?= inputSpe('mail', 'email') ?>
        </div>
        <button type="submit" class="btn btn-success">Edit</button>
      </form>    
    <?php endif ?>
</section>
	

</body>
</html>