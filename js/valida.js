
$(document).ready(function(){

	$('input').hover(function()
	{
		$(this).popover('show')
	});

	$("#FormCadastro").validate(
	{
		
		rules:
		{
			/* Valida o Nome completo do novo usuario */
			Nome:
			{
				required: true,
				minlength: 6,
				maxlength: 45
			},

			/* Valida campos Nome em cadastros */
			abc:
			{
				required: true,
				minlength: 2,
				maxlength: 45
			},
			
			/* Valida campos Descricao */
			Descricao:
			{
				required: true,
				minlength: 6,
				maxlength: 255				
			},

			/* Valida o nome do usuario, inserido */	
			Matricula:
			{
				required: true,
				minlength: 6,
				maxlength: 6,
				number: true
			},
			
			//Valida Email
			Email:
			{
				required: true,
				email: true
			},

			/* Valida data */
			Data:
			{
				required: true,
				dateISO: true
			},
		
		},
		
		messages:
		{
			Nome:{
				required: "Informe o nome completo do novo usuário",
				minlength:"O nome do novo usuario deve ser maior que 6 caracteres ",
				maxlength:"O nome do novo usuario deve ser menor que 45 caracteres ",
			},
			
			abc:{
				required: "Informe o nome Válido",
				minlength:"O nome deve ser maior que 2 caracteres ",
				maxlength:"O nome deve ser menor que 45 caracteres ",
			},

			Descricao:{
				required: "Informe a descrição",
				minlength:"A Descricao deve ser maior que 6 caracteres ",
				maxlength:"O nome deve ser menor que 256 caracteres ",
			},

			Matricula:
			{
				required:"Informe a matrícula do usuário",
				minlength:"A matricula digitada pussui menos que 6 números",
				maxlength: "A matricula digitada possui mais que 6 números"
				
			},
								
			Email:
			{
				required:"Informe um endereço de e-mail",
				email:"Endereço de e-mail invalido"
			},

			Data:{
				required: "Informe a data para auditoria",
				dateISO: "Informe uma data valida, exemplo: dd/mm/aaaa",
			},
			
		},

		errorClass: "help-block",
		errorElement: "span",
		highlight:function(element, errorClass, validClass) {

			$(element).parents('.control-group').addClass('error');
		},
		unhighlight: function(element, errorClass, validClass) {

			$(element).parents('.control-group').removeClass('error');
			$(element).parents('.control-group').addClass('success');
		}
	});
});
