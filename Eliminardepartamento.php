<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
    //coneccion con el servidor
    include("validar_coneccion.php");
    //recuperar variables
    $eliminar = $_POST['textIDDepartamento'];
    //consultas
    $borrar =mysqli_query($conectar,"DELETE *  from departamentos where ID_Departamento='$eliminar'");
    //verificar ejecucion
    if(!$borrar){
    	echo'<script>
    	     alert("Error al Eliminar Registros");
    	     window.history.go(-1);
    	     </script>';
    }else{
    	echo'<script>
    	     alert("Dato Eliminados correctamente");
    	     window.history.go(-1);
    	     </script>';
    }
?>
