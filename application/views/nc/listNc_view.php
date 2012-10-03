<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>


	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Descrição</th>
				<th>Data</th>
				<th>Auditoria</th>
				<th>Comentário</th>
				<th>Status</th>
				<th>AC</th>
			</tr>
		</thead>
				
		<tbody>
			{ncs}
			<tr>	
				<td>{ncDescricao}</td>
				<td>{ncDataFinalprev}</td>
				<td>{auditoriaID}</td>
				<td>{ncComentario}</td>
				<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>
				<td><a href="execAC/{auditoriaID}" class='icon-play'> <a/></td>
			</tr>
			{/ncs}
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

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteAc/"+id;

}	

</script>


