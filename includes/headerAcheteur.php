<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
		<meta charset="utf-8">
	</head>
	<header>
		<div class="titre">
			<h1><a href="index.php"><img align="left" src="logo.png" width="60" height="45" ></a> ECE Amazon</h1>
		</div>
	</header>
	<body>
		<ul id="menu">
			<li><a href="indexAcheteur.php"><img src="accueil.png" width="15" height="15"> Accueil</a></li>
			<li><a href=""><img src="categories.png" width="15" height="15"> Categories</a>
				<ul>
					<li><a href="livresAcheteur.php"><img src="livres.png" width="15" height="15"> Livres</a></li>
					<li><a href="musiqueAcheteur.php"><img src="musique.png" width="15" height="15"> Musique</a></li>
					<li><a href="vetementsAcheteur.php"><img src="vetements.png" width="15" height="15"> Vetements</a></li>
					<li><a href="sportsEtLoisirAcheteur.php"><img src="sportetloisir.png" width="15" height="15"> Sports et Loisir</a></li>
				</ul>
			</li>
			<li><a href="ventesFlash.php"><img src="eclair.png" width="15" height="15"> Ventes Flash</a></li>
			<li><a href="indexVendeur.php"><img src="vendre.png" width="15" height="15"> Vendre</a></li>
			<li><a href="monCompteAcheteur.php"><img src="monCompte.png" width="15" height="15"> Mon Compte</a></li>
			<li><a href="panier.php"><img src="panier.png" width="15" height="15"> Panier</a></li>
			<li><a href="admin/indexAdmin.php"><img src="cadenas.png" width="15" height="15"> Admin</a></li>
			<li><a href="logoutAcheteur.php"><img src="deconnecter.png" width="15" height="15"> Deconnexion</a></li>
		</ul>
	</body>
</html>

<!-- https://www.youtube.com/playlist?list=PLHpC3gVKYuvfAEAAq4pp1k8YpQ-tWtKcB -->
