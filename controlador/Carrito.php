<?php 
require_once("../modelos/tienda.php"); //se incluye al modelo tienda.php
class Carrito{

public function agregarcarrito($id){
	
$consulta=new tienda();
$producto=$consulta->VistaProducto($id);

	if (isset($_SESSION['carrito'])) {//comprueba que no exista la variable session 
	if (isset($id)) { // si existe la variable session solicita el id del producto
		
		$arreglo=$_SESSION['carrito'];//asigna a la variable arreglo el valor de la funcion session
		$bandera=false;
		$numero=0;

		for ($i=0; $i <count($arreglo); $i++) { // atraves de este ciclo busca si el producto no ha sido agregado con anterioridad al carrito 
			if ($arreglo[$i]['id']==$id) {
				$bandera=true;
				$numero=$i;
			}
		}//for 
		if ($bandera==true) {// esta condicion solo se activa en caso de que exista el producto el carrito de existir agrega +1 a la cantidad para no repetir el mismo producto en una fila nueva
       if ($producto[4]>$arreglo[$numero]['cantidad']) {
      	$arreglo[$numero]['cantidad']=$arreglo[$numero]['cantidad']+1;
			  $_SESSION['carrito']=$arreglo;
			   echo'<script> 
		window.location.href="../vistas/carrito.php";
		</script>';
//al momento de agregar el producto al carrito redirecciona a la misma pagina, para evitar que se agrege dos veces
      }//if fila1
		
		}//if bandera
		else{
		$nombre="";
		$precio="";
		$imagen="";
		$nombre=$producto[2];
		$precio=$producto[7];
		$imagen=$producto[6]; 
		$arreglo2= array( //se crea otro arreglo para guaradar los datos 
			'id'=>$id,
			'nombre'=>$nombre,
			'precio'=>$precio,
			'imagen'=>$imagen,
			'cantidad'=> 1
		);
		array_push($arreglo, $arreglo2);
		$_SESSION['carrito']=$arreglo;
		echo'<script> 
		window.location.href="../vistas/carrito.php";
		</script>';
		}
	}//if (isset($_GET['id']))
}else{
 // se crea la variable sesion
	if (isset($id)) {//atravez del metodo get obtenemos el id del producto que se va a agregar al carrito
		$nombre="";
		$precio="";
		$imagen="";
		$nombre=$producto[2];
		$precio=$producto[7];
		$imagen=$producto[6]; 
		$arreglo[]= array( //se crea otro arreglo para guaradar los datos 
			'id'=>$id,
			'nombre'=>$nombre,
			'precio'=>$precio,
			'imagen'=>$imagen,
			'cantidad'=> 1
		);
		$_SESSION['carrito']=$arreglo; // los datos del arreglo se pasan al metodo session
		echo'<script> 
		window.location.href="../vistas/carrito.php";
		</script>';
	}
}

}


public function EliminarCarrito(){

}

}
 ?>
