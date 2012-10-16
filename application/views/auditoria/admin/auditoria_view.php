
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Visualização <small> de Auditoria</small>
			</h2>
	</div>

			
		{auditorias}

			<strong> Auditor: </strong> {usuarioNome}
			<br>

			<strong> Unidade: </strong> {unidadeNome}
			<br>			
			
			<strong> Departamento: </strong> {departamentoNome}
			<br>

			<strong> Projeto: </strong> {projetoNome}
			<br>

			<strong> Data agendada: </strong> {auditoriaDataInicio}
			<br>

			<strong> Data da execução: </strong> {auditoriaDataInicio}
			<br>
		{/auditorias}

		
		{acompanhante}

			<strong> Acompanhante: </strong> {usuarioNome}
			<br>
			<br>
		{/acompanhante}

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