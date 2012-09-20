
<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i>Buscar</button>
	</form>

	<br>
	<br>

	<!-- Tabela com a lista das auditorias executadas do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Auditoria</th>
				<th>Departamento</th>
				<th>Projeto</th>
				<th>Data Execução</th>
				<th>Status</th>
				<th>Não Conformidades</th>
				<th>Ações Corretivas</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Visualizar</th>
				
			</tr>
		</thead>
				
		<tbody>
			<!--{auditoriasExec}-->
			<tr>	
				<td>{auditoriaID}</td>
				<td>{departamentoNome}</td>
				<td>{projetoNome}</td>
				<td>{auditoriaDataFinal}</td>
				<td>{auditoriaStatus}</td>			
			
				

				<!--{artefatos}-->
					<td></td>
					<td></td>					
					<td><a href="editAuditoria/{auditoriaID}" class='icon-edit'> <a/></td>
					<td><a onclick='RemoveAuditoria("{auditoriaID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
					<td><a href="visuAuditoria/{auditoriaID}" class='icon-eye-open'> <a/></td>
				<!--{/artefatos}-->
			</tr>
				
			<!--{/auditoriasExec}-->
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
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

function RemoveAuditoriaExec(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteAuditoriaExec/"+id;

}	

</script>


