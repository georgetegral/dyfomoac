<!doctype html>

<?php
   include('../../session.php');
   include("../../config.php");
   date_default_timezone_set("America/Monterrey");
   //Lista de maestras
   $sqlM="SELECT nombre,apellido,correo FROM usuarios WHERE tipo='2' AND nombre !='' AND apellido !=''";
   $resultM = $conexion->query($sqlM);
   $resM = array();
   while($tupla = mysqli_fetch_array($resultM, MYSQLI_ASSOC) ){
     $resM[] = $tupla;
   }

   //Tupla de correos de padres de Familia
   $sqlP = "SELECT t.correo_tutor, u.nombre AS pnombre, u.apellido AS papellido, m.id, m.nombre, m.apellido FROM usuarios AS u, tutor AS t, dependientes AS d, menor AS m WHERE
   t.correo_tutor=u.correo AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND m.activo='1' AND m.id_grupo!='0'";
   $resultP = $conexion->query($sqlP);
   $resP = array();
   while($tupla = mysqli_fetch_array($resultP, MYSQLI_ASSOC) ){
     $resP[] = $tupla;
   }

   $sqlpol="SELECT * FROM poliza";
   $resultpol = $conexion->query($sqlpol);
   $tppol = mysqli_fetch_array($resultpol,MYSQLI_ASSOC);
   $poliza = $tppol["poliza"];

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $info=$_POST["info"];
  $corMa=$_POST["maestra"];
  $dep=$_POST["padre"];
  $tp=explode("/",$dep);
  $corPa=$tp[0];
  $idMen=$tp[1];
  $fecha = date("Y-m-d");
  $fechaS = "$fecha";

  if($info=="ini"){
    $he=$_POST["horaEntrada"];
    $en=$_POST["enfermo"];
    $me=$_POST["medicamento"];
    $si=$_POST["sintomas"];
    $li=$_POST["limpio"];
    $mo=$_POST["mochila"];
    $es=$_POST["estado"];
    $le=$_POST["lesion"];
    $ge=$_POST["generales"];
    $sql="INSERT INTO formatoingreso (fecha,correo_tutor,correo_maestro,id_menor,hora_entrada,enfermo,medicamento,sintomas,limpio,mochila,estado,lesion,observacion)
      VALUES ('$fechaS','$corPa','$corMa','$idMen','$he','$en','$me','$si','$li','$mo','$es','$le','$ge')";

    if (!mysqli_query($conexion,$sql)){
      $avisos["errIni"] = "Error description: " . mysqli_error($conexion);
      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
    } else {
      $avisos["veriIni"] = "Datos registrados exitosamente.<br>";
      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
    }
  }

  if($info=="sal"){
    $hs=$_POST["horaSalida"];
    $es=$_POST["estado"];
    $le=$_POST["lesion"];
    $li=$_POST["limpio"];
    $mo=$_POST["mochila"];
    $ge=$_POST["generales"];

    $sql="INSERT INTO formatosalida (fecha,correo_tutor,correo_maestro,id_menor,estado,estado_txt,hora_salida,limpio,pertenencias,observaciones)
      VALUES ('$fechaS','$corPa','$corMa','$idMen','$es','$le','$hs','$li','$mo','$ge')";

    if (!mysqli_query($conexion,$sql)){
      $avisos["errSal"] = "Error description: " . mysqli_error($conexion);
      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
    } else {
      $avisos["veriSal"] = "Datos registrados exitosamente.<br>";
      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
    }

  }

  if($info=="dur"){
    $des=$_POST["desayuno"];
    $com=$_POST["comida"];
    $cen=$_POST["cena"];
    $oba=$_POST["observ_alimento"];
    $dur=$_POST["durmio"];
    $cad=$_POST["cant_durmio"];
    $obd=$_POST["observ_durmio"];
    $ban=$_POST["bano"];
    $avi=$_POST["aviso"];
    $pip=$_POST["pipi"];
    $pop=$_POST["popo"];
    $obp=$_POST["observ_popo"];
    $ani=$_POST["animo"];
    $llo=$_POST["lloro"];
    $pel=$_POST["peleo"];
    $par=$_POST["participo"];
    $oban=$_POST["observ_animo"];
    $acc=$_POST["accidente"];
    $obac=$_POST["observ_accidente"];
    $foa=$poliza;
    $sal=$_POST["salud"];
    $obs=$_POST["observ_salud"];
    $ats=$_POST["atencion_salud"];
    $ger=$_POST["generales"];

    $sql="INSERT INTO formatodurante (correo_maestro,id_menor,fecha,desayuno,comida,cena,alimento_observ,descanso,siesta_tiempo,
    descanso_observ,bano,aviso,num_pipi,num_popo,excreto_observ, animo, lloro, peleo, participo, animo_observ, accidente, accidente_observ,
    accidente_folio,salud,salud_observ,atencion_observ,general_observ) VALUES ('$corMa','$idMen','$fechaS','$des','$com','$cen','$oba',
    '$dur','$cad','$obd','$ban','$avi','$pip','$pop','$obp','$ani','$llo','$pel','$par','$oban','$acc','$obac','$foa','$sal','$obs','$ats','$ger')";

      if (!mysqli_query($conexion,$sql)){
        $avisos["errDur"] = "Error description: " . mysqli_error($conexion);
        ?>
        <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <?php
      } else {
        $avisos["veriDur"] = "Datos registrados exitosamente.<br>";
        ?>
        <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <?php
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
          <li class="active">
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
        <li class="active">
            <a href="reportesLista.php">
              <i class="pe-7s-news-paper"></i>
              <p>Llenar Reportes</p>
            </a>
        </li>
        <li >
            <a href="gruposMaestro.php">
              <i class="pe-7s-users"></i>
              <p>Mis Grupos</p>
            </a>
        </li>
        <li>
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

              <div class="row">
                  <div class="col-md-12">
                      <div class="card">
                        <div class="header">
                          <h4 class="title">Llenar formato de ingreso</h4>
                        </div>
                        <hr>
                        <div class="content">
                          <form method="post">

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Maestra encargada</label>
                                      <select class="form-control" name="maestra" required>
                                        <option value="" disabled selected>Elige una maestra</option>
                                        <?php
                                          foreach ($resM as $tupla){
                                            if($corAct!=$tupla["correo"]){
                                            ?>
                                            <option value=<?php echo $tupla["correo"]; ?> > <?php echo $tupla["nombre"]." ".$tupla["apellido"]; ?></option>
                                            <?php
                                            }
                                          }
                                        ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Padre de familia</label>
                                        <select class="form-control" name="padre" required>
                                          <option value="" disabled selected>Elige un padre de familia</option>
                                          <?php
                                            foreach ($resP as $tp){
                                              ?>
                                              <option value=<?php echo $tp["correo_tutor"]."/".$tp["id"]; ?>><?php echo $tp["pnombre"]." ".$tp["papellido"]." - su hijo: ".$tp["nombre"]." ".$tp["apellido"]; ?></option>
                                              <?php
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Hora de entrada</label>
                                        <input type="time" class="form-control" name="horaEntrada" required>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>¿Llegó enfermo?</label>
                                        <select class="form-control" name="enfermo" required>
                                          <option value="" disabled selected>Elige una opción</option>
                                          <option value="0">No</option>
                                          <option value="1">Sí</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>¿Trae medicamento?</label>
                                      <select class="form-control" name="medicamento" required>
                                        <option value="" disabled selected>Elige una opción</option>
                                        <option value="2">No aplica</option>
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>¿Tiene sintomas?</label>
                                      <select class="form-control" name="sintomas" required>
                                        <option value="" disabled selected>Elige una opción</option>
                                        <option value="2">No aplica</option>
                                        <option value="0">No</option>
                                        <option value="1">Sí</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>¿Llegó limpio?</label>
                                      <select class="form-control" name="limpio" required>
                                        <option value="" disabled selected>Elige una opción</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>¿Trae su mochila completa?</label>
                                        <select class="form-control" name="mochila" required>
                                          <option value="" disabled selected>Elige una opción</option>
                                          <option value="1">Sí</option>
                                          <option value="0">No</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>¿Viene en buen estado físico?</label>
                                      <select class="form-control" name="estado" required>
                                        <option value="" disabled selected>Elige una opción</option>
                                        <option value="1">Sí</option>
                                        <option value="0">No</option>
                                      </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>¿Se entrega con algún tipo de lesión? (mensionar cuál y donde si aplica)</label>
                                      <input type="text" class="form-control" name="lesion">
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                      <label>Observaciones generales</label>
                                      <input type="text" class="form-control" name="generales">
                                    </div>
                                </div>
                            </div>

                             <input type="hidden" name="info" value="ini"/>
                             <button type="submit" class="btn btn-info btn-fill pull-right">Subir formato</button>
                             <font color="green"> <?php echo @$avisos["veriIni"]?></font>
                             <font color="red"> <?php echo @$avisos["errIni"]?></font>
                             <div class="clearfix"></div>
                          </form>
                        </div>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="card">
                    <div class="header">
                      <h4 class="title">Llenar formato del menor en la estancia infantil</h4>
                    </div>
                    <hr>
                    <div class="content">
                      <form method="post">

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>Maestra encargada</label>
                                  <select class="form-control" name="maestra" required>
                                    <option value="" disabled selected>Elige una maestra</option>
                                    <?php
                                      foreach ($resM as $tupla){
                                        if($corAct!=$tupla["correo"]){
                                        ?>
                                        <option value=<?php echo $tupla["correo"]; ?> > <?php echo $tupla["nombre"]." ".$tupla["apellido"]; ?></option>
                                        <?php
                                        }
                                      }
                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="form-group">
                                    <label>Padre de familia</label>
                                    <select class="form-control" name="padre" required>
                                      <option value="" disabled selected>Elige un padre de familia</option>
                                      <?php
                                        foreach ($resP as $tp){
                                          ?>
                                          <option value=<?php echo $tp["correo_tutor"]."/".$tp["id"]; ?>><?php echo $tp["pnombre"]." ".$tp["papellido"]." - su hijo: ".$tp["nombre"]." ".$tp["apellido"]; ?></option>
                                          <?php
                                        }
                                      ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>¿Desayunó?</label>
                                    <select class="form-control" name="desayuno" required>
                                      <option value="" disabled selected>Elige una opción</option>
                                      <option value="1">Sí</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>¿Comió?</label>
                                  <select class="form-control" name="comida" required>
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>¿Colación?</label>
                                  <select class="form-control" name="cena" required>
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Observaciones del alimento</label>
                                  <input type="text" class="form-control" name="observ_alimento">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>¿Durmió?</label>
                                    <select class="form-control" name="durmio" required>
                                      <option value="" disabled selected>Elige una opción</option>
                                      <option value="1">Sí</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>¿Cuanto tiempo durmió?</label>
                                  <input type="number" class="form-control" name="cant_durmio">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Observaciones del descanso</label>
                                  <input type="text" class="form-control" name="observ_durmio">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>¿Fue al baño?</label>
                                    <select class="form-control" name="bano" required>
                                      <option value="" disabled selected>Elige una opción</option>
                                      <option value="1">Sí</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>¿Avisó?</label>
                                  <select class="form-control" name="aviso" required>
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label># de veces que hizo pipí</label>
                                  <input type="number" class="form-control" name="pipi">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label># de veces que hizo popó</label>
                                  <input type="number" class="form-control" name="popo">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Observaciones de las funciones excretoras</label>
                                  <input type="text" class="form-control" name="observ_popo">
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>¿Cuál fue su ánimo?</label>
                                    <select class="form-control" name="animo" required>
                                      <option value="" disabled selected>Elige una opción</option>
                                      <option value="1">Feliz</option>
                                      <option value="2">Triste</option>
                                      <option value="3">Enojado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>¿Lloró?</label>
                                  <select class="form-control" name="lloro" required>
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>¿Peleó?</label>
                                  <select class="form-control" name="peleo" required>
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                  <label>¿Participó?</label>
                                  <select class="form-control" name="participo" required>
                                    <option value="" disabled selected>Elige una opción</option>
                                    <option value="1">Sí</option>
                                    <option value="0">No</option>
                                  </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Observaciones del estado de ánimo</label>
                                  <input type="text" class="form-control" name="observ_animo">
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>¿Tuvo algún accidente?</label>
                                    <select class="form-control" name="accidente" required>
                                      <option value="" disabled selected>Elige una opción</option>
                                      <option value="1">Sí</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>Descripción del accidente (si aplica)</label>
                                  <input type="text" class="form-control" name="observ_accidente">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                  <label>Folio del accidente (si aplica)</label>
                                  <input type="text" class="form-control" name="folio_accidente" value='<?php echo $poliza; ?>' disabled>
                                </div>
                            </div>
                        </div>
                        <hr>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>¿Presentó algún problema de salud?</label>
                                    <select class="form-control" name="salud" required>
                                      <option value="" disabled selected>Elige una opción</option>
                                      <option value="1">Sí</option>
                                      <option value="0">No</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                  <label>¿Cuál? (si aplica)</label>
                                  <input type="text" class="form-control" name="observ_salud">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                  <label>Atención proporcionada (si aplica)</label>
                                  <input type="text" class="form-control" name="atencion_salud">
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label>Observaciones generales</label>
                                  <input type="text" class="form-control" name="generales">
                                </div>
                            </div>
                        </div>

                         <input type="hidden" name="info" value="dur"/>
                         <button type="submit" class="btn btn-info btn-fill pull-right">Subir formato</button>
                         <font color="green"> <?php echo @$avisos["veriDur"]?></font>
                         <font color="red"> <?php echo @$avisos["errDur"]?></font>
                         <div class="clearfix"></div>
                      </form>
                    </div>
              </div>
          </div>



          <div class="col-md-12">
              <div class="card">
                <div class="header">
                  <h4 class="title">Llenar formato de salida</h4>
                </div>
                <hr>
                <div class="content">
                  <form method="post">

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>Maestra encargada</label>
                              <select class="form-control" name="maestra" required>
                                <option value="" disabled selected>Elige una maestra</option>
                                <?php
                                  foreach ($resM as $tupla){
                                    if($corAct!=$tupla["correo"]){
                                    ?>
                                    <option value=<?php echo $tupla["correo"]; ?> > <?php echo $tupla["nombre"]." ".$tupla["apellido"]; ?></option>
                                    <?php
                                    }
                                  }
                                ?>
                              </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Padre de familia</label>
                                <select class="form-control" name="padre" required>
                                  <option value="" disabled selected>Elige un padre de familia</option>
                                  <?php
                                    foreach ($resP as $tp){
                                      ?>
                                      <option value=<?php echo $tp["correo_tutor"]."/".$tp["id"]; ?>><?php echo $tp["pnombre"]." ".$tp["papellido"]." - su hijo: ".$tp["nombre"]." ".$tp["apellido"]; ?></option>
                                      <?php
                                    }
                                  ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Hora de salida</label>
                                <input type="time" class="form-control" name="horaSalida" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>¿Se entrega en buen estado físico?</label>
                                <select class="form-control" name="estado" required>
                                  <option value="" disabled selected>Elige una opción</option>
                                  <option value="1">Sí</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                              <label>En caso de ser entregado con alguna lesión, indicar donde</label>
                              <input type="text" class="form-control" name="lesion">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                              <label>¿Se entregó limpio?</label>
                              <select class="form-control" name="limpio" required>
                                <option value="" disabled selected>Elige una opción</option>
                                <option value="1">Sí</option>
                                <option value="0">No</option>
                              </select>
                            </div>
                        </div>

                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>¿Se entregó con mochila completa?</label>
                                <select class="form-control" name="mochila" required>
                                  <option value="" disabled selected>Elige una opción</option>
                                  <option value="1">Sí</option>
                                  <option value="0">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                              <label>Observaciones generales</label>
                              <input type="text" class="form-control" name="generales">
                            </div>
                        </div>
                    </div>

                     <input type="hidden" name="info" value="sal"/>
                     <button type="submit" class="btn btn-info btn-fill pull-right">Subir formato</button>
                     <font color="green"> <?php echo @$avisos["veriSal"]?></font>
                     <font color="red"> <?php echo @$avisos["errSal"]?></font>
                     <div class="clearfix"></div>
                  </form>
                </div>
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
