<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar novo usuario -->
	<a href="newAc" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Nova Ação Corretiva </a>
	<br>
	<br>

	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Data Final</th>
				<th>Descrição</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Executar</th>
				<th>Visualizar</th>
				<th>Status</th>
			</tr>
		</thead>
				
		<tbody>
			{acs}
			<tr>	
				<td>{acDataFinal}</td>
				<td>{acDescricao}</td>
				<td><a href="editAc/{acID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveAc("{acID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				<td><a href="execAc/{acID}" class='icon-play'> <a/></td>
				<td><a href="visuAc/{acID}" class='icon-eye-open'> <a/></td>
				<td> <span id="status" class="label label-success">Aberta</span></td>
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

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteAc/"+id;

}	

</script>


