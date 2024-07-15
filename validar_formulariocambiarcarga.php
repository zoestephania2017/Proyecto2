<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
$clave=$_POST['Clavemov'];
$Nombre_Empleado=$_POST['idempleado'];
$Id_Mobiliario=$_POST['idmobiliario'];
$empleado_orden=$_POST['idempord'];
$marca_Mob=$_POST['textmarmob'];
$modelo_Mob=$_POST['textnmomob'];
$color_Mob=$_POST['colormob'];
$serie_mobiliario=$_POST['textSerieMobiliario'];
$inv_mobiliario=$_POST['textnuminv'];
$Descripcion_mobiliario=$_POST['textDescripcionmob'];
$foto=$_FILES["textimagmob"]["name"];
$ruta=$_FILES["textimagmob"]["tmp_name"];
$destino="fotos/".$foto;
copy($ruta,$destino);
$estdet=$_POST['estado'];
$date = new DateTime();
$NFecha= $date->format('y-m-d');
//consultas
  //consultade nuevo cargo
  $cambiar=mysqli_query($conectar,"UPDATE detallesordenes set Fecha_DetalleOrden='$NFecha', Codigo_Empleado='$Nombre_Empleado', ID_Mobiliario='$Id_Mobiliario',
    Marca_Mobiliario='$marca_Mob', Modelo_Mobiliario='$modelo_Mob', Inv_Mobiliario='$inv_mobiliario', Serie_Mobiliario='$serie_mobiliario', Color_Mobiliario='$color_Mob',
    Descripcion_Mobiliario='$Descripcion_mobiliario', Estado_Detalleord='$estdet', Edicion_Empleado='$empleado_orden', Foto_Mobiliario='$destino' where ID_DetalleOrden='$clave'");
  //verificar ejecucion
  if(!$cambiar){
  	echo'<script>
       alert("Error al Cambiar Datos");
       window.history.go(-1);
       </script>';
  }else{
  	echo'<script>
       alert("Datos Corregidos correctamente");
       window.history.go(-1);
       </script>';
    }
?>
