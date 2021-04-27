<!DOCTYPE html>
<html>
	<head>	
		<meta charset = "UTF-8">
		<title>Formulario de edición de alumnos</title>
	</head>
	<body>
<?php
//Recibir el valor que viaja en la URL
$id = $_GET['id'];
//echo "el id del alumno es " .$id;
//Consulta los datos del alumno con ese ID, para mostrarlos en el formulario
$con = pg_connect ("port=5432 dbname=prueba1 user=alumno1 password=pumaso13") or die (pg_last_error());
if($con){
	$query = "select nombre_alumno, apaterno_alumno, amaterno_alumno, correo_alumno, tel_alumno from alumnos where id_alumno='".$id."'";
	$query =pg_query($con,$query);
	$resultado = pg_fetch_assoc($query);
	print_r($resultado);
?>
		<h1>Formulario de alta de alumnos</h1>
		<p>Favor de ingresar los siguientes datos para registrar a los alumnos:</p>
		<form name ="alta" action ="actualiza_alumno.php" method = "post" >
			<label for = "nombre">Nombre: </label>
			<input type = "text" name = "nombre" value="<?php echo $resultado['nombre_alumno']; ?>"><br/>
			
			<label for = "apaterno">Apellido paterno: </label>
			<input type = "text" name = "apaterno" value="<?php echo $resultado['apaterno_alumno']; ?>"><br/>
			<label for = "amaterno">Apellido materno: </label>
			<input type = "text" name = "amaterno" value="<?php echo $resultado['amaterno_alumno']; ?>"><br/>
			<label for = "telefono">Número de telefono: </label>
			<input type = "telefono" name = "telefono" value="<?php echo $resultado['tel_alumno']; ?>"><br/>
			<label for = "correoe">Correo electrónico: </label>
			<input type = "email" name = "correoe" value="<?php echo $resultado['correo_alumno']; ?>"><br/>
			<input type = "hidden" name = "id" value="<?php echo $id; ?>"><br/>
			<input type = "submit" value = "Editar">
		</form>

<?php
}
?>
	</body>



</html>
