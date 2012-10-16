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
					
					<?php 

						$usuario = $this->session->userdata('usuarioLogin');
					?>
					
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
					
										
					<a href="<?php echo site_url()?>/inbox/listAll" class="btn btn-inverse"> <i class="icon-envelope icon-white"></i></a>
					
				</ul>
			</div>

		</div>
	</div>
</div>
