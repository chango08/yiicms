$(function(){
    $('#buscar').click(function(){
        $('#modalBuscar').modal('show')
                .find('#modalContent')
                .load($(this).attr('value'));    
   });
    $('#verimagen').click(function(){
        $('#modalVerImagen').modal('show')
                .find('#modalImagen')
                .load($(this).attr('value'));    
   });
});
$(window).load(function(){

  $(".slickHoverZoom").slickhover();
  
});