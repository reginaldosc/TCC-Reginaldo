$(document).ready(function(){

	$('#submit_nc').click ( function()
	{
		var desc = $('#Descricao').val();
		var date = $('#Data').val();
		var comment = $('#Comentario').val();
		var auditoria = $('#Auditoria').val();

		$.post("../../nc/cadastrarNc/", { Descricao : desc , Data : date, Comentario : comment, Auditoria : auditoria }, "json");

		$("#NCmodal").fadeOut("slow");	
	
	});


	// Datas para o sistema //
	$('#Data').datepicker()

});