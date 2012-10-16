
	<div class="container">
	
		<div class="page-header">
			<h2>
				Edição <small> de Ação Corretiva
		<?php
			$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
			echo form_open('ac/buscaAc', $atributos); 
		?>
		
			<fieldset>
				{ac}
				
				<div class="control-group">					
				<div class="controls">
					<input type="hidden" class="input-xlarge" id="ID" value='{acID}' name="ID">
				</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="">Nome</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="Nome" value='{acNome}' name="Nome" rel="popover" 
					data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres." data-original-title="Nome" value="" autocomplete="off">
				</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="">Descrição</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="Descricao" value='{acDescricao}'name="Descricao" rel="popover" 
					data-content="A Descricao deve ser maior que 6 caracteres " data-original-title="Descricao"  value="" autocomplete="off">
				</div>
				</div>
				{/ac}
		
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button class="btn">Limpar</button>
				</div>
			</fieldset>


<!-- FIM -->

