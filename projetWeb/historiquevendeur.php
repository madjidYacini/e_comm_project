<link rel="stylesheet" type="text/css" href="css/ex2.css">
<?php 
include 'headervendeur.php'; ?>
<title>Mon Historique</title>




<?php
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$stat='acceptee';
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? and commande.statut=? ";
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid(),$stat));
	@$checkcommande = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
try{
	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$statut='refusee';
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? and commande.statut = ? ";
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid(),$statut));
	@$checkcommande1 = count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}

try{
$pdo_options [PDO::ATTR_ERRMODE]= PDO::ERRMODE_EXCEPTION;
	$pdo= new PDO($dsn,$username,$password,$pdo_options);
	$sql='SELECT* FROM produits where uid = ?';
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid()));
	$checkexist1= count($res->fetchAll());
}catch(Exception $e){
	http_response_code(500);
	die('erreur de server ');
}
try{
	$pdo_options [PDO::ATTR_ERRMODE]= PDO::ERRMODE_EXCEPTION;
	$pdo= new PDO($dsn,$username,$password,$pdo_options);
	$sql='SELECT* FROM (commande inner join produits on produits.pid = commande.pid ) where produits.uid = ?';
	$res =$pdo->prepare($sql);
	$res->execute(array($idm->getUid()));
	$checkexist= count($res->fetchAll());
	
}catch(Exception $e){
	http_response_code(500);
	die('erreur de server ');
}


if ($checkexist==0 && $checkexist1==0) {
	?><script type="text/javascript">
		var conf=confirm("votre compte est vide veulliez le remplir en cliquant sur ok");
			if(conf){
				document.location.href='ajout_form.php';
			}else{
				document.location.href='espacevendeur.php';
			}
	</script>
	<?php
}elseif ($checkexist==0) {
	?>
	<script type="text/javascript">
		alert('vous n \'avez aucune commande reçu !');
		document.location.href="espacevendeur.php";
	</script>
	<?php
} elseif ($checkcommande ==0 && $checkcommande1==0) {
	?>
	<script type="text/javascript">
		var con=confirm(' vous n\'avez pas encore traité les commande reçus. pour verifier si vous avez de commande cliquez sur ok ');
		if (con) {
			document.location.href='consult.php';
		}else{
			document.location.href='espacevendeur.php';
		}
	</script>
	<?php
} elseif ($checkcommande !=0 && $checkcommande1 ==0) {
	?>
		<h1>Mon Historique</h1>
	<?php
	echo '<h2 class="a" style="color: #1a8c97;">Historique de  Commandes acceptées </h2>';
	try{
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$stat='acceptee';
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT produits.nom,commande.qte,commande.date, commande.statut,produits.description FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? and commande.statut = ? ";
		$res = $pdo-> prepare($sql);
		$res ->execute(array($idm->getUid(),$stat));
		echo
		"<table class =' table table-striped'>";
		echo "<tr>
		<th> nom  </th>
		<th> description</th>
		<th> quantité </th>
		<th>date</th>
		<th>statut</th>



	</tr>";

	while ($row = $res->fetch()){

		echo "<tr>
		<td> $row[nom]</td>
		<td> $row[description]</td>
		<td> $row[qte]</td>
		<td> $row[date]</td>
		<td> $row[statut]</td>

	</tr>";

}

echo "</table>";
echo "<br><br><br><br>";
echo "<div class ='well well-lg'>";
echo '<h2 class="a" style="color: #1a8c97;">vous n\'avez pas de commande refusées</h2>';
echo "</div>";
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}
}elseif($checkcommande ==0 && $checkcommande1 !=0){
	?> <h2  style="color: #1a8c97;"> Historique de  Commandes refusées</h2> <?php
	
	try{

		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$stat='refusee';
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT produits.nom,commande.qte,commande.date, commande.statut,produits.description FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? and commande.statut = ? ";
		$res = $pdo-> prepare($sql);
		$res ->execute(array($idm->getUid(),$stat));
		echo
		"<table class =' table table-striped'>";
		echo "<tr>
		<th> nom  </th>
		<th>description </th>
		<th> quantité </th>
		<th>date</th>
		<th>statut</th>



	</tr>";

	while ($row = $res->fetch()){

		echo "<tr>
		<td> $row[nom]</td>
		<td> $row[description]</td>
		<td> $row[qte]</td>
		<td> $row[date]</td>
		<td> $row[statut]</td>

	</tr>";

}

echo "</table>";
echo "<br><br><br><br>";
echo "<div class ='well well-lg'>";
echo '<h2 class="a" style="color: #1a8c97;">vous n\'avez pas accepter de commande </h2>';
echo "</div>";
}catch(Exception $e){
	http_response_code(500);
	echo "Erreur de serveur.";
	exit();
}


}else{
	try{
		?>
		<br><br><br><br>
		<h2 style="color: #1a8c97;">Commandes Acceptées</h2>
		<?php
		$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
		$stat='acceptee';
		$pdo=new PDO($dsn,$username,$password,$pdo_options);
		$sql ="SELECT produits.nom,commande.qte,commande.date, commande.statut ,produits.description FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? and commande.statut = ? ";
		$res = $pdo-> prepare($sql);
		$res ->execute(array($idm->getUid(),$stat));
		echo
		"<table class =' table table-striped'>";
		echo "<tr>
		<th> nom  </th>
		<th>description </th>
		<th> quantité </th>
		<th>date</th>
		<th>statut</th>




	</tr>";

	while ($row = $res->fetch()){

		echo "<tr>
		<td> $row[nom]</td>
		<td> $row[description]</td>
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
try{
	?><br><br><br><br><br><br> <h2 class="a" style="color: #1a8c97;"> Historique de  Commandes refusées</h2> <?php
	
	

	$pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	$stat='refusee';
	$pdo=new PDO($dsn,$username,$password,$pdo_options);
	$sql ="SELECT produits.nom,commande.qte,commande.date, commande.statut ,produits.description FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? and commande.statut = ? ";
	$res = $pdo-> prepare($sql);
	$res ->execute(array($idm->getUid(),$stat));
	echo
	"<table class =' table table-striped'>";
	echo "<tr>
	<th> nom  </th>
		<th>description </th>
		<th> quantité </th>
		<th>date</th>
		<th>statut</th>




</tr>";

while ($row = $res->fetch()){

	echo "<tr>
	<td> $row[nom]</td>
		<td> $row[description]</td>
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

echo "<div class = 'col-md-offset-5 col-md-3'>";
echo '<a href ="espacevendeur.php"  class="btn btn-primary  "   >revenir a l\'accueil</a>';
echo "</div>";
}?>
<a id="back-to-top" href="#" class="btn btn-primary btn-lg back-to-top" role="button" title="Click to return on the top page" data-toggle="tooltip" data-placement="left"><i class="fa fa-chevron-up" aria-hidden="true"></i></a>

<script type="text/javascript">
	$(document).ready(function(){
		$(window).scroll(function () {
			if ($(this).scrollTop() > 50) {
				$('#back-to-top').fadeIn();
			} else {
				$('#back-to-top').fadeOut();
			}
		});
        // scroll body to 0px on click
        $('#back-to-top').click(function () {
        	$('#back-to-top').tooltip('hide');
        	$('body,html').animate({
        		scrollTop: 0
        	}, 800);
        	return false;
        });
        
        $('#back-to-top').tooltip('show');

    });
</script>