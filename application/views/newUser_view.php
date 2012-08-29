
	<!-- Estrutura -->
	<div class="container">

		<div class="page-header">
 			<h2>
 				Cadastro <small> de novo usuário</small>
 			</h2>
 		</div>

		<form class="form-horizontal" id="FormCadastro" method="POST" action="cadastrarUser">  
  			
  			<fieldset>

				<div class="control-group">
					<label class="control-label" for="">Nome</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="Nome" placeholder="Nome completo" name="Nome" rel="popover" 
						data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres." data-original-title="Nome" value="" autocomplete="off">
					</div>
				</div>

				
				<div class="control-group">
					<label class="control-label" for="">Matrícula</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="Matricula" placeholder="Informe a matrícula do usuário" name="Matricula" rel="popover" 
						data-content="Deve possuir 6 números." data-original-title="Matricula" value="" autocomplete="off">
					</div>
				</div>		


				<div class="control-group">
					<label class="control-label" for="">E-mail</label>
					<div class="controls">
						<input type="email" class="input-xlarge" id="Email" placeholder="Informe o e-mail do usuário" name="Email" rel="popover"
						data-content="Informe seu endereco de e-mail" data-original-title="E-mail" value="" autocomplete="off">
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="">Função</label>
					<div class="controls">
						<select id=""  name="Cargo" class="input-xlarge">
							{cargos}		
							<option value="{roleID}"> {roleName} </option>
							{/cargos}
					    </select>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="">Departamento</label>
					<div class="controls">
						<select id="" class="input-xlarge" >
							
							<option>ISOL</option>
							<option>INET</option>
							
					    </select>
					</div>
				</div>


				<div class="control-group">
					<label class="control-label" for="">EAG</label>
					<div class="controls">
						<select id="" name="Setor" class="input-xlarge">
							
							{eags}		
							<option value="{eagID}"> {eagName} </option>
							{/eags}
							
					    </select>
					</div>
				</div>
				

				<div class="control-group">
					<label class="control-label" for="">Tipo de usuário</label>
					<div class="controls">
						<select id="" name="Tipo"class="input-xlarge">
							
							{tipos}		
							<option value="{typeID}"> {typeName} </option>
							{/tipos}
							
					    </select>
					</div>
				</div>				
				

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


