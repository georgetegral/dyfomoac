<!doctype html>

<?php
   include('session.php');
   include('config.php');
   date_default_timezone_set("America/Monterrey");
   if($_GET["id"]){
     $fr=$_GET["fechaReg"];
     $id=$_GET["id"];
     $tipoF=$_GET["tipo"];

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
              <a href="index.php">
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
                   //Administrador
                   if($tipoF=="ingreso"){
               ?>
               <p> Mira todos los reportes de ingreso de la fecha elegida.</p>
               <?php
               $queryIngreso="SELECT * FROM formatoingreso WHERE id_menor='$id' AND fecha='$fr' ORDER BY verificado ASC";
               $resultIng = $conexion->query($queryIngreso);
               $ri = array();
               while($tp = mysqli_fetch_array($resultIng, MYSQLI_ASSOC) ){
                 $ri[] = $tp;
               }

               foreach ($ri as $tp){

                 $fec=$tp["fecha"];
                 $cot=$tp["correo_tutor"];
                 $com=$tp["correo_maestro"];
                 $hoe=$tp["hora_entrada"];
                 $enf=$tp["enfermo"];
                 $med=$tp["medicamento"];
                 $sin=$tp["sintomas"];
                 $lim=$tp["limpio"];
                 $moc=$tp["mochila"];
                 $est=$tp["estado"];
                 $les=$tp["lesion"];
                 $obs=$tp["observacion"];

                 //Nombre tutor
                 $sql="SELECT nombre,apellido FROM usuarios WHERE correo='$cot'";
                 $result = $conexion->query($sql);
                 $tpn = mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $nomTut = $tpn["nombre"].' '.$tpn["apellido"];

                 //Nombre maestro
                 $sql="SELECT nombre,apellido FROM usuarios WHERE correo='$com'";
                 $result = $conexion->query($sql);
                 $tpn = mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $nomMae = $tpn["nombre"].' '.$tpn["apellido"];

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
                 <div class="col-md-12">
                     <div class="card">
                         <div class="header">
                           <?php
                            if($tp["verificado"]=='2'){
                              ?>
                                <h4 class="title">Formato de ingreso ACEPTADO.</h4>
                              <?php
                            } else {
                              ?>
                              <h4 class="title">Formato de ingreso rechazado.</h4>
                              <?php
                            }
                            ?>

                          </div>
                         <div class="content">

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
                                       <input type="text" class="form-control" value="<?php echo $nomTut; ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label>Hora de entrada</label>
                                       <input type="text" class="form-control" value="<?php echo $hoe; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label>¿Llegó enfermo?</label>
                                       <input type="text" class="form-control" value="<?php if($enf=='1'){echo "Sí";}else if($enf=='0'){echo "No";}else{echo "No aplica";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>¿Trae medicamento?</label>
                                     <input type="text" class="form-control" value="<?php if($med=='1'){echo "Sí";}else if($med=='0'){echo "No";}else{echo "No aplica";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>¿Tiene sintomas?</label>
                                     <input type="text" class="form-control" value="<?php if($sin=='1'){echo "Sí";}else if($sin=='0'){echo "No";}else{echo "No aplica";} ?>" disabled>

                                   </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>¿Llegó limpio?</label>
                                     <input type="text" class="form-control" value="<?php if($lim=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label>¿Trae su mochila completa?</label>
                                       <input type="text" class="form-control" value="<?php if($moc=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>¿Viene en buen estado físico?</label>
                                     <input type="text" class="form-control" value="<?php if($est=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                     <label>¿Se entrega con algún tipo de lesión? (mensionar cuál y donde si aplica)</label>
                                     <input type="text" class="form-control" value="<?php echo $les; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                     <label>Observaciones generales</label>
                                     <input type="text" class="form-control" value="<?php echo $obs; ?>" disabled>
                                   </div>
                               </div>
                           </div>

                       </div>

                         </div>
                     </div>
                 <?php
                }

              }
              if($tipoF=="durante"){
               ?>
               <p> Mira todos los reportes dentro de la institución de la fecha elegida.</p>
               <?php
               $queryIngreso="SELECT * FROM formatodurante WHERE id_menor='$id' AND fecha='$fr'";
               $resultIng = $conexion->query($queryIngreso);
               $ri = array();
               while($tp = mysqli_fetch_array($resultIng, MYSQLI_ASSOC) ){
                 $ri[] = $tp;
               }

               foreach ($ri as $tp){

                 $coma=$tp["correo_maestro"];
                 $fech=$tp["fecha"];
                 $desa=$tp["desayuno"];
                 $comi=$tp["comida"];
                 $cena=$tp["cena"];
                 $alob=$tp["alimento_observ"];
                 $desc=$tp["descanso"];
                 $sies=$tp["siesta_tiempo"];
                 $deob=$tp["descanso_observ"];
                 $bano=$tp["bano"];
                 $avis=$tp["aviso"];
                 $pipi=$tp["num_pipi"];
                 $popo=$tp["num_popo"];
                 $exob=$tp["excreto_observ"];
                 $anim=$tp["animo"];
                 $llor=$tp["lloro"];
                 $pele=$tp["peleo"];
                 $part=$tp["participo"];
                 $anob=$tp["animo_observ"];
                 $acci=$tp["accidente"];
                 $acob=$tp["accidente_observ"];
                 $acfo=$tp["accidente_folio"];
                 $salu=$tp["salud"];
                 $saob=$tp["salud_observ"];
                 $atob=$tp["atencion_observ"];
                 $gene=$tp["general_observ"];

                 //Nombre maestro
                 $sql="SELECT nombre,apellido FROM usuarios WHERE correo='$coma'";
                 $result = $conexion->query($sql);
                 $tpt = mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $nomMae = $tpt["nombre"].' '.$tpt["apellido"];

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

                 <div class="col-md-12">
                     <div class="card">
                         <div class="header">
                             <h4 class="title">Formato dentro de la estancia</h4>
                             </div>
                         <div class="content">

                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>Grupo</label>
                                     <input type="text" class="form-control" value="<?php echo $grupo; ?>" disabled>
                                   </div>
                               </div>

                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>Fecha</label>
                                     <input type="text" class="form-control" value="<?php echo $fech; ?>" disabled>
                                   </div>
                               </div>

                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-2">
                                   <div class="form-group">
                                       <label>¿Desayunó?</label>
                                       <input type="text" class="form-control" value="<?php if($desa=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label>¿Comió?</label>
                                     <input type="text" class="form-control" value="<?php if($comi=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label>¿Colación?</label>
                                     <input type="text" class="form-control" value="<?php if($cena=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                     <label>Observaciones del alimento</label>
                                     <input type="text" class="form-control" value="<?php echo $alob; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-3">
                                   <div class="form-group">
                                       <label>¿Durmió?</label>
                                       <input type="text" class="form-control" value="<?php if($desc=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-3">
                                   <div class="form-group">
                                     <label>¿Cuanto tiempo durmió?</label>
                                     <input type="text" class="form-control" value="<?php echo $sies; ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                     <label>Observaciones del descanso</label>
                                     <input type="text" class="form-control" value="<?php echo $deob; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-2">
                                   <div class="form-group">
                                       <label>¿Fue al baño?</label>
                                       <input type="text" class="form-control" value="<?php if($bano=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label>¿Avisó?</label>
                                     <input type="text" class="form-control" value="<?php if($avis='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label># de veces que hizo pipí</label>
                                     <input type="text" class="form-control" value="<?php echo $pipi; ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label># de veces que hizo popó</label>
                                     <input type="text" class="form-control" value="<?php echo $popo; ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                     <label>Observaciones de las funciones excretoras</label>
                                     <input type="text" class="form-control" value="<?php echo $exob; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>
                           <div class="row">
                               <div class="col-md-2">
                                   <div class="form-group">
                                       <label>¿Cuál fue su ánimo?</label>
                                       <input type="text" class="form-control" value="<?php if($anim=='1'){echo "Feliz";}else if($anim=='2'){echo "Triste";}else{echo "Enojado";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label>¿Lloró?</label>
                                     <input type="text" class="form-control" value="<?php if($llor=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label>¿Peleó?</label>
                                     <input type="text" class="form-control" value="<?php if($pele=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-2">
                                   <div class="form-group">
                                     <label>¿Participó?</label>
                                     <input type="text" class="form-control" value="<?php if($part=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                     <label>Observaciones del estado de ánimo</label>
                                     <input type="text" class="form-control" value="<?php echo $anob; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>

                           <div class="row">
                               <div class="col-md-2">
                                   <div class="form-group">
                                       <label>¿Tuvo algún accidente?</label>
                                       <input type="text" class="form-control" value="<?php if($acci=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="form-group">
                                     <label>Descripción del accidente (si aplica)</label>
                                     <input type="text" class="form-control" value="<?php echo $acob; ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-4">
                                   <div class="form-group">
                                     <label>Folio del accidente (si aplica)</label>
                                     <input type="text" class="form-control" value="<?php echo $acfo; ?>" disabled>
                                   </div>
                               </div>
                           </div>
                           <hr>

                           <div class="row">
                               <div class="col-md-2">
                                   <div class="form-group">
                                       <label>¿Presentó algún problema de salud?</label>
                                       <input type="text" class="form-control" value="<?php if($salu=='1'){echo "Sí";}else{echo "No";} ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-5">
                                   <div class="form-group">
                                     <label>¿Cuál? (si aplica)</label>
                                     <input type="text" class="form-control" value="<?php echo $saob; ?>" disabled>
                                   </div>
                               </div>
                               <div class="col-md-5">
                                   <div class="form-group">
                                     <label>Atención proporcionada (si aplica)</label>
                                     <input type="text" class="form-control" value="<?php echo $atob; ?>" disabled>
                                   </div>
                               </div>
                           </div>

                           <hr>
                           <div class="row">
                               <div class="col-md-12">
                                   <div class="form-group">
                                     <label>Observaciones generales</label>
                                     <input type="text" class="form-control" value="<?php echo $gene; ?>" disabled>
                                   </div>
                               </div>
                           </div>

                         </div>
                     </div>
                 </div>

                 <?php

              }

                    }
                    if($tipoF=="salida"){
               ?>
               <p> Mira todos los reportes dentro de salida de la fecha elegida.</p>
               <?php
               $queryIngreso="SELECT * FROM formatosalida WHERE id_menor='$id' AND fecha='$fr' ORDER BY verificado ASC";
               $resultIng = $conexion->query($queryIngreso);
               $ri = array();
               while($tp = mysqli_fetch_array($resultIng, MYSQLI_ASSOC) ){
                 $ri[] = $tp;
               }

               foreach ($ri as $tp){

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
                 $tpt = mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $nomTut = $tpt["nombre"].' '.$tpt["apellido"];

                 $sql="SELECT nombre,apellido FROM usuarios WHERE correo='$com'";
                 $result = $conexion->query($sql);
                 $tpt = mysqli_fetch_array($result,MYSQLI_ASSOC);
                 $nomMae = $tpt["nombre"].' '.$tpt["apellido"];
                 ?>

                 <div class="col-md-12">
                     <div class="card">
                       <div class="header">
                         <?php
                          if($tp["verificado"]=='2'){
                            ?>
                              <h4 class="title">Formato de salida ACEPTADO.</h4>
                            <?php
                          } else {
                            ?>
                            <h4 class="title">Formato de salida rechazado.</h4>
                            <?php
                          }
                          ?>

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

                        </div>
                         <div class="content">

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
                                     <input type="text" class="form-control" value="<?php echo $nomTut; ?>" disabled>
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

                         </div>
                     </div>
                 </div>
                 <?php
               }


                    }
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
