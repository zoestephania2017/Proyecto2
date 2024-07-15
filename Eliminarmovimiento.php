<!--Codigo creado y Actualizado al 11/1/2018 por: Rafael Alonso Motiño Vargas-->
<?php
    //coneccion con el servidor
    include("validar_coneccion.php");
    //recuperar variables
    $eliminar = $_POST['textIdmovimiento'];
    //consultas
    $borrar= mysqli_query($conectar,"DELETE  from detallesordenes where ID_DetalleOrden='$eliminar'");
    //verificar ejecucion
        if(!$borrar){
          echo'<script>
               alert("Error al Eliminar los Registros");
               window.history.go(-1);
               </script>';
        }else{
          echo'<script>
               alert("Datos Eliminados correctamente");
               window.history.go(-1);
               </script>';
        }
?>
