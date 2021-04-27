<?php
//Abrir una conexion al manejador de BD:
//
$con = pg_connect("port=5432 dbname=prueba1 user=alumno1 password=pumaso13") or die (pg_last_error());
if($con){
	echo "Se conectó a la BD";

}
else{
	echo "hubo un problema al conectar a la BD";
}


?>
