<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Login_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
        $this->load->model('Turma_model');
        $this->obj_log = new LogArquivo();
    }

    //Validando o login do aluno
    public function logarSistema($usuario, $senha)
    {
        $query = $this->db->get_where('empresa', array('usuario' => $usuario, 'senha' => $senha));
        if($query->result()){
            return $query->result();

        } else {
            //grava a ultima query em arquivo
            $this->obj_log->gravaLog($this->db->last_query());
            return 0;
        }


        return $query->result();
    }

    public function GetAluno($id)
    {
        if (!is_null($id)) {
            $this->db->where("id", $id);
            $id = $this->db->get("aluno")->row_array();
            return $id;
        } else {
            return false;
        }

    }

    public function CadastrarUsuario($dados)//Função para cadastrar aluno
    {

        $query = $this->db->insert("empresa", $dados);
        if ($query->num_rows > 0) {
            return $query->result();
        } else {
            return 0;
        }
    }

}