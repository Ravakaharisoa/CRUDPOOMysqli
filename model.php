<?php
	class Model{
		private $server= "localhost";
		private $username= "root";
		private $password;
		private $db= "gestion";
		private $conn;


		public function __construct(){
			try {
				 $this->conn = new mysqli($this->server,$this->username,$this->password,$this->db);
			}catch (Exception $e) {
				echo "Connection failed".$e->getMessage();
			}
		}

		public function insert(){
			if(isset($_POST['submit'])){
				if (isset($_POST['nom']) && isset($_POST['prenom']) && isset($_POST['email'])) {
					if (!empty($_POST['nom']) && !empty($_POST['prenom']) && !empty($_POST['email'])) {
						$nom = $_POST['nom'];
						$prenom = $_POST['prenom'];
						$email = $_POST['email'];

						$query = " INSERT INTO utilisateur (nom,prenom,email) VALUES ('$nom','$prenom','$email')";
						if($sql= $this->conn->query($query)){
							echo "<script>alert('utilisateurs enregistré avec succés');</script>";
							echo "<script>window.location.href='index.php';</script>";
						}else{
							echo "<script>alert('Echec d'enregistrement)</script>";
							echo "<script>window.location.href='index.php';</script>";
						}

					}else{
						echo "<script>alert('empty')</script>";
						echo "<script>window.location.href='index.php';</script>";
					}
				}
			}
		}

		public function fetch(){
			$data = null;
			$query = "SELECT * FROM utilisateur";

			if ($sql = $this->conn->query($query)) {
				while ($row = mysqli_fetch_assoc($sql)) {
					$data[] = $row;
				}
			}
			return $data;
		}

		public function delete($id){
			$query = "DELETE FROM utilisateur WHERE id='$id'";
			if($sql = $this->conn->query($query)){
				return true;
			}else{
				return false;
			}
		}

		public function fetch_single($id){
			$data = null;
			$query = "SELECT * FROM utilisateur WHERE id = '$id'";
			if($sql = $this->conn->query($query)){
				while($row = $sql->fetch_assoc()){
					$data = $row;
				}
			}
			return $data;
		}

		public function edit($id){
			$data = null;
			$query = "SELECT * FROM utilisateur WHERE id = '$id'";
			if($sql = $this->conn->query($query)){
				while ($row = $sql->fetch_assoc()) {
					$data = $row;
				}
			}
			return $data;
		}

		public function update($data){

			$query = "UPDATE utilisateur SET nom ='$data[nom]',prenom ='$data[prenom],email ='$data[email]' WHERE id='$data[id]'";
			if($sql = $this->conn->query($query)){
				return true;
			}
			else{
				return false;
			}
		}

	}
?>