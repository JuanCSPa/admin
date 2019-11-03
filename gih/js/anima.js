// JavaScript Document
$(document).ready(function(){
  //BLOQUE INDEX HOME
  
  animacion('#visionMision', 'bounceInDown', 80);
  
  animacion('#introNosotros', 'bounceInLeft', 80);
  
  animacion('#marcas', 'bounceInRight', 80);
  
  animacion('#noticias', 'bounceInUp', 80);
  
  animacion('#fijo', 'bounceInUp', 90);
  
  animacion('#contLeft', 'bounceInLeft', 80);
  
  animacion('#contRight', 'bounceInRight', 80);

//bloque SOMOS
  animacion('#contRight', 'bounceInRight', 80);

  animacion('#historia', 'fadeInUp', 80);

//bloque detalle noticia
  animacion('#subNoticia', 'bounceInRight', 80);

//detalles del socio
  animacion('#detalleSocio', 'slideInUp', 80);

  animacion('#productoRelacionados', 'flipInX', 80);

  //list Productos
  animacion('.productos', 'animated zoomIn', 80);

  //detalle producto
  animacion('#detalleProducto', 'bounceInDown', 80);

  //servicios
  animacion('#listServicios', 'bounceInRight', 80);

  animacion('.impar', 'bounceInLeft', 80);

  //contacto
  //animacion('#googlemaps', 'slideInUp', 80);

  animacion('#formContacto', 'slideInUp', 80);
  
});

function animacion(id, nameClass, porcent){
  $(id).css('opacity', 0);
  $(id).waypoint(function() {
    $(id).addClass(nameClass);
    $(id).css('opacity', 1);
  }, { offset: porcent+'%' });
}