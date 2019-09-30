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
    <title>DyFOMOAC | Registro</title>

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
                    <h2 class="title">Registro</h2>
                    <h4>*Si eres padre de familia, ingresa tus datos personales.<h4><br>
                    <?php
                    //nom, ape, mail, pass, pass2, code, fnac
                    date_default_timezone_set("America/Monterrey");
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                      include("config.php");
                      session_start();
                      $validador=true;

                      if(strlen(trim($_POST["pass"]))>80){
                        $avisos["errPass"] = "Ingresa una contraseña menor a 80 caracteres.<br><br>";
                        $validador=false;
                      }
                      if(trim($_POST["pass"])!=trim($_POST["pass2"])){
                        $avisos["errPass2"] = "Las contraseñas no coinciden.<br><br>";
                        $validador=false;
                      }

                      $mailBD=$_POST["mail"];
                      $codigoI=$_POST["code"];
                      //Checa que el mail esté dado de alta
                      $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE correo='$mailBD'")
                      or die ("Error en la consulta:".mysql_error());
                      $tupla = mysqli_fetch_array ($consulta);
                      if(empty($tupla)){
                        $avisos["errMail"] = "Este correo no está dado de alta, favor de intentar con otro correo o comunicarse con el administrador en caso de haber un error.<br><br>";
                        $validador=false;
                      } else {
                        // Checa que los códigos de verificación coincidan
                        $consulta = mysqli_query ($conexion,"SELECT * FROM usuarios WHERE codigo='$codigoI' AND correo='$mailBD'")
                        or die ("Error en la consulta:".mysql_error());
                        $tupla = mysqli_fetch_array ($consulta);
                        if(empty($tupla)){
                          $avisos["errCode"] = "El código de verificación es incorrecto, por favor intentar con otro o comunicarse con el administrador para pedir otro.<br><br>";
                          $validador=false;
                        } else {
                          if($tupla["contrasena"]!=""){
                            $avisos["veri"] = "Ya se ha registrado anteriormente, favor de ir a Iniciar Sesión para iniciar su sesión.";
                            $validador=false;
                          }
                        }
                      }



                      //Se añade contraseña, nombre, apellido y se modifica fecha de nacimiento, correo, código y tipo los llena el administrador
                      if($validador){
                        $passBD=$_POST["pass"];
                        $nombre=$_POST["nom"];
                        $apellido=$_POST["ape"];

                        //Convertir fecha a formato para SQL
                        $fecha=$_POST["fnac"];
                        $fs=explode("/",$fecha);
                        //dia-mes-año a año-mes-dia
                        $fecha=$fs[2].'-'.$fs[1].'-'.$fs[0];

                        $passHash = password_hash($passBD, PASSWORD_DEFAULT);
                        $sql = "UPDATE usuarios SET contrasena = '$passBD', nombre = '$nombre', apellido = '$apellido', fnac = '$fecha' WHERE correo='$mailBD'";
                        if ($conexion->query($sql)) {
                          $_SESSION['login_user'] = $mailBD;

                          header("location: index.php");

                          $avisos["veri"] = "Se ha registrado exitosamente.<br><br>";
                        } else {
                          $avisos["veri"] = "Error. Contacte al administrador<br><br>";
                        }
                      }

                    }
                    ?>

                    <form method="POST" id="form1">

                      <div class="input-group">
                          <input class="input--style-2" type="text" placeholder="Nombre(s)" name="nom" value="<?php echo @$_REQUEST["nom"] ?>" required>
                      </div>

                      <div class="input-group">
                          <input class="input--style-2" type="text" placeholder="Apellidos" name="ape" value="<?php echo @$_REQUEST["ape"] ?>" required>
                      </div>

                      <div class="input-group">
                          <input class="input--style-2" type="text" placeholder="Correo Electrónico" name="mail" value="<?php echo @$_REQUEST["mail"] ?>" required>
                      </div>
                      <font color="red"> <?php echo @$avisos["errMail"]?></font>

                      <div class="input-group">
                          <input class="input--style-2" type="password" placeholder="Contraseña" name="pass" required>
                      </div>
                      <font color="red"> <?php echo @$avisos["errPass"]?></font>

                      <div class="input-group">
                          <input class="input--style-2" type="password" placeholder="Verificar Contraseña" name="pass2" required>
                      </div>
                      <font color="red"> <?php echo @$avisos["errPass2"]?></font>

                      <div class="row row-space">

                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2 js-datepicker" type="text" placeholder="Fecha de Nacimiento" name="fnac" value="<?php echo @$_REQUEST["fnac"] ?>" readonly="readonly" required>
                                <i class="zmdi zmdi-calendar-note input-icon js-btn-calendar"></i>
                            </div>
                        </div>

                        <div class="col-2">
                            <div class="input-group">
                                <input class="input--style-2" type="text" placeholder="Código de Verificación" name="code" required>
                            </div>
                        </div>
                        <font color="red"> <?php echo @$avisos["errCode"]?></font>

                      </div>

                      <font color="red"> <?php echo @$avisos["veri"]?></font>
                      <div class="p-t-30">
                          <button class="btn btn--radius btn--green" type="submit">Regístrate</button>
                      </div>
                      <br><br>
                      <h4 class="titleNoMarginLowercase">¿Ya tienes cuenta? <a class="titleNoMarginLowercase" href="login.php">Inicia Sesión</a></h4>
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
