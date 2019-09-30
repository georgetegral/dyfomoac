<?php
   include('config.php');
   date_default_timezone_set("America/Monterrey");
   session_start();

   $user_check = $_SESSION['login_user'];

   $ses_sql = mysqli_query($conexion,"SELECT * FROM usuarios WHERE correo = '$user_check' ");

   $row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

   $login_session = $row['nombre'];

   $correo = $row["correo"];
   $tipo=$row['tipo'];
   $nom=$row['nombre'];
   $ape=$row['apellido'];

      $tipoNom="";
      if($tipo=="1"){
        $tipoNom=="Administrador";
      } else if($tipo=="2"){
        $tipoNom=="Maestro";
      } else if($tipo=="3"){
        $tipoNom=="Padre de Familia";
      } else if($tipo=="4"){
        $tipoNom=="Estudiante de Servicio Social";
      }


   if(!isset($_SESSION['login_user'])){
      header("location:login.php");
      die();
   }
?>
