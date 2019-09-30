<!DOCTYPE html>
<html lang="es">
<?php
date_default_timezone_set("America/Monterrey");
if($_SERVER["REQUEST_METHOD"] == "POST"){
  include('config.php');
  $mailPost=$_POST["email"];

  $chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123S456789";
  $string = "";
  for($i=0;$i<6;$i++)
    $string.=substr($chars,rand(0,strlen($chars)),1);

  $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mailPost'")
  or die ("Error en la consulta:".mysql_error());
  $tupla = mysqli_fetch_array ($consulta);

  if(empty($tupla)){
    $avisos["err"] = "Error. No existe una cuenta con este correo electrónico. Intentalo de nuevo con otro.";
    ?>
    <script>
    if ( window.history.replaceState ) {
      window.history.replaceState( null, null, window.location.href );
    }
    </script>
    <?php
  } else {

    $consultaC = mysqli_query ($conexion,"SELECT nombre FROM usuarios WHERE correo='$mailPost'")
    or die ("Error en la consulta:".mysql_error());
    $check = mysqli_fetch_array ($consultaC);

    $reg=$check["nombre"];

    if($reg!=""){

      $sqlCont="UPDATE usuarios SET contrasena='$string' WHERE correo='$mailPost' ";
      if ($conexion->query($sqlCont)){
        require 'assets/PHPMailer-5.2-stable/PHPMailerAutoload.php';
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
        $mail->Body    = 'Tu nueva contraseña es: '. $string.'<br>Ingresa a https://dyfomoac.com para entrar al nuevo sistema de administración del DyFOMOAC';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
          $avisos["err"] = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            $avisos["veri"] = "Se te ha enviado un correo con una contraseña temporal, al iniciar sesión puedes cambiarla.";
            ?>
            <script>
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
            </script>
            <?php
        }
      }

    } else {
      $avisos["err"] = "Error. Debes de registrarte primero antes de cambiar tu contraseña.";
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
 ?>
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/Logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>DyFOMOAC | Recupera tu contraseña</title>

    <!-- Icons font CSS-->
    <link href="assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/css/login/main.css" rel="stylesheet" media="all">
</head>

<body>
    <div class="page-wrapper bg-green p-t-180 p-b-100 font-robo">
        <div class="wrapper wrapper--w960">
            <div class="card card-2">
                <div class="card-heading"></div>
                <div class="card-body">
                    <h2 class="title">Recupera tu contraseña</h2>

                    <form method="POST" >
                      <div class="input-group">
                          <input class="input--style-2" type="text" placeholder="Correo Electrónico" name="email" required>
                      </div>

                      <div class="p-t-30">
                          <button class="btn btn--radius btn--green" name="submit_email" type="submit">Enviar</button>
                      </div>
                    </form>
                      <br><br>
                      <font color="red"> <?php echo @$avisos["err"]?></font>
                      <font color="green"> <?php echo @$avisos["veri"]?></font>
                      <h4 class="titleNoMarginLowercase">¿Ya tienes cuenta? <a class="titleNoMarginLowercase" href="login.php">Inicia Sesión</a></h4>
                      <h4 class="titleNoMarginLowercase">¿No tienes cuenta? <a class="titleNoMarginLowercase" href="register.php">Regístrate</a></h4>

                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="assets/vendor/select2/select2.min.js"></script>
    <script src="assets/vendor/datepicker/moment.min.js"></script>
    <script src="assets/vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="assets/js/login/global.js"></script>

</body>

</html>
