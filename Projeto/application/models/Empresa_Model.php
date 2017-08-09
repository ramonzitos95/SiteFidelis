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

    public function Serializa(){
        $codigo = $this->db->select('max(empresaid)')
                ->from('empresa e')
                ->where('empresaid >= 0')
                ->get();

        if ($codigo = 0)
            $codigo = 1;
        else
            $codigo += 1;

        return $codigo;
    }

    public function listaGrades()
    {
        return $this->db->get("empresa")->result();

    }

    public function DeletarEmpresa($id)
    {
        If ($id != null){
            $this->db->were('empresaid', $id);
            $this->db->delete("empresaid");
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