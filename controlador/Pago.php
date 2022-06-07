<?php 
require_once("../modelos/usuario.php");//incluimos al modelo usuario.php
session_start();//iniciamos la variable super global session
$user=$_SESSION['usuario'];//almacenamos al usuario que realiza la compra
$carrito=$_SESSION['carrito'];//almacenamos los productos comprados por el usuario 
$total=$_SESSION["total"];//almacenamos el total a pagar del usuario
$paypal=$_GET['paypal'];//obetemos los datos devueltos por la api de paypal 
$status="aproved";//almacenamos el status de paypal
$id=session_id();//obtenemos el valor del id de la sesion iniciada por el usuario  
$usuario=new Usuario();//invocamos a la clase usuario del modelo usuario.php

//atraves de la funcion ventas enviamos como parametros los datos recogidos atraves de paypal y de la variable super global session 
$ventas=$usuario->ventas($id,$user["correo"],$total,$status,$paypal);

//atraves de un ciclo for que comienza en 0 y termina hasta que el carrito ya no tenga productos agregamos los datos a la base de datos 

for ($i=0; $i <count($carrito) ; $i++) { 

//agreaga de uno en uno los productos adquiridos por el usuario       
$ventasProductos=$usuario->ventasProductos($ventas,$carrito[$i]["id"],$carrito[$i]["cantidad"],$carrito[$i]["precio"]);

//resta en la base de datos la cantidad de productos adquirido por el usuario, actualizando las existencias en el inventario
$producto=$usuario->actualizarCantidaProducto($carrito[$i]["cantidad"],$carrito[$i]["id"]);
}
//atraves de la funcion unset eliminamos los datos almacenados en la variable super global session 
unset($_SESSION["total"]);
unset($_SESSION["carrito"]);
//redirrecionamos al usuario hacia la vista VistaPago´.php
 echo'<script> 
        window.location.href="../vistas/VistaPago.php";

        </script>';
 ?>