<!DOCTYPE html>
<html> 
 	<head>
   		<title>Consultas de alumnos</title>
   		<link rel="stylesheet" type="text/css" href="estilos.css">
	</head> 

	<body>
      	<?php
      	$host = "localhost";
      	$usuario = "root";
      	$contrasena = "";
      	$baseDeDatos ="control_escolar_carlosgaytan";
      	$tabla = "alumno";
      	function Conectarse()
      	{
        	global $host, $usuario, $contrasena, $baseDeDatos, $tabla;
        	if (!($link = mysqli_connect($host, $usuario))) 
        	{ 
        		echo "<p class='echo'>Error conectando a la base de datos...<br></p>"; 
        		exit(); 
        	}
        		else
        	{
       			echo "<p class='echo'>Listo, estamos conectados...<br></p>";
        	}
        		if (!mysqli_select_db($link, $baseDeDatos)) 
        	{ 
        		echo "<p class='echo'>Error seleccionando la base de datos...<br></p>"; 
        	    exit(); 
        	}
        	else
        	{
        		echo "<p class='echo'>Obtuvimos la base de datos $baseDeDatos sin problema...<br></p>";
        	}
      		return $link; 
      	}
    	$link = Conectarse();
		$query = "SELECT nc, nombre, app, apm, espec, edad, sexo, correo FROM $tabla;";
		$result = mysqli_query($link, $query);
		?>
	<h2>Consulta de la Tabla Alumno</h2>
	<h3>Elaboro: Carlos Nathanael Gaytan Abundio</h3>
	<table>
	<tr>
	<td>Numero de control</td>
	<td>Nombre del alumno</td>
	<td>Apellido paterno</td>
	<td>Apellido materno</td>
	<td>Especialidad</td>
	<td>Edad</td>
	<td>Sexo</td>
	<td>Correo electronico</td>
	</tr>
		<?php
		while($row = mysqli_fetch_array($result))
		{
			printf("<tr><td>%s</td><td>%s</td>
			<td>%s</td><td>%s</td>
			<td>%s</td><td>%s</td>
			<td>%s</td><td>%s</td></tr>", $row["nc"],$row["nombre"],$row["app"],$row["apm"],$row["espec"],$row["edad"],$row["sexo"],$row["correo"]);
		}
		mysqli_free_result($result);
		mysqli_close($link);
		?>
	</table>
	<input type="button" value="Volver" onclick="history.go(-1);">
	</body> 
</html>