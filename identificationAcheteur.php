<!DOCTYPE html>
<html>
<head>
	<title> Mon compte Client</title>
</head>

<!-- <a href="?action=connexion">Se connecter en tant qu'acheteur :  </a> -->
<div> Se connecter </div>
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

		echo "Connexion établie ! Bienvenue ".$data['Nom'].'<br>';
		
		}
		else if ($data['Login'] != $identifiant || $data['Password'] != $pass){
			echo "Identifiant ou mot de passe incorrect";
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
	<table>
		<tr>
			<td> Email : </td>
			<td><input type="text" id="email" name="email"></td>
		</tr>

		<tr>
			<td> Mot de passe : </td>
			<td><input type="password" id = "password" name="password"></td>
		</tr>
		<tr>
			<td colspan="2" align="center">
			<input type="submit" name="Identifier"></td>
		</tr>
	</table>
</form>




<div>Créer un compte en tant qu'acheteur :  </div>


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
		echo "echho";
	$database = "eceAmazon"; 

	$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");

	$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if ($db_found){
echo "echoooooooo";
$sql = "INSERT INTO Acheteur VALUES('$newIdentifiant' ,'$newNom','$newPass','$newNumCarte', '$newNomCarte', '$newDateExp', '$newCodeCarte', '$newAddress')";


//mysql_query($sql) or die ("Gros fail");
$result1 = mysqli_query($db_handle, $sql) or die ("Gros fail");

// $data1 = mysqli_fetch_assoc($result1);

echo "Done";


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
	
<table>
	<tr>
		<td> Inscrivez votre Email : </td>
		<td> <input type="text" id="newEmail" name="newEmail"> </td>
	</tr>

	<tr>
		<td> Choisissez un mot de passe  : </td>
		<td> <input type="text" id="newPassword" name="newPassword"> </td>
	</tr>
	<tr>
		<td> Prénom  : </td>
		<td> <input type="text" id="newName" name="newName"> </td>
	</tr>
	<tr>
		<td> Entrez votre numero de carte : </td>
		<td> <input type="text" id="newNumCarte" name="newNumCarte"> </td>
	</tr>
	<tr>
		<td> Nom figurant sur la carte  : </td>
		<td> <input type="text" id="newNomCarte" name="newNomCarte"> </td>
	</tr>
	<tr>
		<td> Date d'expiration de la carte  : </td>
		<td> <input type="text" id="newDateExp" name="newDateExp"> </td>
	</tr>
	<tr>
		<td> Code de la carte : </td>
		<td> <input type="text" id="newCodeCarte" name="newCodeCarte"> </td>
	</tr>
	<tr>
		<td> Adresse (rue) : </td>
		<td> <input type="text" id="newAddress" name="newAddress"> </td>
	</tr>
	<tr>
			<td colspan="2" align="center">
			<input type="submit" name="Inscription"></td>
		</tr>
</table>
</form>

</html>

