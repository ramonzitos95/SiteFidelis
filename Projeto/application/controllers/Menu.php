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
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa');
        $this->load->view('login/menu_view', $dados);
	}
}
