<?php

class Mensagem_model extends CI_Model {
	
	
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
		return $this->db->insert('Artefato', $data);
	}
	
	
	/**
	 * Cadastrar Usuario_Mensagem
	 */
	function cadastrarUsuarioMensagem($data)
	{
		return $this->db->insert('Mensagem', $data);
	}


	/**
	 * Lista dados
	 */
	function listar() 
	{
		$this->db->select('*');
		$this->db->from('Mensagem');
		$query = $this->db->get();
		
		return $query->result();
	}
	
	/**
	 * Lista dados
	 */
	function listarUsuarioMensagem()
	{
		$this->db->select('*');
		$this->db->from('Mensagem');
		$this->db->join('Usuario' , 'Usuario.usuarioID = Mensagem.remetenteID');
		
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
	 * Procura e deleta na BD
	 */
    function deletar($id)
    {
	    $this->db->where('mensagemID', $id);
	    $this->db->delete('Mensagem');

	}
}

?>
