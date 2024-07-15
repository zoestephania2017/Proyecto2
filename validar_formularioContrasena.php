<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Codigo_Empleado=$_POST['textidemp'];
$Contrasena_Empleado=$_POST['Contrasena'];
//valida que no exita otro campo igual
//nuevo empleado consulta
$nueva=mysqli_query($conectar,"UPDATE empleados set Contrasena_Empleado='$Contrasena_Empleado' where Nombre_Empleado ='$Codigo_Empleado'");
      //verificar ejecucion
			if(!$nueva){
				echo'<script>
						 alert("Error al Crear Contraseña");
						 window.history.go(-1);
						 </script>';
			}else{
				echo'<script>
						 alert("Dato Creado correctamente");
						 window.history.go(-1);
						 </script>';
			}
?>
