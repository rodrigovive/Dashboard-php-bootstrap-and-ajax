<?php namespace RoleController;

// include ( 'connectDatabase.php');
use Connect\Connect as Connect;

class RoleController {
        public function __construct(){
            $this->mysqli = new Connect();
        }
		public function index(){
            $mysqli = $this->mysqli->conexion();
            $sql=("SELECT * FROM roles");
            $query=mysqli_query($mysqli,$sql);
            $roles = mysqli_fetch_array($query);
            $data = array();
            array_push($data,array("name" => $roles["name"], "id" => $roles["id"],"description" => $roles["description"]));
            while($roles = mysqli_fetch_array($query)){
                array_push($data,array("name" => $roles["name"], "id" => $roles["id"],"description" => $roles["description"]));
            }
            echo json_encode($data);
        }

        public function update($id,$data){
            $name = $data['name'];
            $description = $data['description'];
            $politicas= $data['politicas'];
            $mysqli = $this->mysqli->conexion();
            $sentencia="update roles set name='$name', description='$description' where id='$id'";
            $resent=mysqli_query($mysqli,$sentencia);

            $sqlborrar="DELETE FROM politica_role WHERE role_id=$id";
            $resborrar=mysqli_query($mysqli,$sqlborrar);

            foreach($politicas as $politic){
                mysqli_query($mysqli,"INSERT INTO politica_role VALUES('$politic','$id')");
            }

            if ($resent==null) {
                echo 'no guardo';
            }else{
                echo 'si guardo';
            };
        }
        public function show($id){
            $data = array();
            $mysqli = $this->mysqli->conexion();
            $sql="SELECT * FROM roles WHERE id=$id";
            $queryRole=mysqli_query($mysqli,$sql);
            $role=mysqli_fetch_assoc($queryRole);
            $roleSql = "SELECT * FROM politica_role WHERE role_id=$id";
            $rolePolitica2 = mysqli_query($mysqli,$roleSql);
            $politicaRoles = array();
            $rolePolitica = mysqli_fetch_assoc($rolePolitica2);
            // echo 'esta imprimiendoo o que verga'. json_encode($rolePolitica) . ' a ver';
            array_push($politicaRoles,array("id" => $rolePolitica["politica_id"]));
            while($rolePolitica = mysqli_fetch_array($rolePolitica2)){
                array_push($politicaRoles,array("id" => $rolePolitica["politica_id"]));
            }
            array_push($data,array("id" => $role["id"],"name" => $role["name"],"description" => $role["description"]));
            array_push($data,$politicaRoles);
            echo json_encode($data);
        }
        public function delete($id){
            $mysqli = $this->mysqli->conexion();
            $sqlborrar="DELETE FROM roles WHERE id=$id";
            $resborrar=mysqli_query($mysqli,$sqlborrar);

            $sqlborrar2="DELETE FROM politica_role WHERE role_id=$id";
            $resborrar=mysqli_query($mysqli,$sqlborrar2);
            echo '<script>alert("REGISTRO ELIMINADO")</script> ';
            echo "<script>location.href='admin.php'</script>";
        }

        public function create($data){
            $name = $data['name'];
            $description = $data['description'];
            $politicas= $data['politicas'];
            $mysqli = $this->mysqli->conexion();
            echo $name;
            $checkemail=mysqli_query($mysqli,"SELECT * FROM roles WHERE name='$name'");
            $check_mail=mysqli_num_rows($checkemail);
            if($check_mail>0){
                echo ' <script language="javascript">alert("Atencion, ya existe el nombre designado para un usuario, verifique sus datos");</script> ';
            }else{
                echo $name;
                echo $description;
                mysqli_query($mysqli,"INSERT INTO roles VALUES(default,'$name','$description')");
                $sqlLast = "SELECT * FROM roles ORDER BY id DESC LIMIT 1";
                $query=mysqli_query($mysqli,$sqlLast);
                $rol = mysqli_fetch_array($query);
                $rolID = $rol["id"];
                foreach($politicas as $politic){
                    mysqli_query($mysqli,"INSERT INTO politica_role VALUES('$politic','$rolID')");
                }
                echo ' <script language="javascript">alert("Usuario registrado  xdx dx dxcon éxito");</script> ';
            }
        }
	}
?>
