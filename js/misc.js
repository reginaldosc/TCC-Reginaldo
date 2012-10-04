$(document).ready(function(){

	// Analisa o botão submit de envio de Não conformidade //
	$('#submit_nc').click ( function()
	{
		var desc = $('#Descricao').val();
		var date = $('#Data').val();
		var comment = $('#Comentario').val();
		var auditoria = $('#Auditoria').val();
		var arfefato = $('#Artefato').val();

		// Limpa //
		$('#Descricao').val('');
		$('#Data').val('');
		$('#Comentario').val('');
		$('#Artefato').val('');
		
		if (desc != "" && date != "" && comment != "" ){
			
			$.post("../../nc/cadastrarNc/", { Descricao : desc , Data : date, Comentario : comment, Auditoria : auditoria, Artefato : arfefato }, "json");
			
			$('.modal-body').slideUp(400);
			$('#alert-msg').slideDown(400).delay(800);
			$('#alert-msg').slideUp(400);
		}
		else
			{
				$('.modal-body').slideUp(400);
				$('#alert-msg-error').slideDown(400).delay(800);
				$('#alert-msg-error').slideUp(400);	
			}
		
		// Fecha o modal depois do timeout //
		var delay = 2000;
		setTimeout(function()
		{	
		 	$("#NCmodal").modal('hide');
		}, delay);
		 	
		 
	});

	// Analisa o radio selecionado //
	$(':radio').click ( function()
	{
		if ($(this).is(':checked') && $(this).val() == 6) 
		{
			var id = $(this).attr("id");
			$('#Artefato').val(id);
			
			$('#NCmodal').modal('show');
		}

	});


	// Executa quando o modal for fechado //
	$('#NCmodal').bind('hidden', 'hide', function () {
		  
		// Limpa //
		$('#Descricao').val('');
		$('#Data').val('');
		$('#Comentario').val('');
		$('#Artefato').val('');
		
		// Deixa página default //
		$('.modal-body').slideDown();
		
		// Deixa página default //
		$('#alert-msg').slideUp();
		$('#alert-msg-error').slideUp();

	});
	

	// Datas para o sistema //
	$('#Data').datepicker()

});