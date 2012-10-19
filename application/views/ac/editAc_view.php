
	<div class="container">
	
		<div class="page-header">
			<h2>
				Edição <small> de Ação Corretiva </small>
			</h2>
		<?php
			$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
			echo form_open('ac/editarAc', $atributos); 
		?>
		
			<fieldset>
				{ac}
				
				<div class="control-group">					
					<div class="controls">
						<input type="hidden" class="input-xlarge" id="ID" value='{acID}' name="ID">
					</div>
				</div>
				
				<div class="control-group">					
					<div class="controls">
						<input type="hidden" class="input-xlarge" id="ID2" value='{ncID}' name="ID2">
					</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="">Ação</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="Acao" value='{acAcao}' name="Acao" rel="popover" 
							data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres." data-original-title="Acao" value="" autocomplete="off">
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="">Descrição</label>
					<div class="controls">
						<textarea class="span5" rows="8" type="text" name="Descricao" id="Descricao" value=""></textarea>
					</div>
				</div>	
				{/ac}
		
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button class="btn">Limpar</button>
				</div>
			</fieldset>
</div>


<!-- FIM -->

