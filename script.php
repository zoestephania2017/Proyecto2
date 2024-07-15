<!--Codigo creado y Actualizado al 8/8/2017 por: Rafael Alonso Motiño Vargas-->

 <!--script para validar solo letras en un campo-->
 <script languaje="Javascript">
    document.write('<style type="text/css">div.cp_oculta{display: none;}</style>');
    function MostrarOcultar(capa,enlace){
    if (document.getElementById){
        var aux = document.getElementById(capa).style;
        aux.display = aux.display? "":"block";
      }
    }
 </script>

 <script>
function soloLetras(e){
   key = e.keyCode || e.which;
   tecla = String.fromCharCode(key).toLowerCase();
   letras = " áéíóúabcdefghijklmnñopqrstuvwxyz";
   especiales = "8-37-39-46";

   tecla_especial = false
   for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}
</script>
<!-- para validar solonumeros en un campo-->
<script>
function validarSiNumero(numero){
if (!/^([0-9])*$/.test(numero))
alert("El Campo " + numero + " no es númerico");
}
</script>
