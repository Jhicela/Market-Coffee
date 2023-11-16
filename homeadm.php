<?php
    //se abre la seccion
require_once 'conexion.php';
session_start();

if(isset($_SESSION['vendedor'])){
  $search=$conn->prepare('SELECT * FROM vendedor WHERE tipo_usuario=?');
  $search->bindParam(1, $_SESSION['vendedor']);
  $search->execute();
  $data=$search->fetch(PDO::FETCH_ASSOC);

}
if (is_array($data)) {

    ?>
<!DOCTYPE html>
<html lang="es-CO" class="h-100"> <!--class="h-100"-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>homeadms</title>
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
	<link rel="apple-touch-icon" type="image/png" href=".../media/logo_café.webp">
	<link rel="apple-touch-startup-image" type="image/png" href="../media/logo_café.webp">

	<!--Styles Bootstrap 5.3.1 Alpha-->
	<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>
</head>
<body>

<header class="mb-auto"><!--class="mb-auto"-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">MCO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar" style="justify-content:space-between">
      <ul class="navbar-nav">
      </li>
      <li class="nav-item">
        <a class="nav-link" href="publicar.php">Publicar producto</a>
      </li>
      <li class="nav-item">
                            <a class="nav-link" href="?page=tabla">Registros</a>
                        </li>
                        <li class="nav-item">
          <a class="nav-link" href="Administrador.php">Administrador</a>
        </li>
      </ul>
      <div class="d-flex">
      <span style="margin-top:5px; margin-right:10px"  class="text-light"><?php echo $data['nombre']." ".$data['apellido']; ?></span>
    <a href="logout.php" class="btn btn-primary"><i class="bi bi-person-fill"></i>Salir</a>
                    </div>
    </div>
  </div>
</nav>
</header>

<main class="container p-5 mx-auto mt-5">
<?php
$page=isset($_GET['page']) ? strtolower($_GET['page']) :'homeadm';
require_once './' .$page. '.php';

if ($page== 'homeadm') {
	require_once 'iniciar.php';

}

?>
<!--Bienvenida administrador -->
<div id="intro" class="bg-image shadow-2-strong">
      <div class="mask"  >
        <div class="container d-flex align-items-center justify-content-center text-center h-100">
         <div class="text-lightlight">
            <h1 class="mb-3">Bienvenido Administrador</h1>
            <h5 class="mb-4">¿Qué tareas vas a realizar hoy en MCO?</h5>
            <a class="btn btn-outline-dark btn-lg m-2 " href="publicar.php"   role="button"
              rel="nofollow">Publicar producto</a>
              <a class="btn btn-outline-dark btn-lg m-2 " href="?page=tabla" 
              role="button">Registros</a>
              <a class="btn btn-outline-dark btn-lg m-2 " href="Administrador.php"   role="button"
              rel="nofollow">Agregar administradores</a>
          </div>
        </div>
      </div>
</div>
		
    </main>
    <fotter>
        
    </footer>
<?php
}else{
    header('location: ./');
}

?>
</body>
</html>

