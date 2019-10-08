<!doctype html>

<?php
date_default_timezone_set("America/Monterrey");
include('../../session.php');

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $info=$_POST["info"];

  //Archivos
  if($info=="acta" || $info=="vacunacion" || $info=="salud" || $info=="curp" || $info=="fotoMenor" || $info=="ineMama" || $info=="inePapa" || $info=="inep1" || $info=="inep2"){
    $id=$_POST["id"];
    $archivo=$_FILES["doc"];
    $validador=true;

        if(is_uploaded_file($archivo["tmp_name"])){
          $directorio = "../documents/";
          //El nombre de la imagen es el tipo de archivo + id
          $extension=pathinfo($_FILES["doc"]["name"],PATHINFO_EXTENSION);
          $newFile=$info."_menor_".$id;
          $valFoto=1;

          if ($_FILES["doc"]["size"] > 5000000) {
            $avisos["err".$info] = "Archivo es demasiado grande, el tamaño límite es 5MB.<br><br>";
            $valFoto = 0;
            $validador=false;
          }

          if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" && $extension != "pdf") {
            $avisos["err".$info] = "El archivo no se pudo subir, asegúrate que el archivo tenga extensión .jpg, .png, .jpeg, .gif y .pdf.<br><br>";
            $valFoto = 0;
            $validador=false;
          }

          if($valFoto==1){
            if(move_uploaded_file($archivo["tmp_name"],$directorio.$newFile.".".$extension)){
              $avisos["veri".$info] = "El archivo fue subido con éxito.<br><br>";
            } else {
              $avisos["err".$info] = "El archivo no fue subido.<br><br>";
              $validador=false;
            }
          }

        }
  }

  if($info=="menor"){
    $idm=$_POST["idmen"];
    $fna=$_POST["fnac"];
    $com=$_POST["comidas"];
    $ale=$_POST["alergias"];
    $prs=$_POST["problemasSalud"];
    $int=$_POST["internado"];
    $enf=$_POST["enfermedad"];
    $en1=$_POST["enf1"];
    $en2=$_POST["enf2"];
    $en3=$_POST["enf3"];
    $en4=$_POST["enf4"];
    $erg=$_POST["regularidad"];
    $sev=$_POST["servicioMedico"];
    $can=$_POST["canalizar"];
    $tis=$_POST["tipoSangre"];
    $mea=$_POST["medicAlergia"];
    $gup=$_POST["guarderiasPrev"];
    $tua=$_POST["tutorAusencia"];

    $sqlM="UPDATE menor SET fecha_nacimiento='$fna',comidas_reaccion='$com',alergico='$ale',problemas_salud='$prs',internado='$int',
    enfermedad_actual='$enf',enf_comun_1='$en1',enf_comun_2='$en2',enf_comun_3='$en3',enf_comun_4='$en4',regularidad='$erg',
    servicio_medico='$sev',canalizar_a='$can',tipo_sangre='$tis',alergico_med='$mea',guarderias_previas='$gup',tutor_ausencia='$tua',
    activo='1' WHERE id='$idm'";

    if ($conexion->query($sqlM)) {

      $horE=$_POST["horaEntrada"];
      $horS=$_POST["horaSalida"];

      //Checar si ya existe el registro, si si update, sino insert

      $consulta = mysqli_query ($conexion,"SELECT * FROM registro WHERE id_menor='$idm'")
      or die ("Error en la consulta:".mysql_error());
      $check = mysqli_fetch_array ($consulta);

      $fechaS=$_POST["fentrada"];

      if(empty($check)){
        //no hay registro
        $sqlNew="INSERT INTO registro (id_menor,correo_suscritor,fecha,hora_entrada,hora_salida) VALUES ('$idm','$correo','$fechaS','$horE','$horS')";
        if ($conexion->query($sqlNew)){

        } else {
          $avisos["err"] = "Error. Contacte al administrador.";
        }
      } else {
        //ya hay registro
        $sqlUp="UPDATE registro SET hora_entrada='$horE', hora_salida='$horS', fecha='$fechaS' WHERE id_menor='$idm'";
        if ($conexion->query($sqlUp)){

        } else {
          $avisos["err"] = "Error. Contacte al administrador.";
        }
      }


      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
      $avisos["veri"] = "Información actualizada exitosamente.";
    } else {
      $avisos["err"] = "Error. Contacte al administrador.";
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
            <li>
                <a href="estudiante.php">
                  <i class="pe-7s-user"></i>
                  <p>Estudiantes</p>
                </a>
            </li>
            <li class="active">
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
            <a href="index.php" class="simple-text">
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
            <a href="../../index.php" class="simple-text">
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
          <li>
              <a href="reportesListaPadre.php">
                <i class="pe-7s-news-paper"></i>
                <p>Editar reportes</p>
              </a>
          </li>
          <li class="active">
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
              $queryC="SELECT m.nombre AS mnom, m.apellido AS mape, m.id AS id, m.fecha_nacimiento AS fnac, comidas_reaccion,
              alergico,problemas_salud,internado,enfermedad_actual,enf_comun_1,enf_comun_2,enf_comun_3,enf_comun_4,regularidad,
              servicio_medico,canalizar_a,tipo_sangre,alergico_med,guarderias_previas,tutor_ausencia
               FROM menor AS m, dependientes AS d WHERE d.correo_tutor='$correo' AND d.id_menor=m.id";
              $resultC = $conexion->query($queryC);
              $rc = array();
              while($tp = mysqli_fetch_array($resultC, MYSQLI_ASSOC) ){
                $rc[] = $tp;
              }

              $idreg;
              foreach ($rc as $tp){
                $idreg=$tp["id"];
              }

              foreach ($rc as $tp){
                $idreg=$tp["id"];
                $sqlReg=mysqli_query($conexion,"SELECT hora_entrada,hora_salida,beca,colegiatura,fecha FROM registro WHERE id_menor='$idreg'");
                $reg = mysqli_fetch_array($sqlReg,MYSQLI_ASSOC);
                $horaE=$reg["hora_entrada"];
                $horaS=$reg["hora_salida"];
                $fechaEntrada=$reg["fecha"];
                $beca=$reg["beca"];
                $colegiatura=$reg["colegiatura"];
                if($colegiatura=="0"||$colegiatura==""){$colegiatura="Por determinar";}
                if($beca==""){$beca="Por determinar";}
              ?>

              <div class="row">

                <div class="col-md-12">
                    <div class="card">

                        <div class="header">
                            <h4 class="title"><?php echo $tp["mnom"].' '.$tp["mape"] ?></h4>
                            <p class="category">Llena la siguiente información de tu hijo </p>
                        </div>
                        <hr>

                        <?php
                        $sqlPap=mysqli_query($conexion,"SELECT * FROM tutor WHERE correo_tutor = '$correo' ");
                        $info = mysqli_fetch_array($sqlPap,MYSQLI_ASSOC);

                        $registrado = 1;

                        if(empty($info["ocupacion"])){
                          $registrado = 0;
                        }

                          if($registrado==1){

                        ?>

                        <div class="content">
                          <form method="post">
                            <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Fecha de nacimiento</label>
                                      <input type="date" class="form-control" name="fnac" value="<?php echo @$tp["fnac"]; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                      <label>Fecha de entrada a la institución</label>
                                      <input type="date" class="form-control" name="fentrada" value="<?php echo @$fechaEntrada; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Comidas que le causan reacción</label>
                                        <input type="text" class="form-control" name="comidas" value="<?php echo @$tp["comidas_reaccion"]; ?>">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Alergias</label>
                                        <input type="text" class="form-control" name="alergias" value="<?php echo @$tp["alergico"]; ?>" >
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Al nacer ¿presentó problemas de salud?</label>
                                      <input type="text" class="form-control" name="problemasSalud" value="<?php echo @$tp["problemas_salud"]; ?>" >
                                  </div>
                              </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>¿Ha presentado algún problema de salud que ameritó ser internado?</label>
                                      <input type="text" class="form-control" name="internado" value="<?php echo @$tp["internado"]; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>¿Actualmente padece una enfermedad?</label>
                                        <input type="text" class="form-control" name="enfermedad" value="<?php echo @$tp["enfermedad_actual"]; ?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Enfermedad común #1</label>
                                      <input type="text" class="form-control" name="enf1" value="<?php echo @$tp["enf_comun_1"]; ?>" >
                                  </div>
                              </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Enfermedad común #2</label>
                                      <input type="text" class="form-control" name="enf2" value="<?php echo @$tp["enf_comun_2"]; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Enfermedad común #3</label>
                                        <input type="text" class="form-control" name="enf3" value="<?php echo @$tp["enf_comun_3"]; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Enfermedad común #4</label>
                                        <input type="text" class="form-control" name="enf4" value="<?php echo @$tp["enf_comun_4"]; ?>" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>¿Con qué regularidad se presentan estas enfermedades?</label>
                                      <input type="text" class="form-control" name="regularidad" value="<?php echo @$tp["regularidad"]; ?>" >
                                  </div>
                              </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Servicio médico con el que cuenta el niño:</label>
                                      <input type="text" class="form-control" name="servicioMedico" value="<?php echo @$tp["servicio_medico"]; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>En caso de enfermedad, canalizar al:</label>
                                        <input type="text" class="form-control" name="canalizar" value="<?php echo @$tp["canalizar_a"]; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Tipo de sangre</label>
                                        <input type="text" class="form-control" name="tipoSangre" value="<?php echo @$tp["tipo_sangre"]; ?>" required>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>¿A qué medicamentos es alérgico?</label>
                                      <input type="text" class="form-control" name="medicAlergia" value="<?php echo @$tp["alergico_med"]; ?>" >
                                  </div>
                              </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                      <label>Antes de ingresar, ¿en qué otras guarderías estuvo?</label>
                                      <input type="text" class="form-control" name="guarderiasPrev" value="<?php echo @$tp["guarderias_previas"]; ?>" >
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Cuando la mamá trabaja, ¿qué persona lo cuida?</label>
                                        <input type="text" class="form-control" name="tutorAusencia" value="<?php echo @$tp["tutor_ausencia"]; ?>" >
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                              <div class="col-md-3">
                                  <div class="form-group">
                                      <label>Hora de entrada</label>
                                      <input type="time" class="form-control" name="horaEntrada" value="<?php echo @$horaE; ?>" required>
                                  </div>
                              </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                      <label>Hora de salida</label>
                                      <input type="time" class="form-control" name="horaSalida" value="<?php echo @$horaS; ?>" required>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Beca (determinada por la institución)</label>
                                        <input type="text" class="form-control" value="<?php echo @$beca; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Colegiatura (determinada por la institución)</label>
                                        <input type="text" class="form-control" value="<?php echo @$colegiatura; ?>" disabled>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="info" value="menor"/>
                            <input type="hidden" name="idmen" value=<?php echo @$tp["id"]; ?>/>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar información</button>
                            <font color="green"> <?php echo @$avisos["veri"]?></font>
                            <font color="red"> <?php echo @$avisos["err"]?></font>
                            <div class="clearfix"></div>

                          </form>

                          <hr>

                          <h4 class="title">Alta de documentos</h4>
                          <p class="category">Favor de subir los siguientes documentos de tu hijo. Favor de subir cada documento uno por uno.</p>

                          <br>
                          <br>

                          <div class="row">
                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Acta de nacimiento</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="acta"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir acta</button>
                                <font color="green"> <?php echo @$avisos["veriacta"]?></font>
                                <font color="red"> <?php echo @$avisos["erracta"]?></font>
                              </form>
                            </div>

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Cartilla de vacunación</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="vacunacion"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir cartilla</button>
                                <font color="green"> <?php echo @$avisos["verivacunacion"]?></font>
                                <font color="red"> <?php echo @$avisos["errvacunacion"]?></font>
                              </form>
                            </div>

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Carta de buena salud</label>
                                    <input type="file" name="doc" >
                                </div>
                                <input type="hidden" name="info" value="salud"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir carta</button>
                                <font color="green"> <?php echo @$avisos["verisalud"]?></font>
                                <font color="red"> <?php echo @$avisos["errsalud"]?></font>
                              </form>
                            </div>

                          </div>

                          <div class="row">

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>CURP</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="curp"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir CURP</button>
                                <font color="green"> <?php echo @$avisos["vericurp"]?></font>
                                <font color="red"> <?php echo @$avisos["errcurp"]?></font>
                              </form>
                            </div>

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Foto del menor</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="fotoMenor"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir foto</button>
                                <font color="green"> <?php echo @$avisos["verifotoMenor"]?></font>
                                <font color="red"> <?php echo @$avisos["errfotoMenor"]?></font>
                              </form>
                            </div>

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>INE de la mamá</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="ineMama"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir INE</button>
                                <font color="green"> <?php echo @$avisos["veriineMama"]?></font>
                                <font color="red"> <?php echo @$avisos["errineMama"]?></font>
                              </form>
                            </div>

                          </div>

                          <div class="row">

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>INE del papá</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="inePapa"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir INE</button>
                                <font color="green"> <?php echo @$avisos["veriinePapa"]?></font>
                                <font color="red"> <?php echo @$avisos["errinePapa"]?></font>
                              </form>
                            </div>

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>INE de persona autorizada #1</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="inep1"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir INE</button>
                                <font color="green"> <?php echo @$avisos["veriinep1"]?></font>
                                <font color="red"> <?php echo @$avisos["errinep1"]?></font>
                              </form>
                            </div>

                            <div class="col-md-4">
                              <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>INE de persona autorizada #2</label>
                                    <input type="file" name="doc">
                                </div>
                                <input type="hidden" name="info" value="inep2"/>
                                <input type="hidden" name="id" value="<?php echo $idreg; ?>"/>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Subir INE</button>
                                <font color="green"> <?php echo @$avisos["veriinep2"]?></font>
                                <font color="red"> <?php echo @$avisos["errinep2"]?></font>
                              </form>
                            </div>

                          </div>

                          <hr>

                          <h4 class="title">Carta responsiva</h4>
                          <p class="category">Dar clic en el botón para llenar la carta responsiva de tu hijo</p>

                          <form action="cartaResponsiva.php" method="GET">
                              <button type="submit" class="btn btn-info btn-fill pull-right" name="id" value=<?php echo @$tp["id"]; ?>>Llenar carta</button>
                          </form>

                          <div class="clearfix"></div>

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
