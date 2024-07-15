<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Ingreso=$_POST['textclave'];
//consulta
$ejecutar=mysqli_query($conectar);
//verificar ejecucion
if($Ingreso == "rrhh"){
  header("location:RRHH.php");
}if($Ingreso == "BNN2000C0"){
  header("location:Admin.php");
}else{ 
	echo'<script>
	     alert("contraseña incorrecta");
	     window.history.go(-1);
	     </script>';
}
?>
