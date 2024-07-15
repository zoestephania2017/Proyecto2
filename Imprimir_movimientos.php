<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Buscar=$_POST['textimpmov'];
//consulta
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where ID_DetalleOrden = '$Buscar'") or die("Error al extraer los Datos");
$date = new DateTime();
$fecha=date("y-m-d");
?>
<html>
<head>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
 <?php while($extraido = mysqli_fetch_array($consulta)){?>
  <img style="width:14%; height:8%" src="Imagenes/nueva.png">
  <h2 style="text-transform: uppercase;">ACTA DE <?php echo $extraido['ID_Orden'];?></h2><hr>
  <form action="validar_descargar.php" method="post">
    <p>Recibi del Departamento de Bienes Nacionales de la Comision Permanente de Contingencias (COPECO),
   en calidad de asignacion, el equipo que a continuacion se detalla: </p>
   <table border="1"; cellspacing: 10px; width:20px;>
     <!--tabla de bienes asignados-->
   <tr>
    <th id="Clave">Clave:</th>
    <th id="Fecha">Fecha:</th>
    <th id="Mobiliario">Mobiliario:</th>
    <th id="Marca">Marca:</th>
    <th id="Modelo">Modelo:</th>
    <th id="Serie">Serie:</th>
    <th id="Placa">Placa:</th>
    <th id="Color">Color:</th>
   </tr>
   <tr>
    <th><?php echo $extraido['ID_DetalleOrden'];?></th>
    <th><?php echo $extraido['Fecha_DetalleOrden'];?></th>
    <th><?php echo $extraido['ID_Mobiliario'];?></th>
    <th><?php echo $extraido['Marca_Mobiliario'];?></th>
    <th><?php echo $extraido['Modelo_Mobiliario'];?></th>
    <th><?php echo $extraido['Serie_Mobiliario'];?></th>
    <th><?php echo $extraido['Inv_Mobiliario'];?></th>
    <th><?php echo $extraido['Color_Mobiliario'];?></th>
   </tr>
 </table><hr>
   <p ><b>Los bienes descritos deberian salir con pase de salida y solicitarlo por escrito al Departamento de
   Bienes Nacionales.</b></p>
   <p><b>NOTA:</b> A continuacion el Departamento de Bienes Nacionales establece lo siguiente:</p>
   <p><b>1)</b> Se prohibe cualquier cambio, movimiento asignacion traslado de bienes de una oficina a otra,
      o de un usuario a otro sin la debida autorizacion por parte de la Direccion de Administracion a travez
      de la unidad de Bienes Nacionales</p>
   <p><b>2)</b> Se prohibe retirar, remover o adulterar cualquier identificacion de inventario propiedad de COPECO como ser:
      Placa de Inventario, Numeracion o viñeta etc. </p>
   <p>Los bienes descritos son de mi responsabilidad para su cuidado y conservacion, los presentare al ser
   requeridos por <b>AUTORIDAD</b> competente, en caso de que resulte responsable de bienes faltantes o dañados y
   no haber respondido por el valor en metalico de los mismos, Autorizo a que se DEDUZCA de mi sueldo la
   cantidad correspondiente. </p>
   <p>Me Comprometo a la vez, a darle el cuidado, la proteccion y el mantenimiento oportuno y entregarlo a las
     autoridades competentes en el momento que este lo requiera.</p>
   <fieldset class="red">
    <p><b>IMPORTANTE:</b>El incumplimiento a lo anteriormente expuesto, se le estaria aplicando las medidas
      administrativas correspondientes. Una vez que el empleado termine toda relacion con esta institucion (COPECO).
      O sea reasignado a otra area dentro de la misma, debera entregar o reportar los bienes que fuesen de su
      responsabilidad a la mayor brevedad posible al departamento de Bienes Nacionales. En caso de no hacer
      dicha notificacion, este departamento no se hace responsable de la perdida y busqueda de los bienes asignados.
      por lo que Acepto todo lo descrito anteriormente en esta documento.</p>
  </fieldset>
  <p>Para constancia firmamos la presente acta de asignacion en la aldea el Ocotal Municipio del Distrito Central</p>
  </form><br><br><br><br><br><br><br>
  <p style="text-decoration: overline; padding-left: 16%; display: inline;"><?php echo $extraido['Codigo_Empleado'];?></p>
  <p style="text-decoration: overline; padding-left: 28%; display: inline;">Departamento de Bienes</p><br>
  <p style="padding-left: 18%; display: inline;">Recibi Conforme</p>
  <p style="padding-left: 34%; display: inline;">Entrego Conforme</p>
  <?php
   }
   mysqli_close($conectar);
  ?><br><br><br>
  <!--<input type="button" name="imprimir" value="Imprimir P&aacute;gina" onclick="window.print();"><br>-->
  <a href="Bienes.php">Volver</a>
 </body>
</html>
