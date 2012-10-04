
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Visualização <small> de Não Conformidade</small>
			</h2>
	</div>

			
		{ncs}

			<h3> Dados da não conformidade: </h3>
			<br>
			<strong> Não Conformidade: </strong> {ncDescricao}
			<br>
			<br>

			<strong> Item Não Conforme: </strong> {artefatoNome}
			<br>
			<br>			
			
			<strong> Data Prevista: </strong> {ncDataFinalprev}
			<br>
			<br>

			<strong> Data da execução: </strong> {ncDataFinalprev}
			<br>
			<br>
		{/ncs}
		
		
		{auditorias}
			<h3> Dados da Auditoria: </h3>
			<br>
			
			<strong> Departamento: </strong> {departamentoNome}
			<br>
			<br>

			<strong> Projeto: </strong> {projetoNome}
			<br>
			<br>
			
			<strong> Projeto: </strong> {unidadeNome}
			<br>
			<br>
			
		
		
		{/auditorias}
		
		{acompanhante}

			<strong> Acompanhante: </strong> {usuarioNome}
			<br>
			<br>
		{/acompanhante}



<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
