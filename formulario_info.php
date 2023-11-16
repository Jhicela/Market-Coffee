<!DOCTYPE html>
<html lang="es-CO" class="h-100"> <!--class="h-100"-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Publicar productos</title>
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
	<link rel="icon" type="image/x-icon" href="../media/logo_café_-removebg-preview.png">
	<link rel="apple-touch-icon" type="image/png" href="../media/logo_café_-removebg-preview.png">
	<link rel="apple-touch-startup-image" type="image/png" href="../media/logo_café_-removebg-preview.png">

	<!--Styles Bootstrap 5.3.1 Alpha-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js" defer></script>
	<!--<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>-->

</head>
<body>
  <?php
 require_once 'conexion.php';

 if (isset($_POST['publicar'])){
 if (empty($_POST['nombre']) || empty($_POST['imagen']) || empty($_POST['precio'])) {

  //echo "por favor llene los campos correspondientes";

 } else {
   $nombre = $_POST['nombre'];
   $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
   $precio = $_POST['precio'];
   $tipo_archivo = $_FILES['imagen']['type'];
   $query = "INSERT INTO  local (nombre, imagen, precio, tipo_archivo) 
   VALUES ('$nombre', '$imagen', '$precio', '$tipo_archivo')";
   $resultado = $conn->query($query);

   if ($resultado) {
     echo "se han insertado los datos";
   } else {
     echo "no se han insertado los datos";
   }
  }
}
?>

<?php

		//mensaje de error en la conexion 
		if ($msg!='') {
			echo '<div class="alert alert-danger alert-dismissible">
			<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
			<strong>'.$msg.'!</strong>
			</div>';
		}
		?>

		
<header class="mb-auto"><!--class="mb-auto"-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">MCO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publicar.php">Publicar producto</a>
      </li>
      <li class="nav-item">
                            <a class="nav-link" href="?page=tabla">Tabla</a>
                        </li>
                        <li class="nav-item">
          <a class="nav-link" href="Administrador.php">Administrador</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<section class="vh-100 gradient-custom">
        <div class="container py-5">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
              <div class="card text-white bg-secondary bg-opacity-75" style="border-radius: 1rem; ">
                <div class="card-body p-5 text-left">
                <div class="mb-md-5 mt-md-4 pb-5" style="padding-bottom:0px !important; margin-bottom:0px !important">
                    <div class="card-header">
                      <div class="text-center">
                        <span class="float-end ">
                          <a href="../app/homeadm.php" aria-label="boton salir"><kbd class="bg-danger"><i class="bi bi-x-lg"></i></kbd></a>
                        </span>
                        <h1 class="display-6 mb-0">Publicar productos</h1>
                      </div>
                    </div>
      
                    <div class="mb-3 mt-3 ">
                      <form action="" method="post" enctype="application/x-www-form-urlencoded" >
                      <div class="form-outline form-white mb-4">
                      <label for="imagen">Imagen</label>
                      <input type="file" class="form-control" placeholder="Ingrese el nombre del producto" name="" required>
                    </div>
                      <div class="form-outline form-white mb-4">
                      <label for="nombre del producto" class="form-label ">Nombre producto</label>
                      <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" name="" required>
                    </div>  
                    <div class="form-outline form-white mb-4">
                      <label for="Descripcion" class="form-label">Descripcion</label>
                      <input type="text" class="form-control"  placeholder="Ingrese la descripcion de producto" name="" required>
                    </div>
                    <div class="form-outline form-white mb-4">
                        <label for="Precio" class="form-label">Precio</label>
                        <input type="text" class="form-control"  placeholder="Ingrese el precio del producto" name="" required>
                    </div>
                  
                    <button type="submit" class="btn btn-primary d-block m-auto" name="subir">publicar</button>   
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

</body>