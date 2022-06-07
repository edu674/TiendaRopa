<?php
require_once("cabecero.php"); // se incluye el cabecero
require_once("../controlador/Carrito.php"); //se incluye el carrito para poder agregar productos
if (isset($_SESSION["usuario"])) {// verifica que la sesion usuario este activa 
$carrito=new Carrito();//se declara la variable carrito para que contendra nuestros productos   
if (isset($_GET['producto'])) {// atraves de la variable get verificamos que nos envien el id del producto
    $id=$_GET['producto']; //la variable id le asiganmos el valor que recoga la varaible get 
    $agregar=$carrito->agregarcarrito($id); //se declara la variable $agregar la cual manda a llamar la funcion agregar carrito
}
if (isset($_SESSION["carrito"])) {//verifica que la variable carrito tenga productos en caso de no existir quiere decir que el usuario no a agregado ´productos a su carrito
$arreglocarrito=$_SESSION['carrito']; //la variable $arreglocarrito toma el valor de la variable session carrito 
}
}
?>
 <main class="hide" style="position: relative; min-height:800px;" id="contenido">

    
    <div class="row">
        <div class="col s12">

            <?php
            if (isset($_SESSION["usuario"])) {//verifica que el usuario haya imiciado sesion para poder mostrar los productos de lo contrario entra a else
            if (isset($_SESSION["carrito"])) {//verifica la variable sesion carrito exista para poder agregar los productos al carrito   
             ?>
            <table class="responsive-table">
                <thead>
                    <tr>
                        <th><h6 align="center">Imagen</h6></th>
                        <th><h6 align="center">Producto</h6></th>
                        <th><h6 align="center">Precio</h6></th>
                        <th><h6 align="center">Cantidad</h6></th>
                        <th><h6 align="center">Total</h6></th>
                        <th><h6 align="center">Eliminar</h6></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $suma=0; //variable suma que contendra el valor a pagar por todos los productos 

                        for ($i=0; $i <count($arreglocarrito) ; $i++) { 
                         ?>
                         <!-- imagen del producto -->
                         <td><div align="center"><img src="../img/productos/<?php echo $arreglocarrito[$i]["imagen"]?>" height="150px" width="150px"></div></td>
                         <!-- nombre del producto -->

                         <td><h6 align="center"><?php echo $arreglocarrito[$i]["nombre"]?></h6></td>
                         <!-- precio del producto -->
                         
                         <td><h6 align="center">$<?php echo number_format($arreglocarrito[$i]["precio"], 2, '.', ',')?></h6></td>
                         <!-- catidad del producto -->
                         <td>
                            
                            <h6 align="center">
                                <a class="waves-effect waves-light btn red plus" href="../controlador/Botones.php?id=<?php echo $arreglocarrito[$i]['id'] ?>&op=plus"><p align="center">+</p></a>
                                <?php echo $arreglocarrito[$i]["cantidad"]?>
                                <a class="waves-effect waves-light btn red less" href="../controlador/Botones.php?id=<?php echo $arreglocarrito[$i]['id'] ?>&op=less"><p align="center">-</p></a> 
                            </h6>
                            
                        </td>
                         <!-- total a pagar del producto -->

                         <td><h6 align="center">$<?php echo number_format($arreglocarrito[$i]["precio"]*$arreglocarrito[$i]["cantidad"], 2, '.', ',') ?></h6></td>
                         <!-- boton de eliminar producto -->

                         <td><center><a class="waves-effect waves-light btn red" href="../controlador/eliminarCarrito.php?id=<?php echo $arreglocarrito[$i]["id"] ?>">eliminar</a></center></td>
                         </tr>
                        <?php 
                        $suma=$suma+$arreglocarrito[$i]["precio"]*$arreglocarrito[$i]["cantidad"];//se hace la suma atraves del for de los productos agregados al carrito y el valor total se le asigana a la variable $suma
                        $_SESSION['total']=$suma+100;//la variable global $sesion total almacena el valor de suma para almacenarla de manera global y se le suma 100 que es el valor del envio 

                    }

                        ?>
                </tbody>
                <tfoot class="responsive-table">

                    <!-- muestra el valor de los productos sin el iva -->
                     <tr>
                       <td colspan="6"><h6 class="txttable">Subtotal:$<?php echo number_format($suma-$suma*.16, 2, '.', ',') ?></h6></td>
                     </tr>

                    <!-- muestra el total del iva de los productos -->  
                     <tr>

                       <td colspan="6"> <h6 class="txttable">Iva: $<?php echo number_format($suma*.16, 2, '.', ',')?></h6> </td>  
                     </tr>

                    <!-- muestra el costo del envio -->
                      <tr>
                       <td colspan="6"><h6 class="txttable">Costo de envio: $<?php echo number_format(100, 2, '.', ',') ?></h6> </td>  
                     </tr>

                    <!-- muestra e total del los productos con iva + envio -->
                     <tr>
                       <td colspan="6"><h6 class="txttable">Total a Pagar: $<?php echo number_format($suma+100, 2, '.', ',')?></h6> </td> 
                     </tr>
  
                </tfoot>
            </table>
            <div class="row">
                <div class="col s12">
                  <a href="pago.php" class="waves-effect waves-light btn-large red" style="min-width:100%;">Proceder al pago</a>  
                </div>
            </div>
        <?php } 
        
        // en caso de tener productos agregados al carrito entra en el else el cual muestra el mensaje

        else{?> 

            <h1 align="center" style="color: green;">No hay productos en el carrito!</h1>

        <?php } }

        else{//en caso de que no exista una sesion activa muestra el mesaje de iniciar sesion
        ?>    
            <h1 align="center" style="color: green;">Debes iniciar sesion para acceder al carrito!</h1>
            <br>
            <center>
            <a href="#modal1" class="modal-trigger btn-large waves-effect waves-light red ">Iniciar Sesion</a>
            </center>
        <?php } ?>    
        
        </div>
        <!-- boton flotante de regreso a los productos -->
        <div class="fixed-action-btn">
            <a class="btn-floating btn-large blue" href="index.php?pagina=1#catalogo">
            <i class="large material-icons m-36">reply</i>
            </a>
        </div>

 </main>

<?php   
require_once("preloader.php");
require_once("footer.php");
?>
<script>
    preloader('preloader01','contenido');
</script>