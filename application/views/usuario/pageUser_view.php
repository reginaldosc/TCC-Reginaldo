
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
      <img src="<?php echo base_url();?>img/users.jpg"  alt="">
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
 		 	<button class="btn btn-warning" onclick='mudaSenha("{usuarioID}")' data-toggle="modal" href="#mudaSenhamodal">Alterar a Senha </button>
 	</li>
	</ul>

	</div>
{/usuario}
</div>	
	<br>

	
	<!-- Modal de cadastro de Nao conformidade --> 

<div class="modal hide" id="mudaSenhamodal">

<form class="form-horizontal" id="FormCadastro" method="POST" action="../mudaSenha">

		<div class="modal-header">
		
		<button type="button" class="close" data-dismiss="modal">×</button>
			<h3>Alteração de Senha</h3>
		</div>

		<div class="modal-body">
			
			<div class="control-group">
				<label class="control-label" for="">Senha Atual</label>
				<div class="controls">
						<input class="input-xlarge" id="" type="text" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Senha Nova</label>
				<div class="controls">
						<input class="input-xlarge" id="" type="password" value="">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="">Repetir Senha</label>
				<div class="controls">
						<input class="input-xlarge" id="senha" type="password" value="{usuarioPWD}" name="senha">
				</div>
			</div>

		</div>

		<div class="modal-footer">
			<a href="" class="btn" data-dismiss="modal">Voltar</a>
			<a href="" class="btn btn-danger" id="Excluir">Salvar</a>
	 	</div>

	 	</form>
</div> <!-- Fim Modal NC -->  
	
		
<!-- FIM -->



<script type="text/javascript">

// Chama modal para cadastro de NC //
function mudaSenha(id){

	document.getElementById("Excluir");
	document.getElementById('Excluir').href="../mudaSenha/"+id;

}	
</script>
