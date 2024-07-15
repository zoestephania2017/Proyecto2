<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
//coneccion con el servidor
include("validar_coneccion.php");

//recuperar variables
$Orden='Descargo';
$date = new DateTime();
$fecha=date("y-m-d");

//IF PARA VERFICAR SI NO SE HA ENVIADO ITEM PARA DESCARGO 
if (empty($_POST['ID_DetalleOrden'])){
    echo '<script>
        alert("Debes Seleccionar un item");
        window.history.go(-1);
        </script>';
}
else {
    //IF PARA VERFICAR SI ES UN ARREGLO
    if (is_array($_POST['ID_DetalleOrden'])){
        
        $checkbox = $_POST['ID_DetalleOrden'];
        
        //FOR PARA RECORRER EL ARREGLO Y EJECUTAR LA SENTENCIA SQL POR CADA VALOR DEL ARREGLO
        for($i=0;$i<count($_POST['ID_DetalleOrden']);$i++){
            $eliminar=mysqli_query($conectar,"UPDATE detallesordenes set ID_Orden='$Orden', Fecha_DetalleOrden='$fecha'
            where ID_DetalleOrden = '$checkbox[$i]'");
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
                window.history.go(-1);
                </script>';

        }                   
    }
    //ELSE PARA MODIFICAR LA VARIABLE QUE RECIBE EL ARREGLO
    else {
        $checkbox = array();
    }   

}


//----------------------------------------------------------------------------------------------------------------------------------------------------------
//SEGMENTO DE CODIGO DE PRUEBA PARA RECEPCION DE UN ARREGLO DE CHECKBOX
/*
if (empty($_POST['ID_DetalleOrden'])){
    
    echo'<script>
	     alert("Debes Seleccionar un item");
	     window.history.go(-1);
	     </script>';
}
else { 
     if (is_array($_POST['ID_DetalleOrden'])){
        $seleccionado = '';
        $num_ID_DetalleOrden = count($_POST['ID_DetalleOrden']);
        $contador = 0;
        foreach ($_POST['ID_DetalleOrden'] as $dato => $valor){
            if ($contador != $num_ID_DetalleOrden-1)
                $seleccionado .= $valor.',';//si son varios item
            else
                $seleccionado .= $valor;//si es valor unico
            $contador++;
        }
    }
    else {
        
    }
    explode(",",$seleccionado);
}
*/

//---------------CODIGO ANTERIOR DEL FORMULARIO VALIDAR_DESCARGAR--------------------------------------------

/*checkbox=$_POST['ID_DetalleOrden'];

$Orden='Descargo';
$date = new DateTime();
$fecha=date("y-m-d");

//El constructor FOREACH funciona sobre arrays y objetos
$eliminar=mysqli_query($conectar,"UPDATE detallesordenes set ID_Orden='$Orden', Fecha_DetalleOrden='$fecha'
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
  }*/

?>

