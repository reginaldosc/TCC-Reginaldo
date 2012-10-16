
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Visualização <small> de Ação Corretiva</small>
			</h2>
	</div>

	<div class="row">
	  
	  <div class="span4">
	  	{acs}
			<h3> Dados da Ação Corretiva</h3>
			<br>
			<strong> Ação: </strong> {acAcao}
			<br>
			<br>
			
			<strong> Descrição: </strong> {acDescricao}
			<br>
			<br>
			
			<strong> Status: </strong> <td><span id="status" class="label label-{statusCode}"> {statusNome} </span></td>
			<br>
			<br>
			
		{/acs}

	  	{acompanhante}
			<strong> Responsável: </strong> {usuarioNome}
			<br>
			<br>
		{/acompanhante}
		
	  </div>
	  
	  <div class="span8">
	  	
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
	</div>
		

	<br><br><br><br><br><br><br><br>
	

<!-- FIM -->
