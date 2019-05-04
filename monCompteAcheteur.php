<!DOCTYPE html>
<html>
<head>
	<title> Mon compte Client</title>
	<meta charset="utf-8">
	<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
</head>
<?php 

session_start();


 ?>

<!-- <a href="?action=connexion">Se connecter en tant qu'acheteur :  </a> -->
<header>
	<div class="titre"> 
		<h1>MES INFORMATIONS PERSONNELLES</h1>
	</div>
</header>
	<div class="retour">
		<a href="indexAcheteur.php">Retour site</a>
	</div>
<?php 
if (isset($_SESSION['email']) && isset($_SESSION['password'])){
echo "J'affiche tes infos attend";

}

 ?>




</html>

