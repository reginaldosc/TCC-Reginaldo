
<!-- Estrutura -->
 <div class="container">

 	<div class="page-header">
 		<h2>
 			Perfil <small> do Usuário</small>
 		</h2>
 	</div>
  
<div class="span12">

	<div class="row">

	<ul class="thumbnails">
  	
  	<li class="span">
    <div class="thumbnail" align = "center">
      <img src="<?php echo base_url();?>img/user.jpg"  alt="">
{usuario} 
		{tipo}    
      		<p><small>{tipoNome}</small></p>
      	{/tipo}
    </div>
  	</li>

  	<li class="span">
      
      <h3>{usuarioNome}</h3>
      	<br>
			
      		<h4>Email: <small> {usuarioEmail}</small></h4>

 			<h4>Matricula: <small> {usuarioMatricula}</small></h4>

 			<h4>Login: <small> {usuarioLogin}</small></h4>

 		 	<h4>Senha: <small> {usuarioPassword}</small></h4>
 		<br>
 		 	<button class="btn btn-warning">Alterar a senha</button>
 	</li>
	</ul>

	</div>
{/usuario}
</div>	
	<br>

<!-- javascript -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="<?php echo base_url();?>js/jquery.js"></script>
<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-tooltip.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-popover.js"></script>
<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
<script src="<?php echo base_url();?>js/valida.js"></script>