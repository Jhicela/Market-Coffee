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
                            <a class="nav-link" href="?page=tabla">Registros</a>
                        </li>
                        <li class="nav-item">
          <a class="nav-link" href="Administrador.php">Administrador</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
      <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#myModal">
  Open modal
</button>

<!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Publicar Producto</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <div class="form-outline form-white mb-4">
                      <label for="nombre del producto" class="form-label ">Nombre</label>
                      <input type="text" class="form-control" placeholder="Ingrese el nombre del producto" name="nombre" required>
                    </div>  
                      <div class="form-outline form-white mb-4">
                      <label for="imagen">Imagen</label>
                      <input type="file" class="form-control" placeholder="Ingrese el nombre del producto" name="imagen" required>
                    </div> 
                    <div class="form-outline form-white mb-4">
                   <label for="cantidad" class="form-label">Precio</label>
                      <input type="text" class="form-control"  placeholder="Ingrese la descripcion de producto" name="precio" required>
                    </div>
        
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary d-block m-auto" href="../app/formulario_info.php" name="subir">Siguiente</button>  
      </div>

    </div>
  </div>
</div>
  </form>

  <?php
require_once 'conexion.php';
$result = $conn->prepare('SELECT * FROM publicacion');
$result->execute();

while ($view = $result->fetch(PDO::FETCH_ASSOC)) {
    ?>
    <div class="item">
            <span class="titulo-item"><?php echo $view['nombre']; ?></span>
            <img src="data:<?php echo $view['tipo_archivo'] ?>;base64,<?php echo base64_encode($view['foto']); ?>" alt="" class="img-item">
            <span class="precio-item"><?php echo $view['precio']; ?></span>
            <button class="boton-item" onclick="agregarAlCarrito(1,'Celimo cafe',28000)">agregar al carrito</button>
            <a href="../app/producto.html">Ver detalles</a>
         </div> 

    <?php

}
?>

</body>