<?php 
include 'headeracht.php';  ?>
<?php 

	$cmid=$_GET['cmdid'];

	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password);
		
			$pdo = new PDO ($dsn,$username,$password);
			$sql ="DELETE FROM commande WHERE cmdid=?";
			$res=$pdo->prepare($sql);
			$res -> execute(array($cmid));
			 ?> 
			 	<script type="text/javascript">
			 		var confirm = confirm('produit supprimé dans votre panier ! voulez vous supprimer d\'autre produits ?');
			 		if (confirm) {
			 				document.location.href='supCommande.php';
			 		}else{
			 		
			 			document.location.href='espaceacht.php';
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

