<?php
include 'headervendeur.php';
$pid=$_GET['id'];
@$des=$_GET["newDes"]; 
@$prix=$_GET["newPrice"];
@$qte =$_GET["newquantity"];
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql="UPDATE produits SET description=?,prix=?, qte=?  WHERE pid = ? ";
	$res=$pdo->prepare($sql);
	$res -> execute(array($des,$prix,$qte,$pid));
	$res->closeCursor();
?>
<script type="text/javascript">
	var p = confirm("produit a ete bien modifié! pour modifier un autre produit cliquez sur ok");
	if (p) {
		document.location.href='modif_form.php';
	}else{
		document.location.href='espacevendeur.php';
	}
</script>
<?php
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

?>
