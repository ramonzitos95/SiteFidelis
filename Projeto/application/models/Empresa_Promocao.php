<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 22/08/2017
 * Time: 01:06
 */

class Empresa_Promocao extends CI_Model
{
    public $promocaoid;
    public $empresaid;
    public $razaosocial;
    public $descricaopromocao;

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
        $lista_empresas_promocoes = array();
        foreach ($array as $item) {
            $obj_Empresa_Promocao_Model = new Promocao_Model();
            foreach (get_object_vars($obj_Empresa_Promocao_Model) as $key => $value) {
                if (isset($item->$key))
                    $obj_Empresa_Promocao_Model->$key = $item->$key;
            }
            array_push($lista_empresas_promocoes, $obj_Empresa_Promocao_Model);
        }
        return $lista_empresas_promocoes;
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