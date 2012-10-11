<?php

class Artefato_model extends CI_Model {
	
	
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
		return $this->db->insert('Artefato', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		$this->db->from('Artefato');
		$query = $this->db->get();
		
		return $query->result();
	}

	
	/**
	 * Busca um artefato
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT artefatoID, artefatoNome, artefatoDescricao 
				FROM Artefato WHERE artefatoID = '$id' LIMIT 1");
		
		return $query->result();		
	}
	
	
	/**
	 * Edita
	 */
	function editar($data)
	{
		$id 		= $data['artefatoID']; 
		
		$nome 		= $data['artefatoNome'];

		$descricao 	= $data['artefatoDescricao']; 
		
		$query = $this->db->query("UPDATE Artefato SET artefatoNome='$nome', artefatoDescricao='$descricao'
				 WHERE artefatoID='$id'");
		 
	}
	
	
	/**
	 * Procura e deleta no BD
	 */
	function deletarPA($id)
	{
		$this->db->where('artefatoID', $id);
		$this->db->delete('Projeto_Artefato');
	
	}

	/**
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('artefatoID', $id);
	    $this->db->delete('Artefato');

	}
}

?>
