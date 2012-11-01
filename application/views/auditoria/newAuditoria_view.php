
<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
			<h2>
				Cadastro <small> de nova Auditoria</small>
			</h2>
	</div>
	<br>
	
	<form class="form-horizontal" id="FormCadastro" method="POST" action="cadastrarAuditoria">			

			 <?php 
			 	// Mensagens de erro //
			 
			 	echo form_error('Projeto', '<div class="alert alert-error">', '</div>');

			 	echo form_error('Data', '<div class="alert alert-error">', '</div>');  

			 ?>
 			
			<fieldset>

			<div class="control-group">
				<label class="control-label" for="">Auditor</label>
				<div class="controls">
					<select id="" name="Auditor" class="input-xlarge">
						
						{usuarios}		
						<option value="{usuarioID}"> {usuarioNome} </option>
						{/usuarios}
						
				    </select>
				</div>
			</div>	


			<div class="control-group">
				<label class="control-label" for="">Unidade</label>
				<div class="controls">
					<select id="" name="Unidade" class="input-xlarge" >
						
						<option value=""> Escolha </option>
						{unidades}		
						<option value="{unidadeID}"> {unidadeNome} </option>
						{/unidades}
						
				    </select>
				</div>
			</div>


			<div class="control-group">
				<label class="control-label" for="">Departamento</label>
				<div class="controls">
					<select id="" name="Setor" class="input-xlarge">
						
						<option value=""> Escolha </option>
						
				    </select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Projeto</label>
				<div class="controls">
					<select id="" name="Projeto" class="input-xlarge">
						
						<option value=""> Escolha </option>
						
				    </select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Data da auditoria</label>
				<div class="controls">
						<input type="text" placeholder="Informe a data" data-date-format="dd/mm/yyyy" id="Data" name="Data"
						autocomplete="off">
				</div>
			</div>				
			

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button class="btn" type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>

<script type="text/javascript">
    var path = '<?php echo site_url(); ?>'
</script>
<!-- FIM -->