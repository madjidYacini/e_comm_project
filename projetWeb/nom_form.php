<?php
include 'headervendeur.php';
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="./css/ex2.css">

  <title>modifier prix</title>
</head>
<body>
  <div class="container">
    <div class="row">
      <div class="col-md-offset-3 col-md-5 container-fluid">
        <h1 style="text-transform: capitalize;">Modifier Un Produit </h1>
        <h2 class="p"><small style="text-transform: capitalize;">Merci De Cocher Le Nom Du Produit à Modifier </small></h2>
      </div>
    </div>

    <?php
    $uid= $idm->getUid();
    try {
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
      $sql ="SELECT * FROM produits where uid = ? ";
      $res = $pdo-> prepare($sql);
      $res ->execute(array($uid));
      echo "<form methode='post'  >";
      echo
      "<table class=\"table table-striped\">";
      echo "<tr>
      <th> nom </th>
      <th> description</th>
      <th> qte </th>
      <th>prix</th>
      <th>Action</th>

    </tr>";

    while ($row = $res->fetch()){

      echo "<tr>
      <td> $row[nom]</td>
      <td> $row[description]</td> 
      <td> $row[qte]</td>
      <td> $row[prix]</td>
      <td><a href= 'modifproduit.php?pid=$row[pid]' >modifier</a></td>
    </tr>";

  }
  echo "</table>";
  echo "</form>";
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}?>
</div>
</body>
</html>