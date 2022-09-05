<!DOCTYPE html>
<html>
<head>
	<title>Gestion d'utilisateur</title>
	<link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Plugin/font-awesome-4.7.0/css/font-awesome.css">
</head>
<body>
<div class="container">
	<div class="card mt-3">
		<div class="card-header"> <h1 class="text-center">Gestion d'utilisateur</h1> </div>
		<div class="card-body">
			<?php 
				include 'model.php';
				$model= new Model();
				$id = $_REQUEST['id'];
				$row = $model->edit($id);
				if(isset($_POST['update'])){
					if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
						if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])) {

							$data['id'] = $id;
							$data['nom'] = $_POST['nom'];
							$data['prenom'] = $_POST['prenom'];
							$data['email'] = $_POST['email'];

							$update = $model->update($data);

							if($update){
								echo "<script>alert('Utilisateur modifié avec succés')</script>";
								echo "<script>window.location.href='index.php';</script>";
							}else{

							}

						}else{
							echo "<script>alert('Utilisateur non modifié')</script>";
							header("Location : edit.php?id=$id");
						}
					}
				}
			?>
			<form method="GET" action="" class="form-inline">
				<div class="row">
					<div class="form-group  col-md-12 ">
						<label class="col-md-2">Nom:</label>
						<input class="form-control col-md-10" type="text" name="nom" placeholder="Entrez votre nom" value="<?= $row['nom'] ?>">
					</div>
					<div class="form-group col-md-12 mt-3">
						<label class="col-md-2">Prénom:</label> 
						<input class="form-control col-md-10" type="text" name="prenom" placeholder="Entrez votre prénom" value="<?= $row['prenom'] ?>">
					</div>
					<div class="form-group col-md-12 mt-3">
						<label class="col-md-2">E-mail:</label>
						<input class="form-control col-md-10" name="email" type="email" placeholder="Entrez votre adresse E-mail" value="<?= $row['email'] ?>">
					</div>
				<div class="col-md-12 mt-3 text-right">
					<button  class="btn btn-success form-control" type="submit" name="update">Modifier</button>
				</div>	
			</form>
		</div>
	</div>
</div>

<script type="text/javascript" src=""></script>
<script type="text/javascript">
	$(document).ready(function(){
     
	});
</script>
</body>
</html>