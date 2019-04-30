
<?php
	require_once ('includes/header.php');
	
	
$database = "eceAmazon"; 


$db_handle = mysqli_connect('localhost', 'root', '') or die ("erreur de connexion");

$db_found = mysqli_select_db($db_handle, $database) or die ("erreur de selection");

if($db_found){

	$sql = "SELECT * from products";
	$result = mysqli_query($db_handle, $sql);
	while($data = mysqli_fetch_assoc($result)){
		?>
		<h2><?php echo $data["title"];?></h2>
		
		
		<?php
	}
	
}

else {
	echo "Database not found";
}

mysqli_close($db_handle);














	require_once ('includes/footer.php');

?>