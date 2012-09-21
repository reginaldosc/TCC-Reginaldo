<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar nova unidade -->
	<a href="newCargo" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Novo Cargo </a>
	<br>
	<br>

	<!-- Tabela com a lista das unidades do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Cargo</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Visualizar</th>				
			</tr>
		</thead>
				
		<tbody>
			{cargos}
			<tr>	
				<td>{cargoNome}</td>
				<td><a href="editCargo/{cargoID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveCargo("{cargoID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				<td><a href="visuCargo/{cargoID}" class='icon-eye-open'> <a/></td>
				</tr>
			{/cargos}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir o Cargo ?</p>
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

function RemoveCargo(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteCargo/"+id;

}	

</script>


