
	<div class="container">
	
		<br>
		<div class="page-header">
			<h2>
				Edição <small> de Perguntas</small>
			</h2>
		</div>
		<br>
		
		<?php
			$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
			echo form_open('perguntas/editPerguntas', $atributos); 
		?>

	<fieldset>
		{perguntas}

		<div class="control-group">
			<div class="controls">
				<input type="hidden" class="input-xlarge" id="ID"
					value='{perguntasID}' name="ID">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Artefato</label>
			<div class="controls">
				<select id="" name="Artefato" class="input-xlarge">						
					{artefatos}
			   			<option value="{artefatoID}"> {artefatoNome} </option>
					{/artefatos}
				</select>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Pergunta</label>
			<div class="controls">
				<input type="text" class="input-xlarge" id="Descricao"
					value='{artefatoPergunta}' name="Pergunta" rel="popover"
					data-content="A Descricao deve ser maior que 6 caracteres "
					data-original-title="Descricao" value="" autocomplete="off">
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Ativo</label>
			<div class="controls">
				<select id="" name="perguntaAtivo" class="input-xlarge">
					<option value="SIM">SIM</option>
					<option value="NÃO">NÃO</option>
				</select>
			</div>
		</div>
		{/perguntas}

		<div class="form-actions">
			<button type="submit" class="btn btn-primary">Salvar</button>
			<button class="btn">Limpar</button>
		</div>
	</fieldset>

	<!-- FIM -->

