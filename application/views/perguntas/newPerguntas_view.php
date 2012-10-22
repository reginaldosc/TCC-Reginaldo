
<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
			<h2>
				Cadastro <small> de perguntas</small>
			</h2>
		</div>
		<br>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="cadastrarPerguntas">  
			
		<fieldset>

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
					<input type="text" class="input-xlarge" id="artefatoPergunta" placeholder="Informe a pergunta desejada" name="artefatoPergunta" rel="popover" 
					data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres." data-original-title="Nome" value="" autocomplete="off">
				</div>
			</div>
			
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button class="btn" type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>

<!-- FIM -->

