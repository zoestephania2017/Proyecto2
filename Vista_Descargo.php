<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//consultas
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where ID_Orden = 'Descargo'") or die("Error al extraer los Datos");
?>
<html>
 <head>
     <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>SIBICOP</title>
  <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
   <br><hr><img src="Imagenes/COPECO_small.jpg">
   <h2>Asignacion De Bienes</h2><hr><br><br>
   <table border="1"; cellspacing: 10px; width:20px;>
     <!--tabla mostrar mobiliarios en descargo-->
   <tr>
    <th id="Clave">Clave:</th>
    <th id="Fecha">Fecha de Orden:</th>
    <th id="ID">Estado:</th>
    <th id="Nombre">Nombre:</th>
    <th id="ID Mobiliario">ID Mobiliario:</th>
    <th id="Serie">Serie de Mobiliario:</th>
    <th id="Placa">Placa:</th>
    <th id="Hecho Por">Realizado Por:</th>
    <th id="Imagen">Imagen:</th>
   </tr>
   <?php while($extraido = mysqli_fetch_array($consulta)){?>
   <tr>
    <th><?php echo $extraido['ID_DetalleOrden'];?></th>
    <th><?php echo $extraido['Fecha_DetalleOrden'];?></th>
    <th><?php echo $extraido['ID_Orden'];?></th>
    <th><?php echo $extraido['Codigo_Empleado'];?></th>
    <th><?php echo $extraido['ID_Mobiliario'];?></th>
    <th><?php echo $extraido['Serie_Mobiliario'];?></th>
    <th><?php echo $extraido['Inv_Mobiliario'];?></th>
    <th><?php echo $extraido['Edicion_Empleado'];?></th>
    <th><img src="<?php echo $extraido['Foto_Mobiliario'];?>" width="100" height="100"</th>
   </tr>
   <?php
     }
     mysqli_close($conectar);
     ?>
     </form>
    </table><br><hr>
    <a href="Admin.php">Volver</a>
  </body>
</html>
