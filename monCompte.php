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
		<h1>Se Connecter</h1>
	</div>
</header>
	<div class="retour">
		<a href="index.php">Retour site</a>
	</div>

<?php
// if($_GET['action']=='connexion'){
if (isset($_POST['Identifier'])){
	$identifiant = isset($_POST["email"])? $_POST["email"] : "";
	$pass = isset($_POST["password"])? $_POST["password"] : "";
	$database = "eceAmazon"; 
	$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");
	$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");
	if($db_found){
		$sql = "SELECT * from Acheteur where Login = '$identifiant' and Password = '$pass' ";
		$result = mysqli_query($db_handle, $sql) or die ("Gros fail");
//	while(
		$data = mysqli_fetch_assoc($result);
//	){
		if ($data['Login'] == $identifiant && $data['Password'] == $pass){
			session_start();
			$_SESSION['email']= $identifiant;
			$_SESSION['password']= $pass;

			header("Location: livresAcheteur.php");
			exit;
		}
		else if ($data['Login'] != $identifiant || $data['Password'] != $pass){
			echo '<body onLoad="alert(\'Membre non reconnu...\')">';
			echo '<meta http-equiv="refresh" content="0;URL=index.php">';
			?>
			<div class="texte"><h4><?php echo "Identifiant ou mot de passe incorrect";?></h4></div><?php
		}		
	// }
	}
	else {
		echo "Database not found";
	}
	mysqli_close($db_handle);
}
// }
?>

	<form action="" method="post">
		<table class="bloc-2">
			<tr>
				<td><h3>Email : </h3></td>
				<td><input type="text"  id="email" name="email"></td>
			</tr>
			<tr>
				<td><h3>Mot de passe : </h3></td>
				<td><input type="password" id = "password" name="password"></td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="Identifier">
				</td>
			</tr>
		</table>
	</form>

	<div class="bloc">
		<h3>Créer un compte en tant qu'acheteur : </h3>
	</div>
	<?php
// if($_GET['action']=='inscription'){
	if (isset($_POST['Inscription'])){
		$newIdentifiant = isset($_POST["newEmail"])? $_POST["newEmail"] : "";
		$newPass = isset($_POST["newPassword"])? $_POST["newPassword"] : "";
		$newNom = isset($_POST["newName"])? $_POST["newName"] : "";
		$newNumCarte = isset($_POST["newNumCarte"])? $_POST["newNumCarte"] : "";
		$newNomCarte = isset($_POST["newNomCarte"])? $_POST["newNomCarte"] : "";
		$newDateExp = isset($_POST["newDateExp"])? $_POST["newDateExp"] : "";
		$newCodeCarte = isset($_POST["newCodeCarte"])? $_POST["newCodeCarte"] : "";
		$newAdresse = isset($_POST["newAddress"])? $_POST["newAddress"] : "";
		if ($newIdentifiant && $newPass && $newNom && $newNumCarte && $newNomCarte && $newDateExp && $newCodeCarte && $newAdresse){
		
			$database = "eceAmazon"; 
			$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");
			$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");
			if ($db_found){
			
				$sql = "INSERT INTO Acheteur VALUES('$newIdentifiant' ,'$newNom','$newPass','$newNumCarte', '$newNomCarte', '$newDateExp', '$newCodeCarte', '$newAdresse')";
//mysql_query($sql) or die ("Gros fail");
				$result1 = mysqli_query($db_handle, $sql) or die ("Gros fail");
// $data1 = mysqli_fetch_assoc($result1);
				?>
				<div class="texte"><h4>
				<?php
				echo "Informations Enregistrées";
				?>
				</h4></div>
				<?php
			}
			else {
				echo "Base de données non trouvée";
			}
			mysqli_close($db_handle);
		}
		else {
			echo "Veuillez remplir tous les champs";
		}
	// }
	}
	?>
	<form  action="" method="post">
		<table class="bloc-2">
			<tr>
				<td><h4>Inscrivez votre Email : </h4></td>
				<td> <input type="text" id="newEmail" name="newEmail"> </td>
			</tr>
			<tr>
				<td><h4>Choisissez un mot de passe  : </h4></td>
				<td> <input type="text" id="newPassword" name="newPassword"> </td>
			</tr>
			<tr>
				<td><h4>Prénom  : </h4></td>
				<td> <input type="text" id="newName" name="newName"> </td>
			</tr>
			<tr>
				<td><h4>Entrez votre numero de carte : </h4></td>
				<td> <input type="number"  min="1" maxlength = "7" placeholder="7 chiffres" id="newNumCarte" name="newNumCarte"> </td>
			</tr>
			<tr>
				<td><h4>Nom figurant sur la carte  : </h4></td>
				<td> <input type="text" id="newNomCarte" name="newNomCarte"> </td>
			</tr>
			<tr>
				<td><h4>Date d'expiration de la carte  : </h4></td>
				<td> <input type="date" id="newDateExp" name="newDateExp"> </td>
			</tr>
			<tr>
				<td><h4>Code de la carte : </h4></td>
				<td> <input type="number"  min="1" maxlength = "4" placeholder="4 chiffres" id="newCodeCarte" name="newCodeCarte"> </td>
			</tr>
			<tr>
				<td><h4>Adresse (rue) : </h4></td>
				<td> <input type="text" id="newAddress" name="newAddress"> </td>
			</tr>
			<tr>
				<td colspan="2" align="center">
					<input type="submit" name="Inscription"></td>
				</tr>
		</table>
	</form>
</html>

