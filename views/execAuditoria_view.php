
<!-- Estrutura -->
<div class="container">

	<div class="page-header">
			<h2>
				Execução <small> de Auditoria</small>
			</h2>
	</div>

	<?php
	$attributes = array('class' => 'form-horizontal', 'id' => 'FormCadastro');
	 echo form_open('auditoria/cadastrarExecAuditoria', $attributes); 
	?>
  
			
			<fieldset>
			<!--{auditorias}-->

			<div class="control-group">
					<label class="control-label" for="">Index</label>
					<div class="controls">			
						<input class="input-xlarge" id="disabledInput" type="text" placeholder="{auditoriaID}" name="Index" disabled>					
					</div>
				</div>					
	
				<div class="control-group">
					<label class="control-label" for="">Auditor</label>
					<div class="controls">
			
						<input class="input-xlarge" id="disabledInput" type="text" placeholder="{usuarioNome}" name="Auditor" disabled>
						
					</div>
				</div>
				
			<div class="control-group">
				<label class="control-label" for="">Unidade</label>
				<div class="controls">
						
						<input class="input-xlarge" id="disabledInput" type="text" placeholder="{unidadeNome}" name="Unidade" disabled>
						
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="">Departamento</label>
				<div class="controls">
						<input class="input-xlarge" id="disabledInput" type="text" placeholder="{departamentoNome}" name="Departamento" disabled>
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Projeto</label>
				<div class="controls">
						<input class="input-xlarge" id="disabledInput" type="text" placeholder="{projetoNome}" name="Projeto" disabled>
				</div>
			</div>


				<div class="control-group">
				<label class="control-label" for="">Data Execução</label>
				<div class="controls">					
					<input type="datetime" class="input-xlarge" id="disabledInput" placeholder="" name="Data" rel="popover" 
					data-content="" data-original-title="Data" value= {auditoriaDataInicio} autocomplete="off" disabled>
							
			</div>
			</div>

			<!--{/auditorias}-->
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
				<!---<th>Não Conformidade</th>
				<th>Ação Corretiva</th>	--->			
			</tr>
		</thead>
				
		<tbody>
	
			{artefatos}
			<tr>	
			    <td><strong>{artefatoNome}</strong></td>
				<td>   				    
					<label class="radio inline">
					<input type="radio" name="optionsRadios{artefatoID}" id="optionsRadios1" value="option1">
					<p class="label label-info" name="statusArtefato{artefatoID}">Não Aplicável</p>
					</label>

					<label class="radio inline">
					<input type="radio" name="optionsRadios{artefatoID}" id="optionsRadios2" value="option2">
					<p class="label label-success" name="statusArtefato{artefatoID}">Conforme</p>
					</label>

					<label class="radio inline">
					<input type="radio" name="optionsRadios{artefatoID}" id="optionsRadios3" value="option3">
					<p class="label label-important" name="statusArtefato{artefatoID}">Não Conforme</p>
					</label>
				</td>
				<!--<td><a href="visuNC/{ncID}" class='icon-list-alt'> <a/></td>
				<td><a href="visuAC/{acID}" class='icon-list-alt'> <a/></td>-->
			</tr>
			{/artefatos}

		</tbody>
	</table>

			<div class="form-actions">
				<button type="submit" class="btn btn-primary">Salvar</button>
				<button class="btn" type="reset">Limpar</button>
			</div>
	
		</fieldset>
	</form>



<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>js/valida.js"></script>
