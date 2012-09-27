
	<div class="container">

		<form class="form-horizontal">
			<fieldset>
				<legend>Editar</legend>

				<div class="control-group">
					<label class="control-label" for="input01">Nome</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01" value=''>
					</div>
				</div>

				<div class="control-group">
					<label class="control-label" for="input01">E-mail</label>
					<div class="controls">
						<input type="text" class="input-xlarge" id="input01" value=''>
					</div>
				</div>

			{cargo}	
				<div class="control-group">
					<label class="control-label" for="select01">Funcao</label>
					<div class="controls">
						<select id="select01">
							<option>Analista</option>
							<option>Engenheiro</option>
							<option>Tecnico</option>
							<option>Supervisor</option>
							<option>Gerente</option>
						</select>
					</div>
				</div>
			{/cargo}
			
			{unidade}
				<div class="control-group">
					<label class="control-label" for="select01">Unidade</label>
					<div class="controls">
						<select id="select01">
							<option>ISOL</option>
							<option>ICORP</option>
							<option>INET</option>
							<option>ISEC</option>
						</select>
					</div>
				</div>
			{/unidade}
				
			{departamento}
				<div class="control-group">
					<label class="control-label" for="select01">Departamento</label>
					<div class="controls">
						<select id="select01">
							<option>SIP e REDE</option>
							<option>UC</option>
							<option>Grandes Sistemas</option>
						</select>
					</div>
				</div>
			{/departamento}
				
			{tipo}
				<div class="control-group">
					<label class="control-label" for="select01">Tipo de usuario</label>
					<div class="controls">
						<select id="select01">
							<option>Auditor</option>
							<option>Administrador</option>
							<option>Supervisor</option>
						</select>
					</div>
				</div>
			{/tipo}
				
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button class="btn">Limpar</button>
				</div>
			</fieldset>
		</form>


	<!-- FIM estrutura -->

	<!-- Le javascript
    ================================================== -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?=base_url();?>js/jquery.js"></script>
	<script src="<?=base_url();?>js/bootstrap-transition.js"></script>
	<script src="<?=base_url();?>js/bootstrap-alert.js"></script>
	<script src="<?=base_url();?>js/bootstrap-modal.js"></script>
	<script src="<?=base_url();?>js/bootstrap-dropdown.js"></script>
	<script src="<?=base_url();?>js/bootstrap-scrollspy.js"></script>
	<script src="<?=base_url();?>js/bootstrap-tab.js"></script>
	<script src="<?=base_url();?>js/bootstrap-tooltip.js"></script>
	<script src="<?=base_url();?>js/bootstrap-popover.js"></script>
	<script src="<?=base_url();?>js/bootstrap-button.js"></script>
	<script src="<?=base_url();?>js/bootstrap-collapse.js"></script>
	<script src="<?=base_url();?>js/bootstrap-carousel.js"></script>
	<script src="<?=base_url();?>js/bootstrap-typeahead.js"></script>

