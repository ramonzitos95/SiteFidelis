<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promocao_DAO extends CI_Model
{

    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function CadastrarPromocao(Promocao_Model $obj_Promocao_Model)//Função para cadastrar Pessoa
    {
        unset($obj_Promocao_Model->promocaoid);
        return $this->db->insert("promocoes", $obj_Promocao_Model);
    }

    public function CadastrarEmpresaNaPromocao(Empresa_Promocao $obj_Empresa_Promocao)//Função para cadastrar Pessoa
    {
        if ($this->db->insert("empresa_promocao", $obj_Empresa_Promocao)){
            return $this->db->insert("empresa_promocao", $obj_Empresa_Promocao);
        }
        return false;
    }

    public function listaPromocoes()
    {
        $empresaid = $this->session->userdata("empresa_id");
        $this->db->where('situacao', 1); //Pomoções ativas
        $this->db->where('empresa', $empresaid); //Promoções da empresa logada
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
            return true;
        }
        Return False;

    }

    public function listaPromocao($id)
    {
        $this->db->where('promocaoid', $id);
        return $this->db->get('promocoes')->result();
    }

    public function AtualizarPromocao(Promocao_Model $obj_promocao_model)
    {
        $this->db->where("promocaoid", $obj_promocao_model->promocaoid);
        $Atualizado = $this->db->update("promocoes", $obj_promocao_model);
        if ($Atualizado) {
            return true;
        }
        return false;
    }

    public function BuscaUltimaPromocao()
    {
        $this->db->select_max('promocaoid');
        $result = $this->db->get('promocoes');
        return $result->promocaoid;
    }


}
