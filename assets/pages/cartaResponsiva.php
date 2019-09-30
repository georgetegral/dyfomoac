<!doctype html>

<?php
date_default_timezone_set("America/Monterrey");
setlocale(LC_ALL,"es_ES");
include('../../session.php');
include("../../config.php");

//Calcula edades
function calc($then) {
 $then_ts = strtotime($then);
 $then_year = date('Y', $then_ts);
 $age = date('Y') - $then_year;
 if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
 return $age;
}

if($_GET["id"]){
  $idMenor=$_GET["id"];
}

//Checar si se llenó la carta
$sqlReg=mysqli_query($conexion,"SELECT * FROM cartaresponsiva WHERE idMenor='$idMenor' ");
$info = mysqli_fetch_array($sqlReg,MYSQLI_ASSOC);

//Información necesaria
if(empty($info["idMenor"])){

  $sqlInfo=mysqli_query($conexion,"SELECT u.nombre AS unombre, u.apellido AS uapellido, u.fnac AS ufnac, t.ocupacion, t.estado_civil, t.calle_casa,
  t.numero_casa, t.colonia_casa, t.municipio_casa, t.cp_casa, t.telefono_casa, m.id AS idMenor, m.nombre AS mnombre, m.apellido AS mapellido,
  m.fecha_nacimiento AS mfnac FROM usuarios AS u, tutor AS t, dependientes AS d, menor AS m WHERE u.correo=t.correo_tutor
  AND t.correo_tutor=d.correo_tutor AND d.correo_tutor='$correo' AND d.id_menor=m.id AND m.id='$idMenor'");
  $re = mysqli_fetch_array($sqlInfo,MYSQLI_ASSOC);
} else {
  $correoInfo=$info["correo_tutor"];

  $sqlInfo=mysqli_query($conexion,"SELECT u.nombre AS unombre, u.apellido AS uapellido, u.fnac AS ufnac, t.ocupacion, t.estado_civil, t.calle_casa,
  t.numero_casa, t.colonia_casa, t.municipio_casa, t.cp_casa, t.telefono_casa, m.id AS idMenor, m.nombre AS mnombre, m.apellido AS mapellido,
  m.fecha_nacimiento AS mfnac FROM usuarios AS u, tutor AS t, dependientes AS d, menor AS m WHERE u.correo=t.correo_tutor
  AND t.correo_tutor=d.correo_tutor AND d.correo_tutor='$correoInfo' AND d.id_menor=m.id AND m.id='$idMenor'");
  $re = mysqli_fetch_array($sqlInfo,MYSQLI_ASSOC);
}

//Fecha registro
$sqlfreg=mysqli_query($conexion, "SELECT fecha FROM registro WHERE id_menor='$idMenor'");
$ref = mysqli_fetch_array($sqlfreg,MYSQLI_ASSOC);

$nomTut=$re["unombre"]." ".$re["uapellido"];
$edadTut=calc($re["ufnac"]);
$civil=$re["estado_civil"];
$ocup=$re["ocupacion"];
$calle=$re["calle_casa"]." ".$re["numero_casa"];
$colonia=$re["colonia_casa"];
$muni=$re["municipio_casa"];
$cp=$re["cp_casa"];
$tel=$re["telefono_casa"];
$nomMen=$re["mnombre"]." ".$re["mapellido"];
$edadMen=calc($re["mfnac"]);
$brinda="Dra. Eiliana Olivo López";
$fechaAct=date("Y-m-d");
$fechaActEscrita=strftime("%A %d de %B del %Y");

$fechaReg=$ref["fecha"];
$ft=explode("-",$ref["fecha"]);
$fechaRegEscrita=strftime("%A %d de %B del %Y", mktime(0,0,0,$ft["1"],$ft["2"],$ft["0"]));

if(!empty($info["idMenor"])){
  $ft2=explode("-",$info["fechaAceptada"]);
  $fechaActEscrita=strftime("%A %d de %B del %Y", mktime(0,0,0,$ft2["1"],$ft2["2"],$ft2["0"]));
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $sqlAdd="INSERT INTO cartaresponsiva (idMenor,correo_tutor,fechaAceptada) VALUES ('$idMenor','$correo','$fechaAct')";
  if ($conexion->query($sqlAdd)) {
    header("Refresh:0");
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

              <div class="col-md-12">
                  <div class="card">

                      <div class="header">
                          <h4 class="title">Carta Responsiva</h4>
                          <p class="category">Completa la siguiente carta responsiva </p>
                          <p class="category" style="color:red;">*Los datos subrayados se obtienen de la información ya ingresada por usted, si hay algún error favor de corregirlo en el apartado de "mi información" o en "administrar hijos", en caso de necesitar cambiar su nombre o su edad (calculada de la fecha de nacimiento) favor de contactar al administrador.</p>
                      </div>
                      <hr>

                      <div class="content">
                          <p style="text-align:justify">
                            A quién corresponda:
                            <br><br>El, (la) que suscribe (padre o tutor) <b><u><?php echo $nomTut;?></u></b>, en pleno uso de mis facultades. Declaro que soy mexicano(a), de <b><u><?php echo $edadTut;?> años</u></b>, Estado Civil <b><u><?php echo $civil;?></u></b>, Ocupación <b><u><?php echo $ocup;?></u></b>, con domicilio para oír y recibir todo tipo de notificaciones en la calle <b><u><?php echo $calle;?></u></b>, de la Colonia <b><u><?php echo $colonia;?></u></b>,
                            del Municipio de <b><u><?php echo $muni;?></b></u>, C.P. <b><u><?php echo $cp;?></u></b> y Teléfono <b><u><?php echo $tel;?></u></b>. A través de la presente <b>CARTA RESPONSIVA</b>, declaro que es mi deseo que mi hijo(a) <b><u><?php echo $nomMen;?></u></b>, de <b><u><?php echo $edadMen;?> años</u></b> reciba el servicio de Guardería, Estancia Infantil o Educación Inicial que brinda <b><u><?php echo $brinda;?></u></b> que forma parte de DESARROLLO Y FORMACIÓN PARA EL MENOR OLIVO A.C.,
                            a partir de la fecha <b><u><?php echo $fechaRegEscrita;?></u></b>; Asimismo declaro mi aprobación y satisfacción con la capacitación y experiencia de las personas que laboran y las que ofrecen voluntariamente su servicio en DESARROLLO Y FORMACIÓN PARA EL MENOR OLIVO A.C., que a mi consideración son personas capacitadas y cuentan con la experiencia requerida para realizar las actividades con mi hijo(a) relacionadas al servicio de Guardería, Estancia Infantil o Educación Inicial, además de estar capacitadas para tomar las medidas de seguridad necesarias para desempeñar o desarrollar actividades relacionadas con dichas funciones.
                            <br><br>Por lo anterior, manifiesto que como Padre, Madre o Tutor y conociendo las medidas de seguridad y prevención con las que cuenta <b><u><?php echo $brinda;?></u></b>, desde éste acto RELEVO DE TODA RESPONSABILIDAD CIVIL O PENAL a los representantes legales, directivos, personal docente y de servicios de DESARROLLO Y FORMACIÓN PARA EL MENOR OLIVO AC, de cualquier accidente o lesión que pudiera sufrir mi hijo(a) con motivo de negligencia, descuido o imprudencia en que incurran, consciente de que existen los siguientes riesgos al realizar las actividades programadas o hacer uso de las instalaciones:
                            <br>&emsp;1.	Cometer, sin dolo, actos u omisiones al realizar el desempeño de su cometido laboral.
                            <br>&emsp;2.	Ocasionar, por negligencia o por impericia, la muerte o lesión corporal accidental a los menores bajo su custodia o resguardo, incluyendo la aplicación de productos farmacéuticos aprobados por la autoridad competente, siempre que se haya procedido con receta médica.
                            <br><br>Así mismo, deslindo de responsabilidad de cualquier alteración en la salud de mi hijo(a), como resultado de la acción de agentes de origen interno o externo, que llegan a cambiar el estado fisiológico del organismo y ameritan tratamiento médico o quirúrgico.  O bien, cambios que se produzcan como consecuencia inmediata o directa de las señaladas anteriormente, de su tratamiento médico o quirúrgico, así como sus recurrencias, recaídas, complicaciones y secuelas; Incluyendo la(s) enfermedad(es) mental(es), que alteren las funciones mentales superiores: memoria (corto y largo plazo), juicio, lenguaje coherente y congruente, y cálculo abstracto y que se encuentran catalogadas en el DSM IV (Diagnostical and Stadistical Manual of Mental Disorder -Manual Diagnóstico y Estadístico de los Trastornos Mentales-), avaladas por la Organización Mundial de la Salud.
                            <br><br>Así mismo manifiesto BAJO PROTESTA DE DECIR VERDAD, que los documentos de identidad y los demás presentados en este acto para efecto de cumplir con los requerimientos de inscripción, son legítimos, por lo que cualquier situación que pudiera llegar a suscitarse me comprometo a comparecer ante la justicia asumiendo toda mi responsabilidad en ese acto. Y para que conste lo firmo:
                            <br><br>
                          </p>
                          <hr>
                          <p style="text-align:center">
                            <?php echo $nomTut;?>
                            <br>San Pedro Garza García, Nuevo León, a <?php echo $fechaActEscrita;?>
                          </p>
                        <form method="post">

                          <?php
                          if(empty($info["idMenor"])){
                            ?>
                            <form method="post">
                            <button type="submit" class="btn btn-info btn-fill pull-right">Aceptar carta</button>
                            </form>
                            <?php
                          } else {
                            ?>
                            <button type="submit" class="btn btn-info btn-fill pull-right" disabled>Carta aceptada</button>
                            <?php
                          }
                           ?>


                        </form>
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
