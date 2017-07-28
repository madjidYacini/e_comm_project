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
    

    <?php
    $uid= $idm->getUid();
    try{
     $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
     $pdo=new PDO($dsn,$username,$password);
     $sql ="SELECT * FROM produits where uid = ? ";
     $res = $pdo-> prepare($sql);
     $res ->execute(array($uid));
     $check =count($res->fetchAll());
     
     if ($check==0) {
      ?>
      <script type="text/javascript">
        alert('votre n\'avez pas de produits dans votre liste pour pouvoir les modifier !');
        document.location.href='espacevendeur.php';
      </script><?php
    }else{
      try {
        ?>
        <div class="row">
          <div class="col-md-offset-3 col-md-5 container-fluid">
            <h1 style="text-transform: capitalize;">Modifier Un Produit </h1>
            <h2 class="p"><small style="text-transform: capitalize;">Merci De Cocher Le Nom Du Produit à Modifier </small></h2>
          </div>
        </div>
        <?php
        $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
        $pdo=new PDO($dsn,$username,$password,$pdo_options);
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
        <td><a href= 'modifproduit.php?pid=$row[pid]'  >modifier</a></td>
      </tr>";

    }
    echo "</table>";
    echo "</form>";
  }catch(Exception $e){
    http_response_code(500);
    echo "Erreur de serveur.";
    exit();
  }
}
}catch(Exception $e){
  http_response_code(500);
  echo "Erreur de serveur.";
  exit();
}
?> 
</div>
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

  </body>
  </html>
























  