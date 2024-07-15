<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
  //coneccion con el servidor
  include("validar_coneccion.php");
  //consulta
  $consulta = mysqli_query($conectar,"SELECT * from mobiliarios where Actividad_Mobiliario ='0'") or die("Error al extraer los Datos");
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
  <img src="Imagenes/COPECO_small.jpg"><br>
  <h2>Tabla de Mobiliarios</h2><hr><br>
  <table>
    <!--tabla mostrar mobiliarios-->
  <tr class="titulo">
   <th id="Clave">Clave:</th>
   <th id="Nombre">Nombre:</th>
   <th id="Fecha">Fecha_Adquisicion:</th>
   <th id="Tipo">Tipo_Mobiliario:</th>
   <th id="Valor">Valor:</th>
   <th id="Moneda">Moneda:</th>
   <th id="Cantidad">Cantidad:</th>
   <th id="adquisicion">Adquirido:</th>
   <th id="Estado">Estado:</th>
  </tr>
  <?php while($extraido = mysqli_fetch_array($consulta)){?>
    <tr>
     <th><?php echo $extraido['ID_Mobiliario'];?></th>
     <th><?php echo $extraido['Nombre_Mobiliario'];?></th>
     <th><?php echo $extraido['FechaAdq_Mobiliario'];?></th>
     <th><?php echo $extraido['ID_TipoMobiliario'];?></th>
     <th><?php echo $extraido['ValorUnd_Mobiliario'];?></th>
     <th><?php echo $extraido['Tmoneda_Mobiliario'];?></th>
     <th><?php echo $extraido['Cantidad_Mobiliario'];?></th>
     <th><?php echo $extraido['Adquisicion_Mobilario'];?></th>
     <th><?php echo $extraido['ID_Estado'];?></th>
    </tr>
  <?php
   }
   mysqli_close($conectar);
   ?>
  </table><br><br><hr><br><br>
  <a href="Bienes.php">Volver</a>
 </body>
</html>
