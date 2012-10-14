<!-- Navbar
================================================== -->
<div class="navbar navbar-inverse navbar-fixed-top">
  	<div class="navbar-inner">
    	<div class="container">

	    	<!-- .btn-navbar is used as the toggle for collapsed navbar content -->
	      	<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	        	<span class="icon-bar"></span>
	      	</a>

			<div class="btn-group pull-right">
				
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
					
					<?php $usuario = $this->session->userdata('usuarioLogin');?>
					
					<i class="icon-user"> </i> <?php echo $usuario ?> <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<input type="hidden" class="input-xlarge" id="login" value='{usuarioLogin}' name="login">
					<li><?php echo anchor("usuario/pageUser/$usuario",'Perfil');?></li>
					<li class="divider"></li>
					<li><?php echo anchor('login/logout','Sair');?></li>
					
				</ul>
			</div>



          	<div class="nav-collapse">
            	
            	<ul class="nav">
              		
					<li><?php echo anchor('app/home','Home');?></li>

					<li><?php echo anchor('auditoria/listAll','Auditoria');?></li>
					
					<li><?php echo anchor('nc/listAll','Não Conformidade');?></li>

					<li><?php echo anchor('ac/listAll','Acão Corretiva');?></li>
									
					<li class="dropdown">
						
						<a class="dropdown-toggle" href="#">Cadastro </a>
						
						<ul class="dropdown-menu">
							
							<li><?php echo anchor('artefato/listAll','Artefato');?></li>
							
							<li><?php echo anchor('cargo/listAll','Cargo');?></li>

							<li><?php echo anchor('departamento/listAll','Departamento');?></li>
							
							<li><?php echo anchor('projeto/listAll','Projeto');?></li>
  
							<li><?php echo anchor('unidade/listAll','Unidade');?></li>

							<li><?php echo anchor('usuario/listAll','Usuário');?></li>
						</ul>
					</li>
					
					<a href="<?php echo site_url()?>/mensagem/listAll" class="btn btn-inverse"> <i class="icon-envelope icon-white"></i></a>
					
				</ul>
			</div>

		</div>
	</div>
</div>
