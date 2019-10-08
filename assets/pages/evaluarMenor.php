<!doctype html>

<?php
   include('../../session.php');
   date_default_timezone_set("America/Monterrey");
   include("../../config.php");

   $fechaAct=date("Y-m-d");

   //Mostrar el estatus del item
   function status($etapa,$idm){
     include("../../config.php");
     $sqlh=mysqli_query($conexion, "SELECT fecha, estatus FROM historialchecklist WHERE idMenor = '$idm' AND etapa = '$etapa' ");
     $f = mysqli_fetch_array($sqlh,MYSQLI_ASSOC);
     if(!empty($f)){
       if($f['estatus']==0){ ?>
       <p id="rechazado">Rechazado: [<?php echo $f['fecha'];?>]</p>
       <?php } else if($f['estatus']==1){ ?>
       <p id="date">Llenado: [<?php echo $f['fecha'];?>]</p>
       <?php } else if($f['estatus']==2){ ?>
       <p id="verificado">Verificado: [<?php echo $f['fecha'];?>]</p>
       <?php }
     }
   }

   //Determinar si ya se llenaron todos los items de una etapa
   function full($etapa,$idm){
     include("../../config.php");
     $sqlCheck=mysqli_query($conexion, "SELECT * FROM checklist WHERE idMen = '$idm'");
     $checkExists = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);
     $limite=0;
     $acum=0;
     switch($etapa){
       case 1:
              $limite=14;
              if($checkExists['1mg1']) $acum++; if($checkExists['1mg2']) $acum++;
              if($checkExists['1mf1']) $acum++; if($checkExists['1mf2']) $acum++; if($checkExists['1mf3']) $acum++; if($checkExists['1mf4']) $acum++;
              if($checkExists['1cm1']) $acum++; if($checkExists['1cm2']) $acum++; if($checkExists['1cm3']) $acum++;
              if($checkExists['1cg1']) $acum++; if($checkExists['1cg2']) $acum++;
              if($checkExists['1as1']) $acum++; if($checkExists['1as2']) $acum++; if($checkExists['1as3']) $acum++;
              break;
       case 2:
              $limite=13;
              if($checkExists['2mg1']) $acum++;
              if($checkExists['2mf1']) $acum++; if($checkExists['2mf2']) $acum++; if($checkExists['2mf3']) $acum++; if($checkExists['2mf4']) $acum++; if($checkExists['2mf5']) $acum++;
              if($checkExists['2cm1']) $acum++; if($checkExists['2cm2']) $acum++; if($checkExists['2cm3']) $acum++;
              if($checkExists['2cg1']) $acum++; if($checkExists['2cg2']) $acum++;
              if($checkExists['2as1']) $acum++; if($checkExists['2as2']) $acum++;
              break;
       case 3:
              $limite=19;
              if($checkExists['3mg1']) $acum++; if($checkExists['3mg2']) $acum++; if($checkExists['3mg3']) $acum++;
              if($checkExists['3mf1']) $acum++; if($checkExists['3mf2']) $acum++; if($checkExists['3mf3']) $acum++;
              if($checkExists['3cm1']) $acum++; if($checkExists['3cm2']) $acum++; if($checkExists['3cm3']) $acum++;
              if($checkExists['3cg1']) $acum++; if($checkExists['3cg2']) $acum++; if($checkExists['3cg3']) $acum++; if($checkExists['3cg4']) $acum++; if($checkExists['3cg5']) $acum++;
              if($checkExists['3as1']) $acum++; if($checkExists['3as2']) $acum++; if($checkExists['3as3']) $acum++; if($checkExists['3as4']) $acum++; if($checkExists['3as5']) $acum++;
              break;
       case 4:
              $limite=18;
              if($checkExists['4mg1']) $acum++; if($checkExists['4mg2']) $acum++; if($checkExists['4mg3']) $acum++; if($checkExists['4mg4']) $acum++;
              if($checkExists['4mf1']) $acum++; if($checkExists['4mf2']) $acum++; if($checkExists['4mf3']) $acum++; if($checkExists['4mf4']) $acum++; if($checkExists['4mf5']) $acum++;
              if($checkExists['4cm1']) $acum++; if($checkExists['4cm2']) $acum++; if($checkExists['4cm3']) $acum++;
              if($checkExists['4cg1']) $acum++; if($checkExists['4cg2']) $acum++; if($checkExists['4cg3']) $acum++;
              if($checkExists['4as1']) $acum++; if($checkExists['4as2']) $acum++; if($checkExists['4as3']) $acum++;
              break;
       case 5:
              $limite=24;
              if($checkExists['5mg1']) $acum++; if($checkExists['5mg2']) $acum++; if($checkExists['5mg3']) $acum++; if($checkExists['5mg4']) $acum++; if($checkExists['5mg5']) $acum++; if($checkExists['5mg6']) $acum++;
              if($checkExists['5mf1']) $acum++; if($checkExists['5mf2']) $acum++; if($checkExists['5mf3']) $acum++; if($checkExists['5mf4']) $acum++; if($checkExists['5mf5']) $acum++;
              if($checkExists['5cm1']) $acum++; if($checkExists['5cm2']) $acum++; if($checkExists['5cm3']) $acum++;
              if($checkExists['5cg1']) $acum++; if($checkExists['5cg2']) $acum++; if($checkExists['5cg3']) $acum++; if($checkExists['5cg4']) $acum++; if($checkExists['5cg5']) $acum++;
              if($checkExists['5as1']) $acum++; if($checkExists['5as2']) $acum++; if($checkExists['5as3']) $acum++; if($checkExists['5as4']) $acum++; if($checkExists['5as5']) $acum++;
              break;
       case 6:
              $limite=18;
              if($checkExists['6mg1']) $acum++; if($checkExists['6mg2']) $acum++; if($checkExists['6mg3']) $acum++;
              if($checkExists['6mf1']) $acum++; if($checkExists['6mf2']) $acum++; if($checkExists['6mf3']) $acum++; if($checkExists['6mf4']) $acum++; if($checkExists['6mf5']) $acum++;
              if($checkExists['6cm1']) $acum++; if($checkExists['6cm2']) $acum++;
              if($checkExists['6cg1']) $acum++; if($checkExists['6cg2']) $acum++; if($checkExists['6cg3']) $acum++; if($checkExists['6cg4']) $acum++; if($checkExists['6cg5']) $acum++;
              if($checkExists['6as1']) $acum++; if($checkExists['6as2']) $acum++; if($checkExists['6as3']) $acum++;
              break;
       case 7:
              $limite=36;
              if($checkExists['7mg1']) $acum++; if($checkExists['7mg2']) $acum++; if($checkExists['7mg3']) $acum++; if($checkExists['7mg4']) $acum++; if($checkExists['7mg5']) $acum++; if($checkExists['7mg6']) $acum++;
              if($checkExists['7mf1']) $acum++; if($checkExists['7mf2']) $acum++; if($checkExists['7mf3']) $acum++; if($checkExists['7mf4']) $acum++; if($checkExists['7mf5']) $acum++; if($checkExists['7mf6']) $acum++;
              if($checkExists['7mf7']) $acum++; if($checkExists['7mf8']) $acum++;
              if($checkExists['7cm1']) $acum++; if($checkExists['7cm2']) $acum++; if($checkExists['7cm3']) $acum++; if($checkExists['7cm4']) $acum++; if($checkExists['7cm5']) $acum++; if($checkExists['7cm6']) $acum++;
              if($checkExists['7cm7']) $acum++;
              if($checkExists['7cg1']) $acum++; if($checkExists['7cg2']) $acum++; if($checkExists['7cg3']) $acum++; if($checkExists['7cg4']) $acum++; if($checkExists['7cg5']) $acum++; if($checkExists['7cg6']) $acum++;
              if($checkExists['7cg7']) $acum++;
              if($checkExists['7as1']) $acum++; if($checkExists['7as2']) $acum++; if($checkExists['7as3']) $acum++; if($checkExists['7as4']) $acum++; if($checkExists['7as5']) $acum++; if($checkExists['7as6']) $acum++;
              if($checkExists['7as7']) $acum++; if($checkExists['7as8']) $acum++;
              break;
       case 8:
              $limite=23;
              if($checkExists['8mg1']) $acum++; if($checkExists['8mg2']) $acum++; if($checkExists['8mg3']) $acum++;
              if($checkExists['8mf1']) $acum++; if($checkExists['8mf2']) $acum++; if($checkExists['8mf3']) $acum++; if($checkExists['8mf4']) $acum++; if($checkExists['8mf5']) $acum++;
              if($checkExists['8cm1']) $acum++; if($checkExists['8cm2']) $acum++; if($checkExists['8cm3']) $acum++;
              if($checkExists['8cg1']) $acum++; if($checkExists['8cg2']) $acum++; if($checkExists['8cg3']) $acum++; if($checkExists['8cg4']) $acum++; if($checkExists['8cg5']) $acum++; if($checkExists['8cg6']) $acum++;
              if($checkExists['8as1']) $acum++; if($checkExists['8as2']) $acum++; if($checkExists['8as3']) $acum++; if($checkExists['8as4']) $acum++; if($checkExists['8as5']) $acum++; if($checkExists['8as6']) $acum++;
              break;
     }
     if($limite==$acum){
       return true;
     } else {
      return false;
     }
   }

   //Calcula edades
   function calc($then) {
    $then_ts = strtotime($then);
    $then_year = date('Y', $then_ts);
    $age = date('Y') - $then_year;
    if(strtotime('+' . $age . ' years', $then_ts) > time()) $age--;
    return $age;
   }

   if($_GET["idMenor"]){
     $idm=$_GET["idMenor"];
     $sqlM=mysqli_query($conexion,"SELECT * FROM menor WHERE id = '$idm' ");
     $infoM = mysqli_fetch_array($sqlM,MYSQLI_ASSOC);

     $nombreM=$infoM["nombre"];
     $apellidoM=$infoM["apellido"];
     $fnac=$infoM["fecha_nacimiento"];

     $sqlCheck=mysqli_query($conexion, "SELECT * FROM checklist WHERE idMen = '$idm'");
     $checkExists = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);

     $etapa;

     if($checkExists){
       if($checkExists['8ok']==1){
         $etapa=9;
       } else if($checkExists['1ok']==0){
         $etapa=1;
       } else if($checkExists['7ok']==1){
         $etapa=8;
       } else if($checkExists['6ok']==1){
         $etapa=7;
       } else if($checkExists['5ok']==1){
         $etapa=6;
       } else if($checkExists['4ok']==1){
         $etapa=5;
       } else if($checkExists['3ok']==1){
         $etapa=4;
       } else if($checkExists['2ok']==1){
         $etapa=3;
       } else if($checkExists['1ok']==1){
         $etapa=2;
       }

     }

   }

   if($_SERVER["REQUEST_METHOD"] == "POST"){
     $info=$_POST["info"];
     if($info=="inicial"){
       if(isset($_POST['select'])){
         $val=$_POST['select'];

         //determinar cuantos ok
         switch($val){
           case 1:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen) VALUES ('$idm')");
                  break;
           case 2:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok) VALUES ('$idm','1')");
                  break;
           case 3:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok,2ok) VALUES ('$idm','1','1')");
                  break;
           case 4:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok,2ok,3ok) VALUES ('$idm','1','1','1')");
                  break;
           case 5:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok,2ok,3ok,4ok) VALUES ('$idm','1','1','1','1')");
                  break;
           case 6:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok,2ok,3ok,4ok,5ok) VALUES ('$idm','1','1','1','1','1')");
                  break;
           case 7:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok,2ok,3ok,4ok,5ok,6ok) VALUES ('$idm','1','1','1','1','1','1')");
                  break;
           case 8:
                  $sqlCreate=mysqli_query($conexion,"INSERT INTO checklist (idMen,1ok,2ok,3ok,4ok,5ok,6ok,7ok) VALUES ('$idm','1','1','1','1','1','1','1')");
                  break;
         }

         if ($conexion->query($sqlCreate)) {
           $avisos["veriEtapa"] = "Registro creado correctamente.<br><br>";
         }
         header('Location: '.$_SERVER['REQUEST_URI']);

       } else {
         $avisos["errEtapa"] = "Error. Porfavor selecciona una etapa.<br><br>";
       }

     }

     if($info=='1'||$info=='2'||$info=='3'||$info=='4'||$info=='5'||$info=='6'||$info=='7'||$info=='8'){

       $val=array();
       $limite=0;
       switch($info){
         case 1:
               //Obtener los valores
               if(isset($_POST['1mg1'])){$val['1mg1']=$_POST['1mg1'];}else{$val['1mg1']="yes";}
               if(isset($_POST['1mg2'])){$val['1mg2']=$_POST['1mg2'];}else{$val['1mg2']="yes";}

               if(isset($_POST['1mf1'])){$val['1mf1']=$_POST['1mf1'];}else{$val['1mf1']="yes";}
               if(isset($_POST['1mf2'])){$val['1mf2']=$_POST['1mf2'];}else{$val['1mf2']="yes";}
               if(isset($_POST['1mf3'])){$val['1mf3']=$_POST['1mf3'];}else{$val['1mf3']="yes";}
               if(isset($_POST['1mf4'])){$val['1mf4']=$_POST['1mf4'];}else{$val['1mf4']="yes";}

               if(isset($_POST['1cm1'])){$val['1cm1']=$_POST['1cm1'];}else{$val['1cm1']="yes";}
               if(isset($_POST['1cm2'])){$val['1cm2']=$_POST['1cm2'];}else{$val['1cm2']="yes";}
               if(isset($_POST['1cm3'])){$val['1cm3']=$_POST['1cm3'];}else{$val['1cm3']="yes";}

               if(isset($_POST['1cg1'])){$val['1cg1']=$_POST['1cg1'];}else{$val['1cg1']="yes";}
               if(isset($_POST['1cg2'])){$val['1cg2']=$_POST['1cg2'];}else{$val['1cg2']="yes";}

               if(isset($_POST['1as1'])){$val['1as1']=$_POST['1as1'];}else{$val['1as1']="yes";}
               if(isset($_POST['1as2'])){$val['1as2']=$_POST['1as2'];}else{$val['1as2']="yes";}
               if(isset($_POST['1as3'])){$val['1as3']=$_POST['1as3'];}else{$val['1as3']="yes";}
               $limite=14;
               break;
         case 2:
               //Obtener los valores
               if(isset($_POST['2mg1'])){$val['2mg1']=$_POST['2mg1'];}else{$val['2mg1']="yes";}

               if(isset($_POST['2mf1'])){$val['2mf1']=$_POST['2mf1'];}else{$val['2mf1']="yes";}
               if(isset($_POST['2mf2'])){$val['2mf2']=$_POST['2mf2'];}else{$val['2mf2']="yes";}
               if(isset($_POST['2mf3'])){$val['2mf3']=$_POST['2mf3'];}else{$val['2mf3']="yes";}
               if(isset($_POST['2mf4'])){$val['2mf4']=$_POST['2mf4'];}else{$val['2mf4']="yes";}
               if(isset($_POST['2mf5'])){$val['2mf5']=$_POST['2mf5'];}else{$val['2mf5']="yes";}

               if(isset($_POST['2cm1'])){$val['2cm1']=$_POST['2cm1'];}else{$val['2cm1']="yes";}
               if(isset($_POST['2cm2'])){$val['2cm2']=$_POST['2cm2'];}else{$val['2cm2']="yes";}
               if(isset($_POST['2cm3'])){$val['2cm3']=$_POST['2cm3'];}else{$val['2cm3']="yes";}

               if(isset($_POST['2cg1'])){$val['2cg1']=$_POST['2cg1'];}else{$val['2cg1']="yes";}
               if(isset($_POST['2cg2'])){$val['2cg2']=$_POST['2cg2'];}else{$val['2cg2']="yes";}

               if(isset($_POST['2as1'])){$val['2as1']=$_POST['2as1'];}else{$val['2as1']="yes";}
               if(isset($_POST['2as2'])){$val['2as2']=$_POST['2as2'];}else{$val['2as2']="yes";}
               $limite=13;
               break;
         case 3:
               //Obtener los valores
               if(isset($_POST['3mg1'])){$val['3mg1']=$_POST['3mg1'];}else{$val['3mg1']="yes";}
               if(isset($_POST['3mg2'])){$val['3mg2']=$_POST['3mg2'];}else{$val['3mg2']="yes";}
               if(isset($_POST['3mg3'])){$val['3mg3']=$_POST['3mg3'];}else{$val['3mg3']="yes";}

               if(isset($_POST['3mf1'])){$val['3mf1']=$_POST['3mf1'];}else{$val['3mf1']="yes";}
               if(isset($_POST['3mf2'])){$val['3mf2']=$_POST['3mf2'];}else{$val['3mf2']="yes";}
               if(isset($_POST['3mf3'])){$val['3mf3']=$_POST['3mf3'];}else{$val['3mf3']="yes";}

               if(isset($_POST['3cm1'])){$val['3cm1']=$_POST['3cm1'];}else{$val['3cm1']="yes";}
               if(isset($_POST['3cm2'])){$val['3cm2']=$_POST['3cm2'];}else{$val['3cm2']="yes";}
               if(isset($_POST['3cm3'])){$val['3cm3']=$_POST['3cm3'];}else{$val['3cm3']="yes";}

               if(isset($_POST['3cg1'])){$val['3cg1']=$_POST['3cg1'];}else{$val['3cg1']="yes";}
               if(isset($_POST['3cg2'])){$val['3cg2']=$_POST['3cg2'];}else{$val['3cg2']="yes";}
               if(isset($_POST['3cg3'])){$val['3cg3']=$_POST['3cg3'];}else{$val['3cg3']="yes";}
               if(isset($_POST['3cg4'])){$val['3cg4']=$_POST['3cg4'];}else{$val['3cg4']="yes";}
               if(isset($_POST['3cg5'])){$val['3cg5']=$_POST['3cg5'];}else{$val['3cg5']="yes";}

               if(isset($_POST['3as1'])){$val['3as1']=$_POST['3as1'];}else{$val['3as1']="yes";}
               if(isset($_POST['3as2'])){$val['3as2']=$_POST['3as2'];}else{$val['3as2']="yes";}
               if(isset($_POST['3as3'])){$val['3as3']=$_POST['3as3'];}else{$val['3as3']="yes";}
               if(isset($_POST['3as4'])){$val['3as4']=$_POST['3as4'];}else{$val['3as4']="yes";}
               if(isset($_POST['3as5'])){$val['3as5']=$_POST['3as5'];}else{$val['3as5']="yes";}
               $limite=19;
               break;
         case 4:
               //Obtener los valores
               if(isset($_POST['4mg1'])){$val['4mg1']=$_POST['4mg1'];}else{$val['4mg1']="yes";}
               if(isset($_POST['4mg2'])){$val['4mg2']=$_POST['4mg2'];}else{$val['4mg2']="yes";}
               if(isset($_POST['4mg3'])){$val['4mg3']=$_POST['4mg3'];}else{$val['4mg3']="yes";}
               if(isset($_POST['4mg4'])){$val['4mg4']=$_POST['4mg4'];}else{$val['4mg4']="yes";}

               if(isset($_POST['4mf1'])){$val['4mf1']=$_POST['4mf1'];}else{$val['4mf1']="yes";}
               if(isset($_POST['4mf2'])){$val['4mf2']=$_POST['4mf2'];}else{$val['4mf2']="yes";}
               if(isset($_POST['4mf3'])){$val['4mf3']=$_POST['4mf3'];}else{$val['4mf3']="yes";}
               if(isset($_POST['4mf4'])){$val['4mf4']=$_POST['4mf4'];}else{$val['4mf4']="yes";}
               if(isset($_POST['4mf5'])){$val['4mf5']=$_POST['4mf5'];}else{$val['4mf5']="yes";}

               if(isset($_POST['4cm1'])){$val['4cm1']=$_POST['4cm1'];}else{$val['4cm1']="yes";}
               if(isset($_POST['4cm2'])){$val['4cm2']=$_POST['4cm2'];}else{$val['4cm2']="yes";}
               if(isset($_POST['4cm3'])){$val['4cm3']=$_POST['4cm3'];}else{$val['4cm3']="yes";}

               if(isset($_POST['4cg1'])){$val['4cg1']=$_POST['4cg1'];}else{$val['4cg1']="yes";}
               if(isset($_POST['4cg2'])){$val['4cg2']=$_POST['4cg2'];}else{$val['4cg2']="yes";}
               if(isset($_POST['4cg3'])){$val['4cg3']=$_POST['4cg3'];}else{$val['4cg3']="yes";}

               if(isset($_POST['4as1'])){$val['4as1']=$_POST['4as1'];}else{$val['4as1']="yes";}
               if(isset($_POST['4as2'])){$val['4as2']=$_POST['4as2'];}else{$val['4as2']="yes";}
               if(isset($_POST['4as3'])){$val['4as3']=$_POST['4as3'];}else{$val['4as3']="yes";}
               $limite=18;
               break;
         case 5:
               //Obtener los valores
               if(isset($_POST['5mg1'])){$val['5mg1']=$_POST['5mg1'];}else{$val['5mg1']="yes";}
               if(isset($_POST['5mg2'])){$val['5mg2']=$_POST['5mg2'];}else{$val['5mg2']="yes";}
               if(isset($_POST['5mg3'])){$val['5mg3']=$_POST['5mg3'];}else{$val['5mg3']="yes";}
               if(isset($_POST['5mg4'])){$val['5mg4']=$_POST['5mg4'];}else{$val['5mg4']="yes";}
               if(isset($_POST['5mg5'])){$val['5mg5']=$_POST['5mg5'];}else{$val['5mg5']="yes";}
               if(isset($_POST['5mg6'])){$val['5mg6']=$_POST['5mg6'];}else{$val['5mg6']="yes";}

               if(isset($_POST['5mf1'])){$val['5mf1']=$_POST['5mf1'];}else{$val['5mf1']="yes";}
               if(isset($_POST['5mf2'])){$val['5mf2']=$_POST['5mf2'];}else{$val['5mf2']="yes";}
               if(isset($_POST['5mf3'])){$val['5mf3']=$_POST['5mf3'];}else{$val['5mf3']="yes";}
               if(isset($_POST['5mf4'])){$val['5mf4']=$_POST['5mf4'];}else{$val['5mf4']="yes";}
               if(isset($_POST['5mf5'])){$val['5mf5']=$_POST['5mf5'];}else{$val['5mf5']="yes";}

               if(isset($_POST['5cm1'])){$val['5cm1']=$_POST['5cm1'];}else{$val['5cm1']="yes";}
               if(isset($_POST['5cm2'])){$val['5cm2']=$_POST['5cm2'];}else{$val['5cm2']="yes";}
               if(isset($_POST['5cm3'])){$val['5cm3']=$_POST['5cm3'];}else{$val['5cm3']="yes";}

               if(isset($_POST['5cg1'])){$val['5cg1']=$_POST['5cg1'];}else{$val['5cg1']="yes";}
               if(isset($_POST['5cg2'])){$val['5cg2']=$_POST['5cg2'];}else{$val['5cg2']="yes";}
               if(isset($_POST['5cg3'])){$val['5cg3']=$_POST['5cg3'];}else{$val['5cg3']="yes";}
               if(isset($_POST['5cg4'])){$val['5cg4']=$_POST['5cg4'];}else{$val['5cg4']="yes";}
               if(isset($_POST['5cg5'])){$val['5cg5']=$_POST['5cg5'];}else{$val['5cg5']="yes";}

               if(isset($_POST['5as1'])){$val['5as1']=$_POST['5as1'];}else{$val['5as1']="yes";}
               if(isset($_POST['5as2'])){$val['5as2']=$_POST['5as2'];}else{$val['5as2']="yes";}
               if(isset($_POST['5as3'])){$val['5as3']=$_POST['5as3'];}else{$val['5as3']="yes";}
               if(isset($_POST['5as4'])){$val['5as4']=$_POST['5as4'];}else{$val['5as4']="yes";}
               if(isset($_POST['5as5'])){$val['5as5']=$_POST['5as5'];}else{$val['5as5']="yes";}
               $limite=24;
               break;
         case 6:
               //Obtener los valores
               if(isset($_POST['6mg1'])){$val['6mg1']=$_POST['6mg1'];}else{$val['6mg1']="yes";}
               if(isset($_POST['6mg2'])){$val['6mg2']=$_POST['6mg2'];}else{$val['6mg2']="yes";}
               if(isset($_POST['6mg3'])){$val['6mg3']=$_POST['6mg3'];}else{$val['6mg3']="yes";}

               if(isset($_POST['6mf1'])){$val['6mf1']=$_POST['6mf1'];}else{$val['6mf1']="yes";}
               if(isset($_POST['6mf2'])){$val['6mf2']=$_POST['6mf2'];}else{$val['6mf2']="yes";}
               if(isset($_POST['6mf3'])){$val['6mf3']=$_POST['6mf3'];}else{$val['6mf3']="yes";}
               if(isset($_POST['6mf4'])){$val['6mf4']=$_POST['6mf4'];}else{$val['6mf4']="yes";}
               if(isset($_POST['6mf5'])){$val['6mf5']=$_POST['6mf5'];}else{$val['6mf5']="yes";}

               if(isset($_POST['6cm1'])){$val['6cm1']=$_POST['6cm1'];}else{$val['6cm1']="yes";}
               if(isset($_POST['6cm2'])){$val['6cm2']=$_POST['6cm2'];}else{$val['6cm2']="yes";}

               if(isset($_POST['6cg1'])){$val['6cg1']=$_POST['6cg1'];}else{$val['6cg1']="yes";}
               if(isset($_POST['6cg2'])){$val['6cg2']=$_POST['6cg2'];}else{$val['6cg2']="yes";}
               if(isset($_POST['6cg3'])){$val['6cg3']=$_POST['6cg3'];}else{$val['6cg3']="yes";}
               if(isset($_POST['6cg4'])){$val['6cg4']=$_POST['6cg4'];}else{$val['6cg4']="yes";}
               if(isset($_POST['6cg5'])){$val['6cg5']=$_POST['6cg5'];}else{$val['6cg5']="yes";}

               if(isset($_POST['6as1'])){$val['6as1']=$_POST['6as1'];}else{$val['6as1']="yes";}
               if(isset($_POST['6as2'])){$val['6as2']=$_POST['6as2'];}else{$val['6as2']="yes";}
               if(isset($_POST['6as3'])){$val['6as3']=$_POST['6as3'];}else{$val['6as3']="yes";}
               $limite=18;
               break;
         case 7:
               //Obtener los valores
               if(isset($_POST['7mg1'])){$val['7mg1']=$_POST['7mg1'];}else{$val['7mg1']="yes";}
               if(isset($_POST['7mg2'])){$val['7mg2']=$_POST['7mg2'];}else{$val['7mg2']="yes";}
               if(isset($_POST['7mg3'])){$val['7mg3']=$_POST['7mg3'];}else{$val['7mg3']="yes";}
               if(isset($_POST['7mg4'])){$val['7mg4']=$_POST['7mg4'];}else{$val['7mg4']="yes";}
               if(isset($_POST['7mg5'])){$val['7mg5']=$_POST['7mg5'];}else{$val['7mg5']="yes";}
               if(isset($_POST['7mg6'])){$val['7mg6']=$_POST['7mg6'];}else{$val['7mg6']="yes";}

               if(isset($_POST['7mf1'])){$val['7mf1']=$_POST['7mf1'];}else{$val['7mf1']="yes";}
               if(isset($_POST['7mf2'])){$val['7mf2']=$_POST['7mf2'];}else{$val['7mf2']="yes";}
               if(isset($_POST['7mf3'])){$val['7mf3']=$_POST['7mf3'];}else{$val['7mf3']="yes";}
               if(isset($_POST['7mf4'])){$val['7mf4']=$_POST['7mf4'];}else{$val['7mf4']="yes";}
               if(isset($_POST['7mf5'])){$val['7mf5']=$_POST['7mf5'];}else{$val['7mf5']="yes";}
               if(isset($_POST['7mf6'])){$val['7mf6']=$_POST['7mf6'];}else{$val['7mf6']="yes";}
               if(isset($_POST['7mf7'])){$val['7mf7']=$_POST['7mf7'];}else{$val['7mf7']="yes";}
               if(isset($_POST['7mf8'])){$val['7mf8']=$_POST['7mf8'];}else{$val['7mf8']="yes";}

               if(isset($_POST['7cm1'])){$val['7cm1']=$_POST['7cm1'];}else{$val['7cm1']="yes";}
               if(isset($_POST['7cm2'])){$val['7cm2']=$_POST['7cm2'];}else{$val['7cm2']="yes";}
               if(isset($_POST['7cm3'])){$val['7cm3']=$_POST['7cm3'];}else{$val['7cm3']="yes";}
               if(isset($_POST['7cm4'])){$val['7cm4']=$_POST['7cm4'];}else{$val['7cm4']="yes";}
               if(isset($_POST['7cm5'])){$val['7cm5']=$_POST['7cm5'];}else{$val['7cm5']="yes";}
               if(isset($_POST['7cm6'])){$val['7cm6']=$_POST['7cm6'];}else{$val['7cm6']="yes";}
               if(isset($_POST['7cm7'])){$val['7cm7']=$_POST['7cm7'];}else{$val['7cm7']="yes";}

               if(isset($_POST['7cg1'])){$val['7cg1']=$_POST['7cg1'];}else{$val['7cg1']="yes";}
               if(isset($_POST['7cg2'])){$val['7cg2']=$_POST['7cg2'];}else{$val['7cg2']="yes";}
               if(isset($_POST['7cg3'])){$val['7cg3']=$_POST['7cg3'];}else{$val['7cg3']="yes";}
               if(isset($_POST['7cg4'])){$val['7cg4']=$_POST['7cg4'];}else{$val['7cg4']="yes";}
               if(isset($_POST['7cg5'])){$val['7cg5']=$_POST['7cg5'];}else{$val['7cg5']="yes";}
               if(isset($_POST['7cg6'])){$val['7cg6']=$_POST['7cg6'];}else{$val['7cg6']="yes";}
               if(isset($_POST['7cg7'])){$val['7cg7']=$_POST['7cg7'];}else{$val['7cg7']="yes";}

               if(isset($_POST['7as1'])){$val['7as1']=$_POST['7as1'];}else{$val['7as1']="yes";}
               if(isset($_POST['7as2'])){$val['7as2']=$_POST['7as2'];}else{$val['7as2']="yes";}
               if(isset($_POST['7as3'])){$val['7as3']=$_POST['7as3'];}else{$val['7as3']="yes";}
               if(isset($_POST['7as4'])){$val['7as4']=$_POST['7as4'];}else{$val['7as4']="yes";}
               if(isset($_POST['7as5'])){$val['7as5']=$_POST['7as5'];}else{$val['7as5']="yes";}
               if(isset($_POST['7as6'])){$val['7as6']=$_POST['7as6'];}else{$val['7as6']="yes";}
               if(isset($_POST['7as7'])){$val['7as7']=$_POST['7as7'];}else{$val['7as7']="yes";}
               if(isset($_POST['7as8'])){$val['7as8']=$_POST['7as8'];}else{$val['7as8']="yes";}
               $limite=36;
               break;
         case 8:
               //Obtener los valores
               if(isset($_POST['8mg1'])){$val['8mg1']=$_POST['8mg1'];}else{$val['8mg1']="yes";}
               if(isset($_POST['8mg2'])){$val['8mg2']=$_POST['8mg2'];}else{$val['8mg2']="yes";}
               if(isset($_POST['8mg3'])){$val['8mg3']=$_POST['8mg3'];}else{$val['8mg3']="yes";}

               if(isset($_POST['8mf1'])){$val['8mf1']=$_POST['8mf1'];}else{$val['8mf1']="yes";}
               if(isset($_POST['8mf2'])){$val['8mf2']=$_POST['8mf2'];}else{$val['8mf2']="yes";}
               if(isset($_POST['8mf3'])){$val['8mf3']=$_POST['8mf3'];}else{$val['8mf3']="yes";}
               if(isset($_POST['8mf4'])){$val['8mf4']=$_POST['8mf4'];}else{$val['8mf4']="yes";}
               if(isset($_POST['8mf5'])){$val['8mf5']=$_POST['8mf5'];}else{$val['8mf5']="yes";}

               if(isset($_POST['8cm1'])){$val['8cm1']=$_POST['8cm1'];}else{$val['8cm1']="yes";}
               if(isset($_POST['8cm2'])){$val['8cm2']=$_POST['8cm2'];}else{$val['8cm2']="yes";}
               if(isset($_POST['8cm3'])){$val['8cm3']=$_POST['8cm3'];}else{$val['8cm3']="yes";}

               if(isset($_POST['8cg1'])){$val['8cg1']=$_POST['8cg1'];}else{$val['8cg1']="yes";}
               if(isset($_POST['8cg2'])){$val['8cg2']=$_POST['8cg2'];}else{$val['8cg2']="yes";}
               if(isset($_POST['8cg3'])){$val['8cg3']=$_POST['8cg3'];}else{$val['8cg3']="yes";}
               if(isset($_POST['8cg4'])){$val['8cg4']=$_POST['8cg4'];}else{$val['8cg4']="yes";}
               if(isset($_POST['8cg5'])){$val['8cg5']=$_POST['8cg5'];}else{$val['8cg5']="yes";}
               if(isset($_POST['8cg6'])){$val['8cg6']=$_POST['8cg6'];}else{$val['8cg6']="yes";}

               if(isset($_POST['8as1'])){$val['8as1']=$_POST['8as1'];}else{$val['8as1']="yes";}
               if(isset($_POST['8as2'])){$val['8as2']=$_POST['8as2'];}else{$val['8as2']="yes";}
               if(isset($_POST['8as3'])){$val['8as3']=$_POST['8as3'];}else{$val['8as3']="yes";}
               if(isset($_POST['8as4'])){$val['8as4']=$_POST['8as4'];}else{$val['8as4']="yes";}
               if(isset($_POST['8as5'])){$val['8as5']=$_POST['8as5'];}else{$val['8as5']="yes";}
               if(isset($_POST['8as6'])){$val['8as6']=$_POST['8as6'];}else{$val['8as6']="yes";}
               $limite=23;
               break;
       }
       $acum=0;
       //Contar el número de items aceptados, si todos están aceptados se valida la etapa, sino se rechazan los items pertinentes
       foreach ($val as $key => $value) {
         if($value=="ign")
           $acum++;
       }
       if($acum==$limite){
         //Validar etapa
         $sqlUpdate=mysqli_query($conexion,"UPDATE checklist SET ".$info."ok='1' WHERE idMen='$idm'");
         $conexion->query($sqlUpdate);
         foreach ($val as $key => $value) {
           $sqlRegister=mysqli_query($conexion,"UPDATE historialchecklist SET observ=1, fecha='$fechaAct', estatus=2 WHERE idMenor='$idm' AND etapa='$key'");
           $conexion->query($sqlRegister);
         }
       }else {
         //Actualizar checklist e historialchecklist
         foreach ($val as $key => $value) {
           if($value!="ign"){
             $sqlCheck=mysqli_query($conexion,"SELECT * FROM historialchecklist WHERE idMenor='$idm' AND etapa='$key'");
             $check = mysqli_fetch_array($sqlCheck,MYSQLI_ASSOC);
             if($check){
               $sqlRegister=mysqli_query($conexion,"UPDATE historialchecklist SET observ=0, fecha='$fechaAct', estatus=0 WHERE idMenor='$idm' AND etapa='$key'");
             } else {
               $sqlRegister=mysqli_query($conexion,"INSERT INTO historialchecklist (idMenor,etapa,observ,fecha,estatus) VALUES ('$idm','$key','0','$fechaAct','0')");
             }
             $conexion->query($sqlRegister);
             $sqlUpdate=mysqli_query($conexion,"UPDATE checklist SET ".$key."='0' WHERE idMen='$idm'");
             $conexion->query($sqlUpdate);
           }
         }

       }

     }
     header('Location: '.$_SERVER['REQUEST_URI']);
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

    <style>
    #date  {
      color: green;
      font-size: 75%;
    }
    #rechazado  {
      color: red;
      font-size: 75%;
    }
    #verificado {
      color: blue;
      font-size: 75%;
    }
    </style>

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
            <a href="../../index.php" class="simple-text">
                DyFOMOAC<br>
                Maestro
            </a>
        </div>

        <ul class="nav">
          <li class="active">
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reportes</p>
              </a>
          </li>
          <li>
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

            <div class="col-md-12">
                <div class="card">

                    <div class="header">
                        <h4 class="title">Evaluación de <?php echo $nombreM." ".$apellidoM.". Edad: ".calc($fnac)?></h4>
                        <p class="category">Evalúa al menor, si es la primera vez que se evalúa podrá elegir la categoría en la que comenzará el menor, si no, le aparecerán los hitos de cada etapa en la que se encuentra el menor y si este tiene todos los hitos completos, usted podrá evaluar al menor para que este pase de etapa.</p>
                    </div>
                    <hr>
                    <div class="content">

                      <?php
                        if(!$checkExists){
                      ?>
                      <h4>Etapas</h4>
                      <hr>
                      <h5>0 a 3 meses</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Mueve sus brazos y piernas de forma espontánea.</li>
                              <li>Sostiene su cabeza por algunos segundos.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Se lleva la mano a la boca.</li>
                              <li>Observa sus manos cuando las está moviendo.</li>
                              <li>Abre y cierra las manos.</li>
                              <li>Empuña objetos de diferentes dimensiones y texturas.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Hace algún ruido con la boca, llora cuando está incómodo o quiere comer algo.</li>
                              <li>Te responde con sonidos o gestos cuando le hablas.</li>
                              <li>Inicia el balbuceo con “agu” o “ga”.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Reacciona corporalmente a sonidos externos.</li>
                              <li>Fija su mirada en un objeto cuando se lo muestras y lo sigue cuando lo mueves.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Cuando llora, se tranquiliza si le hablas, lo cargas y acaricias.</li>
                              <li>Te mira a los ojos cuando estás frente a él y le hablas.</li>
                              <li>Llora, ríe y se mueve para expresar placer y displacer.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>3 a 6 meses</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Se voltea hacia un lado o hacia el otro cuando está acostado boca arriba.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Estando acostado boca abajo, se estira para alcanzar un objeto con ambas manos.</li>
                              <li>Junta las manos.</li>
                              <li>Extiende su brazo cuando quiere tomar un objeto que llama su atención.</li>
                              <li>Sostiene con la mano un objeto que ledas por algunos segundos.</li>
                              <li>Cuando agarra algún objeto, puede pasarlo de una mano a la otra.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Mueve la cabeza en dirección a tu voz aunque no pueda verte.</li>
                              <li>Emite sonidos como “le”, “be”, “pa”, “gu”.</li>
                              <li>Repite los sonidos que imitas de él.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Sabe que lo vas a alimentar cuando observa tu pecho.</li>
                              <li>Mueve la cabeza para seguir un objeto que se mueve frente a él hasta que desaparece.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Sonríe al ver personas que le son familiares.</li>
                              <li>Cambia sus estados de ánimo dependiendo de lo que sucede a su alrededor.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>6 a 9 meses</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Se voltea para quedar boca abajo cuando está acostado boca arriba.</li>
                              <li>Se arrastra para ir a otro lugar o alcanzar un objeto que le interesa.</li>
                              <li>Se mantiene sentado.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Cuando quiere agarrar las cosas utiliza sus dedos como si fuera un rastrillo.</li>
                              <li>Aprieta objetos suaves que tiene en la mano.</li>
                              <li>Golpea objetos contra la mesa o el suelo.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Hace dos sonidos iguales como “ba-ba”, “da-da”, “ta-ta”.</li>
                              <li>Hace gestos y sonidos para pedir lo que quiere.</li>
                              <li>Intenta imitar los sonidos que escucha.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Percibe los sonidos y/o ruidos de su entorno y presta atención a ellos.</li>
                              <li>Descubre los objetos que producen algún ruido.</li>
                              <li>Observa los objetos que manipula y los deja caer al suelo.</li>
                              <li>Reconoce su imagen en el espejo.</li>
                              <li>Encuentra objetos que no están del todo escondidos.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Se muestra inquieto cuando no estás cerca.</li>
                              <li>Reacciona con expresiones de alegría cuando está contigo o con personas conocidas.</li>
                              <li>Repite acciones que causan simpatía a los demás.</li>
                              <li>Demuestra agrado y desagrado con gestos.</li>
                              <li>Se alimenta llevándose la comida con las manos o sosteniendo el biberón o vaso.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>9 a 12 meses</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Gatea para desplazarse.</li>
                              <li>Mantiene el equilibrio cuando está hincado.</li>
                              <li>Se pone de pie con apoyo.</li>
                              <li>Se mantiene parado sin apoyo.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Jala, empuja o rueda objetos.</li>
                              <li>Sabe aplaudir.</li>
                              <li>Sujeta un objeto en cada mano y suelta uno al darle un tercero.</li>
                              <li>Se jala los calcetines.</li>
                              <li>Sujeta un objeto pequeño con los dedos pulgar e índice y lo mantiene en el centro de la mano.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Reproduce sonidos, sílabas o palabras imitando al adulto o cuando las escucha.</li>
                              <li>Señala y vocaliza para pedir lo que quiere.</li>
                              <li>Deja de hacer alguna actividad cuando le dices “no”.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Explora todo lo que hay a su alrededor.</li>
                              <li>Imita gestos y movimientos.</li>
                              <li>Hace sonar los objetos que tiene en sus manos juntándolos.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Te señala cuando le preguntan por ti.</li>
                              <li>Mantiene o rechaza a las personas que se le acercan.</li>
                              <li>Colabora a la hora de vestirse y desvestirse.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>12 a 18 meses</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Camina hacia los lados apoyándose de un mueble.</li>
                              <li>Puede pararse cuando está sentado.</li>
                              <li>Camina.</li>
                              <li>Se agacha para coger un objeto que está en el suelo.</li>
                              <li>Corre con poca coordinación.</li>
                              <li>Patea una pelota.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Saca y mete objetos de un recipiente.</li>
                              <li>Coge una crayola con los dedos.</li>
                              <li>Coloca cubos u objetos uno encima del otro.</li>
                              <li>Puede tomar un pedazo pequeño de comida utilizando las yemas de los dedos.</li>
                              <li>Bebe de un vaso entrenador.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Identifica objetos y animales conocidos, por el ruido que producen.</li>
                              <li>Dice el nombre de los objetos que señala.</li>
                              <li>Dice más de cuatro palabras además de papá y mamá, por ejemplo: pan, mesa, carro, leche, pelota, perro.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Establece contacto visual con su cuidador, cuando éste le habla.</li>
                              <li>Señala dos partes del cuerpo cuando se le nombra.</li>
                              <li>Encuentra fácilmente objetos que le escondes en su presencia.</li>
                              <li>Usa algunos objetos de acuerdo a su función.</li>
                              <li>Puede seguir una instrucción simple como: dame las llaves, lleva tu juguete.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Se muestra tímido en presencia de personas desconocidas algunas veces.</li>
                              <li>Puede alejarse de ti un poco y permanecer tranquilo.</li>
                              <li>Saluda, hace ojitos, da abrazos y manda besos.</li>
                              <li>Juega solo.</li>
                              <li>Come sin que alguien le ayude.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>18 a 24 meses</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Se sube solo a los muebles.</li>
                              <li>Corre de forma coordinada y sin caerse.</li>
                              <li>Patea una pelota sin perder el equilibrio.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Desenvuelve un dulce.</li>
                              <li>Garabatea.</li>
                              <li>Bebe de un vaso.</li>
                              <li>Enrosca y desenrosca la tapa de un frasco.</li>
                              <li>Utiliza herramientas para comer.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Dice más de diez palabras como: pan, silla, mesa, carro, leche, pelota, perro, taza, agua, dulce, gato, galleta, muñeco, jugo, niño, zapato, globo.</li>
                              <li>Dice frases de dos palabras como: mamá leche, perro bonito.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Reconoce e identifica el nombre de los objetos más comunes.</li>
                              <li>Busca alternativas para alcanzar algo.</li>
                              <li>Clasifica objetos de acuerdo a sus características.</li>
                              <li>Obedece órdenes un poco más complejas como: pon la pluma sobre la mesa, levanta los brazos, trae el muñeco, abre la puerta.</li>
                              <li>Señala tres o más partes del cuerpo cuando se le nombran.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Expresa emociones como tristeza, alegría, enojo, vergüenza y las reconoce en los otros.</li>
                              <li>Imita lo que hacen otros niños.</li>
                              <li>Comienza a participar en hábitos de alimentación e higiene.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>2 a 3 años</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Puede agacharse fácilmente hacia delante sin caerse.</li>
                              <li>Se para sobre un solo pie.</li>
                              <li>Salta con ambos pies.</li>
                              <li>Sube las escaleras con tu ayuda.</li>
                              <li>Camina en puntas.</li>
                              <li>Camina hacia atrás.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Lanza una pelota chica con la mano.</li>
                              <li>Abre un frasco.</li>
                              <li>Arruga papel.</li>
                              <li>Vacía líquidos de un recipiente de boca chica a uno de boca grande.</li>
                              <li>Puede abrochar alguno de sus botones cuando se viste.</li>
                              <li>Toma los objetos utilizando dedo índice y pulgar.</li>
                              <li>Pasa las páginas de un cuento, revista o libro.</li>
                              <li>Puede meter piedritas o semillas en un frasco de boca chica.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Sabe decir su nombre.</li>
                              <li>Utiliza pronombres como yo, él, tú.</li>
                              <li>Arma frases de tres palabras como: “quiero mi pelota”, “dame mi leche”.</li>
                              <li>Su lenguaje es comprensible para las demás personas.</li>
                              <li>Dice su edad.</li>
                              <li>Utiliza palabras en plural cuando habla: perros, juguetes, niños, etc.</li>
                              <li>Intenta contar algo que pasó o vio.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Juega a esconderse para que lo busques.</li>
                              <li>Sabe diferenciar el día de la noche por las actividades que realiza.</li>
                              <li>Identifica diferentes sonidos y menciona de qué son.</li>
                              <li>Identifica gestos en imágenes de cuentos y los imita.</li>
                              <li>Comprende cuando le dices arribaabajo, grande-chico, adentro-afuera, adelante-atrás, grueso-delgado, rápido-lento, lleno-vacío en alguna acción.</li>
                              <li>Reconoce los pares de objetos cuando juega memorama.</li>
                              <li>Arma torres.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Identifica sus emociones en dibujos, caritas y recortes.</li>
                              <li>Le gusta imitar las tareas de casa como: guardar sus juguetes, barrer, sacudir o limpiar con un trapo.</li>
                              <li>Se lava las manos y la cara solo.</li>
                              <li>Entiende la diferencia entre mío y tuyo.</li>
                              <li>Dice gracias y por favor.</li>
                              <li>Juega con otros niños.</li>
                              <li>Manifiesta inconformidad para prestar sus juguetes y compartir el espacio en el que está.</li>
                              <li>Controla esfínteres durante el día y avisa para que lo lleven al baño.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <h5>3 a 4 años</h5>

                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Gruesa</h6>
                            <ul>
                              <li>Puede cachar una pelota.</li>
                              <li>Salta en un solo pie.</li>
                              <li>Sube y baja escaleras sin apoyarse de la pared o del barandal.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <ul>
                              <li>Puede meter una agujeta o cordón por los agujeros de una cuenta.</li>
                              <li>Copia una cruz y un círculo.</li>
                              <li>Dibuja una cruz y un círculo.</li>
                              <li>Dibuja una persona con dos o más partes del cuerpo.</li>
                              <li>Recorta con tijeras.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <ul>
                              <li>Cuenta cuentos con ayuda de imágenes.</li>
                              <li>Usa la mayor parte de las palabras que tú usas.</li>
                              <li>Usa palabras que tengan relación con el tiempo aunque a veces no las emplee correctamente.</li>
                            </ul>
                          </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Cognitiva</h6>
                            <ul>
                              <li>Presta atención durante tres o más minutos en una actividad.</li>
                              <li>Sigue una secuencia de color y tamaño con bloques o cuentas.</li>
                              <li>Puede contarte partes de una historia o cuento que le hayas narrado.</li>
                              <li>Reconoce algunos colores.</li>
                              <li>Arma rompecabezas.</li>
                              <li>Escoge el par que corresponde a un círculo, a un cuadrado y a un triángulo.</li>
                            </ul>
                          </div>
                      </div>

                      <div class="col-md-4">
                          <div class="form-group">
                            <h6>Afectivo - Social</h6>
                            <ul>
                              <li>Dice su nombre, apellido y edad.</li>
                              <li>Muestra temor, alegría, pena, rebeldía.</li>
                              <li>Juega con otros niños al papá y a la mamá, al doctor y/o policías y ladrones.</li>
                              <li>Respeta reglas de convivencia, tiempos y turnos.</li>
                              <li>Puede vestirse y desvestirse solo.</li>
                              <li>Va al baño solo, bajo tu supervisión y no utiliza pañal durante el día.</li>
                            </ul>
                          </div>
                        </div>
                      </div>

                      <hr>

                      <p>Elige la etapa del menor</p>
                      <form method="post">
                        <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                               <label>Etapa</label>
                               <br>
                               <select name="select">
                                 <option value="" ="" selected>Selecciona una etapa</option >
                                 <option value="1">0 a 3 meses</option>
                                 <option value="2">3 a 6 meses</option>
                                 <option value="3">6 a 9 meses</option>
                                 <option value="4">9 a 12 meses</option>
                                 <option value="5">12 a 18 meses</option>
                                 <option value="6">18 a 24 meses</option>
                                 <option value="7">2 a 3 años</option>
                                 <option value="8">3 a 4 años</option>
                               </select>
                           </div>
                       </div>
                     </div>
                        <input type="hidden" name="info" value="inicial"/>
                        <button type="submit" class="btn btn-info btn-fill pull-left">Subir etapa</button>
                        <br><br>
                        <font color="green"> <?php echo @$avisos["veriEtapa"]?></font>
                        <font color="red"> <?php echo @$avisos["errEtapa"]?></font>
                      </form>
                      <div class="clearfix"></div>
                      <?php
                    } else {
                      //Algoritmo para etapa está arriba
                      ?>

                      <h4>Etapa: 0 a 3 meses</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['1mg1']){ ?>
                              <input type="checkbox" name="1mg1" value="ign" checked>Mueve sus brazos y piernas de forma espontánea.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1mg1" value="yes" disabled>Mueve sus brazos y piernas de forma espontánea.<br>
                              <?php } ?>

                              <?php status('1mg1',$idm); ?>

                              <?php if($checkExists['1mg2']){ ?>
                              <input type="checkbox" name="1mg2" value="ign" checked>Sostiene su cabeza por algunos segundos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1mg2" value="yes" disabled>Sostiene su cabeza por algunos segundos.<br>
                              <?php } ?>

                              <?php status('1mg2',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Matriz Fina</h6>
                            <?php if($checkExists['1mf1']){ ?>
                            <input type="checkbox" name="1mf1" value="ign" checked>Se lleva la mano a la boca.<br>
                            <?php } else { ?>
                            <input type="checkbox" name="1mf1" value="yes" disabled>Se lleva la mano a la boca.<br>
                            <?php } ?>

                            <?php status('1mf1',$idm); ?>

                            <?php if($checkExists['1mf2']){ ?>
                            <input type="checkbox" name="1mf2" value="ign" checked>Observa sus manos cuando las está moviendo.<br>

                            <?php } else { ?>
                            <input type="checkbox" name="1mf2" value="yes" disabled>Observa sus manos cuando las está moviendo.<br>
                            <?php } ?>

                            <?php status('1mf2',$idm); ?>

                            <?php if($checkExists['1mf3']){ ?>
                            <input type="checkbox" name="1mf3" value="ign" checked>Abre y cierra las manos.<br>
                            <?php } else { ?>
                            <input type="checkbox" name="1mf3" value="yes" disabled>Abre y cierra las manos.<br>
                            <?php } ?>

                            <?php status('1mf3',$idm); ?>

                            <?php if($checkExists['1mf4']){ ?>
                            <input type="checkbox" name="1mf4" value="ign" checked>Empuña objetos de diferentes dimensiones y texturas.<br>
                            <?php } else { ?>
                            <input type="checkbox" name="1mf4" value="yes" disabled>Empuña objetos de diferentes dimensiones y texturas.<br>
                            <?php } ?>

                            <?php status('1mf4',$idm); ?>

                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <h6>Comunicación</h6>
                            <?php if($checkExists['1cm1']){ ?>
                            <input type="checkbox" name="1cm1" value="ign" checked>Hace algún ruido con la boca, llora cuando está incómodo o quiere comer algo.<br>
                            <?php } else { ?>
                            <input type="checkbox" name="1cm1" value="yes" disabled>Hace algún ruido con la boca, llora cuando está incómodo o quiere comer algo.<br>
                            <?php } ?>

                            <?php status('1cm1',$idm); ?>

                            <?php if($checkExists['1cm2']){ ?>
                            <input type="checkbox" name="1cm2" value="ign" checked>Te responde con sonidos o gestos cuando le hablas.<br>
                            <?php } else { ?>
                            <input type="checkbox" name="1cm2" value="yes" disabled>Te responde con sonidos o gestos cuando le hablas.<br>
                            <?php } ?>

                            <?php status('1cm2',$idm); ?>

                            <?php if($checkExists['1cm3']){ ?>
                            <input type="checkbox" name="1cm3" value="ign" checked>Inicia el balbuceo con “agu” o “ga”.<br>
                            <?php } else { ?>
                            <input type="checkbox" name="1cm3" value="yes" disabled>Inicia el balbuceo con “agu” o “ga”.<br>
                            <?php } ?>

                            <?php status('1cm3',$idm); ?>

                          </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Cognitiva</h6>
                              <?php if($checkExists['1cg1']){ ?>
                              <input type="checkbox" name="1cg1" value="ign" checked>Reacciona corporalmente a sonidos externos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1cg1" value="yes" disabled>Reacciona corporalmente a sonidos externos.<br>
                              <?php } ?>

                              <?php status('1cg1',$idm); ?>

                              <?php if($checkExists['1cg2']){ ?>
                              <input type="checkbox" name="1cg2" value="ign" checked>Fija su mirada en un objeto cuando se lo muestras y lo sigue cuando lo mueves.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1cg2" value="yes" disabled>Fija su mirada en un objeto cuando se lo muestras y lo sigue cuando lo mueves.<br>
                              <?php } ?>

                              <?php status('1cg2',$idm); ?>

                            </div>
                          </div>

                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Afectivo - Social</h6>
                              <?php if($checkExists['1as1']){ ?>
                              <input type="checkbox" name="1as1" value="ign" checked>Cuando llora, se tranquiliza si le hablas, lo cargas y acaricias.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1as1" value="yes" disabled>Cuando llora, se tranquiliza si le hablas, lo cargas y acaricias.<br>
                              <?php } ?>

                              <?php status('1as1',$idm); ?>

                              <?php if($checkExists['1as2']){ ?>
                              <input type="checkbox" name="1as2" value="ign" checked>Te mira a los ojos cuando estás frente a él y le hablas.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1as2" value="yes" disabled>Te mira a los ojos cuando estás frente a él y le hablas.<br>
                              <?php } ?>

                              <?php status('1as2',$idm); ?>

                              <?php if($checkExists['1as3']){ ?>
                              <input type="checkbox" name="1as3" value="ign" checked>Llora, ríe y se mueve para expresar placer y displacer.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="1as3" value="yes" disabled>Llora, ríe y se mueve para expresar placer y displacer.<br>
                              <?php } ?>

                              <?php status('1as3',$idm); ?>

                            </div>
                          </div>

                        </div>
                        <input type="hidden" name="info" value="1"/>
                        <?php if($checkExists["1ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(1,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 3 a 6 meses</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['2mg1']){ ?>
                              <input type="checkbox" name="2mg1" value="ign" checked>Se voltea hacia un lado o hacia el otro cuando está acostado boca arriba.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2mg1" value="yes" disabled>Se voltea hacia un lado o hacia el otro cuando está acostado boca arriba.<br>
                              <?php } ?>

                              <?php status('2mg1',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['2mf1']){ ?>
                              <input type="checkbox" name="2mf1" value="ign" checked>Estando acostado boca abajo, se estira para alcanzar un objeto con ambas manos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2mf1" value="yes" disabled>Estando acostado boca abajo, se estira para alcanzar un objeto con ambas manos.<br>
                              <?php } ?>

                              <?php status('2mf1',$idm); ?>

                              <?php if($checkExists['2mf2']){ ?>
                              <input type="checkbox" name="2mf2" value="ign" checked>Junta las manos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2mf2" value="yes" disabled>Junta las manos.<br>
                              <?php } ?>

                              <?php status('2mf2',$idm); ?>

                              <?php if($checkExists['2mf3']){ ?>
                              <input type="checkbox" name="2mf3" value="ign" checked>Extiende su brazo cuando quiere tomar un objeto que llama su atención.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2mf3" value="yes" disabled>Extiende su brazo cuando quiere tomar un objeto que llama su atención.<br>
                              <?php } ?>

                              <?php status('2mf3',$idm); ?>

                              <?php if($checkExists['2mf4']){ ?>
                              <input type="checkbox" name="2mf4" value="ign" checked>Sostiene con la mano un objeto que ledas por algunos segundos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2mf4" value="yes" disabled>Sostiene con la mano un objeto que ledas por algunos segundos.<br>
                              <?php } ?>

                              <?php status('2mf4',$idm); ?>

                              <?php if($checkExists['2mf5']){ ?>
                              <input type="checkbox" name="2mf5" value="ign" checked>Cuando agarra algún objeto, puede pasarlo de una mano a la otra.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2mf5" value="yes" disabled>Cuando agarra algún objeto, puede pasarlo de una mano a la otra.<br>
                              <?php } ?>

                              <?php status('2mf5',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['2cm1']){ ?>
                              <input type="checkbox" name="2cm1" value="ign" checked>Mueve la cabeza en dirección a tu voz aunque no pueda verte.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2cm1" value="yes" disabled>Mueve la cabeza en dirección a tu voz aunque no pueda verte.<br>
                              <?php } ?>

                              <?php status('2cm1',$idm); ?>

                              <?php if($checkExists['2cm2']){ ?>
                              <input type="checkbox" name="2cm2" value="ign" checked>Emite sonidos como “le”, “be”, “pa”, “gu”.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2cm2" value="yes" disabled>Emite sonidos como “le”, “be”, “pa”, “gu”.<br>
                              <?php } ?>

                              <?php status('2cm2',$idm); ?>

                              <?php if($checkExists['2cm3']){ ?>
                              <input type="checkbox" name="2cm3" value="ign" checked>Repite los sonidos que imitas de él.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="2cm3" value="yes" disabled>Repite los sonidos que imitas de él.<br>
                              <?php } ?>

                              <?php status('2cm3',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['2cg1']){ ?>
                                <input type="checkbox" name="2cg1" value="ign" checked>Sabe que lo vas a alimentar cuando observa tu pecho.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="2cg1" value="yes" disabled>Sabe que lo vas a alimentar cuando observa tu pecho.<br>
                                <?php } ?>

                                <?php status('2cg1',$idm); ?>

                                <?php if($checkExists['2cg2']){ ?>
                                <input type="checkbox" name="2cg2" value="ign" checked>Mueve la cabeza para seguir un objeto que se mueve frente a él hasta que desaparece.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="2cg2" value="yes" disabled>Mueve la cabeza para seguir un objeto que se mueve frente a él hasta que desaparece.<br>
                                <?php } ?>

                                <?php status('2cg2',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['2as1']){ ?>
                                <input type="checkbox" name="2as1" value="ign" checked>Sonríe al ver personas que le son familiares.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="2as1" value="yes" disabled>Sonríe al ver personas que le son familiares.<br>
                                <?php } ?>

                                <?php status('2as1',$idm); ?>

                                <?php if($checkExists['2as2']){ ?>
                                <input type="checkbox" name="2as2" value="ign" checked>Cambia sus estados de ánimo dependiendo de lo que sucede a su alrededor.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="2as2" value="yes" disabled>Cambia sus estados de ánimo dependiendo de lo que sucede a su alrededor.<br>
                                <?php } ?>

                                <?php status('2as2',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="2"/>
                        <?php if($checkExists["2ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(2,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 6 a 9 meses</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['3mg1']){ ?>
                              <input type="checkbox" name="3mg1" value="ign" checked>Se voltea para quedar boca abajo cuando está acostado boca arriba.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3mg1" value="yes" disabled>Se voltea para quedar boca abajo cuando está acostado boca arriba.<br>
                              <?php } ?>

                              <?php status('3mg1',$idm); ?>

                              <?php if($checkExists['3mg2']){ ?>
                              <input type="checkbox" name="3mg2" value="ign" checked>Se arrastra para ir a otro lugar o alcanzar un objeto que le interesa.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3mg2" value="yes" disabled>Se arrastra para ir a otro lugar o alcanzar un objeto que le interesa.<br>
                              <?php } ?>

                              <?php status('3mg2',$idm); ?>

                              <?php if($checkExists['3mg3']){ ?>
                              <input type="checkbox" name="3mg3" value="ign" checked>Se mantiene sentado.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3mg3" value="yes" disabled>Se mantiene sentado.<br>
                              <?php } ?>

                              <?php status('3mg3',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['3mf1']){ ?>
                              <input type="checkbox" name="3mf1" value="ign" checked>Cuando quiere agarrar las cosas utiliza sus dedos como si fuera un rastrillo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3mf1" value="yes" disabled>Cuando quiere agarrar las cosas utiliza sus dedos como si fuera un rastrillo.<br>
                              <?php } ?>

                              <?php status('3mf1',$idm); ?>

                              <?php if($checkExists['3mf2']){ ?>
                              <input type="checkbox" name="3mf2" value="ign" checked>Aprieta objetos suaves que tiene en la mano.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3mf2" value="yes" disabled>Aprieta objetos suaves que tiene en la mano.<br>
                              <?php } ?>

                              <?php status('3mf2',$idm); ?>

                              <?php if($checkExists['3mf3']){ ?>
                              <input type="checkbox" name="3mf3" value="ign" checked>Golpea objetos contra la mesa o el suelo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3mf3" value="yes" disabled>Golpea objetos contra la mesa o el suelo.<br>
                              <?php } ?>

                              <?php status('3mf3',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['3cm1']){ ?>
                              <input type="checkbox" name="3cm1" value="ign" checked>Hace dos sonidos iguales como “ba-ba”, “da-da”, “ta-ta”.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3cm1" value="yes" disabled>Hace dos sonidos iguales como “ba-ba”, “da-da”, “ta-ta”.<br>
                              <?php } ?>

                              <?php status('3cm1',$idm); ?>

                              <?php if($checkExists['3cm2']){ ?>
                              <input type="checkbox" name="3cm2" value="ign" checked>Hace gestos y sonidos para pedir lo que quiere.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3cm2" value="yes" disabled>Hace gestos y sonidos para pedir lo que quiere.<br>
                              <?php } ?>

                              <?php status('3cm2',$idm); ?>

                              <?php if($checkExists['3cm3']){ ?>
                              <input type="checkbox" name="3cm3" value="ign" checked>Intenta imitar los sonidos que escucha.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="3cm3" value="yes" disabled>Intenta imitar los sonidos que escucha.<br>
                              <?php } ?>

                              <?php status('3cm3',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['3cg1']){ ?>
                                <input type="checkbox" name="3cg1" value="ign" checked>Percibe los sonidos y/o ruidos de su entorno y presta atención a ellos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3cg1" value="yes" disabled>Percibe los sonidos y/o ruidos de su entorno y presta atención a ellos.<br>
                                <?php } ?>

                                <?php status('3cg1',$idm); ?>

                                <?php if($checkExists['3cg2']){ ?>
                                <input type="checkbox" name="3cg2" value="ign" checked>Descubre los objetos que producen algún ruido.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3cg2" value="yes" disabled>Descubre los objetos que producen algún ruido.<br>
                                <?php } ?>

                                <?php status('3cg2',$idm); ?>

                                <?php if($checkExists['3cg3']){ ?>
                                <input type="checkbox" name="3cg3" value="ign" checked>Observa los objetos que manipula y los deja caer al suelo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3cg3" value="yes" disabled>Observa los objetos que manipula y los deja caer al suelo.<br>
                                <?php } ?>

                                <?php status('3cg3',$idm); ?>

                                <?php if($checkExists['3cg4']){ ?>
                                <input type="checkbox" name="3cg4" value="ign" checked>Reconoce su imagen en el espejo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3cg4" value="yes" disabled>Reconoce su imagen en el espejo.<br>
                                <?php } ?>

                                <?php status('3cg4',$idm); ?>

                                <?php if($checkExists['3cg5']){ ?>
                                <input type="checkbox" name="3cg5" value="ign" checked>Encuentra objetos que no están del todo escondidos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3cg5" value="yes" disabled>Encuentra objetos que no están del todo escondidos.<br>
                                <?php } ?>

                                <?php status('3cg5',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['3as1']){ ?>
                                <input type="checkbox" name="3as1" value="ign" checked>Se muestra inquieto cuando no estás cerca.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3as1" value="yes" disabled>Se muestra inquieto cuando no estás cerca.<br>
                                <?php } ?>

                                <?php status('3as1',$idm); ?>

                                <?php if($checkExists['3as2']){ ?>
                                <input type="checkbox" name="3as2" value="ign" checked>Reacciona con expresiones de alegría cuando está contigo o con personas conocidas.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3as2" value="yes" disabled>Reacciona con expresiones de alegría cuando está contigo o con personas conocidas.<br>
                                <?php } ?>

                                <?php status('3as2',$idm); ?>

                                <?php if($checkExists['3as3']){ ?>
                                <input type="checkbox" name="3as3" value="ign" checked>Repite acciones que causan simpatía a los demás.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3as3" value="yes" disabled>Repite acciones que causan simpatía a los demás.<br>
                                <?php } ?>

                                <?php status('3as3',$idm); ?>

                                <?php if($checkExists['3as4']){ ?>
                                <input type="checkbox" name="3as4" value="ign" checked>Demuestra agrado y desagrado con gestos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3as4" value="yes" disabled>Demuestra agrado y desagrado con gestos.<br>
                                <?php } ?>

                                <?php status('3as4',$idm); ?>

                                <?php if($checkExists['3as5']){ ?>
                                <input type="checkbox" name="3as5" value="ign" checked>Se alimenta llevándose la comida con las manos o sosteniendo el biberón o vaso.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="3as5" value="yes" disabled>Se alimenta llevándose la comida con las manos o sosteniendo el biberón o vaso.<br>
                                <?php } ?>

                                <?php status('3as5',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="3"/>
                        <?php if($checkExists["3ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(3,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 9 a 12 meses</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['4mg1']){ ?>
                              <input type="checkbox" name="4mg1" value="ign" checked>Gatea para desplazarse.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mg1" value="yes" disabled>Gatea para desplazarse.<br>
                              <?php } ?>

                              <?php status('4mg1',$idm); ?>

                              <?php if($checkExists['4mg2']){ ?>
                              <input type="checkbox" name="4mg2" value="ign" checked>Mantiene el equilibrio cuando está hincado.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mg2" value="yes" disabled>Mantiene el equilibrio cuando está hincado.<br>
                              <?php } ?>

                              <?php status('4mg2',$idm); ?>

                              <?php if($checkExists['4mg3']){ ?>
                              <input type="checkbox" name="4mg3" value="ign" checked>Se pone de pie con apoyo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mg3" value="yes" disabled>Se pone de pie con apoyo.<br>
                              <?php } ?>

                              <?php status('4mg3',$idm); ?>

                              <?php if($checkExists['4mg4']){ ?>
                              <input type="checkbox" name="4mg4" value="ign" checked>Se mantiene parado sin apoyo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mg4" value="yes" disabled>Se mantiene parado sin apoyo.<br>
                              <?php } ?>

                              <?php status('4mg4',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['4mf1']){ ?>
                              <input type="checkbox" name="4mf1" value="ign" checked>Jala, empuja o rueda objetos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mf1" value="yes" disabled>Jala, empuja o rueda objetos.<br>
                              <?php } ?>

                              <?php status('4mf1',$idm); ?>

                              <?php if($checkExists['4mf2']){ ?>
                              <input type="checkbox" name="4mf2" value="ign" checked>Sabe aplaudir.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mf2" value="yes" disabled>Sabe aplaudir.<br>
                              <?php } ?>

                              <?php status('4mf2',$idm); ?>

                              <?php if($checkExists['4mf3']){ ?>
                              <input type="checkbox" name="4mf3" value="ign" checked>Sujeta un objeto en cada mano y suelta uno al darle un tercero.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mf3" value="yes" disabled>Sujeta un objeto en cada mano y suelta uno al darle un tercero.<br>
                              <?php } ?>

                              <?php status('4mf3',$idm); ?>

                              <?php if($checkExists['4mf4']){ ?>
                              <input type="checkbox" name="4mf4" value="ign" checked>Se jala los calcetines.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mf4" value="yes" disabled>Se jala los calcetines.<br>
                              <?php } ?>

                              <?php status('4mf4',$idm); ?>

                              <?php if($checkExists['4mf5']){ ?>
                              <input type="checkbox" name="4mf5" value="ign" checked>Sujeta un objeto pequeño con los dedos pulgar e índice y lo mantiene en el centro de la mano.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4mf5" value="yes" disabled>Sujeta un objeto pequeño con los dedos pulgar e índice y lo mantiene en el centro de la mano.<br>
                              <?php } ?>

                              <?php status('4mf5',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['4cm1']){ ?>
                              <input type="checkbox" name="4cm1" value="ign" checked>Reproduce sonidos, sílabas o palabras imitando al adulto o cuando las escucha.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4cm1" value="yes" disabled>Reproduce sonidos, sílabas o palabras imitando al adulto o cuando las escucha.<br>
                              <?php } ?>

                              <?php status('4cm1',$idm); ?>

                              <?php if($checkExists['4cm2']){ ?>
                              <input type="checkbox" name="4cm2" value="ign" checked>Señala y vocaliza para pedir lo que quiere.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4cm2" value="yes" disabled>Señala y vocaliza para pedir lo que quiere.<br>
                              <?php } ?>

                              <?php status('4cm2',$idm); ?>

                              <?php if($checkExists['4cm3']){ ?>
                              <input type="checkbox" name="4cm3" value="ign" checked>Deja de hacer alguna actividad cuando le dices “no”.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="4cm3" value="yes" disabled>Deja de hacer alguna actividad cuando le dices “no”.<br>
                              <?php } ?>

                              <?php status('4cm3',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['4cg1']){ ?>
                                <input type="checkbox" name="4cg1" value="ign" checked>Explora todo lo que hay a su alrededor.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="4cg1" value="yes" disabled>Explora todo lo que hay a su alrededor.<br>
                                <?php } ?>

                                <?php status('4cg1',$idm); ?>

                                <?php if($checkExists['4cg2']){ ?>
                                <input type="checkbox" name="4cg2" value="ign" checked>Imita gestos y movimientos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="4cg2" value="yes" disabled>Imita gestos y movimientos.<br>
                                <?php } ?>

                                <?php status('4cg2',$idm); ?>

                                <?php if($checkExists['4cg3']){ ?>
                                <input type="checkbox" name="4cg3" value="ign" checked>Hace sonar los objetos que tiene en sus manos juntándolos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="4cg3" value="yes" disabled>Hace sonar los objetos que tiene en sus manos juntándolos.<br>
                                <?php } ?>

                                <?php status('4cg3',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['4as1']){ ?>
                                <input type="checkbox" name="4as1" value="ign" checked>Te señala cuando le preguntan por ti.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="4as1" value="yes" disabled>Te señala cuando le preguntan por ti.<br>
                                <?php } ?>

                                <?php status('4as1',$idm); ?>

                                <?php if($checkExists['4as2']){ ?>
                                <input type="checkbox" name="4as2" value="ign" checked>Mantiene o rechaza a las personas que se le acercan.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="4as2" value="yes" disabled>Mantiene o rechaza a las personas que se le acercan.<br>
                                <?php } ?>

                                <?php status('4as2',$idm); ?>

                                <?php if($checkExists['4as3']){ ?>
                                <input type="checkbox" name="4as3" value="ign" checked>Colabora a la hora de vestirse y desvestirse.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="4as3" value="yes" disabled>Colabora a la hora de vestirse y desvestirse.<br>
                                <?php } ?>

                                <?php status('4as3',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="4"/>
                        <?php if($checkExists["4ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(4,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 12 a 18 meses</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['5mg1']){ ?>
                              <input type="checkbox" name="5mg1" value="ign" checked>Camina hacia los lados apoyándose de un mueble.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mg1" value="yes" disabled>Camina hacia los lados apoyándose de un mueble.<br>
                              <?php } ?>

                              <?php status('5mg1',$idm); ?>

                              <?php if($checkExists['5mg2']){ ?>
                              <input type="checkbox" name="5mg2" value="ign" checked>Puede pararse cuando está sentado.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mg2" value="yes" disabled>Puede pararse cuando está sentado.<br>
                              <?php } ?>

                              <?php status('5mg2',$idm); ?>

                              <?php if($checkExists['5mg3']){ ?>
                              <input type="checkbox" name="5mg3" value="ign" checked>Camina.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mg3" value="yes" disabled>Camina.<br>
                              <?php } ?>

                              <?php status('5mg3',$idm); ?>

                              <?php if($checkExists['5mg4']){ ?>
                              <input type="checkbox" name="5mg4" value="ign" checked>Se agacha para coger un objeto que está en el suelo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mg4" value="yes" disabled>Se agacha para coger un objeto que está en el suelo.<br>
                              <?php } ?>

                              <?php status('5mg4',$idm); ?>

                              <?php if($checkExists['5mg5']){ ?>
                              <input type="checkbox" name="5mg5" value="ign" checked>Corre con poca coordinación.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mg5" value="yes" disabled>Corre con poca coordinación.<br>
                              <?php } ?>

                              <?php status('5mg5',$idm); ?>

                              <?php if($checkExists['5mg6']){ ?>
                              <input type="checkbox" name="5mg6" value="ign" checked>Patea una pelota.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mg6" value="yes" disabled>Patea una pelota.<br>
                              <?php } ?>

                              <?php status('5mg6',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['5mf1']){ ?>
                              <input type="checkbox" name="5mf1" value="ign" checked>Saca y mete objetos de un recipiente.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mf1" value="yes" disabled>Saca y mete objetos de un recipiente.<br>
                              <?php } ?>

                              <?php status('5mf1',$idm); ?>

                              <?php if($checkExists['5mf2']){ ?>
                              <input type="checkbox" name="5mf2" value="ign" checked>Coge una crayola con los dedos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mf2" value="yes" disabled>Coge una crayola con los dedos.<br>
                              <?php } ?>

                              <?php status('5mf2',$idm); ?>

                              <?php if($checkExists['5mf3']){ ?>
                              <input type="checkbox" name="5mf3" value="ign" checked>Coloca cubos u objetos uno encima del otro.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mf3" value="yes" disabled>Coloca cubos u objetos uno encima del otro.<br>
                              <?php } ?>

                              <?php status('5mf3',$idm); ?>

                              <?php if($checkExists['5mf4']){ ?>
                              <input type="checkbox" name="5mf4" value="ign" checked>Puede tomar un pedazo pequeño de comida utilizando las yemas de los dedos.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mf4" value="yes" disabled>Puede tomar un pedazo pequeño de comida utilizando las yemas de los dedos.<br>
                              <?php } ?>

                              <?php status('5mf4',$idm); ?>

                              <?php if($checkExists['5mf5']){ ?>
                              <input type="checkbox" name="5mf5" value="ign" checked>Bebe de un vaso entrenador.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5mf5" value="yes" disabled>Bebe de un vaso entrenador.<br>
                              <?php } ?>

                              <?php status('5mf5',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['5cm1']){ ?>
                              <input type="checkbox" name="5cm1" value="ign" checked>Identifica objetos y animales conocidos, por el ruido que producen.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5cm1" value="yes" disabled>Identifica objetos y animales conocidos, por el ruido que producen.<br>
                              <?php } ?>

                              <?php status('5cm1',$idm); ?>

                              <?php if($checkExists['5cm2']){ ?>
                              <input type="checkbox" name="5cm2" value="ign" checked>Dice el nombre de los objetos que señala.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5cm2" value="yes" disabled>Dice el nombre de los objetos que señala.<br>
                              <?php } ?>

                              <?php status('5cm2',$idm); ?>

                              <?php if($checkExists['5cm3']){ ?>
                              <input type="checkbox" name="5cm3" value="ign" checked>Dice más de cuatro palabras además de papá y mamá, por ejemplo: pan, mesa, carro, leche, pelota, perro.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="5cm3" value="yes" disabled>Dice más de cuatro palabras además de papá y mamá, por ejemplo: pan, mesa, carro, leche, pelota, perro.<br>
                              <?php } ?>

                              <?php status('5cm3',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['5cg1']){ ?>
                                <input type="checkbox" name="5cg1" value="ign" checked>Establece contacto visual con su cuidador, cuando éste le habla.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5cg1" value="yes" disabled>Establece contacto visual con su cuidador, cuando éste le habla.<br>
                                <?php } ?>

                                <?php status('5cg1',$idm); ?>

                                <?php if($checkExists['5cg2']){ ?>
                                <input type="checkbox" name="5cg2" value="ign" checked>Señala dos partes del cuerpo cuando se le nombra.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5cg2" value="yes" disabled>Señala dos partes del cuerpo cuando se le nombra.<br>
                                <?php } ?>

                                <?php status('5cg2',$idm); ?>

                                <?php if($checkExists['5cg3']){ ?>
                                <input type="checkbox" name="5cg3" value="ign" checked>Encuentra fácilmente objetos que le escondes en su presencia.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5cg3" value="yes" disabled>Encuentra fácilmente objetos que le escondes en su presencia.<br>
                                <?php } ?>

                                <?php status('5cg3',$idm); ?>

                                <?php if($checkExists['5cg4']){ ?>
                                <input type="checkbox" name="5cg4" value="ign" checked>Usa algunos objetos de acuerdo a su función.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5cg4" value="yes" disabled>Usa algunos objetos de acuerdo a su función.<br>
                                <?php } ?>

                                <?php status('5cg4',$idm); ?>

                                <?php if($checkExists['5cg5']){ ?>
                                <input type="checkbox" name="5cg5" value="ign" checked>Puede seguir una instrucción simple como: dame las llaves, lleva tu juguete.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5cg5" value="yes" disabled>Puede seguir una instrucción simple como: dame las llaves, lleva tu juguete.<br>
                                <?php } ?>

                                <?php status('5cg5',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['5as1']){ ?>
                                <input type="checkbox" name="5as1" value="ign" checked>Se muestra tímido en presencia de personas desconocidas algunas veces.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5as1" value="yes" disabled>Se muestra tímido en presencia de personas desconocidas algunas veces.<br>
                                <?php } ?>

                                <?php status('5as1',$idm); ?>

                                <?php if($checkExists['5as2']){ ?>
                                <input type="checkbox" name="5as2" value="ign" checked>Puede alejarse de ti un poco y permanecer tranquilo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5as2" value="yes" disabled>Puede alejarse de ti un poco y permanecer tranquilo.<br>
                                <?php } ?>

                                <?php status('5as2',$idm); ?>

                                <?php if($checkExists['5as3']){ ?>
                                <input type="checkbox" name="5as3" value="ign" checked>Saluda, hace ojitos, da abrazos y manda besos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5as3" value="yes" disabled>Saluda, hace ojitos, da abrazos y manda besos.<br>
                                <?php } ?>

                                <?php status('5as3',$idm); ?>

                                <?php if($checkExists['5as4']){ ?>
                                <input type="checkbox" name="5as4" value="ign" checked>Juega solo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5as4" value="yes" disabled>Juega solo.<br>
                                <?php } ?>

                                <?php status('5as4',$idm); ?>

                                <?php if($checkExists['5as5']){ ?>
                                <input type="checkbox" name="5as5" value="ign" checked>Come sin que alguien le ayude.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="5as5" value="yes" disabled>Come sin que alguien le ayude.<br>
                                <?php } ?>

                                <?php status('5as5',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="5"/>
                        <?php if($checkExists["5ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(5,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 18 a 24 meses</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['6mg1']){ ?>
                              <input type="checkbox" name="6mg1" value="ign" checked>Se sube solo a los muebles.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mg1" value="yes" disabled>Se sube solo a los muebles.<br>
                              <?php } ?>

                              <?php status('6mg1',$idm); ?>

                              <?php if($checkExists['6mg2']){ ?>
                              <input type="checkbox" name="6mg2" value="ign" checked>Corre de forma coordinada y sin caerse.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mg2" value="yes" disabled>Corre de forma coordinada y sin caerse.<br>
                              <?php } ?>

                              <?php status('6mg2',$idm); ?>

                              <?php if($checkExists['6mg3']){ ?>
                              <input type="checkbox" name="6mg3" value="ign" checked>Patea una pelota sin perder el equilibrio.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mg3" value="yes" disabled>Patea una pelota sin perder el equilibrio.<br>
                              <?php } ?>

                              <?php status('6mg3',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['6mf1']){ ?>
                              <input type="checkbox" name="6mf1" value="ign" checked>Desenvuelve un dulce.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mf1" value="yes" disabled>Desenvuelve un dulce.<br>
                              <?php } ?>

                              <?php status('6mf1',$idm); ?>

                              <?php if($checkExists['6mf2']){ ?>
                              <input type="checkbox" name="6mf2" value="ign" checked>Garabatea.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mf2" value="yes" disabled>Garabatea.<br>
                              <?php } ?>

                              <?php status('6mf2',$idm); ?>

                              <?php if($checkExists['6mf3']){ ?>
                              <input type="checkbox" name="6mf3" value="ign" checked>Bebe de un vaso.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mf3" value="yes" disabled>Bebe de un vaso.<br>
                              <?php } ?>

                              <?php status('6mf3',$idm); ?>

                              <?php if($checkExists['6mf4']){ ?>
                              <input type="checkbox" name="6mf4" value="ign" checked>Enrosca y desenrosca la tapa de un frasco.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mf4" value="yes" disabled>Enrosca y desenrosca la tapa de un frasco.<br>
                              <?php } ?>

                              <?php status('6mf4',$idm); ?>

                              <?php if($checkExists['6mf5']){ ?>
                              <input type="checkbox" name="6mf5" value="ign" checked>Utiliza herramientas para comer.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6mf5" value="yes" disabled>Utiliza herramientas para comer.<br>
                              <?php } ?>

                              <?php status('6mf5',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['6cm1']){ ?>
                              <input type="checkbox" name="6cm1" value="ign" checked>Dice más de diez palabras como: pan, silla, mesa, carro, leche, pelota, perro, taza, agua, dulce, gato, galleta, muñeco, jugo, niño, zapato, globo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6cm1" value="yes" disabled>Dice más de diez palabras como: pan, silla, mesa, carro, leche, pelota, perro, taza, agua, dulce, gato, galleta, muñeco, jugo, niño, zapato, globo.<br>
                              <?php } ?>

                              <?php status('6cm1',$idm); ?>

                              <?php if($checkExists['6cm2']){ ?>
                              <input type="checkbox" name="6cm2" value="ign" checked>Dice frases de dos palabras como: mamá leche, perro bonito.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="6cm2" value="yes" disabled>Dice frases de dos palabras como: mamá leche, perro bonito.<br>
                              <?php } ?>

                              <?php status('6cm2',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['6cg1']){ ?>
                                <input type="checkbox" name="6cg1" value="ign" checked>Reconoce e identifica el nombre de los objetos más comunes.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6cg1" value="yes" disabled>Reconoce e identifica el nombre de los objetos más comunes.<br>
                                <?php } ?>

                                <?php status('6cg1',$idm); ?>

                                <?php if($checkExists['6cg2']){ ?>
                                <input type="checkbox" name="6cg2" value="ign" checked>Busca alternativas para alcanzar algo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6cg2" value="yes" disabled>Busca alternativas para alcanzar algo.<br>
                                <?php } ?>

                                <?php status('6cg2',$idm); ?>

                                <?php if($checkExists['6cg3']){ ?>
                                <input type="checkbox" name="6cg3" value="ign" checked>Clasifica objetos de acuerdo a sus características.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6cg3" value="yes" disabled>Clasifica objetos de acuerdo a sus características.<br>
                                <?php } ?>

                                <?php status('6cg3',$idm); ?>

                                <?php if($checkExists['6cg4']){ ?>
                                <input type="checkbox" name="6cg4" value="ign" checked>Obedece órdenes un poco más complejas como: pon la pluma sobre la mesa, levanta los brazos, trae el muñeco, abre la puerta.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6cg4" value="yes" disabled>Obedece órdenes un poco más complejas como: pon la pluma sobre la mesa, levanta los brazos, trae el muñeco, abre la puerta.<br>
                                <?php } ?>

                                <?php status('6cg4',$idm); ?>

                                <?php if($checkExists['6cg5']){ ?>
                                <input type="checkbox" name="6cg5" value="ign" checked>Señala tres o más partes del cuerpo cuando se le nombran.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6cg5" value="yes" disabled>Señala tres o más partes del cuerpo cuando se le nombran.<br>
                                <?php } ?>

                                <?php status('6cg5',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['6as1']){ ?>
                                <input type="checkbox" name="6as1" value="ign" checked>Expresa emociones como tristeza, alegría, enojo, vergüenza y las reconoce en los otros.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6as1" value="yes" disabled>Expresa emociones como tristeza, alegría, enojo, vergüenza y las reconoce en los otros.<br>
                                <?php } ?>

                                <?php status('6as1',$idm); ?>

                                <?php if($checkExists['6as2']){ ?>
                                <input type="checkbox" name="6as2" value="ign" checked>Imita lo que hacen otros niños.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6as2" value="yes" disabled>Imita lo que hacen otros niños.<br>
                                <?php } ?>

                                <?php status('6as2',$idm); ?>

                                <?php if($checkExists['6as3']){ ?>
                                <input type="checkbox" name="6as3" value="ign" checked>Comienza a participar en hábitos de alimentación e higiene.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="6as3" value="yes" disabled>Comienza a participar en hábitos de alimentación e higiene.<br>
                                <?php } ?>

                                <?php status('6as3',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="6"/>
                        <?php if($checkExists["6ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(6,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 2 a 3 años</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['7mg1']){ ?>
                              <input type="checkbox" name="7mg1" value="ign" checked>Puede agacharse fácilmente hacia delante sin caerse.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mg1" value="yes" disabled>Puede agacharse fácilmente hacia delante sin caerse.<br>
                              <?php } ?>

                              <?php status('7mg1',$idm); ?>

                              <?php if($checkExists['7mg2']){ ?>
                              <input type="checkbox" name="7mg2" value="ign" checked>Se para sobre un solo pie.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mg2" value="yes" disabled>Se para sobre un solo pie.<br>
                              <?php } ?>

                              <?php status('7mg2',$idm); ?>

                              <?php if($checkExists['7mg3']){ ?>
                              <input type="checkbox" name="7mg3" value="ign" checked>Salta con ambos pies.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mg3" value="yes" disabled>Salta con ambos pies.<br>
                              <?php } ?>

                              <?php status('7mg3',$idm); ?>

                              <?php if($checkExists['7mg4']){ ?>
                              <input type="checkbox" name="7mg4" value="ign" checked>Sube las escaleras con tu ayuda.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mg4" value="yes" disabled>Sube las escaleras con tu ayuda.<br>
                              <?php } ?>

                              <?php status('7mg4',$idm); ?>

                              <?php if($checkExists['7mg5']){ ?>
                              <input type="checkbox" name="7mg5" value="ign" checked>Camina en puntas.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mg5" value="yes" disabled>Camina en puntas.<br>
                              <?php } ?>

                              <?php status('7mg5',$idm); ?>

                              <?php if($checkExists['7mg6']){ ?>
                              <input type="checkbox" name="7mg6" value="ign" checked>Camina hacia atrás.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mg6" value="yes" disabled>Camina hacia atrás.<br>
                              <?php } ?>

                              <?php status('7mg6',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['7mf1']){ ?>
                              <input type="checkbox" name="7mf1" value="ign" checked>Lanza una pelota chica con la mano.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf1" value="yes" disabled>Lanza una pelota chica con la mano.<br>
                              <?php } ?>

                              <?php status('7mf1',$idm); ?>

                              <?php if($checkExists['7mf2']){ ?>
                              <input type="checkbox" name="7mf2" value="ign" checked>Abre un frasco.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf2" value="yes" disabled>Abre un frasco.<br>
                              <?php } ?>

                              <?php status('7mf2',$idm); ?>

                              <?php if($checkExists['7mf3']){ ?>
                              <input type="checkbox" name="7mf3" value="ign" checked>Arruga papel.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf3" value="yes" disabled>Arruga papel.<br>
                              <?php } ?>

                              <?php status('7mf3',$idm); ?>

                              <?php if($checkExists['7mf4']){ ?>
                              <input type="checkbox" name="7mf4" value="ign" checked>Vacía líquidos de un recipiente de boca chica a uno de boca grande.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf4" value="yes" disabled>Vacía líquidos de un recipiente de boca chica a uno de boca grande.<br>
                              <?php } ?>

                              <?php status('7mf4',$idm); ?>

                              <?php if($checkExists['7mf5']){ ?>
                              <input type="checkbox" name="7mf5" value="ign" checked>Puede abrochar alguno de sus botones cuando se viste.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf5" value="yes" disabled>Puede abrochar alguno de sus botones cuando se viste.<br>
                              <?php } ?>

                              <?php status('7mf5',$idm); ?>

                              <?php if($checkExists['7mf6']){ ?>
                              <input type="checkbox" name="7mf6" value="ign" checked>Toma los objetos utilizando dedo índice y pulgar.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf6" value="yes" disabled>Toma los objetos utilizando dedo índice y pulgar.<br>
                              <?php } ?>

                              <?php status('7mf6',$idm); ?>

                              <?php if($checkExists['7mf7']){ ?>
                              <input type="checkbox" name="7mf7" value="ign" checked>Pasa las páginas de un cuento, revista o libro.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf7" value="yes" disabled>Pasa las páginas de un cuento, revista o libro.<br>
                              <?php } ?>

                              <?php status('7mf7',$idm); ?>

                              <?php if($checkExists['7mf8']){ ?>
                              <input type="checkbox" name="7mf8" value="ign" checked>Puede meter piedritas o semillas en un frasco de boca chica.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7mf8" value="yes" disabled>Puede meter piedritas o semillas en un frasco de boca chica.<br>
                              <?php } ?>

                              <?php status('7mf8',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['7cm1']){ ?>
                              <input type="checkbox" name="7cm1" value="ign" checked>Sabe decir su nombre.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm1" value="yes" disabled>Sabe decir su nombre.<br>
                              <?php } ?>

                              <?php status('7cm1',$idm); ?>

                              <?php if($checkExists['7cm2']){ ?>
                              <input type="checkbox" name="7cm2" value="ign" checked>Utiliza pronombres como yo, él, tú.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm2" value="yes" disabled>Utiliza pronombres como yo, él, tú.<br>
                              <?php } ?>

                              <?php status('7cm2',$idm); ?>

                              <?php if($checkExists['7cm3']){ ?>
                              <input type="checkbox" name="7cm3" value="ign" checked>Arma frases de tres palabras como: “quiero mi pelota”, “dame mi leche”.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm3" value="yes" disabled>Arma frases de tres palabras como: “quiero mi pelota”, “dame mi leche”.<br>
                              <?php } ?>

                              <?php status('7cm3',$idm); ?>

                              <?php if($checkExists['7cm4']){ ?>
                              <input type="checkbox" name="7cm4" value="ign" checked>Su lenguaje es comprensible para las demás personas.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm4" value="yes" disabled>Su lenguaje es comprensible para las demás personas.<br>
                              <?php } ?>

                              <?php status('7cm4',$idm); ?>

                              <?php if($checkExists['7cm5']){ ?>
                              <input type="checkbox" name="7cm5" value="ign" checked>Dice su edad.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm5" value="yes" disabled>Dice su edad.<br>
                              <?php } ?>

                              <?php status('7cm5',$idm); ?>

                              <?php if($checkExists['7cm6']){ ?>
                              <input type="checkbox" name="7cm6" value="ign" checked>Utiliza palabras en plural cuando habla: perros, juguetes, niños, etc.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm6" value="yes" disabled>Utiliza palabras en plural cuando habla: perros, juguetes, niños, etc.<br>
                              <?php } ?>

                              <?php status('7cm6',$idm); ?>

                              <?php if($checkExists['7cm7']){ ?>
                              <input type="checkbox" name="7cm7" value="ign" checked>Intenta contar algo que pasó o vio.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="7cm7" value="yes" disabled>Intenta contar algo que pasó o vio.<br>
                              <?php } ?>

                              <?php status('7cm7',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['7cg1']){ ?>
                                <input type="checkbox" name="7cg1" value="ign" checked>Juega a esconderse para que lo busques.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg1" value="yes" disabled>Juega a esconderse para que lo busques.<br>
                                <?php } ?>

                                <?php status('7cg1',$idm); ?>

                                <?php if($checkExists['7cg2']){ ?>
                                <input type="checkbox" name="7cg2" value="ign" checked>Sabe diferenciar el día de la noche por las actividades que realiza.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg2" value="yes" disabled>Sabe diferenciar el día de la noche por las actividades que realiza.<br>
                                <?php } ?>

                                <?php status('7cg2',$idm); ?>

                                <?php if($checkExists['7cg3']){ ?>
                                <input type="checkbox" name="7cg3" value="ign" checked>Identifica diferentes sonidos y menciona de qué son.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg3" value="yes" disabled>Identifica diferentes sonidos y menciona de qué son.<br>
                                <?php } ?>

                                <?php status('7cg3',$idm); ?>

                                <?php if($checkExists['7cg4']){ ?>
                                <input type="checkbox" name="7cg4" value="ign" checked>Identifica gestos en imágenes de cuentos y los imita.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg4" value="yes" disabled>Identifica gestos en imágenes de cuentos y los imita.<br>
                                <?php } ?>

                                <?php status('7cg4',$idm); ?>

                                <?php if($checkExists['7cg5']){ ?>
                                <input type="checkbox" name="7cg5" value="ign" checked>Comprende cuando le dices arribaabajo, grande-chico, adentro-afuera, adelante-atrás, grueso-delgado, rápido-lento, lleno-vacío en alguna acción.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg5" value="yes" disabled>Comprende cuando le dices arribaabajo, grande-chico, adentro-afuera, adelante-atrás, grueso-delgado, rápido-lento, lleno-vacío en alguna acción.<br>
                                <?php } ?>

                                <?php status('7cg5',$idm); ?>

                                <?php if($checkExists['7cg6']){ ?>
                                <input type="checkbox" name="7cg6" value="ign" checked>Reconoce los pares de objetos cuando juega memorama.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg6" value="yes" disabled>Reconoce los pares de objetos cuando juega memorama.<br>
                                <?php } ?>

                                <?php status('7cg6',$idm); ?>

                                <?php if($checkExists['7cg7']){ ?>
                                <input type="checkbox" name="7cg7" value="ign" checked>Arma torres.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7cg7" value="yes" disabled>Arma torres.<br>
                                <?php } ?>

                                <?php status('7cg7',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['7as1']){ ?>
                                <input type="checkbox" name="7as1" value="ign" checked>Identifica sus emociones en dibujos, caritas y recortes.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as1" value="yes" disabled>Identifica sus emociones en dibujos, caritas y recortes.<br>
                                <?php } ?>

                                <?php status('7as1',$idm); ?>

                                <?php if($checkExists['7as2']){ ?>
                                <input type="checkbox" name="7as2" value="ign" checked>Le gusta imitar las tareas de casa como: guardar sus juguetes, barrer, sacudir o limpiar con un trapo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as2" value="yes" disabled>Le gusta imitar las tareas de casa como: guardar sus juguetes, barrer, sacudir o limpiar con un trapo.<br>
                                <?php } ?>

                                <?php status('7as2',$idm); ?>

                                <?php if($checkExists['7as3']){ ?>
                                <input type="checkbox" name="7as3" value="ign" checked>Se lava las manos y la cara solo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as3" value="yes" disabled>Se lava las manos y la cara solo.<br>
                                <?php } ?>

                                <?php status('7as3',$idm); ?>

                                <?php if($checkExists['7as4']){ ?>
                                <input type="checkbox" name="7as4" value="ign" checked>Entiende la diferencia entre mío y tuyo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as4" value="yes" disabled>Entiende la diferencia entre mío y tuyo.<br>
                                <?php } ?>

                                <?php status('7as4',$idm); ?>

                                <?php if($checkExists['7as5']){ ?>
                                <input type="checkbox" name="7as5" value="ign" checked>Dice gracias y por favor.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as5" value="yes" disabled>Dice gracias y por favor.<br>
                                <?php } ?>

                                <?php status('7as5',$idm); ?>

                                <?php if($checkExists['7as6']){ ?>
                                <input type="checkbox" name="7as6" value="ign" checked>Juega con otros niños.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as6" value="yes" disabled>Juega con otros niños.<br>
                                <?php } ?>

                                <?php status('7as6',$idm); ?>

                                <?php if($checkExists['7as7']){ ?>
                                <input type="checkbox" name="7as7" value="ign" checked>Manifiesta inconformidad para prestar sus juguetes y compartir el espacio en el que está.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as7" value="yes" disabled>Manifiesta inconformidad para prestar sus juguetes y compartir el espacio en el que está.<br>
                                <?php } ?>

                                <?php status('7as7',$idm); ?>

                                <?php if($checkExists['7as8']){ ?>
                                <input type="checkbox" name="7as8" value="ign" checked>Controla esfínteres durante el día y avisa para que lo lleven al baño.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="7as8" value="yes" disabled>Controla esfínteres durante el día y avisa para que lo lleven al baño.<br>
                                <?php } ?>

                                <?php status('7as8',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="7"/>
                        <?php if($checkExists["7ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(7,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <hr>

                      <h4>Etapa: 3 a 4 años</h4>

                      <form method="post">
                        <div class="row">
                          <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Gruesa</h6>
                              <?php if($checkExists['8mg1']){ ?>
                              <input type="checkbox" name="8mg1" value="ign" checked>Puede cachar una pelota.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mg1" value="yes" disabled>Puede cachar una pelota.<br>
                              <?php } ?>

                              <?php status('8mg1',$idm); ?>

                              <?php if($checkExists['8mg2']){ ?>
                              <input type="checkbox" name="8mg2" value="ign" checked>Salta en un solo pie.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mg2" value="yes" disabled>Salta en un solo pie.<br>
                              <?php } ?>

                              <?php status('8mg2',$idm); ?>

                              <?php if($checkExists['8mg3']){ ?>
                              <input type="checkbox" name="8mg3" value="ign" checked>Sube y baja escaleras sin apoyarse de la pared o del barandal.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mg3" value="yes" disabled>Sube y baja escaleras sin apoyarse de la pared o del barandal.<br>
                              <?php } ?>

                              <?php status('8mg3',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Matriz Fina</h6>
                              <?php if($checkExists['8mf1']){ ?>
                              <input type="checkbox" name="8mf1" value="ign" checked>Puede meter una agujeta o cordón por los agujeros de una cuenta.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mf1" value="yes" disabled>Puede meter una agujeta o cordón por los agujeros de una cuenta.<br>
                              <?php } ?>

                              <?php status('8mf1',$idm); ?>

                              <?php if($checkExists['8mf2']){ ?>
                              <input type="checkbox" name="8mf2" value="ign" checked>Copia una cruz y un círculo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mf2" value="yes" disabled>Copia una cruz y un círculo.<br>
                              <?php } ?>

                              <?php status('8mf2',$idm); ?>

                              <?php if($checkExists['8mf3']){ ?>
                              <input type="checkbox" name="8mf3" value="ign" checked>Dibuja una cruz y un círculo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mf3" value="yes" disabled>Dibuja una cruz y un círculo.<br>
                              <?php } ?>

                              <?php status('8mf3',$idm); ?>

                              <?php if($checkExists['8mf4']){ ?>
                              <input type="checkbox" name="8mf4" value="ign" checked>Dibuja una persona con dos o más partes del cuerpo.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mf4" value="yes" disabled>Dibuja una persona con dos o más partes del cuerpo.<br>
                              <?php } ?>

                              <?php status('8mf4',$idm); ?>

                              <?php if($checkExists['8mf5']){ ?>
                              <input type="checkbox" name="8mf5" value="ign" checked>Recorta con tijeras.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8mf5" value="yes" disabled>Recorta con tijeras.<br>
                              <?php } ?>

                              <?php status('8mf5',$idm); ?>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                              <h6>Comunicación</h6>
                              <?php if($checkExists['8cm1']){ ?>
                              <input type="checkbox" name="8cm1" value="ign" checked>Cuenta cuentos con ayuda de imágenes.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8cm1" value="yes" disabled>Cuenta cuentos con ayuda de imágenes.<br>
                              <?php } ?>

                              <?php status('8cm1',$idm); ?>

                              <?php if($checkExists['8cm2']){ ?>
                              <input type="checkbox" name="8cm2" value="ign" checked>Usa la mayor parte de las palabras que tú usas.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8cm2" value="yes" disabled>Usa la mayor parte de las palabras que tú usas.<br>
                              <?php } ?>

                              <?php status('8cm2',$idm); ?>

                              <?php if($checkExists['8cm3']){ ?>
                              <input type="checkbox" name="8cm3" value="ign" checked>Usa palabras que tengan relación con el tiempo aunque a veces no las emplee correctamente.<br>
                              <?php } else { ?>
                              <input type="checkbox" name="8cm3" value="yes" disabled>Usa palabras que tengan relación con el tiempo aunque a veces no las emplee correctamente.<br>
                              <?php } ?>

                              <?php status('8cm3',$idm); ?>

                            </div>
                        </div>

                        </div>
                        <div class="row">

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Cognitiva</h6>
                                <?php if($checkExists['8cg1']){ ?>
                                <input type="checkbox" name="8cg1" value="ign" checked>Presta atención durante tres o más minutos en una actividad.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8cg1" value="yes" disabled>Presta atención durante tres o más minutos en una actividad.<br>
                                <?php } ?>

                                <?php status('8cg1',$idm); ?>

                                <?php if($checkExists['8cg2']){ ?>
                                <input type="checkbox" name="8cg2" value="ign" checked>Sigue una secuencia de color y tamaño con bloques o cuentas.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8cg2" value="yes" disabled>Sigue una secuencia de color y tamaño con bloques o cuentas.<br>
                                <?php } ?>

                                <?php status('8cg2',$idm); ?>

                                <?php if($checkExists['8cg3']){ ?>
                                <input type="checkbox" name="8cg3" value="ign" checked>Puede contarte partes de una historia o cuento que le hayas narrado.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8cg3" value="yes" disabled>Puede contarte partes de una historia o cuento que le hayas narrado.<br>
                                <?php } ?>

                                <?php status('8cg3',$idm); ?>

                                <?php if($checkExists['8cg4']){ ?>
                                <input type="checkbox" name="8cg4" value="ign" checked>Reconoce algunos colores.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8cg4" value="yes" disabled>Reconoce algunos colores.<br>
                                <?php } ?>

                                <?php status('8cg4',$idm); ?>

                                <?php if($checkExists['8cg5']){ ?>
                                <input type="checkbox" name="8cg5" value="ign" checked>Arma rompecabezas.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8cg5" value="yes" disabled>Arma rompecabezas.<br>
                                <?php } ?>

                                <?php status('8cg5',$idm); ?>

                                <?php if($checkExists['8cg6']){ ?>
                                <input type="checkbox" name="8cg6" value="ign" checked>Escoge el par que corresponde a un círculo, a un cuadrado y a un triángulo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8cg6" value="yes" disabled>Escoge el par que corresponde a un círculo, a un cuadrado y a un triángulo.<br>
                                <?php } ?>

                                <?php status('8cg6',$idm); ?>

                              </div>
                          </div>

                          <div class="col-md-4">
                              <div class="form-group">
                                <h6>Afectivo - Social</h6>
                                <?php if($checkExists['8as1']){ ?>
                                <input type="checkbox" name="8as1" value="ign" checked>Dice su nombre, apellido y edad.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8as1" value="yes" disabled>Dice su nombre, apellido y edad.<br>
                                <?php } ?>

                                <?php status('8as1',$idm); ?>

                                <?php if($checkExists['8as2']){ ?>
                                <input type="checkbox" name="8as2" value="ign" checked>Muestra temor, alegría, pena, rebeldía.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8as2" value="yes" disabled>Muestra temor, alegría, pena, rebeldía.<br>
                                <?php } ?>

                                <?php status('8as2',$idm); ?>

                                <?php if($checkExists['8as3']){ ?>
                                <input type="checkbox" name="8as3" value="ign" checked>Juega con otros niños al papá y a la mamá, al doctor y/o policías y ladrones.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8as3" value="yes" disabled>Juega con otros niños al papá y a la mamá, al doctor y/o policías y ladrones.<br>
                                <?php } ?>

                                <?php status('8as3',$idm); ?>

                                <?php if($checkExists['8as4']){ ?>
                                <input type="checkbox" name="8as4" value="ign" checked>Respeta reglas de convivencia, tiempos y turnos.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8as4" value="yes" disabled>Respeta reglas de convivencia, tiempos y turnos.<br>
                                <?php } ?>

                                <?php status('8as4',$idm); ?>

                                <?php if($checkExists['8as5']){ ?>
                                <input type="checkbox" name="8as5" value="ign" checked>Puede vestirse y desvestirse solo.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8as5" value="yes" disabled>Puede vestirse y desvestirse solo.<br>
                                <?php } ?>

                                <?php status('8as5',$idm); ?>

                                <?php if($checkExists['8as6']){ ?>
                                <input type="checkbox" name="8as6" value="ign" checked>Va al baño solo, bajo tu supervisión y no utiliza pañal durante el día.<br>
                                <?php } else { ?>
                                <input type="checkbox" name="8as6" value="yes" disabled>Va al baño solo, bajo tu supervisión y no utiliza pañal durante el día.<br>
                                <?php } ?>

                                <?php status('8as6',$idm); ?>

                              </div>
                            </div>

                        </div>
                        <input type="hidden" name="info" value="8"/>
                        <?php if($checkExists["8ok"]=='1'){ ?>
                          <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php } else {
                          if(full(8,$idm)){ ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left">Actualizar</button>
                        <?php  } else { ?>
                            <button type="submit" class="btn btn-info btn-fill pull-left" disabled>Actualizar</button>
                        <?php  }  } ?>
                        <div class="clearfix"></div>
                      </form>

                      <?php
                    }
                       ?>

                    </div>

                    <div class="clearfix"></div>
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
