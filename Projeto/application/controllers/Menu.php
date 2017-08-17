<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
    }

	public function index(){
        $dados['title'] = 'Menu';
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $this->load->view('login/menu_view', $dados);
	}
}
