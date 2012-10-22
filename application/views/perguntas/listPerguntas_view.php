<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
		<h2>Lista<small> de Perguntas</small></h2>
	</div>
	<br>

	<!-- Adicionar nova unidade -->
	<a href="newPerguntas" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Nova Pergunta </a>
	<br>
	<br>

	<!-- Tabela com a lista das unidades do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Artefato</th>
				<th>Pergunta</th>
				<th>Ativo</th>
				<th>Editar</th>
				<th>Excluir</th>
			</tr>
		</thead>
				
		<tbody>
			{perguntas}
			<tr>	
				<td>{artefatoNome}</td>
				<td>{artefatoPergunta}</td>
				<td>{perguntaAtivo}</td>
				<td><a href="buscaPerguntas/{perguntasID}" class='icon-edit'> <a/></td>
				<td><a onclick="RemovePergunta('{perguntasID}')" data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
			</tr>
			{/perguntas}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir a Pergunta?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>

<!-- FIM -->

<script type="text/javascript">

function RemovePergunta(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deletePerguntas/"+id;

}	

</script>


