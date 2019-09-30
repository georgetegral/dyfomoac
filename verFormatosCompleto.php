<!doctype html>

<?php
   include('session.php');
   include('config.php');
   date_default_timezone_set("America/Monterrey");
   function calc($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
  }

   if($_GET["idmenor"]){
     $id=$_GET["idmenor"];
     $tipoF=$_GET["tipo"];
     $sqlID="SELECT * FROM menor WHERE id='$id'";
     $resultID = $conexion->query($sqlID);
     $infoID = mysqli_fetch_array($resultID,MYSQLI_ASSOC);

     $nomMen=$infoID["nombre"];
     $apeMen=$infoID["apellido"];
     $fnacMen=$infoID["fecha_nacimiento"];
     $edadMen=calc($fnacMen);

   }

   //Tupla ingreso
   $sqlI="SELECT DISTINCT f.fecha, m.id FROM menor AS m, formatoingreso AS f WHERE m.id=f.id_menor AND m.id='$id' ORDER BY f.fecha DESC";
   $resultI = $conexion->query($sqlI);
   $resI = array();
   while($tupla = mysqli_fetch_array($resultI, MYSQLI_ASSOC) ){
     $resI[] = $tupla;
   }

   //Tupla durante
   $sqlD="SELECT DISTINCT f.fecha, m.id FROM menor AS m, formatodurante AS f WHERE m.id=f.id_menor AND m.id='$id' ORDER BY f.fecha DESC";
   $resultD = $conexion->query($sqlD);
   $resD = array();
   while($tupla = mysqli_fetch_array($resultD, MYSQLI_ASSOC) ){
     $resD[] = $tupla;
   }

   //Tupla salida
   $sqlS="SELECT DISTINCT f.fecha, m.id FROM menor AS m, formatosalida AS f WHERE m.id=f.id_menor AND m.id='$id' ORDER BY f.fecha DESC";
   $resultS = $conexion->query($sqlS);
   $resS = array();
   while($tupla = mysqli_fetch_array($resultS, MYSQLI_ASSOC) ){
     $resS[] = $tupla;
   }

?>

<html lang="es">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/Logo.jpg">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>DyFOMOAC</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>
    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>
    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />
    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="green" data-image="assets/img/dashboard/nina.jpg">
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
            <a href="index.php" class="simple-text">
                DyFOMOAC Administrador
            </a>
        </div>

        <ul class="nav">
          <li class="active">
              <a href="index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver Reportes</p>
              </a>
          </li>
          <li>
              <a href="assets/pages/llenarReportes.php">
                <i class="pe-7s-news-paper"></i>
                <p>Llenar Reportes</p>
              </a>
          </li>
            <li>
                <a href="/assets/pages/grupos.php">
                  <i class="pe-7s-users"></i>
                  <p>Grupos</p>
                </a>
            </li>
            <li>
                <a href="/assets/pages/maestro.php">
                  <i class="pe-7s-user-female"></i>
                  <p>Maestros</p>
                </a>
            </li>
            <li>
                <a href="/assets/pages/estudiante.php">
                  <i class="pe-7s-user"></i>
                  <p>Estudiantes</p>
                </a>
            </li>

            <li>
                <a href="/assets/pages/padres.php">
                  <i class="pe-7s-users"></i>
                  <p>Padres de familia</p>
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
                <p>Ver reportes</p>
              </a>
          </li>
          <li>
              <a href="assets/pages/reportesLista.php">
                <i class="pe-7s-news-paper"></i>
                <p>Llenar Reportes</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/gruposMaestro.php">
                <i class="pe-7s-users"></i>
                <p>Mis Grupos</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/verProgresoMaestro.php">
                <i class="pe-7s-hourglass"></i>
                <p>Registrar horas</p>
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
                <p>Ver reportes</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/reportesListaPadre.php">
                <i class="pe-7s-news-paper"></i>
                <p>Editar reportes</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/administrarHijos.php">
                <i class="pe-7s-user"></i>
                <p>Administrar hijos</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/ejercicios.php">
                <i class="pe-7s-file"></i>
                <p>Ejercicios</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/reglamento.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reglamento</p>
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

          <li>
            <a href="index.php">
              <i class="pe-7s-news-paper"></i>
              <p>Ver tu progreso</p>
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
                                <li><a href="editInfo.php">Editar mi información</a></li>
                                <li class="divider"></li>
                                <li><a href="logout.php">Cerrar Sesión</a></li>
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
                 if($tipo=="1" || $tipo=="2" || $tipo=="3"){
                   //Administrador, padre y maestro
               ?>
               <h5>Se muestran todos los reportes de <?php echo $tipoF;?>.</h5>

               <?php
                if($tipoF=="ingreso"){
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Formatos de ingreso</h4>
                         </div>
                        <div class="content">

                          <div class="content table-responsive table-full-width">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <th>Fecha</th>
                                  <th>Historial</th>
                                </thead>

                                <tbody>
                                  <tr>
                                  <?php
                                  foreach ($resI as $tupla){
                                  ?>
                                  <td><?php echo $tupla["fecha"]; ?></td>

                                  <td>
                                    <form method="get" action ="formato.php">
                                      <input type="hidden" name="tipo" value="ingreso"/>
                                      <input type="hidden" name="id" value="<?php echo $tupla["id"]; ?>"/>
                                      <input type="hidden" name="fechaReg" value="<?php echo $tupla["fecha"]; ?>"/>
                                      <button type="submit" class="btn btn-info btn-fill pull-left">Ver formatos</button>
                                      <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                      <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                    </form>
                                  </td>

                                  </tr>
                                  <?php
                                  }
                                  ?>

                                </tbody>
                              </table>
                          </div>

                          <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <?php
                }

                if($tipoF=="durante"){
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Formatos dentro de la estancia</h4>
                            </div>
                        <div class="content">

                          <div class="content table-responsive table-full-width">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <th>Fecha</th>
                                  <th>Historial</th>
                                </thead>

                                <tbody>
                                  <tr>
                                  <?php
                                  foreach ($resD as $tupla){
                                  ?>
                                  <td><?php echo $tupla["fecha"]; ?></td>

                                  <td>
                                    <form method="get" action ="formato.php">
                                      <input type="hidden" name="tipo" value="durante"/>
                                      <input type="hidden" name="id" value="<?php echo $tupla["id"]; ?>"/>
                                      <input type="hidden" name="fechaReg" value="<?php echo $tupla["fecha"]; ?>"/>
                                      <button type="submit" class="btn btn-info btn-fill pull-left">Ver formatos</button>
                                      <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                      <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                    </form>
                                  </td>

                                  </tr>
                                  <?php
                                  }
                                  ?>

                                </tbody>
                              </table>
                          </div>

                          <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
                <?php
                }

                if($tipoF=="salida"){
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">Formatos de salida</h4>
                            </div>
                        <div class="content">

                          <div class="content table-responsive table-full-width">
                              <table class="table table-hover table-striped">
                                <thead>
                                  <th>Fecha</th>
                                  <th>Historial</th>
                                </thead>

                                <tbody>
                                  <tr>
                                  <?php
                                  foreach ($resS as $tupla){
                                  ?>
                                  <td><?php echo $tupla["fecha"]; ?></td>

                                  <td>
                                    <form method="get" action ="formato.php">
                                      <input type="hidden" name="tipo" value="salida"/>
                                      <input type="hidden" name="id" value="<?php echo $tupla["id"]; ?>"/>
                                      <input type="hidden" name="fechaReg" value="<?php echo $tupla["fecha"]; ?>"/>
                                      <button type="submit" class="btn btn-info btn-fill pull-left">Ver formatos</button>
                                      <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                      <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                    </form>
                                  </td>

                                  </tr>
                                  <?php
                                  }
                                  ?>

                                </tbody>
                              </table>
                          </div>

                          <div class="clearfix"></div>

                        </div>
                    </div>
                </div>
                <?php
                }
               ?>



               <?php
                }
               ?>

               <?php
                 if($tipo=="2"){
                   //Maestro
               ?>

               <?php
                }
               ?>

               <?php
                 if($tipo=="3"){
                   //Padre
               ?>

               <?php
                }
               ?>

              <?php
                if($tipo=="4"){
                  //Estudiante
              ?>

              <?php
                }
              ?>

            </div>
        </div>

    </div>
</div>

</body>

  <!--   Core JS Files   -->
  <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
