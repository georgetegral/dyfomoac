<!DOCTYPE html>
<html lang="es">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="assets/img/Logo.jpg">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>DyFOMOAC | Inicio de Sesión</title>

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
                    <h2 class="title">Inicio de Sesión</h2>

                    <?php
                    date_default_timezone_set("America/Monterrey");
                    include("config.php");
                    session_start();

                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                      $mail=$_POST["mail"];
                      $pass=$_POST["pass"];

                      $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mail' AND contrasena='$pass'")
                      or die ("Error en la consulta:".mysql_error());
                      $tupla = mysqli_fetch_array ($consulta);

                      if(empty($tupla)){
                        $avisos["err"] = "El correo electrónico o la contraseña es incorrecto, favor de intentar de nuevo.<br><br>";
                      } else {

                        $_SESSION['login_user'] = $mail;

                        header("location: index.php");
                      }
                    }

                    ?>

                    <form method="POST">
                      <div class="input-group">
                          <input class="input--style-2" type="text" placeholder="Correo Electrónico" name="mail" required>
                      </div>

                      <div class="input-group">
                          <input class="input--style-2" type="password" placeholder="Contraseña" name="pass" required>
                      </div>
                      <font color="red"> <?php echo @$avisos["err"]?></font>
                      <div class="p-t-30">
                          <button class="btn btn--radius btn--green" type="submit">Inicia sesión</button>
                      </div>
                      <br><br>
                      <h4 class="titleNoMarginLowercase">¿No tienes cuenta? <a class="titleNoMarginLowercase" href="register.php">Regístrate</a></h4>
                      <h4 class="titleNoMarginLowercase">¿Olvidaste tu contraseña? <a class="titleNoMarginLowercase" href="recoverPass.php">Recupérala</a></h4>
                    </form>
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
