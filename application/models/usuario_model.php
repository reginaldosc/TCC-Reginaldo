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
		return $this->db->insert('usuario', $data);
	}


	/**
	 * Lista usuarios do banco de dados
	 */
	function listar() 
	{

		$this->db->select('*');

		$this->db->from('usuario');
		
		$this->db->join('Cargo', 'usuario.cargoID = Cargo.cargoID');
		
		$this->db->join('Departamento', 'usuario.departamentoID = Departamento.departamentoID');
		
		$this->db->join('Tipo', 'usuario.tipoID = Tipo.tipoID');
		
		$this->db->join('Unidade', 'Departamento.departamentoID = Unidade.unidadeID');
		
		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Procura e deleta usuario do BD 
	 */
    function deletar($id)
    {
	    $this->db->where('usuarioID', $id);
	    $this->db->delete('Usuario');

	}
}