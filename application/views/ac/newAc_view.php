
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Cadastro <small> de nova AC</small>
			</h2>
	</div>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="../cadastrarAc">  
			
		<fieldset>

			<input type="hidden" id="nc" name="NC" value="{ncID}">
			
			<div class="control-group">
				<label class="control-label" for="">Ação</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="" placeholder="Que será executada" name="Acao" rel="popover" 
					data-content="Ação corretiva" data-original-title="Ação" value="" autocomplete="off">
				</div>
			</div>
			
						
			<div class="control-group">
				<label class="control-label" for="">Descrição</label>
				<div class="controls">
					<textarea class="span5" rows="8" type="text" name="Descricao"  placeholder="Descreva detalhamente como a ação corretiva que será executada."></textarea>
				</div>
			</div>				
			

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button class="btn" type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>

<!-- FIM -->
