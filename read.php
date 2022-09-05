<!DOCTYPE html>
<html>
	<head>
		<title>Gestion d'utilisateur</title>
		<link rel="stylesheet" type="text/css" href="Plugin/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" type="text/css" href="Plugin/font-awesome-4.7.0/css/font-awesome.css">
	</head>
	<body>
		<div class="container mt-5">
		    <div class="card col-md-6 m-auto">
		        <div class="card-header">
		            <h3 class="text-info text-center">Information Générale d'utilisateur</h3>
		        </div>
		        <div class="card-body">
		        	<?php

		        		include 'model.php';
		        		$model = new Model();
		        		$id = $_REQUEST['id'];
		        		$row = $model->fetch_single($id);
		        		if (!empty($row)) {
		        		
		        	?>
			            <h3 class="bg-primary p-2 text-center text-light">ID : <?= $row['id'] ?></h3>
			            <div class="col-md-12 d-flex">
			                <span class="col-md-3">Nom</span><b class="col-md-8"> : <?= $row['nom'] ?></b>
			            </div>
			            <div class="col-md-12 d-flex">
			                <span class="col-md-3">Prenom</span><b class="col-md-8"> : <?= $row['prenom'] ?></b>
			            </div>
			            <div class="col-md-12 d-flex">
			                <span class="col-md-3">E-mail</span><b class="col-md-8"> : <?= $row['email'] ?></b>
			            </div>
			        <?php 
			    		}
			    		else{
			    			echo "Rien de données";
			        	} 
			        ?>
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