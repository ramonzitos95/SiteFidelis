<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Session_model');
        $this->obj_sessao = new Session_model();
    }

	public function index(){
        $dados_sessao = $this->obj_sessao->listaSessao();
        $dados['title'] = 'Menu';
        $dados['email'] =  $dados_sessao['email'];
        $dados['empresa'] =  $dados_sessao['empresa_nome'];
        $this->load->view('login/menu_view');
	}
}
