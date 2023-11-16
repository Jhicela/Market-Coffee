<?php
    //se abre la seccion
require_once 'conexion.php';
session_start();

if(isset($_SESSION['usuario'])){
    $search=$conn->prepare('SELECT * FROM usuario WHERE tipo_usuario=?');
    $search->bindParam(1, $_SESSION['usuario']);
    $search->execute();
  $data=$search->fetch(PDO::FETCH_ASSOC);
	
$usuario=null;

  if (is_array($data)) {
    $usuario=$data;
   }
  }

  if(!empty($usuario)) {

    ?>
<!DOCTYPE html>
<html lang="es-CO" class="h-100"> <!--class="h-100"-->
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Homeapr</title>
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
	<link rel="stylesheet" type="text/css" href="../assets/css/styles.css">
	<script type="text/javascript" src="../assets/js/bootstrap.bundle.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>

  <script type="text/javascript">
    $(document).ready(function () {
        $('#tableresponsive').DataTable({
            dom: 'Bflrtip',
            responsive: true,
            language: {
                url: '../assets/datatables/es-ES.json'
            },
        });
    });
    </script>

  <style>
  body {
    background-image: url(../media/fondo-1.jpg);
    background-repeat: no-repeat;
    background-size:cover;
  }
</style>
</head>
<body>

<header class="mb-auto"><!--class="mb-auto"-->
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.html">MCO</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
      <ul class="navbar-nav me-auto">
        <li class="nav-item">
          <a class="nav-link" href="carritocompras.php">Carro de compras</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="recetas-2.html">Recetas </a>
        </li>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="historias.html">Historias</a>
      </li>
      </ul>
	  <div class="d-flex">
      <span style="margin-top:5px; margin-right:10px" class="text-light"><?php echo $data['nombre']." ".$data['apellido']; ?></span>
    <a href="logout.php" class="btn btn-primary"><i class="bi bi-person-fill"></i>Salir</a>
                    </div>
    </div>
  </div>
</nav>
  </header>
  <main class="container p-5 mx-auto mt-5 table-responsive">
    </main>

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

