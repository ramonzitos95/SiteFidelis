<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Curso extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->model('Auditoria_model');
        $this->load->library(array('form_validation', 'Auditoria'));
        $this->load->model('Curso_model');
    }

    public function index()
    {
        $this->load->view('Curso/cadastroCurso_view');
    }

    public function Alteracao($cursoid)
    {
        $dados['curso'] = $this->Curso_model->listaCurso($cursoid);
        $this->load->View('Curso/AtualizaCurso_view', $dados);
    }

    public function validaCurso()
    {
        $this->load->model('Curso_model');

        $this->load->library('form_validation');

        $cursonome = $this->input->post('cursonome');
        $cargahoraria = ($this->input->post('cargahoraria'));
        $ementa = $this->input->post('ementa');
        $bibliografia = $this->input->post('bibliografia');
        $modocurso = $this->input->post('modocurso');
        $origem = $this->input->post('origem');
        $situacao = $this->input->post('situacao');
        if($situacao == "ativo"){
            $situacao = true;
        }elseif ($situacao == "inativo"){
            $situacao = false;
        }

        $dadosCurso = array(
            'cursonome' => $cursonome,
            'cargahoraria' => $cargahoraria,
            'ementa' => $ementa,
            'bibliografia' => $bibliografia,
            'modocurso' => $modocurso,
            'origemcurso' => $origem,
            'situacao' => $situacao
        );

        $cadastrado = $this->Curso_model->CadastrarCurso($dadosCurso);


        if ($cadastrado) {
            $textoLog = "Foi cadastrado o curso: " . $cursonome;
            //echo $this->Auditoria->gravandoLog($textoLog);
            redirect('Curso');
        } else {
            $this->load->view('Erro_view');
        }



    }



    public function Consultar()
    {
        $this->load->model('Curso_model');
        $dados['cursos'] = $this->Curso_model->listaCursos();
        $this->load->view('Curso/consultaCurso_view', $dados);
    }

    public function ConsultaFiltro()
    {
        $operacao = $this->input->post('operacao');
        $dado = $this->input->post('dado');

//        var_dump($this->input->post);
        $dadosFiltro = array(
            'operacao' => $operacao,
            'dado' => $dado
        );
        $this->load->model('Curso_model');
        $dados['cursos'] = $this->Curso_model->listaCursoFiltro($dadosFiltro);

        $this->load->view('Curso/ConsultaCursoFiltro_view', $dados);
    }

    public function DeletarCurso($id)
    {
        $this->load->model('Curso_model');
        $deletado = $this->Curso_model->DeletarCurso($id);
        $dados = array(
            'id' => $id
        );
        if($deletado == false){
            echo base_url('Menu');
        } else {
            //Gravando log
            $nome = $this->Curso_model->RetornaNomeCurso($deletado);
            $texto = "O curso " .  $nome->cursonome . " foi deletado";
            echo $this->Auditoria->gravandoLog($texto);
            echo '<script>alert("Curso excluido com sucesso")</script>';
            redirect('Menu');
        }
    }

    public function AtualizaCurso(){

        $this->load->model('Curso_model');

        $cursoid = $this->input->post('cursoid');
        $cursonome = $this->input->post('cursonome');
        $cargahoraria = ($this->input->post('cargahoraria'));
        $ementa = $this->input->post('ementa');
        $bibliografia = $this->input->post('bibliografia');
        $modocurso = $this->input->post('modocurso');
        $origem = $this->input->post('origem');
        $situacao = $this->input->post('situacao');
        if($situacao == "ativo"){
            $situacao = true;
        }elseif ($situacao == "inativo"){
            $situacao = false;
        }

        $dadosCurso = array(
            'cursoid' => $cursoid,
            'cursonome' => $cursonome,
            'cargahoraria' => $cargahoraria,
            'ementa' => $ementa,
            'bibliografia' => $bibliografia,
            'modocurso' => $modocurso,
            'origemcurso' => $origem,
            'situacao' => $situacao
        );

        $atualizado = $this->Curso_model->atualizaCurso($dadosCurso);
        if($atualizado){
            echo '<script>alert("O curso foi atualizado com sucesso");</script>';
            redirect('Menu');
        }
    }

}
