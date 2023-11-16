<?php
  require_once 'conexion.php';
  $mi = null;
  session_start();

  if (isset($_POST['validar'])) {
    $result = $conn->prepare('SELECT * FROM vendedor WHERE correo_electronico=? UNION SELECT * FROM usuario WHERE correo_electronico=?');
    $result->bindParam(1, $_POST['correo_electronico']);
    $result->bindParam(2, $_POST['correo_electronico']);
    $result->execute();

    //verificamos si hay datos
  
    if ($data = $result->fetch(PDO::FETCH_ASSOC)) {

      switch ($data['tipo_usuario']) {
        case 'usuario':
          //verificamos si la contraseña es correcta 
  
          if (password_verify($_POST['clave'], $data['clave'])) {
            $_SESSION['usuario'] = $data['tipo_usuario'];
            header('location: homeuser.php');
          } else {
            $mi = array("Contraseña incorrecta", "warning");
          }

          break;
        case 'vendedor':
          //verificamos si la contraseña es correcta 
          if (password_verify($_POST['clave'], $data['clave'])) {
            $_SESSION['vendedor'] = $data['tipo_usuario'];
            header('location: homeadm.php');
          } else {
            $mi = array("Contraseña incorrecta", "warning");
          }

          break;

        default:
          break;
      }

    } else {
      $mi = array("Usuario incorrecto", "danger");
    }
  }



  ?>
<!DOCTYPE html>
<html lang="es-CO" class="h-100"> <!--class="h-100"-->

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>login</title>
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
  <link rel="apple-touch-icon" type="image/png" href="../media/logo_café.webp">
  <link rel="apple-touch-startup-image" type="image/png" href="../media/logo_café.webp">

  <!--Styles Bootstrap 5.3.1 Alpha-->
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script type="text/javascript" src="../assets/js/bootstrap.bundle.js" defer></script>
  <!--<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" integrity="sha384-rOA1PnstxnOBLzCLMcre8ybwbTmemjzdNlILg8O7z1lUkLXozs4DHonlDtnE7fpc" crossorigin="anonymous"></script>-->
  <style>
    body {
      background-image: url(../media/Fondo.jpg);
    }
  </style>
</head>

<body>
  <main class="form-reg w-100 m-auto">


    <section class="vh-100 gradient-custom">
      <div class="container py-5">

        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-12 col-md-8 col-lg-6 col-xl-5">
            <div class="card text-white bg-secondary bg-opacity-75" style="border-radius: 1rem; ">
              <div class="card-body p-5 text-left">
                <?php
                //mensaje de confimacion  de datos regiatrados 
                
                if (isset($mi)) {
                  echo '<div class="alert alert-' . $mi[1] . ' alert-dismissible">
	<button type="button" class="btn-close" data-bs-dismiss="alert"></button>
	<strong>' . $mi[0] . '!</strong>
	</div>';
                }
                ?>
                <div class="mb-md-5 mt-md-4 pb-5" style="padding-bottom:0px !important; margin-bottom:0px !important">
                  <div class="card-header">
                    <div class="text-center">
                      <span class="float-end ">
                        <a href="../" aria-label="boton salir"><kbd class="bg-danger"><i
                              class="bi bi-x-lg"></i></kbd></a>
                      </span>
                      <h1 class="display-6 mb-0">Inicio de sesión</h1>
                      <div class="subheading-1 mb-2">MCO</div>
                    </div>
                  </div>
                  <p class="text-white-50 mb-5 text-center">¡Introduzca su correo y contraseña! </p>

                  <div class="mb-3 mt-3 ">
                    <form action="" method="post" enctype="application/x-www-form-urlencoded">
                      <label for="correo_electronico" class="form-label ">Correo Electronico</label>
                      <input type="email" class="form-control" placeholder="Ingrese su usuario"
                        name="correo_electronico" required>
                  </div>
                  <div class="form-outline form-white mb-4">
                    <label for="clave" class="form-label">Contraseña</label>
                    <input type="password" class="form-control" placeholder="Introduzca la clave de su correo"
                      name="clave" required>
                  </div>

                  <button type="submit" class="btn btn-primary d-block m-auto" name="validar">Ingresar</button>

                  <hr class="my-4">
                  <div>
                    <p class="mb-0">¿No tienes una cuenta? <a href="../app/registro.php"
                        class="text-white-50 fw-bold">Registrarme</a>
                    </p>
                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
</body>

</html>