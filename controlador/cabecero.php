<?php 
session_start();// se inicia la varaible session
$usuario;//se crea la varaible usuario
$productoscarrito=0;//se crea la variable que almacenara el total de productos en nuestro carrito 

//atraves de un if verifica si el usuario inicio o no sesion para sustituir el valor de las variables a sus datos relaes o los deja de manera predetreminada 
if (isset($_SESSION['usuario'])) {
    $usuario="usuario.php";
    $user=$_SESSION['usuario']['nombre'];
    $correo=$_SESSION['usuario']['correo'];
}else{
    $usuario="#modal1";
    $user="Nombre de Usuario";
    $correo="Correo@mail.com";
}

//atraves de la funcion count contara cuantos productos tenemos en el carrito para imprimir en pantalla el numero total 
if (isset($_SESSION["carrito"])) {
    $productoscarrito=count($_SESSION['carrito']);
}
?> 