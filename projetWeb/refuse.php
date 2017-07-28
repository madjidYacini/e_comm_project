<?php include("headervendeur.php") ?>


<?php 
$cmid= $_GET['cmdid'];
$stat='refusee';

try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo = new PDO ($dsn,$username,$password);
  $sql ="SELECT pid FROM commande WHERE cmdid=? ";
  $res =$pdo->prepare($sql);
  $res ->execute(array($cmid));
  $row = $res->fetch();
  @$pid = $row['pid'];
 
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
  	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql="UPDATE commande SET statut=? WHERE cmdid = ? ";
	$res=$pdo->prepare($sql);
	$res -> execute(array($stat,$cmid));

	?><script>alert('commande refusée !');
		document.location.href='consult.php';
	</script>";
<?php
	$res->closeCursor();

}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

  
}catch(Exception $e){
	http_response_code(500);
	echo "erreur du serveur ";
}


/**/
?>