<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php require("validar_coneccion.php"); ?>
<?php require("script.php"); ?>
<!DOCTYPE html>
<html>
<head>
 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>SIBICOP</title>
	<link rel="stylesheet" type="text/css"  href="css/estilo_1.css">
</head>
<body>
	<div class="contenedor">
    <header>
			<img src="Imagenes/COPECO_small.jpg">
        <a class="text" href="javascript:MostrarOcultar('texto3');">Bienes</a>
        <a class="text" href="javascript:MostrarOcultar('texto2');">R.R.H.H.</a>
        <a class="text" href="javascript:MostrarOcultar('texto1');">Marcador</a>
	</header>
	<section>
		<!--formulario de marcador-->
    <div class="cp_oculta" id="texto1">
    	<form  class="form" action="validacionMarcador.php" method="POST">
				<br><fieldset>
					<label for="textEmpleado">Nombre Completo de Empleado:</label><br>
					<select style="width:60%; height:10%;" id="textEmpleado" name="textEmpleado">
					<option value=" ">--Seleccione Empleado--</option>
						<?php
						$empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
						$empR = mysqli_query($conectar,$empQ);
						while($empREG = mysqli_fetch_array($empR)){
							print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
						}
						?>
					</select><br><br>
        <label for="textjornada">Tipo de Jornada:</label><br>
				<select style="width:60%; height:10%;" id="textjornada" name="textjornada" required>
						 <option value=" ">--Jornadas--</option>
						 <option value="Jornada Entrada">Jornada Entrada</option>
						 <option value="Jornada Salida">Jornada Salida</option>
						 <option value="Turno Dia Entrada">Turno Dia Entrada</option>
						 <option value="Turno Dia Salida">Turno Dia Salida</option>
						 <option value="Turno Noche Entrada">Turno Noche Entrada</option>
						 <option value="Turno Noche Salida">Turno Noche Salida</option>
				</select><br><br>
				</fieldset>
				<input style="width:50%; height:14%;" type="submit"  value="Marcar">
    	</form>
	 </div>
		<!--formlario de acceso-->
			<div class="cp_oculta" id="texto3">
	    	<form  class="form" action="validar_acceso.php" method="POST">
					<br><fieldset ><br>
	    		<label for="textclave">Ingrese la contraseña para Acceder:</label><br><br>
	    		<input style="width:60%; height:11%;" type="password" name="textclave" placeholder="Clave para acceder" required><br><br>
					</fieldset>
	    		<br><input style="width:50%; height:14%;" type="submit"  value="Ingresar">
	    	</form>
	    </div>
			<!--formlario de acceso-->
				<div class="cp_oculta" id="texto2">
		    	<form  class="form" action="validar_accesos.php" method="POST">
						<br><fieldset><br>
		    		<label for="textclave">Ingrese la contraseña para Acceder:</label><br><br>
		    		<input style="width:60%; height:10%;" type="password" name="textclave" placeholder="Clave para acceder" required><br><br>
						</fieldset>
		    		<br><input style="width:50%; height:14%;" type="submit"  value="Ingresar">
		    	</form>
		    </div>
	</section>
	<footer>Derechos Reservados Copeco</footer>
</div>
</body>
</html>
