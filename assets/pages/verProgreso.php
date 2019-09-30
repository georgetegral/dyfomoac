<!doctype html>

<?php
   include('../../session.php');
   include("../../config.php");
   date_default_timezone_set("America/Monterrey");
     $sqlEst=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE est_correo = '$correo' ");
     $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);

     $registrado = 1;

     if(!empty($info["matricula"])){

       $matriculaEst=$info["matricula"];
       $celEst=$info["celular"];
       $carreraEst=$info["carrera"];
       $sgmmEst=$info["sgmm"];
       $nomTutorEst=$info["nombre_tutor"];
       $apeTutorEst=$info["apellido_tutor"];
       $tel1Est=$info["tel_tutor_1"];
       $tel2Est=$info["tel_tutor_2"];
       $activoEst=$info["activo"];
       if($activoEst==1){
         $activoEst="Activo";
       } else {
         $activoEst="Inactivo";
       }
       $ubiFotoEst="../fotos/".$correo.".jpg";

     } else {

       $registrado = 0;

     }

     $sqlEst=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = '$correo' ");
     $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);

     $nomEst=$info["nombre"];
     $apeEst=$info["apellido"];
     $fnacEst=$info["fnac"];

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
            <li class="active">
                <a href="estudiante.php">
                  <i class="pe-7s-user"></i>
                  <p>Estudiantes</p>
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
            <a href="../../index.php" class="simple-text">
                DyFOMOAC<br>
                Servicio Social
            </a>
        </div>

        <ul class="nav">
          <li>
            <a href="../../index.php">
              <i class="pe-7s-hourglass"></i>
              <p>Registrar horas</p>
            </a>
          </li>
          <li class="active">
            <a href="verProgreso.php">
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
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">

                          <?php
                           if($registrado==1){
                          ?>

                          <div class="header">
                            <?php if(!empty($ubiFotoEst)) {
                            ?>
                              <img src = <?php echo $ubiFotoEst ?> align="left" width=80 height=80>
                              <br>
                            <?php
                            } ?>

                            <h4 class="title">&#160;<?php echo $nomEst." ".$apeEst?> </h4>
                            <p class="category">&#160;Revisa tu historial de horas de servicio social realizadas. </p>
                          </div>
                          <hr>
                          <div class="content">

                            <!--VER HORAS-->

                            <?php
                            include("../../config.php");
                            $queryHoras="SELECT * FROM horas WHERE hor_correo='$correo'";
                            $resultHoras = $conexion->query($queryHoras);
                            $res = array();
                            while($tupla = mysqli_fetch_array($resultHoras, MYSQLI_ASSOC) ){
                              $res[] = $tupla;
                            }
                            $acum=0;
                            $num=0;
                            foreach ($res as $tupla){
                              $num = $tupla["cant"]/60;
                              $acum += number_format((float)$num, 2, '.', '');

                            }
                             ?>
                             <?php
                             if($acum==0){
                             ?>
                             <p>Tienes 0 horas realizadas de 480. ¡Comienza a hacer algunas! </p>
                             <?php
                             } else {
                             ?>
                             <p>Tienes <?php echo number_format((float)$acum, 2, '.', '') ?> horas realizadas de 480. ¡Continúa así! </p>
                             <?php
                             }
                             ?>
                              <div class="content table-responsive table-full-width">
                                  <table class="table table-hover table-striped">
                                    <thead>
                                      <th>Fecha</th>
                                      <th>Hora de inicio</th>
                                      <th>Hora de fin</th>
                                      <th>Horas realizadas</th>
                                      <th>Tiempo de registro</th>
                                      <th>Ubicación</th>
                                      <th>Actividad</th>
                                    </thead>

                                    <tbody>

                                      <?php
                                      include("../../config.php");
                                      $queryHoras="SELECT * FROM horas WHERE hor_correo='$correo'";
                                      $resultHoras = $conexion->query($queryHoras);
                                      $res = array();
                                      while($tupla = mysqli_fetch_array($resultHoras, MYSQLI_ASSOC) ){
                                        $res[] = $tupla;
                                      }

                                      foreach ($res as $tupla){
                                      ?>
                                      <tr>
                                      <form method="POST" id="editHor" enctype="multipart/form-data">

                                      <td><?php echo $tupla["fecha"]; ?></td>
                                      <td><?php echo $tupla["tiempo_inicio"]; ?></td>
                                      <td><?php echo $tupla["tiempo_fin"]; ?></td>
                                      <td>
                                        <?php
                                        $num = $tupla["cant"];
                                        if($num % 60 == 0){
                                          $num = $num/60;
                                          echo $num;
                                        } else {
                                          $num = $num/60;
                                          echo number_format((float)$num, 2, '.', '');
                                        }
                                        ?>
                                      </td>
                                      <td><?php echo $tupla["tiempo_registro"]; ?></td>
                                      <td>
                                        <?php
                                          if($tupla["ubicacion"]==0){
                                            echo "Fuera";
                                          } else {
                                            echo "Dentro";
                                          }

                                        ?>
                                      </td>
                                      <td><?php echo $tupla["actividad"]; ?></td>

                                      </form>

                                      <?php
                                      }
                                      ?>

                                      </tr>
                                    </tbody>
                                  </table>
                              </div>

                          </div>

                          <?php
                          } else {
                          ?>

                          <div class="header">
                            <h4 class="title"><?php echo $nomEst." ".$apeEst?> </h4>
                            <p class="category">Revisa tu historial de horas de servicio social realizadas. </p>
                          </div>
                          <hr>
                          <div class="content">
                            <p class="category">Por favor ve al apartado de "Editar mi información" en la esquina superior derecha y completa tu perfil antes de continuar.</p>
                          </div>
                          <?php
                          }
                          ?>

                    </div>
                </div>

            </div>

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
