<!--Codigo creado y Actualizado al 11/1/2018 por: Rafael Alonso Motiño Vargas-->
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
  <h2>Custodia por Empleado</h2><hr>
  <form action="validar_custodia.php" method="post">
      <fieldset style="text-align: center;"><br>
      <label for="textREmpleado">Empleado Custodio:</label>
      <label for="idempord">Orden Realizado por:</label><br>
      <select id="textREmpleado" name="textREmpleado">
      <option value=" ">--Seleccione Empleado--</option>
        <?php
        $empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
        $empR = mysqli_query($conectar,$empQ);
        while($empREG = mysqli_fetch_array($empR)){
          print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
        }
        ?>
      </select>
      <select id="idempord" name="idempord" required>
      <option value=" ">--Quien Hace la Orden--</option>
        <?php
        $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes'";
        $idempordR = mysqli_query($conectar,$idempordQ);
        while($idempordREG = mysqli_fetch_array($idempordR)){
          print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
        }
        ?>
      </select><br><br>
      <input  style="width:30%; height:6%;" type="submit"  value="Custodia"><br><br>
      </fieldset>
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
    <th id="Descripcion">Descripcion:</th>
    <th>Custodiar</th>
   </tr>

   <?php while($varCont= mysqli_fetch_array($consultaCont)){      //EXTRAE EL VALOR LA VARIABLE ARRAY $consultaCont
          $vCont = $varCont['count(*)'];}                         //ASIGNA A LA VARIABLE $vCont EL VALOR CONTENIDO EN LA VARIABLE DE TIPO ARREGLO
          //echo "Total Item: ", $vCont;                             //IMPRIME EL TOTAL DE ITEM 
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
    <th><?php echo $extraido['Descripcion_Mobiliario'];?></th>
    <th><input type="checkbox" name="ID_DetalleOrden"  value="<?php echo $extraido['ID_DetalleOrden'];?>"></th>
  </tr>

  <?php } ?>
   
   <?php
    mysqli_close($conectar);
   ?>
    </form>
  </table><br><hr><br>
  <a href="Bienes.php">Volver</a>
 </body>
</html>
