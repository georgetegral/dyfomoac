<!doctype html>

<?php
  date_default_timezone_set("America/Monterrey");
   include('session.php');



   if($tipo=="1"){

   }

   if($tipo=="2"){

   }

   if($tipo=="3"){

     //Checar si ya se llenó el aviso de privacidad
     $sqlCheck=mysqli_query($conexion,"SELECT * FROM privacidad WHERE correo_tutor='$correo'");
     $check = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);

     //Checar si ya se llenó la carta responsiva

     $sqlEst=mysqli_query($conexion,"SELECT * FROM tutor WHERE correo_tutor = '$correo' ");
     $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);
     $celP=$info["celular"];
     $ocupacionP=$info["ocupacion"];
     $telP=$info["telefono_trabajo"];
     $faceP=$info["facebook"];
     $horP=$info["horario_trabajo"];
     $ecP=$info["estado_civil"];
     $calleP=$info["calle_casa"];
     $numP=$info["numero_casa"];
     $colP=$info["colonia_casa"];
     $muni=$info["municipio_casa"];
     $cpP=$info["cp_casa"];
     $telCasaP=$info["telefono_casa"];

   }

   if($tipo=="4"){
     $sqlEst=mysqli_query($conexion,"SELECT * FROM estudiantes WHERE est_correo = '$correo' ");
     $info = mysqli_fetch_array($sqlEst,MYSQLI_ASSOC);
     $matriculaBD=$info["matricula"];
     $celularBD=$info["celular"];
     $carreraBD=$info["carrera"];
     $sgmmBD=$info["sgmm"];
     $nomTutorBD=$info["nombre_tutor"];
     $apeTutorBD=$info["apellido_tutor"];
     $tel1BD=$info["tel_tutor_1"];
     $tel2BD=$info["tel_tutor_2"];

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
            <li>
                <a href="/assets/pages/contrasenas.php">
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

    <?php
    //matricula, celular, carrera, sgmm, nomTutor, apeTutor, tel1, tel2
    //Cinco tipos de post = administrador, maestro, padre y estudiante y pass.
    if($_SERVER["REQUEST_METHOD"] == "POST"){
      include("config.php");
      $validador=true;
      $form=$_POST["info"];

      if($form=="administrador"){

        //hola

      }

      if($form=="maestro"){

        //hola

      }

      if($form=="padre"){

        $celP=$_POST["celular"];
        $ocuP=$_POST["ocupacion"];
        $telP=$_POST["telefono"];
        $fbP=$_POST["facebook"];
        $horP=$_POST["horario"];

        $calle=$_POST["calle"];
        $numero=$_POST["numero"];
        $colonia=$_POST["colonia"];
        $municipio=$_POST["municipio"];
        $postal=$_POST["postal"];
        $telCasa=$_POST["telCasa"];
        $civil=$_POST["civil"];

        $sql="UPDATE tutor SET celular='$celP', ocupacion='$ocuP', telefono_trabajo='$telP', facebook='$fbP', horario_trabajo='$horP',
        calle_casa='$calle', numero_casa='$numero', colonia_casa='$colonia', municipio_casa='$municipio', cp_casa='$postal', telefono_casa='$telCasa',
        estado_civil='$civil' , activo='1' WHERE correo_tutor='$correo'";

        if ($conexion->query($sql)) {
          header('Location: '.$_SERVER['REQUEST_URI']);
          exit;
        }


      }

      if($form=="estudiante"){

        if(strlen(trim($_POST["carrera"]))>4){
          $avisos["errCar"] = "Ingresa solo las siglas de tu carrera.<br><br>";
          $validador=false;
        }

        if(strlen(trim($_POST["matricula"]))>6){
          $avisos["errMat"] = "Ingresa tu matricula sin ceros.<br><br>";
          $validador=false;
        }

        $archivo=$_FILES["foto"];

        if(is_uploaded_file($archivo["tmp_name"])){
          $directorio = "assets/fotos/";
          //El nombre de la imagen es el correo
          $extension=pathinfo($_FILES["foto"]["name"],PATHINFO_EXTENSION);
          $newFile=$directorio.$correo.".".$extension;
          $valFoto=1;

          if ($_FILES["foto"]["size"] > 5000000) {
            $avisos["errFoto"] = "La foto es demasiado grande, el tamaño límite es 5MB.<br><br>";
            $valFoto = 0;
            $validador=false;
          }

          if($extension != "jpg" && $extension != "png" && $extension != "jpeg" && $extension != "gif" ) {
            $avisos["errFoto"] = "El archivo no es una foto.<br><br>";
            $valFoto = 0;
            $validador=false;
          }

          if($valFoto==1){
            $newFile=$directorio.$correo.".jpg";
            if(move_uploaded_file($archivo["tmp_name"],$newFile)){

            } else {
              $avisos["errFoto"] = "La foto no fue subida.<br><br>";
              $validador=false;
            }
          }

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

          //Hacer mayusculas la Carrera
          $carrera=strtoupper($carrera);

          $sql = "UPDATE estudiantes SET matricula = '$matricula', celular = '$celular', carrera = '$carrera', sgmm = '$sgmm',
          nombre_tutor = '$nomTutor', apellido_tutor='$apeTutor', tel_tutor_1 = '$tel1', tel_tutor_2 = '$tel2', activo = '1'
           WHERE est_correo='$correo'";

          if ($conexion->query($sql)) {
            $avisos["veri"] = "Información guardada exitosamente.<br><br>";

            ?>
            <script>
            alert("Información actualizada exitosamente.");
            if ( window.history.replaceState ) {
              window.history.replaceState( null, null, window.location.href );
            }
            </script>
            <?php
            header('Location: '.$_SERVER['PHP_SELF']);
          } else {
            $avisos["err"] = "Error. Contacte al administrador<br><br>";
          }

        }

      }

      if($form=="pass"){

        $oldPass=$_POST["oldPass"];
        $newPass1=$_POST["newPass1"];
        $newPass2=$_POST["newPass2"];

        $sqlPass = "SELECT contrasena FROM usuarios WHERE correo='$correo'";
        $result = $conexion->query($sqlPass);
        $tupla = mysqli_fetch_array ($result);
        $oldPassBD = $tupla[0];
          //la contraseña antigua es correcta

          if("$oldPass"=="$oldPassBD"){
            //Checa si las dos contraseñas coinciden

            if(trim($_POST["newPass1"])!=trim($_POST["newPass2"])){
              $avisos["errP"] = "Error. Las contraseñas no coinciden.<br><br>";
            } else {
              $sqlPass2 = "UPDATE usuarios SET contrasena='$newPass1' WHERE correo='$correo'";
              if ($conexion->query($sqlPass2)) {
                ?>
                <script>
                if ( window.history.replaceState ) {
                  window.history.replaceState( null, null, window.location.href );
                }
                </script>
                <?php
                $avisos["veriP"] = "Contraseña cambiada exitosamente.<br><br>";
              } else {
                $avisos["errP"] = "Error. Contacte al administrador<br><br>";
              }

            }

          } else {
            $avisos["errP"] = "Error. La contraseña es incorrecta<br><br>";
          }

      }

    }
    ?>

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
                              <h4 class="title">Editar mi información</h4>
                              <p class="category">Edita tu información personal</p>
                          </div>
                          <div class="content">

                              <form method="POST" id="info" enctype="multipart/form-data">
                                  <div class="row">
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Nombre(s)</label>
                                              <input type="text" class="form-control" placeholder="Nombre(s)" value="<?php echo $nom; ?>" disabled >
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Apellidos</label>
                                              <input type="text" class="form-control" placeholder="Apellidos" value="<?php echo $ape; ?>" disabled>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label for="exampleInputEmail1">Correo Electrónico Registrado</label>
                                              <input type="email" class="form-control" placeholder="Correo Electrónico" value="<?php echo $correo; ?>"  disabled>
                                          </div>
                                      </div>
                                  </div>
                                  <hr>
                                  <!-- Editar información según el tipo de usuario-->
                                  <?php
                                    if($tipo=="1"){
                                  ?>

                                  <?php
                                    }
                                  ?>

                                  <?php
                                    if($tipo=="2"){
                                  ?>

                                  <?php
                                    }
                                  ?>

                                  <?php
                                    if($tipo=="3"){
                                  ?>

                                  <div class="row">
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Celular</label>
                                              <input type="text" class="form-control" placeholder="Ej. 8114675841" name="celular" value="<?php echo @$celP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Ocupación</label>
                                              <input type="text" class="form-control" placeholder="Ej. Ingeniero" name="ocupacion" value="<?php echo @$ocupacionP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Teléfono del trabajo</label>
                                              <input type="text" class="form-control" placeholder="Ej. 8114675841" name="telefono" value="<?php echo @$telP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Facebook</label>
                                              <input type="text" class="form-control" placeholder="Carlos Bautista" name="facebook" value="<?php echo @$faceP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Horario del trabajo</label>
                                              <input type="text" class="form-control" name="horario" value="<?php echo @$horP; ?>" required>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Estado Civil</label>
                                            <input type="text" class="form-control" name="civil" value="<?php echo @$ecP; ?>" required>
                                        </div>
                                    </div>
                                  </div>

                                  <!-- INFO DE LA CASA -->
                                  <hr>
                                  <p>Información sobre tu hogar.</p>
                                  <div class="row">
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Calle</label>
                                              <input type="text" class="form-control" name="calle" value="<?php echo @$calleP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Número</label>
                                              <input type="numero" class="form-control" name="numero" value="<?php echo @$numP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Colonia</label>
                                              <input type="text" class="form-control" name="colonia" value="<?php echo @$colP; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Municipio</label>
                                              <?php
                                              if(empty($muni)){
                                              ?>
                                              <select class="form-control" name="municipio" required>
                                                <option value="" disabled selected>Elige una opción</option>
                                                <option value="Apodaca">Apodaca</option>
                                                <option value="Benito Juárez">Benito Juárez</option>
                                                <option value="Cadereyta Jiménez">Cadereyta Jiménez</option>
                                                <option value="García">García</option>
                                                <option value="General Escobedo">General Escobedo</option>
                                                <option value="Guadalupe">Guadalupe</option>
                                                <option value="Monterrey">Monterrey</option>
                                                <option value="Salinas Victoria">Salinas Victoria</option>
                                                <option value="San Nicolás">San Nicolás</option>
                                                <option value="San Pedro">San Pedro</option>
                                                <option value="Santa Catarina">Santa Catarina</option>
                                                <option value="Santiago">Santiago</option>
                                              </select>
                                              <?php
                                              } else {
                                              ?>
                                              <select class="form-control" name="municipio" required>
                                                <option value=<?php echo $muni;?> selected><?php echo $muni;?></option>
                                                <option value="Apodaca">Apodaca</option>
                                                <option value="Benito Juárez">Benito Juárez</option>
                                                <option value="Cadereyta Jiménez">Cadereyta Jiménez</option>
                                                <option value="García">García</option>
                                                <option value="General Escobedo">General Escobedo</option>
                                                <option value="Guadalupe">Guadalupe</option>
                                                <option value="Monterrey">Monterrey</option>
                                                <option value="Salinas Victoria">Salinas Victoria</option>
                                                <option value="San Nicolás">San Nicolás</option>
                                                <option value="San Pedro">San Pedro</option>
                                                <option value="Santa Catarina">Santa Catarina</option>
                                                <option value="Santiago">Santiago</option>
                                              </select>
                                              <?php
                                              }
                                              ?>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Código Postal</label>
                                              <input type="numero" class="form-control" name="postal" value="<?php echo @$cpP; ?>" required>
                                          </div>
                                      </div>

                                  </div>

                                  <div class="row">

                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Teléfono de la casa</label>
                                              <input type="text" class="form-control" name="telCasa" value="<?php echo @$telCasaP; ?>" required>
                                          </div>
                                      </div>

                                  </div>

                                  <input type="hidden" name="info" value="padre"/>

                                  <?php
                                    }
                                  ?>

                                  <?php
                                    if($tipo=="4"){
                                  ?>

                                  <div class="row">
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Matricula</label>
                                              <input type="number" class="form-control" placeholder="Ej. 534376" name="matricula" value="<?php echo @$matriculaBD; ?>" required>
                                          </div>
                                          <font color="red"> <?php echo @$avisos["errMat"]?></font>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Teléfono Celular</label>
                                              <input type="number" class="form-control" placeholder="Ej. 8114675841" name="celular" value="<?php echo @$celularBD; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-3">
                                          <div class="form-group">
                                              <label>Carrera (siglas)</label>
                                              <input type="text" class="form-control" placeholder="Ej. ITC" name="carrera" value="<?php echo @$carreraBD; ?>" required>
                                          </div>
                                          <font color="red"> <?php echo @$avisos["errCar"]?></font>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Número de poliza de SGMM</label>
                                              <input type="text" class="form-control" placeholder="Ej. 35000-1129-4" name="sgmm" value="<?php echo @$sgmmBD; ?>" required>
                                          </div>
                                      </div>
                                  </div>

                                  <div class="row">
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Nombre(s) tutor</label>
                                              <input type="text" class="form-control" placeholder="" name="nomTutor" value="<?php echo @$nomTutorBD; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Apellidos tutor</label>
                                              <input type="text" class="form-control" placeholder="" name="apeTutor" value="<?php echo @$apeTutorBD; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Opción de marcado #1</label>
                                              <input type="number" class="form-control" placeholder="Ej. 8114675841" name="tel1" value="<?php echo @$tel1BD; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-2">
                                          <div class="form-group">
                                              <label>Opción de marcado #2</label>
                                              <input type="number" class="form-control" placeholder="Ej. 8114675841" name="tel2" value="<?php echo @$tel2BD; ?>" required>
                                          </div>
                                      </div>
                                      <div class="col-md-4">
                                          <div class="form-group">
                                              <label>Foto</label>
                                              <input type="file" class="form-control" name="foto" id="archivo">
                                          </div>
                                          <font color="red"> <?php echo @$avisos["errFoto"]?></font>
                                      </div>
                                      <input type="hidden" name="info" value="estudiante"/>
                                  </div>

                                  <?php
                                    }
                                  ?>

                                  <button type="submit" class="btn btn-info btn-fill pull-right">Actualizar información</button>
                                  <font color="green"> <?php echo @$avisos["veri"]?></font>
                                  <font color="red"> <?php echo @$avisos["err"]?></font>
                                  <div class="clearfix"></div>
                              </form>

                          </div>
                      </div>
                  </div>

                  <?php
                    if($tipo=="3" || $tipo=="4"){
                  ?>
                  <div class="col-md-6">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Aviso de Privacidad</h4>
                              </div>
                          <div class="content">

                            <?php
                            if(empty($check["correo_tutor"]) || $check["resp"]=='0'){
                            ?>

                            <form action="avisoPrivacidad.php" method="GET">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Ir a aviso</button>
                            </form>

                            <?php
                            } else {
                            ?>

                            <button type="submit" class="btn btn-info btn-fill pull-right" disabled>Ir a aviso</button>

                            <?php
                            }
                            ?>
                            <div class="clearfix"></div>
                          </div>
                      </div>
                  </div>

                  <?php
                    }
                  ?>

                  <div class="col-md-12">
                      <div class="card">
                          <div class="header">
                              <h4 class="title">Cambiar mi contraseña</h4>
                              </div>
                          <div class="content">

                            <form method="POST" id="pass">
                              <div class="row">
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Contraseña antigua</label>
                                          <input type="password" class="form-control" name="oldPass"  required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Contraseña nueva</label>
                                          <input type="password" class="form-control" name="newPass1" required>
                                      </div>
                                  </div>
                                  <div class="col-md-4">
                                      <div class="form-group">
                                          <label>Confirmar contraseña nueva</label>
                                          <input type="password" class="form-control" name="newPass2" required>
                                      </div>
                                  </div>
                                  <input type="hidden" name="info" value="pass"/>
                              </div>
                                <button type="submit" class="btn btn-info btn-fill pull-right">Cambiar contraseña</button>
                                <font color="green"> <?php echo @$avisos["veriP"]?></font>
                                <font color="red"> <?php echo @$avisos["errP"]?></font>
                                <div class="clearfix"></div>
                            </form>

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
