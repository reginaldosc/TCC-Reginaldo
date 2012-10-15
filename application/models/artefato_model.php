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
	function listar($opcao) 
	{
	//lista somente os ativos
		if($opcao == 2)								
		{
			$this->db->select('*');
			$this->db->from('Artefato');
			$this->db->where('artefatoAtivo', 'SIM');
			$query = $this->db->get();			
		}
		//lista somente os inativos
		elseif($opcao == 1)
		{
			$this->db->select('*');
			$this->db->from('Artefato');
			$this->db->where('artefatoAtivo', 'NÃO');
			$query = $this->db->get();	
		}
		//lista todos (ativos + inativos)
		else 
		{
			$this->db->select('*');
			$this->db->from('Artefato');
			$query = $this->db->get();
		}
		
		return $query->result();
	}

	
	/**
	 * Busca um artefato
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT artefatoID, artefatoNome, artefatoDescricao, artefatoAtivo 
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
		
		$ativo		= $data['artefatoAtivo'];
		
		$query = $this->db->query("UPDATE Artefato SET artefatoNome='$nome', artefatoDescricao='$descricao',
				artefatoAtivo='$ativo' WHERE artefatoID='$id'");
		 
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
