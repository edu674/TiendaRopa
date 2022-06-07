<?php 
require "../php/conexion.php";
class tienda{	
 	
 	public function buscar(){
  global $conexion;       
 	$query=  $conexion -> query("SELECT * FROM `productos`") or die($conexion -> error);
  return $query;
 	}

  public function carrusel(){
  global $conexion;       
  $query=  $conexion -> query("SELECT * FROM `imgcarrusel`") or die($conexion -> error);
  return $query;
  }

  public function productos($var1,$var2){
  global $conexion;
  $sql=  $conexion -> query("SELECT * FROM `productos` LIMIT $var1,$var2") or die($conexion -> error);
  return $sql;
    }

  public function VistaProducto($id){
  global $conexion;       
  $query=  $conexion -> query("SELECT * FROM `productos` WHERE id_producto=$id") or die($conexion -> error);
  $sql=mysqli_fetch_row($query);
  return $sql;
  }

  public function buscarUsuario($correo){
  global $conexion;       
  $query=  $conexion -> query("SELECT * FROM `usuarios` WHERE correo_electronico='$correo'") or die($conexion -> error);
  $sql=mysqli_fetch_array($query);
  return $sql;
  }
 
}


 ?>


