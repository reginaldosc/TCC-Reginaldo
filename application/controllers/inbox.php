<?php 

class Inbox extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->logged();
		date_default_timezone_set('America/Sao_Paulo');

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

		$id = $this->getUserID();
		// Lista todos os artefatos //
		$data['mensagens'] = $this->mensagem_model->listarUsuarioMensagem($id);
		
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

		// Recupera dados enviados via formulario //
		$emailTo  	= $this->input->post('Email');
		$assunto  	= $this->input->post('Assunto');
		$mensagem   = $this->input->post('Mensagem');


		/**
		 * se o e-mail for de algum usuario já cadastrado no sistema, envia por sendMsg,
		 * caso contrário envia um e-mail.
		 */

		// Busca dados do usuario //
		$retorno = $this->usuario_model->buscarByEmail($emailTo);

		if ($retorno)
		{
			
			// MSG //
			$remetente		= $this->getUserID();
			$destinatario	= $retorno[0]->usuarioID;
			$status 		= STATUS_DIRETA;

			// Envia mensagem no formato: $remetente, $destinatario, $assunto, $mensagem, $status //
			$this->mensagem->sendMsg($remetente, $destinatario, $assunto, $mensagem , $status);

			redirect('inbox/listAll');

		}
		else
		{
			$config = Array(
			    'protocol' => 'smtp',
			    'smtp_host' => 'ssl://smtp.googlemail.com',
			    'smtp_port' => 465,
			    'smtp_user' => 'mensagemquality@gmail.com',
			    'smtp_pass' => 'intelbras',
			);

			$this->load->library('email', $config);
			$this->email->set_newline("\r\n");

			// recupera dados da sessao para envio //
			$nomeFrom = $this->session->userdata('usuarioNome');
			$emailFrom = $this->session->userdata('usuarioEmail');

			$this->email->from($emailFrom, $nomeFrom);
			$this->email->to($emailTo);

			$this->email->subject($assunto);
			$this->email->message($mensagem);


			if (!$this->email->send())
			{
			    show_error($this->email->print_debugger());
			}
			else
			{
			    echo 'E-mail Enviado com Sucesso!';
			}
		}

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