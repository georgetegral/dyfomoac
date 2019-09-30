<!doctype html>

<?php
   include('../../session.php');
   date_default_timezone_set("America/Monterrey");
   //Lista de maestras
   $sqlM="SELECT nombre,apellido,correo FROM usuarios WHERE tipo='2' AND nombre !='' AND apellido !=''";
   $resultM = $conexion->query($sqlM);
   $resM = array();
   while($tupla = mysqli_fetch_array($resultM, MYSQLI_ASSOC) ){
     $resM[] = $tupla;
   }

   //tupla de lista de grupo
   $sqlG = "SELECT etapa,id,nombre,apellido,correo FROM grupo,usuarios WHERE correo_maestro=correo ORDER BY etapa";
   $resultG = $conexion->query($sqlG);
   $resG = array();
   while($tupla = mysqli_fetch_array($resultG, MYSQLI_ASSOC) ){
     $resG[] = $tupla;
   }

   //Tupla de correos de padres de Familia
   $sqlP = "SELECT t.correo_tutor, u.nombre AS pnombre, u.apellido AS papellido, m.nombre, m.apellido FROM usuarios AS u, tutor AS t, dependientes AS d, menor AS m WHERE
   t.correo_tutor=u.correo AND t.correo_tutor=d.correo_tutor AND d.id_menor=m.id AND t.activo='1'";
   $resultP = $conexion->query($sqlP);
   $resP = array();
   while($tupla = mysqli_fetch_array($resultP, MYSQLI_ASSOC) ){
     $resP[] = $tupla;
   }

   //Tupla de padres de familia no activos aún
   $sqlB = "SELECT correo AS correo_tutor FROM usuarios WHERE tipo='3' AND nombre='' AND apellido=''";
   $resultB = $conexion->query($sqlB);
   $resB = array();
   while($tupla = mysqli_fetch_array($resultB, MYSQLI_ASSOC) ){
     $resB[] = $tupla;
   }

?>

<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $info=$_POST["info"];

  //Crear el código aleatorio
  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123S456789";
  $string = "";
  for($i=0;$i<6;$i++)
    $string.=substr($chars,rand(0,strlen($chars)),1);

  if($info=="poliza"){
    $newp=$_POST["poliza"];

    $sqlPol = "UPDATE poliza SET poliza = '$newp' ";

    if ($conexion->query($sqlPol)) {
      $avisos["veriPol"] = "Información guardada exitosamente.<br><br>";

      /*
      echo '<script language="javascript">';
      echo 'alert("Número de póliza actualizado correctamente.")';
      echo '</script>';
      */

      header('Location: '.$_SERVER['REQUEST_URI']);
      exit;
    } else {
      $avisos["errPol"] = "Error. Intentar de nuevo.<br><br>";
    }

  }

  if($info=="newMenor"){
    $mailP=$_POST["mailPapa"];
    $mailM=$_POST["mailMama"];
    $nom=$_POST["nomMenor"];
    $ape=$_POST["apeMenor"];

    //Segundo codigo
      $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mailP' OR correo='$mailM'")
      or die ("Error en la consulta:".mysql_error());
      $tupla = mysqli_fetch_array ($consulta);

      if(empty($tupla)){

            $sql = "INSERT INTO usuarios (correo, codigo, tipo) VALUES ('$mailP','$string',3),('$mailM','$string',3)";
            $sql2 = "INSERT INTO tutor (correo_tutor, activo) VALUES ('$mailP','0'),('$mailM','0')";
            $sql3 = "INSERT INTO menor (nombre, apellido) VALUES ('$nom','$ape')";
            if ($conexion->query($sql) && $conexion->query($sql2) && $conexion->query($sql3)) {
              /*
              if (!mysqli_query($conexion,$sql2)){
                echo("Error description: " . mysqli_error($conexion));
              }

              if (!mysqli_query($conexion,$sql3)){
                echo("Error description: " . mysqli_error($conexion));
              }
              */
              $consulta = mysqli_query ($conexion,"SELECT id FROM menor WHERE nombre='$nom' AND apellido='$ape'")
              or die ("Error en la consulta:".mysql_error());
              $tupla = mysqli_fetch_array ($consulta);
              $id=$tupla["id"];

              if(!empty($tupla)){
                $sql = "INSERT INTO dependientes (correo_tutor,id_menor) VALUES ('$mailP','$id'),('$mailM','$id')";
                if ($conexion->query($sql)) {

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
                  $mail->addAddress($mailP);
                  $mail->addAddress($mailM);
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
                      $avisos["errAltaMenor"] = 'Mailer Error: ' . $mail->ErrorInfo;
                      ?>
                      <script>
                      if ( window.history.replaceState ) {
                        window.history.replaceState( null, null, window.location.href );
                      }
                      </script>
                      <?php
                  } else {
                    $avisos["veriAltaMenor"] = "Se ha dado de alta al menor exitosamente y se le ha enviado un correo a sus padres.";
                    ?>
                    <script>
                    if ( window.history.replaceState ) {
                      window.history.replaceState( null, null, window.location.href );
                    }
                    </script>
                    <?php
                  }

                } else {
                  $avisos["errAltaMenor"] = "Error 3. Hubo un problema con la base de datos.<br>";
                  ?>
                  <script>
                  if ( window.history.replaceState ) {
                    window.history.replaceState( null, null, window.location.href );
                  }
                  </script>
                  <?php
                }

              } else {
                $avisos["errAltaMenor"] = "Error 2. Hubo un problema con la base de datos.<br>";
                ?>
                <script>
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }
                </script>
                <?php
              }

            } else {
              $avisos["errAltaMenor"] = "Error. Los correos del papá y la mamá deben de ser diferentes para dar de alta a un menor.<br>";
              ?>
              <script>
              if ( window.history.replaceState ) {
                window.history.replaceState( null, null, window.location.href );
              }
              </script>
              <?php
            }

      } else {
        $avisos["errAltaMenor"] = "Error. Ya existe un usuario con este correo registrado, favor de elegir la otra opción.<br>";
        ?>
        <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <?php
      }

  }

  //Mandar codigo de nuevo
  if($info=="codeTutor"){
    $mag=$_POST["mailAgain"];

    //Checar usuario existente y mandar el código
    $query = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mag'")
    or die ("Error en la consulta:".mysql_error());
    $tupla = mysqli_fetch_array ($query);
    if(empty($tupla)){
      $avisos["errCode"] = "Este correo no se encuentra registrado, favor de regístrarlo primero.<br>";
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
      $mail->addAddress($mag);     // Add a recipient. This is recipient.
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
        $avisos["errCode"] = 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
          $sql = "UPDATE usuarios SET codigo = '$string' WHERE correo='$mag'";
          if ($conexion->query($sql)) {
            $avisos["veriCode"] = "Se ha cambiado el código de verificación del padre de familia exitosamente y se le ha enviado un correo.";
            ?>
            <script>
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
            </script>
            <?php
          } else {
            $avisos["err"] = "Error. Hubo un problema con la base de datos.<br>";
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

  }

  if($info=="newGroup"){
    $etapa=$_POST["etapa"];
    $maestra=$_POST["maestra"];
    $sql = "INSERT INTO grupo (correo_maestro, etapa) VALUES ('$maestra','$etapa')";

    if (!mysqli_query($conexion,$sql)){
      $avisos["errCrear"] = "Error description: " . mysqli_error($conexion);
      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
    } else {
      ?>
      <script>
      alert("Se ha creado exitosamente un nuevo grupo.");
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
      header('Location: '.$_SERVER['REQUEST_URI']);
      exit;
    }
  }

  if($info=="msjTodos"){
    $text=$_POST["msj"];
    $id=$_POST["idGrupo"];
    $sqlC = "SELECT d.correo_tutor FROM dependientes AS d, menor AS m WHERE d.id_menor = m.id AND m.id_grupo='$id'";
    $resultC = $conexion->query($sqlC);
    $resC = array();
    while($tupla = mysqli_fetch_array($resultC, MYSQLI_ASSOC) ){
      $resC[] = $tupla;
    }
    if(!empty($resC)){

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
      foreach ($resC as $tupla){
        $mail->addAddress($tupla["correo_tutor"]);
      }

      //$mail->addAddress('sonusantoshkr@gmail.com');               // Name is optional
      //$mail->addReplyTo('sonusantoshkr@gmail.com', 'Information');
      //$mail->addBCC('sonusantoshkr@gmail.com');
      //$mail->addBCC('sonusantoshkr@gmail.com','sonu');

      //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
      //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      $mail->isHTML(true);                                  // Set email format to HTML

      $mail->Subject = 'Mensaje sobre tu hijo';
      $mail->Body    = $text.'<br>Ingresa a https://dyfomoac.com para entrar al nuevo sistema de administración del DyFOMOAC';
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

      if(!$mail->send()) {
        $avisos["err"] = 'Mailer Error: ' . $mail->ErrorInfo;
        ?>
        <script>
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <?php
      } else {
        ?>
        <script>
        alert("Mensaje enviado correctamente.");
        if ( window.history.replaceState ) {
          window.history.replaceState( null, null, window.location.href );
        }
        </script>
        <?php
      }

    } else {
      ?>
      <script>
      alert("No hay menores inscritos en este grupo.");
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php

    }


  }

  if($info=="priv"){
    $text=$_POST["msjPriv"];
    $mailPriv=$_POST["mailPriv"];

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
    $mail->addAddress($mailPriv);

    //$mail->addAddress('sonusantoshkr@gmail.com');               // Name is optional
    //$mail->addReplyTo('sonusantoshkr@gmail.com', 'Information');
    //$mail->addBCC('sonusantoshkr@gmail.com');
    //$mail->addBCC('sonusantoshkr@gmail.com','sonu');

    //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    $mail->isHTML(true);                                  // Set email format to HTML

    $mail->Subject = 'Mensaje sobre tu hijo';
    $mail->Body    = $text.'<br>Ingresa a https://dyfomoac.com para entrar al nuevo sistema de administración del DyFOMOAC';
    $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

    if(!$mail->send()) {
      $avisos["errPriv"] = 'Mailer Error: ' . $mail->ErrorInfo;
    } else {
      $avisos["veriPriv"] = 'Mensaje enviado correctamente';
      ?>
      <script>
      if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
      }
      </script>
      <?php
    }

  }

  if($info=="deleteMail"){
    $md=$_POST["mailDelete"];
    $sql1="DELETE FROM dependientes WHERE correo_tutor='$md'";
    $sql2="DELETE FROM tutor WHERE correo_tutor='$md'";
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
          alert("Correo eliminado correctamente.");
          if ( window.history.replaceState ) {
            window.history.replaceState( null, null, window.location.href );
          }
          </script>
          <?php
          header('Location: '.$_SERVER['PHP_SELF']);
        }
      }
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
                                <h4 class="title">Grupos Activos</h4>
                                <p class="category">Ve y edita los datos de cada grupo. También puedes mandar un mensaje a todos los padres de cierto grupo. </p>
                            </div>
                            <hr>
                            <div class="content">

                                <div class="content table-responsive table-full-width">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                          <th>Etapa</th>
                                          <th>Maestra encargada</th>
                                          <th>Editar</th>
                                          <th>Mensaje para padres</th>
                                          <th>Enviar mensaje</th>
                                        </thead>

                                        <tbody>
                                          <?php
                                          include("../../config.php");
                                          //resG y resN
                                            foreach ($resG as $tupla){
                                              ?>
                                              <tr>
                                              <td><?php echo $tupla["etapa"]; ?></td>
                                              <td><?php echo $tupla["nombre"]." ".$tupla["apellido"]; ?></td>
                                              <td>
                                                <form action="gruposEditar.php" method="GET">
                                                  <button type="submit" class="btn btn-info btn-fill" name="id" value="<?php echo $tupla["id"]; ?>">Editar</button>
                                                </form>
                                              </td>

                                              <form method="POST">
                                                <td>
                                                  <div class="form-group">
                                                      <input type="text" class="form-control" placeholder="Mensaje" name="msj" required>
                                                  </div>
                                                </td>
                                              <td>
                                                <input type="hidden" name="info" value="msjTodos" />
                                                <input type="hidden" name="idGrupo" value="<?php echo $tupla["id"]; ?>" />
                                                <button type="submit" class="btn btn-info btn-fill">Enviar</button>
                                              </td>
                                              </form>

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

                    <div class="col-md-4">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Mandar mensaje a un padre en específico</h4>
                                <p class="category">Mándale un mensaje directo a un padre de algún menor.</p>
                            </div>
                            <hr>
                            <div class="content">

                              <form method="post">
                                <input type="hidden" name="info" value="priv" />
                                <div class="form-group">
                                    <label>Mensaje</label>
                                    <input type="text" class="form-control" placeholder="Mensaje" name="msjPriv" required>
                                </div>
                                <div class="form-group">
                                    <label>Correo Electrónico</label>
                                    <select class="form-control" name="mailPriv" required>
                                      <option value="" disabled selected>Elige un padre de familia</option>
                                      <?php
                                        foreach ($resP as $tp){
                                          ?>
                                          <option value=<?php echo $tp["correo_tutor"]; ?>><?php echo $tp["pnombre"]." ".$tp["papellido"]." - su hijo: ".$tp["nombre"]; ?></option>
                                          <?php
                                        }
                                      ?>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-info btn-fill pull-right">Enviar</button>
                                <font color="red"> <?php echo @$avisos["errPriv"]?></font>
                                <font color="green"> <?php echo @$avisos["veriPriv"]?></font>
                                <div class="clearfix"></div>
                              </form>

                            </div>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">

                          <div class="header">
                              <h4 class="title">Crear nuevo grupo</h4>

                          </div>
                          <hr>
                          <div class="content">
                            <form method="post">
                            <div class="row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label>Etapa</label>
                                        <input type="text" class="form-control" name="etapa" required>
                                    </div>

                                </div>
                                <div class="col-md-7">
                                    <div class="form-group">
                                        <label>Maestra asignada</label>
                                        <select class="form-control" name="maestra" required>
                                          <option value="" disabled selected>Elige una maestra</option>
                                          <?php
                                            foreach ($resM as $tupla){
                                              ?>
                                              <option value=<?php echo $tupla["correo"]; ?>><?php echo $tupla["nombre"]." ".$tupla["apellido"]; ?></option>
                                              <?php
                                            }
                                          ?>
                                        </select>
                                    </div>
                                </div>

                                <input type="hidden" name="info" value="newGroup" />
                            </div>
                            <button type="submit" class="btn btn-info btn-fill pull-right">Crear</button>
                            <font color="red"> <?php echo @$avisos["errCrear"]?></font>
                            <font color="green"> <?php echo @$avisos["veriCrear"]?></font>
                            <div class="clearfix"></div>
                          </form>
                          </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card">

                      <div class="header">
                          <h4 class="title">Actualizar n. de poliza del Seguro de Gastos Médicos</h4>

                      </div>
                      <hr>

                      <?php
                        $sqlF=mysqli_query($conexion,"SELECT poliza FROM poliza");
                        $pol = mysqli_fetch_array($sqlF,MYSQLI_ASSOC);
                      ?>

                      <div class="content">
                        <form method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Número de poliza</label>
                                    <input type="text" class="form-control" name="poliza" value="<?php echo $pol['poliza']?>" required>
                                </div>

                            </div>


                            <input type="hidden" name="info" value="poliza" />
                        </div>
                        <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar</button>
                        <font color="red"> <?php echo @$avisos["errPol"]?></font>
                        <font color="green"> <?php echo @$avisos["veriPol"]?></font>
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
