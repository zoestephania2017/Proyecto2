<!--Codigo creado y Actualizado al 11/1/2018 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$checkbox=$_POST['ID_DetalleOrden'];
$Custodio=$_POST['textREmpleado'];
$Orden='Custodia';
$date = new DateTime();
$fecha=date("y-m-d");
//El constructor FOREACH funciona sobre arrays y objetos
 $eliminar=mysqli_query($conectar,"UPDATE detallesordenes set ID_Orden='$Orden', Fecha_DetalleOrden='$fecha', Codigo_Empleado ='$Custodio'
 	where ID_DetalleOrden = '$checkbox'");
 if($eliminar){
   echo'<script>
	     alert("Datos Reasignados correctamente");
	     window.history.go(-1);
	     </script>';
  }
  else{
  	echo'<script>
	     alert("Datos NO Reasignados");
	     window.history.go(-1);
	     </script>';
  }
?>
