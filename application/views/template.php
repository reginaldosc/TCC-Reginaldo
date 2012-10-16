<?php $this->load->view("template/header"); ?>

<?php 

	$tipo 	 = $this->session->userdata('usuarioTipo');
	
	switch ($tipo){
		
		case USER_ADMIN:
			$this->load->view("template/menu"); 
			break;

		case USER_AUDITOR:
			$this->load->view("template/menu_auditor"); 
			break;

		case USER_SUPERVISOR:
			$this->load->view("template/menu_supervisor"); 
			break;
			
		case USER_USUARIO:
			$this->load->view("template/menu_usuario"); 
			break;		
		
		default:
			# code...
			break;
	}
?>

<?php $this->load->view($main_content); ?>

<?php $this->load->view("template/footer"); ?>