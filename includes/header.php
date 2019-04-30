<?php
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
	</head>
	<header>
		<div class="titre">
			<h1>ECE Amazon</h1>
		</div>
		<ul id="menu">
			<li><a href="">Categories</a>
				<ul>
					<li><a href="livres.php">Livres</a></li>
					<li><a href="includes/musique.php">Musique</a></li>
					<li><a href="includes/vetements.php">Vetements</a></li>
					<li><a href="includes/sportsEtLoisir.php">Sports et Loisir</a></li>
				</ul>
			</li>
			<li><a href="ventesFlash.php">Ventes Flash</a></li>
			<li><a href="vendre.php">Vendre</a>
				<!--ul>
					<li><a href="add.php">Ajouter un item</a></li>
					<li><a href="del.php">Supprimer un item</a></li>
				</ul-->
			</li>
			<li><a href="monCompte.php">Mon Compte</a>
				<!--ul>
					<li><a href="adm.php">Admin</a></li>
					<li><a href="ven.php">Vendeur</a></li>
					<li><a href="ach.php">Acheteur</a></li>
				</ul-->
			</li>
			<li><a href="panier.php">Panier</a></li>
			<li><a href="../ECE_Amazon/admin/index.php">Admin</a></li>
		</ul>
	</header>
</html>