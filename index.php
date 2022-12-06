<?php 
	session_start();

	  $conexion = new mysqli('localhost', 'root', '', 'proyecto_db');
	  if(!$conexion){
	  	echo "Error en la base de datos";
	  }

	if(isset($_SESSION['user_id'])){
		$sesion = $_SESSION['user_id'];

		$consulta = "SELECT * FROM usuarios WHERE id = $sesion";

		$resultado = mysqli_query($conexion, $consulta);

		$fila = mysqli_fetch_row($resultado);
	    $id = $fila[0];
	    $usuario = $fila[1];
	    $nombre = $fila[2];
	    $contraUsu = $fila[3];
	    $email = $fila[4];
	    $telefono = $fila[5];

		$user = null;
		if(!empty($fila)){
			$user = $fila;
		}
	}
 ?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="utf-8">
	<title>CBWorks · P&aacute;gina Principal</title>
	<meta description="CBWorks es un foro estudiantil enfocado a la resolución de dudas entre estudiantes del CBTis no.27, comienza haciendo publicaciones, compartiendo ideas y resolviendo dudas">
	<link rel="stylesheet" type="text/css" href="assets\css\estilo.css">
</head>

<body>
	<header>
		<h1>CBWorks</h1>
		<figure>
			CBWorks
			<figcaption>El mejor foro escolar.</figcaption>
		</figure>
	</header>

	<nav>
		<font size="5" face="Arial">
			<ul class="menu">
				<?php if(!empty($user)):?>
					<li><a href="logout.php"><b>Cerrar Sesión</b></a></li>
				<?php else:?>
					<li><a href="login.php"><b>Iniciar Sesión</b></a></li>
					<li><a href="signup.php"><b>Registrarse</b></a></li>
				<?php endif;?>
			</ul>
		</font>	
	</nav>

	<div class="body">
		<section>
			<hgroup><?php if(!empty($user)):?>
					<h1>Bienvenido, <?= $fila[4];?></h1>
					<h2>Has iniciado sesión correctamente, <?= $fila[1];?></h2>
					<?php else:?>
					<h1>Bienvenid@ a CBWorks.</h1>
					<h2>Por favor, <a href="login.php">Inicia Sesi&oacute;n</a> o <a href="signup.php">Registrate</a></h2>
					<?php endif;?>
			</hgroup>
			
			<br>

			<center>
				<img src="assets\logo2.jpg" width="200" height="200" id="logo">
			</center>
			
			<br><br><br><br><br><br>

			<font face="Calibri" size="6">

			</font>

		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		<br><br>

		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		<br><br>

		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.

		<br><br>

		Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
		tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
		quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
		consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
		cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
		proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
		</section>


	</div>

	<div class="footer">
		<footer>
			<li>Acerca de nosotros</li>
			<li>Política de Privacidad</li>
		</footer>
	</div>
</body>
</html>