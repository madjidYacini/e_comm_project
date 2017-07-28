<link rel="stylesheet" type="text/css" href="./css/ex2.css">
	<?php
	include 'headervendeur.php';
	?>

	<?php 
	@$pid=$_GET['pid'];
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT description FROM produits WHERE pid=? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($pid));
		$row = $res->fetch();
		@$desc = $row['description'];
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT prix FROM produits WHERE pid=? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($pid));
		$row = $res->fetch();
		@$prix = $row['prix'];
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT qte FROM produits WHERE pid=? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($pid));
		$row = $res->fetch();
		@$qte = $row['qte'];
		//echo "$qte";
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}
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
	?>
	<h1> veulliez remplir les champs que vous voulez modifier</h1>
	<form methode='post' action='modif.php' >

		<table class="table table-striped">
			<tr>
				<th> description</th>
				<th> prix </th>
				<th>quantité</th>

			</tr>

			<tr>
				<input type ='hidden' name='id' value="<?php echo $produitId ;?>">
				<td><input type='text' name ='newDes' value ="<?php echo $desc;?>" ></td>
				<td> <input type='number' name ='newPrice' step='0.01' min="0" value="<?php echo $prix;?>" required value=''></td>
				<td> <input type='number' name ='newquantity' min="0" value="<?php echo $qte;?>" required value='' ></td>
			</tr>
		</table>
		<input type="submit"  class="btn btn-success"  value="Modifier">
	</form>

	<script type="text/javascript">
		myfunction(){
			var p =Confirm("produit modifié retourner a la ^page d'accueil en cliquant sur ok ")
			if (p) {
				document.location.href="espacevendeur.php";
			}else{
				document.location.href='modif_form.php';
			}
		}
	</script>





