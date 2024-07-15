<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->

<?php
//coneccion con el servidor
include("validar_coneccion.php");

//recuperar variables
//$checkbox=$_POST['ID_DetalleOrden']; 
//$REmpleado=$_POST['textREmpleado'];
//$realizo=$_POST['idempord'];

$Orden='Cargo';
$date = new DateTime();
$fecha = date("y-m-d");

//IF PARA VERFICAR LOS VALORES ENVIADOS 
if (empty($_POST['ID_DetalleOrden'])){
	echo '<script>
		alert("Seleccione un Item");
		window.history.go(-1);
		</script>';
}
elseif ($_POST['textREmpleado']==' '){
	echo '<script>
		alert("Seleccione un Empleado");
		window.history.go(-1);
		</script>';	
}
elseif ($_POST['idempord']==' '){
	echo '<script>
		alert("Seleccione un Empleado de Bienes Nacionales");
		window.history.go(-1);
		</script>';
} 
else{
	//IF PARA VERFICAR SI ES UN ARREGLO
    if (is_array($_POST['ID_DetalleOrden'])){

        $checkbox = $_POST['ID_DetalleOrden'];
		$realizo = $_POST['idempord'];
		$REmpleado = $_POST['textREmpleado'];

		//FOR PARA RECORRER EL ARREGLO Y EJECUTAR LA SENTENCIA SQL POR CADA VALOR DEL ARREGLO
        for($i=0;$i<count($_POST['ID_DetalleOrden']);$i++){
            $eliminar = mysqli_query($conectar,"UPDATE detallesordenes SET Codigo_Empleado = '$REmpleado', Edicion_Empleado = '$realizo', ID_Orden = '$Orden', Fecha_DetalleOrden ='$fecha'
            WHERE ID_DetalleOrden = '$checkbox[$i]'");
        }
        

        //MENSAJE DE ALERTA POR CAMBIO EN LOS ITEM SELECCIONADOS 
        if($eliminar){
			echo '<script>
				alert("Datos Reasignados correctamente");
				window.history.go(-1);
				</script>';
		}
		else{
			echo '<script>
				alert("Datos no Reasignados");
				windows.history.go(-1);
				</script>';
		}
    }
    //ELSE PARA MODIFICAR LA VARIABLE QUE RECIBE EL ARREGLO
    else {
		$checkbox = array();
	}

}
	
/*	
//CODIGO ANTERIOR DEL FORMULARIO VALIDAR_REASIGNAR
//El constructor FOREACH funciona sobre arrays y objetos
//foreach($checkbox as $value) {
 $eliminar=mysqli_query($conectar,"UPDATE detallesordenes set Codigo_Empleado = '$REmpleado', Edicion_Empleado='$realizo', ID_Orden='$Orden', Fecha_DetalleOrden='$fecha'
 	where ID_DetalleOrden = '$checkbox'");
 if($eliminar){
   echo'<script>
	     alert("Datos Reasignados correctamente");
	     window.history.go(-1);
	     </script>';
  }
  else{
  	echo'<script>
	     alert("Datos NO Reasignados");
	     window.history.go(-1);
	     </script>';
  }
*/
//}

?>
