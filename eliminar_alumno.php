<?php

/*eliminar_alumno.php
 * recibe los datos de consulta_alumno.php para eliminar el registro
 * author: OscarMau
 * date 22 04 2021
 */
//print_r($_POST);
$id = $_GET['id'];
//$nombre = $_POST['nombre'];
//$apaterno = $_POST['apaterno'];
//$amaterno = $_POST['amaterno'];
//$telefono = $_POST['telefono'];
//$correoe = $_POST['correoe'];
//abrir conexión al manejador
echo "¡Importante:! una vez que el registro sea borrado, no se podrá recuperar. Favor de verificar que el registro a eliminar es el correcto.";
//verificar que exista el registro de acceso para este usuario, desde este equipo, a esta BD en el archivo _hba.conf
$con = pg_connect ("port=5432 dbname=prueba1 user=alumno1 password=pumaso13") or die (pg_last_error());
//print_r($con);
if($con){
	//echo "se abre la conexion a la BD";
//genera la consulta
	$query = "select nombre_alumno, apaterno_alumno, amaterno_alumno, correo_alumno, tel_alumno from alumnos where id_alumno=".$id;
	$query = pg_query($con,$query);
	$consulta = pg_fetch_assoc($query);
?>
<table>
	<tr>
		<th>Nombre</th>
		<th>Apellido paterno</th>
		<th>Apellido materno</th>
		<th>Correo electrónico</th>
		<th>Teléfono</th>
	</tr>
	<tr>
		<td><?php echo $consulta['nombre_alumno']; ?></td>
		<td><?php echo $consulta['apaterno_alumno']; ?></td>
		<td><?php echo $consulta['amaterno_alumno']; ?></td>
		<td><?php echo $consulta['correo_alumno']; ?></td>
		<td><?php echo $consulta['tel_alumno']; ?></td>
	</tr>
</table>
<form name="borrar" action="<?php $SERVER['PHP_SELF'];?>" method="post">
<input type="submit" name="borrar" value="Elimniar regsitro">
</form>


<?php

	$borrar = $_POST['borrar'];
	if($borrar){
		$query = "delete from alumnos where id_alumno=".$id;
		$query = pg_query($con,$query) or die (pg_last_error());
		if($query){
			echo "<p>Se eliminó el registro del alumno</p>";
			echo "<a href= 'index.php'>Volver al inicio</a></br>";
			echo "<a href= 'for_alumno.php'>Volver al formulario de registro</a>";
			echo "<br><a href= 'consulta_alumno.php'>Volver a consultar alumnos</a></br> ";
		}
		else{
		echo"No se pudo ejecutar la secuencia SQL";
		}

	}
	else{
		echo "No se eliminó el registro";
	}	
}
else{
	echo "hubo un error al intentar conectar a la BD";
}

//genera la consulta
//$query = "insert into alumnos (nombre_alumno, apaterno_alumno, amaterno_alumno,tel_alumno, correoe_alumno) values ('".$nombre." ',' ".$apaterno." ','".$amaterno." ',' ".$telefono." ',' ".$correoe."')";
//$query = pg_query($con,$query) or die (pg_last_error());
?>

