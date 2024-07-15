<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Buscar=$_POST['textnumpla'];

//consulta
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where Inv_Mobiliario = '$Buscar'") or die("Error al extraer los Datos");
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
  <img style="width:14%; height:8%" src="Imagenes/nueva.png">
  <h2 style="text-transform: uppercase;">Busqueda Por Placas</h2>
   <table>
     <!--tabla de bienes asignados-->
   <tr class="titulo">
    <th id="Fecha">Fecha:</th>
    <th id="Empleado">Empleado:</th>
    <th id="Mobiliario">Mobiliario:</th>
    <th id="Marca">Marca:</th>
    <th id="Modelo">Modelo:</th>
    <th id="Serie">Serie:</th>
    <th id="Placa">Placa:</th>
    <th id="Color">Color:</th>
    <th id="Descripcion">Descripcion:</th>
    <th id="Realizado">Realizado:</th>
   </tr>
   <?php while($extraido = mysqli_fetch_array($consulta)){?>
   <tr>
    <th><?php echo $extraido['Fecha_DetalleOrden'];?></th>
    <th><?php echo $extraido['Codigo_Empleado'];?></th>
    <th><?php echo $extraido['ID_Mobiliario'];?></th>
    <th><?php echo $extraido['Marca_Mobiliario'];?></th>
    <th><?php echo $extraido['Modelo_Mobiliario'];?></th>
    <th><?php echo $extraido['Serie_Mobiliario'];?></th>
    <th><?php echo $extraido['Inv_Mobiliario'];?></th>
    <th><?php echo $extraido['Color_Mobiliario'];?></th>
    <th><?php echo $extraido['Descripcion_Mobiliario'];?></th>
    <th><?php echo $extraido['Edicion_Empleado'];?></th>
   </tr>
   <?php
    }
    mysqli_close($conectar);
   ?>
 </body>
</html>
