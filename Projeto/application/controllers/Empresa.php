<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->model('Auditoria_model');
        $this->load->library('form_validation');
        $this->load->model('Empresa_Model');
    }

    public function index()
    {
        $this->load->view('Empresa/cadastroEmpresa_view');
    }

    public function Alteracao($cursoid)
    {
        $dados['curso'] = $this->Curso_model->listaCurso($cursoid);
        $this->load->View('Curso/AtualizaCurso_view', $dados);
    }

    public function cadastrarEmpresa()
    {
        $this->load->model('Empresa_Model');

        //$this->load->library('form_validation');

        $empresaid = 0;
        $razaosocial = $this->input->post('razaosocial');
        $cnpj = ($this->input->post('cnpj'));
        $cep = $this->input->post('cep');
        $site = $this->input->post('site');
        $telefone = $this->input->post('telefone');
        $endereco = $this->input->post('endereco');
        $cidade = $this->input->post('cidade');
        $estado = $this->input->post('estado');
        $datacadastro = $this->input->post('datacadastro');
        $situacao = $this->input->post('situacao');

        if($situacao == "ativo"){
            $situacao = true;
        }elseif ($situacao == "inativo"){
            $situacao = false;
        }

        $empresaid = $this->Empresa_Model->Serializa();

        $dadosCurso = array(
            'empresaid' => $empresaid,
            'razaosocial' => $razaosocial,
            'cnpj' => $cnpj,
            'cep' => $cep,
            'site' => $site,
            'telefone' => $telefone,
            'endereco' => $endereco,
            'cidade' => $cidade,
            'estado' => $estado,
            'datacadastro' => $datacadastro,
            'situacao' => $situacao
        );

        $cadastrado = $this->Empresa_Model->CadastrarEmpresa($dadosCurso);


        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('menu');
        }
        else
        {
            If($cadastrado){
                redirect('Grade');
            }else{
                $this->load->view('Error_view');
            }
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
