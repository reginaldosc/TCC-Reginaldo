<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar novo usuario -->
	<a href="newAuditoria" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Nova Auditoria </a>
	<br>
	<br>

	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Auditor</th>
				<th>Unidade</th>
				<th>Departamento</th>
				<th>Projeto</th>
				<th>Data agendada</th>
				<th>Status</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Executar</th>
				<th>Visualizar</th>
				
			</tr>
		</thead>
				
		<tbody>
			{auditorias}
			<tr>	
				<td>{usuarioNome}</td>
				<td>{unidadeNome}</td>
				<td>{departamentoNome}</td>
				<td>{projetoNome}</td>
				<td>{auditoriaDataInicio}</td>
				<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>
				<td><a href="editAuditoria/{auditoriaID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveAuditoria("{auditoriaID}")' data-toggle="modal" href="#RemoveModal" class='icon-trash'></a></td>
				<td><a href="execAuditoria/{auditoriaID}" class='icon-play'> <a/></td>
				<td><a href="visualizarAuditoria/{auditoriaID}" class='icon-eye-open'> <a/></td>
				
			</tr>
			{/auditorias}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="RemoveModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir a auditoria ?</p>
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

function RemoveAuditoria(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteAuditoria/"+id;

}	

</script>


