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
		print_r($data);
		
		$status 		= $data['statusID'];
		
		$date		 	= $data['acDataFinal'];
		
		$query = $this->db->query("UPDATE AC SET statusID='$status', acDataFinal='$date'
				WHERE acID='$id'");
		
		//$this->db->update('AC', $data, "acID = $id");
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
	function listarAcByNc($id)
	{
		$this->db->select('*');
	
		$this->db->from('AC');
		$this->db->where('ncID', $id);
	
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
		$this->db->where('acID', $id);
	
		$this->db->join('Status' , 'Status.statusID = AC.statusID');
	
		$query = $this->db->get();
	
		return $query->result();
	}


	/**
	 * Buscar AC
	 */
	function buscarAC($id) 
	{
		$this->db->select('*');
		
		$this->db->from('AC');

		$this->db->where('acID', $id);

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
	
	
	/**
	 * Edita
	 */
	function editar($data)
	{
		$id 		= $data['acID'];

		$acao 		= $data['acAcao'];

		$descricao 	= $data['acDescricao'];

		$query = $this->db->query("UPDATE AC SET acAcao='$acao', acDescricao='$descricao'
				WHERE acID='$id'");

	}
	
	
}
