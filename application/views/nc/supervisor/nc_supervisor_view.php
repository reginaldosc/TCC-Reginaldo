
<!-- Estrutura -->
<div class="container">


	<div class="page-header">
			<h2>
				Visualização <small> de Não Conformidade</small>
			</h2>
	</div>

	<div class="row">
	  
	  <div class="span4">
	  	{ncs}
			<h3> Dados da Não Conformidade</h3>
			<br>
			<strong> Item Não Conforme: </strong> {artefatoNome}
			<br>
			<br>
			
			<strong> Prazo para Finalização: </strong> {ncDataFinalprev}
			<br>
			<br>
			
			<strong> Não Conformidade: </strong> {ncDescricao}
			<br>
			<br>
						
			<strong> Comentário: </strong> {ncComentario}
			<br>
			<br>
			
		{/ncs}

	  </div>

	  <div class="span8">
	  	{auditorias}
			<h3> Dados da Auditoria </h3>
			<br>
			
			<strong> Unidade: </strong> {unidadeNome}
			<br>
			<br>

			<strong> Departamento: </strong> {departamentoNome}
			<br>
			<br>
			
			<strong> Projeto: </strong> {projetoNome}
			<br>
			<br>
		
		{/auditorias}

		{acompanhante}

			<strong> Acompanhante: </strong> {usuarioNome}
			<br>
			<br>
		{/acompanhante}

	  </div>
	</div>
	<br>	
	<?php 
		
		$msg = $this->session->userdata('msg');
		
		if (!empty($msg))
			echo "<div class='alert alert-error'> $msg </div>";
		
		$this->session->unset_userdata('msg');
	?>
	<br>
	<h4> Ações Corretivas</h4>
	<br>

	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Ação</th>
				<th>Data Realizada</th>
				<th>Status</th>
				<th>Visualizar</th>
			</tr>
		</thead>
				
		<tbody>
			{acs}
			<tr>
				<td>{acAcao}</td>	
				<td>{acDataFinal}</td>
				<td><span id="status" class="label label-{statusCode}"> {statusNome} </span></td>
				<td><a href="../../ac/visualizarAc/{acID}" class='icon-eye-open'></a></td>
			</tr>
			{/acs}
		</tbody>
	</table>
	<br>


<!-- FIM -->
