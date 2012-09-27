<?php

class Unidade_model extends CI_Model {
	
	
	/**
	 * Inicia construtor do model
	 */
	function __construct() 
	{
		parent::__construct();
	}


	/**
	* valida usuario
	*/
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
	  * Insere 
	  */ 
	function cadastrar($data) 
	{
		return $this->db->insert('Unidade', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');

		$this->db->from('Unidade');

		$query = $this->db->get();
		
		return $query->result();
	}

	
	/**
	 * Busca unidade
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT unidadeID, unidadeNome FROM Unidade WHERE unidadeID = '$id' LIMIT 1");
	
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
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('unidadeID', $id);
	    $this->db->delete('Unidade');

	}
}
