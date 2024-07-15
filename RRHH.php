<!--Codigo creado y Actualizado al 8/8/2017 por: Rafael Alonso Motiño Vargas-->
<?php require("validar_coneccion.php"); ?>
<?php require("script.php"); ?>
<!DOCTYPE html>
<html>
  <head>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>SIBICOP</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
   </head>
   <body>
   <div class="contenedor">
   <!--Menu Principal Superior-->
  <header>
    <img src="Imagenes/COPECO_small.jpg">
    <a class="texto" href="javascript:MostrarOcultar('texto1');" title="Administrador de Empleados">Empleados</a>
    <a class="texto" href="javascript:MostrarOcultar('texto2');" title="Administrador de Departamentos">Departamentos</a>
    <a href="index.php">Volver</a>
  </header>
  <!--Menus desplegables-->
  <section>
    <div class="cp_oculta" id="texto1">
      <nav>
        <a class="text" href="javascript:MostrarOcultar('texto4');">Nuevo Empleado</a>
        <a class="text" href="javascript:MostrarOcultar('texto5');">Actualizar Empleados</a>
        <a class="text" href="javascript:MostrarOcultar('texto6');">Eliminar Empleados</a>
       </nav>
    </div>
    <div class="cp_oculta" id="texto2">
      <nav>
        <a class="text" href="javascript:MostrarOcultar('texto7');">Nuevo Departamento</a>
        <a class="text" href="javascript:MostrarOcultar('texto8');">Actualizar Departamento</a>
        <a class="text" href="javascript:MostrarOcultar('texto9');">Eliminar Departamento</a>
      </nav>
    </div>
   </section>
   <!--Formuliarios-->
   <section class="padre">
     <!--formulario de nuevo empleado-->
      <div class="cp_oculta" id="texto4">
        <form  action="validar_formularioEmpleados.php" method="POST">
          <h2>Nuevo Empleado</h2><br>
          <fieldset><br>
          <label for="textNombreEmpleado">Nombres Completos:</label>
          <label for="textIdEmpleado">Identidad del Empleado:</label>
          <label for="textTelefonoEmpleado">Numero Telefonico:</label><br>
          <input type="text" name="textNombreEmpleado" placeholder="Ingresa tu dos nombres" onkeypress="return soloLetras(event)" required>
          <input type="text" name="textIdEmpleado" placeholder="Ingresa Numero de Cedula" required>
          <input type="text" name="textTelefonoEmpleado" placeholder="Ingresa Numero Telefonico" required><br><br>
          <label for="textDireccionEmpleado">Direccion Completa:</label>
          <label for="depa">Departamento de Trabajo:</label>
          <label for="texCargo">Cargo a Desempeñar:</label><br>
          <input type="text" name="textDireccionEmpleado" placeholder="Ingresa Direccion completa" required>
          <select id="depa" name="depa">
          <option value=" ">--Seleccione Departamento --</option>
            <?php
            $depaQ = "SELECT Nombre_Departamento FROM departamentos";
            $depaR = mysqli_query($conectar,$depaQ);
            while($depaREG = mysqli_fetch_array($depaR)){
              print '<option value="'.$depaREG["Nombre_Departamento"].'">'.$depaREG["Nombre_Departamento"].'</option>';
            }
            ?>
          </select>
          <input type="text" name="texCargo" placeholder="Cargo a Desempeñar" onkeypress="return soloLetras(event)" required><br><br>
          <label for="textSueldoEmpleado">Sueldo Mensual:</label>
          <label for="textFotoEmpleado">Fotografia:</label><br>
          <input type="text" name="textSueldoEmpleado" placeholder="Ingresa Sueldo Mensual" onChange="validarSiNumero(this.value);"  required>
          <input type="file" name="textFotoEmpleado">
           <br></fieldset><br><br>
          <input type="submit" value="Guardar">
         </form>
        </div>
      <!--formulario de eliminar empleado-->
      <div class="cp_oculta" id="texto6">
        <form  action="Eliminarempleado.php" method="POST">
          <h2>Eliminar Empleados</h2><br>
          <fieldset><br>
          <label for="textIDEmpleado">Codigo de Empleado a Eliminar:</label>
          <input type="text" name="textIDEmpleado" onChange="validarSiNumero(this.value);"><br>
          <br></fieldset><br><br>
          <input type="submit" value="Eliminar Registro" name="Elimnar">
         </form>
        </div>
        <!--formulario de actualizar empleado-->
          <div class="cp_oculta" id="texto5">
            <form  action="ActualizarEmpleado.php" method="POST">
                <h2>Actualizar Empleado</h2><br>
                <fieldset><br>
                <label for="textidemp">Nombre de Empleado:</label>
                <label for="depanu">Departamento de Trabajo:</label><br>
                <select id="textidemp" name="textidemp">
                <option value=" ">--Seleccione Empleado--</option>
                  <?php
                  $empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
                  $empR = mysqli_query($conectar,$empQ);
                  while($empREG = mysqli_fetch_array($empR)){
                    print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
                  }
                  ?>
                </select>
                <select id="depanu" name="depanu">
                <option value=" ">--Seleccione Departamento --</option>
                  <?php
                  $depaQ = "SELECT Nombre_Departamento FROM departamentos";
                  $depaR = mysqli_query($conectar,$depaQ);
                  while($depaREG = mysqli_fetch_array($depaR)){
                    print '<option value="'.$depaREG["Nombre_Departamento"].'">'.$depaREG["Nombre_Departamento"].'</option>';
                  }
                  ?>
                </select><br><br>
                <label for="texCargonu">Cargo a Desempeñar:</label><br>
                <input type="text" name="texCargonu" placeholder="Cargo a Desempeñar" onkeypress="return soloLetras(event)"><br><br>
                </fieldset><br><br>
                <input type="submit" value="Actualzar Registro" name="Actualizar">
              </form>
            </div>
        <!--formulario de nuevo departamento-->
        <div class="cp_oculta" id="texto7">
	        <form  action="validar_formularioDepartamentos.php" method="POST">
		        <h2>Nuevo Departamento</h2><br>
            <fieldset><br>
		        <label for="textNombreDepartamento">Nuevo de Nombre:</label>
            <label for="textDescripcionDepartamento">Descrcipcion del Departamento:</label><br>
		        <input type="text" name="textNombreDepartamento" placeholder="Ingresa Nombre del Nuevo departamento" onkeypress="return soloLetras(event)" required>
            <textarea type="text" name="textDescripcionDepartamento" placeholder="Descripcion del Departamento" onkeypress="return soloLetras(event)" required></textarea><br>
            </fieldset><br><br>
		        <input type="submit" name="" value="Guardar">
	        </form>
        </div>
        <!--formulario de eliminar departamento-->
        <div class="cp_oculta" id="texto9">
          <form  action="Eliminardepartamento.php" method="POST">
            <h2>Eliminar Departamentos</h2><br>
            <fieldset><br>
            <label for="textIDDepartamento">Id del Departamento a Eliminar:</label>
            <input type="text" name="textIDDepartamento" onChange="validarSiNumero(this.value);"><br>
            <br></fieldset><br><br>
            <input type="submit" value="Eliminar Registro" name="Elimnar">
          </form>
        </div>
        <!--formulario de actualizar departamento-->
        <div class="cp_oculta" id="texto8">
          <form  action="ActualizarDepartamento.php" method="POST">
              <h2>Nuevos Datos de Departamento</h2><br>
              <fieldset><br>
              <label for="textIDDepartamento">Id del Departamento:</label>
              <label for="textNombreDepartamento">Nombres del Departamento:</label><br>
              <input type="text" name="textIDDepartamento" placeholder="Ingresa Id del departamento" onChange="validarSiNumero(this.value);" required>
              <input type="text" name="textNombreDepartamento" placeholder="Ingresa Nombre del Nuevo departamento" onkeypress="return soloLetras(event)" required><br><br>
              <label for="textDescripcionDepartamento">Descrcipcion del Departamento:</label><br>
              <textarea type="text" name="textDescripcionDepartamento" placeholder="Descripcion del Departamento" onkeypress="return soloLetras(event)" required></textarea><br><br>
              <br></fieldset><br><br>
              <input type="submit" name="Actualizar" value="Actualizar">
            </form>
          </div>
          <!--Formularios Vista por Horas-->
          <div class="cp_oculta" id="texto10">
           <form  action="MostrarEmpleadoshorasDepa.php" method="POST">
             <h2>Busqueda por Departamento</h2>
             <fieldset><br>
               <label for="textidemp">Nombre de Empleado:</label><br>
               <select id="textidemp" name="textidemp">
               <option value=" ">--Seleccione Empleado--</option>
                 <?php
                 $empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
                 $empR = mysqli_query($conectar,$empQ);
                 while($empREG = mysqli_fetch_array($empR)){
                   print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
                 }
                 ?>
               </select>
             </fieldset><br>
             <input type="submit" value="Buscar Empleado"><br>
           </form>
         </div>
        </section>
        <section class="lateral">
          <h3>Menu de Vistas</h3><hr><br>
          <a class="text" href="javascript:MostrarOcultar('texto10');">Calendario de Empleado</a><br><br>
          <a href="MostrarEmpleados.php">Mostrar Empleados</a><br><br>
          <a href="MostrarDepartamentos.php">Mostrar Departamentos</a><br><br>
        </section>
        <footer>Derechos Reservados Copeco</footer>
      </div>
    </body>
</html>
