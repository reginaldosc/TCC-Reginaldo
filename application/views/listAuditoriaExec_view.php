
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Lista <small> de Auditorias</small>
			</h2>
	</div>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="cadastrarExecAuditoria">  
			
		<fieldset>
		{auditoriasExec}
			<label class="control-label" for="">Departamento</label>
		{/auditoriasExec}
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
