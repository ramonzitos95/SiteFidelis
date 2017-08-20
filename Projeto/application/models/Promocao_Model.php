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

    public function CadastrarPromocao($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("empresa", $dados))
            return true;

        return false;
    }

    public function listaPromocoes()
    {
        $this->db->order_by('promocaoid', 'asc');
        $query = $this->db->get('promocoes');
        return $query->result();
    }

    public function listaEmpresasArray()
    {
        $this->db->order_by('empresaid', 'asc');
        $query = $this->db->get('promocoes');
        return $query->result_array();

    }

    //Consulta com filtro
    public function listaPromocaoFiltro($dadosFiltro)
    {
        $operacao = $dadosFiltro['operacao'];
        $dado = $dadosFiltro['dado'];

        switch ($operacao) {
            Case "razaosocial":
                $this->db->select('*');
                $this->db->from('promocoes');
                $this->db->like('razaosocial', $dado);
                return $this->db->get()->result();

            Case "endereco":
                $this->db->select('*');
                $this->db->from('promocoes');
                $this->db->like('endereco', $dado);
                return $this->db->get()->result();

            Case "cidade":
                $this->db->select('*');
                $this->db->from('empresa');
                $this->db->like('cidade', $dado);
                return $this->db->get()->result();
        }
    }

    public function DeletarPromocao($id)
    {
        If ($id != null)
        {
            $this->db->delete('promocoes', array('promocaoid' => $id));
            return $id;
        }
        Return False;

    }

    public function listaPromocao($id)
    {
        $this->db->where('promocaoid', $id);
        return $this->db->get('promocoes')->result();
    }

    public function AtualizarPromocao($dados)
    {
        $this->db->where("promocaoid", $dados['promocaoid']);
        $Atualizado = $this->db->update("promocoes", $dados);
        if ($Atualizado) {
            return true;
        }
            return false;

    }
}