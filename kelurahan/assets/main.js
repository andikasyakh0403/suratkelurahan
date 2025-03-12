/* js ^^ */
$(document).ready(function(){
    
    var owl = $('#mimpi');
    owl.owlCarousel({
      loop: true,
      items:2,
      responsive: {
        0: {
          items: 1
        },
        600: {
          items: 2
        },
        1000: {
          items: 3
        }
      }
      

      
    })
  })