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
				$insert = $model->insert();
				$rows = $model->fetch();
			?>
			<form method="POST" action="" class="form-inline">
				<div class="row">
					<div class="form-group  col-md-12 ">
						<label class="col-md-2">Nom:</label>
						<input class="form-control col-md-10" type="text" name="nom" placeholder="Entrez votre nom">
					</div>
					<div class="form-group col-md-12 mt-3">
						<label class="col-md-2">Prénom:</label> 
						<input class="form-control col-md-10" type="text" name="prenom" placeholder="Entrez votre prénom">
					</div>
					<div class="form-group col-md-12 mt-3">
						<label class="col-md-2">E-mail:</label>
						<input class="form-control col-md-10" name="email" type="email" placeholder="Entrez votre adresse E-mail">
					</div>
				<div class="col-md-12 mt-3 text-right">
					<button  class="btn btn-success form-control" type="submit" name="submit">Enregistrer</button>
				</div>	
			</form>
			<hr>
			<div class="col-md-12">
				<h3 class="text-center w-100">Listes des utilisateurs existants</h3>
				<div class="col-md-12">
					<div class="table-responsive">
						<table class="table table-bordered dataTable ">
							<thead>
								<tr class="text-center bg-primary text-white">
									<th>Id</th>
									<th>Nom</th>
									<th>Prénom</th>
									<th>Email</th>
									<th>date_creation</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$i = 1;
									if (!empty($rows)) {
										foreach ($rows as $row) {
								?>
								<tr>
									<td><?= $i++ ?></td>
									<td><?= $row['nom'] ?></td>
									<td><?= $row['prenom'] ?></td>
									<td><?= $row['email'] ?></td>
									<td><?= $row['date_create'] ?></td>
									<td>
										<a href="delete.php?id=<?= $row['id'] ?>" class="badge badge-danger p-2"><i class="fa fa-trash"></i></a>
										<a href="edit.php?id=<?= $row['id'] ?>" class="badge badge-success p-2"><i class="fa fa-edit"></i></a>
										<a href="read.php?id=<?= $row['id'] ?>" class="badge badge-info p-2"><i class="fa fa-info"></i></a>
									</td>
								</tr>
								<?php 	
										}
									}else{
										echo "Rien de données";
									}
								?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
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