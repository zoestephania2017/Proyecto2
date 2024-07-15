<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");
//recuperar variables
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
$orden='Cargo';
$estdet=$_POST['estado'];
$date = new DateTime();
$NFecha= $date->format('y-m-d');
//consultas
  $verificar_placa =mysqli_query ($conectar, "SELECT * FROM detallesordenes WHERE Inv_Mobiliario = '$inv_mobiliario'");
  if(mysqli_num_rows($verificar_placa) > 0){
      echo'<script>
           alert("El Numero de Inventario ya Existe");
           window.history.go(-1);
           </script>';
      exit;
    }
  //consultade nuevo cargo
  $consulta_sql= "INSERT INTO detallesordenes(Fecha_DetalleOrden,ID_Orden,Codigo_Empleado,ID_Mobiliario,Marca_Mobiliario,Modelo_Mobiliario,Inv_Mobiliario,
      Serie_Mobiliario,Color_Mobiliario,Descripcion_Mobiliario,Estado_Detalleord,Edicion_Empleado,Foto_Mobiliario)VALUES('$NFecha','$orden','$Nombre_Empleado','$Id_Mobiliario','$marca_Mob','$modelo_Mob','$inv_mobiliario','$serie_mobiliario','$color_Mob','$Descripcion_mobiliario','$estdet','$empleado_orden','$destino')";
  //ejecutar consulta
  $ejecutar=mysqli_query($conectar,$consulta_sql);
  //verificar ejecucion
  if(!$ejecutar){
  	echo'<script>
       alert("Error al insertar los datos");
       window.history.go(-1);
       </script>';
  }else{
  	echo'<script>
       alert("Datos Cargados correctamente");
       window.history.go(-1);
       </script>';
    }
?>
