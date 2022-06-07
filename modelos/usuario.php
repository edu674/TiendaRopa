<?php 
require "../php/conexion.php";
 class Usuario{	
 	
  public function ventas($id,$correo,$total,$status,$paypal)
	{
		global $conexion;
        $sql=  $conexion -> query("INSERT INTO `ventas`(`id_venta`,`id_pedido`, `paypal`, `fecha`, `status`, `correo`, `total`) VALUES (null,'$id','$paypal',NOW(),'$status','$correo','$total');") or die($conexion -> error);
        $id=mysqli_insert_id($conexion);
        return $id;
		
	}

	public function ventasProductos($idventa,$idproducto,$cantidad,$precio){
		global $conexion;
		$subtotal=$precio*$cantidad;
        $sql=  $conexion -> query("INSERT INTO `productos_ventas`(`id_productos_venta`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`) VALUES (null,'$idventa','$idproducto','$cantidad','$precio','$subtotal');") or die($conexion -> error);
        return $sql;
	}

	public function actualizarCantidaProducto($cant,$idproducto){
		global $conexion;
        $sql=  $conexion -> query("UPDATE `productos` SET `cantidad`=(`cantidad`-$cant) WHERE id_producto=$idproducto;") or die($conexion -> error);
        return $sql;

	}

 }


 ?>



