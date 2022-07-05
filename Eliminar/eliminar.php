<!DOCTYPE html>
<html> 
 	<head>
   		<title>Eliminar alumnos</title>
   		<script src="valida.js"></script>
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
		$link=Conectarse();
		if($_POST)
		{
			$queryDelete = "DELETE FROM $tabla WHERE nc = ".$_POST['ncfrm'].";";
			$resultDelete = mysqli_query($link, $queryDelete);
			if($resultDelete)
			{
				echo "<p class='echo'><strong>El registro se ha eliminado con exito</strong>...<br></p>";
			}
			else
			{
				echo "<p class='echo'>Hubo un problema borrando el registro...</p>";
			}
		}
		mysqli_close($link);
		?>
		<form action="eliminar.php" method="post">
			<h2>Borra alumnos</h2>
			<h3>Elaboró: Carlos Nathanael Gaytán Abundio</h3>
			<p> Numero de control: </p>
			<input type="text" id="nc" name="ncfrm" placeholder="Ingresa tu numero de control" required/>

			<p></p>
			<p></p>
			<p></p>
			<p></p>
			<input type="submit" value="Borrar"/>
			<input type="button" value="Volver" onclick="history.go(-1);">
		</form>
	</body> 
</html>