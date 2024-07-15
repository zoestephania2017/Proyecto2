<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
  //coneccion con el servidor
  include("validar_coneccion.php");
  //consulta
  $consulta = mysqli_query($conectar,"SELECT * from empleados where ID_Departamento = 'Direccion Administrativa y Financiera Bienes Nacionales'") or die("Error al extraer los Datos");
  ?>
  <html>
  <head>
   <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
   <title>SIBICOP</title>
   <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
  </head>
   <body>
    <img class="centra" src="Imagenes/nueva.png"><br>
    <h2>Tabla de Empleados</h2><hr>
    <table>
      <!--tabla de empleados-->
    <tr class="titulo">
     <th id="Clave">Clave</th>
     <th id="Nombre">Nombre</th>
     <th id="Identidad">Identidad</th>
     <th id="Departamento">Departamento</th>
     <th id="Cargos">Cargos</th>
     <th id="fecha">Fecha_Entrada</th>
     <th id="fecha">Contraseñas</th>
    </tr>
    <?php while($extraido = mysqli_fetch_array($consulta)){?>
    <tr>
     <th><?php echo $extraido['Codigo_Empleado'];?></th>
     <th><?php echo $extraido['Nombre_Empleado'];?></th>
     <th><?php echo $extraido['ID_Empleado'];?></th>
     <th><?php echo $extraido['ID_Departamento'];?></th>
     <th><?php echo $extraido['Cargo_Empleado'];?></th>
     <th><?php echo $extraido['FInicio_Empleado'];?></th>
     <th><?php echo $extraido['Contrasena_Empleado'];?></th>
    </tr>
    <?php
    }
   mysqli_close($conectar);
   ?>
   </table><br><hr><br>
   <a href="Admin.php">Volver</a>
 </body>
</html>
