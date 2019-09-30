<!doctype html>

<?php
   include('../../session.php');
   include("../../config.php");
   date_default_timezone_set("America/Monterrey");
   $id=$_GET["idMenor"];
   $tipoF=$_GET["info"];
   //ingreso o salida

   $sqlID="SELECT nombre,apellido FROM menor WHERE id='$id'";
   $resultID = $conexion->query($sqlID);
   $infoID = mysqli_fetch_array($resultID,MYSQLI_ASSOC);

   $nomID=$infoID["nombre"];
   $apeID=$infoID["apellido"];

   //Lista de maestras
   $sqlM="SELECT nombre,apellido,correo FROM usuarios WHERE tipo='2' AND nombre !='' AND apellido !=''";
   $resultM = $conexion->query($sqlM);
   $resM = array();
   while($tupla = mysqli_fetch_array($resultM, MYSQLI_ASSOC) ){
     $resM[] = $tupla;
   }

   //Tupla de correos de padres de Familia
   $sqlP = "SELECT t.correo_tutor, u.nombre AS pnombre, u.apellido AS papellido, m.id, m.nombre, m.apellido FROM usuarios AS u, tutor AS t, dependientes AS d, menor AS m WHERE
   t.correo_tutor=u.correo AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND m.activo='1' AND t.correo_tutor='$correo'";
   $resultP = $conexion->query($sqlP);
   $resP = array();
   while($tupla = mysqli_fetch_array($resultP, MYSQLI_ASSOC) ){
     $resP[] = $tupla;
   }

   if($tipoF=="salida"){
     $sql="SELECT * FROM formatosalida WHERE id_menor='$id' AND verificado='1'";
     $result = $conexion->query($sql);
     $tp = mysqli_fetch_array($result,MYSQLI_ASSOC);

     $idrep=$tp["id"];
     $fec=$tp["fecha"];
     $cot=$tp["correo_tutor"];
     $com=$tp["correo_maestro"];
     $est=$tp["estado"];
     $ett=$tp["estado_txt"];
     $hos=$tp["hora_salida"];
     $lim=$tp["limpio"];
     $per=$tp["pertenencias"];
     $obs=$tp["observaciones"];

     $sql="SELECT nombre,apellido FROM usuarios WHERE correo='$cot'";
     $result = $conexion->query($sql);
     $tp = mysqli_fetch_array($result,MYSQLI_ASSOC);
     $nomTut = $tp["nombre"].' '.$tp["apellido"];

   }

?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $info=$_POST["info"];
  $fecha = date("Y-m-d");
  $fechaS = "$fecha";

  $sqlM="SELECT id_grupo FROM menor WHERE id='$id'";
  $rm = $conexion->query($sqlM);
  $tpm = mysqli_fetch_array($rm,MYSQLI_ASSOC);
  $idg=$tpm['id_grupo'];
  $sqlM2="SELECT etapa,correo_maestro FROM grupo WHERE id='$idg'";
  $rm2 = $conexion->query($sqlM2);
  $tpm2 = mysqli_fetch_array($rm2,MYSQLI_ASSOC);
  $grupo=$tpm2['etapa'];
  $corMa=$tpm2['correo_maestro'];

  if($info=="ini"){
    $corPa=$correo;
    $idMen=$id;

    $he=$_POST["horaEntrada"];
    $en=$_POST["enfermo"];
    $me=$_POST["medicamento"];
    $si=$_POST["sintomas"];
    $li=$_POST["limpio"];
    $mo=$_POST["mochila"];
    $es=$_POST["estado"];
    $le=$_POST["lesion"];
    $ge=$_POST["generales"];
    $sql="INSERT INTO formatoingreso (fecha,correo_tutor,correo_maestro,id_menor,hora_entrada,enfermo,medicamento,sintomas,limpio,mochila,estado,lesion,observacion,verificado)
      VALUES ('$fechaS','$corPa','$corMa','$idMen','$he','$en','$me','$si','$li','$mo','$es','$le','$ge','1')";

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
      header('Location: reportesListaPadre.php');
      exit;
    }
  }

  if($info=="aceptado"){
    $idReporte=$_POST["idreporte"];
    $sqlRep="UPDATE formatosalida SET verificado='2',correo_tutor='$correo' WHERE id='$idReporte'";
    if ($conexion->query($sqlRep)) {
      header('Location: reportesListaPadre.php');
      exit;
    }
  }

  if($info=="rechazado"){
    $idReporte=$_POST["idreporte"];
    $sqlRep="UPDATE formatosalida SET verificado='3',correo_tutor='$correo' WHERE id='$idReporte'";
    if ($conexion->query($sqlRep)) {
      header('Location: reportesListaPadre.php');
      exit;
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
            <a href="llenarReportes.php">
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
          <li>
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reportes</p>
              </a>
          </li>
          <li class="active">
              <a href="reportesListaPadre.php">
                <i class="pe-7s-news-paper"></i>
                <p>Editar reportes</p>
              </a>
          </li>
          <li>
              <a href="administrarHijos.php">
                <i class="pe-7s-user"></i>
                <p>Administrar hijos</p>
              </a>
          </li>
          <li>
              <a href="ejercicios.php">
                <i class="pe-7s-file"></i>
                <p>Ejercicios</p>
              </a>
          </li>
          <li>
              <a href="reglamento.php">
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
              if($tipoF=="ingreso"){
                ?>
                <div class="col-md-12">
                    <div class="card">
                      <div class="header">
                        <h4 class="title">Llenar formato de entrada de: <?php echo $nomID.' '.$apeID;?></h4>
                      </div>
                      <hr>
                      <div class="content">

                          <form method="post">

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Padre de familia</label>
                                        <select class="form-control" name="padre" required disabled>
                                          <?php
                                            foreach ($resP as $tp){
                                              ?>
                                              <option value=<?php echo $tp["correo_tutor"] ?> selected><?php echo $tp["pnombre"]." ".$tp["papellido"];?></option>
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
                <?php
              } else if($tipoF=="durante"){
                ?>

                <?php
              } else if($tipoF=="salida"){
                ?>
                <div class="col-md-12">
                    <div class="card">
                      <div class="header">
                        <h4 class="title">Verificar formato de salida de: <?php echo $nomID.' '.$apeID;?></h4>
                      </div>
                      <hr>
                      <div class="content">

                        <?php
                        //Grupo del niño
                        $sqlM="SELECT id_grupo FROM menor WHERE id='$id'";
                        $rm = $conexion->query($sqlM);
                        $tpm = mysqli_fetch_array($rm,MYSQLI_ASSOC);
                        $idg=$tpm['id_grupo'];
                        $sqlM2="SELECT etapa FROM grupo WHERE id='$idg'";
                        $rm2 = $conexion->query($sqlM2);
                        $tpm2 = mysqli_fetch_array($rm2,MYSQLI_ASSOC);
                        $grupo=$tpm2['etapa'];
                        ?>

                        <div class="row">
                          <div class="col-md-3">
                              <div class="form-group">
                                <label>Grupo</label>
                                <input type="text" class="form-control" value="<?php echo $grupo; ?>" disabled>
                              </div>
                          </div>
                          <div class="col-md-6">
                              <div class="form-group">
                                  <label>Padre de familia</label>
                                  <select class="form-control" name="padreignorar" required disabled>
                                    <?php
                                      foreach ($resP as $tp){
                                        ?>
                                        <option value=<?php echo $tp["correo_tutor"] ?> selected><?php echo $tp["pnombre"]." ".$tp["papellido"];?></option>
                                        <?php
                                      }
                                    ?>
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-3">
                              <div class="form-group">
                                  <label>Hora de salida</label>
                                  <input type="text" class="form-control" value="<?php echo $hos; ?>" disabled>
                              </div>
                          </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>¿Se entrega en buen estado físico?</label>
                                    <input type="text" class="form-control" value="<?php if($est=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                  <label>En caso de ser entregado con alguna lesión, indicar donde</label>
                                  <input type="text" class="form-control" value="<?php echo $ett; ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                  <label>¿Se entregó limpio?</label>
                                  <input type="text" class="form-control" value="<?php if($lim=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>¿Se entregó con mochila completa?</label>
                                    <input type="text" class="form-control" value="<?php if($per=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                  <label>Observaciones generales</label>
                                  <input type="text" class="form-control" value="<?php echo $obs; ?>" disabled>
                                </div>
                            </div>
                        </div>

                        <hr>
                        <div class="row">
                            <div class="col-md-6">
                              <form method="post">
                                <input type="hidden" name="info" value="rechazado"/>
                                <input type="hidden" name="idreporte" value="<?php echo $idrep; ?>" />
                                <button type="submit" class="btn btn-info btn-fill pull-left">Rechazar</button>
                              </form>
                            </div>
                            <div class="col-md-6">
                              <form method="post">
                                <input type="hidden" name="info" value="aceptado"/>
                                <input type="hidden" name="idreporte" value="<?php echo $idrep; ?>" />
                                <button type="submit" class="btn btn-info btn-fill pull-right">Aceptar</button>
                              </form>
                            </div>
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
