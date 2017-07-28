
<!DOCTYPE html>
<html>
<head>
	<title>modifier prix</title>
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-5 container-fluid">
				<h1>modifier un produit </h1>
				<h2 class="p"><small>Merci de renseigner le nom du produit à modifier </small></h2>
			</div>
		</div>
		<form  method="post" >
			<div class="row">
				<div class="col-md-offset-1 col-md-2">

					<div class="form-group">
						<label >le Nouveau Prix:</label>
						<input type="prix" class="form-control" name="prix" id="prix" placeholder="ex:30,00" required value="<?= $data['prix']??""?>"><tr><td><span class="error_form" id="prix-error"> </td></tr>
					</div>
					<div >
						<input type="submit" value=modifier  class="btn btn-primary btn-lg " >
					</div>
				</div>
			</div>
		</body>
		</html>