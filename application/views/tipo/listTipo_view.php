<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar nova unidade -->
	<a href="newTipo" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Novo Tipo </a>
	<br>
	<br>

	<!-- Tabela com a lista das unidades do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Tipo</th>
				<th>Editar</th>
				<th>Excluir</th>
				<th>Visualizar</th>				
			</tr>
		</thead>
				
		<tbody>
			{tipos}
			<tr>	
				<td>{tipoNome}</td>
				<td><a href="editTipo/{tipoID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveTipo("{tipoID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				<td><a href="visuTipo/{tipoID}" class='icon-eye-open'> <a/></td>
				</tr>
			{/tipos}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir o Tipo ?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>


<!-- FIM -->

<script type="text/javascript">

function RemoveTipo(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteTipo/"+id;

}	

</script>


