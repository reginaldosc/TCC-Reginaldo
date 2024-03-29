<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<!-- Adicionar novo projeto -->
	<a href="newProjeto" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Novo Projeto </a>
	<br>
	<br>

	<!-- Tabela com a lista dos projetos do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Projeto</th>
				<th>Departamento</th>
				<th>Ativo</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
				
		<tbody>
			{projetos}
			<tr>	
				<td>{projetoNome}</td>
				<td>{departamentoNome}</td>
				<td>{projetoAtivo}</td>
				<td><a href="buscaProjeto/{projetoID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveProjeto("{projetoID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				</tr>
			{/projetos}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir o Projeto ?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>


<!-- FIM -->

<script type="text/javascript">

function RemoveProjeto(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteProjeto/"+id;

}	

</script>


