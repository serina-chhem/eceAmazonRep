<?php
require_once ('includes/headerAcheteur.php');
/*session_start();*/
if (isset($_SESSION['email']) && isset($_SESSION['password']))
{
	/*echo "Connexion établie ! Bienvenue dans la catégorie Livres".'<br>';&& isset($_SESSION['id'])&& isset($_SESSION['stock'])*/
	
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
				<?php
				$_SESSION['id']=$data["id"];
				$_SESSION['stock']=$data["stock"];
				$_SESSION['vente']=$data["vente"];
				 if($data["stock"]!=0){?>
					<h5>Stock : <?php echo $data["stock"];?></h5>
					<a href="panier.php"><h3>Ajouter au panier</h3></a>
					<a href="?action=acheterUnClick"><h3>Acheter en un click</h3></a> <?php
					if(isset($_GET['action'])){
					if($_GET['action']=='acheterUnClick')
					{
						
						header("Location: verificationCarteAcheteur.php");	
						
					}}
				}else{echo'<h5 style="color:red;"> Produit victime de son succès<h5>';}?>
				<a href="livresAcheteur.php"><h4>Retour</h4></a>
			</div>
			<br>
			<?php
		}
		else
		{	
			?><div class="texte-2"><h1>Bienvenue dans la catégorie Livres</h1></div><?php
			$sql = "SELECT * from products WHERE category='Livres'";
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
					<?php
					
				 if($data["stock"]!=0){?>
					<h5>Stock : <?php echo $data["stock"];?></h5>
					<a href="panier.php"><h3>Ajouter au panier</h3></a> 
					
					<?php if(isset($_GET['action'])){

					if($_GET['action']=='acheterUnClick')
					{
						header("Location: verificationCarteAcheteur.php");	
					}}
					
				}else{echo'<h5 style="color:red;"> Produit victime de son succès<h5>';}?>
				</div>
				
				<?php 
			}
		}
	
	mysqli_close($db_handle);
}
}
require_once ('includes/footer.php');
?>