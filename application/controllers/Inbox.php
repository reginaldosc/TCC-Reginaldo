<?php 

class Inbox extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->logged();

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
		$data['main_content'] = 'inbox/listMensagem_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteMensagem($id)
	{

		$this->mensagem_model->deletar($id);
		
		redirect('inbox/listAll','refresh');
	}
	
		
}

/* End of file mensagem.php */
/* Location: ./application/controllers/mensagem.php */