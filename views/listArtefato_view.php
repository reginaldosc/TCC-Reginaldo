<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar nova unidade -->
	<a href="newArtefato" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Novo Artefato </a>
	<br>
	<br>

	<!-- Tabela com a lista das unidades do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Artefato</th>
				<th>Descricao</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Visualizar</th>				
			</tr>
		</thead>
				
		<tbody>
			{artefatos}
			<tr>	
				<td>{artefatoNome}</td>
				<td>{artefatoDescricao}</td>
				<td><a href="editArtefato/{artefatoID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveArtefato("{artefatoID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				<td><a href="visuArtefato/{artefatoID}" class='icon-eye-open'> <a/></td>
				</tr>
			{/artefatos}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir o Artefato ?</p>
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

function RemoveArtefato(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteArtefato/"+id;

}	

</script>


