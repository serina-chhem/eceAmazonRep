<?php
session_start();



if (isset($_SESSION['username'])) {

	?>
	<h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>

	<?php
	if(isset($_GET['action'])){

if($_GET['action']=='add'){

	if(isset($_POST['submit'])){

		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];


if($title&&$description&&$price){

$bdd=mysql_connect('localhost','root','');
mysql_select_db('eceAmazon',$bdd); 

$sql = "INSERT INTO products VALUES('','$title','$description','$price')";
mysql_query($sql);


mysql_close();

echo "produit ajouté";


}else{
	echo "Veillez remplier tous les champs SVP";
}

}
?>
<form action="" method="post">
	<h3>Nom du produit :</h3><input type="text" name="title">
	<h3>Desciption :</h3><input type="text" name="description">
	<h3>Prix :</h3><input type="text" name="price"><br><br>
	<input type="submit" name="submit"/>

</form>

<?php

}else if($_GET['action']=='modifyanddelete'){

$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){

	$sql = "SELECT * from products";
	$result = mysqli_query($db_handle, $sql);
	while($data = mysqli_fetch_assoc($result)){

		
		echo "produit:".$data['title'].'<br>';
		?>
		<a href="?action=modify&amp;id=<?php echo $data["id"]; ?>">Modifier</a>
		<a href="?action=delete&amp;id=<?php echo $data["id"]; ?>">Supprimer</a> <br><br>
		<?php
		
	}
}

else {
	echo "Database not found";
}

mysqli_close($db_handle);





}else if($_GET['action']=='modify'){


}else if($_GET['action']=='delete'){

	$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){

	$id=$_GET['id'];
	$sql = "DELETE FROM products WHERE id=$id";
	$result = mysqli_query($db_handle, $sql);
	
}

else {
	echo "Database not found";
}

mysqli_close($db_handle);





}else{

	die('Une erreur s\'est produite.');
}


}






	}else{

		header('Location: ../index.php'); 
	}


?>


<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
<h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
</br>
<a href="?action=add">Ajouter un produits</a>
<a href="?action=modifyanddelete">Modifier ou supprimer un produits</a>
<br><br><br>
<a href="../index.php">Retour site</a>

