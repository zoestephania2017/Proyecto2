<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables

$NombreNuevo= "Jose E Mejia Martinez";

//valida que no exita otro campo igual

$actualizar=mysqli_query($conectar,"UPDATE detallesordenes set Codigo_Empleado='$NombreNuevo' where Codigo_Empleado ='Jose EspectaciDn Mejia Martinez'");
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
