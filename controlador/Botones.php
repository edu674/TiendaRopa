<?php
// require("eliminarCarrito.php");
$id=$_GET['id'];//se recibe el id del producto al que se le va a modificar la cantidad
$opcion=$_GET['op'];//se recibe la opcion que nos servira para obtener los cases del switch
session_start(); //se verifica que la sesion este activa;

switch ($opcion) {//switch de aumentar o disminuir cantidad
   
   case 'plus'://case aumentar
         $arreglo=$_SESSION['carrito'];// el arreglo toma el valor de lo que esta guardado en la variable super global carrito
         for ($i=0; $i <count($arreglo) ; $i++) { //a traves del for se busca el elemento que quiere sera modificado
	         if ($arreglo[$i]['id']==$id) {//el if compara que el id que busquemos se encuentree dentro del arreglo
		         $arreglo[$i]['cantidad']=$arreglo[$i]['cantidad']+1;//una vez que lo encuentra le suma uno
		         break;//rompemos el ciclo para que no continue una vez que ya encontro el dato que queremos modificar
	         }
	         }
         $_SESSION['carrito']=$arreglo;//la variable global toma el valor del arrgelo temporal	
         //redireccionamos a la vista carrito.php
         echo'<script> 
         window.location.href="../vistas/carrito.php";
         </script>';
   break;//rompemos el case 
    
    

    case 'less'://case restar
         $arreglo=$_SESSION['carrito'];// el arreglo toma el valor de lo que esta guardado en la variable super global carrito
         for ($i=0; $i <count($arreglo) ; $i++) { //a traves del for se busca el elemento que quiere sera modificado
	         if ($arreglo[$i]['id']==$id) { //el if compara que el id que busquemos se encuentree dentro del arreglo
		         $arreglo[$i]['cantidad']=$arreglo[$i]['cantidad']-1;//una vez que lo encuentra le resta uno
		         if ($arreglo[$i]['cantidad']<=0) {//en caso de que la cantidad del producto sea igual o menor a 0 el producto se borrara
		         	
                    // redireccionamos al controlador eliminar carrito con el objetivo de eliminar y le pasamos atraves de get el id del productoque vamos a eliminar
		         	echo'<script> 
                    window.location.href="../controlador/eliminarCarrito.php?id='.$arreglo[$i]['id'].'";
                    </script>';
	        
		         }
		         break;//rompemos el ciclo para que no continue una vez que ya encontro el dato que queremos modificar
	         }
	         }
	     //redireccionamos a la vista carrito.php    
         $_SESSION['carrito']=$arreglo;	
         echo'<script> 
         window.location.href="../vistas/carrito.php";
         </script>';
         	
    break;//rompemos el case     
}
?>
