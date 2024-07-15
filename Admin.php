<!--Codigo creado y Actualizado al 21/9/2017 por: Rafael Alonso Motiño Vargas-->
<?php require("validar_coneccion.php"); ?>
<?php require("script.php"); ?>
<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	 <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<title>SIBICOP</title>
	<link rel="stylesheet" type="text/css"  href="css/estilo_1.css">
</head>
<body>
	<div class="contenedor">
    <header>
			<img src="Imagenes/COPECO_small.jpg">
        <a class="text" href="javascript:MostrarOcultar('texto1');">Cambiar Registros</a>
        <a class="text" href="javascript:MostrarOcultar('texto2');">Contraseñas</a>
				<a class="text" href="javascript:MostrarOcultar('texto6');">Eliminar Movimiento</a>
        <a href="Bienes.php">Volver</a>
	</header>
	<div class="cp_oculta" id="texto1">
		<nav>
			<a class="text" href="javascript:MostrarOcultar('texto3');" title="Actualizar Cargos">Actualizar Cargos</a>
			<a class="text" href="javascript:MostrarOcultar('texto4');" title="Actualizar Mobiliario">Actualizar Mobiliario</a>
			<a class="text" href="javascript:MostrarOcultar('texto5');" title="Eliminar Mobiliario">Eliminar Mobiliario</a>
		 </nav>
		</div>
		<section class="padre">
		<!--formulario de Modificar Carga-->
		<div class="cp_oculta" id="texto3">
			<form action="validar_formulariocambiarcarga.php" method="POST"  enctype="multipart/form-data">
				<h2>Modificar Cargo</h2>
				<fieldset><br>
				<label for="Clavemov">Clave del Movimiento:</label>
				<label for="idempleado">Nombre de Empleado:</label>
				<label for="idmobiliario">ID de Mobiliario:</label><br>
				<input type="text" id="Clavemov" name="Clavemov" placeholder="Clave del Movimiento"  required>
				<select id="idempleado" name="idempleado" required>
				<option value=" ">--Seleccione Empleado--</option>
					<?php
					$empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
					$empR = mysqli_query($conectar,$empQ);
					while($empREG = mysqli_fetch_array($empR)){
						print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
					}
					?>
				</select>
				<select id="idmobiliario" name="idmobiliario">
				<option value=" ">--Seleccione Mobiliario--</option>
					<?php
					$mobQ = "SELECT Nombre_Mobiliario FROM mobiliarios where Actividad_Mobiliario ='0'";
					$mobR = mysqli_query($conectar,$mobQ);
					while($mobREG = mysqli_fetch_array($mobR)){
						print '<option value="'.$mobREG["Nombre_Mobiliario"].'">'.$mobREG["Nombre_Mobiliario"].'</option>';
					}
					?>
				</select><br><br>
				<label for="textmarmob">Marca Mobiliario:</label>
				<label for="textnmomob">Modelo Mobiliario:</label>
				<label for="textnuminv">Numero de Inventario:</label><br>
				<input type="text" id="textmarmob" name="textmarmob" placeholder="Marca de Mobiliario"  required>
				<input type="text" id="textnmomob" name="textnmomob" placeholder="Modelo de Mobiliario"  required>
				<input type="text" id="textnuminv" name="textnuminv" placeholder="Ingresa Numero de Inventario"  required><br><br>
				<label for="textSerieMobiliario">Serie del mobiliario:</label>
				<label for="colormob">Color de Mobiliario:</label>
				<label for="estado">Estado del Mobiliario:</label><br>
				<input type="text" id="textSerieMobiliario" name="textSerieMobiliario" placeholder="Ingresa Serie de Mobiliario" required>
        <input type="text" id="colormob" name="colormob" placeholder="Color de Mobiliario"  required>
				<select id="estado" name="estado">
					<option value=" ">--Estado de Mobiliario--</option>
					<?php
					$estadoQ = "SELECT Nombre_Estado FROM estados";
					$estadoR = mysqli_query($conectar,$estadoQ);
					while($estadoREG = mysqli_fetch_array($estadoR)){
						print '<option value="'.$estadoREG["Nombre_Estado"].'">'.$estadoREG["Nombre_Estado"].'</option>';
					}
					?>
				</select><br><br>
				<label for="idempord">Orden Realizada por:</label>
				<label for="textimagmob">Imagen de Mobiliario:</label>
				<label for="textDescripcionmob">Descripcion:</label><br>
				<select id="idempord" name="idempord" required>
				<option value=" ">--Quien Hace la Orden--</option>
					<?php
					$idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='DIRECCION ADMINISTRATIVA Y FINANCIERA BIENES'";
					$idempordR = mysqli_query($conectar,$idempordQ);
					while($idempordREG = mysqli_fetch_array($idempordR)){
						print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
					}
					?>
				</select>
					<input type="file" name="textimagmob" id="textimagmob">
					<textarea type="text" name="textDescripcionmob" placeholder="Descripcion de Mobiliario" ></textarea><br><br>
				</fieldset><br>
				<input type="submit"  value="Cambiar">
			</form>
		</div>
		<!--formulario de actualizar mobiliarios-->
	<div class="cp_oculta" id="texto4">
		<form  action="ActualizarMobiliario.php" method="POST">
			<h2>Actualizar Mobiliario</h2>
			<fieldset><br>
			<label for="textIdmobiliario">Numero del Mobiliario:</label>
			<label for="textNombreMobili">Nombre del Mobiliario:</label><br>
			<input type="text" name="textIdmobiliario" placeholder="Numero de Mobiliario" onChange="validarSiNumero(this.value);" required>
			<input type="text" name="textNombreMobili" placeholder="Nombres de Mobiliario" onkeypress="return soloLetras(event)" required><br><br>
			<label for="textCantidad">Cantidad Mobiliario:</label>
			<label for="tipomob">Uso del Mobiliario:</label><br>
			<input type="text" name="textCantidad" placeholder="Cantidad de Equipos" required>
			<select id="tipomob" name="tipomob">
			<option value=" ">--Tipo de Mobiliario--</option>
				<?php
				$tipomobQ = "SELECT Nombre_TipoMobiliario FROM tiposmobiliarios";
				$tipomobR = mysqli_query($conectar,$tipomobQ);
				while($tipomobREG = mysqli_fetch_array($tipomobR)){
					print '<option value="'.$tipomobREG["Nombre_TipoMobiliario"].'">'.$tipomobREG["Nombre_TipoMobiliario"].'</option>';
				}
				?>
			</select><br><br>
			<label for="textvalorMobiliario">Valor unitario:</label>
			<label for="textTmonedaMobiliario">Cambios de Moneda:</label><br>
			<input type="text" name="textvalorMobiliario" placeholder="Valor del Equipo" onChange="validarSiNumero(this.value);" required>
			<select id="textTmonedaMobiliario" name="textTmonedaMobiliario">
					 <option value=" ">--Tipo de Moneda--</option>
					 <option value="Lempiras">Lempiras</option>
					 <option value="Dolares">Dolares</option>
					 <option value="Euros">Euros</option>
			</select><br><br>
			<label for="adqui">Adquisicion de Mobiliario:</label>
			<label for="estado">Estado del Mobiliario:</label><br>
			<select id="adqui" name="adqui" required>
					 <option value=" ">--Adquisicion--</option>
					 <option value="Compra">Compra</option>
					 <option value="Donacion">Donacion</option>
			</select>
			<select id="estado" name="estado" required>
				<option value=" ">--Estado de Mobiliario--</option>
				<?php
				$estadoQ = "SELECT Nombre_Estado FROM estados";
				$estadoR = mysqli_query($conectar,$estadoQ);
				while($estadoREG = mysqli_fetch_array($estadoR)){
					print '<option value="'.$estadoREG["Nombre_Estado"].'">'.$estadoREG["Nombre_Estado"].'</option>';
				}
				?>
			</select><br><br>
			 </fieldset><br>
			<input  type="submit" value="Actualizar">
		</form>
	</div>
	<!--formulario de eliminar mobiliario-->
	<div class="cp_oculta" id="texto5">
		<form  action="Eliminarmobiliario.php" method="POST">
			<h2>Eliminar Mobiliario</h2><br>
			<fieldset><br>
			<label for="textIdmobiliario">ID del Mobiliario a Eliminar:</label>
			<select id="textIdmobiliario" name="textIdmobiliario">
			<option value=" ">--Seleccione Mobiliario--</option>
				<?php
				$mobQ = "SELECT Nombre_Mobiliario FROM mobiliarios where Actividad_Mobiliario ='0'";
				$mobR = mysqli_query($conectar,$mobQ);
				while($mobREG = mysqli_fetch_array($mobR)){
					print '<option value="'.$mobREG["Nombre_Mobiliario"].'">'.$mobREG["Nombre_Mobiliario"].'</option>';
				}
				?>
			</select><br><br>
			</fieldset><br><br>
			<input type="submit" value="Eliminar Registro">
		</form>
	</div>
		<!--Formularios para Nueva contraseña-->
		<div class="cp_oculta" id="texto2">
		 <form  action="validar_formularioContrasena.php" method="POST">
			 <h2>Contraseña Nueva</h2>
			 <fieldset><br>
			 <label for="textidemp">Nombre de Empleado:</label>
			 <label for="Contrasena">Nueva Contraseña:</label><br><br>
			 <select id="textidemp" name="textidemp" required>
			 <option value=" ">--Quien Hace la Orden--</option>
				 <?php
				 $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales'";
				 $idempordR = mysqli_query($conectar,$idempordQ);
				 while($idempordREG = mysqli_fetch_array($idempordR)){
					 print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
				 }
				 ?>
			 </select>
			 <input type="password" id="Contrasena" name="Contrasena" placeholder="Ingrese su Contraseña"  required><br><br>
			 </fieldset><br>
			 <input type="submit" value="Asignar Contraseña"><br>
		 </form>
	 </div>
	 <!--formulario de eliminar movimientos-->
 	<div class="cp_oculta" id="texto6">
 		<form  action="Eliminarmovimiento.php" method="POST">
 			<h2>Eliminar Movimiento</h2><br>
 			<fieldset><br>
 			<label for="textIdmovimiento">ID de Movimiento a Eliminar:</label>
 			<input type="text" name="textIdmovimiento" placeholder="Ingresar ID de Movimiento a Eliminar" required>
 			</fieldset><br><br>
 			<input type="submit" value="Eliminar Movimiento">
 		</form>
 	</div>
	</section>
	<section class="lateral" >
		<h3>Menu de Vistas</h3><hr><br>
		<a  href="MostrarContrasenas.php">Contraseñas</a><br><br>
		<a  href="Imprimir_Carga.php" title="Mostrar los Cargos Realizados">Cargos</a><br><br>
		<a  href="Vista_Descargo.php" title="Mostrar los Bienes en Posesion del Departamento">Descargos</a><br><br>
	</section>
	<footer>Derechos Reservados Copeco</footer>
</div>
</body>
</html>
