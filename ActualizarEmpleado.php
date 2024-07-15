<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Codigo_Empleado=$_POST['textidemp'];
$Departamentonu_Empleado=$_POST['depanu'];
$cargonu=$_POST['texCargonu'];
$date = new DateTime();
$NFecha= $date->format('y-m-d');
//valida que no exita otro campo igual
$verificar_empleado =mysqli_query ($conectar, "SELECT * FROM empleados WHERE ID_Empleado =
	'$Codigo_Empleado'");
if(mysqli_num_rows($verificar_empleado) > 0){
	echo'<script>
	     alert("El Empleado ya existe");
	     window.history.go(-1);
	     </script>';
	exit;
}
//nuevo empleado consulta
$actualizar=mysqli_query($conectar,"UPDATE empleados set ID_Departamento='$Departamentonu_Empleado', Cargo_Empleado='$cargonu', FInicio_Empleado='$NFecha' where Nombre_Empleado ='$Codigo_Empleado'");
      //verificar ejecucion
			if(!$actualizar){
				echo'<script>
						 alert("Error al Eliminar Registros");
						 window.history.go(-1);
						 </script>';
			}else{
				echo'<script>
						 alert("Datos Actualizados correctamente");
						 window.history.go(-1);
						 </script>';
			}
?>
