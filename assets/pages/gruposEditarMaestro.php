<!doctype html>

<?php
   include('../../session.php');
   include("../../config.php");
   date_default_timezone_set("America/Monterrey");
   if($_GET["id"]){
     $id=$_GET["id"];
     $sqlID="SELECT * FROM grupo WHERE id='$id'";
     $resultID = $conexion->query($sqlID);
     $infoID = mysqli_fetch_array($resultID,MYSQLI_ASSOC);

     $mailProf=$infoID["correo_maestro"];
     $etapa=$infoID["etapa"];

   }

   function calc($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
  }

   //Lista maestras
   $sqlM="SELECT nombre,apellido,correo FROM usuarios WHERE tipo='2' AND nombre !='' AND apellido !=''";
   $resultM = $conexion->query($sqlM);
   $resM = array();
   while($tupla = mysqli_fetch_array($resultM, MYSQLI_ASSOC) ){
     $resM[] = $tupla;
   }

   //Maestra actual elegida
   $sqlAct="SELECT nombre,apellido,correo FROM usuarios WHERE correo='$mailProf'";
   $resultAct = $conexion->query($sqlAct);
   $resAct;
   $corAct;
   while($tupla = mysqli_fetch_array($resultAct, MYSQLI_ASSOC) ){
     $resAct = $tupla["nombre"]." ".$tupla["apellido"];
     $corAct = $tupla["correo"];
   }

   //Lista menores activos y que no estén en este grupo
   $sqlMen="SELECT nombre,apellido,id FROM menor WHERE activo='1' AND id_grupo='0'";
   $resultMen = $conexion->query($sqlMen);
   $resMen = array();
   while($tupla = mysqli_fetch_array($resultMen, MYSQLI_ASSOC) ){
     $resMen[] = $tupla;
   }

?>

<?php
//usu - personal, est - estudiante, hor - horas, info - tablas
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $validador=true;
  $info=$_POST["info"];

  if($info=="group"){
    $etapaF=$_POST["etapa"];
    $maestraF=$_POST["maestra"];

    $sqlF="UPDATE grupo SET etapa='$etapaF', correo_maestro='$maestraF' WHERE id='$id'";
    if ($conexion->query($sqlF)) {
      $avisos["veriInfo"] = "Información guardada exitosamente.<br><br>";
      header('Location: '.$_SERVER['REQUEST_URI']);
      exit;
    } else {
      $avisos["errInfo"] = "Error. Contacte al administrador<br><br>";
    }

  }

  if($info=="add"){
    $idmenor=$_POST["menor"];
    $sqlF="UPDATE menor SET id_grupo='$id' WHERE id='$idmenor'";
    if ($conexion->query($sqlF)) {
      $avisos["veriAdd"] = "Información guardada exitosamente.<br><br>";
      header('Location: '.$_SERVER['REQUEST_URI']);
      exit;
    } else {
      $avisos["errAdd"] = "Error. Contacte al administrador<br><br>";
    }
  }

  if($info=="table"){
    $idm=$_POST["idMenor"];
    $sqlE="UPDATE menor SET id_grupo=0 WHERE id='$idm'";

    if ($conexion->query($sqlE)) {
      $avisos["veriTable"] = "Información guardada exitosamente.<br><br>";
      header('Location: '.$_SERVER['REQUEST_URI']);
      exit;
    } else {
      $avisos["errTable"] = "Error. Contacte al administrador<br><br>";
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
          <li class="active">
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
            <li >
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
          <li>
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reportes</p>
              </a>
          </li>
          <li>
              <a href="reportesLista.php">
                <i class="pe-7s-news-paper"></i>
                <p>Llenar Reportes</p>
              </a>
          </li>
          <li class="active">
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
                            <h4 class="title">Grupo: <?php echo $etapa?> </span></h4>
                            <p class="category">Revisa y edita la información de este grupo. </p>
                          </div>
                          <hr>
                          <div class="content">

                            <!--ESTUDIANTE-->
                            <form method="POST" id="infoEst" enctype="multipart/form-data">
                              <p>Agregar menor al grupo</p>

                              <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                      <label>Menor</label>
                                      <select class="form-control" name="menor" required>
                                        <option value="" disabled selected>Elige un menor</option>
                                        <?php
                                          foreach ($resMen as $tupla){
                                            ?>
                                            <option value=<?php echo $tupla["id"]; ?>><?php echo $tupla["nombre"]." ".$tupla["apellido"]; ?></option>
                                            <?php
                                          }
                                        ?>
                                      </select>

                                    </div>
                                </div>
                              </div>

                              <input type="hidden" name="info" value="add"/>
                              <button type="submit" class="btn btn-info btn-fill pull-right">Agregar menor</button>
                              <font color="red"> <?php echo @$avisos["errAdd"]?></font>
                              <font color="green"> <?php echo @$avisos["veriAdd"]?></font>
                              <div class="clearfix"></div>
                            </form>

                            <hr>
                            <!--VER MENORES EN EL GRUPO-->
                              <p>Menores en este grupo</p>

                              <div class="content table-responsive table-full-width">
                                  <table class="table table-hover table-striped">
                                    <thead>
                                      <th>Nombre</th>
                                      <th>Fecha de nacimiento</th>
                                      <th>Edad</th>
                                      <th>Eliminar del grupo</th>
                                    </thead>

                                    <tbody>
                                      <tr>
                                      <?php
                                      include("../../config.php");
                                      $queryTable="SELECT DISTINCT m.id AS id, m.nombre AS mnombre, m.apellido AS mapellido, m.fecha_nacimiento AS mfnac
                                     FROM menor AS m, dependientes AS d
                                      WHERE  d.id_menor=m.id AND m.id_grupo='$id'";
                                      $resultTable = $conexion->query($queryTable);
                                      $res = array();
                                      while($tupla = mysqli_fetch_array($resultTable, MYSQLI_ASSOC) ){
                                        $res[] = $tupla;
                                      }


                                      foreach ($res as $tupla){
                                      ?>

                                      <td><?php echo $tupla["mnombre"]." ".$tupla["mapellido"]; ?></td>
                                      <td><?php echo $tupla["mfnac"]; ?></td>
                                      <td><?php echo calc($tupla["mfnac"]).' años'; ?></td>


                                      <td>
                                        <form method="POST">
                                          <input type="hidden" name="info" value="table"/>
                                          <input type="hidden" name="idMenor" value="<?php echo $tupla["id"]; ?>"/>
                                          <button type="submit" class="btn btn-info btn-fill pull-left">Eliminar</button>
                                          <font color="red"> <?php echo @$avisos["errTable"]?></font>
                                          <font color="green"> <?php echo @$avisos["veriTable"]?></font>
                                        </form>
                                      </td>

                                      </tr>

                                      <?php
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
