<?php
$title="Authentification";
include("header.php");

echo "<p class=\"error\">".($error??"")."</p>";
?>
<!DOCTYPE html>
<html>
<head>
    <title>Connexion</title>
 <meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=devise-width , initial-scale=1.0">
    <title>inscription</title>

   <link rel="stylesheet" href="./css/boot.min.css" >
    <link rel="stylesheet" type="text/css" href="css/app.css">
   <link rel="stylesheet" type="text/css" href="./css/styleConnexion.css">
</head>
<body>


<div class='center'>

                    <form method="post">
                       <div class="container bootstrap snippet">
                          <div class="row login-page">
                             <div class="col-md-4  col-lg-4 col-md-offset-4  col-lg-offset-4">
                                <img src="./img/users.jpg" alt="" class="user-avatar">  
                                <h1>Connexion</h1>
                                <form action="#" class="ng-pristine ng-valid" >
                                    <div class="form-content">
                                        <div class="form-group">
                                            <input type="text" name="login" class="form-control input-underline input-lg " style="color: black;" placeholder="login "  required value="<?= $data['login']??""?>">
                                        </div>
                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control input-underline input-lg" style="color: black;" placeholder="your password" required value="">
                                        </div>          
                                    </div>
                                    <button class="btn btn-info btn-lg" > Log in</button>
                                    <span class="pull-right btn btn-info btn-lg"><a href="<?= $pathFor['adduser'] ?>">S'enregistrer</a></span>
                                 </form>
                                </div>  
                            </div>
                        </div>

                    </form>
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
<?php

include("footer.php");