$(function(){

	// Lista de Carrreras
	$.post('carreras.php' ).done( function(respuesta)
	{
		$('#carreras' ).html( respuesta );
	});

	// lista carreras	
	$('#carreras').change(function()
	{
		var carreras = $(this).val();
		// Lista de ciclos
		$.post('ciclos.php', {carrerasE: carreras} ).done( function( respuesta )
		{
			$( '#ciclos' ).html( respuesta );	
		});
	});
	
})

