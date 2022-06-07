<?php 
require "cabecero.php";//incluye el cabecero 
require_once("../modelos/tienda.php");//incluye el modelo tienda
$data= new tienda();//la variable data invocara a la clase tienda del modelo tienda.php
$cor=$_SESSION['usuario']['correo'];//la variable $cor tomara el valor del correo de la variable sesion 
$userdata=$data->buscarUsuario($cor);//la varaible userdata invocara a la funcion buscarUsuario y almaceara los datos del usuario
 ?>
<main class="sidemenu">
<!-- sidnav -->
<?php 
include("BarraLateral.php");
 ?>
<div class="col s10 offset-s2" id="contenidoUsuario">
 <h1>Bienvenido <?php echo $userdata["nombres"]?>!</h1>
 <br>
 <div>
 <h5>Datos de Envio: </h5>
  <div class="info">
  <h6 class="textContent">Calle: <?php echo $userdata["calle"]?></h6>
  </div>
  <div class="info">
  <h6 class="textContent">Colonia: <?php echo $userdata["colonia"]?></h6>
  </div>
  <div class="info">
  <h6 class="textContent">Municipio: <?php echo $userdata["municipio"]?></h6>
  </div>
  <div class="info">
  <h6 class="textContent">Estado: <?php echo $userdata["estado"]?></h6>
  </div>
  <div class="info">
  <h6 class="textContent">Codigo Postal: <?php echo $userdata["codigo_postal"]?></h6>
  </div>
  <br>
  <h5>Datos de Contacto: </h5>
  <div class="info">
  <h6 class="textContent">Telefono: <?php echo $userdata["Telefono"]?></h6>
  </div>
  <div class="info">
  <h6 class="textContent">Correo Electronico: <?php echo $userdata["correo_electronico"]?></h6>
  </div>	
  </div>	
				
</div>
</div> <!-- div row -->
<!-- end sidenav -->

  <div id="modal2" class="modal modallogout">
  	<form action="../controlador/CerrarSesion.php" method="post" id="CerrarSesion">
    <div class="modal-content center red white-text">
      <h4>Seguro que desea salir?</h4>
    </div>
    <div class="modal-content center">
      <a class="waves-effect waves-light btn-large " width="50%" onclick="EnviarPost('CerrarSesion')"> SI</a>
      <a  href="" class="waves-effect waves-light btn-large " width="50%">NO</a>
    </div>
  </div>
  </form>
</main>

<?php require"footer.php"; ?>

<!-- cuando se hace el envio de la informacion direcciona a este lugara activando el popup con el mesaje de actualizacion -->
<?php 
if(isset($_SESSION['respuesta'])){
   if($_SESSION['respuesta']==1){
   	unset($_SESSION['respuesta']);
   	echo "
   	<script>
     actulizarmsn();
   	</script>";
   }
}
 ?>
