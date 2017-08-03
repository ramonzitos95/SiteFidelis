<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Pessoa_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function CadastrarPessoa($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("pessoa", $dados)){
            return true;
        } else {
            return false;
        }
    }
}