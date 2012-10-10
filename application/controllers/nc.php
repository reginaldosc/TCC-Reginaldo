<?php 

class NC extends CI_Controller {


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

		// Lista todos os projetos //
		$data['ncs'] = $this->nc_model->listar();

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'ncs','ncDataFinalprev');

		// Carrega a view correspondende //
		$data['main_content'] = 'nc/listNc_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	}


	/**
	 * Apresenta view de cadastro de novos projetos
	 */
	public function newNc()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'newNc_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informações do cadastro e grava no bando de dados
	 */
	public function cadastrarNc() 
	{

		// Recupera a data informada pelo usuario //
		$date = $this->input->post('Data');

		// Converte a dada informada para o formato mysql //
		$date_mysql = implode("-",array_reverse(explode("/",$date)));
		
		// Recupera dos dados a serem cadastrados //
		$data['ncDescricao']   		= $this->input->post('Descricao');
		$data['ncDataFinalprev']   	= $date_mysql;
		$data['ncComentario']  		= $this->input->post('Comentario');
		$data['auditoriaID']  		= $this->input->post('Auditoria');
		$data['artefatoID']  		= $this->input->post('Artefato');

		$data['statusID']   		= '7';
		
		$this->nc_model->cadastrar($data);

		//redirect('nc/listAll');

	}

	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteNc($id)
	{

		$this->nc_model->deletar($id);
		
		redirect('nc/listAll','refresh');
	}
	
	/**
	 * Visualiza nao conformidade
	 */
	public function visualizarNc($id)
	{
	
		// Lista todas as auditorias //
		$data['ncs'] = $this->nc_model->listarNc($id);
		
		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'ncs','ncDataFinalprev');

		$auditoria = $data['ncs'][0]->auditoriaID;
		
		$data['auditorias'] = $this->auditoria_model->listarAuditoria($auditoria);
		
		$projeto = $data['auditorias'][0]->projetoID;
		$acompanhante = $data['auditorias'][0]->acompanhanteID;

		$data['acompanhante'] = $this->usuario_model->getUsuario($acompanhante);
		$data['projetos_artefatos'] = $this->auditoria_model->listarProjeto_Arfetato($projeto);


		// Lista todos os Ação corretivas //
		$data['acs'] = $this->ac_model->listarAC($id);

		// converte as datas do formato mysql para formato dd/mm/aaaa
		$data = convert_date($data,'acs','acDataFinal');
		
	
		// Carrega a view correspondende //
		$data['main_content'] = 'nc/nc_view';
	
		// Envia todas as informacoes para tela //
		$this->parser->parse('template', $data);
	
	}
}


