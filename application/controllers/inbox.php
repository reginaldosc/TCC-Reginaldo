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
		$data['main_content'] = 'inbox/inbox_view';
		
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


	/**
	 * Envia Email
	 */
	public function sendEmail()
	{

		$emailTo  	= $this->input->post('Email');
		$assunto  	= $this->input->post('Assunto');
		$mensagem   = $this->input->post('Mensagem');


		/**
		 * se e-mail tiver cadastrado envia por sendMsg,
		 * caso contrário envia um e-mail.
		 */

		$teste = 1;

		if ($teste = 1)
		{
			
			echo $emailTo;
			echo $assunto;
			echo $mensagem;

		}
		else
		{

			echo "erro";
			// // Carrega lib de envio de email //
			// $this->load->library('email');

			// // Preenche com os dados para Envio //
			// $this->email->from('jairojair@gmail.com','Jairo Jair');
			
			// $this->email->to($EmailTo);
			// $this->email->subject($assunto);
			// $this->email->message($mensagem);
			
			// $this->email->send();

		}

		//echo $this->email->print_debugger();

	}


	/**
	 * Salva mensagem 
	 */
	public function cadastrarMsg($data)
	{
		$this->mensagem_model->cadastrarUsuarioMensagem($data);

	}
	
		
}

/* End of file mensagem.php */
/* Location: ./application/controllers/inbox  .php */