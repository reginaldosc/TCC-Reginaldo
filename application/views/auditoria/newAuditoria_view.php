
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Cadastro <small> de nova Auditoria</small>
			</h2>
	</div>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="cadastrarAuditoria">  
			
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
					<select id="" class="input-xlarge" >
						
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



<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-datepicker.js"></script>
<script src="<?php echo base_url();?>js/valida.js"></script>
<script src="<?php echo base_url();?>js/misc.js"></script>