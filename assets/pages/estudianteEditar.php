<!doctype html>

<?php
  date_default_timezone_set("America/Monterrey");
   include('../../session.php');
   include("../../config.php");
   if($_GET["mail"]){
     $mailEst=$_GET["mail"];
     $mailEst=str_replace('%','@',$mailEst);

     $sqlEst=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE est_correo = '$mailEst' ");
     $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);

     $matriculaEst=$info["matricula"];
     $celEst=$info["celular"];
     $carreraEst=$info["carrera"];
     $sgmmEst=$info["sgmm"];
     $nomTutorEst=$info["nombre_tutor"];
     $apeTutorEst=$info["apellido_tutor"];
     $tel1Est=$info["tel_tutor_1"];
     $tel2Est=$info["tel_tutor_2"];
     $activoEst=$info["activo"];
     if($activoEst==1){
       $activoEst="Activo";
     } else {
       $activoEst="Inactivo";
     }

     $ubiFotoEst="../fotos/".$mailEst.".jpg";

     $sqlEst=mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = '$mailEst' ");
     $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);

     $nomEst=$info["nombre"];
     $apeEst=$info["apellido"];
     $fnacEst=$info["fnac"];

   }
?>

<?php
//usu - personal, est - estudiante, hor - horas, info - tablas
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $validador=true;
  $form=$_POST["info"];

  if($form=="usu"){

    $nom=$_POST["nombre"];
    $ape=$_POST["apellidos"];
    $fnac=$_POST["fnac"];

    $sql = "UPDATE usuarios SET nombre = '$nom', apellido = '$ape', fnac = '$fnac' WHERE correo='$mailEst'";

    if ($conexion->query($sql)) {
      $avisos["veriUsu"] = "Información guardada exitosamente.<br><br>";
      header('Location: '.$_SERVER['REQUEST_URI']);
      exit;
    } else {
      $avisos["errUsu"] = "Error. Contacte al administrador<br><br>";
    }

  }

  if($form=="est"){

    if(strlen(trim($_POST["carrera"]))>4){
      $avisos["errCar"] = "Ingresa solo las siglas de la carrera.<br><br>";
      $validador=false;
    }

    if(strlen(trim($_POST["matricula"]))>6){
      $avisos["errMat"] = "La matricula solo lleva 6 números.<br><br>";
      $validador=false;
    }

    if($validador){

      $matricula=$_POST["matricula"];
      $celular=$_POST["celular"];
      $carrera=$_POST["carrera"];
      $sgmm=$_POST["sgmm"];
      $nomTutor=$_POST["nomTutor"];
      $apeTutor=$_POST["apeTutor"];
      $tel1=$_POST["tel1"];
      $tel2=$_POST["tel2"];
      $activo=$_POST["estatus"];

      //Hacer mayusculas la Carrera
      $carrera=strtoupper($carrera);

      $sql = "UPDATE estudiantes SET matricula = '$matricula', celular = '$celular', carrera = '$carrera', sgmm = '$sgmm',
      nombre_tutor = '$nomTutor', apellido_tutor='$apeTutor', tel_tutor_1 = '$tel1', tel_tutor_2 = '$tel2', activo = '$activo'
      WHERE est_correo='$mailEst'";

      if ($conexion->query($sql)) {
        $avisos["veriEst"] = "Información guardada exitosamente.<br><br>";
        header('Location: '.$_SERVER['REQUEST_URI']);
        exit;
      } else {
        $avisos["errEst"] = "Error. Contacte al administrador<br><br>";
      }

    }

  }

  if($form=="hor"){
    $horIniReg=$_POST["horIniEst"];
    $horFinReg=$_POST["horFinEst"];
    $ubiReg=$_POST["ubiReg"];
    $actReg=$_POST["actReg"];

    $freg=$_POST["freg"];

    $horAct=date("H:i");

    $horIniT = strtotime($horIniReg);
    $horFinT = strtotime($horFinReg);
    $horActT = strtotime($horAct);

    $dif=$horFinT - $horIniT;
    $cant = round(abs($horFinT - $horIniT) / 60,2);

    if($dif<=0){
      $validador=false;
      $avisos["errHorReg"] = "Error. Por favor ingresa horas válidas.<br><br>";
    }

    if($ubiReg==0){
      $cant=$cant*2;
    }

    if($validador){
      $sqlHorReg = "INSERT into horas (hor_correo,tiempo_inicio,tiempo_fin,cant,fecha,tiempo_registro,ubicacion,actividad)
      VALUES ('$mailEst','$horIniReg','$horFinReg','$cant','$freg','$horAct','$ubiReg','$actReg')";
      if ($conexion->query($sqlHorReg)){
        $avisos["veriHorReg"] = "Horas agregadas exitosamente.";
        ?>
        <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <?php
      } else {
        $avisos["errHorReg"] = "Error. Hubo un problema con la base de datos<br>";
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

  if($form=="table"){
    $id=$_POST["idHor"];
    $sqlTable= "DELETE FROM horas WHERE id='$id'";
    if ($conexion->query($sqlTable)){

    }
  }

  if($form=="mailDelete"){
    ?>
    <script>
    var r = confirm("¿Seguro que quieres eliminar a este estudiante?");
    if (r == true) {
    </script>
    <?php
    $md=$mailEst;
    $sql1="DELETE FROM estudiantes WHERE est_correo='$md'";
    $sql2="DELETE FROM horas WHERE hor_correo='$md'";
    $sql3="DELETE FROM usuarios WHERE correo='$md'";

    if (!mysqli_query($conexion,$sql1)){
      $avisos["errDelete"] = ("Error description 1: " . mysqli_error($conexion));
    } else {
      if (!mysqli_query($conexion,$sql2)){
        $avisos["errDelete"] = ("Error description 2: " . mysqli_error($conexion));
      } else {
        if (!mysqli_query($conexion,$sql3)){
          $avisos["errDelete"] = ("Error description 3: " . mysqli_error($conexion));
        } else {
          $avisos["veriDelete"] = 'Correo eliminado correctamente';
          ?>
          <script>
          alert("Estudiante eliminado correctamente.");
          </script>
          <?php
          header('Location: estudiante.php');
        }
      }
    }

    ?>
    <script>
    }
    </script>
    <?php

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
            <li>
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
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                          <div class="header">
                            <?php if(!empty($ubiFotoEst)) {
                            ?>
                              <img src = <?php echo $ubiFotoEst ?> align="left" width=80 height=80>
                              <br>
                            <?php
                            } ?>

                            <h4 class="title">&#160;<?php echo $nomEst." ".$apeEst?> <span style="color:gray">(<?php echo $activoEst; ?>) </span></h4>
                            <p class="category">&#160;Revisa el historial de este estudiante y cambia sus horas o información si es necesario. </p>
                          </div>
                          <hr>
                          <div class="content">

                            <!--USUARIO-->
                            <form method="POST" id="infoUsu" enctype="multipart/form-data">
                              <p>Información personal</p>

                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Correo</label>
                                          <input type="text" class="form-control" name="correo" value="<?php echo @$mailEst; ?>" disabled required>
                                      </div>
                                      <font color="red"> <?php echo @$avisos["errMat"]?></font>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Nombre</label>
                                          <input type="text" class="form-control" name="nombre" value="<?php echo @$nomEst; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Apellidos</label>
                                          <input type="text" class="form-control" name="apellidos" value="<?php echo @$apeEst; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Fecha de nacimiento</label>
                                          <input type="date" class="form-control" name="fnac" value="<?php echo @$fnacEst; ?>" required>
                                      </div>
                                  </div>
                              </div>

                              <input type="hidden" name="info" value="usu"/>
                               <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Información</button>
                               <font color="green"> <?php echo @$avisos["veriUsu"]?></font>
                               <font color="red"> <?php echo @$avisos["errUsu"]?></font>
                               <div class="clearfix"></div>
                            </form>

                            <hr>
                            <!--ESTUDIANTE-->
                            <form method="POST" id="infoEst" enctype="multipart/form-data">
                              <p>Información del estudiante</p>
                              <!-- matricula, celular, carrera, sgmm, nombre_tutor, apellido_tutor, tel_tutor_1, tel_tutor_2, activo-->

                              <div class="row">
                                  <div class="col-md-2">
                                      <div class="form-group">
                                          <label>Matricula</label>
                                          <input type="number" class="form-control" placeholder="Ej. 534376" name="matricula" value="<?php echo @$matriculaEst; ?>" required>
                                      </div>
                                      <font color="red"> <?php echo @$avisos["errMat"]?></font>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Teléfono Celular</label>
                                          <input type="number" class="form-control" placeholder="Ej. 8114675841" name="celular" value="<?php echo @$celEst; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Carrera (siglas)</label>
                                          <input type="text" class="form-control" placeholder="Ej. ITC" name="carrera" value="<?php echo @$carreraEst; ?>" required>
                                      </div>
                                      <font color="red"> <?php echo @$avisos["errCar"]?></font>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Número de poliza de SGMM</label>
                                          <input type="text" class="form-control" placeholder="Ej. 35000-1129-4" name="sgmm" value="<?php echo @$sgmmEst; ?>" required>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Nombre(s) tutor</label>
                                          <input type="text" class="form-control" placeholder="" name="nomTutor" value="<?php echo @$nomTutorEst; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Apellidos tutor</label>
                                          <input type="text" class="form-control" placeholder="" name="apeTutor" value="<?php echo @$apeTutorEst; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Opción de marcado #1</label>
                                          <input type="number" class="form-control" placeholder="Ej. 8114675841" name="tel1" value="<?php echo @$tel1Est; ?>" required>
                                      </div>
                                  </div>
                                  <div class="col-md-3">
                                      <div class="form-group">
                                          <label>Opción de marcado #2</label>
                                          <input type="number" class="form-control" placeholder="Ej. 8114675841" name="tel2" value="<?php echo @$tel2Est; ?>" required>
                                      </div>
                                  </div>
                              </div>

                              <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Estatus</label>
                                        <?php
                                          if($activoEst=="Activo"){
                                            ?>
                                            <select class="form-control" name="estatus" required>
                                              <option value="1">Activo</option>
                                              <option value="0">Inactivo</option>
                                            </select>
                                            <?php
                                          } else {
                                            ?>
                                            <select class="form-control" name="estatus" required>
                                              <option value="0">Inactivo</option>
                                              <option value="1">Activo</option>
                                            </select>
                                            <?php
                                          }
                                        ?>

                                    </div>
                                </div>
                              </div>

                              <input type="hidden" name="info" value="est"/>
                              <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar Información</button>
                              <font color="green"> <?php echo @$avisos["veriEst"]?></font>
                              <font color="red"> <?php echo @$avisos["errEst"]?></font>
                              <div class="clearfix"></div>
                            </form>

                            <hr>
                            <!--AGREGAR HORAS-->
                            <form method="POST" id="agregarHor" enctype="multipart/form-data">
                              <p>Agregar hora</p>

                              <div class="row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora de inicio</label>
                                        <input type="time" class="form-control" name="horIniEst"  required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Hora de término</label>
                                        <input type="time" class="form-control" name="horFinEst" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" class="form-control" name="freg" required>

                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Ubicación</label>
                                        <select class="form-control" name="ubiReg" required>
                                          <option value="1">Dentro del DyFOMOAC</option>
                                          <option value="0">Fuera del DyFOMOAC</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Actividad</label>
                                        <input type="text" class="form-control" name="actReg" placeholder="Ej. Cuidé niños, hice un folleto, etc..." required>
                                    </div>
                                </div>
                              </div>

                              <input type="hidden" name="info" value="hor"/>
                              <button type="submit" class="btn btn-info btn-fill pull-right">Agregar Hora</button>
                              <font color="green"> <?php echo @$avisos["veriHorReg"]?></font>
                              <font color="red"> <?php echo @$avisos["errHorReg"]?></font>
                              <div class="clearfix"></div>
                            </form>

                            <hr>
                            <!--VER HORAS-->

                              <p>Registro de horas</p>

                              <div class="content table-responsive table-full-width">
                                  <table class="table table-hover table-striped">
                                    <thead>
                                      <th>Fecha</th>
                                      <th>Hora de inicio</th>
                                      <th>Hora de fin</th>
                                      <th>Horas realizadas</th>
                                      <th>Tiempo de registro</th>
                                      <th>Ubicación</th>
                                      <th>Actividad</th>
                                      <th>Eliminar</th>
                                    </thead>

                                    <tbody>

                                      <?php
                                      include("../../config.php");
                                      $queryHoras="SELECT * FROM horas WHERE hor_correo='$mailEst'";
                                      $resultHoras = $conexion->query($queryHoras);
                                      $res = array();
                                      while($tupla = mysqli_fetch_array($resultHoras, MYSQLI_ASSOC) ){
                                        $res[] = $tupla;
                                      }

                                      foreach ($res as $tupla){
                                      ?>
                                      <tr>
                                      <form method="POST" id="editHor" enctype="multipart/form-data">

                                      <td><?php echo $tupla["fecha"]; ?></td>
                                      <td><?php echo $tupla["tiempo_inicio"]; ?></td>
                                      <td><?php echo $tupla["tiempo_fin"]; ?></td>
                                      <td>
                                        <?php
                                        $num = $tupla["cant"];
                                        if($num % 60 == 0){
                                          $num = $num/60;
                                          echo $num;
                                        } else {
                                          $num = $num/60;
                                          echo number_format((float)$num, 2, '.', '');
                                        }
                                        ?>
                                      </td>
                                      <td><?php echo $tupla["tiempo_registro"]; ?></td>
                                      <td>
                                        <?php
                                          if($tupla["ubicacion"]==0){
                                            echo "Fuera";
                                          } else {
                                            echo "Dentro";
                                          }

                                        ?>
                                      </td>
                                      <td><?php echo $tupla["actividad"]; ?></td>
                                      <input type="hidden" name="info" value="table"/>
                                      <input type="hidden" name="idHor" value="<?php echo $tupla["id"]; ?>"/>
                                      <td> <button type="submit" class="btn btn-info btn-fill pull-left">Eliminar</button> </td>

                                      </form>

                                      <?php
                                      }
                                      ?>

                                      </tr>
                                    </tbody>
                                  </table>
                              </div>

                              <hr>
                              <form method="POST" enctype="multipart/form-data">
                                <p>Eliminar estudiante de forma permanente</p>
                                <input type="hidden" name="info" value="mailDelete"/>
                                 <button type="submit" class="btn btn-info btn-fill pull-left">Eliminar estudiante</button>
                                 <font color="green"> <?php echo @$avisos["veriDelete"]?></font>
                                 <font color="red"> <?php echo @$avisos["errDelete"]?></font>
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
