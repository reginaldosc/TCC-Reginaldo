<?php

class AC_model extends CI_Model {
	
	
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
		return $this->db->insert('AC', $data);
	}

	/**
	* Atualiza Ac
	*/ 
	function atualizaAc($id, $data) 
	{
		$this->db->update('AC', $data, "acID = $id");
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		
		$this->db->from('AC');

		$this->db->join('Status' , 'Status.statusID = AC.statusID');

		$query = $this->db->get();
		
		return $query->result();
	}
	
	
	/**
	 * Lista dados
	 */
	function listarAC($id)
	{
		$this->db->select('*');
	
		$this->db->from('AC');
		$this->db->where('ncID', $id);
	
		$this->db->join('Status' , 'Status.statusID = AC.statusID');
	
		$query = $this->db->get();
	
		return $query->result();
	}


	function buscaStatus($id)
	{
			$this->db->select('statusID');
		
			$this->db->from('AC');

			$this->db->where('acID', $id);
		
			$query = $this->db->get();
		
			return $query->result();
	}
	
	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('acID', $id);
	    $this->db->delete('AC');

	}
	
	/**
	 * Procura e deleta na BD
	 */
	function deletarAcFromNC($id)
	{
		$this->db->where('ncID', $id);
		$this->db->delete('AC');
	
	}
	

	
}
