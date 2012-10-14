<!-- Estrutura -->
<div class="container">

	<br>
	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>


	<!-- Tabela com a lista das unidades do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Remetente</th>
				<th>Mensagem</th>
				<th>Data</th>
				<th>Ler</th>
				<th>Excluir</th>
			</tr>
		</thead>
				
		<tbody>
			{mensagens}
			<tr>
				<td>{usuarioNome}</td>	
				<td>{mensagemBody}</td>
				<td>{mensagemData}</td>
				<td><a href="buscaArtefato/{mensagemID}" class='icon-edit'> <a/></td>
				<td><a onclick='RemoveArtefato("{mensagemID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
			</tr>
			{/mensagens}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir a Mensagem ?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>

<!-- FIM -->
<script type="text/javascript">

	function RemoveArtefato(id){

		document.getElementById("Excluir");
		document.getElementById('Excluir').href="deleteMensagem/"+id;

	}	

</script>
