<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
    //coneccion con el servidor
    include("validar_coneccion.php");
    //recuperar variables
    $eliminar = $_POST['textIdmobiliario'];
    $Acti='1';
    //consultas
    $borrar= mysqli_query($conectar,"UPDATE mobiliarios set Actividad_Mobiliario= '$Acti' where Nombre_Mobiliario='$eliminar'");
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
