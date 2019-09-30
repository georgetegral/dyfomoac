<!doctype html>

<?php
   include('../../session.php');
   include("../../config.php");
   date_default_timezone_set("America/Monterrey");
   $sqlEst=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = '$correo' ");
   $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);
   $nomEst=$info["nombre"];
   $apeEst=$info["apellido"];
   $fnacEst=$info["fnac"];

?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
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
    //date_default_timezone_set("America/Monterrey");
    //echo $horAct;

    //Validar que la hora fin sea menor o igual que la hora actual
    $dif=$horFinT - $horIniT;

    $cant = round(abs($horFinT - $horIniT) / 60,2);
    if($ubiEst==0){
      //Horas dobles
      //$avisos["veriEstDob"] = "<br>¡Se agregaron horas dobles!";
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
        $avisos["veriEst"] = "Horas agregadas exitosamente.";
      } else {
        $avisos["errHorEst"] = "Error. Hubo un problema con la base de datos<br>";
      }
    }

  }

}
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
            <a href="../../index.php" class="simple-text">
                DyFOMOAC<br>
                Maestro
            </a>
        </div>

        <ul class="nav">

          <li>
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reportes</p>
              </a>
          </li>
          <li>
              <a href="llenarReportes.php">
                <i class="pe-7s-news-paper"></i>
                <p>Llenar Reportes</p>
              </a>
          </li>
          <li>
              <a href="gruposMaestro.php">
                <i class="pe-7s-users"></i>
                <p>Mis Grupos</p>
              </a>
          </li>
          <li class="active">
              <a href="verProgresoMaestro.php">
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

                          <div class="header">
                            <h4 class="title"><?php echo $nomEst." ".$apeEst?> </h4>
                            <p class="category">Registra tu trabajo del día de hoy. </p>
                          </div>
                          <hr>
                          <div class="content">

                            <!--Registrar horas-->

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

                          </div>

                    </div>
                </div>

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
  <script src="../js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="../js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="../js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="../js/bootstrap-notify.js"></script>

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="../js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
