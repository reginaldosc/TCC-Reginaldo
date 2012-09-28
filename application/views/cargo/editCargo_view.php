
	<div class="container">
	
		<div class="page-header">
			<h2>
				Edição <small> de Cargo</small>
			</h2>
		</div>
		
		<?php
			$atributos = array('form class'=>'form-horizontal',  'id'=>'FormCadastro', 'method'=>'POST');
			echo form_open('cargo/editCargo', $atributos); 
		?>
		
			<fieldset>
				{cargo}
				
				<div class="control-group">					
				<div class="controls">
					<input type="hidden" class="input-xlarge" id="ID" value='{cargoID}' name="ID">
				</div>
				</div>
				
				<div class="control-group">
					<label class="control-label" for="">Nome</label>
				<div class="controls">
					<input type="text" class="input-xlarge" id="Nome" value='{cargoNome}' name="Nome" rel="popover" 
					data-content="Deve ter no minimo 6 caracteres e no maxímo 45 caracteres." data-original-title="Nome" value="" autocomplete="off">
				</div>
				</div>

				{/cargo}
		
				<div class="form-actions">
					<button type="submit" class="btn btn-primary">Salvar</button>
					<button class="btn">Limpar</button>
				</div>
			</fieldset>


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

