<?php 
$total=4;//se envia como parametro para mostrar el numero de productos que quieren que se muestre por pagina 
$pagina="index";//se envia como parametro para redireccionar a la pagina
require('../controlador/direccionamiento.php');
require('cabecero.php');
 ?>
             
<!-- carrusel -->
<body onload="Carrusel()">
    <div class="row">

        <div class="col s12 ">
            <h2 class="center-align titulo">Productos de nuestra selección</h2>
            
            <div class="carousel  center-aling">
                
                <?php 
                while ($imgcarrusel=mysqli_fetch_array($carrusel)) {//atraves de la funcion mysqli_fetch_array convertimos los datos devueltos por la BD en un areglo el cual contendra la informacion acerca de los productos del carrusel
                 ?>

                <div class="carousel-item"> 
                    <h2 class="subtitulo"><?php echo $imgcarrusel['nombre'] ?></h2>
                    <div class="linea-division"></div>
                    <a href=""><img src="../img/carruselImagenes/<?php echo $imgcarrusel['imagen'] ?>" width="100%" height="400px" style="max-width: 400px"></a>
                </div>
 
            <?php } ?>

            </div>
          <a name="catalogo"></a>  <!-- con esta ancla se direcciona directo al catalogo de productos desde la paginacion con #catalogo -->    
        </div>
    </div>
<!-- fin carrousel -->

<div class="contenido">
<div class="row">
 <div class="col s10 push-s1 pull-s1">
          <h2 class="center-align titulo">Los favoritos</h2>       
       <?php 
         // convierte el resultado de nuestra consulta a la base de datos en un arreglo y atraves de un ciclo while lo imprimimos en panatalla para que el usuraio lo pueda visualizar
         while($fila = mysqli_fetch_array($query)){
        ?>       
<!-- card1 -->
    <div class="col l3 s6">
      <div class="card">
        <div class="card-image">
          <img class="activator" src="../img/productos/<?php echo $fila['imagen']?>" height="162" style="object-fit: scale-down;">
          <a class="btn amber accent-4 btn-floating halfway-fab pulse"href="productos.php?id=<?php echo $fila['id_producto']?>"><i class="material-icons right">add_shopping_cart</i></a>
        </div>
        
        <div class="card-content">
            <div style="height:80px; overflow: hidden;"><h6 style="font-family: Arial Black;" align="center"><?php echo $fila['nombre'] ?></h6></div>
             <h6 align="center">$<?php echo number_format($fila['precio'], 2, '.', ',');?></h6>
        
        
        </div>

        <div class="card-reveal">
            <i class="card-title material-icons right">close</i>
           <span class="grey-text text-darken-4"><h6 style="font-family: Arial Black;"><?php echo $fila['nombre'] ?></h6></span>
           <p ><?php echo $fila['descripcion'] ?></p>
        </div>
      </div>
    </div>
  <?php 
   } ?>               
</div>
</div>

</div> <!-- fin div contenido -->
 
 <!-- paginacion -->
<div class="center-align">
    <ul class="pagination">
   <!-- atraves de un if desactivamos el boton de retroseso cuando la pagina es meno a uno y redirreciona a la pagina 1 -->
    <li class="<?php echo $_GET['pagina']<=1? 'disabled':'waves-effect' ?>"><a href="index.php?pagina=<?php echo $_GET['pagina']-1?>#catalogo"><i class="material-icons">chevron_left</i></a></li>  

    <!-- atraves de un for pintamos en pantalla el numero total de paginas con el que contara nuestro sitio -->
    <?php
    for ($i=0; $i < $paginas; $i++) { 
    ?>
    <li class="<?php echo$_GET['pagina']==$i+1? 'active amber accent-4':'waves-effect'?>"><a href="index.php?pagina=<?php echo ($i+1); ?>#catalogo"><?php echo ($i+1); ?></a></li>
    <?php } ?>
    
    <!-- atraves de un if corto cuando el usuario coloca un numero mayor al de nuestra paginacion lo redirreciona a la ultima pagina de nuestro sitio -->
    <li class="<?php echo $_GET['pagina']>=$paginas? 'disabled':'waves-effect'?>"><a href="index.php?pagina=<?php echo $_GET['pagina']+1?>#catalogo"><i class="material-icons">chevron_right</i></a></li>
  </ul>
</div>
<!-- fin paginacion -->


<!-----------------------------Contenido para mujer---------------------------------------------------->

<div class="contenido">
<div class="row">
 <div class="col s10 push-s1 pull-s1">
    <h2 class="center-align titulo">Para Mujer</h2>
    <div class="contenedor">
       <a href="#">
            <figure>
                <img src="../img/mujer.jpg">
                <div class="capa">
                    <h4>Ver productos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, vero!</p>
                </div>
            </figure>
        </a>
    </div>
 </div>            
</div>
</div>
</div>

<!-----------------------------Contenido para hombre---------------------------------------------------->

<div class="contenido">
<div class="row">
 <div class="col s10 push-s1 pull-s1">
    <h2 class="center-align titulo">Para Hombre</h2>
    <div class="contenedor">
       <a href="#">
            <figure>
                <img src="../img/hombre.jpg">
                <div class="capa">
                    <h4>Ver productos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, vero!</p>
                </div>
            </figure>
        </a>
    </div>
 </div>            
</div>
</div>
</div>

<!-----------------------------Contenido para niña---------------------------------------------------->

<div class="contenido">
<div class="row">
 <div class="col s10 push-s1 pull-s1">
    <h2 class="center-align titulo">Para Niña</h2>
    <div class="contenedor">
       <a href="#">
            <figure>
                <img src="../img/niña.jpg">
                <div class="capa">
                    <h4>Ver productos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, vero!</p>
                </div>
            </figure>
        </a>
    </div>
 </div>            
</div>
</div>
</div>

<!-----------------------------Contenido para niño---------------------------------------------------->

<div class="contenido">
<div class="row">
 <div class="col s10 push-s1 pull-s1">
    <h2 class="center-align titulo">Para Niño</h2>
    <div class="contenedor">
       <a href="#">
            <figure>
                <img class="imh" src="../img/niño.jpg">
                <div class="capa">
                    <h4>Ver productos</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores, vero!</p>
                </div>
            </figure>
        </a>
    </div>
 </div>            
</div>
</div>
</div>

<!---------------------------------------------------------------------------------------------------->

<br>
<!-- boton flotante -->
<div class="fixed-action-btn">
  <a class="btn-floating btn-large amber accent-4">
    <i class="large material-icons m-36">share</i>
  </a>
  <ul>
    <li><a class="btn-floating blue darken-1 btn-large" href="https://www.facebook.com"><img src="../img/fb.png" align="center" height="30px" width="30px"></a></li>
    <li><a class="btn-floating green btn-large"><img src="../img/whats.png" align="center" height="30px" width="30px"></a></li>
  </ul>
</div>
<!-- fin boton flotante -->
<!-- footer -->
</body>

<?php 
require("footer.php");
 ?>
<!-- atraves de esta condicion verificamos si el usuario se a logggeado de manera correcto enviando un mesnaje de bienvenido o de error dependiendo el caso -->

<?php 
if(isset($_SESSION['respuesta'])){
   if($_SESSION['respuesta']==1){
    unset($_SESSION['respuesta']);
    echo "
    <script>
     verificarUsuario()
    </script>";
   }
}
 ?>