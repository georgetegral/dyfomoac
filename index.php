<!doctype html>

<?php
   include('session.php');
   date_default_timezone_set("America/Monterrey");
   function calc($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
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
            <li>
                <a href="/assets/pages/contrasenas.php">
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
            <a href="/assets/pages/verProgreso.php">
              <i class="pe-7s-news-paper"></i>
              <p>Ver tu progreso</p>
            </a>
          </li>

        </ul>

        <?php
          }
        ?>

        <?php
          //Validacion entrada y salida
          if($tipo=="5"){
        ?>

        <div class="logo">
            <a href="index.php" class="simple-text">
                DyFOMOAC<br>
                Validación
            </a>
        </div>

        <ul class="nav">
          <li class="active">
            <a href="index.php">
              <i class="pe-7s-users"></i>
              <p>Lista de formatos</p>
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

                                <?php
                                  if($tipo!="5"){
                                ?>

                                <li><a href="editInfo.php">Editar mi información</a></li>
                                <li class="divider"></li>

                                <?php
                                  }
                                ?>

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
              if($_SERVER["REQUEST_METHOD"] == "POST"){
                include("config.php");
                $validador=true;
                $form=$_POST["info"];

                if($form=="estudiante" || $form=="maestro"){

                  //ya tengo $ubiEst y $correo
                  $ubiEst=$_POST["bool"];
                  $presionado=$_POST["pres"];
                  $horIni=$_POST["horIniEst"];
                  $horFin=$_POST["horFinEst"];
                  $fecha = date("Y-m-d");
                  $fechaS = "$fecha";
                  $act=$_POST["actividadEst"];
                  $horAct=date("H:i");

                  $horIniT = strtotime($horIni);
                  $horFinT = strtotime($horFin);
                  $horActT = strtotime($horAct);

                  //Revisar en php.ini que la date.timezone = America/Monterrey
                  //echo $horAct;

                  //Validar que la hora fin sea menor o igual que la hora actual
                  $dif=$horFinT - $horIniT;

                  $cant = round(abs($horFinT - $horIniT) / 60,2);
                  if($ubiEst==0){
                    //Horas dobles
                    $cant=$cant*2;
                    $avisos["veriEstDob"] = "<br>¡Se agregaron horas dobles!";
                  }

                  if($presionado==0){
                    $validador=false;
                    $avisos["errHorEst"] = "Error. Por favor valida tu ubicación.<br><br>";
                  }

                  //Hora inicio tiene que ser menor que hora actual y hora final también
                  if($horIniT>$horActT || $horFinT>$horActT){
                    $validador=false;
                    $avisos["errHorEst"] = "Error. No puedes registrar horas en el futuro.<br><br>";
                  }

                  //Validar que la hora del fin sea menor que la hora de inicio
                  if($dif<=0){
                    $validador=false;
                    $avisos["errHorEst"] = "Error. Por favor ingresa horas válidas.<br><br>";
                  }

                  //Validar que no se registren horas que ya se registraron antes
                  if($validador){
                    $sqlHorPrev = "SELECT tiempo_inicio, tiempo_fin FROM horas WHERE fecha='$fechaS' AND hor_correo='$correo'";
                    $resHorPrev = $conexion->query($sqlHorPrev);

                    $res = array();

                    while($tupla = mysqli_fetch_array($resHorPrev, MYSQLI_ASSOC) ){
                      $res[] = $tupla;
                    }

                    //$horIniT, $horFinT
                    foreach ($res as $tupla){
                      $minAct = strtotime($tupla["tiempo_inicio"]);
                      $maxAct = strtotime($tupla["tiempo_fin"]);

                      if( ($horIniT < $maxAct) && ( $horFinT > $minAct) ){
                        $validador=false;
                        $avisos["errHorEst"] = "Error. Ya ingresaste horas dentro de este rango.<br><br>";
                      }

                    }
                  }

                  if($validador){
                    $sqlHorEst = "INSERT into horas (hor_correo,tiempo_inicio,tiempo_fin,cant,fecha,tiempo_registro,ubicacion,actividad)
                    VALUES ('$correo','$horIni','$horFin','$cant','$fechaS','$horAct','$ubiEst','$act')";
                    if ($conexion->query($sqlHorEst)){
                      ?>
                      <script>
                      alert("Horas agregadas correctamente.");
                      if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                      }
                      </script>
                      <?php
                    } else {
                      $avisos["errHorEst"] = "Error. Hubo un problema con la base de datos<br>";
                    }
                  }

                }

              }
               ?>

               <?php
                 if($tipo=="1"){
                   //Administrador
               ?>

               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Formatos de menores</h4>
                           <p class="category">Elige a un menor en específico para ver todos sus formatos.<br>Sólo aparecen los menores con un grupo asignado.</p>
                           </div>
                       <div class="content">

                         <div class="content table-responsive table-full-width">
                             <table class="table table-hover table-striped">
                               <thead>
                                 <th>Nombre</th>
                                 <th>Fecha de nacimiento</th>
                                 <th>Edad</th>
                                 <th>Grupo</th>
                                 <th>Tutor #1</th>
                                 <th>Tutor #2</th>
                                 <th>Ver formatos</th>
                               </thead>

                               <tbody>
                                 <tr>
                                 <?php
                                 include("config.php");
                                 $queryTable="SELECT m.id AS id, m.nombre AS mnombre, m.apellido AS mapellido, m.fecha_nacimiento AS mfnac, g.etapa AS grupo,
                                 u.nombre AS unombre, u.apellido AS uapellido FROM menor AS m, dependientes AS d, tutor AS t, usuarios AS u, grupo AS g
                                 WHERE u.correo=t.correo_tutor AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND m.activo='1' AND m.id_grupo=g.id ORDER BY mnombre";
                                 /*
                                 $check1_res = mysqli_query($conexion, $queryTable);
                                 if (!$check1_res) {
                                   printf("Error: %s\n", mysqli_error($conexion));
                                   exit();
                                 }
                                 */
                                 $resultTable = $conexion->query($queryTable);
                                 $res = array();
                                 while($tupla = mysqli_fetch_array($resultTable, MYSQLI_ASSOC) ){
                                   $res[] = $tupla;
                                 }

                                 $prev="";

                                 foreach ($res as $tupla){
                                 ?>

                                 <?php
                                 if($prev!=$tupla["mnombre"]){
                                 ?>
                                 <td><?php echo $tupla["mnombre"]." ".$tupla["mapellido"]; ?></td>
                                 <td><?php echo $tupla["mfnac"]; ?></td>
                                 <td><?php echo calc($tupla["mfnac"]).' años'; ?></td>
                                 <td><?php echo $tupla["grupo"]; ?></td>
                                 <td><?php echo $tupla["unombre"]." ".$tupla["uapellido"]; ?></td>
                                 <?php
                                 } else {
                                 ?>
                                 <td><?php echo $tupla["unombre"]." ".$tupla["uapellido"]; ?></td>

                                 <td>
                                   <form method="get" action ="verFormatos.php">
                                     <input type="hidden" name="info" value="table"/>
                                     <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                     <button type="submit" class="btn btn-info btn-fill pull-left">Ver formatos</button>
                                     <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                     <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                   </form>
                                 </td>

                                 </tr>
                                 <?php
                                 }
                                 ?>

                                 <?php
                                 $prev=$tupla["mnombre"];
                                 }
                                 ?>


                               </tbody>
                             </table>
                         </div>

                       </div>
                   </div>
               </div>

               <?php
                }
               ?>

               <?php
                 if($tipo=="2"){
                   // maestro
               ?>

               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Formatos de menores</h4>
                           <p class="category">Elige a un menor en específico de tus grupos para ver todos sus formatos.<br>También puedes ver la información de los padres de cada menor.</p>
                           </div>
                       <div class="content">

                         <div class="content table-responsive table-full-width">
                             <table class="table table-hover table-striped">
                               <thead>
                                 <th>Nombre</th>
                                 <th>Fecha de nacimiento</th>
                                 <th>Edad</th>
                                 <th>Grupo</th>
                                 <th>Tutor #1</th>
                                 <th>Tutor #2</th>
                                 <th>Ver formatos</th>
                                 <th>Ver información</th>
                                 <th>Evaluar Menor</th>
                               </thead>

                               <tbody>
                                 <tr>
                                 <?php
                                 include("config.php");
                                 $queryTable="SELECT m.id AS id, m.nombre AS mnombre, m.apellido AS mapellido, m.fecha_nacimiento AS mfnac, g.etapa AS grupo,
                                 u.nombre AS unombre, u.apellido AS uapellido FROM menor AS m, dependientes AS d, tutor AS t, usuarios AS u, grupo AS g
                                 WHERE u.correo=t.correo_tutor AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND m.activo='1' AND m.id_grupo=g.id AND g.correo_maestro='$correo' ORDER BY mnombre";

                                 $resultTable = $conexion->query($queryTable);
                                 $res = array();
                                 while($tupla = mysqli_fetch_array($resultTable, MYSQLI_ASSOC) ){
                                   $res[] = $tupla;
                                 }

                                 $prev="";

                                 foreach ($res as $tupla){
                                 ?>

                                 <?php
                                 if($prev!=$tupla["mnombre"]){
                                 ?>
                                 <td><?php echo $tupla["mnombre"]." ".$tupla["mapellido"]; ?></td>
                                 <td><?php echo $tupla["mfnac"]; ?></td>
                                 <td><?php echo calc($tupla["mfnac"]).' años'; ?></td>
                                 <td><?php echo $tupla["grupo"]; ?></td>
                                 <td><?php echo $tupla["unombre"]." ".$tupla["uapellido"]; ?></td>
                                 <?php
                                 } else {
                                 ?>
                                 <td><?php echo $tupla["unombre"]." ".$tupla["uapellido"]; ?></td>

                                 <td>
                                   <form method="get" action ="verFormatos.php">
                                     <input type="hidden" name="info" value="table"/>
                                     <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                     <button type="submit" class="btn btn-info btn-fill pull-left">Ver formatos</button>
                                     <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                     <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                   </form>
                                 </td>

                                 <td>
                                   <form method="get" action ="infoPadres.php">
                                     <input type="hidden" name="info" value="table"/>
                                     <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                     <button type="submit" class="btn btn-info btn-fill pull-left">Ver información</button>
                                   </form>
                                 </td>

                                 <td>
                                   <form method="get" action ="/assets/pages/evaluarMenor.php">
                                     <input type="hidden" name="info" value="table"/>
                                     <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                     <button type="submit" class="btn btn-info btn-fill pull-left">Evaluar Menor</button>
                                   </form>
                                 </td>

                                 </tr>
                                 <?php
                                 }
                                 ?>

                                 <?php
                                 $prev=$tupla["mnombre"];
                                 }
                                 ?>


                               </tbody>
                             </table>
                         </div>

                       </div>
                   </div>
               </div>

               <?php
                }
               ?>

               <?php
                 if($tipo=="3"){
                   //Padre
                   include("config.php");

                   $sqlPap=mysqli_query($conexion,"SELECT * FROM tutor WHERE correo_tutor = '$correo' ");
                   $info = mysqli_fetch_array($sqlPap,MYSQLI_ASSOC);

                   $registrado = 1;

                   if(empty($info["ocupacion"])){
                     $registrado = 0;
                   }
               ?>

               <div class="col-md-12">
                   <div class="card">
                       <div class="header">
                           <h4 class="title">Formatos de menores</h4>
                           <p class="category">Elige a uno de tus hijos para ver sus formatos.<br> Si no ves a tu hijo en este apartado debes de llenar su información en "Administrar hijos" para activarlo.</p>
                      </div>
                      <hr>
                           <?php
                             if($registrado==1){
                           ?>

                       <div class="content">
                         <div class="content table-responsive table-full-width">
                             <table class="table table-hover table-striped">
                               <thead>
                                 <th>Nombre</th>
                                 <th>Fecha de nacimiento</th>
                                 <th>Edad</th>
                                 <th>Ver formatos</th>
                               </thead>

                               <tbody>
                                 <tr>
                                 <?php
                                 include("config.php");

                                 $queryTable="SELECT m.id AS id, m.nombre AS mnombre, m.apellido AS mapellido, m.fecha_nacimiento AS mfnac,
                                 u.nombre AS unombre, u.apellido AS uapellido FROM menor AS m, dependientes AS d, tutor AS t, usuarios AS u
                                 WHERE u.correo=t.correo_tutor AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND d.correo_tutor='$correo' AND m.activo='1'";
                                 /*
                                 $check1_res = mysqli_query($conexion, $queryTable);
                                 if (!$check1_res) {
                                   printf("Error: %s\n", mysqli_error($conexion));
                                   exit();
                                 }
                                 */
                                 $resultTable = $conexion->query($queryTable);
                                 $res = array();
                                 while($tupla = mysqli_fetch_array($resultTable, MYSQLI_ASSOC) ){
                                   $res[] = $tupla;
                                 }

                                 $prev="";

                                 foreach ($res as $tupla){
                                 ?>

                                 <?php
                                 if($prev!=$tupla["mnombre"]){
                                 ?>
                                 <td><?php echo $tupla["mnombre"]." ".$tupla["mapellido"]; ?></td>
                                 <td><?php echo $tupla["mfnac"]; ?></td>
                                 <td><?php echo calc($tupla["mfnac"]).' años'; ?></td>

                                 <td>
                                   <form method="get" action ="verFormatos.php">
                                     <input type="hidden" name="info" value="table"/>
                                     <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                     <button type="submit" class="btn btn-info btn-fill pull-left">Ver formatos</button>
                                     <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                     <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                   </form>
                                 </td>

                                 </tr>
                                 <?php
                                 }
                                 ?>

                                 <?php
                                 $prev=$tupla["mnombre"];
                                 }
                                 ?>


                               </tbody>
                             </table>
                         </div>

                       </div>

                       <?php
                       } else {
                       ?>

                       <div class="content">
                         <p class="category">Por favor ve al apartado de "Editar mi información" en la esquina superior derecha y completa tu perfil antes de continuar.</p>
                       </div>

                       <?php
                       }
                       ?>

                   </div>
               </div>

               <?php
                }
               ?>

              <?php
                if($tipo=="4"){
                  //Estudiante
                  include("config.php");

                  $sqlEst=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE est_correo = '$correo' ");
                  $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);

                  $registrado = 1;

                  if(empty($info["matricula"])){
                    $registrado = 0;
                  }
              ?>
                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Registra tus horas</h4>
                              <p class="category">Registra tus horas realizadas de servicio social del día de hoy.<br>
                              Recuerda que las horas realizadas fuera de la institución se cuentan dobles, pero debes de registrar qué actividad realizaste.<br>
                              Si no puedes comprobar tu ubicación las horas se considerarán normales.</p>
                          </div>
                          <hr>
                          <?php
                            if($registrado==1){
                          ?>

                          <div class="content">

                            <form method="POST" id="estudiante">

                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Hora de inicio</label>
                                          <input type="time" class="form-control" name="horIniEst"  required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Hora de término</label>
                                          <input type="time" class="form-control" name="horFinEst" required>
                                      </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Ubicación</label>
                                          <br>
                                          <button onclick="getLocation()" type="button" class="btn btn-info btn-fill pull-left">Revisar ubicación</button>
                                          <br><br>
                                          <p id="locText"></p>

                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Actividad</label>
                                          <input type="text" class="form-control" name="actividadEst" placeholder="Ej. Cuidé niños, hice un folleto, etc..." required>
                                      </div>
                                  </div>

                                  <input type="hidden" name="info" value="estudiante"/>
                                  <input type="hidden" name="bool" id="boolForm" value="" />
                                  <input type="hidden" name="pres" id="presForm" value=""/>
                              </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Registrar horas</button>
                                <font color="green"> <?php echo @$avisos["veriEst"]?></font>
                                <font color="green"> <?php echo @$avisos["veriEstDob"]?></font>
                                <font color="red"> <?php echo @$avisos["errHorEst"]?></font>
                                <div class="clearfix"></div>
                            </form>

                          </div>

                          <?php
                          } else {
                          ?>

                          <div class="content">
                            <p class="category">Por favor ve al apartado de "Editar mi información" en la esquina superior derecha y completa tu perfil antes de continuar.</p>
                          </div>

                          <?php
                          }
                          ?>

                      </div>
                  </div>

              <?php
                }
              ?>

              <?php
                if($tipo=="5"){
                  // Validar
              ?>

              <div class="col-md-12">
                  <div class="card">

                      <div class="header">
                          <h4 class="title">Lista de menores</h4>
                          <p class="category">Elige a un menor para hacer su reporte del día. </p>
                      </div>
                      <hr>
                      <div class="content">

                          <div class="content table-responsive table-full-width">
                              <table class="table table-hover table-striped">
                                  <thead>
                                    <th>Nombre</th>
                                    <th>Grupo</th>
                                    <th>Tutor #1</th>
                                    <th>Tutor #2</th>
                                    <th>Verificar Reporte Ingreso</th>
                                    <th>Llenar Reporte Durante</th>
                                    <th>Llenar Reporte Salida</th>
                                  </thead>

                                  <tbody>
                                    <tr>
                                    <?php

                                    $queryTable="SELECT m.id AS id, m.nombre AS mnombre, m.apellido AS mapellido, m.fecha_nacimiento AS mfnac, g.etapa AS grupo,
                                    u.nombre AS unombre, u.apellido AS uapellido FROM menor AS m, dependientes AS d, tutor AS t, usuarios AS u, grupo AS g
                                    WHERE u.correo=t.correo_tutor AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND m.activo='1' AND m.id_grupo=g.id ORDER BY mnombre";

                                    $resultTable = $conexion->query($queryTable);
                                    $res = array();
                                    while($tupla = mysqli_fetch_array($resultTable, MYSQLI_ASSOC) ){
                                      $res[] = $tupla;
                                    }

                                    $prev="";

                                    foreach ($res as $tupla){
                                    ?>

                                    <?php
                                    if($prev!=$tupla["mnombre"]){
                                    ?>
                                    <td><?php echo $tupla["mnombre"]." ".$tupla["mapellido"]; ?></td>
                                    <td><?php echo $tupla["grupo"]; ?></td>
                                    <td><?php echo $tupla["unombre"]." ".$tupla["uapellido"]; ?></td>
                                    <?php
                                    } else {
                                    ?>
                                    <td><?php echo $tupla["unombre"]." ".$tupla["uapellido"]; ?></td>

                                    <td>

                                      <?php
                                      $idBtn=$tupla["id"];
                                      $fechaComp = date("Y-m-d");
                                      $fechaCompS = "$fechaComp";
                                      $cbtn = mysqli_query ($conexion,"SELECT verificado FROM formatoingreso WHERE id_menor='$idBtn' AND fecha='$fechaCompS' ORDER BY id DESC LIMIT 1");
                                      $resv = mysqli_fetch_array($cbtn,MYSQLI_ASSOC);
                                      $verificado=$resv["verificado"];
                                      //1 - pendiente 2 - aceptado 3 - rechazado

                                      if($verificado=="1"){
                                       ?>
                                       <form method="get" action ="llenarReportesGral.php">
                                         <input type="hidden" name="info" value="ingreso"/>
                                         <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                         <button type="submit" class="btn btn-info btn-fill pull-left">Verificar</button>
                                         <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                         <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                       </form>
                                      <?php
                                    } else if(empty($verificado)||$verificado=="3"){
                                      ?>
                                      <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Pendiente</button>
                                      <?php
                                    } else if($verificado=="2"){
                                       ?>
                                       <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Aceptado</button>
                                      <?php
                                    }
                                      ?>

                                    </td>

                                    <td>

                                      <?php
                                      $idBtn=$tupla["id"];
                                      $fechaComp = date("Y-m-d");
                                      $fechaCompS = "$fechaComp";
                                      $cbtn = mysqli_query ($conexion,"SELECT * FROM formatodurante WHERE id_menor='$idBtn' AND fecha='$fechaCompS'")
                                      or die ("Error en la consulta:".mysql_error());
                                      $tp2 = mysqli_fetch_array ($cbtn);

                                      if(empty($tp2)){
                                       ?>
                                       <form method="get" action ="llenarReportesGral.php">
                                         <input type="hidden" name="info" value="durante"/>
                                         <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                         <button type="submit" class="btn btn-info btn-fill pull-left">Llenar</button>
                                         <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                         <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                       </form>
                                      <?php
                                    } else {
                                      ?>
                                      <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Listo</button>
                                      <?php
                                    }
                                       ?>

                                    </td>

                                    <td>

                                      <?php
                                      $idBtn=$tupla["id"];
                                      $fechaComp = date("Y-m-d");
                                      $fechaCompS = "$fechaComp";
                                      $cbtn = mysqli_query ($conexion,"SELECT verificado FROM formatosalida WHERE id_menor='$idBtn' AND fecha='$fechaCompS' ORDER BY id DESC LIMIT 1");
                                      $resv = mysqli_fetch_array($cbtn,MYSQLI_ASSOC);
                                      $verificado=$resv["verificado"];
                                      //1 - pendiente 2 - aceptado 3 - rechazado

                                      if(empty($verificado)||$verificado=="3"){
                                       ?>
                                       <form method="get" action ="llenarReportesGral.php">
                                         <input type="hidden" name="info" value="salida"/>
                                         <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                         <button type="submit" class="btn btn-info btn-fill pull-left">Llenar</button>
                                         <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                         <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                       </form>
                                      <?php
                                    } else if($verificado=="1"){
                                      ?>
                                      <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Pendiente</button>
                                      <?php
                                    } else if($verificado=="2"){
                                       ?>
                                       <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Aceptado</button>
                                      <?php
                                    }
                                      ?>

                                    </td>

                                    </tr>
                                    <?php
                                    }
                                    ?>

                                    <?php
                                    $prev=$tupla["mnombre"];
                                    }
                                    ?>


                                  </tbody>
                              </table>
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
</div>

<script>
var x = document.getElementById("locText");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(checkPosition);
  } else {
    x.innerHTML = "No se pudo comprobar tu ubicación. Intenta de nuevo o con otro navegador.";
    document.getElementById("boolForm").value = 0;
    document.getElementById("presForm").value = 1;
  }
}

//Ver si el usuario está dentro de DyFOMOAC
function checkPosition(position) {
var latitude = position.coords.latitude;
var longitude= position.coords.longitude;
  //DyFOMOAC
  if(latitude <= 25.66601 && latitude >= 25.66505 && longitude >= -100.40611 && longitude <= -100.40516){
    x.innerHTML = "¡Estás dentro del DyFOMOAC!";
    document.getElementById("boolForm").value = 1;
    document.getElementById("presForm").value = 1;
  } else {
    x.innerHTML = "¡No estás dentro del DyFOMOAC!";
    document.getElementById("boolForm").value = 0;
    document.getElementById("presForm").value = 1;
  }

}
</script>

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
