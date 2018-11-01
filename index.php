<?php 

	$db = 'db_blog';
	$host = 'localhost';
	$user = 'root';
	$pass = '';

	$conexion = new mysqli($host, $user, $pass, $db);

	if(mysqli_connect_errno())
	{
		printf("Error al intentar establecer una conexion con la base de datos: ". mysqli_connect_errno());
	}

	$sql = "SELECT post.titulo, post.contenido, post.imagen, post.fecha, usuario.nombre, usuario.apellido
			FROM post INNER JOIN usuario ON post.id_autor = usuario.id_usuario";

	$sqlPrueba = "SELECT * FROM usuario";

	$respuesta = $conexion->query($sql);

	

 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Chaco Gamers</title>
	<link href="https://fonts.googleapis.com/css?family=Open+Sans|Oswald:700|Roboto+Condensed:300" rel="stylesheet">
	<link rel="stylesheet" href="public/styles/style7.css">
</head>
<body>
	<?php require('views/header.php'); ?>
	
	<div class="container">

		<?php 

			while($data = $respuesta->fetch_assoc())
			{
				echo "<div class='postContainer'>";
				echo "<div class='postContainerTitle'>";
					echo "<h3>".$data['titulo']."</h3>";
				echo "</div>";
				echo "<div class='postContainerBody'>";
					echo "<img src=".$data['imagen']." width='400' height='350'>";
				echo "</div>";
				echo "<div class='postContainerFooter'>";
					echo "<span id='postAutor'>".$data['nombre']." ".$data['apellido']."</span>";
					echo "<span id='postFecha'>".$data['fecha']."</span>";
				echo "</div>";
			echo "</div>";
			}

		 ?>
		
		
		

	<?php require('views/footer.php'); ?>
</body>
</html>