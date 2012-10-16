<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	
	<?php 
		
		$msg = $this->session->userdata('msg');
		
		if (!empty($msg))
			echo "<div class='alert alert-error'> $msg </div>";
		
		$this->session->unset_userdata('msg');
	?>

	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Auditor</th>
				<th>Unidade</th>
				<th>Departamento</th>
				<th>Projeto</th>
				<th>Data agendada</th>
				<th>Status</th>
				<th>Executar</th>
				<th>Visualizar</th>
				
			</tr>
		</thead>
				
		<tbody>
			{auditorias}
			<tr>	
				<td>{usuarioNome}</td>
				<td>{unidadeNome}</td>
				<td>{departamentoNome}</td>
				<td>{projetoNome}</td>
				<td>{auditoriaDataInicio}</td>
				<td><span id="status" value="statusNome}" class="label label-{statusCode}">{statusNome}</span></td>
				<td><a href="execAuditoria/{auditoriaID}"  class='icon-play'> <a/></td>
				<td><a href="visualizarAuditoria/{auditoriaID}" class='icon-eye-open'> <a/></td>
				
			</tr>
			{/auditorias}
		</tbody>
	</table>
	<br>
