<?php 
session_start();//iniciamos la variable global session

    // atraves del metodo post recibimos los datos enviado atraves del formulario y los almacenamos en variables

  require_once("../modelos/formularios.php");
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$codigoPostal=$_POST['codigopostal'];
	$correo=$_SESSION['usuario']['correo'];
	$calle=$_POST['calle'];
	$colonia=$_POST['colonia'];
	$municipio=$_POST['municipio'];
	$estado=$_POST['estado'];
	$telefono=$_POST['telefono'];
	$direccion2=$_POST['direccion2'];
	$telefono2=$_POST['telefono2'];
    
    $registar=new formularios();//invocamos a la clase formularios del modelo formulario.php

    //usamos la funcion actulizarUsuario y le enviamos como parametros los datos recogidos atraves de post  
    $res=$registar->actualizarUsuario($correo,$nombres,$apellidos,$calle,$colonia,$municipio,$estado,$codigoPostal,$telefono,$direccion2,$telefono2);
      
    // atraves del valor devuelto en la varibale $res redirrecionamos al usuario a la vista usuario.php usando la variable globar sesion como bandera para notificar de registro exitoso o fallido segun sea el caso 
    if ($res==1) {
      $_SESSION['respuesta']=1;
      echo'<script> 
		window.location.href="../vistas/usuario.php";

		</script>';
    }else{
    $_SESSION['respuesta']=2;	
 	echo'<script> 
		window.location.href="../vistas/usuario.php";
		</script>';
 }
 ?>
