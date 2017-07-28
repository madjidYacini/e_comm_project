<?php include 'headeracht.php';  ?>
<!DOCTYPE html>
<html>
<head>
	<title>liste des produits</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/ex2.css">	
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body class="mybackground">

	<?php 
	$qte=0;
	try {
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT * FROM produits where qte>? ";
		$res =$pdo->prepare($sql);
		$res->execute(array($qte));

		echo '<div class="well well-lg">
  <h1 style="text-align: center;" class="az">etape 2/3 :Selectionner un des produits proposé correspondants a votre recherche</h1>
</div>';
		echo "<form methode='post'>";
		echo
		"<table class =' table table-striped'>";
		echo "<tr>
		<th> Action  </th>
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
	}catch(Exception $e){
		http_response_code(500);
		echo "Erreur de serveur.";
		exit();
	}
	?>
	
</body>
</html> 


