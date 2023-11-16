<?php
	require_once 'conexion.php';
	$mi = null;

	if (isset($_POST['guardar'])) {
		$insert = $conn->prepare('INSERT INTO vendedor (nombre,documento,apellido,telefono,correo_electronico,direccion,clave) VALUES (?,?,?,?,?,?,?)');

		$insert->bindParam(1, $_POST['nombre']);
		$insert->bindParam(2, $_POST['documento']);
		$insert->bindParam(3, $_POST['apellido']);
		$insert->bindParam(4, $_POST['telefono']);
		$insert->bindParam(5, $_POST['correo_electronico']);
		$insert->bindParam(6, $_POST['direccion']);
		$pass = password_hash($_POST['clave'], PASSWORD_BCRYPT);
		$insert->bindParam(7, $pass);

		if ($insert->execute()) {
			$mi = 'datos registrados';
		} else {
			$mi = "datos no registrados";
		}

	}

	?>
<!DOCTYPE html>
<html lang="es-CO" class="h-100"> <!--class="h-100"-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Registrar administrador</title>
	<meta name="theme-color" content="#ff2e01">
	<meta name="MobileOptimized" content="width">
	<meta name="HandhledFriendly" content="true">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar" content="black-traslucent">

	<!--Tags SEO-->
	<meta name="author" content="Miproyecto">
	<meta name="description" content="Aplicativo para enseñanza de Bootstrap">
	<meta name="keyworks" content="SENA, sena, Sena, Web App, web app, WEB APP">

	<!--Favicon-->
	<link rel="icon" type="image/x-icon" href="../media/logo_café.webp">
	<link rel="apple-touch-icon" type="image/webp" href="../media/logo_café.webp">
	<link rel="apple-touch-startup-image" type="image/webp" href="../media/logo_café.webp">

	<!--Styles Bootstrap 5.3.1 Alpha-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"
		integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc"
		crossorigin="anonymous"></script>

</head>
<style>
	body {
		font-family: sans-serif;
		font-size: 1rem;
		font-weight: 400;
		line-height: 1.4;
		color: var(--color-white);
		margin: 0;
	}

	body::before {
		content: "";
		position: fixed;
		top: 0;
		left: 0;
		height: 100%;
		width: 100%;
		z-index: -1;
		background: var(--color-darkblue);
		background-image: url(../media/cafeseco.jpg);
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
	}

	.contenedor {
		width: 75%;
	}

	body {
		background-image: url(../media/fondo.2.jpg);
	}
</style>

<body>
	<header class="mb-auto"><!--class="mb-auto"-->
		<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="index.html">MCO</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
					data-bs-target="#collapsibleNavbar">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="collapsibleNavbar">
					<ul class="navbar-nav">
						</li>
						<li class="nav-item">
							<a class="nav-link" href="publicar.php">Publicar producto</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="?page=tabla">Registro</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="Administrador.php">Administrador</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<?php
	require_once 'conexion.php';
	$mi = null;

	if (isset($_POST['guardar'])) {
		$insert = $conn->prepare('INSERT INTO vendedor (nombre,documento,apellido,telefono,correo_electronico,direccion,clave) VALUES (?,?,?,?,?,?,?)');

		$insert->bindParam(1, $_POST['nombre']);
		$insert->bindParam(2, $_POST['documento']);
		$insert->bindParam(3, $_POST['apellido']);
		$insert->bindParam(4, $_POST['telefono']);
		$insert->bindParam(5, $_POST['correo_electronico']);
		$insert->bindParam(6, $_POST['direccion']);
		$pass = password_hash($_POST['clave'], PASSWORD_BCRYPT);
		$insert->bindParam(7, $pass);

		if ($insert->execute()) {
			$mi = 'datos registrados';
		} else {
			$mi = "datos no registrados";
		}

	}

	?>

	<main class="form-reg w-100 m-auto">
		<?php
		//mensaje de error en la coneccion 
		if ($msg != '') {
			echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>' . $msg . '!</strong>
			</div>';
		}
		?>
		<div class="container py-5">
			<div class="row d-flex justify-content-center align-items-center">
				<div class="col-xl-9">
					<div class="card text-white bg-secondary bg-opacity-75" style="border-radius: 1rem; ">
						<div class="card-body p-5 text-left">
							<div class="mb-md-5 mt-md-4 pb-5"
								style="padding-bottom:0px !important; margin-bottom:0px !important">
								<?php
								//mensaje de confimacion  de datos regiatrados 
								
								if ($mi != '') {
									echo '<div class="alert alert-info alert-dismissible">
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	<strong>' . $mi . '!</strong>
	</div>';
								}
								?>
								<div class="card-header">
									<div class="text-center">
										<span class="float-end ">
											<a href="../app/homeadm.php" aria-label="boton salir"><kbd
													class="bg-danger"><i class="bi bi-x-lg"></i></kbd></a>
										</span>
										<div class="text-center">
											<h1 class="display-6 mb-0">Registro Administrador</h1>
											<div class="subheading-1 mb-2">MCO</div>
										</div>
									</div>
									<div class="card-body">
										<form action="" method="post" enctype="application/x-www-form-urlencoded">
											<div class="row">
												<div class="col">
													<div class="mb-3 mt-3">
														<label for="nombre" class="form-label">Nombre</label>
														<input type="text" class="form-control"
															placeholder=" Introduzca el Nombre" name="nombre" required>
													</div>
												</div>
												<div class="col">
													<div class="mb-3 mt-3">
														<label for="apellido" class="form-label">Apellido</label>
														<input type="text" class="form-control"
															placeholder=" Introduzca los apellidos" name="apellido"
															required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<div class="mb-3 mt-3">
														<label for="documento" class="form-label">Documento</label>
														<input type="text" class="form-control"
															placeholder=" Introduzca el documento" name="documento"
															onkeypress="return event.charCode >= 48 && event.charCode <=57"
															required>
													</div>
												</div>
												<div class="col">
													<div class="mb-3 mt-3">
														<label for="telefono" class="form-label">Telefono </label>
														<input type="number" class="form-control"
															placeholder=" Introduzca el telefono" name="telefono"
															required>
													</div>
												</div>
											</div>
											<div class="row">
												<div class="col">
													<div class="mb-3 mt-3">
														<label for="direccion" class="form-label">Direccion </label>
														<input type="text" class="form-control"
															placeholder=" Introduzca la direccion" name="direccion"
															required>
													</div>
												</div>
												<div class="col">
													<div class="mb-3 mt-3">
														<label for="user" class="form-label">Correo electronico</label>
														<input type="text" class="form-control"
															placeholder="Ingrese su usuario" name="correo_electronico">
													</div>
												</div>
												<div class="mb-3">
													<label for="clave" class="form-label">Clave</label>
													<input type="password" class="form-control"
														placeholder="Introduzca la clave de su correo" name="clave"
														required>
												</div>
											</div>
											<div class="btn-group mx-auto">
												<button type="submit" class="btn btn-success"
													name="guardar">Guardar</button>
											</div>
										</form>
									</div>
									<div class="card-footer text-center">
										© 2023 Copyright
									</div>
								</div>
	</main>
</body>

</html>

</body>

</html>