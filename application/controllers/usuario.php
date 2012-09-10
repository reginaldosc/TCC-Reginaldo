<?php

class Usuario extends CI_Controller {


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
	 * Chama a view para listar usuarios e socita ao model todos os usuarios cadastrados do bd
	 */
	public function listAll()
	{

		// Lista todos os usuarios //
		$data['usuarios'] = $this->usuario_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'listUser_view';
		
		// Envia todas as informações para tela //
		$this->parser->parse('template', $data);

	} 


	/**
	 *
	 * Apresenta view de cadastro de novo usuario
	 *
	 */
	public function newUser()
	{
		// Lista todos os cargos //
		$data['cargos'] = $this->cargo_model->listar();

		// Lista todos os departamentos //
		$data['departamentos'] = $this->departamento_model->listar();

		// Lista todas as unidades de negocio //
		$data['unidades'] = $this->unidade_model->listar();

		// Lista todos os tipos de usuario //
		$data['tipos'] = $this->tipo_model->listar();

		// Carrega a view correspondende //
		$data['main_content'] = 'newUser_view';

		// Envia todas as informações para tela //		
		$this->parser->parse('template', $data);
		
	}


	/**
	 * Recupera as informacoes da view newUser, e carrega o model para gravar no banco os dados
	 */
	public function cadastrarUser() 
	{

		// Carrega helper para usar a funcao create_username(); //
		$this->load->helper('user');
	
		// Recupera dos dados a serem cadastrados //
		$data['usuarioNome']     	= $this->input->post('Nome');
		$data['usuarioMatricula']	= $this->input->post('Matricula');
		$data['usuarioLogin']    	= create_username($this->input->post('Nome'), $this->input->post('Matricula'));
		$data['usuarioPassword'] 	= create_username($this->input->post('Nome'), $this->input->post('Matricula')); 
		$data['usuarioEmail']    	= $this->input->post('Email');
		$data['cargoID']    		= $this->input->post('Cargo');
		$data['departamentoID']		= $this->input->post('Setor');
		$data['tipoID']   		    = $this->input->post('Tipo');
			 
		 
		// Insere os dados do novo usuario no bd //
		$this->usuario_model->cadastrar($data);

		redirect('usuario/listAll');

	}


	/**
	 *
	 * Apresenta view de edicao de um usuario
	 *
	 */
	public function editUser()
	{
		$data['main_content'] = 'editUser_view';		
		$this->parser->parse('template', $data);
	}


	/**
	 * Chama o model para deletar o usuario selecionado, apos essa operacao retorna a view de listagem de usuarios
	 */
	public function deleteUser($id)
	{
		
		$this->usuario_model->deletar($id);
		
		redirect('usuario/listAll','refresh');
	}	

	/**
	 * Apresenta a view de informações do usuario
	 */
	public function pageUser()
	{

		// Carrega a view correspondende //
		$data['main_content'] = 'pageUser_view';

		// Envia todas as informações para tela //			
		$this->parser->parse('template', $data);
	}


}


/* End of file usuario.php */
/* Location: ./application/controllers/usuario.php */