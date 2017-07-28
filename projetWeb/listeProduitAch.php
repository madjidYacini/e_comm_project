<link rel="stylesheet" type="text/css" href="./css/ex2.css">
<?php include 'headeracht.php';  
@$nom = $_POST["nom"];
@$categorie =$_POST["categorie"];
@$fournisseur=$_POST['fournisseur'];

try{
	$pdo = new PDO ($dsn,$username,$password);
	$sql ="SELECT ctid FROM categories WHERE nom=? ";
	$res =$pdo->prepare($sql);
	$res ->execute(array($categorie));
	$row = $res->fetch();
	@$ctid = $row['ctid'];

}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

try{
	$pdo= new PDO ($dsn ,$username,$password);
	$sql= 'SELECT qte from produits where nom=?';
	$res=$pdo->prepare($sql);
	$res->execute(array($nom));
	$row = $res->fetch();
	@$qtee = $row['qte'];
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

try{
	$pdo= new PDO ("mysql:host=$hostname;dbname=$dbname;charset=utf8" ,$username,$password);
	$sql= 'SELECT * from produits where ctid=?';
	$res=$pdo->prepare($sql);
	$res->execute(array($ctid));
	@$checkCategorie = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

try{
			$sql = "SELECT * FROM users where  login LIKE ? ";
			$res =$pdo->prepare($sql);
			$res ->execute(array($fournisseur));
			@$checkexist = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

$qte=0;
@$fournisseur=$_POST['fournisseur'];
try{
	$pdo = new PDO ($dsn,$username,$password);
	$sql ="SELECT uid FROM users WHERE login = ? ";
	$res =$pdo->prepare($sql);
	$res ->execute(array($fournisseur));
	$row = $res->fetch();
	$uid = $row['uid'];
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}



try{
	$pdo = new PDO ($dsn,$username,$password);
	if(((empty($nom))&&(empty($categorie))&&(empty($fournisseur)))) {
		?>
		<script type="text/javascript">
			var conf =confirm('vous devez au moins remplir un de ces champs pour pouvoir effectuer une recherche ! si vous voulez voir la liste compléte cliquez sur ok! dans le cas contraire vous serez rederigez vers la page de recherche ');
			if (conf) {
				document.location.href='list.php';
			}else{
				document.location.href='listeProduitAch.php';
			}
		</script>
		<?php

	}
	elseif ((isset($nom))&&(empty($categorie))&&(empty($fournisseur))) {
		
		try{
			$sql = "SELECT * FROM produits where nom LIKE ? ";
			$res =$pdo->prepare($sql);
			$res ->execute(array($nom));
			@$check = count($res->fetchAll());
			

			if ($check==0) {

				?>
				<script>
					var p=confirm('produit ne figure pas dans la liste des vendeur , effectuez une autre recherche en cliquant sur ok  ');
					if (p) {
						document.location.href='listeproo_form.php';
					}else{
						document.location.href='espaceacht.php';
					}
				</script>
				<?php
			}elseif($qtee==0 && $check==1){
				?>
				<script>
					var p=confirm('Le produit existe  mais il est epuisé, effectuez une autre recherche en cliquant sur ok  ');
					if (p) {
						document.location.href='listeproo_form.php';
					}else{
						document.location.href='espaceacht.php';
					}
				</script>
				<?php
			}else {

				$sql = "SELECT * FROM produits where nom LIKE ? and qte >?";
				$res =$pdo->prepare($sql);
				$res ->execute(array($nom,$qte ));	
				echo "<div class= ''>";
				echo '<div class="well well-lg">
  <h1 style="text-align: center;" class="az">etape 2/3 :Selectionner un des produits proposé correspondants a votre recherche</h1>
</div>';
				echo "<form methode='post' >";
				echo
				"<table class =' table table-striped'>";
				echo "<tr>
				<th> cocher  </th>
				<th> nom </th>
				<th> description</th>
				<th> qte </th>
				<th>prix</th>

			</tr>";

			while ($row = $res->fetch()){

				echo "<tr>
				<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
				<td> $row[nom]</td>
				<td> $row[description]</td>
				<td> $row[qte]</td>
				<td> $row[prix]</td>
			</tr>";

		}
		echo "</table >";
		
		echo "</form >";
		echo "</div>";
	}
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
}elseif ((empty($nom))&&(isset($categorie))&&(empty($fournisseur))) {
	try{
		if ($checkCategorie==0) {
			?>
			<script>
				var p=confirm('y a pas de produit dans cette categorie , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}
		$sql = "SELECT * FROM produits where ctid = ? and qte >?";
		$res =$pdo->prepare($sql);
		$res ->execute(array($ctid,$qte));
		echo"<h1>les resultats de votre recherche</h1>";
		echo "<form methode='post' >";
		echo
		"<table class =' table table-striped'>";
		echo "<tr>
		<th> cocher  </th>
		<th> nom </th>
		<th> description</th>
		<th> qte </th>
		<th>prix</th>

	</tr>";

	while ($row = $res->fetch()){

		echo "<tr>
		<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
		<td> $row[nom]</td>
		<td> $row[description]</td>
		<td> $row[qte]</td>
		<td> $row[prix]</td>
	</tr>";

}
echo "</table>";
echo "</form>";
}catch (Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
}elseif (((empty($nom))&&(empty($categorie))&&(isset($fournisseur)))) {
	
	try{
		$sql = "SELECT * FROM produits where uid = ? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($uid));
		@$checkfournisseur = count($res->fetchAll());
			if ($checkexist==0) {
			?>
			<script>
				var p=confirm('le fournisseur que vouz venez d\'introduire n\'existe  pas  , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
			}elseif ($checkfournisseur==0 && $checkexist >0 ) {

			?>
			<script>
				var p=confirm('le fournisseur existe mais il a pas mis de produit  a vendre   , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}else{
			$sql = "SELECT * FROM produits where uid = ? ";
			$res =$pdo->prepare($sql);
			$res ->execute(array($uid));
			echo"<h1>les resultats de votre recherche</h1>";
			echo "<form methode='post' >";
			echo
			"<table class =' table table-striped'>";
			echo "<tr>
			<th> cocher  </th>
			<th> nom </th>
			<th> description</th>
			<th> qte </th>
			<th>prix</th>

		</tr>";

		while ($row = $res->fetch()){

			echo "<tr>
			<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
			<td> $row[nom]</td>
			<td> $row[description]</td>
			<td> $row[qte]</td>
			<td> $row[prix]</td>
		</tr>";

	}
	echo "</table>";
	echo "</form>";
}
}catch (Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
}elseif (((isset($nom))&&(isset($categorie))&&(empty($fournisseur)))) {
	
	try {
		$sql = "SELECT * FROM produits where nom = ? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($nom));
		@$check = count($res->fetchAll());
		if ($check==0 ) {

			?>
			<script>
				var p=confirm('le produit ne figure pas dans la liste , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
			
		}elseif($qtee==0 && $check ==1 && $checkCategorie!=0){
			?>
			<script>
				var p=confirm('Le produit existe  mais il est epuisé, effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif ($checkCategorie==0 && $check >0) {
		?>
		<script>
				var p=confirm('le produit existe mais vous avez mal introduit la categorie , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
		<?php
		} else{
			$sql = "SELECT * FROM produits where nom = ? AND ctid= ? and qte >?";
			$res =$pdo->prepare($sql);
			$res ->execute(array($nom,$ctid,$qte));
			echo"<h1>les resultats de votre recherche</h1>";
			echo "<form methode='post'>";
			echo
			"<table class =' table table-striped'>";
			echo "<tr>
			<th> cocher  </th>
			<th> nom </th>
			<th> description</th>
			<th> qte </th>
			<th>prix</th>

		</tr>";

		while ($row = $res->fetch()){

			echo "<tr>
			<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
			<td> $row[nom]</td>
			<td> $row[description]</td>
			<td> $row[qte]</td>
			<td> $row[prix]</td>
		</tr>";

	}
	echo "</table>";
	echo "</form>";
}
} catch (Exception $e) {
	http_response_code(500);
	echo "Erreur de serveur.";
}

}elseif (((isset($nom))&&(empty($categorie))&&(isset($fournisseur)))) {
	
	try{
		$sql = "SELECT * FROM produits where nom = ? and uid= ?";
		$res =$pdo->prepare($sql);
		$res ->execute(array($nom,$uid));
		@$check1 = count($res->fetchAll());
		$sql = "SELECT * FROM produits where uid = ? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($uid));
		@$check2 = count($res->fetchAll());
		if ($check1==0 && $check2 != 0) {

			?>
			<script>
				var p=confirm('le produit ne figure pas dans la liste , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif ($check1 != 0 && $check2 ==0) {
			?>
			<script>
				var p=confirm('le fournisseur que vouz venez d\'introduire n\'existe  pas  , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif ($check2==0 && $check1==0) {
			?>
			<script>
				var p=confirm('le produit et le fournisseur n\'existent pas   , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif($qtee==0 && $check1==1){
			?>
			<script>
				var p=confirm('le produit et le fournisseur n\'existent pas   , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}else{
			$sql = "SELECT * FROM produits where nom = ? AND uid= ? and qte >?";
			$res =$pdo->prepare($sql);
			$res ->execute(array($nom,$uid,$qte ));
			echo"<h1>les resultats de votre recherche</h1>";
			echo "<form methode='post' >";
			echo
			"<table class =' table table-striped'>";
			echo "<tr>
			<th> cocher  </th>
			<th> nom </th>
			<th> description</th>
			<th> qte </th>
			<th>prix</th>

		</tr>";

		while ($row = $res->fetch()){

			echo "<tr>
			<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
			<td> $row[nom]</td>
			<td> $row[description]</td>
			<td> $row[qte]</td>
			<td> $row[prix]</td>
		</tr>";

	}
	echo "</table>";
	echo "</form>";

}
}catch (Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

}elseif (((empty($nom))&&(isset($categorie))&&(isset($fournisseur)))) {
	
	try{

		$sql = "SELECT * FROM produits where uid = ? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($uid));
		$row = $res->fetch();
		@$qte = $row['qte'];
		@$check = count($res->fetchAll());
		echo "$check";
		if ($check==0) {

			?>
			<script>
				var p=confirm('le fournisseur que vouz venez d\'introduire n\'existe  pas  , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif ($check >0 && $checkCategorie==0) {
			?>
			<script>
				var p=confirm('il parrait que le fournisseur n\'a pas de prduit en ligne concernant cette categorie , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}else{
			$sql = "SELECT * FROM produits where ctid = ? AND uid= ?";
			$res =$pdo->prepare($sql);
			$res ->execute(array($ctid,$uid));
			echo"<h1>les resultats de votre recherche</h1>";
			echo "<form methode='post'>";
			echo
			"<table class =' table table-striped'>";
			echo "<tr>
			<th> cocher  </th>
			<th> nom </th>
			<th> description</th>
			<th> qte </th>
			<th>prix</th>

		</tr>";

		while ($row = $res->fetch()){

			echo "<tr>
			<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
			<td> $row[nom]</td>
			<td> $row[description]</td>
			<td> $row[qte]</td>
			<td> $row[prix]</td>
		</tr>";

	}
	echo "</table>";

	echo "</form>";
}
}catch (Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

}
elseif (((isset($nom))&&(isset($categorie))&&(isset($fournisseur)))) {

	try{

		$sql = "SELECT * FROM produits where nom = ? and uid =?";
		$res =$pdo->prepare($sql);
		$res ->execute(array($nom,$uid));
		@$check1 = count($res->fetchAll());
		$sql = "SELECT * FROM produits where uid = ? ";
		$res =$pdo->prepare($sql);
		$res ->execute(array($uid));
		@$check2 = count($res->fetchAll());
		if ($check1==0 && $check2 != 0 && $checkCategorie !=0 ) {

			?>
			<script>
				var p=confirm('le produit ne figure pas dans la liste , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif ($check1 != 0 && $check2 ==0 && $checkCategorie!=0) {
			?>
			<script>
				var p=confirm('le fournisseur que vouz venez d\'introduire n\'existe  pas  , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}elseif ($check1 != 0 && $check2 !=0 && $checkCategorie==0) {
		?>
			<script>
				var p=confirm('vous vous etes trompé de la categorie, effectuez une autre recherche en cliquant sur ok ou voir la liste complete ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='list.php';
				}
			</script>
			<?php
		} elseif ($check2==0 && $check1==0 && $checkCategorie!=0) {
			?>
			<script>
				var p=confirm('le produit et le fournisseur n\'existent pas   , effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
			
		}elseif($qtee==0 && $check1 ==1){
			?>
			<script>
				var p=confirm('Le produit existe  mais il est epuisé, effectuez une autre recherche en cliquant sur ok  ');
				if (p) {
					document.location.href='listeproo_form.php';
				}else{
					document.location.href='espaceacht.php';
				}
			</script>
			<?php
		}else {
			$sql = "SELECT * FROM produits where ctid = ? AND uid= ? AND nom=? AND qte >?";
			$res =$pdo->prepare($sql);
			$res ->execute(array($ctid,$uid,$nom,$qte));

			echo"<h1>les resultats de votre recherche</h1>";
			echo"<form method = 'post' >";
			echo
			"<table class =' table table-striped'>";
			echo "<tr>
			<th> cocher  </th>
			<th> nom </th>
			<th> description</th>
			<th> qte </th>
			<th>prix</th>

		</tr>";

		while ($row = $res->fetch()){

			echo "<tr>
			<td> <a href= 'ajoutPanier2.php?pid=$row[pid]'  ><i class='fa fa-shopping-cart'> Ajouter Au Panier </i></a></td>
			<td> $row[nom]</td>
			<td> $row[description]</td>
			<td> $row[qte]</td>
			<td> $row[prix]</td>
		</tr>";

	}
	echo "</table>";
	echo "</form>";
}
}catch (Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

}
}catch (Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
?>