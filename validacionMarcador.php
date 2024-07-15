<!--Codigo creado y Actualizado al 8/8/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$ID_Empleado=$_POST['textEmpleado'];
$jornada=$_POST['textjornada'];
$date = new DateTime();
$horamin=date("h:i");
$hora=date("h");
$min=date("i");
$fecha=date("y-m-d");

if($ID_Empleado == "Jornada Entrada" && $hora <= 5){
  $llegada = "Temprano";
}else if($ID_Empleado == "Turno Dia Entrada" && $hora <= 3){
  $llegada = "Temprano";
}else if($ID_Empleado == "Turno Noche Entrada" && $hora <= 3){
  $llegada = "Temprano";
}else if($ID_Empleado == "Jornada Salida" && $hora <= 1 && $min <=59){
  $llegada = "Salida";
}else if($ID_Empleado == "Turno Dia Salida" && $hora <= 2 && $min <=59){
  $llegada = "Salida";
}else if($ID_Empleado == "Turno Noche Salida" && $hora <= 2 && $min <=59){
  $llegada = "Salida";
}else{
  $llegada = "Tarde";
}
//consulta
$sql= "INSERT INTO marcador(ID_Empleado,Hora_Marcador,Fecha_Marcador,Jornada_Marcador,Llegada_Marcador)
       VALUES('$ID_Empleado','$horamin','$fecha','$jornada','$llegada' )";
//ejecutar consulta
$ejecutar=mysqli_query($conectar,$sql);
//veerificar ejecucion
if(!$ejecutar){
	echo'<script>
	     alert("Error al Marcar");
	     window.history.go(-1);
	     </script>';
}else{
	echo'<script>
	     alert("Datos guardados correctamente");
	     window.history.go(-1);
	     </script>';
}

?>
