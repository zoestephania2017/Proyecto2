<!--Codigo creado y Actualizado al 15/1/2018 por: Rafael Alonso Motiño Vargas-->
<?php require("validar_coneccion.php"); ?>
<?php require("script.php");?>


<!DOCTYPE html>
<html>
  <head>
    <title>SIBICOP</title>
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html"/> <!--; charset="ISO-8859"/> "utf-8" -->
    <link rel="stylesheet" type="text/css" href="css/estilo_1.css">
    </head>
    <body>
      <div class="contenedor">
     
    <!--Menu Principal Superior-->
    
    <header>
      <img src="Imagenes/COPECO_small.jpg">
      <a class="text" href="javascript:MostrarOcultar('texto1');" title="Cargos y Descargos ">Cargo y Descargo</a>
      <a class="texto" href="javascript:MostrarOcultar('texto2');" title="Adiministrador del Mobiliario ">Mobiliarios</a>
      <a class="text" href="javascript:MostrarOcultar('texto3');" title="Impresion de Actas ">Actas</a>
      <a href="index.php">Volver</a>
    </header>
    
    <!--Menu desplegables-->
    
    <section>
        <div class="cp_oculta" id="texto1">
          <nav>
            <a class="text" href="javascript:MostrarOcultar('texto7');" title="Asignacion de Bienes">Cargo de Bienes</a>
            <a class="text" href="javascript:MostrarOcultar('texto8');" title="Reasignacion de Bienes">Descargo de Bienes</a>
            <a class="text" href="javascript:MostrarOcultar('texto15');" title="Custodia de Bienes">Custodia de Bienes</a>
           </nav>
          </div>
          <div class="cp_oculta" id="texto3">
            <nav>
              <a class="texto" href="javascript:MostrarOcultar('texto9');" title="Impresion de Acta de Asignacion">Asignacion</a>
              <a class="texto" href="javascript:MostrarOcultar('texto10');" title="Impresion de Acta de Custodia">Custodia</a>
              <a class="texto" href="javascript:MostrarOcultar('texto11');" title="Impresion de Acta de Descargo">Descargo</a>

              <a class="texto" href="javascript:MostrarOcultar('texto12');" title="Impresion de Acta Pase de Salida">Pase de Salida</a>
            </nav>
          </div>
      </section>
      
      <!--Formuliarios-->
      
      <section class="padre">
       
        <!--Formularios para Imprimir actas por Empleado / Menu de Vistas / Imprimir Inventario Total-->
        <div class="cp_oculta" id="texto13">
         <form  action="ImprimirActasT.php" method="POST">
           <h2>Actas por Empleado</h2>
           <fieldset><br>
           <label for="textidemp">Numero de Empleado:</label>
           <label for="idempord">Orden Realizada por:</label><br>
           <select id="textidemp" name="textidemp">
           <option value=" ">--Seleccione Empleado--</option>
             <?php
             //header("Content-Type: text/html; charset=ISO-8859");
             
             $empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'"; 
             $empR = mysqli_query($conectar,$empQ);
               //mysqli_query("SET NAMES 'utf8'",$conectar);
             while($empREG = mysqli_fetch_array($empR)){
               print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
             }
             ?>
           </select>
           <select id="idempord" name="idempord" required>
           <option value=" ">--Quien Hace la Orden--</option>
             <?php
             $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
             $idempordR = mysqli_query($conectar,$idempordQ);
             while($idempordREG = mysqli_fetch_array($idempordR)){
               print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
             }
             ?>
           </select><br><br>
           </fieldset><br>
           <input type="submit" value="Imprimir Acta"><br>
         </form>
       </div>
        <!--Formularios para Imprimir actas por Empleado / Menu de Vistas / Imprimir Inventario Total-->
       
        <!--Formulario de Descarga / Menu Desplegable / Cargo y Descargo / Descargo de Bienes-->
         <div class="cp_oculta" id="texto8">
          <form  action="MostrarporEmpleado.php" method="POST">
            <h2>Descargo por Empleado</h2>
            <fieldset><br>
            <label for="textEmpleado">Nombre Completo de Empleado:</label>
            <select id="textEmpleado" name="textEmpleado">
            <option value=" ">--Seleccione Empleado--</option>
              <?php
              $empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
              $empR = mysqli_query($conectar,$empQ);
              while($empREG = mysqli_fetch_array($empR)){
                print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
              }
              ?>
            </select>
            </fieldset><br><br>
            <input type="submit"  value="Buscar" title="Buscar Empleado....."><br><br><br>
          </form>
        </div>
        <!--Formulario de Descarga / Menu Desplegable / Cargo y Descargo / Descargo de Bienes-->
        
        <!--Formulario de Custodia / Menu Desplegable / Cargo y Descargo / Custodia de Bienes-->
         <div class="cp_oculta" id="texto15">
          <form  action="MostrarporEmpleadoC.php" method="POST">
            <h2>Custodia por Empleado</h2>
            <fieldset><br>
            <label for="textEmpleado">Nombre Completo de Empleado:</label>
            <select id="textEmpleado" name="textEmpleado">
            <option value=" ">--Seleccione Empleado--</option>
              <?php
              $empQ = "SELECT Nombre_Empleado FROM empleados where Estado_Empleado ='0'";
              $empR = mysqli_query($conectar,$empQ);
              while($empREG = mysqli_fetch_array($empR)){
                print '<option value="'.$empREG["Nombre_Empleado"].'">'.$empREG["Nombre_Empleado"].'</option>';
              }
              ?>
            </select>
            </fieldset><br><br>
            <input type="submit"  value="Buscar" title="Buscar Empleado....."><br><br><br>
          </form>
        </div>
        <!--Formulario de Custodia / Menu Desplegable / Cargo y Descargo / Custodia de Bienes-->
        
        <!--Formulario de Cargo / Menu Desplegable / Cargo y Descargo / Cargo de Bienes-->
        <div class="cp_oculta" id="texto7">
          <form  action="validar_formulariocarga.php" method="POST"  enctype="multipart/form-data">
            <h2>Cargo de Bienes</h2>
            <fieldset ><br>
            <label for="idempleado">Nombre de Empleado:</label>
            <label for="idmobiliario">ID de Mobiliario:</label>
            <label for="textmarmob">Marca Mobiliario:</label><br>
            <select id="idempleado" name="idempleado">
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
            </select>
            <input type="text" id="textmarmob" name="textmarmob" placeholder="Marca de Mobiliario"  required><br><br>
            <label for="textnmomob">Modelo Mobiliario:</label>
            <label for="textnuminv">Numero de Inventario:</label>
            <label for="textSerieMobiliario">Serie del mobiliario:</label><br>
            <input type="text" id="textnmomob" name="textnmomob" placeholder="Modelo de Mobiliario"  required>
            <input type="text" id="textnuminv" name="textnuminv" placeholder="Ingresa Numero de Inventario"  required>
            <input type="text" id="textSerieMobiliario" name="textSerieMobiliario" placeholder="Ingresa Serie de Mobiliario" required><br><br>
            <label for="colormob">Color de Mobiliario:</label>
            <label for="estado">Estado del Mobiliario:</label>
            <label for="idempord">Orden Realizada por:</label><br>
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
            </select>
            <select id="idempord" name="idempord" required>
            <option value=" ">--Quien Hace la Orden--</option>
              <?php
              $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
              $idempordR = mysqli_query($conectar,$idempordQ);
              while($idempordREG = mysqli_fetch_array($idempordR)){
                print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
              }
              ?>
            </select><br><br>
              <label for="textimagmob">Imagen de Mobiliario:</label>
              <label for="textDescripcionmob">Descripcion:</label><br>
              <input type="file" name="textimagmob" >
              <textarea type="text" name="textDescripcionmob" placeholder="Descripcion de Mobiliario" ></textarea><br><br>
            </fieldset><br>
            <input type="submit" value="Cargo" title="Cargo de Bienes.....">
          </form>
        </div>
        <!--Formulario de Cargo / Menu Desplegable / Cargo y Descargo / Cargo de Bienes-->
         
          <!--Formulario de nuevo mobiliario / Menu Desplegable / Mobiliarios-->
          <div class="cp_oculta" id="texto2">
            <form  action="validar_formularioMobiliarios.php" method="POST">
              <h2>Nuevo Mobiliario</h2>
              <fieldset><br>
              <label for="textNombreMobiliario">Nombre del Mobiliario:</label>
              <label for="textCantidad">Cantidad Mobiliario:</label><br>
              <input type="text" name="textNombreMobiliario" placeholder="Nombres de Mobiliario" onkeypress="return soloLetras(event)" required>
              <input type="text" name="textCantidad" placeholder="Cantidad de Equipos" required><br><br>
              <label for="textFechaAdqMobiliario">Fecha de Adquisicion:</label>
              <label for="tipomob">Uso del Mobiliario:</label><br>
              <input id="textFechaAdqMobiliario" type="date" name="textFechaAdqMobiliario" required>
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
              <select id="adqui" name="adqui">
                   <option value=" ">--Adquisicion--</option>
                   <option value="Compra">Compra</option>
                   <option value="Donacion">Donacion</option>
              </select>
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
               </fieldset><br>
              <input type="submit" value="Guardar">
            </form>
          </div>
          <!--Formulario de nuevo mobiliario / Menu Desplegable / Mobiliarios-->
          
          <!--Formularios para Imprimir actas / Menu Desplegable /  Actas / Asignacion-->
          <div class="cp_oculta" id="texto9">
           <form  action="ImprimirActas.php" method="POST">
             <h2>Actas de Asignacion</h2>
             <fieldset>
             <label for="textidemp">Nombre de Empleado:</label>
             <label for="idempord">Orden Realizada por:</label><br>
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
             <select id="idempord" name="idempord" required>
             <option value=" ">--Quien Hace la Orden--</option>
               <?php
               $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
               $idempordR = mysqli_query($conectar,$idempordQ);
               while($idempordREG = mysqli_fetch_array($idempordR)){
                 print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
               }
               ?>
             </select><br><br>
             <label for="textFechasig">Fecha de la Asignacion:</label><br>
             <input id="textFechasig" type="date" name="textFechasig" required><br><br>
             </fieldset><br>
             <input type="submit" value="Imprimir Acta de Asignacion"><br><br>
           </form>
         </div>
         <!--Formularios para Imprimir actas / Menu Desplegable /  Actas / Asignacion-->
         
         <!--Formularios para Imprimir actas de Custodia / Menu Desplegable / Actas / Custodia-->
         <div class="cp_oculta" id="texto10">
          <form  action="ImprimirActasC.php" method="POST">
            <h2>Actas de Custodia</h2>
            <fieldset><br>
            <label for="textidemp">Nombre de Empleado:</label>
            <label for="idempord">Orden Realizada por:</label><br>
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
            <select id="idempord" name="idempord" required>
            <option value=" ">--Quien Hace la Orden--</option>
              <?php
              $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
              $idempordR = mysqli_query($conectar,$idempordQ);
              while($idempordREG = mysqli_fetch_array($idempordR)){
                print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
              }
              ?>
            </select><br><br>
            <label for="textFechacus">Fecha de la Custodia:</label><br>
            <input id="textFechacus" type="date" name="textFechacus" required><br><br>
            </fieldset><br>
            <input type="submit" value="Imprimir Acta"><br>
          </form>
        </div>
        <!--Formularios para Imprimir actas de Custodia / Menu Desplegable / Actas / Custodia-->
        
        <!--Formularios para Imprimir actas de Descargo / Menu Desplegable / Actas / Descargo-->
        <div class="cp_oculta" id="texto11">
         <form  action="ImprimirActasD.php" method="POST">
           <h2>Actas de Descargo</h2>
           <fieldset><br>
           <label for="textidemp">Nombre de Empleado:</label>
           <label for="idempord">Orden Realizada por:</label><br>
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
           <select id="idempord" name="idempord" required>
           <option value=" ">--Quien Hace la Orden--</option>
             <?php
             $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
             $idempordR = mysqli_query($conectar,$idempordQ);
             while($idempordREG = mysqli_fetch_array($idempordR)){
               print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
             }
             ?>
           </select><br><br>
           <label for="textFechaDes">Fecha de Descargo:</label><br>
           <input id="textFechaDes" type="date" name="textFechaDes" required><br><br>
           </fieldset><br>
           <input type="submit" value="Acta de Descargo"><br>
         </form>
       </div>
       <!--Formularios para Imprimir actas de Descargo / Menu Desplegable / Actas / Descargo-->
       
       <!--Formularios para Imprimir actas de pase de salida / Menu Desplegable / Actas / Pase de Salida-->
       <div class="cp_oculta" id="texto12">
        <form  action="ImprimirActasS.php" method="POST">
          <h2>Pases de Salida</h2>
          <fieldset><br>
          <label for="textidemp">Nombre de Empleado:</label>
          <label for="idempord">Orden Realizada por:</label><br>
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
          <select id="idempord" name="idempord" required>
          <option value=" ">--Quien Hace la Orden--</option>
            <?php
            $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
            $idempordR = mysqli_query($conectar,$idempordQ);
            while($idempordREG = mysqli_fetch_array($idempordR)){
              print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
            }
            ?>
          </select><br><br>
          <label for="textFechapas">Fecha del Pase:</label><br>
          <input id="textFechapas" type="date" name="textFechapas" required><br><br>
          </fieldset><br>
          <input type="submit" value="Pase de Salida"><br>
        </form>
      </div>
      <div class="cp_oculta" id="texto14">
        <form   action="validar_accesos.php" method="POST">
          <h2>Acceder al Administrador</h2>
          <fieldset><br>
          <label for="textclave">Ingresar a Modo Seguro:</label>
          <input  type="password" name="textclave" placeholder="Clave para acceder" required><br><br>
          </fieldset><br>
          <input  type="submit"  value="Ingresar">
        </form>
      </div>
      <!--Formularios para Imprimir actas de pase de salida / Menu Desplegable / Actas / Pase de Salida-->
      
      <!--Formulario de Custodia del departamento / Menu de Vistas / Custodia de Bienes-->
      <div class="cp_oculta" id="texto16">
        <form  action="validar_formulariocustodia.php" method="POST"  enctype="multipart/form-data">
          <h2>Custodia de Bienes</h2>
          <fieldset ><br>
          <label for="textidemp">Nombre de Empleado:</label>
          <label for="idmobiliario">ID de Mobiliario:</label>
          <label for="textmarmob">Marca Mobiliario:</label><br>
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
          <select id="idmobiliario" name="idmobiliario">
          <option value=" ">--Seleccione Mobiliario--</option>
            <?php
            $mobQ = "SELECT Nombre_Mobiliario FROM mobiliarios where Actividad_Mobiliario ='0'";
            $mobR = mysqli_query($conectar,$mobQ);
            while($mobREG = mysqli_fetch_array($mobR)){
              print '<option value="'.$mobREG["Nombre_Mobiliario"].'">'.$mobREG["Nombre_Mobiliario"].'</option>';
            }
            ?>
          </select>
          <input type="text" id="textmarmob" name="textmarmob" placeholder="Marca de Mobiliario"  required><br><br>
          <label for="textnmomob">Modelo Mobiliario:</label>
          <label for="textnuminv">Numero de Inventario:</label>
          <label for="textSerieMobiliario">Serie del mobiliario:</label><br>
          <input type="text" id="textnmomob" name="textnmomob" placeholder="Modelo de Mobiliario"  required>
          <input type="text" id="textnuminv" name="textnuminv" placeholder="Ingresa Numero de Inventario"  required>
          <input type="text" id="textSerieMobiliario" name="textSerieMobiliario" placeholder="Ingresa Serie de Mobiliario" required><br><br>
          <label for="colormob">Color de Mobiliario:</label>
          <label for="estado">Estado del Mobiliario:</label>
          <label for="idempord">Orden Realizada por:</label><br>
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
          </select>
          <select id="idempord" name="idempord" required>
          <option value=" ">--Quien Hace la Orden--</option>
            <?php
            $idempordQ = "SELECT Nombre_Empleado FROM empleados where ID_Departamento ='Direccion Administrativa y Financiera Bienes Nacionales' && Estado_Empleado = '0'";
            $idempordR = mysqli_query($conectar,$idempordQ);
            while($idempordREG = mysqli_fetch_array($idempordR)){
              print '<option value="'.$idempordREG["Nombre_Empleado"].'">'.$idempordREG["Nombre_Empleado"].'</option>';
            }
            ?>
          </select><br><br>
            <label for="textimagmob">Imagen de Mobiliario:</label>
            <label for="textDescripcionmob">Descripcion:</label><br>
            <input type="file" name="textimagmob" >
            <textarea type="text" name="textDescripcionmob" placeholder="Descripcion de Mobiliario" ></textarea><br><br>
          </fieldset><br>
          <input type="submit" value="Custodia" title="Custodia por parte de Bienes">
        </form>
      </div>
      <!--Formulario de Custodia del departamento / Menu de Vistas / Custodia de Bienes-->
      
      <!--Formularios para Busqueda de Bienes / Menu de Vistas / Busqueda por Placa-->
      <div class="cp_oculta" id="texto17">
       <form  action="Buscarbien.php" method="POST">
         <h2>Busqueda de Bienes</h2>
         <fieldset><br>
         <label for="textnumpla">Numero de Placa:</label>
         <input type="text" id="textnumpla" name="textnumpla" placeholder="Ingresa Numero de Placa"  required>
         <!--</select>--><br><br>
         </fieldset><br>
         <input type="submit" value="Buscar Mobiliario"><br>
       </form>
     </div>
     <!--Formularios para Busqueda de Bienes / Menu de Vistas / Busqueda por Placa-->
     
     <!--Menu de Vistas-->
        </section>
        <section class="lateral" >
          <h3>Menu de Vistas</h3><hr><br>
          <a  href="MostrarMobiliarios.php" title="Mostrar los Mobiliarios Existentes">Mobiliarios</a><br><br>
          <a  class="text" href="javascript:MostrarOcultar('texto16');" title="Custodia de Bienes">Custodia de Bienes</a><br><br>
          <a  href="Imprimir_Descarga.php" title="Mostrar los Bienes en Posesion del Departamento">Descargos</a><br><br>
          <a  class="text" href="javascript:MostrarOcultar('texto13');" title="Imprimi Acta por Articulo">Imprimir Inventario Total</a><br><br>
          <a class="texto" href="javascript:MostrarOcultar('texto17');" title="Busca Mobiliarios por Numero de Placa">Busqueda por Placa</a><hr><br><br><br><br>
          <a  class="text" href="javascript:MostrarOcultar('texto14');" title="Modo Administrador de Datos">Modo Administrador</a>
        </section>
      </div>
     </body>
</html>