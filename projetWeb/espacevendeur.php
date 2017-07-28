<?php

require("headervendeur.php");
?>
<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
   <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/app.css">
	<link rel="stylesheet" type="text/css" href="./css/calendrier.css">
	<script src="bower_components/jquery/calendrier.js"></script>
	<title>espace vendeur</title>
</head>
<body>
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
					.
				</div>

			</div>
		</div>



</body>
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
</html>