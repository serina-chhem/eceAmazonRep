<?php

session_start();

$user='admin';
$passw='1234';

if(isset($_POST['submit']))
{
	$username = $_POST['username'];
	$password = $_POST['password'];
	if($username&&$password)
	{
		if($username==$user&&$password==$passw)
		{
			$_SESSION['username']=$username;
			header('Location: admin.php');		
		}
		else
		{
			echo'Identifiants eronnes';
		}
	}
	else
	{
		echo'Veuillez remplir tous les champs !';
	}
}

?>

<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
<h1>Administration - Connexion</h1>
<form action="" method="POST">
	<h3>Pseudo :</h3><input type="text" name="username"/><br/><br/>
	<h3>Mot de Passe :</h3><input type="password" name="password"/><br/><br/>
	<input type="submit" name="submit"/><br/><br/>
</form>

