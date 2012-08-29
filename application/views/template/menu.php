<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse"> <span class="icon-bar"></span> <span
				class="icon-bar"></span> <span class="icon-bar"></span>

			</a> <a class="brand" href="#"> RG</a>
			<div class="btn-group pull-right">
				
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
					
					<?php $usuario = $this->session->userdata('userLogin'); ?>
					
					<i class="icon-user"> </i> <?php echo $usuario ?> <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><?php echo anchor('app/pageUser','Perfil');?></li>
					<li class="divider"></li>
					<li><?php echo anchor('login/logout','Sair');?></li>
				</ul>
			</div>



			<div class="nav-collapse">
				<ul class="nav">

					<li class="">
						<?php echo anchor('app/home','Home');?>
					</li>

					<li class="">
						<?php echo anchor('app/listUser','Usuário');?>
					</li>
					
					<li class="dropdown"><a class="dropdown-toggle" href="#">Auditoria</a>
						<ul class="dropdown-menu">
							<li><a href="#">Cadastrar</a></li>
							<li><a href="#">Visualizar</a></li>
							<li><a href="#">Executar</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Excluir</a></li>

						</ul>
					
					<li class="dropdown"><a class="dropdown-toggle" href="#">Processo</a>
						<ul class="dropdown-menu">
							<li><a href="#">Cadastrar</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Excluir</a></li>

						</ul>
					
					<li class="dropdown"><a class="dropdown-toggle" href="#">Fase</a>
						<ul class="dropdown-menu">
							<li><a href="#">Cadastrar</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Excluir</a></li>

						</ul>
					
					<li class="dropdown"><a class="dropdown-toggle" href="#">Nao
							Conformidade</a>
						<ul class="dropdown-menu">
							<li><a href="#">Cadastrar</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Excluir</a></li>

						</ul>
					
					<li class="dropdown"><a class="dropdown-toggle" href="#">Altefato</a>
						<ul class="dropdown-menu">
							<li><a href="#">Cadastrar</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Excluir</a></li>

						</ul>
					
					<li class="dropdown"><a class="dropdown-toggle" href="#">Acao
							corretiva</a>
						<ul class="dropdown-menu">
							<li><a href="#">Cadastrar</a></li>
							<li><a href="#">Editar</a></li>
							<li><a href="#">Excluir</a></li>

						</ul>
				
				</ul>
			</div>
			<!--/.nav-collapse -->

		</div>
	</div>
</div>

