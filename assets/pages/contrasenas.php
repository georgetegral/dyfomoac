<!doctype html>

<?php
   include('../../session.php');
   include("../../config.php");
   date_default_timezone_set("America/Monterrey");
?>

<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../img/Logo.jpg">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DyFOMOAC</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="../css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="../css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="../css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="../css/pe-icon-7-stroke.css" rel="stylesheet" />


</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="../img/dashboard/nina.jpg">
		<!-- <div class="sidebar" data-color="azure" data-image="assets/img/dashboard/nina.jpg"> -->
    <!--

        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag

    -->

    <!--
    Cambia según el tipo de usuario
    Tipos:
    1. Administrador
    2. Maestro
    3. Padre
    4. Estudiante de Servicio Social
    -->

    	<div class="sidebar-wrapper">

        <?php
          if($tipo=="1"){
        ?>

        <div class="logo">
            <a href="../../index.php" class="simple-text">
                DyFOMOAC Administrador
            </a>
        </div>

        <ul class="nav">
          <li>
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver Reportes</p>
              </a>
          </li>
          <li>
              <a href="llenarReportes.php">
                <i class="pe-7s-news-paper"></i>
                <p>Llenar Reportes</p>
              </a>
          </li>
          <li>
              <a href="grupos.php">
                <i class="pe-7s-users"></i>
                <p>Grupos</p>
              </a>
          </li>
            <li>
                <a href="maestro.php">
                  <i class="pe-7s-user-female"></i>
                  <p>Maestros</p>
                </a>
            </li>
            <li>
                <a href="estudiante.php">
                  <i class="pe-7s-user"></i>
                  <p>Estudiantes</p>
                </a>
            </li>
            <li>
                <a href="padres.php">
                  <i class="pe-7s-users"></i>
                  <p>Padres de familia</p>
                </a>
            </li>
            <li class="active">
                <a href="contrasenas.php">
                  <i class="pe-7s-news-paper"></i>
                  <p>Contraseñas</p>
                </a>
            </li>

        </ul>

        <?php
          }
        ?>

        <?php
          if($tipo=="2"){
        ?>

        <div class="logo">
            <a href="index.php" class="simple-text">
                DyFOMOAC<br>
                Maestro
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="index.php">
                  <i class="pe-7s-news-paper"></i>
                  <p>Noticias</p>
                </a>
            </li>
            <li>
                <a href="index.php">
                  <i class="pe-7s-hourglass"></i>
                  <p>Registrar horas</p>
                </a>
            </li>
            <li>
                <a href="index.php">
                  <i class="pe-7s-users"></i>
                  <p>Mis Grupos</p>
                </a>
            </li>
            <li>
                <a href="index.php">
                  <i class="pe-7s-file"></i>
                  <p>Reportes</p>
                </a>
            </li>

        </ul>

        <?php
          }
        ?>

        <?php
          if($tipo=="3"){
        ?>

        <div class="logo">
            <a href="index.php" class="simple-text">
                DyFOMOAC <br>
                Padre de Familia
            </a>
        </div>

        <ul class="nav">
            <li class="active">
                <a href="index.php">
                  <i class="pe-7s-news-paper"></i>
                  <p>Ejercicios</p>
                </a>
            </li>
            <li>
                <a href="index.php">
                  <i class="pe-7s-file"></i>
                  <p>Ver reportes</p>
                </a>
            </li>

        </ul>

        <?php
          }
        ?>

        <?php
          if($tipo=="4"){
        ?>

        <div class="logo">
            <a href="index.php" class="simple-text">
                DyFOMOAC<br>
                Servicio Social
            </a>
        </div>

        <ul class="nav">
          <li class="active">
            <a href="index.php">
              <i class="pe-7s-hourglass"></i>
              <p>Registrar horas</p>
            </a>
          </li>

        </ul>

        <?php
          }
        ?>


    	</div>
    </div>

    <div class="main-panel">

        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse">

                    <ul class="nav navbar-nav navbar-right">

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

																<!-- Nombre del usuario-->

																		<p>
																			<?php echo $login_session; ?>
																		<b class="caret"></b>
																	</p>

                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="../../editInfo.php">Editar mi información</a></li>
                                <li class="divider"></li>
                                <li><a href="../../logout.php">Cerrar Sesión</a></li>
                              </ul>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
              <?php
              if($tipo==1){
              ?>
              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Cuentas</h4>
                          <p class="category">Aquí se muestran los usuarios y contraseñas de las cuentas del DyFOMOAC.</p>
                          </div>
                      <div class="content">
                        <hr>
                        <h5>Hostinger</h5>
                        <p>Link: <a href="https://cpanel.hostinger.mx/">https://cpanel.hostinger.mx/</a></p>
                        <p>Usuario: soportedyfomoac@gmail.com<br>Contraseña: 123456</p>
                        <hr>
                        <h5>Cuenta de correo de Gmail</h5>
                        <p>Link: <a href="https://mail.google.com">https://mail.google.com</a></p>
                        <p>Usuario: soportedyfomoac@gmail.com<br>Contraseña: Ab1234cd</p>
                      </div>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="card">
                      <div class="header">
                          <h4 class="title">Contraseñas</h4>
                          <p class="category">Aquí se muestran los usuarios y contraseñas de las cuentas de todos los usuarios registrados en el sistema.</p>
                          </div>
                      <div class="content">

                        <div class="content table-responsive table-full-width">
                            <table class="table table-hover table-striped">

                                <thead>
                                  <th>Nombre</th>
                                  <th>Tipo de usuario</th>
                                  <th>Correo</th>
                                  <th>Contraseña</th>
                                </thead>
                                <tbody>
                                <?php
                                $queryU = "SELECT nombre,apellido,tipo,correo,contrasena FROM usuarios WHERE contrasena != '' AND nombre !='' ORDER BY nombre ASC ";
                                $resultU = $conexion->query($queryU);
                                $arr = array();
                                while($tupla = mysqli_fetch_array($resultU, MYSQLI_ASSOC) ){
                                  $arr[] = $tupla;
                                }
                                foreach ($arr as $res){
                                  ?>
                                  <tr>
                                    <td><?php echo $res["nombre"]." ".$res["apellido"]; ?></td>
                                    <td><?php
                                    $tipo=$res["tipo"];
                                    if($tipo==1){
                                      echo "Administrador";
                                    }
                                    if($tipo==2){
                                      echo "Maestro";
                                    }
                                    if($tipo==3){
                                      echo "Padre de familia";
                                    }
                                    if($tipo==4){
                                      echo "Estudiante";
                                    }
                                    if($tipo==5){
                                      echo "Cuenta para registro diario";
                                    }
                                    ?> </td>
                                    <td><?php echo $res["correo"]; ?></td>
                                    <td><?php echo $res["contrasena"]; ?></td>
                                  </tr>
                                  <?php
                                }
                                ?>
                                </tbody>
                          </div>

                      </div>
                  </div>
              </div>
              <?php
              }
              ?>
            </div>
        </div>
</div>


</body>



  <!--   Core JS Files   -->
  <script src="../js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../js/bootstrap-notify.js"></script>

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
