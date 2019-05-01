
<?php

	require_once ('includes/header.php');
	
	
$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){


	if(isset($_GET['show'])){

		$product=$_GET['show'];
		$sql = "SELECT * from products WHERE title='$product'";
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);
		$description=$data["description"];
		$description_finale=wordwrap($description,20,'<br />',false);


		?>
		<br>
		<div style="text-align: center;">
		<img src="admin/imgs/<?php echo $data["title"];?>.jpg">
		<h1><?php echo $data["title"];?></h1>
		<h5><?php echo $description_finale;?></h5>
		</div><br>



		<?php




	}else{


	
	$sql = "SELECT * from products WHERE category='sportsEtLoisir'";
	$result = mysqli_query($db_handle, $sql);


	while($data = mysqli_fetch_assoc($result)){

		$length=50;
	$description=$data["description"];
	$new_description=substr($description,0,$length)."...";
	$description_finale=wordwrap($new_description,20,'<br />',false);

		 ?>
		<br><br>
		<a href="?show=<?php echo $data["title"];?>""><img src="admin/imgs/<?php echo $data["title"];?>.jpg"></a>
		<a href="?show=<?php echo $data["title"];?>""><h2><?php echo $data["title"];?></h2></a>
		<h5><?php echo $description_finale;?></h5>
		<h4><?php echo $data["price"];?> EUR</h4><br/>
		<a href="">Ajouter au panier</a>
		<br/><br/>
		
		<?php 
	}



}


/*else {
	echo "Database not found";
}*/

mysqli_close($db_handle);


}











	require_once ('includes/footer.php');

?>