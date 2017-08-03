<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cep extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	//Consulta o CEP para retornar aos devidos campos
    public function consulta(){

        $cep = $this->input->post('cep');

        $this->load->library('curl');

        echo $this->curl->consulta($cep);

    }

    function getCidades($id){
        $this->load->Model('cidades_model');

        $cidades = $this->cidades_model->getCidades($id);
    }
}
