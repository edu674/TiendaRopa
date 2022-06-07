// function init(){
M.AutoInit(); 
// } 

function Carrusel(){
    var elem = document.querySelector('.carousel');
    var instance = M.Carousel.init(elem, {
        indicators: true,
        duration: 400,
        dist: -90,
        shift: 5,
        padding: 5,
        numVisible: 5,
        indicators: true,
        noWrap: false,
    });

    if (instance.pressed==false) {
         setInterval(()=>{
            instance.next();
        }, 4000);
    }
}



function datos(){
     localStorage.setItem("nombre", document.getElementById('nombres').value)
     localStorage.setItem("apellidos", document.getElementById('apellidos').value)
     localStorage.setItem("calle", document.getElementById('calle').value)
     localStorage.setItem("colonia", document.getElementById('colonia').value)
     localStorage.setItem("codigopostal", document.getElementById('codigopostal').value)
     localStorage.setItem("municipio", document.getElementById('municipio').value)
     localStorage.setItem("estado", document.getElementById('estado').value)
     localStorage.setItem("telefono", document.getElementById('telefono').value)
     localStorage.setItem("direccion2", document.getElementById('direccion2').value)
     localStorage.setItem("telefono2", document.getElementById('telefono2').value)
}

function mensajeError(){
    document.getElementById('nombres').value=localStorage.getItem('nombre')
    document.getElementById('apellidos').value=localStorage.getItem('apellidos')
    document.getElementById('calle').value=localStorage.getItem('calle')
    document.getElementById('colonia').value=localStorage.getItem('colonia')
    document.getElementById('codigopostal').value=localStorage.getItem('codigopostal')
    document.getElementById('municipio').value=localStorage.getItem('municipio')
    document.getElementById('estado').value=localStorage.getItem('estado')
    document.getElementById('telefono').value=localStorage.getItem('telefono')
    document.getElementById('direccion2').value=localStorage.getItem('direccion2')
    document.getElementById('telefono2').value=localStorage.getItem('telefono2')
    localStorage.clear();
    M.toast({
        html: 'ERROR USUARIO YA REGISTRADO!', 
        classes:"red rounded",
    })
}

function contraseña(){
    document.getElementById('nombres').value=localStorage.getItem('nombre')
    document.getElementById('apellidos').value=localStorage.getItem('apellidos')
    document.getElementById('calle').value=localStorage.getItem('calle')
    document.getElementById('colonia').value=localStorage.getItem('colonia')
    document.getElementById('codigopostal').value=localStorage.getItem('codigopostal')
    document.getElementById('municipio').value=localStorage.getItem('municipio')
    document.getElementById('estado').value=localStorage.getItem('estado')
    document.getElementById('telefono').value=localStorage.getItem('telefono')
    document.getElementById('direccion2').value=localStorage.getItem('direccion2')
    document.getElementById('telefono2').value=localStorage.getItem('telefono2')
    localStorage.clear();
    M.toast({
        html: 'ERROR LAS CONTRASEÑAS DEBEN SER IGUALES!', 
        classes:"red rounded",
    })
}

function actulizarmsn(){
    M.toast({
        html: 'datos actualizados', 
        classes:"green rounded",
    })
}

function verificarUsuario(){
    M.toast({
        html: 'correo o contraseña incorrecta', 
        classes:"red rounded",
    })
}

function slider(){
 $('.carrusel').slick({
  infinite: true,
  slidesToShow: 4,
  slidesToScroll: 4,
  prevArrow:'<span class="prev"><li class="material-icons md-70 ">arrow_back_ios</li></span>',
  nextArrow:'<span class="next"><li class="material-icons md-70">arrow_forward_ios</li><span>',
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 4,
        slidesToScroll: 4,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 650,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3
      }
    },
    {
      breakpoint: 490,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
  ]
});
}

   function slide(){
    // let burguer= document.querySelector('.menu');
    let navegation=document.querySelector('.navegacion');
    navegation.classList.toggle("open");
    
    }

function ActualizarUsuario(){
     $('#contenidoUsuario').load('Actulizar.php');
    }

function EnviarPost(id){
    document.getElementById(id).submit();
}    

function preloader(preloader, contenido){

    window.addEventListener('load',()=>{
    setTimeout(cargar, 1000 );
    function cargar(){
    document.getElementById(preloader).className='hide';
    document.getElementById(contenido).className='';
}

    });

    
}    




