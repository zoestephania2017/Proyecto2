<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php
    //coneccion con el servidor
    include("validar_coneccion.php");
    //recuperar variables
    $Codigo_Empleado = $_POST['textIDEmpleado'];
    $estemps='2';
    //consultas
    $borrar=mysqli_query($conectar,"UPDATE empleados set Estado_Empleado='$estemps' where Codigo_Empleado ='$Codigo_Empleado'");
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
