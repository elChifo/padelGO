$(document).ready(function() {
	
	$('.button').click(function() {
		
		type = $(this).attr('data-type');
		/*El método fadeIn () cambia gradualmente la opacidad, para los elementos seleccionados, desde oculta a visible*/
		$('.overlay-container').fadeIn(function() {
			
			window.setTimeout(function(){
				// llama a una función después de un tiempo en milisegundos
				$('.ventana.'+type).addClass('ventana-visible');
			}, 100);
			
		});
	});
	//funcion al cerrar la ventana emergente
	$('.close').click(function() {
		/*El método removeClass () elimina uno o más nombres de las clases de los elementos seleccionados.*/
		$('.overlay-container').fadeOut().end().find('.ventana').removeClass('ventana-visible');
	});
	
});