<?php 
include("../controlador/cabecero.php");
 ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Caompatible" content="ie=edge">
    <title></title>
   
   <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
   
   <!-- iconos google-->    
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Dancing+Script|Raleway:500,600&display=swap" rel="stylesheet">
    
    <!-- CSS Estilos -->
    <link rel="stylesheet" href="../css/estilos.css">

     <script
  src="https://code.jquery.com/jquery-3.6.0.js"
  integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
  crossorigin="anonymous"></script>

</head>
<body> 
<!-- barra de navegacion -->
<header class="main-header">
    <div class="navbar-fixed">
    <nav class="nav-wrapper blur">
         <div class="nav-wrapper"> 
        <div class="container">
           <ul class="brand-logo">
           <li>MARCIA SAMANTHA</li>
           </ul> 
            <a href="" data-target="menu-responsive" class="sidenav-trigger"><i class="material-icons md-36">menu</i></a>
            <!-- nav var principal -->
            <ul class="right hide-on-med-and-down" id="nav-mobile">
                <li><a href="index.php">Inicio</a></li>
                <li><a href="catalogo.php">Catalogo</a></li>
                <li><a href="index.php">Ofertas</a></li>
                <li><a href="acerca.php">Acerca de nosotros</a></li>
                <li><a href="contacto.php">Contacto</a></li>
                <li><a href="<?php echo $usuario?>" class=" modal-trigger transparent " name="IniciarSesion"><i class="material-icons md-36">account_circle</i></a></li>
                <li><span class="badge"><p class="circle amber accent-4 black-text"><?php echo $productoscarrito; ?></p></span><a href="carrito.php"><i class="material-icons md-36">shopping_cart</i></a></li>
            </ul>

    </div> 
  </div>
</nav>
</div>

  <!-- sidenav responsive -->
   <ul class="sidenav blur" id="menu-responsive" >
        <div class="user-view">
           <div class="background"><img src="../img/ropa2.jpg" style="width:100%"></div>
            <div class="center-align"><a href="<?php echo $usuario ?>" class=" modal-trigger transparent"><i class="material-icons white-text md-70 center-aling">account_circle</i></a>
            <span class="white-text name"><?php echo $user ?></span>
            <span class="white-text email"><?php echo $correo ?></span>
            </div>
        </div>
            <li><a href="index.php">Inicio<i class="material-icons md-36">home</i></a></li>
            <li><a href="">Catalogo<i class="material-icons md-36">book</i></a></li>
            <li><a href="">Ofertas<i class="material-icons md-36">loyalty</i></a></li>
            <li><a href="">Acerca de nosotros<i class="material-icons md-36">person_search</i></a></li>
            <li><a href="">Contacto<i class="material-icons md-36">question_answer</i></a></li>
            <li><a href="carrito.php">Carrito de compras(<?php echo $productoscarrito; ?>)<i class="material-icons md-36">shopping_cart</i></a></li>

    </ul>
</header>

<!-- fin barra de navegacion -->
<!-- modal -->
  <div id="modal1" class="modal">
    <form action="../controlador/IniciarSesion.php" method="post" id="IniciarSesion">
    <div class="modal-content center white-text imgLogin">  
      <h4>Iniciar Sesion</h4>
      </div>
      <div class="modal-content center">
    <div class="modal-content">
      <div class="input-field ">
      <i class="material-icons md-36 prefix">account_circle</i>
      <input type="text" name="usuario" placeholder="usuario@mail.com">
      </div>

      <div class="input-field">
          <i class="material-icons md-36 prefix">vpn_key</i>
          <input type="password" name="contrasena" placeholder="contraseña">
      </div>
     <p align="center">Usuario nuevo? Registarserse <a href="formulario.php">aqui</a></p>
    </div>
    <div class="modal-footer transparent">
     <!-- envia formulario atraves de funcion javascript en lugar de post -->
      <a class="waves-effect amber accent-4 btn-large" width="100%" onclick="EnviarPost('IniciarSesion')">Iniciar Sesion</a>
    </div>
    </div>
    </form>
</div>
<!-- fin modal -->  
</body>
</html>
