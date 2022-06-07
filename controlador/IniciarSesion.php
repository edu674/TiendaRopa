<?php
session_start(); //se inicia la variable super global session
require_once("../modelos/formularios.php");//se incluye el modelo formularios.php
//se almacena los datos enviados por el usuario atraves de l metodo post 
$usuario=$_POST['usuario'];
$contrasena=$_POST['contrasena'];

$contrasena=hash('sha512',$contrasena); //se encripta la contraseña enviada por el usuario 
$modelo= new formularios();//se invoca a la clase formulario del modelo formularios.php
$verificarUsuario=$modelo->verificarUsuario($usuario,$contrasena);//atraves del modelo verificarUsuario comprobamos si es que existe un usuraio con esos datos en la BD 

if($verificarUsuario!=NULL){//si el resultado devuelto es disto de null quiere decir que si se encontro al usuario 
    
    //se crea un arreglo temporal que almacenara la informacion del usuario que inicia sesion
    $userdata= array(
        'correo'=>$verificarUsuario[1],
        'nombre'=>$verificarUsuario[3],//los numero son las posiciones donde se encuentran los datos que se requieren almacenar del mismo parael resto de la sesion 
        'tipo'=>$verificarUsuario[13]

    );

    $_SESSION['usuario']=$userdata;//se asigan el valor del arreglo a la varable super global session 'usuario'
    
    //redireccionamos al usuario a la vista usuario.php en caso de que el usuario sea un usuario normal 
        
        if ($userdata["tipo"]==0) {
        echo'<script> 
        window.location="../vistas/usuario.php";
        </script>';
    }else{ //en caso de que el usuario sea un usuario administrador se direcciona a otra vista 
        echo'<script> 
        window.location="../vistas/VistaAdmin.php";
        </script>';
    }
    

}else{//en caso de que el resultado devuelto sea un null quiere decir que no hay usarios registrados con esos datos

 $_SESSION['respuesta']=1; //se devulve un 1 en la varaible respuesto que nos servira como badera   
 // 

 //redirrecionamos al usuario a la pagina principal 
  echo'<script> 
        window.location="../vistas/index.php?pagina=1";
        </script>';
}
 ?>

