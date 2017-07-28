<link rel="stylesheet" type="text/css" href="./css/ex2.css">
<?php
require 'headervendeur.php'; 
require 'db_config.php';
?>

<?php
try{
	$pdo = new PDO ($dsn,$username,$password);
	$var = $idm->getUid();
	$qte=0;
	$sql ="SELECT * FROM Produits WHERE uid=? AND qte >?";
	$res =$pdo->prepare($sql);
	$res ->execute(array($var,$qte));
	$checkdispo= count($res->fetchAll());
}catch (Exception $e){

	die('Erreur : ' . $e->getMessage());
}

try{
	$pdo = new PDO ($dsn,$username,$password);
	$var = $idm->getUid();
	$qte=0;
	$sql ="SELECT produits.nom as nom1, produits.description,produits.qte,produits.prix,categories.nom FROM (produits INNER JOIN categories on produits.ctid= categories.ctid) WHERE produits.uid=? AND produits.qte =?";
	$res =$pdo->prepare($sql);
	$res ->execute(array($var,$qte));
	$checkepuisé= count($res->fetchAll());
}catch (Exception $e){

	die('Erreur : ' . $e->getMessage());
}
if ($checkepuisé==0 && $checkdispo==0) {
	?>
	<script type="text/javascript">
		alert('votre compte est vide pensez a le remplir ');
		document.location.href='espacevendeur.php';
	</script>
	<?php
}elseif ($checkepuisé !=0 && $checkdispo==0) {
echo "<h1>Mes Produits Epuisés</h1>";
try{
	$pdo = new PDO ($dsn,$username,$password);
	$var = $idm->getUid();
	$qte=0;
	$sql ="SELECT produits.nom as nom1, produits.description,produits.qte,produits.prix,categories.nom FROM (produits INNER JOIN categories on produits.ctid= categories.ctid) WHERE produits.uid=? AND produits.qte =?";
	$res =$pdo->prepare($sql);
	$res ->execute(array($var,$qte));
	
	echo
	"<table class=\"table table-striped\">";
	echo "<tr>
	<th> nom </th>
	<th> description</th>
	<th> quantité </th>
	<th>prix à l'unité</th>
	<th > categorie </th>
</tr>";
while ($row = $res->fetch()){

	echo "<tr>
	<td> $row[nom1]</td>
	<td> $row[description]</td>
	<td> $row[qte]</td>
	<td> $row[prix]</td>
	<td> $row[nom]</td>
</tr>";

}
echo "</table>";

}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<div class="well">
	<h2>vous n'avez pas de produits qui sont disponible pour le moment </h2>
</div>
<?php
}elseif ($checkepuisé ==0 && $checkdispo!=0) {
try{
	echo '<h1>Mes Produits Disponible</h1>';
	$pdo = new PDO ($dsn,$username,$password);
	$var = $idm->getUid();
	$qte=0;
	$sql ="SELECT produits.nom AS nom1,produits.description,produits.qte ,produits.prix ,categories.nom FROM (categories INNER JOIN produits  on categories.ctid=produits.ctid ) WHERE produits.uid=? AND produits.qte <>?";
	$res =$pdo->prepare($sql);
	$res ->execute(array($var,$qte));

	echo
	"<table class=\"table table-striped\">";
	echo "<tr>
	<th> nom </th>
	<th> description</th>
	<th> quantité </th>
	<th>prix à l'unité</th>
	<th> categorie </th>
</tr>";
while ($row = $res->fetch()){

	echo "<tr>
	<td> $row[nom1]</td>
	<td> $row[description]</td>
	<td> $row[qte]</td>
	<td> $row[prix]</td>
	<td> $row[nom]</td>
</tr>";

}
echo "</table>";

}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<div class="well">
	<h2>vous n'avez pas de produits qui sont epuisées pour le moment </h2>
</div>
<?php
}else{
try{
	echo '<h1>Mes Produits Disponible</h1>';
	$pdo = new PDO ($dsn,$username,$password);
	$var = $idm->getUid();
	$qte=0;
	$sql ="SELECT produits.nom AS nom1,produits.description,produits.qte ,produits.prix ,categories.nom FROM (categories INNER JOIN produits  on categories.ctid=produits.ctid ) WHERE produits.uid=? AND produits.qte <>?";
	$res =$pdo->prepare($sql);
	$res ->execute(array($var,$qte));

	echo
	"<table class=\"table table-striped\">";
	echo "<tr>
	<th> nom </th>
	<th> description</th>
	<th> quantité </th>
	<th>prix à l'unité</th>
	<th> categorie </th>
</tr>";
while ($row = $res->fetch()){

	echo "<tr>
	<td> $row[nom1]</td>
	<td> $row[description]</td>
	<td> $row[qte]</td>
	<td> $row[prix]</td>
	<td> $row[nom]</td>
</tr>";

}
echo "</table>";

}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
?>
<br><br><br><br><br><br><br>

<?php
echo "<h1>Mes Produits Epuisés</h1>";
try{
	$pdo = new PDO ($dsn,$username,$password);
	$var = $idm->getUid();
	$qte=0;
	$sql ="SELECT produits.nom as nom1, produits.description,produits.qte,produits.prix,categories.nom FROM (produits INNER JOIN categories on produits.ctid= categories.ctid) WHERE produits.uid=? AND produits.qte =?";
	$res =$pdo->prepare($sql);
	$res ->execute(array($var,$qte));
	
	echo
	"<table class=\"table table-striped\">";
	echo "<tr>
	<th> nom </th>
	<th> description</th>
	<th> quantité </th>
	<th>prix à l'unité</th>
	<th > categorie </th>
</tr>";
while ($row = $res->fetch()){

	echo "<tr>
	<td> $row[nom1]</td>
	<td> $row[description]</td>
	<td> $row[qte]</td>
	<td> $row[prix]</td>
	<td> $row[nom]</td>
</tr>";

}
echo "</table>";

}catch (Exception $e){
	die('Erreur : ' . $e->getMessage());
}
}
?>
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