<?php namespace Connect;

		// $mysqli = new MySQLi("localhost", "root","viveros", "academ");
		// if ($mysqli -> connect_errno) {
		// 	die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
		// 		. ") " . $mysqli -> mysqli_connect_error());
		// }
	require('database.php');
	$mysqli = $mysqli;

	class Connect {
		public function conexion(){
			global $mysqli;
			if ($mysqli -> connect_errno) {
				die( "Fallo la conexión a MySQL: (" . $mysqli -> mysqli_connect_errno() 
					. ") " . $mysqli -> mysqli_connect_error());
				return false;
			}
			return $mysqli;
		}
}
//	$link =mysqli_connect("localhost","root","");
//	if($link){
//		mysqli_select_db($link,"academ");
//	}
?>