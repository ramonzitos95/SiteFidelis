<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Turma_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function cadastrarTurma($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("turma", $dados)){
            return true;
        } else {
            return false;
        }
    }

    public function listaTurmas()
    {
        return $this->db->get("turma")->result();

    }

    public function DeletarTurma($id)
    {
        If ($id != null) {
            $this->db->where('turmaid', $id);
            $this->db->delete("turma");
            return $id;
        } else {
            Return False;
        }

    }

    public function RetornaNomeTurma($idcurso)
    {
        //Busca com condição
        $query = $this->db->get('turma', array('turmaid' => $idcurso));

        //Row_object() retorna direto o objeto curso e não array
        return $query->row_object();
    }


}