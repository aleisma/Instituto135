$(function(){

	// Lista de Carrreras
	$.post('carreras.php' ).done( function(respuesta)
	{
		$('#carreras' ).html( respuesta );
	});
	
})

