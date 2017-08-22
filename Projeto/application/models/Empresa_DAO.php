<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_DAO extends CI_Model
{
    private $table = "empresa";

    public function CadastrarEmpresa(Empresa_Model $obj_Empresa_Model)//Função para cadastrar Pessoa
    {
        unset($obj_Empresa_Model->empresaid);
        $senha = $obj_Empresa_Model->senha;
        $obj_Empresa_Model->senha = password_hash($senha, PASSWORD_DEFAULT);

        if ($this->db->insert($this->table, $obj_Empresa_Model)) {
            return true;
        }
        echo $this->db->last_query();
        return false;
    }

    public function AtualizarEmpresa(Empresa_Model $objEmpresaModel)
    {
        //Atualizando dados do participante no banco de dados
        unset($objEmpresaModel->usuario);
        unset($objEmpresaModel->senha);

        $this->db->where('empresaid', $objEmpresaModel->empresaid);

        if($this->db->update($this->table, $objEmpresaModel))
        {
            return true;
        }
        else
        {
            echo $this->db->last_query();
            return false;
        }
    }

    public function buscaEmpresa($empresaid)
    {
        $this->db->where('empresaid', $empresaid);
        $query = $this->db->get('empresa');
        return $query->result_array();
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



}

