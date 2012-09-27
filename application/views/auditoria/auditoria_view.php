
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Visualização <small> de Auditoria</small>
			</h2>
	</div>

			
	<fieldset>

		{auditorias}

		<div class="control-group">
				<label class="control-label" for="">Auditor</label>
				<div class="controls">
					<input class="input-xlarge" id="disabledInput" type="text" value="{usuarioNome}" disabled>
				</div>
		</div>
			
		<div class="control-group">
			<label class="control-label" for="">Unidade</label>
			<div class="controls">
					
					<input class="input-xlarge" id="disabledInput" type="text" value="{unidadeNome}" disabled>
					
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Departamento</label>
			<div class="controls">
					<input class="input-xlarge" id="disabledInput" type="text" value="{departamentoNome}" disabled>
			</div>
		</div>

		<div class="control-group">
			<label class="control-label" for="">Projeto</label>
			<div class="controls">
					<input type="hidden" name="Projeto" value="{projetoID}">
					<input class="input-xlarge" id="disabledInput" type="text" value="{projetoNome}"  disabled>
			</div>
		</div>


		<div class="control-group">
			
			<label class="control-label" for="">Data Execução</label>
			<div class="controls">
				
				<input type="datetime" class="input-xlarge" id="disabledInput" value="{auditoriaDataInicio}" disabled>
						
			</div>
		</div>


		<div class="control-group">
			
			<label class="control-label" for="">Acompanhante</label>
			<div class="controls">
				
				<input type="datetime" class="input-xlarge" id="disabledInput" value="{acompanhanteNome}" disabled>
						
			</div>
		</div>							
		

		<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Artefato</th>
				<th>Resultado</th>
				<th>NC</th>				
						
			</tr>
		</thead>
				
		<tbody>
	
			<tr>	
			    <td><strong>{artefatoNome}</strong></td>
				<td> 
					<span id="status" class="label label-{statusCode}">{statusNome}</span></td>	
				</td>

				<td>
					teste	
				</td>
			</tr>

		</tbody>
		</table>

		{/auditorias}
	</fieldset>





<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
