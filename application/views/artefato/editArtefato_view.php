
	<div class="container">
	
		<div class="page-header">
			<h2>
				Edição <small> de Artefato</small>
			</h2>
		</div>
		
		<?php
			$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
			echo form_open('artefato/editArtefato', $atributos); 
		?>

	<fieldset>
		{artefato}

		<div class="control-group">
			<div class="controls">
				<input type="hidden" class="input-xlarge" id="ID"
					value='{artefatoID}' name="ID">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Nome</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="Nome"
					value='{artefatoNome}' name="Nome" rel="popover"
					data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres."
					data-original-title="Nome" value="" autocomplete="off">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Descrição</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="Descricao"
					value='{artefatoDescricao}' name="Descricao" rel="popover"
					data-content="A Descricao deve ser maior que 6 caracteres "
					data-original-title="Descricao" value="" autocomplete="off">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Ativo</label>
			<div class="controls">
				<select id="" name="Ativo" class="input-xlarge">
					<option value="SIM">SIM</option>
					<option value="NÃO">NÃO</option>
				</select>
			</div>
		</div>
		{/artefato}

		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<button class="btn">Limpar</button>
		</div>
	</fieldset>

	<!-- FIM -->

