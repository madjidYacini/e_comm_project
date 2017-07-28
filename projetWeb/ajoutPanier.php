<?php include 'headeracht.php';
@$pid=$_GET['id'];
@$qte = $_GET['newquant'];
$uid=$idm->getUid();
@$statut="en_cours";
		try{
			$pdo=new PDO($dsn,$username,$password);
			$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$sql ="INSERT INTO commande VALUES (NULL,?,?,?,now(),?) ";
			$res=$pdo->prepare($sql);
			$res->execute(array($pid,$uid,$qte,$statut));
			if ($res) {
				?> <script type="text/javascript">
				var confirm=confirm("produit ajouté avec succes ! pour recommander un autre produit , cliquez sur ok ");
				if(confirm){
					document.location.href="listeproo_form.php";

				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}



?>
