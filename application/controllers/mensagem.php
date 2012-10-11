<?php 

class Mensagem extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		//$this->logged();

	}


	/**
	 * Verifica se o usuario está logado
	 */
	public function logged()
	{
		$logged = $this->session->userdata('logged');

		if(!isset($logged) || $logged != true)
		{	
			redirect('login','refresh');
		}		
	}

	
	/**
	 * Apresenta a view com todos os projetos cadastrados no sistema 
	 */
	public function listAll()
	{

		// Lista todos os artefatos //
		$data['mensagens'] = $this->mensagem_model->listarUsuarioMensagem();
		
		// converte as datas do formato mysql para formato dd/mm/aaaa
		//$data = convert_date($data,'mensagens','mensagemData');

		// Carrega a view correspondende //
		$data['main_content'] = 'mensagem/listMensagem_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Envia uma mensagem
	 */
	public function sendMensagem($tipo, $id, $status)
	{
		
		switch ($tipo)
		{
			
			// Auditoria //
			case "Auditoria":
				$this->sendMsgAuditoria($status,$id);
				break;
				
			
			// Ação corretiva //	
			case "Ac":
				$this->sendMsgAc($status,$id);
				break;
			
			
			// Não Conformidade //
			case "Nc":
				$this->sendMsgNc($status,$id);
				break;
			
		}

	}


	/**
	 * Envia mensagem ao usuário
	 */
	public function sendMsgAuditoria($status,$id) 
	{
		
		switch ($status)
		{
					
			case 1:
				echo "Auditoria foi Agendada";
				break;
						
			case 2:
				echo "Auditoria foi realizada";
				break;
				
		}

		//redirect('nc/listAll');
	}
	
	
	/**
	 * Envia mensagem ao usuário
	 */
	public function sendMsgAc($status,$id) 
	{
		
		switch ($status)
		{
					
			case 1:
				echo "Ação corretiva foi Agendada";
				break;
						
			case 9:
				$data['mensagemBody']	= "Ação corretiva foi executada";	
				$data['mensagemData']	= now();
				$data['usuarioID']		= 4;
				
				$this->mensagem_model->cadastrarUsuarioMensagem($data);
				break;
						
			case 8:
				echo "Ação corretiva foi Fechada";
				break;
				
			case 10:
				echo "Ação corretiva foi Retornada";
				break;
					
		}

	redirect('nc/listAll');
	}
	
	
	/**
	 * Envia mensagem ao usuário
	 */
	public function sendMsgNc($status,$id)
	{
	
		switch ($status)
		{
				case 7:
					echo "Ação corretiva foi Aberta";
				break;
						
				case 8:
					echo "Ação corretiva foi Fechada";
					break;
											
		}
	
		//redirect('nc/listAll');
	}
	
		
}

/* End of file mensagem.php */
/* Location: ./application/controllers/mensagem.php */