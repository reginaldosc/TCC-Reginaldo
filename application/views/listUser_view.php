	<!-- Estrutura -->
	<div class="container">

		<br>

		<!-- Buscador -->
		<form class="well form-search">
			<input type="text" class="input-xlarge search-query">
			<button type="submit" class="btn"><i class="icon-search"></i> Buscar</button>
		</form>

		<!-- Adicionar novo usuario -->
		<a href="newUser" class="btn btn-primary"> <i class="icon-plus icon-white"></i> Novo Usuário </a>
		<br>
		<br>

		<!-- Tabela com a lista dos usuarios do sistema -->
		<table class='table table-bordered table-striped'>
			<thead>
				<tr>
					<th>Nome</th>
					<th>Login</th>
					<th>E-mail</th>
					<th>Função</th>
					<th>EAG</th>
					<th>Departamento</th>
					<th>Tipo de usuario</th>
					<th>Editar</th>
					<th>Excluir</th>
				</tr>
			</thead>
					
			<tbody>
				{usuarios}
				<tr>
					<td>{userName}</td>
					<td>{userLogin}</td>
					<td>{userEmail}</td>
					<td>{roleName}</td>
					<td>{eagName}</td>
					<td>{departmentName}</td>
					<td>{typeName}</td>
					<td><a href="editUser/{userID}" onclick='RemoveUser({userID})' class='icon-edit'> <a/></td>
					<td><a onclick='RemoveUser("{userID}")' data-toggle="modal" href="#myModal" class='icon-trash'></a></td>
				</tr>
				{/usuarios}
			</tbody>
		</table>
		<br>


	<div class="modal hide" id="myModal">
  		<div class="modal-header">
    		<button type="button" class="close" data-dismiss="modal">×</button>
    			<h3>Excluir</h3>
  		</div>
  
  		<div class="modal-body">
    		<p>Deseja realmente excluir o usuário ?</p>
  		</div>
 
 		 <div class="modal-footer">
    		<a href="" class="btn" data-dismiss="modal">Não</a>
    		<a href="" class="btn btn-danger" id="Excluir">Sim</a>
 	 	</div>
	</div>


	<!-- javascript -->
	<!-- Placed at the end of the document so the pages load faster -->
	<script src="<?php echo base_url();?>js/jquery.js"></script>
	<script src="<?php echo base_url();?>js/jquery.validate.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap-dropdown.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap-alert.js"></script>
	<script src="<?php echo base_url();?>js/bootstrap-modal.js"></script>

	<script type="text/javascript">

	function RemoveUser(id){

		document.getElementById("Excluir");
		document.getElementById('Excluir').href="deleteUser/"+id;

	}	
    
</script>


