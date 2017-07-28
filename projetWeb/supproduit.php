<?php 
include 'headervendeur.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>suppression</title>
</head>
<body>
	<?php 
	$uid= $idm->getUid();
	@$nom = $_POST["nom"];
	$pid=$_GET['cbox'];
	if ($pid != null) {
	
	}
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
		
			$pdo = new PDO ("mysql:host=$hostname;dbname=$dbname",$username,$password);
			$sql ="DELETE FROM produits WHERE pid=?";
			$res=$pdo->prepare($sql);
			$res -> execute(array($pid));
			?> 
			 	<script type="text/javascript">
			 		var confirm = confirm('produit supprimé dans votre panier ! voulez vous supprimer d\'autre produits ?');
			 		if (confirm) {
			 				document.location.href='sup_form.php';
			 		}else{
			 		
			 			document.location.href='espacevendeur.php';
			 		}
			 	</script>
			 <?php
	
			$res->closeCursor();

		
	}catch (Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}
?>


</body>
</html>