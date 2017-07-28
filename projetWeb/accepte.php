<?php include("headervendeur.php") ?>


<?php 
$cmid= $_GET['cmdid'];
$stat='acceptee';
/*recuperation du pid*/
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
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo = new PDO ($dsn,$username,$password);
  $sql ="SELECT qte FROM commande WHERE cmdid=? ";
  $res =$pdo->prepare($sql);
  $res ->execute(array($cmid));
  $row = $res->fetch();
  @$qtee = $row['qte'];
 
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
/*********/
/*tester si la quantité du produit n'est pas epuiser*/
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
<script type="text/javascript">alert("la quantité de ce produit est epuisée soit refusez la commande ou attendre jusqu'a ce que vous ayez ce produit ")
 javascript:history.back()</script>
  <?php
  }else{
  	try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql="UPDATE commande SET statut=? WHERE cmdid = ? ";
	$res=$pdo->prepare($sql);
	$res -> execute(array($stat,$cmid));

	?><script>
	var p=confirm('commande acceptée! voulez vous retournez vers la page d\'accueil ?');
	if (p) {
		  document.location.href='espacevendeur.php';
	}else{
		document.location.href='consult.php';
	}
	</script>
	

	<?php 
	$res->closeCursor();

}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql="SELECT  * from commande WHERE statut=? AND cmdid=?";
	$res=$pdo->prepare($sql);
	$res -> execute(array($stat,$cmid));
	 @$check = count($res->fetchAll());
	 if ($check>0) {
	 	  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
   $pdo=new PDO($dsn,$username,$password,$pdo_options);
   $sql="UPDATE produits SET qte=qte-?  WHERE pid=?";
   $res=$pdo->prepare($sql);
   $res -> execute(array($qtee,$pid));
   $res->closeCursor();
   ?>
	<?php
	 }
	
	
	$res->closeCursor();

}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
  }
}catch(Exception $e){
	http_response_code(500);
	echo "erreur du serveur ";
}


/**/
?>
 <a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button"  data-toggle="tooltip" data-placement="bottom"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>  