<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));

        $this->load->library(array('form_validation', 'Imagem'));
        $this->obj_Imagem = new Imagem();

        $this->load->model('Empresa_Model');
        $this->obj_Empresa_Model = new Empresa_Model();
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
        $config['upload_path']          = base_url('/assets/img');
        $config['allowed_types']        = 'gif|jpg|png';
        $config['max_size']             = 100;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;    

        $this->load->library('upload', $config);

        if ( ! $this->upload->do_upload('userfile'))
        {
            $error = array('error' => $this->upload->display_errors());
            //$this->load->view('upload_form', $error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
            //$this->load->view('upload_success', $data);
        }

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
        $foto = $_FILES['foto'];
        $caminhoFoto = $config['upload_path'] 
        echo $caminhoFoto;

        if($situacao == "ativo"){
            $situacao = true;
        }elseif ($situacao == "inativo"){
            $situacao = false;
        }

        $dadosCurso = array(
            //'empresaid' => $empresaid,
            'razaosocial' => $razaosocial,
            'cnpj' => $cnpj,
            'cep' => $cep,
            'site' => $site,
            'telefone' => $telefone,
            'endereco' => $endereco,
            'cidade' => $cidade,
            'estado' => $estado,
            'datacadastro' => $datacadastro,
            'situacao' => $situacao,
            'foto' => $caminhoFoto
        );

        $cadastrado = $this->obj_Empresa_Model->CadastrarEmpresa($dadosCurso);


//        if ($this->form_validation->run() == FALSE)
//        {
//            $this->load->view('menu');
//        }
//        else
//        {
//            If($cadastrado){
//                redirect('Grade');
//            }else{
//                $this->load->view('Error_view');
//            }
//        }
    }

    public function Consultar()
    {
        $this->load->model('Curso_model');
        $dados['empresas'] = $this->obj_Empresa_Model->listaEmpresas();
        $this->load->view('Empresa/ConsultaEmpresa_view', $dados);
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
        $dados['empresas'] = $this->obj_Empresa_Model->listaCursoFiltro($dadosFiltro);

        $this->load->view('Empresa/ConsultaEmpresaFiltro_view', $dados);
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
