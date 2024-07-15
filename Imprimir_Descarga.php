<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//consultas
$consulta = mysqli_query($conectar,"SELECT * from detallesordenes where ID_Orden = 'Descargo' || ID_Orden = 'Custodia'") or die("Error al extraer los Datos");
?>
<html>
 <head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <title>SIBICOP</title>
  <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
  <meta charset="utf-8">
</head>
<body>
  <br><hr><img src="Imagenes/COPECO_small.jpg">
  <h2>Asignacion De Bienes</h2><hr><br><br>
  <form action="validar_Reasignar.php" method="post">
     <fieldset style="text-align: center;"><br>
     <label for="textREmpleado">Empleado a Reaccionar:</label>
     <label for="idempord">Orden Realizada por:</label><br>
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
       $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
       $idempordR = mysqli_query($conectar,$idempordQ);
       while($idempordREG = mysqli_fetch_array($idempordR)){
         print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
       }
       ?>
     </select><br><br>
     <input  style="width:30%; height:6%;" type="submit"  value="Reaccinar"><br><br>
     </fieldset>
    <table>
     <!--tabla mostrar mobiliarios en descargo-->
        <tr class="titulo">
          <th id="Clave">Clave:</th>
          <th id="Fecha">Fecha de Orden:</th>
          <th id="ID">Estado:</th>
          <th id="Nombre">Nombre:</th>
          <th id="ID Mobiliario">ID Mobiliario:</th>
          <th id="Serie">Serie de Mobiliario:</th>
          <th id="Placa">Placa:</th>
          <th id="Descripcion">Descripcion:</th>
          <th id="Hecho Por">Realizado Por:</th>
          <th id="Imagen">Imagen:</th>
          <th id="Descargo">Descargo:</th>
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
        <th><?php echo $extraido['Descripcion_Mobiliario'];?></th>
        <th><?php echo $extraido['Edicion_Empleado'];?></th>
        <th><img src="<?php echo $extraido['Foto_Mobiliario'];?>" width="100" height="100"></th>
        <th><input type="checkbox" name="ID_DetalleOrden[]"  value="<?php echo $extraido['ID_DetalleOrden'];?>"></th>
      </tr>
    <?php
     }
     mysqli_close($conectar);
    ?>
    </table>
    <br><hr>
    </form>
    <a href="Bienes.php">Volver</a>
</body>
</html>
