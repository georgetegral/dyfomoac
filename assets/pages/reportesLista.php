<!doctype html>

<?php
   include('../../session.php');
   date_default_timezone_set("America/Monterrey");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $info=$_POST["info"];


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
                                           <form method="get" action ="llenarReportesMaestro.php">
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
                                           <form method="get" action ="llenarReportesMaestro.php">
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
                                           <form method="get" action ="llenarReportesMaestro.php">
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
