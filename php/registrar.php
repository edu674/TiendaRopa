<?php
	include("conexion.php");

	//Recuperar datos del formulario
	$nombres=$_POST['nombres'];
	$apellidos=$_POST['apellidos'];
	$codigoPostal=$_POST['codigopostal'];
	$direccion=$_POST['direccion'];
	$correo=$_POST['correo'];
	$calle=$_POST['calle'];
	$colonia=$_POST['colonia'];
	$municipio=$_POST['municipio'];
	$estado=$_POST['estado'];
	$contrasena=$_POST['contrasena'];
	$contrasena=hash('sha512',$contrasena);
	$tipo=$_POST['tipo'];
	$telefono=$_POST['telefono'];
	$direccion2=$_POST['direccion2'];
	$telefono2=$_POST['telefono2'];
	//Sentencia INSERT sql
	$insert_sql="INSERT INTO `usuarios`(`correo_electronico`, `contraseña`, `nombres`, `apellidos`, `calle`, `colonia`, `municipio`, `estado`, `codigo_postal`, `Telefono`, `direccion_opcional`, `telefono_opcional`, `tipo`) VALUES ('$correo','$contrasena','$nombres','$apellidos','$calle','$colonia','$municipio','$estado','$codigoPostal','$telefono','$direccion2','$telefono2','$tipo')";

	//Verificar que no se repita el correo en la BD
	//$verificar_correo= mysqli_query($conexion,"SELECT * FROM usuario WHERE correo='$correo'");
	//if(mysqli_num_rows($verificar_correo)>0){
	//	echo'<script> 
	//			alert("El correo ya se encuantra registrado.");
	//			window.location="form.php";
	//		</script>';
	//}else{
	//Enviar los datos del formulario a la BD
		// code...
		$ejecutar=mysqli_query($conexion,$insert_sql);
			if ($ejecutar){
				echo'<script> 
					alert("¡Registro exitoso!");
					window.location="../vistas/index.php";
					</script>';
			}else{
				echo 'Error: '.mysqli_error($conexion);
			}
	//}
?>