<?php
include 'headeracht.php'; ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	
	<link rel="stylesheet" type="text/css" href="./css/calendrier.css">
	<script src="bower_components/jquery/calendrier.js"></script>
	<title>espace achteur</title>
</head>
<body class="mybackground">
	<div class="showcase1">
		<div class="row">
			<div class="col-md-offset-1 col-md-5">
			<div id="annonces" >
			
<p class="a" ><p>heureux</br> de vous revoir <p> <?php  echo $idm->getIdentity()." !"?>
        </p>
			</div>
			</div>

			<div class="col-md-offset-2 col-md-3 " id="annonceCalendrier">
				<div class="hide-on-med-and-down">
					<script type="text/javascript">
						calendrier();
					</script>
				</div>
					.
			</div>
			<div class="col-md-offset-1 col-md-10" id="annonceCalendrier">
			<div id="annonces" >
				

			</div>
					</div>
		</div>




	</body>
	</html>
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
<div class="modal fade" id="mymoda">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header ">
        <div class="titre">
          <h3> <i class="fa fa-user" hidden="true"> Mes Statistiques</i></h3>
        </div>
      </div>
      <div class="modal-body">

        <ul id="list">
          <div class="regle">
            <li class="gras"  style="list-style-type: disc;"> le nombre de Commandes acceptées:
             <?php try{
              $stat="acceptee";

              $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
              $pdo=new PDO($dsn,$username,$password,$pdo_options);
              $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?";
              $res = $pdo-> prepare($sql);
              $res ->execute(array($idm->getUid(),$stat));
              @$check = count($res->fetchAll());
              echo "$check";
            }catch(Exception $e){
              http_response_code(500);
              echo "Erreur de serveur.";
              exit();
            } 
            /**/
            ?></li>
            <li  class="gras"  style="list-style-type: disc;">
              le Nombre De Commandes refusées:
              <?php try{
                $stat="refusee";

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $pdo=new PDO($dsn,$username,$password,$pdo_options);
                $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?";
                $res = $pdo-> prepare($sql);
                $res ->execute(array($idm->getUid(),$stat));
                @$check1 = count($res->fetchAll());
                echo "$check1";
              }catch(Exception $e){
                http_response_code(500);
                echo "Erreur de serveur.";
                exit();
              } 
              ?></li>
              <li  class="gras"  style="list-style-type: disc;">
              le Nombre De Commandes en cours :
              <?php try{
                $stat="en_cours";

                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                $pdo=new PDO($dsn,$username,$password,$pdo_options);
                $sql ="SELECT *FROM produits INNER JOIN commande ON produits.pid = commande.pid WHERE commande.uid =? AND commande.statut = ?";
                $res = $pdo-> prepare($sql);
                $res ->execute(array($idm->getUid(),$stat));
                @$check1 = count($res->fetchAll());
                echo "$check1";
              }catch(Exception $e){
                http_response_code(500);
                echo "Erreur de serveur.";
                exit();
              } 
              ?></li>
              <li class="gras"  style="list-style-type: disc;">  montant total des commandes :
               <?php
              
                 
                
                 try{
                $stat="acceptee";
                $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $pdo=new PDO($dsn,$username,$password,$pdo_options);
                  $sql="SELECT * FROM commande WHERE  uid = ? AND statut =?";
                  $res=$pdo->prepare($sql);
                  $res->execute(array($idm->getUid(),$stat));
                  $check= count($res->fetchAll());
                if($check==0){
                  echo "00.00€";
                }else{
                try{
                  $stat="acceptee";
                  $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
                  $pdo=new PDO($dsn,$username,$password,$pdo_options);
                  $sql ="SELECT produits.prix AS PRICE,commande.qte AS Quantity FROM( produits INNER JOIN commande ON produits.pid = commande.pid) WHERE commande.uid =? AND commande.statut = ?";
                  $res = $pdo-> prepare($sql);
                  $res ->execute(array($idm->getUid(),$stat));
                  $somme= 0;
                  while ($row = $res->fetch()){

                    $somme= $somme+ $row['PRICE']* $row['Quantity'];
                  }
                  echo $somme."€";
                }catch(Exception $e){
                  http_response_code(500);
                  echo "Erreur de serveur.";
                  exit();
                } 
              }  }catch(Exception $e){
                  http_response_code(500);
                  echo "Erreur de serveur.";
                  exit();
                } 


             
              ?></li>

            </div>
          </ul>
        </div>
        <div class="modal-footer">

          <a href="espaceacht.php" class="btn btn-success">Revenir à L'Accueil</a>
        </div>
      </div>

    </div>
  </div>
</div>