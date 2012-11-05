
<!-- Estrutura -->
<div class="container">

	<br>
	<div class="page-header">
			<h2>
				Execução <small> de Auditoria</small>
			</h2>
	</div>
	<br>
	
	<form class="form-horizontal" id="FormCadastro" method="POST" action="../cadastrarExecAuditoria">  
			
			<fieldset>

			<div class="control-group">
					<label class="control-label" for="">Auditor</label>
					<div class="controls">
			{auditorias}
						<input type="hidden" id="Auditoria" name="Auditoria" value="{auditoriaID}">
						<input class="input-xlarge" id="disabledInput" type="text" value="{usuarioNome}" disabled>
						
					</div>
			</div>
				
			<div class="control-group">
				<label class="control-label" for="">Unidade</label>
				<div class="controls">
						
						<input class="input-xlarge" id="disabledInput" type="text" value="{unidadeNome}" disabled>
						
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Departamento</label>
				<div class="controls">
						<input class="input-xlarge" id="disabledInput" type="text" value="{departamentoNome}" disabled>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Projeto</label>
				<div class="controls">
						<input type="hidden" name="Projeto" value="{projetoID}">
						<input class="input-xlarge" id="disabledInput" type="text" value="{projetoNome}"  disabled>
				</div>
			</div>


			<div class="control-group">
				
				<label class="control-label" for="">Data agendada</label>
				<div class="controls">
					
					<input type="datetime" class="input-xlarge" id="disabledInput" value="{auditoriaDataInicio}" disabled>
							
				</div>
			</div>

			{/auditorias}

			<div class="control-group">
				<label class="control-label" for="">Acompanhante</label>
				<div class="controls">
					<select id="Acompanhante" name="Acompanhante" class="input-xlarge">						
						{usuarios}		
						<option value="{usuarioID}"> {usuarioNome} </option>
						{/usuarios}						
				    </select>
				</div>
			</div>								
			
		<table class='table table-bordered table-striped'>
		<thead>
			<tr>
				<th>Artefato</th>
				<th>Resultado</th>					
			</tr>
		</thead>
				
		<tbody>
	
			{artefatos}
			<tr>	
			    <td>
			    	<dl>
			    		<dt>
			    			<strong>{artefatoNome}</strong>
			    		</dt>	    	   	
			    		
			    	</dl>
			    </td>
			    
				<td> 
					<dl>
						<dt>
							
						</dt>
						{perguntas}
						<dd>
							{artefatoPergunta}
							
							<br>
						    <label class="radio inline">
								<input type="radio" name="{perguntasID}" id="{artefatoID}" value="4" checked="">
								<p class="label label-info">Não Aplicável</p>
							</label>

							<label class="radio inline">
								<input type="radio" name="{perguntasID}" id="{artefatoID}" value="5">
								<p class="label label-success">Conforme</p>
							</label>

							<label class="radio inline">
								<input type="radio" name="{perguntasID}" id="{artefatoID}" value="6">
								<p class="label label-important">Não Conforme</p>
							</label>
						</dd>
						{/perguntas}
					</dl>
				</td>
			</tr>
			{/artefatos}

		</tbody>
	</table>

			<!-- Esse input será usado para enviar um array com todos os artefatos ao controller com seus respectivos Status -->
			<input type="hidden" id="allArtefatos" name="allArtefatos" value="" >
			
			<div class="form-actions">
				<button type="submit" OnClick='PegaChecked()' class="btn btn-primary">Salvar</button>
				<button class="btn"  type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>


<!-- Modal de cadastro de Nao conformidade --> 
<div class="modal hide" id="NCmodal">
		
		<div class="modal-header">
		
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Cadastro de Não Conformidade</h3>
		</div>

		<!--  Mensagem -->
		
		<!-- Cadastro efetuado com sucesso -->
		<div class="alert hide alert-success" id="alert-msg">
				<p> NC cadastrada com sucesso !</p>
		</div>
		
		<!-- Cadastro Error -->
		<div class="alert hide alert-error" id="alert-msg-error">
				<p> Não foi possivel cadastrar NC !</p>
		</div>
		<!-- Fim msg -->  

		<div class="modal-body">
		
			<!-- Artefato que será inserido via jquery -->
			<input type="hidden" id="Artefato" name="" value="">
			<!-- Fim  -->
			
			<div class="control-group">
				<label class="control-label" for="">Descrição</label>
				<div class="controls">
						<input class="input-xlarge" id="Descricao" name="Descricao" type="text" autocomplete="off" placeholder="Informe uma descrição">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Data Final Prevista</label>
				<div class="controls">
						<input class="input-xlarge"type="text" placeholder="Informe uma data" autocomplete="off" data-date-format="dd/mm/yyyy" id="Data" name="Data">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Comentário</label>
				<div class="controls">
						<input class="input-xlarge" id="Comentario" autocomplete="off" placeholder="Adicione mais informações." type="text">
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="">Responsável</label>
				<div class="controls">
					<select id="Responsavel" name="Responsavel" class="input-xlarge">						
						{usuarios}		
						<option value="{usuarioID}"> {usuarioNome} </option>
						{/usuarios}						
				    </select>
				</div>
			</div>	
			
		</div>

		<div class="modal-footer">
			<button class="btn" id="submit_voltar" data-dismiss="modal" aria-hidden="true">Voltar</button>
			<button class="btn btn-danger" id="submit_nc"type="submit">Enviar</button>
	 	</div>

</div> <!-- Fim Modal NC -->  

<!-- FIM -->


<script type="text/javascript">

// Analisa todos os radio selecionados, gera um array com os mesmos //	
function PegaChecked()
{
	
	var aux = 0;

	var name = document.getElementsByTagName("input");
	var array_produtos = new Array();
	
	for(var i=0; i < name.length; i++){
		
		if (name[i].checked == true) {
			array_produtos[aux] = name[i].id + '-' + name[i].value + '-' + name[i].name;
			aux++;	
		}
	
	}
	document.getElementById("allArtefatos").value = array_produtos;
}

</script>

