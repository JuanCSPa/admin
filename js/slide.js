 $(document).ready(function() {
    // carousel marcas
    var owl = $('#slideMarcas');
    owl.owlCarousel({
      loop: true,
      autoWidth: false,
      autoplay: true,
      autoplayTimeout: 3000,
      nav: true,
      navText: ['<i class="fa fa-arrow-circle-left" title="Anterior"></i>', '<i class="fa  fa-arrow-circle-right" title="Siguiente"></i>'],
      responsive:{
        0:{
            items:1
        },
        600:{
            items:2,
            margin: 15
        },            
        960:{
            items:3,
            margin: 20
        },
        1200:{
            items:4,
            margin: 20
        }
      }
    });
  });