<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
		<h2>Listagem <small> de Não Conformidades</small></h2>
	</div>
	<br>


	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Item não conforme</th>
				<th>Não conformidade</th>
				<th>Data Prev. Finalização</th>
				<th>Data Real. Finalização</th>
				<th>Status</th>
				<th>Visualizar</th>
						
			</tr>
		</thead>
				
		<tbody>
			{ncs}
			<tr>	
				<td>{artefatoNome}</td>
				<td>{ncDescricao}</td>
				<td>{ncDataFinalprev}</td>
				<td>{ncDataFinal}</td>
				<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>
				<td><a href="visualizarNc/{ncID}" class='icon-eye-open'><a/></td>
				

			</tr>
			{/ncs}
		</tbody>
	</table>
	<br>


