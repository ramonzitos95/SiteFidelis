<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_Model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function CadastrarEmpresa($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("empresa", $dados))
            return true;

        return false;
    }

    public function listaEmpresas()
    {
        $this->db->order_by('empresaid', 'asc');
        $query = $this->db->get('empresa');
        return $query->result();
    }

    public function listaEmpresasArray()
    {
        $this->db->order_by('empresaid', 'asc');
        $query = $this->db->get('empresa');
        return $query->result_array();

    }

    //Consulta com filtro
    public function listaEmpresaFiltro($dadosFiltro)
    {
        $operacao = $dadosFiltro['operacao'];
        $dado = $dadosFiltro['dado'];

        switch ($operacao) {
            Case "razaosocial":
                $this->db->select('*');
                $this->db->from('empresa');
                $this->db->like('razaosocial', $dado);
                return $this->db->get()->result();

            Case "endereco":
                $this->db->select('*');
                $this->db->from('empresa');
                $this->db->like('endereco', $dado);
                return $this->db->get()->result();

            Case "cidade":
                $this->db->select('*');
                $this->db->from('empresa');
                $this->db->like('cidade', $dado);
                return $this->db->get()->result();
        }
    }

    public function DeletarEmpresa($id)
    {
        If ($id != null)
        {
            $this->db->delete('empresa', array('empresaid' => $id));
            return $id;
        }
        Return False;

    }

    public function listaEmpresa($id)
    {
        $this->db->where('empresaid', $id);
        return $this->db->get('empresa')->result();
    }

    public function AtualizarEmpresa($dados)
    {
        $this->db->where("empresaid", $dados['empresaid']);
        $Atualizado = $this->db->update("empresa", $dados);
        if ($Atualizado) {
            return true;
        }
            return false;

    }
}