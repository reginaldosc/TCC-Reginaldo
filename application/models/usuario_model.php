<?php

class Usuario_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	function validar()
	{
		 $this->db->where('usuarioLogin', $this->input->post('login'));
		 $this->db->where('usuarioPassword',$this->input->post('password'));
		 $query = $this->db->get('Usuario');

		 if ($query->num_rows == 1)
		 {
		 	return true;
		 }

	}


	/**
	  * Insere usuario no banco de dados
	  */ 
	function cadastrar($data) 
	{
		return $this->db->insert('Usuario', $data);
	}


	/**
	 * Lista usuarios do banco de dados
	 */
	function listar() 
	{

		$this->db->select('*');

		$this->db->from('Usuario');
		
		$this->db->join('Cargo', 'Usuario.cargoID = Cargo.cargoID');
		
		$this->db->join('Departamento', 'Usuario.departamentoID = Departamento.departamentoID');
		
		$this->db->join('Tipo', 'Usuario.tipoID = Tipo.tipoID');
		
		$this->db->join('Unidade', 'Departamento.departamentoID = Unidade.unidadeID');
		
		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Lista usuarios do banco de dados por tipo
	 */
	function listarPorTipo($id) 
	{

		$this->db->select('*');

		$this->db->from('Usuario');
		
	    $this->db->where('tipoID', $id);

		$this->db->join('Cargo', 'Usuario.cargoID = Cargo.cargoID');
		
		$this->db->join('Departamento', 'Usuario.departamentoID = Departamento.departamentoID');
		
		$this->db->join('Unidade', 'Departamento.departamentoID = Unidade.unidadeID');
		
		$query = $this->db->get();
		
		return $query->result();
	}

	
	
	/**
	 * Busca unidade
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT usuarioNome, usuarioMatricula, usuarioLogin, usuarioPassword, 
				usuarioEmail, tipoID FROM Usuario WHERE usuarioID = '$id' LIMIT 1");
		
		//$query = $this->db->tipo_model->buscar('tipoID');
	
		return $query->result();
	}
	
	
	/**
	 * Busca unidade
	 */
	function buscarByLogin($login)
	{
		$query = $this->db->query("SELECT usuarioNome, usuarioMatricula, usuarioLogin, usuarioPassword,
				usuarioEmail, tipoID FROM Usuario WHERE usuarioLogin = '$login' LIMIT 1");
	
		return $query->result();
	}
	
	
	/**
	 * Edita
	 */
	function editar($data)
	{
		$id 		= $data['unidadeID'];
	
		$nome 		= $data['unidadeNome'];
	
		$query = $this->db->query("UPDATE Unidade SET UnidadeNome='$nome' WHERE unidadeID='$id'");
			
	}
	


	/**
	 * Procura e deleta usuario do BD 
	 */
    function deletar($id)
    {
	    $this->db->where('usuarioID', $id);
	    $this->db->delete('Usuario');

	}

	
	function getUsuario($id)
	{
		
		$this->db->select('*');

		$this->db->from('Usuario');
		
	    $this->db->where('usuarioID', $id);
		
		$query = $this->db->get();
		
		return $query->result();

	}


}
