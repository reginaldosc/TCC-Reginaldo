
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Cadastro <small> de tipo</small>
			</h2>
		</div>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="cadastrarTipo">  
			
			<fieldset>

			<div class="control-group">
				<label class="control-label" for="">Nome</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="Nome" placeholder="Tipo de Usuário" name="Nome" 						rel="popover" 
					data-content="Deve ter no minimo 2 caracteres e no maxímo 45 caracteres." data-original-title="Nome" 						value="" autocomplete="off">
				</div>
			</div>

			
			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button class="btn" type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>




<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>js/valida.js"></script>


