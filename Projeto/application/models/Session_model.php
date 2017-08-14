
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Session_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function cadastrarSessao($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("ci_sessions", $dados)){
            return true;
        } else {
            return false;
        }
    }

    public function listaSessao($id)
    {
        $id = 1;
        $this->db->select('*');
        $this->db->from('ci_sessions');
        return $this->db->get()->result();
    }



}