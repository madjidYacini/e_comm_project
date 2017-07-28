<link rel="stylesheet" type="text/css" href="css/ex2.css">
<?php 
include 'headeracht.php'; ?>






<?php
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$stat ='acceptee';
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql ="SELECT * FROM commande where uid =? and statut =? ";
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid(),$stat));
	@$checkaccept = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$stat='refusee';
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql ="SELECT * FROM commande where uid =? and statut=? ";
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid(),$stat));
	
	@$checkrefus = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql ="SELECT * FROM commande where uid =? ";
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid()));
	
	@$checkexist = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
if ($checkexist==0) {
	?>
	<script type="text/javascript">
		alert("vous n'avez pas encore passé des commande pour pouvoir consulter votre historique");
		document.location.href='espaceacht.php';
	</script>
	<?php
}elseif ($checkrefus ==0 && $checkaccept ==0) {
	?>
	<script type="text/javascript">
		alert(" vos demandes ne sont pas encore traité");
		document.location.href='espaceacht.php';
	</script>
	<?php
}elseif ($checkrefus ==0 && $checkaccept!=0 ) {
 echo "<h1> Mon Historique</h1>";
 echo "<h2>Mes Commandes Acceptées </h2>";
 try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $stat='acceptee';
  $pdo=new PDO($dsn,$username,$password,$pdo_options);
  $sql ="SELECT produits.nom,commande.qte,commande.date ,commande.statut,produits.prix, (produits.prix * commande.qte )AS prixtot FROM (commande INNER JOIN produits on commande.pid=produits.pid) where commande.uid = ?   and commande.statut =?";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($idm->getUid(),$stat));
  echo
  "<table class =' table table-striped'>";
  echo "<tr>
  <th> Nom du Produits </th>
  <th> quantité </th>
  <th>Date De La Commande </th>
  <th>statut</th>
  <th> prix unitaire </th>
  <th> prix total </th>



</tr>";

while ($row = $res->fetch()){

  echo "<tr>
  <td> $row[nom]</td>
  <td> $row[qte]</td>
  <td> $row[date]</td>
  <td> $row[statut]</td>
  <td> $row[prix]</td>
  <td> $row[prixtot]</td>

</tr>";

}

echo "</table>";
echo "</table>";
echo "<br><br><br><br>";
echo "<div class ='well well-lg'>";
echo '<h2 class="a" style="color: #1a8c97;">vous n\'avez pas de commande refusées !</h2>';
echo "</div>";
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
}elseif ($checkrefus !=0 && $checkaccept===0) {
	echo "<h1> Mon Historique</h1>";
 echo "<h2>Mes Commandes Refusées </h2>";
 try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $stat='refusee';
  $pdo=new PDO($dsn,$username,$password,$pdo_options);
  $sql ="SELECT produits.nom,commande.qte,commande.date ,commande.statut FROM (commande INNER JOIN produits on commande.pid=produits.pid) where commande.uid = ?   and commande.statut =?";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($idm->getUid(),$stat));
  echo
  "<table class =' table table-striped'>";
  echo "<tr>
  <th> Nom du Produits </th>
  <th> qte </th>
  <th>Date De La Commande </th>
  <th>statut</th>



</tr>";

while ($row = $res->fetch()){

  echo "<tr>
  <td> $row[nom]</td>
  <td> $row[qte]</td>
  <td> $row[date]</td>
  <td> $row[statut]</td>

</tr>";

}

echo "</table>";
echo "</table>";
echo "<br><br><br><br>";
echo "<div class ='well well-lg'>";
echo '<h2 class="a" style="color: #1a8c97;">vous n\'avez pas de commande Acceptées ! </h2>';
echo "</div>";
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
}else{
	 echo "<h1> Mon Historique</h1>";
 echo "<h2>Mes Commandes Acceptées </h2>";
 try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $stat='acceptee';
  $pdo=new PDO($dsn,$username,$password,$pdo_options);
 $sql ="SELECT produits.nom,commande.qte,commande.date ,commande.statut,produits.prix, (produits.prix * commande.qte )AS prixtot FROM (commande INNER JOIN produits on commande.pid=produits.pid) where commande.uid = ?   and commande.statut =?";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($idm->getUid(),$stat));
  echo
  "<table class =' table table-striped'>";
  echo "<tr>
  <th> Nom du Produits </th>
  <th> qte </th>
  <th>Date De La Commande </th>
  <th>statut</th>
<th> prix unitaire </th>
  <th> prix total </th>


</tr>";

while ($row = $res->fetch()){

  echo "<tr>
  <td> $row[nom]</td>
  <td> $row[qte]</td>
  <td> $row[date]</td>
  <td> $row[statut]</td>
  <td> $row[prix]</td>
  <td> $row[prixtot]</td>

</tr>";
}
echo "</table>";
echo "<br><br><br><br>";
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
 echo "<h2>Mes Commandes Refusées </h2>";
 try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $stat='refusee';
  $pdo=new PDO($dsn,$username,$password,$pdo_options);
  $sql ="SELECT produits.nom,commande.qte,commande.date ,commande.statut FROM (commande INNER JOIN produits on commande.pid=produits.pid) where commande.uid = ?   and commande.statut =?";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($idm->getUid(),$stat));
  echo
  "<table class =' table table-striped'>";
  echo "<tr>
  <th> Nom du Produits </th>
  <th> qte </th>
  <th>Date De La Commande</th>
  <th>statut</th>



</tr>";

while ($row = $res->fetch()){

  echo "<tr>
  <td> $row[nom]</td>
  <td> $row[qte]</td>
  <td> $row[date]</td>
  <td> $row[statut]</td>

</tr>";

}

echo "</table>";
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}

}
?>









