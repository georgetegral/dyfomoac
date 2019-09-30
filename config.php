<?php
  $server = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "main";
  $conexion = mysqli_connect ($server,$user,$pass,$dbname)
  or die ("Error de conexion:".mysqli_connect_error());
  mysqli_set_charset($conexion, "utf8");
?>
