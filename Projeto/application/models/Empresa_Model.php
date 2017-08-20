<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa_Model extends CI_Model
{

    public $empresaid;
    public $razaosocial;
    public $cnpj;
    public $cep;
    public $site;
    public $telefone;
    public $endereco;
    public $cidade;
    public $estado;
    public $situacao;
    public $foto;
    public $datacadastro;
    public $usuario;
    public $senha;
    
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
        $lista_empresas = array();
        foreach ($array as $item) {
            $obj_Empresa_Model = new Empresa_Model();
            foreach (get_object_vars($obj_Empresa_Model) as $key => $value) {
                if (isset($item->$key))
                    $obj_Empresa_Model->$key = $item->$key;
            }
            array_push($lista_empresas, $obj_Empresa_Model);
        }
        return $lista_empresas;
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
