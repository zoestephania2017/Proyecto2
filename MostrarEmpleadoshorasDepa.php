<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
$Buscar=$_POST['textidemp'];
//consultas
$consulta = mysqli_query($conectar,"SELECT * from marcador  where ID_Empleado ='$Buscar' ") or die("Error al extraer los Datos");
?>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
 <title>SIBICOP</title>
 <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
</head>
 <body>
   <img src="Imagenes/COPECO_small.jpg">
   <h2>Calendario de Marcado por Empleado</h2><hr><br><br>
   <table>
    <!--tabla mostrar mobiliarios-->
   <tr class="titulo">
    <th id="Fecha">Fecha de Orden:</th>
    <th id="Nombre">Nombre:</th>
    <th id="jornada">Jornada:</th>
    <th id="llegada">Llegada:</th>
    <th id="hora">Hora:</th>
   </tr>
   <?php while($extraido = mysqli_fetch_array($consulta)){?>
   <tr>
    <th><?php echo $extraido['Fecha_Marcador'];?></th>
    <th><?php echo $extraido['ID_Empleado'];?></th>
    <th><?php echo $extraido['Jornada_Marcador'];?></th>
    <th><?php echo $extraido['Llegada_Marcador'];?></th>
    <th><?php echo $extraido['Hora_Marcador'];?></th>
   </tr>
   <?php
   }
   mysqli_close($conectar);
   ?>
   </table>
   <br><hr>
   <a href="RRHH.php">Volver</a>
 </body>
</html>
