<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Buscar=$_POST['textidemp'];
$echo=$_POST['idempord'];
$Fechaps=$_POST['textFechapas'];
$cargo_emp;
$dir_emp;

//consulta
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where Codigo_Empleado = '$Buscar'  && Fecha_DetalleOrden = '$Fechaps'") or die("Error al extraer los Datos");
$consulta1 = mysqli_query($conectar,"SELECT Cargo_Empleado, Direccion_Empleado from empleados where Nombre_Empleado ='$Buscar'") or die("Error al extraer los Datos");

$date = new DateTime();
$fecha=date("y-m-d");
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
  <img style="width:14%; height:8%" src="Imagenes/nueva.png">
  <h2 style="text-transform: uppercase;">Pase de Salida</h2>
  <form action="validar_descargar.php" method="post">
    <p>Por este medio El Departamento de Bienes Nacionales de la Comision Permanente de Contingencia
      <b>AUTORIZA</b> al Sr.el EGRESO del Siguienteequipo que sera utilizado para labores fuera de la institucion,
    y que sera devuelto dentro de, y a continuacion se detalla:</p>
   <table>
     <!--tabla de bienes asignados-->
   <tr class="titulo">
    <th id="Fecha">Fecha:</th>
    <th id="Mobiliario">Mobiliario:</th>
    <th id="Marca">Marca:</th>
    <th id="Modelo">Modelo:</th>
    <th id="Serie">Serie:</th>
    <th id="Placa">Placa:</th>
    <th id="Color">Color:</th>
    <th id="Realizado">Realizado:</th>
   </tr>
   <?php while($extraido = mysqli_fetch_array($consulta)){?>
   <tr>
    <th><?php echo $extraido['Fecha_DetalleOrden'];?></th>
    <th><?php echo $extraido['ID_Mobiliario'];?></th>
    <th><?php echo $extraido['Marca_Mobiliario'];?></th>
    <th><?php echo $extraido['Modelo_Mobiliario'];?></th>
    <th><?php echo $extraido['Serie_Mobiliario'];?></th>
    <th><?php echo $extraido['Inv_Mobiliario'];?></th>
    <th><?php echo $extraido['Color_Mobiliario'];?></th>
    <th><?php echo $extraido['Edicion_Empleado'];?></th>
   </tr>
   <?php
    }
     while ($extraido2 = mysqli_fetch_array($consulta1)){
      $cargo_emp = $extraido2['Cargo_Empleado'];
      $dir_emp = $extraido2['Direccion_Empleado'];
    }
    mysqli_close($conectar);
   ?>
 </table>
   <p>Para constancia firmamos el presente documento en la Aldea el Ocotal, Municipio del Distrito Central.</p>
  </form><br><br><br><hr><br>

  
   <table style = "border:0px; border-collapse:collapse; padding:5px;" >
    <tr>
      <th style = "width: 33%"><p style = "text-decoration: overline; display: inline;"><?php echo $_POST['textidemp'];?></p></th>
      <th style = "width: 33%"><p style = "text-decoration: overline; display: inline;"><?php echo $_POST['idempord'];?></p></th>
      <th style = "width: 33%"><p style = "text-decoration: overline; display: inline;">Carlos Saul Garcia Matute</th>
    </tr>

    <tr>
      <th><p><?php echo $cargo_emp?></p></th>
      <th><p>Auxiliar de Bienes Nacionales</p></th>
      <th><p>Jefe de Bienes Nacionales</p></th>
    </tr>

    <tr>
      <th><p><?php echo $dir_emp?></p></th>
      <th><p>Entrego Conforme</p></th>
    </tr>

    <tr>
      <th><p>Recibi Conforme</p></th>
    </tr>
  </table>
  
<br>
<br>

  <a href="Bienes.php">Volver</a>
 </body>
</html>
