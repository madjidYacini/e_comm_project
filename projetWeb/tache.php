<title>mes taches</title>
<?php 
include 'headeracht.php';
?>
<div class ='well well-lg'>
<h2 class="a" style="color: #1a8c97;">Mes taches :</h2>
</div>
<?php
try{
	 $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
	 $pdo= new PDO($dsn,$username,$password);
	 $sql ="SELECT* from taches ";

	 $res =$pdo->prepare($sql);
		$res->execute(array());

	 echo "<form methode='post'>";
		echo
		"<table class =' table table-striped'>";
		echo "<tr>
		<th> Action  </th>
		<th> nom </th>
		<th> description</th>

	</tr>";

	while ($row = $res->fetch()){

		echo "<tr>
		<td> $row[tid]</td>
		<td> $row[tache]</td>
		<td> $row[uid]</td>
		</tr>";

	}
	echo "</table>";
}catch(Exception $e){
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
  } 
?>