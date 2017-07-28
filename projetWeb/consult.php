
<link rel="stylesheet" type="text/css" href="./css/ex2.css">
<?php include 'headervendeur.php';  ?>
<?php
try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
     $sql ="SELECT * FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? AND  commande.statut = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($idm->getUid(),$stat));
    $check= count($res->fetchAll());
    if ($check==0) {
      ?>
        <script type="text/javascript">
          alert('vous n\'avez aucune commande reçue !');
          document.location.href="espacevendeur.php";
        </script>
      <?php
    }else
{
   echo "<h2>Consulter Mes Commandes</h2>";
   try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $stat='en_cours';
     $pdo=new PDO("mysql:host=$hostname;dbname=$dbname",$username,$password);
     $sql ="SELECT commande.cmdid,commande.qte,produits.nom,commande.date,commande.statut,produits.qte as qtee  FROM (commande INNER JOIN produits  on commande.pid=produits.pid ) where produits.uid =? AND  commande.statut = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($idm->getUid(),$stat));
     echo
     "<table class =' table table-striped'>";
     echo "<tr>
     <th> Nom</th>
     <th> quantité commande </th>
     <th> quantité disponible </th>
     <th>date</th>
     <th>statut</th>
     <th>Action</th>


     

   </tr>";

   while ($row = $res->fetch()){

    echo "<tr>
      <td> $row[nom]</td>
    <td> $row[qte]</td>
    <td> $row[qtee]</td>
    <td> $row[date]</td>
    <td> $row[statut]</td>
      <td><a href= 'accepte.php?cmdid=$row[cmdid]' >accepter</a>  <p>     </p>  
 <a href= 'refuse.php?cmdid=$row[cmdid]' >refuser</a></td>
    
  </tr>";

}

echo "</table>";
echo '<a href ="espacevendeur.php"  class="btn btn-primary  "   >revenir a l\'accueil</a>';
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
}}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}

  ?>
