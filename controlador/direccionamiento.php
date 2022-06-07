<?php 
if (empty($_GET)) { //atravez del if preguntamos si get viene vacia para poder redirreccionarla a la pagina 1
header('Location: '.$pagina.'.php?pagina=1');
}
    require_once("../modelos/tienda.php");//incluimos al modelo 
    $resultado=new tienda();// invocamos a la clase tienda atraves de la varaible resultado
    $query=$resultado->buscar();//la variable qwery almacenara las datos que nos traiga la funcion buscar los cuales seran los datos de los productos 
    $carrusel=$resultado->carrusel();//esta funcion trae las imagenes que se mostraran en el carrusel  
    // $total=4;//declaramos el numero total de productos que queramos que se muestren por pagina
    $inicio=($_GET['pagina']-1)*$total;//resta 1 a la pagina actual de navegacion para enviarlo como parametro a la funcion productos del modelo 
    $totalbd=$query->num_rows;//obtenemos el numero de registros que nos devuelve la consulta a la base de datos para hacer el calculo de cuantas pagina necesitaremos segun nuestro catalogo de productos
    $paginas=$totalbd/$total;//dividimos el numero de registros entre el numero total de productso que queremos que se muestren por paginacion 
    $paginas=ceil($paginas);//atraves de funcion ceil redondeamos el total el numero de paginas para que no nos salgan decimales 
       
       if ($_GET['pagina']>$paginas) {
         header('Location: '.$pagina.'.php?pagina='.$paginas);
       } 
       if ($_GET['pagina']<=0) {
         header('Location: '.$pagina.'.php?pagina=1');
       } 
        $query=$resultado->productos(1,$total);

 ?>