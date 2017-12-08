<?php namespace PoliticaController;

// include ( 'connectDatabase.php');
use Connect\Connect as Connect;

class PoliticaController {
        public function __construct(){
            $this->mysqli = new Connect();
        }
		public function index(){
            $mysqli = $this->mysqli->conexion();
            $sql=("SELECT * FROM politicas");
            $query=mysqli_query($mysqli,$sql);
            $politicas = mysqli_fetch_array($query);
            $data = array();
            array_push($data,array("name" => $politicas["name"], "id" => $politicas["id"],"description" => $politicas["description"]));
            while($politicas = mysqli_fetch_array($query)){
                array_push($data,array("name" => $politicas["name"], "id" => $politicas["id"],"description" => $politicas["description"]));
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
        public function delete($id){
            $mysqli = $this->mysqli->conexion();
            $sqlborrar="DELETE FROM login WHERE id=$id";
            $resborrar=mysqli_query($mysqli,$sqlborrar);
            echo '<script>alert("REGISTRO ELIMINADO")</script> ';
            echo "<script>location.href='admin.php'</script>";
        }

        public function create($data){
            $name = $data['name'];
            $description = $data['description'];
            $mysqli = $this->mysqli->conexion();
            echo $name;
            $checkemail=mysqli_query($mysqli,"SELECT * FROM roles WHERE name='$name'");
            $check_mail=mysqli_num_rows($checkemail);
            if($check_mail>0){
                echo ' <script language="javascript">alert("Atencion, ya existe el nombre designado para un usuario, verifique sus datos");</script> ';
            }else{
                mysqli_query($mysqli,"INSERT INTO roles VALUES(default,'$name','$description')");
                echo ' <script language="javascript">alert("Usuario registrado  xdx dx dxcon éxito");</script> ';
            }
        }
	}
?>
