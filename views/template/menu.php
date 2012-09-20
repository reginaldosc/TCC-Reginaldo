<div class="navbar navbar-fixed-top">
	<div class="navbar-inner">
		<div class="container">
			<a class="btn btn-navbar" data-toggle="collapse"
				data-target=".nav-collapse"> <span class="icon-bar"></span> <span
				class="icon-bar"></span> <span class="icon-bar"></span>

			<div class="btn-group pull-right">
				
				<a class="btn dropdown-toggle" data-toggle="dropdown" href="#"> 
					
					<?php $usuario = $this->session->userdata('usuarioLogin'); ?>
					
					<i class="icon-user"> </i> <?php echo $usuario ?> <span class="caret"></span>
				</a>
				<ul class="dropdown-menu">
					<li><?php echo anchor('usuario/pageUser','Perfil');?></li>
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
						<?php echo anchor('auditoria/listAll','Auditoria');?>
					</li>
					
					<li class="">
						<?php echo anchor('nc/listAll','Não Conformidade');?>
					</li>
					
				
					<li class="">
						<?php echo anchor('ac/listAll','Ação Corretiva');?>
					</li>
				
					<li class="dropdown"><a class="dropdown-toggle" href="#">Cadastro</a>
						<ul class="dropdown-menu">
							<li class="">
								<?php echo anchor('artefato/listAll','Artefato');?>
							</li>
							
							<li class="">
								<?php echo anchor('cargo/listAll','Cargo');?>
							</li>

							<li class="">
								<?php echo anchor('departamento/listAll','Departamento');?>
							</li>
							
							<li class="">
								<?php echo anchor('escalonamento/listAll','Escalonamento');?>
							</li>

							<li class="">
								<?php echo anchor('projeto/listAll','Projeto');?>
							</li>

							<li class="">
								<?php echo anchor('tipo/listAll','Tipo de Usuário');?>
							</li>

							<li class="">
								<?php echo anchor('unidade/listAll','Unidade');?>
							</li>

							<li class="">
								<?php echo anchor('usuario/listAll','Usuário');?>
							</li>
						</ul>
				</ul>
			</div>
			<!--/.nav-collapse -->

		</div>
	</div>
</div>

