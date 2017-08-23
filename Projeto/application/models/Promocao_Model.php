<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Promocao_Model extends CI_Model
{

    public $promocaoid;
    public $descricaopromocao;
    public $datavalidade;
    public $situacao;
    public $empresa;
    public $produto;
    public $valorproduto;
    public $foto;
    public $arquivo;


    public function __construct() {
        parent::__construct();
    }

    function preencher_do_post($dados) {
        foreach (get_object_vars($this) as $key => $value) {
            if (isset($dados[$key]))
                $this->$key = $dados[$key];
        }

    }

    public function preencher_array_do_banco($array) {
        $lista_promocoes = array();
        foreach ($array as $item) {
            $obj_Promocao_Model = new Promocao_Model();
            foreach (get_object_vars($obj_Promocao_Model) as $key => $value) {
                if (isset($item->$key))
                    $obj_Promocao_Model->$key = $item->$key;
            }
            array_push($lista_promocoes, $obj_Promocao_Model);
        }
        return $lista_promocoes;
    }

    public function preencher_do_banco($dados) {
        if (isset($dados[0]))
            $dados = $dados[0];

        foreach (get_object_vars($this) as $key => $value) {
            if (isset($dados->$key))
                $this->$key = $dados->$key;
        }
    }
}