
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Execução <small> de Auditoria</small>
			</h2>
	</div>

	<form class="form-horizontal" id="FormCadastro" method="POST" action="../cadastrarExecAuditoria">  
			
			<fieldset>

			<div class="control-group">
					<label class="control-label" for="">Auditor</label>
					<div class="controls">
			{auditorias}
						<input type="hidden" name="Auditoria" value="{auditoriaID}">
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
				
				<label class="control-label" for="">Data Execução</label>
				<div class="controls">
					
					<input type="datetime" class="input-xlarge" id="disabledInput" value="{auditoriaDataInicio}" disabled>
							
				</div>
			</div>

			{/auditorias}

			<div class="control-group">
				<label class="control-label" for="">Acompanhante</label>
				<div class="controls">
					<select id="" name="Acompanhante" class="input-xlarge">						
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
			    <td><strong>{artefatoNome}</strong></td>
				<td> 

					<label class="radio inline">

						<input type="radio" name="artefato{artefatoID}" id="{artefatoID}" value="4" checked="">
						<p class="label label-info">Não Aplicável</p>
					</label>

					<label class="radio inline">
						<input type="radio" name="artefato{artefatoID}" id="{artefatoID}" value="5">
						<p class="label label-success">Conforme</p>
					</label>

					<label class="radio inline">
						<input type="radio" name="artefato{artefatoID}" id="{artefatoID}" value="6" onclick='cadastraNC("{auditoriaID}")' data-toggle="modal" href="#NCmodal">
						<p class="label label-important">Não Conforme</p>
					</label>
				
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

		<div class="modal-body">
			
			<div class="control-group">
				<label class="control-label" for="">Descrição</label>
				<div class="controls">
						<input class="input-xlarge" id="" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Data Final Prevista</label>
				<div class="controls">
						<input class="input-xlarge" id="" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Comentário</label>
				<div class="controls">
						<input class="input-xlarge" id="" type="text" value="">
				</div>
			</div>

		</div>

		<div class="modal-footer">
			<a href="" class="btn" data-dismiss="modal">Voltar</a>
			<a href="" class="btn btn-danger" id="Excluir">Cadastrar NC</a>
	 	</div>

</div> <!-- Fim Modal NC -->  

<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-alert.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-modal.js"></script>
<script src="<?php echo base_url();?>js/valida.js"></script>


<script type="text/javascript">

// Analisa todos os radio selecionados, gera um array com os mesmos //	
function PegaChecked()
{
	
	var aux = 0;

	var name = document.getElementsByTagName("input");
	var array_produtos = new Array();
	
	for(var i=0; i < name.length; i++){
		
		if (name[i].checked == true) {
			array_produtos[aux] = name[i].id + '-' + name[i].value;
			aux++;	
		}
	
	}
	document.getElementById("allArtefatos").value = array_produtos;
}

// Chama modal para cadastro de NC //
function cadastraNC(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="Teste"+id;

}	
</script>

