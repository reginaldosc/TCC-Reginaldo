
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Visualização <small> de Não Conformidade</small>
			</h2>
	</div>

	<div class="row">
	  
	  <div class="span4">
	  	{ncs}
			<h3> Dados da Não Conformidade</h3>
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
		{/ncs}

	  </div>

	  <div class="span8">
	  	{auditorias}
			<h3> Dados da Auditoria </h3>
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

	  </div>
	</div>
		

	<br>
	<br>
	<h4> Ação Corretiva</h4>
	<br>

	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Descrição</th>
				<th>Data Realizada</th>
				<th>Status</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Confirmar Execução</th>
			</tr>
		</thead>
				
		<tbody>
			{acs}
			<tr>
				<td>{acAcao}</td>	
				<td>{acDataFinal}</td>
				<td> <span id="status" class="label label-{statusCode}"> {statusNome} </span> </td>
				<td><a href="editAc/{acID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveAc("{acID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				<td><a href="../../ac/execAc/{acID}" class='icon-check'><a/></td>

			</tr>
			{/acs}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir a ação corretiva ?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>


<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-alert.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-modal.js"></script>

<script type="text/javascript">

function RemoveAc(id){

	document.getElementById('Excluir').href="../../ac/deleteAc/"+id;

}	

</script>