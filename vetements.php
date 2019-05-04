<?php
require_once ('includes/header.php');
$database = "eceAmazon"; 
$db_handle = mysqli_connect('localhost', 'root', 'root') or die ("erreur de connexion");
$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");
if($db_found)
{
	if(isset($_GET['show']))
	{
		$product=$_GET['show'];
		$sql = "SELECT * from products WHERE title='$product'";
		$result = mysqli_query($db_handle, $sql);
		$data = mysqli_fetch_assoc($result);
		$description=$data["description"];
		$description_finale=wordwrap($description,200,'<br />',false);
		?>
		<br>
		<div class="texte-2" style="text-align: center;">
			<img src="imgs/<?php echo $data["title"];?>.jpg">
			<h1><?php echo $data["title"];?></h1>
			<h2><?php echo $data["price"];?> EUR</h2>
			<h5><?php echo $description_finale;?></h5>
			<a href="panier.php"><h4>Ajouter au panier</h4></a>
			<a href="vetements.php"><h4>Retour</h4></a>
		</div><br>
		<?php
	}
	else
	{
		?><div class="texte-2"><h1>Bienvenue dans la catégorie Vetements</h1></div><?php
		$sql = "SELECT * from products WHERE category='Vetements'";
		$result = mysqli_query($db_handle, $sql);
		while($data = mysqli_fetch_assoc($result))
		{
			$length=200;
			$description=$data["description"];
			$new_description=substr($description,0,$length)."...";
			$description_finale=wordwrap($new_description,75,'<br />',false);
			?>
			<br><br>
			<a href="?show=<?php echo $data["title"];?>"><img src="imgs/<?php echo $data["title"];?>.jpg"></a>
			<div class="texte-2">
				<a href="?show=<?php echo $data["title"];?>"><h2><?php echo $data["title"];?></h2></a>
			</div>
			<div class="texte-2">	
				<h5><?php echo $description_finale;?></h5>
			</div>
			<div class="texte-2">
				<h3><?php echo $data["price"];?> EUR</h3>
			</div>
			<div class="texte-2">
				<a href=""><h4>Ajouter au panier</h4></a>
			</div>
			<br/><br/><br/>
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