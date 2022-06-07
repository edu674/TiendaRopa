<?php
 $servidor="localhost";
 $nombrebd="productoslimpieza";
 $usuario="root";
 $pass="";
 $conexion = new mysqli($servidor,$usuario,$pass,$nombrebd);
 if ($conexion -> connect_error) {
 	die("no se pudo conectar");
 };

?>