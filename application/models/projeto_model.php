<?php


class Projeto_model extends CI_Model {


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
		return $this->db->insert('Projeto', $data);
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
			$this->db->from('Projeto');
			$this->db->where('projetoAtivo', 'SIM');
			$this->db->join('Departamento', 'Projeto.departamentoID = Departamento.departamentoID');
			$query = $this->db->get();
		}
		//lista somente os inativos
		elseif($opcao == 1)
		{
			$this->db->select('*');
			$this->db->from('Projeto');
			$this->db->where('projetoAtivo', 'NÃO');
			$this->db->join('Departamento', 'Projeto.departamentoID = Departamento.departamentoID');
			$query = $this->db->get();
		}
		//lista todos (ativos + inativos)
		else
		{
			$this->db->select('*');
			$this->db->from('Projeto');
			$this->db->join('Departamento', 'Projeto.departamentoID = Departamento.departamentoID');
			$query = $this->db->get();
		}
		return $query->result();
	}


	/**
	 * Busca um projeto
	 */
	function buscar($id)
	{
		$query = $this->db->query("SELECT projetoID, projetoNome, departamentoID, projetoAtivo
				FROM Projeto WHERE projetoID = '$id' LIMIT 1");

		return $query->result();

	}


	/**
	 * Edita
	 */
	function editar($data)
	{

		$id 			= $data['projetoID'];

		$nome 			= $data['projetoNome'];

		$departamento 	= $data['departamentoID'];
		
		$ativo			= $data['projetoAtivo'];

		$query = $this->db->query("UPDATE Projeto SET projetoNome='$nome', departamentoID='$departamento', 
				projetoAtivo='$ativo' WHERE projetoID='$id'");

	}


	/**
	 * Procura e deleta na BD
	 */
	function deletar($id)
	{
		//$this->db->where('projetoID', $id);
		//$this->db->delete('Projeto');
	
		$ativo			= 'NÃO';
		
		$query = $this->db->query("UPDATE Projeto SET projetoAtivo='$ativo' WHERE projetoID='$id'");
	}


	/**
	 * Procura e deleta no BD
	 */
	function deletarPA($id)
	{
		$this->db->where('projetoID', $id);
		$this->db->delete('Projeto_Artefato');

	}


	/**
	 *
	 */
	function getProjetoFromAuditoria($id)
	{
		$this->db->select('projetoID')->from('Auditoria')->where('auditoriaID', $id);

		$query = $this->db->get();

		return $query->result();

	}


	/**
	 * Verifica se o projeto está associado a alguma auditoria.
	 */
	function projetoAuditado($id)
	{
		$this->db->select('projetoID')->from('Auditoria')->where('projetoID', $id);

		$query = $this->db->get();

		return $query->result();

	}
}
