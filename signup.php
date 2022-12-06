<?php 
	require 'database.php';

	$message = '';

	if(!empty($_POST['usuario']) && !empty($_POST['nombre']) && !empty($_POST['password']) && !empty($_POST['correo']) && !empty($_POST['telefono'])){
		$sql = "INSERT INTO usuarios (usuario, nombre, password, email, telefono) VALUES (:usuario, :nombre, :password, :email, :telefono)";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(':usuario', $_POST["usuario"]);
		$stmt->bindParam(':nombre', $_POST["nombre"]);
		$password = $_POST["password"];
		//$password = password_hash($_POST["password"], PASSWORD_BCRYPT);
		$stmt->bindParam(':password', $password);
		$stmt->bindParam(':email', $_POST["correo"]);
		$stmt->bindParam(':telefono', $_POST["telefono"]);

		if($stmt->execute()){
			$message = "¡Se ha registrado el usuario correctamente!";
			
		}else{
			$message = "¡Ocurrió un error al momento de registrar el usuario!";
			
		}
	}
 ?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<title>CBWorks · Registro</title>
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
			<ul class="menu">
				<li><a href="login.php">Iniciar Sesión</a></li>
				<li><a href="signup.php">Registrarse</a></li>
			</ul>
		</nav>

		<div class="body">
			<div class="mensaje-opc">
				<p align="center"><b>Regristro</b></p>
				<p align="center">o <a href="login.php">iniciar sesión</a></p>
			<?php if(!empty($message)): ?>
				<p align="center"><b><?php echo $message; ?></b></p>
			<?php endif; ?>
			</div>
			
			<main>
				<form action="signup.php" method="POST" class="formulario" id="formulario">
					<!-- Grupo: Usuario -->
					<div class="formulario__grupo" id="grupo__usuario">
						<label for="usuario" class="formulario__label">Usuario</label>
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
					</div>

					<!-- Grupo: Nombre -->
					<div class="formulario__grupo" id="grupo__nombre">
						<label for="nombre" class="formulario__label">Nombre</label>
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
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

					<!-- Grupo: Contraseña 2 -->
					<div class="formulario__grupo" id="grupo__password2">
						<label for="password2" class="formulario__label">Repetir Contraseña</label>
						<div class="formulario__grupo-input">
							<input type="password" class="formulario__input" name="password2" id="password2">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
					</div>

					<!-- Grupo: Correo Electronico -->
					<div class="formulario__grupo" id="grupo__correo">
						<label for="correo" class="formulario__label">Correo Electrónico</label>
						<div class="formulario__grupo-input">
							<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
					</div>

					<!-- Grupo: Teléfono -->
					<div class="formulario__grupo" id="grupo__telefono">
						<label for="telefono" class="formulario__label">Teléfono</label>
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>
						<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
					</div>

					<!-- Grupo: Terminos y Condiciones -->
					<div class="formulario__grupo" id="grupo__terminos">
						<label class="formulario__label">
							<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
							Acepto los Terminos y Condiciones
						</label>
					</div>

					<div class="formulario__mensaje" id="formulario__mensaje">
						<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
					</div>

					<div class="formulario__grupo formulario__grupo-btn-enviar">
						<button type="submit" class="formulario__btn" name="submit">Enviar</button>
						<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
					</div>

					
				</form>
			</main>

			<script src="partials/script.js"></script>
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