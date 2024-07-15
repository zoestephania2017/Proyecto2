<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Ingreso=$_POST['textclave'];
//consulta
$verificar_empleado =mysqli_query ($conectar, "SELECT * FROM empleados WHERE Contrasena_Empleado ='$Ingreso' && ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales'");
if(mysqli_num_rows($verificar_empleado) > 0){
		header("location:Bienes.php");
	}else{
		echo'<script>
		     alert("contraseña incorrecta");
		     window.history.go(-1);
		     </script>';
   exit;
	}

?>
