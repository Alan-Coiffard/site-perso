<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title></title>
</head>
<body>
  <form action="#" method="get">
	Entrez votre date de naissance (JJ/MM/AAAA) : <INPUT type=text name="dat" id="dat" size=10 maxlength=10>
    <input type="hidden" id="num" name="nameNum" value="2">
    <input type="submit" id="sub" value="submit">

  </form>
 
	<script>
		var numero = document.getElementById("dat").value;
		document.write(numero);
		document.getElementById("num").value = numero;
	</script>

<?php
	$num = $_GET["nameNum"];
	echo $num;
?>

</body>
</html>