<!-- Estrutura -->
<div class="container">

	<br>

	<!-- Buscador -->
	<form class="well form-search">
		<input type="text" class="input-xlarge search-query">
		<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
	</form>

	<br>
	<?php 
		
		$msg = $this->session->userdata('msg');
		
		if (!empty($msg))
			echo "<div class='alert alert-error'> $msg </div>";
		
		$this->session->unset_userdata('msg');
	?>	
	<br>

	<!-- Tabela com a lista dos usuarios do sistema -->
	<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Item Não conforme</th>
				<th>Não conformidade</th>
				<th>Data prevista</th>
				<th>Status</th>
				<th>Visualizar</th>
				<th>Editar</th>
				
				
			</tr>
		</thead>
				
		<tbody>
			{ncs}
			<tr>	
				<td>{artefatoNome}</td>
				<td>{ncDescricao}</td>
				<td>{ncDataFinalprev}</td>
				<td><span id="status" class="label label-{statusCode}">{statusNome}</span></td>
				<td><a href="visualizarNc/{ncID}" class='icon-eye-open'><a/></td>
				<td><a href="buscarNc/{ncID}" class='icon-edit'><a/></td>
				

			</tr>
			{/ncs}
		</tbody>
	</table>
	<br>


