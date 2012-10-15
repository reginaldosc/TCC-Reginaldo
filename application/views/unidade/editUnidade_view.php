
<div class="container">

	<div class="page-header">
		<h2>
			Edição <small> de Unidade</small>
		</h2>
	</div>

	<?php
	$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
	echo form_open('unidade/editUnidade', $atributos);
	?>

	<fieldset>
		{unidade}

		<div class="control-group">
			<div class="controls">
				<input type="hidden" class="input-xlarge" id="ID"
					value='{unidadeID}' name="ID">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Nome</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="Nome2"
					value='{unidadeNome}' name="Nome2" rel="popover"
					data-content="Deve ter no minimo 3 caracteres e no maxímo 45 caracteres."
					data-original-title="Nome" value="" autocomplete="off">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Ativo</label>
			<div class="controls">
				<select id="Ativo" name="Ativo" class="input-xlarge">
					<option value="SIM">SIM</option>
					<option value="NÃO">NÃO</option>
				</select>
			</div>
		</div>

		{/unidade}

		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<button class="btn">Limpar</button>
		</div>
	</fieldset>
	</form>

	<!-- FIM -->