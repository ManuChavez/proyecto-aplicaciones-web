$('#sunmitt').click(function(e){
	e.preventDefault();
	$.post('validar.php',
		$('#form-login').serialize(),
			function(respuestaServer){
				if(!respuestaServer.salida){
					$(location).attr('href', 'inicio.html');
					alert('Culiao exitoso');
				}else{
					alert('Culiao fallido');

				}
			});
});