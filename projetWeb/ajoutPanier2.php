<link rel="stylesheet" type="text/css" href="css/ex2.css">
<?php include 'headeracht.php';
@$pid=$_GET['pid'];
try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT pid FROM produits WHERE pid=? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($pid));
		$row = $res->fetch();
		@$produitId = $row['pid'];
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}


try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT nom FROM produits WHERE pid=? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($pid));
		$row = $res->fetch();
		@$nom  = $row['nom'];
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}

try{
	$pdo_options[PDO::ATTR_ERRMODE]=PDO::ERRMODE_EXCEPTION;
	$pdo=new pdo($dsn,$username,$password,$pdo_options);
	$sql="SELECT qte from produits WHERE pid =?";
	$res= $pdo->prepare($sql);
	$res->execute(array($pid));
	$row = $res->fetch();
	@$qte = $row['qte'];
	if ($qte==0) {
		?>
		<script type="text/javascript">
			alert("la quantité de ce produit est epuisée veulliez la commander plutard");
			document.location.href='listeproo_form.php';
		</script>
		<?php
	}else{
		
				?>
				<div class="well well-lg">
  <h2 style="text-align: center;">Etape 3/3 : Selectionner la quantité voulue.<br> la quantité ne doit pas depassé la quantité disponible mise par le vendeur qui est : <?php echo $qte ?></h2>
</div>
				<form methode='post' action='ajoutPanier.php' >

		<table class="table table-striped">
			<tr>
				<th> Nom du produit à ajouter</th>
				<th> la quantité à ajouter de ce produits  </th>
			</tr>

			<tr>
				<input type ='hidden' name='id' value="<?php echo $produitId ;?>">
				<td><?php echo $nom?></td>
				
				<td><input type="number" name="newquant" min="1" max="<?php echo $qte;?>"   required value =""></td>
			</tr>
		</table>
		<input type="submit"  class="btn btn-success"  value="Ajouter">
	</form>
			<?php
		}
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}
