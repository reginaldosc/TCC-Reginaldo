
	<div class="container">
	
		<div class="page-header">
			<h2>
				Edição <small> de Não Conformidade</small>
			</h2>
		</div>
		
		<?php
			$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
			echo form_open('nc/editarNc', $atributos); 
		?>

	<fieldset>
		{nc}

		<div class="control-group">
			<div class="controls">
				<input type="hidden" class="input-xlarge" id="ID"
					value='{ncID}' name="ID">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Descrição</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="Descricao"
					value='{ncDescricao}' name="Descricao" rel="popover"
					data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres."
					data-original-title="Descricao" value="" autocomplete="off">
			</div>
		</div>

		<div class="control-group">
				<label class="control-label" for="">Data Prevista</label>
				<div class="controls">
						<input type="text" placeholder="Informe a data" data-date-format="dd/mm/yyyy" id="Data" name="Data"
						autocomplete="off">
				</div>
			</div>				
			
		
		
		<div class="control-group">
			<label class="control-label" for="">Comentário</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="Comentario"
					value='{ncComentario}' name="Comentario" rel="popover"
					data-content="A Descricao deve ser maior que 6 caracteres "
					data-original-title="Comentario" value="" autocomplete="off">
			</div>
		</div>
		{/nc}

		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<button class="btn">Limpar</button>
		</div>
	</fieldset>

	<!-- FIM -->

