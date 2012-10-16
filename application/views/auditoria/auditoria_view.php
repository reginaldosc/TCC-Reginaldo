
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Visualização <small> de Auditoria</small>
			</h2>
	</div>

			
		{auditorias}

			<strong> Auditor: </strong> {usuarioNome}
			<br><br>
	
			<strong> Unidade: </strong> {unidadeNome}
			<br><br>			
			
			<strong> Departamento: </strong> {departamentoNome}
			<br><br>

			<strong> Projeto: </strong> {projetoNome}
			<br><br>

			<strong> Data agendada: </strong> {auditoriaDataInicio}
			<br><br>

			<strong> Data da execução: </strong> {auditoriaDataInicio}
			<br><br>
		{/auditorias}

		{acompanhante}

			<strong> Acompanhante: </strong> {usuarioNome}
			<br>
			<br>
		{/acompanhante}
<br>
			<table class='table table-bordered table-striped'>
				<thead>
					<tr>
						<th>Artefato</th>
						<th>Resultado</th>			
						
					</tr>
				</thead>
			
			{projetos_artefatos}
				<tbody>
					<tr>	
				   	 	<td> <strong> {artefatoNome} </strong> </td>
					
						<td> <span id="status" class="label label-{statusCode}"> {statusNome} </span> </td>
					</tr>

				</tbody>

			{/projetos_artefatos}
			</table>


<!-- FIM -->
