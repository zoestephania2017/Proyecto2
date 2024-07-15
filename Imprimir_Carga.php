<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//consultas
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where ID_Orden='Cargo'") or die("Error al extraer los Datos");
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
   <img src="Imagenes/COPECO_small.jpg">
   <h2>Inventario De Bienes</h2><hr><br><br>
   <table>
    <!--tabla mostrar mobiliarios-->
   <tr class="titulo">
    <th id="Clave">Clave:</th>
    <th id="Fecha">Fecha de Orden:</th>
    <th id="Nombre">Nombre:</th>
    <th id="Mobiliario">Mobiliario:</th>
    <th id="Marca">Marca:</th>
    <th id="Modelo">Modelo:</th>
    <th id="Serie">Serie:</th>
    <th id="Placa">Placa:</th>
    <th id="Color">Color:</th>
    <th id="Descripcion">Descripcion:</th>
    <th id="Hecho Por">Realizado Por:</th>
    <th id="Imagen">Imagen:</th>
   </tr>
   <?php while($extraido = mysqli_fetch_array($consulta)){?>
   <tr>
    <th><?php echo $extraido['ID_DetalleOrden'];?></th>
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
    <th><img src="<?php echo $extraido['Foto_Mobiliario'];?>" width="100" height="100"</th>
   </tr>
   <?php
   }
   mysqli_close($conectar);
   ?>
   </table>
   <br><hr>
   <a href="Bienes.php">Volver</a>
 </body>
</html>
