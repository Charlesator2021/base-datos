<!DOCTYPE html>
<html> 
 	<head>
   		<title>Consultas de alumnos</title>
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
		$link = Conectarse();
		if($_POST)
		{
			$ncsrv=$_POST['ncfrm'];
			$nombresrv=$_POST['nombrefrm'];
			$appsrv=$_POST['appfrm'];
			$apmsrv=$_POST['apmfrm'];
			$especsrv=$_POST['especfrm'];
			$edadsrv=$_POST['edadfrm'];
			$sexosrv=$_POST['sexofrm'];
			$correosrv=$_POST['correofrm'];
			$queryInsert = "INSERT INTO $tabla (nc, nombre, app, apm, espec, edad, sexo, correo) VALUES ('$ncsrv', '$nombresrv', '$appsrv', '$apmsrv', '$especsrv', '$edadsrv', '$sexosrv', '$correosrv')";
			$resultInsert = mysqli_query($link, $queryInsert);
			if($resultInsert)
			{
				echo "<p class='echo'><strong>Se ingresaron los registros con exito</strong>...<br></p>";
			}
			else
			{
				echo "<p class='echo'>No se ingresaron los registros...<br></p>";
			}
		}
		?>
		<form action="altas.php" method="post" onsubmit="return validar();">
			<h2>Altas de alumnos</h2>
			<h3>Elaboró: Carlos Nathanael Gaytán Abundio</h3>
			<p> Numero de control: </p>
			<input type="text" id="nc" name="ncfrm" placeholder="Ingresa tu numero de control" required/>

			<p> Nombre: </p>
			<input type="text" id="nom" name="nombrefrm" placeholder="Ingresa tu nombre" required/>

			<p> Apellido paterno: </p>
			<input type="text" id="apater" name="appfrm" placeholder="Ingresa tu Apellido paterno" required/>

			<p> Apellido materno: </p>
			<input type="text" id="amater" name="apmfrm" placeholder="Ingresa tu Apellido materno" required/>

			<p> Especialidad: </p>
			<input type="text" id="especial" name="especfrm" placeholder="Ingresa tu Especialidad" required/>

			<p> Edad: </p>
			<input type="number" min="0" max="99" id="E" name="edadfrm" placeholder="Ingresa tu Edad" required/>

			<p> Sexo: </p>
			<input type="text" id="S" name="sexofrm" placeholder="Ingresa tu Sexo" required/>

			<p> Email: </p>
			<input type="email" id="Em" name="correofrm" value="" placeholder="Ingresa tu Email" required/>

			<input type="submit" value="Agregar"/>
			<input type="button" value="Volver" onclick="history.go(-1);">
		</form>
	</body>
</html>