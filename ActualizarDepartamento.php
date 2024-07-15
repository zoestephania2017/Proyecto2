<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$ID_Departamento=$_POST['textIDDepartamento'];
$Nombres_Departamento=$_POST['textNombreDepartamento'];
$Descripcion_Departamento=$_POST['textDescripcionDepartamento'];
//valida que no exita otro campo igual
$verificar_departamento =mysqli_query ($conectar, "SELECT * FROM departamentos WHERE Nombre_Departamento =
	'$Nombres_Departamento'");
if(mysqli_num_rows($verificar_departamento) > 0){
	echo'<script>
	     alert("El departamento ya existe");
	     window.history.go(-1);
	     </script>';
	exit;
}
//nuevo departamento consulta
$actualizar=mysqli_query($conectar,"UPDATE departamentos set Nombre_Departamento='$Nombres_Departamento',Descripcion_Departamento
	    ='$Descripcion_Departamento' where ID_Departamento ='$ID_Departamento'");
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
