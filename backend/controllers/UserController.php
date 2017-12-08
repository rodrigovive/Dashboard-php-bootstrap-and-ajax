<?php namespace UserController;


use Connect\Connect as Connect;

class UserController {
        public function __construct(){
            $this->mysqli = new Connect();
        }
		public function index(){
            // $mysqli2 = new Connect();
            $mysqli = $this->mysqli->conexion();
            $sql=("SELECT * FROM user");
            $query=mysqli_query($mysqli,$sql);
            $data = array();
            $users = mysqli_fetch_array($query);
            $rol = $users['rol'];
            $roleSql = ("SELECT * FROM roles WHERE id='$rol' ");
            $roleName2 = mysqli_query($mysqli,$roleSql);
            $roleName = mysqli_fetch_array($roleName2);
            array_push($data,array("user" => $users["user"], "id" => $users["id"], "email" => $users["email"],"password" => $users["password"],"rol" => $roleName["name"]));
            while($users = mysqli_fetch_array($query)){
                $rol = $users['rol'];
                $roleSql = ("SELECT * FROM roles WHERE id='$rol' ");
                $roleName2 = mysqli_query($mysqli,$roleSql);
                $roleName = mysqli_fetch_array($roleName2);
                array_push($data,array("user" => $users["user"], "id" => $users["id"], "email" => $users["email"],"password" => $users["password"],"rol" => $roleName["name"]));
            }
            echo json_encode($data);
        }

        public function update($id,$data){
            $mysqli = $this->mysqli->conexion();
            $sql="SELECT * FROM login WHERE id=$id";
            $ressql=mysqli_query($mysqli,$sql);
            while ($row=mysqli_fetch_row ($ressql)){
                    $id=$row[0];
                    $user=$row[1];
                    $pass=$row[2];
                    $email=$row[3];
                    $pasadmin=$row[4];
                }
        }
        public function show($id){
            $data = array();
            $mysqli = $this->mysqli->conexion();
            $sql="SELECT * FROM user WHERE id=$id";
            $queryUser=mysqli_query($mysqli,$sql);
            $user=mysqli_fetch_assoc($queryUser);
            $rol = $user['rol'];
            $roleSql = ("SELECT * FROM roles WHERE id='$rol' ");
            $roleName2 = mysqli_query($mysqli,$roleSql);
            $roleName = mysqli_fetch_array($roleName2);
            array_push($data,array("id" => $user["id"],"user" => $user["user"],"email" => $user["email"],"rol" => $roleName["name"]));
            echo json_encode($data);
        }
        public function delete($id){
            $mysqli = $this->mysqli->conexion();
            $sqlborrar="DELETE FROM user WHERE id=$id";
            $resborrar=mysqli_query($mysqli,$sqlborrar);
            echo '<script>alert("REGISTRO ELIMINADO")</script> ';
            echo "<script>location.href='admin.php'</script>";
        }

        public function create($data){
            $realname= $data['name'];
            $mail = $data['email'];
            $pass = $data['password'];
            $rpass = $data['password'];
            $pass_encode = base64_encode($pass);
            $rol= $data['rol'];
            $mysqli = $this->mysqli->conexion();
            echo $realname. '   ' . $mail . '   ' . $pass . '   ' . $rpass . '   ' . $rol;
            $checkemail=mysqli_query($mysqli,"SELECT * FROM user WHERE email='$mail'");
            $check_mail=mysqli_num_rows($checkemail);
            if($check_mail>0){
                echo ' <script language="javascript">alert("Atencion, ya existe el mail designado para un usuario, verifique sus datos");</script> ';
            }else{
                mysqli_query($mysqli,"INSERT INTO user VALUES(default,'$realname','$mail','$rol','$pass_encode')");
                echo ' <script language="javascript">alert("Usuario registrado asdasdasd     xdx dx dxcon éxito");</script> ';
            }
        }
	}
?>
