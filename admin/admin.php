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
mysql_select_db('bdd1',$bdd); 

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

/*}else if($_GET['action']=='modifyanddelete'){

$bdd=mysql_connect('localhost','root','');
mysql_select_db('bdd1',$bdd); 

$sql = "SELECT * FROM products";
mysql_query($sql);

while($s = mysqli_fetch_assoc($bdd)){
	echo $s- >$title '<br/>';
}


mysql_close();*/



}else if($_GET['action']=='modify'){


}else if($_GET['action']=='delete()'){


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


