<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$Nombre_Mobiliario=$_POST['textNombreMobili'];
$numero_Mobiliario=$_POST['textIdmobiliario'];
$cantidad_Mobiliario=$_POST['textCantidad'];
$Mobiliario=$_POST['tipomob'];
$Echopor=$_POST['adqui'];
$Estado=$_POST['estado'];
$Tipomoneda=$_POST['textTmonedaMobiliario'];
$valor=$_POST['textvalorMobiliario'];
$date = new DateTime();
$NFecha= $date->format('y-m-d');
//Actualizar Mobiliario consulta

$actualizar=mysqli_query($conectar,"UPDATE mobiliarios set Cantidad_Mobiliario= '$cantidad_Mobiliario', Nombre_Mobiliario='$Nombre_Mobiliario', FechaAdq_Mobiliario='$NFecha',
	 ID_TipoMobiliario='$Mobiliario', ValorUnd_Mobiliario='$valor', Tmoneda_Mobiliario='$Tipomoneda', Adquisicion_Mobilario='$Echopor', ID_Estado='$Estado' where ID_Mobiliario= '$numero_Mobiliario'");
      //verificar ejecucion
			if(!$actualizar){
				echo'<script>
						 alert("Error al Actualizar Registros");
						 window.history.go(-1);
						 </script>';
			}else{
				echo'<script>
						 alert("Datos Actualizados Correctamente");
						 window.history.go(-1);
						 </script>';
			}
?>
