<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Nombres_Departamento=$_POST['textNombreDepartamento'];
$Descripcion_Departamento=$_POST['textDescripcionDepartamento'];
//consultas
$verificar_departamento =mysqli_query ($conectar, "SELECT * FROM departamentos WHERE Nombre_Departamento =
	'$Nombres_Departamento'");
$sql= "INSERT INTO departamentos(Nombre_Departamento,Descripcion_Departamento) VALUES('$Nombres_Departamento',
	    '$Descripcion_Departamento')";
//valida que no exita otro campo igual
if(mysqli_num_rows($verificar_departamento) > 0){
	echo'<script>
	     alert("El departamento ya existe");
	     window.history.go(-1);
	     </script>';
	exit;
}
//ejecutar consulta
$ejecutar=mysqli_query($conectar,$sql);
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
