<!DOCTYPE html>
<html>
<head>
	<title> Mon compte Vendeur</title>
</head>

<!-- <a href="?action=connexion">Se connecter en tant qu'acheteur :  </a> -->
<div> Se connecter </div>
<?php
// if($_GET['action']=='connexion'){
	if (isset($_POST['Identifier'])){
		$identifiant = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
		$pass = isset($_POST["password"])? $_POST["password"] : "";

$database = "eceAmazon"; 

$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");


if($db_found){

	$sql = "SELECT * from Vendeur where Pseudo = '$identifiant' and Password = '$pass' ";
	$result = mysqli_query($db_handle, $sql) or die ("Gros fail");
//	while(
		$data = mysqli_fetch_assoc($result);
//	){

		if ($data['Pseudo'] == $identifiant && $data['Password'] == $pass){

		echo "Connexion établie ! Bienvenue ".$data['Nom'].'<br>';
		
		}
		else if ($data['Pseudo'] != $identifiant || $data['Password'] != $pass){
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
			<td> Pseudo : </td>
			<td><input type="text" id="pseudo" name="pseudo"></td>
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

<?php
if (isset($_POST['Inscription'])){

	$newIdentifiant = isset($_POST["newEmail"])? $_POST["newEmail"] : "";
	$newPass = isset($_POST["newPassword"])? $_POST["newPassword"] : "";
	$newNom = isset($_POST["newName"])? $_POST["newName"] : "";
	$pseudo = isset($_POST["newPseudo"])? $_POST["newPseudo"] : "";
 	$newPhoto = $_FILES["newPic"]['name'];
 	$newPhotoMur = $_FILES["newPhotoFond"]['name'];
	
	if ($newIdentifiant && $newPass && $newNom && $pseudo){
		
	$database = "eceAmazon"; 

	$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");

	$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if ($db_found){

$sql = "INSERT INTO Vendeur VALUES('$newIdentifiant' , $pseudo, '$newNom','$newPass','$newPhoto', '$newPhotoMur')";

$result1 = mysqli_query($db_handle, $sql) or die ("Gros fail");

echo "Inscription réussie !";
echo $newPhoto;

}
else {
	echo "Base de données non trouvée";
}
mysqli_close($db_handle);
}

else {
	echo "Veuillez remplir tous les champs";
}

}

?>

<div>Créer un compte Vendeur :  </div>
<form  action="" method="post">
	
<table>
	<tr>
		<td> Inscrivez votre Email : </td>
		<td> <input type="text" id="newEmail" name="newEmail"> </td>
	</tr>

	<tr>
		<td> Choisissez un mot de passe : </td>
		<td> <input type="text" id="newPassword" name="newPassword"> </td>
	</tr>
	<tr>
		<td> Prénom  : </td>
		<td> <input type="text" id="newName" name="newName"> </td>
	</tr>
	<tr>
		<td> Choisissez votre pseudo </td>
		<td> <input type="text" id="newPseudo" name="newPseudo"> </td>
	</tr>
	<tr>
		<td> Importer une photo de profil</td>
		<td> <input type="file" name="newPic" id="newPic" accept="image/png, image/jpeg, image/jpg"> </td>
		<!-- <td> <input type="submit" value="Importer pp" name="ImportPic"> </td> -->
	</tr>
	<tr>
		<td> Importer une photo de fond : </td>
	 	<td> <input type="file" id="newPhotoFond" name="newPhotoFond" > </td>
		<!-- <td> <input type="submit" value="Importer photo mur" name="ImportBackground" accept="image/png, image/jpeg, image/jpg"> </td> -->
	</tr>
	<tr>
			<td colspan="2" align="center">
			<input type="submit" name="Inscription"></td>
		</tr>
</table>
</form>



</html>

