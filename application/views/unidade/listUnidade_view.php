<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar nova unidade -->
	<a href="newUnidade" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Nova Unidade </a>
	<br>
	<br>

	<!-- Tabela com a lista das unidades do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Unidade</th>
				<th>Ativo</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
				
		<tbody>
			{unidades}
			<tr>	
				<td>{unidadeNome}</td>
				<td>{unidadeAtivo}</td>
				<td><a href="buscaUnidade/{unidadeID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveUnidade("{unidadeID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
			</tr>
			{/unidades}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir a Unidade ?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>

<!-- FIM -->
<script type="text/javascript">

function RemoveUnidade(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteUnidade/"+id;

}	

</script>


