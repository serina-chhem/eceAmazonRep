<link href="../style/bootstrap.css" type="text/css" rel="stylesheet"/>
<meta charset="utf-8">
<header>
	<div class="titre">
		<h1>Administration - Connexion</h1>
	</div>
</header>
	<div class="retour">
		<a href="../index.php">Retour site</a>
	</div>

<div class="texte">
	<form action="" method="POST">
		<h3>Identifiant :</h3><input type="text" name="username"/><br/><br/>
		<h3>Mot de Passe :</h3><input type="password" name="password"/><br/><br/>
		<input type="submit" name="submit"/><br/><br/>
	</form>
</div>
<br/>
<div class="texte">
	<h4><?php
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
				echo'*Identifiant ou Mot de Passe incorrect';
			}
		}
		else
		{
			echo'*Veuillez remplir tous les champs !';
		}
	}
	?></h4>
</div>
<br/>

<?php require_once ('../includes/footer.php'); ?>
