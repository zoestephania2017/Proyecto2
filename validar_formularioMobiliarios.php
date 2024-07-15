<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$nombre_Mobiliario=$_POST['textNombreMobiliario'];
$fechadq_Mobiliario=$_POST['textFechaAdqMobiliario'];
$tipomobiliario=$_POST['tipomob'];
$valor_Mobiliario=$_POST['textvalorMobiliario'];
$tmoneda_Mobiliario=$_POST['textTmonedaMobiliario'];
$cantidad_Mobiliario=$_POST['textCantidad'];
$adquisicion_Mobiliario=$_POST['adqui'];
$estado_Mobiliario=$_POST['estado'];
$estmod='0';
//consulta
$consultasql= "INSERT INTO mobiliarios(Nombre_Mobiliario,FechaAdq_Mobiliario,ID_TipoMobiliario,ValorUnd_Mobiliario,Tmoneda_Mobiliario,Cantidad_Mobiliario,Adquisicion_Mobilario,ID_Estado,Actividad_Mobiliario)
       VALUES('$nombre_Mobiliario','$fechadq_Mobiliario','$tipomobiliario','$valor_Mobiliario','$tmoneda_Mobiliario','$cantidad_Mobiliario','$adquisicion_Mobiliario','$estado_Mobiliario','$estmod')";
//ejecutar consulta
$ejecutar=mysqli_query($conectar,$consultasql);
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
