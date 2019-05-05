<?php
session_start();
?>
<head>
	<title> Mon compte Client</title>
	<meta charset="utf-8">
	<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
</head>
<!-- <a href="?action=connexion">Se connecter en tant qu'acheteur :  </a> -->
<header>
	<div class="titre"> 
		<h1>Bienvenue dans l'espace vente</h1>
	</div>
</header>
	<div class="retour">
		<a href="index.php">Retour site</a>
	</div>

<?php
// if($_GET['action']=='connexion'){
	if (isset($_POST['Identifier'])){
		$identifiant = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
		$pass = isset($_POST["password"])? $_POST["password"] : "";

$database = "eceAmazon"; 

$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");


if($db_found){

	$sql = "SELECT * from vendeur where pseudo = '$identifiant' and password = '$pass' ";
	$result = mysqli_query($db_handle, $sql) or die ("Gros fail");
//	while(
		$data = mysqli_fetch_assoc($result);
//	){

		if ($data['pseudo'] == $identifiant && $data['password'] == $pass){

		echo "Connexion établie ! Bienvenue ".$data['nom'].'<br>';
		$_SESSION['pseudo']=$identifiant;
		header('Location: vendre.php');	
		
		}
		else if ($data['pseudo'] != $identifiant || $data['password'] != $pass){
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
	<table class="bloc-2">
		<tr>
			<td><h3>Identifiant : </h3></td>
			<td><input type="text" id="pseudo" name="pseudo"></td>
		</tr>

		<tr>
			<td><h3>Mot de passe : </h3></td>
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

	$newIdentifiant =$_POST["newEmail"];
	$newPass = $_POST["newPassword"];
	$newNom = $_POST["newName"];
	$pseudo = $_POST["newPseudo"];
 
	if ($newIdentifiant && $newPass && $newNom && $pseudo){
		
	$database = "eceAmazon"; 

	$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");

	$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if ($db_found){

$sql = "INSERT INTO vendeur VALUES('','$newIdentifiant','$newNom','$newPass','$pseudo')";
$result = mysqli_query($db_handle, $sql);



}
else {
	echo "Base de données non trouvée";
}
mysqli_close($db_handle);

?><div class="texte"><h4><?php echo "Inscription réussie !";?></h4></div><?php
}



else {
	echo "Veuillez remplir tous les champs";
}

}

?>
<div class="bloc"><h3>Créer un compte Vendeur : </h3></div>
<form  action="" method="post">	
	<table class="bloc-2">
		<tr>
			<td><h4>Inscrivez votre Email : </h4></td>
			<td> <input type="text" id="newEmail" name="newEmail"> </td>
		</tr>

		<tr>
			<td><h4>Choisissez un mot de passe : </h4></td>
			<td> <input type="text" id="newPassword" name="newPassword"> </td>
		</tr>
		<tr>
			<td><h4>Prénom  : </h4></td>
			<td> <input type="text" id="newName" name="newName"> </td>
		</tr>
		<tr>
			<td><h4>Choisissez votre pseudo </h4></td>
			<td> <input type="text" id="newPseudo" name="newPseudo"> </td>
		</tr>
		<tr>

		</tr> 
		<tr>
			<td colspan="2" align="center">
				<input type="submit" name="Inscription">
			</td>
		</tr>
	</table>
</form>