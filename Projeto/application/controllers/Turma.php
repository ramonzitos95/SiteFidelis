<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Turma extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Turma_model', 'Auditoria_model'));
        $this->load->helper(array('url', 'form'));
        $this->load->library('form_validation');
    }

    public function index()
    {
        $this->load->view('turma/turma_view');
    }

    public function validaTurma()
    {
        $nome = $this->input->post('nome');

        $dados = array(
            'turmanome' => $nome
        );

        $cadastrei = $this->Turma_model->cadastrarTurma($dados);

        $this->form_validation->set_rules('turmanome', 'required');

        if ($cadastrei) {
            $textoLog = "Foi cadastrado a turma: " + $nome;
            $this->gravandoLog($textoLog);
            redirect('Turma');
        } else {
            $this->load->view('Erro_view');
        }

    }

    public function gravandoLog($texto)
    {
        $dadosLogin = array(
            'loghora' => time(),
            'logdata' => date('y-m-d'),
            'logtexto' => $texto
        );
        $this->Auditoria_model->logar($dadosLogin);
    }

    public function Consulta()
    {
        $dados['turmas'] = $this->Turma_model->listaTurmas();;
        $this->load->view('Turma/ConsultaTurma_view', $dados);
    }

    public function DeletarTurma($id)
    {
        $deletado = $this->Turma_model->DeletarTurma($id);

        if($deletado == false){
            echo base_url('Menu');
        } else {
            //Gravando log
            $nome = $this->Turma_model->RetornaNomeTurma($deletado);
            $texto = "O curso " .  $nome->cursonome . " foi deletado";
            //$this->Auditoria->gravandoLog($texto);
            echo '<script>alert("Curso excluido com sucesso")</script>';
            redirect('Menu');
        }
    }



}
