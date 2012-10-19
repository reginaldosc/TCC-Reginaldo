<!-- Estrutura -->
<div class="container">

		<br>	
		<div class="page-header">
			<h2>
				Listagem <small> de Não Conformidades</small>
			</h2>
		</div>
		<br>
		
		<?php 
			$msg2 = $this->session->userdata('msgOK');
			if (!empty($msg2))
			{
				echo "<div class='alert alert-success'> $msg2 </div>";
			}
			$this->session->unset_userdata('msgOK');
		?>
		
		<?php 
		
			$msg = $this->session->userdata('msg');
			if (!empty($msg))
			{
				echo "<div class='alert alert-error'> $msg </div>";
			}
			$this->session->unset_userdata('msg');
		?>	
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
				<th>Cadastrar Ação Corretiva</th>
				
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
				<td><a href="../ac/newAC/{ncID}"  class='icon-plus'><a/></td>

			</tr>
			{/ncs}
		</tbody>
	</table>
	<br>


<div class="modal hide" id="myModal">
		<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Excluir</h3>
		</div>

		<div class="modal-body">
		<p>Deseja realmente excluir a Não Conformidade ?</p>
		</div>

		 <div class="modal-footer">
		<a href="" class="btn" data-dismiss="modal">Não</a>
		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
	 	</div>
</div>


<!-- FIM -->

<script type="text/javascript">

function RemoveNc(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="deleteNc/"+id;

}	

</script>


