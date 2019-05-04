<!DOCTYPE html>
<html>
<head>
	<title> Mon compte Client</title>
	<meta charset="utf-8">
	<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
</head>

<!-- <a href="?action=connexion">Se connecter en tant qu'acheteur :  </a> -->
<header>
	<div class="titre"> 
		<h1><a href="indexAcheteur.php"><img align="left" src="logo.png" width="60" height="45" ></a>Vos informations personnelles</h1>
	</div>
</header>

<!-- Si l'acheteur ne s'est pas encore connecter, redirection vers la page connexion ; si acheteur déjà connecté, on verifie juste ses coordonnées bancaires dans le formulaires -->


<!-- Cas ou l'acheteur est deja connecté : Penser a verifier la connexion de l'utilisateur -->

<?php 
session_start();
if (isset($_SESSION['email']) && isset($_SESSION['password'])){

	/*echo "Connexion établie ! Bienvenue ".'<br>';*/
	?>
	<div class="bloc-2"><h3>
	<?php

	
	/*echo "Vos informations personnelles ".'<br>';*/
	echo 'Login : ' .$_SESSION['email'].'<br>'.'Mot de passe : '.$_SESSION['password'].'<br>';
	?>	
	</h3></div>
	<?php

	if (isset($_POST['verifier'])){

		$identifiant = isset($_POST["email"])? $_POST["email"] : "";
		$cardNom = isset($_POST["cardName"])? $_POST["cardName"] : "";
		$cardNum = isset($_POST["cardNb"])? $_POST["cardNb"] : "";
		$dateExpi = isset($_POST["cardDate"])? $_POST["cardDate"] : "";
		$crypto = isset($_POST["cardCrypt"])? $_POST["cardCrypt"] : "";
		$address = isset($_POST["adresse"])? $_POST["adresse"] : "";

		$database = "eceAmazon"; 

		$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");

		$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");


		if ($db_found){

			$sql = "SELECT * from acheteur where Login = '$identifiant' and numeroCarte = ' $cardNum' and nomCarte = '$cardNom ' and dateExpiration = '$dateExpi' and codeCarte = '$crypto' and Adresse = '$address'";
			$result = mysqli_query($db_handle, $sql) or die ("Gros fail");
			$data = mysqli_fetch_assoc($result);

			if ($data['Login']== $identifiant && $data['numeroCarte']== $cardNum && $data['nomCarte']==$cardNom && $data['dateExpiration']== $dateExpi && $data['codeCarte']== $crypto && $data['Adresse']== $address)
			{
				?><div class="texte-4"><h4><?php
				echo " Merci ".$data['Nom'].' ! ';
				echo "Vous allez recevoir votre commande (et peut être un mail de confirmation?) d'ici quelques jours à l'adresse : " .$data['Adresse'].'<br>';
				?></h4></div><?php
			} 
			else {
				?><div class="texte-4"><h4><?php
				echo "Vérifiez vos informations. ". '<br>';
				?></h4></div><?php
			}

		}

		else {
			echo "Database not found";
		}

		mysqli_close($db_handle);

	}
}
else 
{
	
}

?>
<div class="bloc-2"><h4>Veuillez confirmer vos informations bancaires : 
<form action="" method="post">
	<table>
		<tr>
			<td> Identifiant : </td>
			<td><input type="text" id="email" name="email"></td>
		</tr>
		<tr>
			<td> Nom figurant carte : </td>
			<td><input type="text" id="cardName" name="cardName"></td>
		</tr>
		<tr>
			<td> Numéro de la carte : </td>
			<td><input type="number" min="1" maxlength = "7" placeholder="7 chiffres" id="cardNb" name="cardNb"></td>
		</tr>
		<tr>
			<td> Date d'expiration : </td>
			<td><input type="date" id="cardDate" name="cardDate"></td>
		</tr>
		<tr>
			<td> Code : </td>
			<td><input type="number" min="1" maxlength = "4" placeholder="4 chiffres"  id="cardCrypt" name="cardCrypt"></td>
		</tr>
		<tr>
			<td> Adresse (rue) : </td>
			<td><input type="text" id="adresse" name="adresse"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="verifier">
			</td>
		</tr>
	</table>
</form>
</h4></div>
</html>

