<!doctype html>

<?php
   include('../../session.php');
   date_default_timezone_set("America/Monterrey");
   include("../../config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $info=$_POST["info"];

  if($info=="parent"){
    $nombrePost=$_POST["nombrePost"];
    $apellidosPost=$_POST["apellidosPost"];
    $fnacPost=$_POST["fnacPost"];
    $celular=$_POST["celular"];
    $ocupacion=$_POST["ocupacion"];
    $telTrabajo=$_POST["telTrabajo"];
    $horTrabajo=$_POST["horTrabajo"];
    $face=$_POST["face"];
    $corPost=$_POST["corPost"];
    $estadoCivil=$_POST["estadoCivil"];
    $callePost=$_POST["callePost"];
    $numeroPost=$_POST["numeroPost"];
    $coloniaPost=$_POST["coloniaPost"];
    $municipioPost=$_POST["municipioPost"];
    $codigoPostalPost=$_POST["codigoPostalPost"];
    $telCasa=$_POST["telCasa"];

    $sql1 = "UPDATE tutor SET celular='$celular', ocupacion='$ocupacion', telefono_trabajo='$telTrabajo', facebook='$face',
    horario_trabajo='$horTrabajo', calle_casa='$callePost', numero_casa='$numeroPost', colonia_casa='$coloniaPost', municipio_casa='$municipioPost',
    cp_casa='$codigoPostalPost', telefono_casa='$telCasa', estado_civil='$estadoCivil' WHERE correo_tutor='$corPost' ";
    $sql2 = "UPDATE usuarios SET nombre='$nombrePost', apellido='$apellidosPost', fnac='$fnacPost' WHERE correo='$corPost' ";
    if ($conexion->query($sql1) && $conexion->query($sql2)) {

      $avisos["veriEdit"] = "Se ha actualizado correctamente la información.";

    } else {

      $avisos["errEdit"] = "Error, no se actualizó la información, favor de intentar de nuevo.";

    }

  }

  if($info=="pago"){
    $beca=$_POST["beca"];
    $cole=$_POST["colegiatura"];
    $idMen=$_POST["idMen"];
    $sqlPago="UPDATE registro SET beca='$beca', colegiatura='$cole' WHERE id_menor='$idMen'";
    if ($conexion->query($sqlPago)) {
      $avisos["veriPago"] = "Se ha actualizado correctamente la información.";
    } else {
      $avisos["errPago"] = "Error, no se actualizó la información, favor de intentar de nuevo.";
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
            <li>
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

                         //Checar el estatus del aviso de privacidad para este padre de familia
                         $sqlCheck=mysqli_query($conexion,"SELECT * FROM privacidad WHERE correo_tutor='$nomTemp'");
                         $check = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);

                         if(empty($check["correo_tutor"])){
                           $checkRes="Pendiente";
                         } else if($check["resp"]==0){
                           $checkRes="NO aceptó";
                         } else {
                           $checkRes="SI aceptó";
                         }

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
                                   <input type="hidden" class="form-control" value="<?php echo $tp['correo_tutor'] ?>" name="corPost">
                                   <div class="row">
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Nombre</label>
                                           <input type="text" class="form-control" value="<?php echo $infoName['nombre'] ?>" name="nombrePost" required>
                                       </div>
                                     </div>
                                       <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Apellidos</label>
                                             <input type="text" class="form-control" value="<?php echo $infoName['apellido'] ?>" name="apellidosPost" required>
                                         </div>
                                       </div>
                                       <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Fecha de nacimiento</label>
                                             <input type="date" class="form-control" value="<?php echo $infoName['fnac'] ?>" name="fnacPost" required>
                                         </div>
                                       </div>
                                       <div class="col-md-3">
                                         <div class="form-group">
                                             <label>Estatus del aviso de privacidad</label>
                                             <input type="text" class="form-control" value="<?php echo $checkRes;?>" disabled>
                                         </div>
                                       </div>
                                   </div>

                                 <div class="row">
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Celular</label>
                                           <input type="number" class="form-control" value="<?php echo $tp['celular'] ?>" name="celular" required>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Ocupación</label>
                                           <input type="text" class="form-control" value="<?php echo $tp['ocupacion'] ?>" name="ocupacion" required>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Teléfono del trabajo</label>
                                           <input type="number" class="form-control" value="<?php echo $tp['telefono_trabajo'] ?>" name="telTrabajo" required>
                                       </div>
                                     </div>
                                     <div class="col-md-3">
                                       <div class="form-group">
                                           <label>Horario del trabajo</label>
                                           <input type="text" class="form-control" value="<?php echo $tp['horario_trabajo'] ?>" name="horTrabajo" required>
                                       </div>
                                     </div>
                                 </div>

                                 <div class="row">
                                 <div class="col-md-3">
                                   <div class="form-group">
                                       <label>Facebook</label>
                                       <input type="text" class="form-control" value="<?php echo $tp['facebook'] ?>" name="face" required>
                                   </div>
                                 </div>
                                   <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Correo electrónico</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['correo_tutor'] ?>" name="corPostx" disabled>
                                     </div>
                                   </div>
                                   <div class="col-md-3">
                                     <div class="form-group">
                                         <label>Estado civil</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['estado_civil'] ?>" name="estadoCivil" required>
                                     </div>
                                   </div>
                                 </div>

                                 <p>Domicilio</p>
                                 <div class="row">
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Calle</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['calle_casa'] ?>" name="callePost" required>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Número</label>
                                         <input type="number" class="form-control" value="<?php echo $tp['numero_casa'] ?>" name="numeroPost" required>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Colonia</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['colonia_casa'] ?>" name="coloniaPost" required>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Municipio</label>
                                         <input type="text" class="form-control" value="<?php echo $tp['municipio_casa'] ?>" name="municipioPost" required>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Código postal</label>
                                         <input type="number" class="form-control" value="<?php echo $tp['cp_casa'] ?>" name="codigoPostalPost" required>
                                     </div>
                                   </div>
                                   <div class="col-md-2">
                                     <div class="form-group">
                                         <label>Teléfono de casa</label>
                                         <input type="number" class="form-control" value="<?php echo $tp['telefono_casa'] ?>" name="telCasa" required>
                                     </div>
                                   </div>
                                 </div>
                                 <button type="submit" class="btn btn-info btn-fill pull-right">Modificar</button>
                                 <font color="red"> <?php echo @$avisos["errEdit"]?></font>
                                 <font color="green"> <?php echo @$avisos["veriEdit"]?></font>
                                 <div class="clearfix"></div>
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

                               <div class="row">
                                 <?php
                                 $sqlReg=mysqli_query($conexion,"SELECT * FROM cartaresponsiva WHERE idMenor='$idm' ");
                                 $infoResp = mysqli_fetch_array($sqlReg,MYSQLI_ASSOC);
                                 if(empty($infoResp["idMenor"])){
                                   $valResp="PENDIENTE";
                                 } else {
                                   $valResp="ACEPTADA";
                                 }
                                  ?>
                                 <div class="col-md-4">
                                     <div class="form-group">
                                         <label>Estatus Carta Responsiva</label>
                                         <input type="text" class="form-control"  value="<?php echo $valResp; ?>" disabled>
                                     </div>
                                 </div>

                               </div>

                               <hr>

                               <?php

                               $sqlPagoVer=mysqli_query($conexion, "SELECT beca,colegiatura FROM registro WHERE id_menor='$idm'");
                               $rpv = mysqli_fetch_array($sqlPagoVer,MYSQLI_ASSOC);
                               if(empty($rpv)){
                                 $becaV="";
                                 $coleV="";
                               } else {
                                 $becaV=$rpv["beca"];
                                 $coleV=$rpv["colegiatura"];
                               }
                               ?>

                               <form method="post">
                                 <div class="row">
                                   <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Porcentaje de Beca</label>
                                          <input type="text" class="form-control" name="beca" value="<?php echo $becaV; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                         <label>Colegiatura</label>
                                         <input type="text" class="form-control" name="colegiatura" value="<?php echo $coleV; ?>" required>
                                     </div>
                                 </div>
                                 </div>
                                 <input type="hidden" name="info" value="pago"/>
                                 <input type="hidden" name="idMen" value=<?php echo @$tp["id"]; ?>/>
                                 <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar información de beca y colegiatura</button>
                                 <font color="green"> <?php echo @$avisos["veripago"]?></font>
                                 <font color="red"> <?php echo @$avisos["errpago"]?></font>
                                 <div class="clearfix"></div>
                                </form>


                               <?php
                             }

                             ?>
                           </div>

                        </div>
                    </div>
                   <?php
                 }

              ?>

                <div class="col-md-12">
                  <div class="card">
                    <div class="header">
                        <h4 class="title">Documentos del menor</h4>
                        <p class="category">Revisa los documentos subidos para este menor.</p>
                    </div>
                    <hr>
                    <div class="content">
                      <?php
                      $di="../documents/"; //directorio de documentos
                      $ac="acta_menor_".$idm; //Acta de nacimiento
                      $va="vacunacion_menor_".$idm; //Cartilla de vacunación
                      $sa="salud_menor_".$idm; //Carta de buena salud
                      $cu="curp_menor_".$idm; //CURP
                      $fo="fotoMenor_menor_".$idm; //Foto del menor
                      $im="ineMama_menor_".$idm; //INE Mamá
                      $ip="inePapa_menor_".$idm; //INE Papá
                      $i1="inep1_menor_".$idm; //INE persona 1
                      $i2="inep2_menor_".$idm; //INE persona 2
                      //Extensiones: jpg, jpeg, png, gif, pdf

                       ?>

                      <div class="row">
                        <div class="col-md-2">
                          <form action="padresVerDocumento.php" method="get">
                            <div class="form-group">
                                <label>Acta de nacimiento</label>
                                <?php
                                  $d1=$di.$ac.".jpg";
                                  $d2=$di.$ac.".jpeg";
                                  $d3=$di.$ac.".png";
                                  $d4=$di.$ac.".gif";
                                  $d5=$di.$ac.".pdf";

                                  if(file_exists($d1)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                      <input type="hidden" name="ext" value="jpg" />
                                    <?php
                                  }else if(file_exists($d2)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                      <input type="hidden" name="ext" value="jpeg" />
                                    <?php
                                  }else if(file_exists($d3)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                      <input type="hidden" name="ext" value="png" />
                                    <?php
                                  }else if(file_exists($d4)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                      <input type="hidden" name="ext" value="gif" />
                                    <?php
                                  }else if(file_exists($d5)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                      <input type="hidden" name="ext" value="pdf" />
                                    <?php
                                  }else {
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                    <?php
                                  }

                                ?>
                            </form>
                          </div>
                        </div>
                          <div class="col-md-2">
                            <div class="form-group">
                              <form action="padresVerDocumento.php" method="get">
                                <label>Cartilla de vacunación</label>
                                <?php
                                  $d1=$di.$va.".jpg";
                                  $d2=$di.$va.".jpeg";
                                  $d3=$di.$va.".png";
                                  $d4=$di.$va.".gif";
                                  $d5=$di.$va.".pdf";

                                  if(file_exists($d1)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                      <input type="hidden" name="ext" value="jpg" />
                                    <?php
                                  }else if(file_exists($d2)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                      <input type="hidden" name="ext" value="jpeg" />
                                    <?php
                                  }else if(file_exists($d3)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                      <input type="hidden" name="ext" value="png" />
                                    <?php
                                  }else if(file_exists($d4)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                      <input type="hidden" name="ext" value="gif" />
                                    <?php
                                  }else if(file_exists($d5)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                      <input type="hidden" name="ext" value="pdf" />
                                    <?php
                                  }else {
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                    <?php
                                  }

                                ?>
                              </form>
                            </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                <form action="padresVerDocumento.php" method="get">
                                  <label>Carta de buena salud</label>
                                  <?php
                                    $d1=$di.$sa.".jpg";
                                    $d2=$di.$sa.".jpeg";
                                    $d3=$di.$sa.".png";
                                    $d4=$di.$sa.".gif";
                                    $d5=$di.$sa.".pdf";

                                    if(file_exists($d1)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                        <input type="hidden" name="ext" value="jpg" />
                                      <?php
                                    }else if(file_exists($d2)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                        <input type="hidden" name="ext" value="jpeg" />
                                      <?php
                                    }else if(file_exists($d3)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                        <input type="hidden" name="ext" value="png" />
                                      <?php
                                    }else if(file_exists($d4)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                        <input type="hidden" name="ext" value="gif" />
                                      <?php
                                    }else if(file_exists($d5)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                        <input type="hidden" name="ext" value="pdf" />
                                      <?php
                                    }else {
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                      <?php
                                    }

                                  ?>
                                </form>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                <form action="padresVerDocumento.php" method="get">
                                  <label>CURP</label>
                                  <br>
                                  <?php
                                    $d1=$di.$cu.".jpg";
                                    $d2=$di.$cu.".jpeg";
                                    $d3=$di.$cu.".png";
                                    $d4=$di.$cu.".gif";
                                    $d5=$di.$cu.".pdf";

                                    if(file_exists($d1)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                        <input type="hidden" name="ext" value="jpg" />
                                      <?php
                                    }else if(file_exists($d2)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                        <input type="hidden" name="ext" value="jpeg" />
                                      <?php
                                    }else if(file_exists($d3)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                        <input type="hidden" name="ext" value="png" />
                                      <?php
                                    }else if(file_exists($d4)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                        <input type="hidden" name="ext" value="gif" />
                                      <?php
                                    }else if(file_exists($d5)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                        <input type="hidden" name="ext" value="pdf" />
                                      <?php
                                    }else {
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                      <?php
                                    }

                                  ?>
                                </form>
                              </div>
                          </div>
                          <div class="col-md-2">
                              <div class="form-group">
                                <form action="padresVerDocumento.php" method="get">
                                  <label>Foto del menor</label>
                                  <?php
                                    $d1=$di.$fo.".jpg";
                                    $d2=$di.$fo.".jpeg";
                                    $d3=$di.$fo.".png";
                                    $d4=$di.$fo.".gif";
                                    $d5=$di.$fo.".pdf";

                                    if(file_exists($d1)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                        <input type="hidden" name="ext" value="jpg" />
                                      <?php
                                    }else if(file_exists($d2)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                        <input type="hidden" name="ext" value="jpeg" />
                                      <?php
                                    }else if(file_exists($d3)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                        <input type="hidden" name="ext" value="png" />
                                      <?php
                                    }else if(file_exists($d4)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                        <input type="hidden" name="ext" value="gif" />
                                      <?php
                                    }else if(file_exists($d5)){
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                        <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                        <input type="hidden" name="ext" value="pdf" />
                                      <?php
                                    }else {
                                      ?>
                                        <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                      <?php
                                    }

                                  ?>
                                </form>
                              </div>
                          </div>
                      </div>
                      <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                              <form action="padresVerDocumento.php" method="get">
                                <label>INE de mamá</label>
                                <?php
                                  $d1=$di.$im.".jpg";
                                  $d2=$di.$im.".jpeg";
                                  $d3=$di.$im.".png";
                                  $d4=$di.$im.".gif";
                                  $d5=$di.$im.".pdf";

                                  if(file_exists($d1)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                      <input type="hidden" name="ext" value="jpg" />
                                    <?php
                                  }else if(file_exists($d2)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                      <input type="hidden" name="ext" value="jpeg" />
                                    <?php
                                  }else if(file_exists($d3)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                      <input type="hidden" name="ext" value="png" />
                                    <?php
                                  }else if(file_exists($d4)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                      <input type="hidden" name="ext" value="gif" />
                                    <?php
                                  }else if(file_exists($d5)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                      <input type="hidden" name="ext" value="pdf" />
                                    <?php
                                  }else {
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                    <?php
                                  }

                                ?>
                              </form>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <form action="padresVerDocumento.php" method="get">
                                <label>INE de papá</label>
                                <?php
                                  $d1=$di.$ip.".jpg";
                                  $d2=$di.$ip.".jpeg";
                                  $d3=$di.$ip.".png";
                                  $d4=$di.$ip.".gif";
                                  $d5=$di.$ip.".pdf";

                                  if(file_exists($d1)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                      <input type="hidden" name="ext" value="jpg" />
                                    <?php
                                  }else if(file_exists($d2)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                      <input type="hidden" name="ext" value="jpeg" />
                                    <?php
                                  }else if(file_exists($d3)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                      <input type="hidden" name="ext" value="png" />
                                    <?php
                                  }else if(file_exists($d4)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                      <input type="hidden" name="ext" value="gif" />
                                    <?php
                                  }else if(file_exists($d5)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                      <input type="hidden" name="ext" value="pdf" />
                                    <?php
                                  }else {
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                    <?php
                                  }

                                ?>
                              </form>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <form action="padresVerDocumento.php" method="get">
                                <label>INE persona #1</label>
                                <?php
                                  $d1=$di.$i1.".jpg";
                                  $d2=$di.$i1.".jpeg";
                                  $d3=$di.$i1.".png";
                                  $d4=$di.$i1.".gif";
                                  $d5=$di.$i1.".pdf";

                                  if(file_exists($d1)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                      <input type="hidden" name="ext" value="jpg" />
                                    <?php
                                  }else if(file_exists($d2)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                      <input type="hidden" name="ext" value="jpeg" />
                                    <?php
                                  }else if(file_exists($d3)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                      <input type="hidden" name="ext" value="png" />
                                    <?php
                                  }else if(file_exists($d4)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                      <input type="hidden" name="ext" value="gif" />
                                    <?php
                                  }else if(file_exists($d5)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                      <input type="hidden" name="ext" value="pdf" />
                                    <?php
                                  }else {
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                    <?php
                                  }

                                ?>
                              </form>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                              <form action="padresVerDocumento.php" method="get">
                                <label>INE persona #2</label>
                                <?php
                                  $d1=$di.$i2.".jpg";
                                  $d2=$di.$i2.".jpeg";
                                  $d3=$di.$i2.".png";
                                  $d4=$di.$i2.".gif";
                                  $d5=$di.$i2.".pdf";

                                  if(file_exists($d1)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d1?>" />
                                      <input type="hidden" name="ext" value="jpg" />
                                    <?php
                                  }else if(file_exists($d2)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d2?>" />
                                      <input type="hidden" name="ext" value="jpeg" />
                                    <?php
                                  }else if(file_exists($d3)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d3?>" />
                                      <input type="hidden" name="ext" value="png" />
                                    <?php
                                  }else if(file_exists($d4)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d4?>" />
                                      <input type="hidden" name="ext" value="gif" />
                                    <?php
                                  }else if(file_exists($d5)){
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill">Ver documento</button>
                                      <input type="hidden" name="dir" value="<?php echo $d5?>" />
                                      <input type="hidden" name="ext" value="pdf" />
                                    <?php
                                  }else {
                                    ?>
                                      <button type="submit" class="btn btn-info btn-fill" disabled>No disponible</button>
                                    <?php
                                  }

                                ?>
                              </form>
                            </div>
                        </div>
                      </div>

                    <div class="clearfix"></div>
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
