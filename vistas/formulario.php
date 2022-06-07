
<?php 
require('cabecero.php');

 ?>

	<div class="container">
		<!-- <div class="row">
		 -->	<div class="col-sm-12">
				<h3 align="center"> Formulario de registro</h3>
			</div>
		<!-- </div>
		 --><br>
		<div class="row">
			<div class="col s12">
				<form action="../controlador/Registrar.php" method="post">
					<!--Nombre-->
		
					<div class="col s12">
						<h5>Nombre(s):</h5>
						<input type="text" name="nombres" id="nombres" class="form-control" placeholder="Nombre(s)"required/>
					</div>
					<div class="col s12">
						<h5>Apellidos</h5>
						<input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Apellido1 Apellido2" required/>
					</div>
				
			
				<!--Dirección-->

				<div class="col s6">
					<h5>Calle</h5>
					<input type="text" name="calle" id="calle" placeholder="Calle" required/>
				</div>

				<div class="col s6">
					<h5>Colonia</h5>
					<input type="text" name="colonia" id="colonia" placeholder="Colonia" required/>
				</div>
                <div class="col s6">
						<h5>Codigo Postal:</h5>
						<input type="text" name="codigopostal" id="codigopostal" class="form-control" placeholder="00000"/>
				</div>
				<div class="col s6">
					<h5>Municipio</h5>
					<input type="text" name="municipio"  id="municipio" placeholder="Municipio" required/>
				</div>
				<div class="col s6">
					<h5>Estado</h5>
					<input type="text" name="estado" id="estado" placeholder="Estado" required/>
				</div>
				<div class="col s6">
					<h5>Telefono</h5>
					<input type="text" name="telefono" id="telefono" placeholder="55-69-66-82-10"  data-length="10" required/>
				</div>

				<div class="col s12">
					<input id="tipo" name="tipo"  id="tipo" type="hidden" value="0">
				</div>


				<!--Correo-->
				<div class="col s12">
					<h5>Correo:</h5>
					<input type="email"  name="correo" id="Correo" placeholder="correo@mail.com" required>
				</div>
				<div class="col s12">
					<h5>Contraseña</h5>
					<input type="password"  name="contrasena" id="contrasena" placeholder="Contraseña" required>

				</div>
				
				
				<div class="col s12">
					<h5>Confirmar Contraseña</h5>
					<input type="password"  name="contrasena2" id="contrasena2"  placeholder="Contraseña" required>
				</div>

				<center>
					<div  class="col s12">
					 <button class="btn waves-effect waves-light bt-color amber accent-4" style="margin-top: 20px;" type="submit" name="action" onclick="datos()">Enviar
                     <i class="material-icons right">send</i>
                     </button>
				</div>
				</center>
			</form>

		</div>
	</div>
	</div>

<?php 
require("footer.php");
 ?>
<!-- atraves del envio del formulario mostrara un mesaje de error o o contraseña incorrecto que se encuentran en el archivo js  -->
<?php 
if($_GET){
if ($_GET['validar']==1) {	
echo "<script>
 mensajeError();
 </script>";
}
if ($_GET['validar']==2) {	
echo "<script>
 contraseña();
 </script>";
}
}

 ?>