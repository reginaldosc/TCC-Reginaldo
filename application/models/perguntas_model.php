<?php

class Perguntas_model extends CI_Model {
	
	
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
		return $this->db->insert('Perguntas', $data);
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
			$this->db->from('Perguntas');
			$this->db->where('perguntaAtivo', 'SIM');
			$this->db->join('Artefato', 'Perguntas.artefatoID = Artefato.artefatoID');
			$query = $this->db->get();			
		}
		//lista somente os inativos
		elseif($opcao == 1)
		{
			$this->db->select('*');
			$this->db->from('Perguntas');
			$this->db->where('perguntaAtivo', 'NÃO');
			$this->db->join('Artefato', 'Perguntas.artefatoID = Artefato.artefatoID');
			$query = $this->db->get();	
		}
		//lista todos (ativos + inativos)
		else 
		{
			$this->db->select('*');
			$this->db->from('Perguntas');
			$this->db->join('Artefato', 'Perguntas.artefatoID = Artefato.artefatoID');
			$query = $this->db->get();
		}
		
		return $query->result();
	}

	
	/**
	 * Busca um artefato
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT perguntasID, artefatoID, artefatoPergunta, perguntaAtivo
				 FROM Perguntas WHERE perguntasID = '$id' LIMIT 1");
		
		return $query->result();		
	}
	
	
	/**
	 * Edita
	 */
	function editar($data)
	{
		$id 			= $data['perguntasID']; 
		
		$nome 			= $data['artefatoNome'];

		$pergunta 		= $data['artefatoPergunta'];

		$ativo			= $data['perguntaAtivo'];
		
		$query = $this->db->query("UPDATE Perguntas SET artefatoID='$nome', artefatoPergunta='$pergunta',
				perguntaAtivo='$ativo' WHERE perguntasID='$id'");
		 
	}
	
	
	
	/**
	 * get perguntas por artefatoID
	 */
    public function getPerguntasByArtefato($id)
    {
    	$this->db->select('*');
    	$this->db->from('Perguntas');
    	$this->db->where('artefatoID', $id);
    	$query = $this->db->get();
    	
    	return $query->result();
    }
	
	
	
	/**
	 * Procura e deleta na BD
	 */
    public function deletar($id)
    {
    	$ativo = "NAO";
	    $query = $this->db->query("UPDATE Perguntas SET perguntaAtivo='$ativo' WHERE perguntasID='$id'");

	}
}

?>
