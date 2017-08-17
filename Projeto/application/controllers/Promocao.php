<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'Imagem'));
        $this->obj_Imagem = new Imagem();

        $this->load->model(array('Promocao_Model'));
        $this->obj_PromocaoModel = new Promocao_Model();
    }

    public function view($page = '')
    {
        $dados['title'] = 'Cadastro de Promoção';
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $this->load->view('Promocao/CadastroPromocao_View', $dados);
    }

    public function cadastrar(){
        $dados['title'] = 'Cadastro de Promoção';
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $this->load->view('Promocao/CadastroPromocao_View', $dados);
    }

    public function Alteracao($cursoid)
    {
        $dados['curso'] = $this->Curso_model->listaCurso($cursoid);
        $this->load->View('Promocao/AtualizaPromocao_View', $dados);
    }

    public function cadastrarPromocao()
    {
        // definimos um nome aleatório para o diretório
        // definimos o path onde o arquivo será gravado
        $foto = $_FILES['foto'];
        $path = "./assets/img/promocao";
        $nomeFoto = "minhaimagem.jpg";
        if(!file_exists($path))
            mkdir($path, 0755);

        $configUpload['upload_path']          = $path;
        $configUpload['file_name']            = $nomeFoto;
        $configUpload['allowed_types']        = 'gif|jpg|png';
        $configUpload['max_size']             = 100;
        $configUpload['max_width']            = 1024;
        $configUpload['max_height']           = 768;

        // passamos as configurações para a library upload
        $this->load->library('upload');
        $this->upload->initialize($configUpload);

        if ( ! $this->upload->do_upload('foto')) //se o upload foi processado
        {
            set_mensagem_sessao($this->upload->display_errors());
            $this->index();
            //$error = array('error' => $this->upload->display_errors());
            //print_r($error);
        }
        else
        {
            $data = array('upload_data' => $this->upload->data());
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
        $caminhoFoto = $configUpload['upload_path'];
        $usuariologado = $this->session->userdata('usuario_id');
        //echo $caminhoFoto;

        if($situacao == "ativo"){
            $situacao = 1;
        }elseif ($situacao == "inativo"){
            $situacao = 0;
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
            'foto' => $caminhoFoto,
            'usuario' => $usuariologado
        );

        $cadastrado = $this->obj_PromocaoModel->CadastrarEmpresa($dadosCurso);

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
        $dados['empresas'] = $this->obj_PromocaoModel->listaEmpresas();
        $this->load->view('Empresa/ConsultaEmpresa_view', $dados);
    }

    public function ConsultaFiltro()
    {
        $operacao = $this->input->post('operacao');
        $dado = $this->input->post('dado');

        $dadosFiltro = array(
            'operacao' => $operacao,
            'dado' => $dado
        );
        $this->load->model('Curso_model');
        $dados['empresas'] = $this->obj_PromocaoModel->listaEmpresaFiltro($dadosFiltro);

        $this->load->view('Empresa/ConsultaEmpresaFiltro_view', $dados);
    }


    public function DeletarPromocao($id)
    {
        $deletado = $this->obj_PromocaoModel->DeletarEmpresa($id);
        $dados = array(
            'id' => $id
        );
        if($deletado == false){
            echo base_url('Menu');
        } else {
            redirect('Empresa/Consultar');
        }
    }

    public function AtualizarPromocao(){

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

    public function consultaPromocaoWS() {
        $dados['empresas'] = $this->obj_PromocaoModel->listaEmpresasArray();
        $json = json_encode($dados);

        echo $json;
    }

}
