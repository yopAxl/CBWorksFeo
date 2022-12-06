<?php 
  session_start();

  $message = "";

  $conexion = new mysqli('localhost', 'root', '', 'proyecto_db');
  if(!$conexion){
  	echo "Error en la base de datos";
  }

  if (isset($_SESSION['user_id'])) {
    header('Location: /axelphp/CBWorksFeo');
  }


  if(!empty($_POST["correo"]) && !empty($_POST["password"])) {

  	$correo = $_POST["correo"];
  	$password = $_POST["password"];

   	$consulta = "SELECT * FROM usuarios WHERE email = '$correo'";
   	$resultado = mysqli_query($conexion, $consulta);

   	if(!$resultado) {
   		$message = "Esta cuenta no existe, por favor registra una nueva.";
   	}
   	$fila = mysqli_fetch_row($resultado);
	    if($fila != null){
	   	$id = $fila[0];
	    $usuario = $fila[1];
	    $nombre = $fila[2];
	    $contraUsu = $fila[3];
	    $email = $fila[4];
	    $telefono = $fila[5];
		   if($password == $contraUsu){
		   	$_SESSION['user_id'] = $id;
		   	header("Location: /axelphp/CBWorksFeo");
		   }else{
		   	$message = "Contraseña incorrecta.";
		   }	    	
	    }else{
	    	$message = "Esta cuenta no existe, por favor registra una nueva.";
	    }
	   
   }

 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>CBWorks · Inicio de Sesión</title>
		<link rel="stylesheet" type="text/css" href="assets\css\estilo.css">
		<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
		<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	</head>

	<body>
		<header>
			<font size="10" face="Arial">
				<b>
					<a href="index.html">CBWorks</a>
				</b>
			</font>
		</header>

		<nav>
			<font size="5" face="Arial">
				<ul class="menu">
					<li><a href="login.php">Iniciar Sesión</a></li>
					<li><a href="signup.php">Registrarse</a></li>

				</ul>
			</font>	
		</nav>

		<div class="body">
			<div class="mensaje-opc">
				<p align="center"><b>Inicio de Sesión</b></p>
				<p align="center">o <a href="signup.php">registrarse</a></p>
				<?php if(!empty($message)): ?>
					<p align="center"><b><?php echo $message; ?></b></p>
				<?php endif; ?>
			</div>

			<main>
				<form action="login.php" method="POST" class="formulario" id="formulario">
					<!-- Grupo: Correo Electronico -->
					<div class="formulario__grupo" id="grupo__correo">
						<label for="correo" class="formulario__label">Correo Electrónico</label>
						<div class="formulario__grupo-input">
							<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
					</div>

					<!-- Grupo: Contraseña -->
					<div class="formulario__grupo" id="grupo__password">
						<label for="password" class="formulario__label">Contraseña</label>
						<div class="formulario__grupo-input">
							<input type="password" class="formulario__input" name="password" id="password">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
					</div>

					<div class="formulario__mensaje" id="formulario__mensaje">
						<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
					</div>

					<div class="formulario__grupo formulario__grupo-btn-enviar">
						<button type="submit" class="formulario__btn" name="submit_log">Enviar</button>
						<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
					</div>
				</form>
			</main>

			<script src="partials/script22.js"></script>
			<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
		</div>
		<div class="footer">
			<footer>
				<li>Acerca de nosotros</li>
				<li>Política de Privacidad</li>
			</footer>
		</div>
	</body>
</html>