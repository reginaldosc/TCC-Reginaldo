
<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
			<h2>
				Edição <small> de Auditoria</small>
			</h2>
	</div>
	<br>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="../editarAuditoria">			

			 <?php 
			 	// Mensagens de erro //
			 
			 	echo form_error('Projeto', '<div class="alert alert-error">', '</div>');

			 	echo form_error('Data', '<div class="alert alert-error">', '</div>');  

			 ?>
 			
			<fieldset>
			
			<div class="control-group">
				<label class="control-label" for="">Auditor</label>
				<div class="controls">
					<input type="hidden" id="Auditoria" name="Auditoria" value="{id}">
						
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
						
						{departamentos}		
						<option value="{departamentoID}"> {departamentoNome} </option>
						{/departamentos}
						
				    </select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Projeto</label>
				<div class="controls">
					<select id="" name="Projeto"class="input-xlarge">
						
						{projetos}		
						<option value="{projetoID}"> {projetoNome} </option>
						{/projetos}
						
				    </select>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Data da auditoria</label>
				<div class="controls">
						<input type="text" placeholder="Informe a data" data-date-format="dd/mm/yyyy" id="Data" name="Data">
				</div>
			</div>				
			

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button class="btn" type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>
	
<!-- FIM -->