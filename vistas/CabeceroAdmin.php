
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

<?php 
include("BarraAdmin.php");
 ?>
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
            </ul>

        </div> 
        </div>
    </nav>
    </div>

  <!-- sidenav responsive -->
   <ul class="sidenav blur" id="menu-responsive">
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

