<?php

class Auditoria_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	/**
	  * Insere 
	  */ 
	function cadastrar($data) 
	{
		return $this->db->insert('Auditoria', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		
		$this->db->from('Auditoria');

		$this->db->join('Projeto' , 'Projeto.projetoID = Auditoria.projetoID');

		$this->db->join('Departamento' , 'Departamento.departamentoID = Projeto.departamentoID');

		$this->db->join('Unidade' , 'Unidade.unidadeID = Departamento.unidadeID');

		$this->db->join('Usuario' , 'Usuario.usuarioID = Auditoria.auditorID');

		$query = $this->db->get();
		
		return $query->result();
	}


	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('auditoriaID', $id);
	    $this->db->delete('Auditoria');

	}
}