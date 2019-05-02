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
			<h1>ECE Amazon</h1>
		</div>
		<ul id="menu">
			<li><a href="index.php">Accueil</a></li>
			<li><a href="">Categories</a>
				<ul>
					<li><a href="livres.php">Livres</a></li>
					<li><a href="musique.php">Musique</a></li>
					<li><a href="vetements.php">Vetements</a></li>
					<li><a href="sportsEtLoisir.php">Sports et Loisir</a></li>
				</ul>
			</li>
			<li><a href="ventesFlash.php">Ventes Flash</a></li>
			<li><a href="indexVendeur.php">Vendre</a></li>
			<li><a href="monCompte.php">Mon Compte</a></li>
			<li><a href="panier.php">Panier</a></li>
			<li><a href="admin/indexAdmin.php">Admin</a></li>
		</ul>
	</header>
</html>

<!-- https://www.youtube.com/playlist?list=PLHpC3gVKYuvfAEAAq4pp1k8YpQ-tWtKcB -->