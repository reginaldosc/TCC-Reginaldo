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
				<th>Data Realizada</th>
				<th>Status</th>
				<th>Visualizar</th>
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
				<td><span id="status" class="label label-{statusCode}"> {statusNome} </span></td>
				<td><a href="buscaAc/{acID}" class='icon-eye-open'></a></td>
				<td><a href="editAc/{acID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveAc("{acID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				<td><a href="../ac/execAc/{acID}" class='icon-check'><a/></td>
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


<!-- FIM -->

<script type="text/javascript">

function RemoveAc(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteAc/"+id;

}	

</script>


