<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Disciplina_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function CadastrarDisciplina($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("disciplina", $dados)){
            return true;
        } else {
            return false;
        }
    }

    public function listaDisciplinas()
    {
        return $this->db->get("disciplina")->result();
    }

    public function DeletarDisciplina($id)
    {
        $this->db->where("disciplinaid", $id);
        $deletado = $this->db->delete("disciplina");
        if($deletado){
            return $id;
        } else {
            return false;
        }
    }

    public function RetornaNomeDisciplina($idcurso)
    {
        //Busca com condição
        $query = $this->db->get('curso', array('cursoid' => $idcurso));

        //Row_object() retorna direto o objeto curso e não array
        return $query->row_object();
    }

    public function listaDisciplina($id)
    {
        $this->db->where('disciplinaid', $id);
        return $this->db->get('disciplina')->result();
    }

    public function AtualizarDisciplina($dados)
    {
        $this->db->where("disciplinaid", $dados['disciplinaid']);
        $Atualizado = $this->db->update("disciplina", $dados);
        if ($Atualizado) {
            return true;
        } else {
            return false;
        }
    }

    //Consulta com filtro
    public function listaDisciplinaFiltro($dadosFiltro)
    {
        $operacao = $dadosFiltro['operacao'];
        $dado = $dadosFiltro['dado'];

        if($operacao == 'nome'){
            $this->db->select('*');
            $this->db->from('disciplina');
            $this->db->like('nome', $dado);
            return $this->db->get()->result_array();

        }

    }
}