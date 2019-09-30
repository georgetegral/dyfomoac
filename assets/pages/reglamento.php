<!doctype html>

<?php
   include('../../session.php');
   date_default_timezone_set("America/Monterrey");
   $sqlReg=mysqli_query($conexion,"SELECT * FROM reglamento WHERE correo_padre='$correo' ");
   $info = mysqli_fetch_array($sqlReg,MYSQLI_ASSOC);

if($_SERVER["REQUEST_METHOD"] == "POST"){
  include("../../config.php");
  $sqlAdd="INSERT INTO reglamento (correo_padre) VALUES ('$correo')";
  if ($conexion->query($sqlAdd)) {
    header("Refresh:0");
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
            <a href="index.php" class="simple-text">
                DyFOMOAC<br>
                Maestro
            </a>
        </div>

        <ul class="nav">
          <li>
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reportes</p>
              </a>
          </li>
          <li class="active">
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
            <a href="../../index.php" class="simple-text">
                DyFOMOAC <br>
                Padre de Familia
            </a>
        </div>

        <ul class="nav">
          <li>
              <a href="../../index.php">
                <i class="pe-7s-news-paper"></i>
                <p>Ver reportes</p>
              </a>
          </li>
          <li>
              <a href="reportesListaPadre.php">
                <i class="pe-7s-news-paper"></i>
                <p>Editar reportes</p>
              </a>
          </li>
          <li>
              <a href="administrarHijos.php">
                <i class="pe-7s-user"></i>
                <p>Administrar hijos</p>
              </a>
          </li>
          <li>
              <a href="ejercicios.php">
                <i class="pe-7s-file"></i>
                <p>Ejercicios</p>
              </a>
          </li>
          <li class="active">
              <a href="reglamento.php">
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

                  <div class="col-md-12">
                      <div class="card">

                          <div class="header">
                              <h4 class="title">Reglamento</h4>
                              <p class="category">Lee y acepta el reglamento de la institución</p>
                          </div>
                          <hr>
                          <div class="content">
                            <?php
                            if(empty($info["correo_padre"])){
                              ?>
                              <h5 style="color:red;">*Debes de aceptar el reglamento haciendo clic en el botón al final del mismo</h5>
                              <br>
                              <?php
                            }
                            ?>

                            <p><b><center>REGLAMENTO</center></b></p>
                            <p><b><center>CAPITULO I</center></b></p>
                            <p><b><center>Prestacion del servicio</center></b></p>
                            <p style="text-align:justify">1.	Los servicios que brinda el CEO  solo comprende la guarda, custodia, recreación, formación académica y humana, así como 2 alimentos calientes y una colación a los menores, en los horarios establecidos en la institución (Ver Cap IV-4).
                            <br>2.	Los padres o tutores de los menores inscritos, personal del CEO e invitados, se conducirán en todo momento con respeto y cortesía, a fin de mantener y estrechar la mutua relación en beneficio del menor.
                            <br>3.	El derecho a los servicios del CEO queda sujeto a que los padres o tutores así como el beneficiario cumplan con las disposiciones del presente reglamento.
                            </p>
                            <br>
                            <br>
                            <p><b><center>CAPITULO II</center></b></p>
                            <p><b><center>Derechos y obligaciones  de los padres o tutor</center></b></p>
                            <p style="text-align:justify">
                              Derechos:
                              <br>
                              <br>1.	Recibir información clara y oportuna  respecto al reglamento interno, servicios, horarios, costos,  capacitaciones del personal, licencias, permisos, autorizaciones.
                              <br>2.	Que los menores reciban un servicio atento, higiénico y de calidad, así como ofrecerle al menor alimento equilibrado, inocuo, suficiente y variado (de acuerdo a la edad).
                              <br>3.	Que los menores reciban supervisión y cuidado durante el tiempo que permanezcan en las instalaciones.
                              <br>4.	Que los menores, “únicamente” sean entregados a la persona previamente autorizadas por la madre, padre o tutor.
                              <br>5.	Recibir diariamente, a través de la plataforma de DyFOMOAC un reporte escrito que contenga el desempeño emocional, académico, de alimentación y disciplinario del menor.
                              <br>6.	Presentar al menor en el horario acordado con la administración.
                              <br>7.	Presentar al menor, máximo, 20 minutos antes del horario acordado de entrada.
                              <br>8.	Informar por escrito en la plataforma de DyFOMOAC las observaciones que a su juicio considere áreas de oportunidad para mejorar el servicio que ofrece la institución.
                              <br>9.	Solicitar cita para hablar con la maestra titular y/o directivos, dichas reuniones se realizarán solamente de 16:00 a 17:00 hrs.
                              <br>10.	Festejar el cumpleaños de su hijo en el salón de clases y con todos los niños que acuden a DyFOMOAC, con un pastel y jugos de frutas, exclusivamente en el horario de 10:00 a 11:30 hrs.
                              <br>11.	Solicitar beca(s) de colegiatura para su hijo(a).
                              <br>12.	En caso de recibir beca se suspende al acumular 3 faltas consecutivas sin avisar por escrito las razones de la ausencia.
                              <br>13.	Contar con instalaciones adecuadas, higiénicas y seguras para las(os) niñas(os).
                              <br>
                              <br>Obligaciones:
                              <br>1.	Conocer y firmar de conocimiento el Reglamento Interno y cumplir con las Reglas establecidas de ingreso, alimentos e higiene.
                              <br>2.	Pagar por adelantado la anualidad, colegiatura y seguro de accidentes, el cual no será reembolsable en caso de causar baja.
                              <br>3.	Presentar diariamente al menor según lo marcan las reglas de acceso y uso a las instalaciones mencionadas en el capítulo IV-3 del presente documento.
                              <br>4.	Entregar al menor con la tarea que le fue asignada en días previos.
                              <br>5.	Entregar al menor, máximo 20 minutos antes de su hora de entrada, y recogerlo a más tardar en punto del horario establecido de salida, firmando la bitácora correspondiente. En caso de encontrar alguna irregularidad al entregar o recoger a sus hijas(os) o niñas(os) bajo su cuidado, se deberá registrar en dicha bitácora.
                              <br>6.	Proveer los materiales básicos de higiene que se hayan acordado y que están establecidos en el presente reglamento: pañales, toallas húmedas, pomada para rozaduras, pasta y cepillo de dientes, ligas y/o peine o cepillo para el cabello, sanitas, jabón liquido y rollos de papel sanitario así como el material didáctico, este último no será devuelto en caso de baja del menor.
                              <br>7.	Administrar al menor, antes de su horario de ingreso, los medicamentos que por enfermedad, le fueron indicados por su médico. El CEO solo se compromete a darle el medicamento 1 (UNA) vez al día.
                              <br>8.	Pagar por adelantado, los primeros 3 días del mes, la colegiatura acordada independientemente de la asistencia del menor. A partir del día 4 la colegiatura se incrementará un 5%, si el pago se recibe del día 10 al 15 la colegiatura aumentará un 16% y el día 16 nos reservamos el derecho de no recibir a los menores que no tengan cubierta su colegiatura del mes en curso. (Ver Cap. VI-3) el cual no será reembolsable en caso de causar baja.
                              <br>9.	El numeral anterior solo aplica para niños con una antigüedad de 6 meses o más en DyFOMOAC, de lo contrario nos reservamos el derecho de no recibir al menor el día 4 hasta que tenga cubierta la colegiatura mensual independientemente que no haya asistido a clases.
                              <br>10.	En caso de solicitar servicios adicionales, deberá cubrir por adelantado el costo que por estos servicios se mencionan en el capítulo VI-4.
                              <br>11.	Actualizar en la plataforma de DyFOMOAC los datos de: cambios en los días de descanso, vacaciones, número telefónico, domicilio, ubicación de su centro de trabajo, horario de labores o cualquier dato relacionado con personas autorizadas para recoger o entregar al menor.
                              <br>12.	Todos los días que el menor asista a clases, los padres o el tutor deberá escribir en la plataforma de DyFOMOAC todos aquellos datos relacionados con el menor, que desde el punto de vista salud, psíquico o social considere importantes y que se presentaron desde la última vez que asistió a clases
                              <br>13.	Identificar con el nombre del menor “todos” los artículos de uso personal que ingrese.
                              <br>14.	Los menores “NO” podrán llevar ningún objeto, aretes, cadenas, pulseras u otros que a consideración de la persona encargada del filtro de ingreso en el CEO pueda causar daño a su persona o la de otros menores.
                              <br>15.	La persona beneficiaria o en su caso la persona autorizada para recoger al menor deberá revisar que se encuentre en en las mismas condiciones que ingreso. Una vez que el menor cruza la puerta de salida de las instalaciones, DyFOMOAC no se hace responsable de las lesiones encontradas al menor.
                              <br>16.	Acudir a las instalaciones de DyFOMOAC cuando sea requerida su presencia por motivos de salud, disciplinaria, académica o cuando se presente un programa pedagógico o de integración familiar.
                              <br>17.	En caso de que se tenga prevista la inasistencia del menor, avisar con 24 horas las causas que la motivan.
                              <br>18.	En caso de una atención médica de emergencia, acudir de inmediato a la unidad de salud, acordada al momento de la inscripción, donde se encuentre el menor.
                              <br>19.	Presentar desayunado al menor si registra asistencia a partir de las 8:41 hrs., después de esa hora NO SE BRINDA EL DESAYUNO. Los padres pueden traer los alimentos que quedarse en las instalaciones de DyFOMOAC hasta que el menor termine de consumirlos (Ver apartado IV-4).
                              <br>20.	Recoger la ropa del menor, cuando cause baja por inasistencia (3 veces consecutivas), indisciplina o edad, máximo 15 días posteriores a la fecha que se formaliza, escrito o verbal, la baja del menor. Transcurrido el plazo anterior los artículos serán donados a una institución de beneficencia.
                              <br>21.	Los padres SIN EXCEPCIÓN deberá llenar el reporte de ingreso que aparece en la plataforma de DyFOMOAC, de lo contrario se le negará, el día siguiente que sea hábil, el acceso al menor a las instalaciones.
                              <br>22.	Los padres, tutores o personas autorizadas deberá presenciar la revisión física que realiza el personal encargado del filtro al menor y autorice los artículos que el menor guarde en su mochila o bolsa ziploc hasta que autorice en la plataforma DYFOMOAC el ingreso del menor (Ver Cap. 4-3).
                              <br>23.	Es obligación de los padres y/o tutores retirarle y/o quitarle al menor los juguetes, o artículos no autorizados por DyFOMOAC  (Ver Cap. IV-3,C) y deberán ser guardados antes de ingresar a las instalaciones. De no suceder lo anterior el padre, madre o tutor no podrán retirarse de las instalaciones de la Institución hasta dejar tranquilo (sin llanto) al menor  por haberle quitado los juguetes, teléfonos celulares, aparatos electrónicos o bien artículos no permitidos.
                              <br>24.	Las personas autorizadas para recoger al menor, SIN EXCEPCIÓN, deberá revisar al menor y avisar por teléfono a la madre, padre o tutur que el menor se encuentra en las condiciones que aparecen en el reporte de salida hasta que lo autorice, de lo contrario nos reservamos el derecho de admitir al menor el día posterior al suceso.
                              <br>25.	Por excepción, y avisando mínimo con 12 horas de anticipación, se recibirá al menor después del horario acordado de entrada.
                              <br>26.	Firmar un acta de hechos si se presenta alguna incidencia con el menor, padres, tutor o familiares.
                              <br>27.	Consultar al menor, con su médico de cabecera cuando presente algún malestar, por fiebre, diarrea, vómito, dolor de cabeza o estómago, El médico extenderá un comprobante donde indique que el menor es apto para continuar asistiendo y conviviendo con otros menores sin poner en riesgo su salud y la de sus compañeros, a demás que no requiere cuidados especiales.
                              <br>28.	Llevar al menor a terapia psicológica cuando presente problemas de conducta o cambios emocionales recurrentes sin justificación.
                              <br>29.	Presentar, en caso de separación o divorcio, un documento oficial extendido por la autoridad competente donde especifique que solo se puede entregar al menor a uno de los padres.
                              <br>30.	La persona beneficiaria o en su caso la persona autorizada para llevar y recoger a las(os) niñas(os), deberá entregar justificante médico a la persona responsable del filtro en caso de que su hija(o) o niña(o) bajo su cuidado no haya asistido a clases por motivos de salud. Dicho justificante médico deberá contener por lo menos los siguientes datos:
                              <br>&emsp;a.	Fecha de emisión del justificante médico.
                              <br>&emsp;b.	Nombre completo y sin abreviaciones del menor.
                              <br>&emsp;c.	 Diagnóstico (enfermedad o padecimiento).
                              <br>&emsp;d.	Tiempo de reposo.
                              <br>&emsp;e.	Nombre y firma del médico.
                              <br>&emsp;f.	Número de cédula profesional del médico.
                              <br>&emsp;En estos casos, se podrán justificar las faltas, para que puedan contabilizarse en el cálculo del apoyo mensual, siempre que el periodo de reposo de la (el) niña(o) esté claramente establecido en dicho justificante.
                              <br>&emsp;En caso de que la receta médica no indique el tiempo de reposo, solo se justificará el día de la emisión de la receta médica.
                              <br>31.	En el caso de que un(a) niño(a) requiera cuarentena por alguna enfermedad, se otorgará el porcentaje de beca siempre que la persona beneficiaria de aviso y entregue el justificante médico con los datos señalados en el numeral anterior.
                              <br>32.	Suministrar los alimentos cuando el niño(a) requieran, por su salud, alimentos especiales. (DyFOMOAC) no proporciona alimentación diferente a la publicada en el menú diario y/o mensual.)
                              <br>33.	Antes de ingresar entregar la papelería completa del menor, que consta de: Acta de nacimiento, CURP, Cartilla de Vacunación y carta de buena salud (actualizada cada 3 meses) del menor, así como el CURP e identificación oficial con fotografía de la madre, padre o tutor del menor.
                              <br>34.	Todos los lunes entregar 5 piezas de fruta para la segunda colación del menor y la sabana que su hijo(a), utilizará a la hora de la siesta (Ver Cap. VI-7)
                            </p>
                            <p><b><center>CAPITULO III</center></b></p>
                            <p><b><center>Derechos y obligaciones de DyFOMOAC</center></b></p>
                            <p style="text-align:justify">
                              Derechos
                              <br>1.	Recibir mensual y de manera oportuna, los primeros tres días de cada mes, la colegiatura acordada al momento de la inscripción. (Ver Cap. VI-1, 2, 3 y 4) y reservarse el derecho de admitir solo a los alumnos que tengan cubierta su colegiatura.
                              <br>2.	Reservarse el derecho de admitir al menor que dejó de asistir sin aviso de los padres o cuando por causas de enfermedad se requiera atención especial.
                              <br>3.	Donar a instituciones de beneficencia los artículos personales de los menores:
                              <br>&emsp;a.	Que no fueron reclamados máximo 15 días después de causar baja.
                              <br>&emsp;b.	Aquellas que no se encuentren etiquetadas con el nombre del menor.
                              <br>4.	Modificar, por motivos de salud, el horario establecido para el menor.
                              <br>5.	Suspender actividades cuando las autoridades de protección civil del Estado de Nuevo León lo consideren pertinente (Ej. Desastres Naturales o provocados por el hombre)
                              <br>6.	No es responsable de los objetos  de valor, económico o sentimental, que el menor ingrese sin permiso, así como aquellos que entregue sin etiquetar.
                              <br>7.	Solo recibir a los menores 20 minutos antes del horario estipulado de entrada. Por la seguridad de los menores después de las 9:30 hrs. no se permite el acceso de niños.
                              <br>8.	No aceptar a los menores que un día antes fueron enviados a su casa, por motivos de salud y los padres o tutores los presenten sin un comprobante médico especificando que su estado de salud es recomendado para asistir a clases o no especifica la receta médica que la enfermedad que presenta no es contagiosa y no requieran cuidados especiales.
                              <br>9.	En el supuesto que personal del DyFOMOAC extravíe ropa o artículos de uso personal del menor  (Ver Cap IV-3, f), solo se hace responsable si son reclamados el mismo día de la incidencia.
                              <br>10.	No entregar menores de 13:00 a 15:00 hrs. excepto cuando se presentan problemas de salud, accidente, o bien la madre del menor aviso al ingresar y lo registro en la bitácora del menor.
                              <br>11.	No reconoce ni se hace responsable de las lesiones que el Padre, madre o tutor no registraron en la bitácora de salida en observaciones que presenta el menor.
                              <br>12.	No proporcionar alimentación diferente a la publicada en el menú diario y/ o mensual.
                              <br>
                              <br>Obligaciones
                              <br>1.	Proveer 2 comidas calientes (desayuno y comida) y una colación, por día, a cada niño, la cual deberán ser balanceadas, nutritivas y suficientes, “exclusivamente” en los horarios establecidos en el apartado IV-4 del presente reglamento.
                              <br>2.	Realizar diariamente la actividad de filtro a la entrada y salida de cada niña(o).
                              <br>3.	Contar con un formato para registrar diariamente la actividad de filtro, asentando el estado físico de las(os) niñas(os) a la hora de entrada y de salida, así como cualquier eventualidad acontecida durante su permanencia en la misma. Estos registros, deberán contar con la firma
                              <br>4.	Contar con un formato, en el que se registren nombres completos, procedencia y hora de entrada y salida de las personas acreditadas para realizar actividades de supervisión, verificación o autoridades en ejercicio de sus facultades que ingresen a DyFOMOAC.
                              <br>5.	Entregar a las(os) niñas(os) únicamente a las madres, padres, tutores, principales cuidadores o a las personas previamente autorizadas por las personas beneficiarias.
                              <br>6.	Brindar el servicio a cualquier menor en estricto apego a los requisitos de ingreso.
                              <br>7.	Proveer el servicio de cuidado y atención a los menores de lunes a viernes por un periodo mínimo 5 y máximo de 8 horas. Excepto: días de asueto nacional,  toda la semana santa y del 24 de diciembre al primer lunes hábil del año.
                              <br>8.	Entregar al menor únicamente a los padres o tutor, o bien a las personas previamente autorizadas por ellos y que cuenten con copia de su credencial de elector en el expediente.
                              <br>9.	Informar desde el inicio y con toda claridad a la madre o padre del menor que se inscriba en el DyFOMOAC las actividades o servicios adicionales que puedan tener un costo extra (Cap. VI- 2 y 4).
                              <br>10.	Entregar diariamente un reporte que contenga el desempeño emocional, académico, de alimentación y disciplinario del menor.
                              <br>11.	Contar en todo momento con espacio, materiales y mobiliario limpio y en buen estado, además deberá ser suficiente para el número de menores atendidos.
                              <br>12.	Llevar a cabo una rutina diaria de actividades acorde a las necesidades y edades de las(os) niñas(os).
                              <br>13.	Impedir el acceso a las instalaciones de DyFOMOAC, durante el horario de atención, a personas ajenas a la misma, con excepción de las personas acreditadas para realizar actividades de supervisión, verificación o autoridades en ejercicio de sus facultades.
                              <br>14.	En caso de separación o divorcio de los padres, DyFOMOAC entregará al menor a cualquiera de los progenitores, a menos que una de las partes presente copia y original (para cotejar) de un oficio extendido por una autoridad competente donde especifique que solo se puede entregar al menor a uno de los padres. Nota: El personal de DyFOMOAC NO se inclinará por ninguno de los padres.
                              <br>15.	Mantener la confidencialidad de los datos de las(os) niñas(os), así como de las personas inscritas en el DyFOMOAC, según lo marca la Ley General de Protección de datos personales en posesión de sujetos obligados.
                            </p>

                            <p><b><center>CAPITULO IV</center></b></p>
                            <p><b><center>Reglas de acceso y uso de las instalaciones</center></b></p>
                            <p style="text-align:justify">
                              1.	Los menores inscritos, se recibirán por la  calle Hidalgo No. 316 Nte.
                              <br>2.	Solo se permite el acceso a los menores inscritos. SIN EXCEPCIÓN los padres de familia, hermanos, amigos, etc. deberán permanecer fuera de las instalaciones.
                              <br>3.	Los padres o tutores deberán presentar al menor a la persona que cumple la función de “filtro”, para verificar diariamente que ingrese con las siguientes características:
                              <br>&emsp;  a.	Despierto y si su condición física lo permite caminando, limpio y con todo lo necesario en su mochila.
                              <br>&emsp;  b.	En perfecto estado de salud.
                              <br>&emsp;  i.	Sin excepción “no” se aceptan menores con temperatura corporal arriba de 37º, diarrea, vomito,  y/o rozado de sus partes genitales, a menos que presente una receta  médica donde el niño ya fue consultado por un médico con cédula profesional, asegurando que la enfermedad no pone en riesgo la vida del menor ni es contagiosa para el resto de los compañeros del grupo.
                              <br>&emsp;  c.	Pañal limpio.
                              <br>&emsp;  d.	Uñas corta y sin pintura.
                              <br>&emsp;  e.	Los niños con el cabello corto y las niñas con el cabello recogido.
                              <br>&emsp;  f.	Sin juguetes, aparatos electrónicos, teléfonos celulares, revistas, vasos, colchas, almohadas, libros, plumas, colores, plastilinas, dinero, artículos para vender, (excepto los materiales que la maestra solicite).
                              <br>&emsp;  g.	Es altamente recomendable portar uniforme completo (en verano y primavera: pantalón corto azul marino, camiseta blanca (no importa el diseño ni textura de las telas), tenis cerrado de velcro y en otoño e invierno: pantalón largo, camisa blanca de manga larga, suéter azul marino (no importa el diseño ni textura de las telas) y zapato cerrado con velcro, además de mandil o babero de plástico sobre el uniforme.
                              <br>&emsp;  h.	Prohibido presentar al menor en cualquier tipo huaraches (si el menor forma parte del grupo de control de esfínteres deberá ingresar con huarache de plástico).
                              <br>&emsp;  i.	Presentar diariamente etiquetados, los artículos de uso personal y el material solicitado por la maestra del grupo.
                              <br>4.	El horario del CEO  es de lunes a viernes de 07:30 a17:00 hrs., y se realiza la siguiente rutina de actividades:
                              <br>
                              <br>&emsp;  a.	07:00 a 8:00&emsp;&emsp;Recepción y filtro
                              <br>&emsp;  b.	08:00 a 8:40&emsp;&emsp;Desayuno
                              <br>&emsp;  c.	08:40 a 12:00&emsp;&emsp;Actividades: Académicas, artísticas,  Deportivas, lúdicas, etc.
                              <br>&emsp;  d.	12:10 a 12:30&emsp;&emsp;Comida
                              <br>&emsp;  e.	12:30 a 12:45&emsp;&emsp;Higiene y lavado de dientes
                              <br>&emsp;  f.	12:45 a 13:00&emsp;&emsp;Reflexión del día
                              <br>&emsp;  g.	13:00 a 14:00&emsp;&emsp;Descanso
                              <br>&emsp;  h.	14:30 a 15:00&emsp;&emsp;Lavado de manos y colación
                              <br>&emsp;  i.	15:00 a 15:50&emsp;&emsp;Actividades lúdicas
                              <br>&emsp;  j.	15:50 a 16:00&emsp;&emsp;Reflexión y despedida
                              <br>
                              <br>5.	Por excepción, 1 vez al mes, se otorgan hasta 10 minutos de tolerancia a los padres o tutor para recoger al menor después del horario acordado de salida. A partir del minuto 11, se aplica lo señalado el Capítulo VI-2 del presente reglamento.
                              <br>6.	Los Padres, tutor o persona autorizada se abstendrán de presentarse a recoger al menor, bajo el influjo de bebidas embriagantes, drogas, enervantes o cualquier otra sustancia tóxica que altere su estado de conciencia. Si se incumple en el supuesto anterior el responsable de DyFOMOAC, retendrá al menor y tratará de localizar a otra persona autorizada en caso de no localizarlo procederá a presentar al menor ante la autoridad correspondiente del DIF.
                              <br>7.	El menor que no sea recogido a más tardar a las 18:31 hrs. se considera que ha sido abandonado y se procederá a presentar al menor ante la autoridad del DIF.
                              <br>8.	Los materiales deportivos, lúdicos o académicos, que analizado el caso por el consejo directivo de DYFOMOAC sea descompuesto o destruido por el menor, deberán ser repuestos en un lapso no mayor de 5 días por los padres o tutor, de lo contrario se suspenderá al menor hasta que sea recuperado el material.
                              <br>9.	Los padres, tutores, alumnos inscritos, invitados y el personal del centro deberán dirigirse a sus compañeros respetuosamente y comportarse correctamente.
                            </p>

                            <p><b><center>CAPITULO V</center></b></p>
                            <p><b><center>SANCIONES</center></b></p>
                            <p style="text-align:justify">
                              1.	En caso de que los padres, tutores, incumplan con sus obligaciones de pago,  con las reglas de acceso y el uso a las instalaciones se aplicarán amonestaciones o suspensiones.
                              <br>2.	Las amonestaciones serán: a) verbales b) por escrito c) suspensión  temporal d) suspensión definitiva.
                              <br>
                              <br>a) La amonestación verbal procederá en los siguientes casos:
                              <br>&emsp;1. Cuando los padres o tutor no recojan al menor, en dos ocasiones, en los horarios establecidos al momento de la inscripción.
                              <br>&emsp;2. Cuando el beneficiario presente al menor sucio.
                              <br>&emsp;3. Cuando los padres, tutor o personas autorizadas para recoger al menor se comporten en forma irrespetuosa con el personal de DyFOMOAC.
                              <br>&emsp;4. Cuando el beneficiario  no cumpla con el programa de aplicación de vacunas del menor.
                              <br>&emsp;5. Cuando  el menor presente indisciplina, utilice palabras no apropiadas a su edad o faltas a la moral y buenas costumbres o muerda o lastime a sus compañeros.
                              <br>&emsp;6. Cuando el niño ingrese con las uñas largas.
                              <br>&emsp;7. Cuando no regresen la sábana de la colchoneta en la cual descansa el menor.
                              <br>&emsp;8. Cuando no entreguen el material de higiene solicitado por la maestra y acordado durante la inscripción.
                              <br>
                              <br>b) La amonestación por escrito procederá cuando:
                              <br>&emsp;1. Sea acreedor a dos amonestaciones verbales.
                              <br>&emsp;2. Los padres o tutores no reporten: cambio de domicilio, teléfono (particular, laboral, celular o radio localizador).
                              <br>&emsp;3. Cuando el menor presente por segunda ocasión, indisciplina o faltas a la moral o bien se conduzca de manera irrespetuosa frente a sus maestros, directivos o compañeros.
                              <br>&emsp;4. Los padres incumplan en 2 ocasiones, al mes, con el horario de salida del menor.
                              <br>
                              <br>c) La suspensión temporal de 1, 2 ò 3 días precederá cuando:
                              <br>&emsp;1. Presenten 2 amonestaciones por escrito.
                              <br>&emsp;2. Los padres o menores vendan, intercambien o comercialicen cualquier artículo dentro de las instalaciones de DyFOMOAC .
                              <br>&emsp;3. Cuando se ingrese al menor en condiciones de enfermedad.
                              <br>&emsp;4. No se cubra la colegiatura a más tardar el día 3 o el día 16 para los alumnos con una antigüedad mayor a un año.
                              <br>&emsp;5. Se presente al menor persistentemente sucio en su persona, en su ropa y/o artículos.
                              <br>&emsp;6. Los padres, tutor o de alguna de las personas autorizadas para recoger al menor se presenten a las instalaciones bajo los efectos de alcohol o de algún fármaco.
                              <br>&emsp;7. Se acumulen 3 retardos para recoger al menor en los horarios establecido de salida.
                              <br>&emsp;8. Se presente al menor con rozaduras genitales (grietas, ampollas, o con el color de piel diferente al resto del cuerpo) o bien enfermedades contagiosas.
                              <br>&emsp;9. Cuando el padre, madre, tutor o persona encargada para entregar y recoger al menor, no llene el registro de asistencia y/o autorice la salida del menor.
                              <br>&emsp;10. Cuando el menor sufra alguna enfermedad infecto-contagiosa o presente fiebre, así como síntomas que generen molestias.
                              <br>&emsp;11. Cuando los padres o tutores no lleven al menor a consultar con su médico después de informarles que presentó fiebre, vómito, diarrea o bien algún malestar físico.
                              <br>&emsp;12. No presente al menor, evaluado el caso, a la valoración psicológica.
                              <br>&emsp;13. No se realice el pago de la(s) hora(s) extras el mismo día del suceso (Cap.VI-2).
                              <br>
                              <br>d) La suspensión indefinida o definitiva será clasificada por la dirección del CEO, las principales causas que pueden originar éstas son:
                              <br>&emsp;1. Cuando el menor presente algún padecimiento de tipo irreversible e incapacitante que requiera manejo y técnica especializada así como alimento especiales mínimos 2 veces por semana.
                              <br>&emsp;2. Cuando el menor no registre asistencias por 3 días consecutivos sin justificación de su médico.
                              <br>&emsp;3. Se incumpla en 2 ocasiones con los plazos para cubrir la colegiatura que por los servicios se haya acordado con el CEO.
                              <br>&emsp;4. Cuando el menor acumule 2 suspensiones temporales.
                            </p>

                            <p><b><center>CAPITULO VI</center></b></p>
                            <p><b><center>Costos</center></b></p>
                            <p style="text-align:justify">
                              1.	Colegiatura mensual $2,500.00 que incluye:
                              <br>&emsp;a.	Material lúdico
                              <br>&emsp;b.	Material de higiene y limpieza (excepto pañales, toallas húmedas, pomada para rozaduras, pasta y cepillo de dientes, ligas y/o peine o cepillo para el cabello, papel sanitario, sanitas para manos, jabón liquido y gel antibacterial)
                              <br>&emsp;c.	2 comidas calientes (desayuno y comida), y la primera colación, en los horarios establecidos en el CEO (No se ofrece ni administra alimentos especiales por dieta, edad o enfermedad).
                              <br>&emsp;d.	Actividades académicas, deportivas, estimulación temprana, lúdica y recreativa.
                              <br>&emsp;e.	Los niños que cuentan con Beca del cubrirá el costo mensual según el tabular de ayudas financieras.
                              <br>2.	Horas extras:
                              <br>&emsp;a.	$ 20.00 por cada 15 minutos, antes y/o después del horario acordado de entrada y salida.
                              <br>&emsp;b.	$ 60.00 por cada 15 minutos después de las 18:00 hrs.
                              <br>&emsp;Nota: Los pagos extras se realizarán el mismo día del suceso, de no realizarse el pago nos reservamos el derecho de admitir al menor al día siguiente.
                              <br>3.	Pagos (La colegiatura mensual se pagará por adelantada en los plazos acordados con la administración aún y cuando el menor no asista a clases):
                              <br>&emsp;a.	Mensual: Primeros tres días del mes en curso, a partir del día 4 se suspende al menor.
                              <br>&emsp;b.	Los alumnos con un año de antigüedad que por problemas económicos pueden pagar a más tardar el día 16 bajo el siguiente esquema: a partir del día 4 se le agrega un 5% a la colegiatura, a partir del día 10 al 15 se incrementa la colegiatura un 16%. Y el día 16 se suspende al menor.
                              <br>4.	Servicios Adicionales:
                              <br>&emsp;a.	Terapia psicológica $ 150.00 por cada 50 minutos de sesión.
                              <br>&emsp;b.	Terapia de lenguaje $150.00 por cada 50 minutos de sesión.
                              <br>&emsp;c.	Apoyo escolar $150.00 en asesoría grupal y $200.00 en individual.
                              <br>5.	Una vez realizado el pago, la inscripción, colegiatura, mensualidad o servicios adicionales, así como los materiales solicitados no serán reembolsables ni bonificados como pagos de colegiaturas de meses posteriores.
                              <br>6.	A quien lo solicite, puede pagar extas $30.00 (Treinta pesos 00/100 M.N.) para comprar al menor la fruta de la  segunda colación
                              <br>7.	Los lunes que el meno no traiga entre sus pertencias la sabanita para dormir se le cobrará al ingreso del menor la cantidad de $50.00 (Cincuenta pesos 00/100 M.N.) para cumplir con las reglas de sueño y descanso, de no pagar dicha cantidad se le negará el acceso al menor.
                            </p>

                            <p><b><center>CAPITULO VII</center></b></p>
                            <p><b><center>Transitorios</center></b></p>
                            <p style="text-align:justify">
                              1.	Todo lo no previsto en el presente reglamento será resuelto por el Consejo Directivo de la Asociación Civil, Desarrollo y Formación para el Menor Olivo.
                              <br>2.	Es requisito que la Madre, Padre o Tutor, firmen la carta responsiva para que el menor ingrese o permanezca inscrito en el Centro Educativo Olivo.
                              <br>3.	El personal de DyFOMOAC, así como los padres, tutores, y menores  inscritos serán quienes vigilen el cumplimiento del presente reglamento para alcanzar la misión de la Institución, y la ignorancia del mismo no exime de su cumplimiento.
                              <br>4.	El presente reglamento entra en vigor a partir del día 01 de julio de 2019.
                              <br>5.	El presente reglamento, sustituye los anteriores y deja sin validez todas las disposiciones que vayan en contra del presente reglamento.
                            </p>

                            <hr>
                            <p style="text-align:justify">
                            El presente documento fue revisado y aprobado por directivos, docentes y 3 padres de familia del CEO y de la Asociación Civil Desarrollo y Formación para el Menor Olivo, y sus observaciones fueron integradas al reglamento.
                            </p>
                            <hr>

                            <p style="text-align:justify">
                            Certifico que conozco y acepto el Reglamento de la Institución, el cual me comprometo respetar, hacer cumplir, y aceptar las sanciones que de él se desprenden.
                            </p>

                              <?php
                              if(empty($info["correo_padre"])){
                                ?>
                                <form method="post">
                                <button type="submit" class="btn btn-info btn-fill pull-right">Aceptar Reglamento</button>
                                </form>
                                <?php
                              } else {
                                ?>
                                <button type="submit" class="btn btn-info btn-fill pull-right" disabled>Reglamento Aceptado</button>
                                <?php
                              }
                               ?>

                            <div class="clearfix"></div>
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
