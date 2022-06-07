
<?php
session_start(); //se inicia la variable super global session.php
     require_once("../modelos/formularios.php");//se incluye el modelo formularios.php
	
	//se almacenana los datos recibido por el metodo post
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$codigoPostal=$_POST['codigopostal'];
	$correo=$_POST['correo'];
	$calle=$_POST['calle'];
	$colonia=$_POST['colonia'];
	$municipio=$_POST['municipio'];
	$estado=$_POST['estado'];
	$contrasena=$_POST['contrasena'];
	$contrasena2=$_POST['contrasena2'];
	$tipo=$_POST['tipo'];
	$telefono=$_POST['telefono'];
     
     $registar=new formularios();//se invoca a la clase formularios del modelo formularios.php
     $res=$registar->verificarCorreo($correo);//atraves de la funcion verificarCorreo combramoq ue el usuario no haya sido registrado previamente  
    if (strcmp($contrasena,$contrasena2)==0) {//atraves de la funcion strcmp comparamos que la contraseña ingresada por el usuario sea la misma en ambos campos 
    if ($res>0) {//en caso de que el resultado devuelto por la funcion res sea mayor que 0 quiere decir que ya existe un usuario registrado con ese correo 

    //redireccionamos al usuario a la vista formulario.php con get validar=1  	
    	echo'<script> 
		window.location.href="../vistas/formulario.php?validar=1";
		</script>';
    }else{//en caso de que el valor devuelto por la funcion sea menor o igual que 0 quiere decir que no existe un usuario registardo con los datos capturados 

    $contrasena=hash('sha512',$contrasena);//la contraseña se encripta para ser almacenada en la BD
    //agregamos al usuaario a la BD con la funcion AgregarUsuario	
    $registar->agregarUsuario($correo,$contrasena,$nombres,$apellidos,$calle,$colonia,$municipio,$estado,$codigoPostal,$telefono,$tipo);
    //se almacena en un arreglo los datos ingresados por el usuario que seran posteriormente almacenados en la variable super global session  
    $userdata=array(
    	'correo'=>$correo,
    	'nombre'=>$nombres,
    	'tipo'=>$tipo
    );
    $_SESSION['usuario']=$userdata;//la variable super global session ´usuario´ almacenara la informacion almacenada previamente en el arreglo
    //redirrecionamos al usuario a la vista usuario.php
    echo'<script> 
		window.location="../vistas/usuario.php";
		</script>';
    }
 }else{//en caso de que las contraseñas no coincidan se redirrecionara al usario al formulario con el metodo get la varibale validar=2 para poder enviar un mensaje de contrseñas distintas al usario
 	echo'<script> 
		window.location.href="../vistas/formulario.php?validar=2";
		</script>';
 }
?>

