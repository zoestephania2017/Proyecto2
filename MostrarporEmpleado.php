<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php include("validar_coneccion.php");?>
<?php



//recuperar variables
$Buscar=$_POST['textEmpleado'];

//consulta
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where ID_Orden = 'Cargo' && Codigo_Empleado ='$Buscar'") or die("Error al extraer los Datos");
$consultaCont = mysqli_query($conectar,"SELECT count(*) from detallesordenes where ID_Orden = 'Cargo' && Codigo_Empleado ='$Buscar'") or die("Error al extraer los Datos");

?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>SIBICOP</title>
    <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
    
</head>
<body>
    <img src="Imagenes/COPECO_small.jpg">
    <h2>Descargo a Empleado</h2><hr>
      <form action="validar_descargar.php" method="post">
   <table>
    <!--tabla busqueda de bienes por empleados-->
   <tr class="titulo">
    <th id="N">Item:</th>
    <th id="Fecha">Fecha:</th>
    <th id="Mobiliario">Mobiliario:</th>
    <th id="Marca">Marca:</th>
    <th id="Modelo">Modelo:</th>
    <th id="Serie">Serie:</th>
    <th id="Placa">Placa:</th>
    <th id="Color">Color:</th>
    <th id="Descargo">Descargo:</th>
   </tr>
   
   <?php while($varCont= mysqli_fetch_array($consultaCont)){      //EXTRAE EL VALOR LA VARIABLE ARRAY $consultaCont
          $vCont = $varCont['count(*)'];}                         //ASIGNA A LA VARIABLE $vCont EL VALOR CONTENIDO EN LA VARIABLE DE TIPO ARREGLO
          echo "Total Item: ", $vCont;                             //IMPRIME EL TOTAL DE ITEM 
          //$vContT = intval($vCont);                             //CAMBIA LA VARIABLE A ENTERO
   
          for($i=1;$i<=$vCont;$i++){                                  //CICLO "for" PARA RECORRER LA CONSULTA SQL E IMPRIMIR ELNUMERO DE ITEM CONTENIDOS EN LA CONSULTA
            $extraido=mysqli_fetch_array($consulta)?>

   <?php //while($extraido = mysqli_fetch_array($consulta)){?> 
   <tr>
    <th><?php echo $i;?></th>
    <th><?php echo $extraido['Fecha_DetalleOrden'];?></th>
    <th><?php echo $extraido['ID_Mobiliario'];?></th>
    <th><?php echo $extraido['Marca_Mobiliario'];?></th>
    <th><?php echo $extraido['Modelo_Mobiliario'];?></th>
    <th><?php echo $extraido['Serie_Mobiliario'];?></th>
    <th><?php echo $extraido['Inv_Mobiliario'];?></th>
    <th><?php echo $extraido['Color_Mobiliario'];?></th>
    <!--<th><?php echo $extraido['ID_DetalleOrden'];?></th> VER CODIGO DEL DETALLE DE ORDEN-->
    <th><input type="checkbox" name="ID_DetalleOrden[]"  value="<?php echo $extraido['ID_DetalleOrden'];?>"></th>
   </tr>
    <?php } ?>

    <?php
    mysqli_close($conectar);
    ?>
    </table>
    <br><br>
    <input style="width:30%; height:6%;" type="submit"  value="Descargo"><br><hr><br>
    </form><br>
    <a href="Bienes.php">Volver</a>
 </body>
</html>





