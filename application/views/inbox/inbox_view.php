<!-- Estrutura -->
<div class="container">

	<br>
	<br>

	<div class="">

		<ul class="nav nav-tabs">
			<li><a href="#lA" data-toggle="tab">Nova Mensagem</a></li>
			<li class="active"><a href="#lB" data-toggle="tab">Recebidas</a></li>
		</ul>

 		<!-- Nova Mensagem -->
      	<div class="tab-content">
        <div class="tab-pane" id="lA">

        	<br>

          	<form class="form-horizontal" id="FormCadastro" method="POST" action="sendEmail">  
			
				<fieldset>
					
					<div class="control-group">
						<label class="control-label" for="">Para:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="" placeholder="E-mail" name="Email" rel="popover" 
							data-content="Informe o e-mail do usuário." data-original-title="E-mail" value="" autocomplete="off">
						</div>
					</div>
					

					<div class="control-group">
						<label class="control-label" for="">Assunto:</label>
						<div class="controls">
							<input type="text" class="input-xlarge" id="" placeholder="Assunto" name="Assunto" rel="popover" 
							data-content="Informe o assunto a ser tratado." data-original-title="Assunto" value="" autocomplete="off">
						</div>
					</div>
								
					<div class="control-group">
						<label class="control-label" for="">Mensagem:</label>
						<div class="controls">
							<textarea class="span5" rows="8" type="text" name="Mensagem"  placeholder="Sua mensagem"></textarea>
						</div>
					</div>				
					

					<div class="form-actions">
						<button type="submit" class="btn btn-primary">Enviar</button>
						<button class="btn" type="reset">Limpar</button>
					</div>
			
				</fieldset>
			</form>


        </div>


	    <!-- Mensagens Recebidas -->
	    <div class="tab-pane active" id="lB">
	        	
	    	<br>

			<table class='table table-bordered table-striped'>
				<thead>
					<tr>
						<th>Remetente</th>
						<th>Destinatario</th>
						<th>Assunto</th>
						<th>Data</th>
						<th>Excluir</th>
					</tr>
				</thead>
							
				<tbody>
					{mensagens}
						<tr>
							<td>{usuarioNome}</td>
							<td>{destinatarioID}</td>
							<td>{mensagemAssunto}</td>	
							<td>{mensagemData}</td>
							<td><a onclick='RemoveArtefato("{mensagemID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
						</tr>
					{/mensagens}
				</tbody>
			</table>

		</div>

      	</div>
  	</div>

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
