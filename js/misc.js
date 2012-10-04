$(document).ready(function(){

	$('#submit_nc').click ( function()
	{
		var desc = $('#Descricao').val();
		var date = $('#Data').val();
		var comment = $('#Comentario').val();
		var auditoria = $('#Auditoria').val();

		// Limpa //
		$('#Descricao').val('');
		$('#Data').val('');
		$('#Comentario').val('');

		$.post("../../nc/cadastrarNc/", { Descricao : desc , Data : date, Comentario : comment, Auditoria : auditoria }, "json");


		$('.modal-body').slideUp(400);

		$('#alert-msg').slideDown(400).delay(2000);
		$('#alert-msg').slideUp(400);

		// Implementar reset modal //
	
	});

	// Analisa o radio selecionado //
	$(':radio').click ( function()
	{
		if ($(this).is(':checked') && $(this).val() == 6) 
		{
			$('#NCmodal').modal('show');
		}

	});


	// Executa quando o modal for fechado //
	$('#NCmodal').on('hidden', function () {
		  
		// Limpa //
		$('#Descricao').val('');
		$('#Data').val('');
		$('#Comentario').val('');

	})



	// Datas para o sistema //
	$('#Data').datepicker()

});