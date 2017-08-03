<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class Auditoria_model extends CI_Model
{
    public $title;
    public $content;
    public $date;

    public function __construct()
    {
        //Chamada o próprio construtor
        parent::__construct();
    }

    public function logar($dados)//Função para cadastrar Pessoa
    {
        If ($this->db->insert("auditoria", $dados)){
            return true;
        } else {
            return false;
        }
    }

}