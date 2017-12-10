<?php namespace LoginController;

	class checkLogin {
		public function checkPass($queryUser,$pass_normal,$mysqli){
			$pass = base64_encode($pass_normal);
			echo $pass;
			if($f2=mysqli_fetch_assoc($queryUser)){
				if($pass==$f2['password']){
					$_SESSION['id']=$f2['id'];
					$_SESSION['user']=$f2['user'];
					$rol = $f2['rol'];
					$_SESSION['rol']=$f2['rol'];
					$query = "SELECT r.name,r.id FROM user AS u INNER JOIN roles as r ON u.rol = r.id WHERE r.id='$rol'";
					$roluser = mysqli_query($mysqli,$query);
					$rol = mysqli_fetch_array($roluser);

					$query23 = "SELECT politica_id FROM politica_role WHERE politica_role.role_id='$rol'";
					$rolPolitica2= mysqli_query($mysqli,$query23);
					$rolPolitica = mysqli_fetch_array($rolPolitica2);
					$data = array();
					array_push($data,array("id" => $rolPolitica["id"]));
					while($rolPolitica = mysqli_fetch_array($rolPolitica)){
						array_push($data,array("id" => $rolPolitica["id"]));
					}
					$_SESSION['politicas']=$data;
					header("location:dashboard.php");
					return $alert = '<script>alert("BIENVENIDO ADMINISTRADOR")</script> ';
				}
			}elseif($pass!=$f2['password']){
				return $alert = '<script>alert("CONTRASEÑA INCORRECTA")</script> ';
			}else{
				echo "xd";
				return $alert = '<script>alert("ESTE USUARIO NO EXISTE, PORFAVOR REGISTRESE PARA PODER INGRESAR")</script> ';
			}
			echo "xd";
		}
	}
?>

