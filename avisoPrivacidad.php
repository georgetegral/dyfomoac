<!doctype html>

<?php
  date_default_timezone_set("America/Monterrey");
   include('session.php');

   if($_SERVER["REQUEST_METHOD"] == "POST"){
     include("config.php");
     $validador=true;
     $res=$_POST["info"];

     $sqlCheck=mysqli_query($conexion,"SELECT * FROM privacidad WHERE correo_tutor='$correo'");
     $check = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);

     if(empty($check["correo_tutor"])){

       $sqlPriv="INSERT INTO privacidad (correo_tutor,resp) VALUES ('$correo','$res')";
       if ($conexion->query($sqlPriv)){
         ob_start();
         header('Location: editInfo.php');
         ob_end_flush();
         die();
       }

     } else {

       $sqlPriv="UPDATE privacidad SET resp='$res' WHERE correo_tutor='$correo'";
       if ($conexion->query($sqlPriv)){
         ob_start();
         header('Location: editInfo.php');
         ob_end_flush();
         die();
       }

     }

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

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">
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
          <li>
              <a href="index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver Reportes</p>
              </a>
          </li>
          <li>
              <a href="/assets/pages/llenarReportes.php">
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
          <li>
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
              <a href="/assets/pages/verProgresoMaestro.php">
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
          <li>
            <a href="index.php">
              <i class="pe-7s-hourglass"></i>
              <p>Registrar horas</p>
            </a>
          </li>

          <li>
            <a href="/assets/pages/verProgreso.php">
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
                <div class="row">

                  <div class="col-md-12">
                      <div class="card">

                          <div class="header">
                              <h4 class="title">Aviso de privacidad</h4>
                              <p class="category">Lee y acepta el aviso de privacidad</p>
                          </div>
                          <hr>
                          <div class="content">
                            <p style="text-align:justify">
                              <b>DESARROLLO Y FORMACIÓN PARA EL MENOR OLIVO A.C.</b> con domicilio en <b>Hidalgo No. 316 Nte., Colonia Centro, San Pedro Garza García, Nuevo León, C. P. 66230</b>, es el responsable del uso y protección de sus datos personales, y al respecto le informamos lo siguiente:
                              <br><br>Los datos personales que recabamos de usted, los utilizaremos para ingresarlos al expediente de su hijo que es necesario al momento de ingresar a nuestro Centro de Educación Inicial.
                              <br><br>De manera adicional, utilizaremos su información personal para solicitar donativos en instancias Públicas y Privadas que nos permiten y facilitan brindarle una mejor atención
                              <br><br>En caso de que no desee que sus datos personales sean tratados para estos fines adicionales, desde este momento usted nos puede comunicar lo anterior presionando el botón de no acepto. La negativa para el uso de sus datos personales para estas finalidades no podrá ser un motivo para que le neguemos los servicios y productos que solicita o contrata con nosotros.
                              <br><br>Para llevar a cabo las finalidades descritas en el presente aviso de privacidad, utilizaremos los siguientes datos personales: <b>Del menor: nombre, edad, colonia, y de los padre: Nombre, Edad, Estado Civil, Ocupación, Colonia.</b> Si usted no manifiesta su negativa para dichas transferencias, entenderemos que nos autoriza compartirlos
                              <br><br>Usted tiene derecho a conocer qué datos personales tenemos de usted, para qué los utilizamos y las condiciones del uso que les damos (Acceso). Asimismo, es su derecho solicitar la corrección de su información personal en caso de que esté desactualizada, sea inexacta o incompleta (Rectificación); que la eliminemos de nuestros registros o bases de datos cuando considere que la misma no está siendo utilizada conforme a los principios, deberes y obligaciones previstas en la normativa (Cancelación); así como oponerse al uso de sus datos personales para fines específicos (Oposición). Estos derechos se conocen como derechos ARCO.
                              <br><br>Para el ejercicio de cualquiera de los derechos ARCO, usted deberá presentar la solicitud respectiva a través del correo electrónico soportedyfomoac@gmail.com Para conocer el procedimiento y requisitos para el ejercicio de los derechos ARCO, usted podrá llamar al siguiente número telefónico 8183 364328; ingresar a nuestro sitio de Internet www.dyfomoac.com, o bien ponerse en contacto con nuestro Departamento de Privacidad, que dará trámite a las solicitudes para el ejercicio de estos derechos, y atenderá cualquier duda que pudiera tener respecto al tratamiento de su información.
                              <br><br>Usted puede revocar el consentimiento que, en su caso, nos haya otorgado para el tratamiento de sus datos personales. Sin embargo, es importante que tenga en cuenta que no en todos los casos podremos atender su solicitud o concluir el uso de forma inmediata, ya que es posible que por alguna obligación legal requiramos seguir tratando sus datos personales. Asimismo, usted deberá considerar que para ciertos fines, la revocación de su consentimiento implicará que no le podamos seguir prestando el servicio que nos solicitó, o la conclusión de su relación con nosotros.
                              <br><br>Para revocar su consentimiento deberá presentar su solicitud a través de un escrito libre enviando un correo electrónico a la dirección soportedyfomoac@gmail.com Para conocer el procedimiento y requisitos para la revocación del consentimiento, usted podrá llamar al siguiente número telefónico 8183 364328;  ingresar a nuestro sitio de Internet www.dyfomoac.com, o bien ponerse en contacto con nuestro Departamento de Privacidad.
                              <br><br>Con objeto de que usted pueda limitar el uso y divulgación de su información personal, le ofrecemos los siguientes medios:
                              <br><br>•	Su inscripción en el Registro Público para Evitar Publicidad, que está a cargo de la Procuraduría Federal del Consumidor, con la finalidad de que sus datos personales no sean utilizados para recibir publicidad o promociones de empresas de bienes o servicios. Para mayor información sobre este registro, usted puede consultar el portal de Internet de la PROFECO, o bien ponerse en contacto directo con ésta.
                              <br><br>•	Su registro en el listado de exclusión “[divulgación datos personales]”, a fin de que sus datos personales no sean tratados para fines mercadotécnicos, publicitarios o de prospección comercial por nuestra parte. Para mayor información llamar al número telefónico 8183 364328, enviar un correo electrónico a la siguiente dirección soportedyfomoac@gmail.com, o bien, consultar nuestra página de Internet www.dyfomoac.com.
                              <br><br>Le informamos que en nuestra página de Internet utilizamos cookies, web beacons y otras tecnologías a través de las cuales es posible monitorear su comportamiento como usuario de Internet, así como brindarle un mejor servicio y experiencia de usuario al navegar en nuestra página.
                              <br><br>Nos comprometemos a mantenerlo informado sobre los cambios que pueda sufrir el presente aviso de privacidad, a través del apartado aviso de privacidad que se encuentra en la dirección electrónica www.dyfomoac.com.
                            </p>
                            <br><p style="text-align:justify">Última actualización <b>[05/09/2019]</b></p>
                          <hr>
                          <form method="post">
                            <input type="hidden" name="info" value="0"/>
                            <button type="submit" class="btn pull-left">Rechazo</button>
                          </form>
                          <form method="post">
                            <input type="hidden" name="info" value="1"/>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Acepto</button>
                          </form>
                          <div class="clearfix"></div>
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
  <script src="assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

  <!--  Notifications Plugin    -->
  <script src="assets/js/bootstrap-notify.js"></script>

  <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>

</html>
