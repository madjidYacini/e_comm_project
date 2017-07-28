<?php 
include 'headervendeur.php'; ?>
<?php
/*******************/

/*recuperation des variables*/
$uid= $idm->getUid();
@$prix =$_POST["prix"];
@$nom = $_POST["nom"];
@$qte=$_POST["qte"];
@$description= $_POST["description"];
@$categorie=$_POST["categorie"];

try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo = new PDO ($dsn,$username,$password);
  $sql ="SELECT ctid FROM categories WHERE nom=? ";
  $res =$pdo->prepare($sql);
  $res ->execute(array($categorie));
  $row = $res->fetch();
  @$ctid = $row['ctid'];
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
try{
  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
  $pdo=new PDO($dsn,$username,$password);
  $sql ="SELECT * FROM produits WHERE nom =? AND description =? AND uid =?";
  $res = $pdo-> prepare($sql);
  $res ->execute(array($nom,$description,$uid));
  @$check = count($res->fetchAll());
  if ($check ==0) {
    try{
      $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
      $pdo=new PDO($dsn,$username,$password);
      $sql="INSERT INTO produits(nom,description,qte,prix,uid,ctid)VALUES(:nom,:description,:qte,:prix,:uid,:ctid)";
      $res=$pdo->prepare($sql);
      $res->execute(array('nom'=>$nom,
       'description'=>$description,
       'qte'=>$qte,
       'prix'=>$prix,
       'uid'=>$uid,
       'ctid'=>$ctid,
       ));
      $id = $db->lastInsertId();
      $res->closeCursor();
      ?> 
      <script type="text/javascript">
       var p = confirm('Le produit a ete bien ajouté voulez vous en ajouter un autre  ?');
       if (p) {
        document.location.href='ajout_form.php';
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
    
  }else{
    try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $pdo=new PDO($dsn,$username,$password,$pdo_options);
     $sql="UPDATE produits SET qte=qte+?  WHERE uid = ? AND nom = ? AND description= ?";
     $res=$pdo->prepare($sql);
     $res -> execute(array($qte,$uid,$nom,$description));
     $res->closeCursor();?>
     <script type="text/javascript">
      alert('Le produit a ete bien ajouté  !');
      document.location.href='espacevendeur.php';

    </script>

    <?php
  }
  catch (Exception $e){
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
  }
}
}catch (Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}

?>