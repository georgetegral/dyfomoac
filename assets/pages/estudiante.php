<!doctype html>

<?php
   include('../../session.php');
   date_default_timezone_set("America/Monterrey");
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
                    <div class="col-md-8">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Estudiantes registrados activos</h4>
                                <p class="category">Ve y edita las horas registradas de cada estudiante de servicio social. </p>
                            </div>
                            <hr>
                            <div class="content">

                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">

                                        <thead>
                                          <th>Nombre</th>
                                          <th>Carrera</th>
                                          <th>Celular</th>
                                          <th>Horas Realizadas</th>
                                          <th>Editar</th>
                                        </thead>

                                        <tbody>

                                          <?php
                                          include("../../config.php");
                                          //Estudiantes Activos y Registrados

                                            $queryE = "SELECT * FROM estudiantes WHERE activo = '1'";
                                            $resultE = $conexion->query($queryE);
                                            $queryU = "SELECT nombre,apellido FROM usuarios, estudiantes WHERE correo = est_correo AND tipo = '4' AND nombre != '' AND matricula !='' AND activo= '1'";
                                            $resultU = $conexion->query($queryU);

                                            $res = array();
                                            $res2 = array();

                                            while($tupla = mysqli_fetch_array($resultE, MYSQLI_ASSOC) ){
                                              $res[] = $tupla;
                                            }

                                            while($tupla2 = mysqli_fetch_array($resultU, MYSQLI_ASSOC) ){
                                              $res2[] = $tupla2["nombre"]." ".$tupla2["apellido"];
                                            }

                                            $resHor = array();

                                            //Calcular horas de cada estudiante
                                            $horasEstQuery= "SELECT hor_correo,cant FROM horas";
                                            $resultEstHor = $conexion->query($horasEstQuery);

                                            while($tupla = mysqli_fetch_array($resultEstHor, MYSQLI_ASSOC) ){
                                              $resHor[] = $tupla;
                                            }

                                            $rf = array();
                                            foreach ($resHor as $tupla){
                                              $num = (int)$tupla['cant'];
                                              if(array_key_exists( $tupla["hor_correo"] , $rf )){
                                                $rf[$tupla['hor_correo']]+=$num;
                                              } else {
                                                $rf[$tupla['hor_correo']]=$num;
                                              }
                                            }

                                            $acum=0;
                                            $listaCor = array();
                                            foreach ($res as $tupla){
                                              if( !($tupla["matricula"] == "" && $tuplaE["celular"] == "" && $tuplaE["carrera"] == "" && $tuplaE["sgmm"] == "" &&
                                              $tuplaE["nombre_tutor"] == "" && $tuplaE["apellido_tutor"] == "" && $tuplaE["tel_tutor_1"] == "" && $tuplaE["tel_tutor_2"] == "") ) {
                                              $listaCor[$acum]=$tupla["est_correo"];
                                              ?>
                                              <tr>

                                              <td><?php echo $res2[$acum]; ?></td>
                                              <td><?php echo $tupla["carrera"]; ?></td>
                                              <td><?php echo $tupla["celular"]; ?></td>
                                              <td>
                                                <?php
                                                if(array_key_exists( $tupla["est_correo"] , $rf )){
                                                  $num = $rf[$tupla["est_correo"]];
                                                  if($num % 60 == 0){
                                                    $num = $num/60;
                                                    echo $num;
                                                  } else {
                                                    $num = $num/60;
                                                    echo number_format((float)$num, 2, '.', '');
                                                  }
                                                } else {
                                                  echo "0";
                                                }
                                                ?>
                                              </td>
                                              <td>
                                                <form id="editB" action="estudianteEditar.php" method="GET">
                                                  <button type="submit" class="btn btn-info btn-fill" name="mail" value="<?php echo $tupla["est_correo"]; ?>">Editar</button>
                                                </form>
                                              </td>

                                              </tr>
                                                <?php
                                                $acum++;
                                              }
                                            }

                                          ?>
                                        </tbody>

                                    </table>

                                </div>


                            </div>
                        </div>
                    </div>

                    <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                      include("../../config.php");
                      $mailPost=$_POST["mail"];
                      $option=$_POST['option'];
                      $info=$_POST["info"];

                      if($info=="newStu"){
                        //Crear el código aleatorio
                        $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123S456789";
                        $string = "";
                        for($i=0;$i<6;$i++)
                          $string.=substr($chars,rand(0,strlen($chars)),1);

                        if($option=="op1"){
                          //Agregar nuevo usuario

                          $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mailPost'")
                          or die ("Error en la consulta:".mysql_error());
                          $tupla = mysqli_fetch_array ($consulta);

                          if(empty($tupla)){

                            require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
                            $mail = new PHPMailer;
                            $mail->CharSet = 'UTF-8';
                            $mail->SMTPDebug = 0;                               // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'soportedyfomoac@gmail.com';                 // set youe email id
                            $mail->Password = 'Ab1234cd';                           // write password of the above email id
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            $mail->setFrom('soportedyfomoac@gmail.com', 'DyFOMOAC');
                            $mail->addAddress($mailPost);     // Add a recipient. This is recipient.
                            //$mail->addAddress('sonusantoshkr@gmail.com');               // Name is optional
                            //$mail->addReplyTo('sonusantoshkr@gmail.com', 'Information');
                            //$mail->addBCC('sonusantoshkr@gmail.com');
                            //$mail->addBCC('sonusantoshkr@gmail.com','sonu');

                            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = 'Código de verificación DyFOMOAC';
                            $mail->Body    = 'Tu código de verificación es: '. $string.'<br>Ingresa a https://dyfomoac.com para entrar al nuevo sistema de administración del DyFOMOAC';
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            if(!$mail->send()) {
                                $avisos["err"] = 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                                $avisos["veri"] = "Se ha dado de alta al estudiante exitosamente y se le ha enviado un correo.";

                                $sql = "INSERT INTO usuarios (correo, codigo, tipo) VALUES ('$mailPost','$string',4)";
                                $sql2 = "INSERT INTO estudiantes (est_correo, activo) VALUES ('$mailPost','0')";
                                if ($conexion->query($sql) && $conexion->query($sql2)) {

                                } else {
                                  $avisos["err"] = "Error. Hubo un problema con la base de datos.<br>";
                                }

                            }

                          } else {
                            $avisos["err"] = "Error. Ya existe un usuario con este correo registrado, favor de elegir la otra opción.<br>";
                          }

                        } else if ($option=="op2"){
                          //Checar usuario existente y mandar el código
                          $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mailPost'")
                          or die ("Error en la consulta:".mysql_error());
                          $tupla = mysqli_fetch_array ($consulta);

                          if(empty($tupla)){
                            $avisos["err"] = "Este correo no se encuentra registrado, favor de regístrarlo primero.<br>";
                          } else {

                            require '../PHPMailer-5.2-stable/PHPMailerAutoload.php';
                            $mail = new PHPMailer;
                            $mail->CharSet = 'UTF-8';
                            $mail->SMTPDebug = 0;                               // Enable verbose debug output
                            $mail->isSMTP();                                      // Set mailer to use SMTP
                            $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                            $mail->SMTPAuth = true;                               // Enable SMTP authentication
                            $mail->Username = 'soportedyfomoac@gmail.com';                 // set youe email id
                            $mail->Password = 'Ab1234cd';                           // write password of the above email id
                            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
                            $mail->Port = 587;                                    // TCP port to connect to

                            $mail->setFrom('soportedyfomoac@gmail.com', 'DyFOMOAC');
                            $mail->addAddress($mailPost);     // Add a recipient. This is recipient.
                            //$mail->addAddress('sonusantoshkr@gmail.com');               // Name is optional
                            //$mail->addReplyTo('sonusantoshkr@gmail.com', 'Information');
                            //$mail->addBCC('sonusantoshkr@gmail.com');
                            //$mail->addBCC('sonusantoshkr@gmail.com','sonu');

                            //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
                            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
                            $mail->isHTML(true);                                  // Set email format to HTML

                            $mail->Subject = 'Código de verificación DyFOMOAC';
                            $mail->Body    = 'Tu nuevo código de verificación es: '. $string.'<br>Ingresa a https://dyfomoac.com para entrar al nuevo sistema de administración del DyFOMOAC';
                            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                            if(!$mail->send()) {
                              $avisos["err"] = 'Mailer Error: ' . $mail->ErrorInfo;
                            } else {
                                $avisos["veri"] = "Se ha cambiado el código de verificación del estudiante exitosamente y se le ha enviado un correo.";

                                $sql = "UPDATE usuarios SET codigo = '$string' WHERE correo='$mailPost'";
                                if ($conexion->query($sql)) {

                                } else {
                                  $avisos["err"] = "Error. Hubo un problema con la base de datos.<br>";
                                }

                            }

                          }

                        }

                      }

                    }

                    ?>

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Agregar Estudiante</h4>
                                <p class="category">Manda un correo con un código de verificación a un nuevo estudiante que realizará su servicio social.</p>
                            </div>
                            <hr>
                            <div class="content">

                              <form method="post" id="newStudent">
                                <input type="hidden" name="info" value="newStu" />
                                <input type="radio" name="option" value="op1" checked> Enviar un nuevo código<br>
                                <input type="radio" name="option" value="op2"> Reenviar otro código<br><br>

                                <div class="form-group">
                                    <label>Correo Electrónico</label>
                                    <input type="text" class="form-control" placeholder="Correo Electrónico" name="mail" required>
                                </div>
                                <font color="red"> <?php echo @$avisos["err"]?></font>
                                <font color="green"> <?php echo @$avisos["veri"]?></font>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Enviar</button>
                                <div class="clearfix"></div>
                              </form>

                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                          <div class="header">
                              <h4 class="title">Estudiantes no activos</h4>
                              <p class="category">Estos estudiantes terminaron o se dieron de baja del servicio social. </p>
                          </div>
                          <hr>
                          <div class="content">
                            <div class="content table-responsive table-full-width">
                                <table class="table table-hover table-striped">

                                    <thead>
                                      <th>Nombre</th>
                                      <th>Carrera</th>
                                      <th>Celular</th>
                                      <th>Horas Realizadas</th>
                                      <th>Editar</th>
                                    </thead>
                                    <tbody>
                                      <?php
                                      include("../../config.php");
                                      //Estudiantes Activos y Registrados

                                        $queryE = "SELECT * FROM estudiantes WHERE activo = '0'";
                                        $resultE = $conexion->query($queryE);
                                        $queryU = "SELECT nombre,apellido FROM usuarios, estudiantes WHERE correo = est_correo AND tipo = '4' AND nombre != '' AND matricula !='' AND activo= '0'";
                                        $resultU = $conexion->query($queryU);

                                        $res = array();
                                        $res2 = array();

                                        while($tupla = mysqli_fetch_array($resultE, MYSQLI_ASSOC) ){
                                          $res[] = $tupla;
                                        }

                                        while($tupla2 = mysqli_fetch_array($resultU, MYSQLI_ASSOC) ){
                                          $res2[] = $tupla2["nombre"]." ".$tupla2["apellido"];
                                        }

                                        $resHor = array();

                                        //Calcular horas de cada estudiante
                                        $horasEstQuery= "SELECT hor_correo,cant FROM horas";
                                        $resultEstHor = $conexion->query($horasEstQuery);

                                        while($tupla = mysqli_fetch_array($resultEstHor, MYSQLI_ASSOC) ){
                                          $resHor[] = $tupla;
                                        }

                                        $rf = array();
                                        foreach ($resHor as $tupla){
                                          $num = (int)$tupla['cant'];
                                          if(array_key_exists( $tupla["hor_correo"] , $rf )){
                                            $rf[$tupla['hor_correo']]+=$num;
                                          } else {
                                            $rf[$tupla['hor_correo']]=$num;
                                          }
                                        }

                                        $acum=0;
                                        $listaCor = array();
                                        foreach ($res as $tupla){
                                          if( !($tupla["matricula"] == "") ) {
                                          $listaCor[$acum]=$tupla["est_correo"];
                                          ?>
                                          <tr>

                                          <td><?php echo $res2[$acum]; ?></td>
                                          <td><?php echo $tupla["carrera"]; ?></td>
                                          <td><?php echo $tupla["celular"]; ?></td>
                                          <td>
                                            <?php
                                            if(array_key_exists( $tupla["est_correo"] , $rf )){
                                              $num = $rf[$tupla["est_correo"]];
                                              if($num % 60 == 0){
                                                $num = $num/60;
                                                echo $num;
                                              } else {
                                                $num = $num/60;
                                                echo number_format((float)$num, 2, '.', '');
                                              }
                                            } else {
                                              echo "0";
                                            }
                                            ?>
                                          </td>
                                          <td>
                                            <form id="editB" action="estudianteEditar.php" method="GET">
                                              <button type="submit" class="btn btn-info btn-fill" name="mail" value="<?php echo $tupla["est_correo"]; ?>">Editar</button>
                                            </form>
                                          </td>

                                          </tr>
                                            <?php
                                            $acum++;
                                          }
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
