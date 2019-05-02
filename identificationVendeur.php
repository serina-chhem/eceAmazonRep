<div> Se connecter </div>
<?php
session_start();
// if($_GET['action']=='connexion'){
if (isset($_POST['Identifier'])){
	$identifiant = isset($_POST["pseudo"])? $_POST["pseudo"] : "";
	$pass = isset($_POST["password"])? $_POST["password"] : "";

	$database = "eceAmazon"; 

	$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

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
			header('Location: vendeur.php');	
			
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

		$newIdentifiant =$_POST["newEmail"];
		$newPass = $_POST["newPassword"];
		$newNom = $_POST["newName"];
		$pseudo = $_POST["newPseudo"];
		
		if ($newIdentifiant && $newPass && $newNom && $pseudo){
			
			$database = "eceAmazon"; 

			$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

			$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

			if ($db_found){

				$sql = "INSERT INTO vendeur VALUES('','$newIdentifiant','$newNom','$newPass','$pseudo')";
				$result = mysqli_query($db_handle, $sql);



			}
			else {
				echo "Base de données non trouvée";
			}
			mysqli_close($db_handle);

			echo "Inscription réussie !";
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
		<!--<td> Importer une photo de profil</td>
		<td> <input type="file" name="newPic" id="newPic" accept="image/png, image/jpeg, image/jpg"> </td>
		<!-- <td> <input type="submit" value="Importer pp" name="ImportPic"> </td> 
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