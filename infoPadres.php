<!doctype html>

<?php
   include('session.php');
   include('config.php');
   date_default_timezone_set("America/Monterrey");

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
              <h5>Primero se muestra la información de los tutores y hasta el final se encuentra la información del menor.</h5>
              <?php
                 if($_GET["idMenor"]){
                   $idm=$_GET["idMenor"];

                   //Tengo el idmenor, comparo los dos dependientes y agarro los padres

                   //Tupla dependientes
                   $sqlD = "SELECT correo_tutor FROM dependientes WHERE id_menor='$idm'";
                   $resultD = $conexion->query($sqlD);
                   //tupla es el correo
                   while($tupla = mysqli_fetch_array($resultD, MYSQLI_ASSOC) ){
                     //echo $tupla['correo_tutor'];
                     $nomTemp=$tupla['correo_tutor'];
                     //Nombre Completo
                     $sqlName=mysqli_query($conexion,"SELECT nombre, apellido,fnac FROM usuarios WHERE correo='$nomTemp'");
                     $infoName = mysqli_fetch_array($sqlName,MYSQLI_ASSOC);
                     $fullname=$infoName["nombre"]." ".$infoName["apellido"];

                     //Informacion de cada padre
                     $sqlP = "SELECT * FROM tutor WHERE correo_tutor='$nomTemp'";
                     $resultP = $conexion->query($sqlP);
                     $resP = array();
                     while($tp = mysqli_fetch_array($resultP, MYSQLI_ASSOC) ){
                       $resP[] = $tp;
                       if($tp['activo']=='1'){
                       ?>

                       <div class="col-md-12">
                           <div class="card">

                               <div class="header">
                                   <h4 class="title">Información de: <?php echo $fullname?> </h4>
                               </div>
                               <hr>
                               <div class="content">
                                 <form method="post" id="parent">
                                   <input type="hidden" name="info" value="parent" />
                                   <input type="hidden" class="form-control" value="<?php echo $tp['correo_tutor'] ?>" name="corPost" disabled>
                                   <div class="row">
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Nombre</label>
                                           <input type="text" class="form-control" value="<?php echo $infoName['nombre'] ?>" name="nombrePost" disabled>
                                       </div>
                                     </div>
                                       <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Apellidos</label>
                                             <input type="text" class="form-control" value="<?php echo $infoName['apellido'] ?>" name="apellidosPost" disabled>
                                         </div>
                                       </div>
                                       <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Celular</label>
                                             <input type="number" class="form-control" value="<?php echo $tp['celular'] ?>" name="celular" disabled>
                                         </div>
                                       </div>
                                   </div>

                                 <div class="row">

                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Teléfono del trabajo</label>
                                           <input type="number" class="form-control" value="<?php echo $tp['telefono_trabajo'] ?>" name="telTrabajo" disabled>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Horario del trabajo</label>
                                           <input type="text" class="form-control" value="<?php echo $tp['horario_trabajo'] ?>" name="horTrabajo" disabled>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Teléfono de casa</label>
                                           <input type="number" class="form-control" value="<?php echo $tp['telefono_casa'] ?>" name="telCasa" disabled>
                                       </div>
                                     </div>
                                 </div>

                                </form>

                               </div>
                           </div>
                       </div>

                       <?php
                       }
                     }

                   }
                   //Info del menor
                   ?>

                   <div class="col-md-12">
                       <div class="card">

                           <div class="header">
                               <h4 class="title">Información del menor</h4>
                           </div>
                           <hr>
                           <div class="content">
                             <?php

                             $sqlM = "SELECT * FROM menor WHERE id='$idm'";
                             $resultM = $conexion->query($sqlM);
                             //tupla es el correo
                             while($tp = mysqli_fetch_array($resultM, MYSQLI_ASSOC) ){
                               ?>
                               <div class="row">
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Nombre</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['nombre'] ?>" disabled>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Apellidos</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['apellido'] ?>" disabled>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Fecha de nacimiento</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['fecha_nacimiento'] ?>" disabled>
                                     </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Comidas que le causan reacción</label>
                                           <input type="text" class="form-control" name="comidas" value="<?php echo @$tp["comidas_reaccion"]; ?>" disabled>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Alergias</label>
                                           <input type="text" class="form-control" name="alergias" value="<?php echo @$tp["alergico"]; ?>" disabled>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label>Al nacer ¿presentó problemas de salud?</label>
                                         <input type="text" class="form-control" name="problemasSalud" value="<?php echo @$tp["problemas_salud"]; ?>"disabled >
                                     </div>
                                 </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                         <label>¿Ha presentado algún problema de salud que ameritó ser internado?</label>
                                         <input type="text" class="form-control" name="internado" value="<?php echo @$tp["internado"]; ?>" disabled>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>¿Actualmente padece una enfermedad?</label>
                                           <input type="text" class="form-control" name="enfermedad" value="<?php echo @$tp["enfermedad_actual"]; ?>" disabled>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Enfermedad común #1</label>
                                         <input type="text" class="form-control" name="enf1" value="<?php echo @$tp["enf_comun_1"]; ?>" disabled>
                                     </div>
                                 </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                         <label>Enfermedad común #2</label>
                                         <input type="text" class="form-control" name="enf2" value="<?php echo @$tp["enf_comun_2"]; ?>" disabled>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Enfermedad común #3</label>
                                           <input type="text" class="form-control" name="enf3" value="<?php echo @$tp["enf_comun_3"]; ?>" disabled>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Enfermedad común #4</label>
                                           <input type="text" class="form-control" name="enf4" value="<?php echo @$tp["enf_comun_4"]; ?>" disabled >
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                 <div class="col-md-3">
                                     <div class="form-group">
                                         <label>¿Con qué regularidad se presentan estas enfermedades?</label>
                                         <input type="text" class="form-control" name="regularidad" value="<?php echo @$tp["regularidad"]; ?>" disabled>
                                     </div>
                                 </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                         <label>Servicio médico con el que cuenta el niño:</label>
                                         <input type="text" class="form-control" name="servicioMedico" value="<?php echo @$tp["servicio_medico"]; ?>"disabled >
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>En caso de enfermedad, canalizar al:</label>
                                           <input type="text" class="form-control" name="canalizar" value="<?php echo @$tp["canalizar_a"]; ?>" disabled>
                                       </div>
                                   </div>
                                   <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Tipo de sangre</label>
                                           <input type="text" class="form-control" name="tipoSangre" value="<?php echo @$tp["tipo_sangre"]; ?>" disabled>
                                       </div>
                                   </div>
                               </div>

                               <div class="row">
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label>¿A qué medicamentos es alérgico?</label>
                                         <input type="text" class="form-control" name="medicAlergia" value="<?php echo @$tp["alergico_med"]; ?>" disabled>
                                     </div>
                                 </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                         <label>Antes de ingresar, ¿en qué otras guarderías estuvo?</label>
                                         <input type="text" class="form-control" name="guarderiasPrev" value="<?php echo @$tp["guarderias_previas"]; ?>" disabled>
                                       </div>
                                   </div>
                                   <div class="col-md-4">
                                       <div class="form-group">
                                           <label>Cuando la mamá trabaja, ¿qué persona lo cuida?</label>
                                           <input type="text" class="form-control" name="tutorAusencia" value="<?php echo @$tp["tutor_ausencia"]; ?>" disabled>
                                       </div>
                                   </div>
                               </div>


                               <?php
                             }

                             ?>
                           </div>

                        </div>
                    </div>
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
