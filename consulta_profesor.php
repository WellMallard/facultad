<?php

/*consulta_proferor.php
 * abre la conexión a la BD, consulta los registros de alumnos y los muestra en una tabla
 * author: OscarMau
 * date 24 03 2021
 */
//abrir conexión al manejador
//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf
$con = pg_connect ("port=5432 dbname=prueba1 user=alumno1 password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
	//genera la consulta
	//$query = "insert into alumnos (nombre_alumno,apaterno_alumno,amaterno_alumno,tel_alumno,correo_alumno) values('".$nombre." ',' ".$apaterno." ',' ".$amaterno." ',' ".$telefono." ',' ".$correoe."')";
	
	$query = "select id_profesor,nombre_profesor,apaterno_profesor,amaterno_profesor,tel_profesor,correo_profesor from profesores";
	$query = pg_query($con,$query) or die (pg_last_error());
	//$arreglo = pg_fetch_all($query);
	echo "<pre>";
		//print_r($arreglo);
	echo "</pre>";
		//print_r($arreglo);
	echo "</pre>";
	if($query){
		echo "<p>Lista de profesores</p>";
?>
<table>
	<thead>
		<tr>
			<th>ID</th>
			<th>Nombre</th>
			<th>Apellido paterno</th>
			<th>Apellido materno</th>
			<th>Telefono</th>
			<th>Correo electronico</th>
		</tr>
	</thead>
	<tbody>



<?php
		while($row = pg_fetch_array($query)){
			//echo "el nombre: ".$row['nombre_profesor']. "el paterno: ".$row['apaterno_profesor']."el materno: ".$row['amaterno_profesor'];
			echo "<tr>";
			echo "<td>".$row['id_profesor']."</td>";
			echo "<td>".$row['nombre_profesor']."</td>";
			echo "<td>".$row['apaterno_profesor']."</td>";
			echo "<td>".$row['amaterno_profesor']."</td>";
			echo "<td>".$row['tel_profesor']."</td>";
			echo "<td>".$row['correo_profesor']."</td>";
			echo "<td><a href='edita_profesor.php?id=".$row['id_profesor']."'>Editar registro</a></td>";
			echo "<td><a href='eliminar_profesor.php?id=".$row['id_profesor']."'>Eliminar registro</a></td>";
			echo "</tr>";
		}

?>
	</tbody>
</table>
<?php
		echo "<a href= 'index.php'>Volver al inicio</a></br>";
		echo "<a href= 'for_profesor.php'>Volver al formulario de registro</a>";
	}else{
		echo"No se pudo ejecutar la secuencia SQL";
	}
}
	else{
	echo "hubo un error al intentar conectar a la BD";
	}

//genera la consulta
//$query = "insert into alumnos (nombre_alumno, apaterno_alumno, amaterno_alumno,tel_alumno, correoe_alumno) values ('".$nombre." ',' ".$apaterno." ','".$amaterno." ',' ".$telefono." ',' ".$correoe."')";
//$query = pg_query($con,$query) or die (pg_last_error());
?>

