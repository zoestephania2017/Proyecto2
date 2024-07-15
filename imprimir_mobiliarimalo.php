<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//consultas
$consulta = mysqli_query($conectar,"SELECT * from mobiliarios where ID_Estado ='Malo' || ID_Estado ='Reparable'") or die("Error al extraer los Datos");
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
   <br><hr><img src="Imagenes/COPECO_small.jpg">
   <h2>Bienes en Mal Estado</h2><hr><br><br>
   <table border="1"; cellspacing: 10px; width:20px;>
     <!--tabla mostrar mobiliarios malos-->
   <tr>
    <th id="Clave">Clave:</th>
    <th id="Nombre">Nombre:</th>
    <th id="Marca">Marca:</th>
    <th id="Serie">Serie de Mobiliario:</th>
    <th id="Placa">Placa:</th>
    <th id="Fecha adquisicion">Fecha de Adquisicion:</th>
    <th id="Valor">Valor:</th>
    <th id="Moneda">Tipo de Moneda:</th>
    <th id="Estado">Estado:</th>
    <th id="Imagen">Imagen:</th>
   </tr>
   <?php while($extraido = mysqli_fetch_array($consulta)){?>
   <tr>
    <th><?php echo $extraido['ID_Mobiliario'];?></th>
    <th><?php echo $extraido['Nombre_Mobiliario'];?></th>
    <th><?php echo $extraido['Marca_Mobiliario'];?></th>
    <th><?php echo $extraido['Serie_Mobiliario'];?></th>
    <th><?php echo $extraido['Inv_Mobiliario'];?></th>
    <th><?php echo $extraido['FechaAdq_Mobiliario'];?></th>
    <th><?php echo $extraido['ValorUnd_Mobiliario'];?></th>
    <th><?php echo $extraido['Tmoneda_Mobiliario'];?></th>
    <th><?php echo $extraido['ID_Estado'];?></th>
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
