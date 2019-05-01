<?php
session_start();


?>
<link href="style/bootstrap.css" type="text/css" rel="stylesheet"/>
<h1>Bienvenue, <?php echo $_SESSION['username']; ?></h1>
</br>
<a href="?action=add">    Ajouter un produits </a>											
<a href="?action=modifyanddelete">      Modifier ou supprimer un produits</a><br><br>

<?php



if (isset($_SESSION['username'])) {

	?>
	

	<?php
	if(isset($_GET['action'])){

if($_GET['action']=='add'){

	if(isset($_POST['submit'])){          /*Récupération des infos du formulaire pour ajouter un produit*/   

		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];
		$category=$_POST['category'];
		$img=$_FILES['img']['name'];
		$img_tmp = $_FILES['img']['tmp_name'];

		if(!empty($img_tmp)){

			$image=explode('.',$img);
			$image_ext=end($image);

			if(in_array(strtolower($image_ext), array('png','jpg','jpeg'))==false){
				echo'Veuillez rentrer une image ayant pour extension : png, jpg, ou jpeg';
			}else{
				$image_size=getimagesize($img_tmp);
				if($image_size['mime']=='image/jpeg'){
					$image_src=imagecreatefromjpeg($img_tmp);
				}else if ($image_size['mime']=='image/png') {
					$image_src=imagecreatefrompng($img_tmp);
					
				}else{
					$image_src=false;
					echo'Veuillez rentrer une image valide';
				}
				if($image_src!==false){
					$image_width=200;
					if($image_size[0]==$image_width){
						$image_finale=$image_src;
					}else{
						$new_width[0]=$image_width;
						$new_height[1]=200;
						$image_finale=imagecreatetruecolor($new_width[0],$new_height[1]);
						imagecopyresampled($image_finale, $image_src, 0, 0, 0, 0, $new_width[0], $new_height[1], $image_size[0], $image_size[1]);
					}
					imagejpeg($image_finale,'imgs/'.$title.'.jpg');
				}

			}

		}else {
			echo 'Veuillez rentrer une image';
		}



 if($title&&$description&&$price&&$category){      /*si tous les champs sont remplis, alors requete pour envoyer les infos dans la bdd*/



$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){

	$sql = "INSERT INTO products VALUES('','$title','$description','$price','$category')";
	$result = mysqli_query($db_handle, $sql);
}
	else {
	echo "Database not found";
}


mysqli_close($db_handle);

echo "produit ajouté";


}else{
	echo "Veuillez remplir tous les champs SVP";
}

}
?>
<form action="" method="post" enctype="multipart/form-data">      <!--Formulaire pour ajouter un produit -->
	<h3>Nom du produit :</h3><input type="text" name="title">
	<h3>Desciption :</h3><textarea  name="description"></textarea>
	<h3>Prix :</h3><input type="text" name="price"><br><br>
	<h3>Image :</h3>
	<input type="file" name="img"><br><br><br><br>
	<h3>Categorie :</h3><select name="category">
		<?php 

$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){

	$sql = "SELECT * from category";
	$result = mysqli_query($db_handle, $sql);
	while($data = mysqli_fetch_assoc($result)){

		?>
		<option><?php echo $data['name'];?></option>

		
		<?php
		
	}
}

else {
	echo "Database not found";
}

mysqli_close($db_handle);



?>


	</select><br><br>





	<input type="submit" name="submit"/>

</form>

<?php

}else if($_GET['action']=='modifyanddelete'){    /*redirige sur une page affichant les produits et les options permettant de modifier ou supprimer un produit*/

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





}else if($_GET['action']=='modify'){     /*Modifier un produit de la bdd*/

	$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){



	$id=$_GET['id'];
	$sql = "SELECT * from products WHERE id=$id";
	$result = mysqli_query($db_handle, $sql);
	$data = mysqli_fetch_assoc($result);



	
}






	?>
	<form action="" method="post">
	<h3>Nom du produit :</h3><input value="<?php echo $data["title"];?>"" type="text" name="title">
	<h3>Desciption :</h3><textarea name="description"><?php echo $data["description"];?>  </textarea>
	<h3>Prix :</h3><input value="<?php echo $data["price"];?>" name="price"><br><br>
	<input type="submit" name="submit" value="Modifier" />

</form>



	<?php

	if (isset($_POST['submit'])) {

		$title=$_POST['title'];
		$description=$_POST['description'];
		$price=$_POST['price'];

		$update="UPDATE products SET title='$title',description='$description',price='$price' WHERE id=$id";
		$result2 = mysqli_query($db_handle, $update);

		header('Location: admin.php?action=modifyanddelete');
	}




	else {
	echo "Database not found";
}

mysqli_close($db_handle);


}else if($_GET['action']=='delete'){         /*Supprimer un produit du site*/

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



<br><br><br>
<a href="../index.php">Retour site</a>

