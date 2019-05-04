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

	if (isset($_SESSION['email']) && isset($_SESSION['password']) ) 
	{

		$identifiant = $_SESSION['email'];
		$pass = $_SESSION['password'];
		$database = "eceAmazon"; 
		$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");
		$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");
			if($db_found)
			{
				
				$sql = "SELECT * from acheteur where Login = '$identifiant' and Password = '$pass' ";

				$result = mysqli_query($db_handle, $sql) or die ("Gros fail");

				while($data = mysqli_fetch_assoc($result))
				{
				echo " Votre identifiant : ".$data['Login'].'<br>';
				echo " Votre prénom : ".$data['Nom'].'<br>';
				echo " Nom figurant sur votre carte : ".$data['nomCarte'].'<br>';
				echo " Votre numéro de carte : ".$data['numeroCarte'].'<br>';
				echo " Votre adresse : ".$data['Adresse'].'<br>';
				}	

			}
	else
	{
		echo "Database not found";
	}
	mysqli_close($db_handle);

	}

	?>

	</html>

