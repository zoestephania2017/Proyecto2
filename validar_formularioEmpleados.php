<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
  $Nombre_Empleado=$_POST['textNombreEmpleado'];
  $Telefono_Empleado=$_POST['textTelefonoEmpleado'];
  $Id_Empleado=$_POST['textIdEmpleado'];
  $Fecha=$_POST['textFechaNacEmpleado'];
  $Direccion_Empleado=$_POST['textDireccionEmpleado'];
  $Sueldo_Empleado=$_POST['textSueldoEmpleado'];
  $dep=$_POST['depa'];
  $cargo=$_POST['texCargo'];
  $estemp='0';
  $foto=$_FILES["textFotoEmpleado"]["name"];
  $ruta=$_FILES["textFotoEmpleado"]["tmp_name"];
  $destino="fotos/".$foto;
  copy($ruta,$destino);
  //validacion de ingreso de fecha
  $date = new DateTime();
  $NFecha= $date->format('y-m-d');
  $verificar_empleado =mysqli_query ($conectar, "SELECT * FROM empleados WHERE ID_Empleado = '$Id_Empleado'");

  if(mysqli_num_rows($verificar_empleado) > 0){
    	echo'<script>
    	     alert("El Empleado ya Existe en la base de datos");
    	     window.history.go(-1);
    	     </script>';
    	exit;
    }
  //consultas
  $consulta= "INSERT INTO empleados(Nombre_Empleado,ID_Empleado,Telefono_Empleado,Direccion_Empleado,ID_Departamento,Cargo_Empleado,Sueldo_Empleado,Fotografia_Empleado,Estado_Empleado,FInicio_Empleado)
           VALUES('$Nombre_Empleado','$Id_Empleado','$Telefono_Empleado','$Direccion_Empleado','$dep','$cargo','$Sueldo_Empleado','$destino','$estemp','$NFecha')";
  //ejecutar consulta
  $ejecutar=mysqli_query($conectar,$consulta);
  //verificar ejecucion
  if(!$ejecutar){
  	echo'<script>
  	     alert("Error al insertar los datos");
  	     window.history.go(-1);
  	     </script>';
  }else{
  	echo'<script>
  	     alert("Datos guardados correctamente");
  	     window.history.go(-1);
  	     </script>';
  }
?>
