<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Grade_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function CadastrarGrade($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("grade", $dados)){
            return true;
        } else {
            return false;
        }
    }


    public function listaGrades()
    {
        return $this->db->get("grade")->result();

    }

    public function DeletarGrade($id)
    {
        If ($id != null) {
            $this->db->where('gradeid', $id);
            $this->db->delete("grade");
            return $id;
        } else {
            Return False;
        }

    }

    public function listaCurso($id)
    {
        $this->db->where('gradeid', $id);
        return $this->db->get('grade')->result();
    }

    public function AtualizarGrade($dados)
    {
        $this->db->where("gradeid", $dados['gradeid']);
        $Atualizado = $this->db->update("grade", $dados);
        if ($Atualizado) {
            return true;
        } else {
            return false;
        }

    }
}