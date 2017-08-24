<?php
//defined('BASEPATH') OR exit('No direct script access allowed');

class Promocao extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'Imagem'));
        $this->obj_Imagem = new Imagem();

        $this->load->model(array('Promocao_Model'));
        $this->obj_PromocaoModel = new Promocao_Model();

        $this->load->model(array('Promocao_DAO'));
        $this->obj_PromocaoDAO = new Promocao_DAO();

        $this->load->model(array('Empresa_Promocao'));
        $this->obj_Empresa_Promocao = new Empresa_Promocao();
    }

    public function index(){
        $this->novo();
    }

    public function novo()
    {
        $this->load->library('session');
        $dados['title'] = 'Cadastro de Promoção';
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $dados['empresaid'] = $this->session->userdata('empresa_id');
        $dados['action'] =  'Promocao/cadastrarPromocao';
        $dados['titulobotao'] =  'Cadastrar';
        $this->load->view('Promocao/CadastroPromocao_View', $dados);
    }

    public function Alterar($id){
        $this->load->library('session');
        $dados['title'] = 'Alteração de Promoção';
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $dados['empresaid'] = $this->session->userdata('empresa_id');
        $dadosPromocao = $this->obj_PromocaoDAO->listaPromocao($id);
        $dados['obj_promocao_model'] = $dadosPromocao;
        $dados['title'] = "Alterar Promoção";
        $dados['action'] = 'Promocao/AtualizarPromocao';
        $dados['tituloprincipal'] = 'Atualizaçao da Empresa';
        $dados['titulobotao'] = 'Atualizar';
        $this->load->view('Promocao/AtualizaPromocao_View', $dados);
    }

    public function Alteracao($cursoid)
    {
        $dados['curso'] = $this->Curso_model->listaCurso($cursoid);
        $this->load->View('Promocao/AtualizaPromocao_View', $dados);
    }

    public function cadastrarPromocao()
    {
        $this->load->library('form_validation');
        //Validando o nome
        $this->form_validation->set_rules('descricaopromocao', 'Descrição da Promoção', 'required|trim', array('required' => 'Você deve preencher a %s.'));
        $this->form_validation->set_rules('produto', 'Produto', 'required|trim', array('required' => 'Você deve preencher o %s.'));

        // definimos um nome aleatório para o diretório
        // definimos o path onde o arquivo será gravado
        $foto = $_FILES['foto'];
        $path = "./assets/img/promocao";
        $nomeFoto = $this->input->post("descricaopromocao");
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
        $this->upload->do_upload('foto');
        $data = $this->upload->data();
        $nomearquivo = $data["file_name"]; //Nome do Arquivo   

//        if ( ! $this->upload->do_upload('foto')) //se o upload foi processado
//            set_mensagem_sessao($this->upload->display_errors());

        $caminho_inteiro = str_replace("./", "", base_url($configUpload['upload_path']));
        $this->obj_PromocaoModel->foto = $caminho_inteiro; //Caminho da foto
        $this->obj_PromocaoModel->arquivo = $nomearquivo;  

        $this->input->post();
        if ($this->form_validation->run() == FALSE)
        {
            set_mensagem_sessao(validation_errors());
            $this->novo();
        }
        else
        {
            $dados_form = $this->input->post();
            $this->obj_PromocaoModel->preencher_do_post($dados_form);

            //Associando dados da promoção, para criar a relação entre tabela de empresa e promoção
            $this->obj_Empresa_Promocao->descricaopromocao = $this->obj_PromocaoModel->descricaopromocao;
            $this->obj_Empresa_Promocao->razaosocial = $this->session->userdata('empresa_nome');
            $this->obj_Empresa_Promocao->empresaid = $this->obj_PromocaoModel->empresa;
            $PromocaoCadastrada = $this->obj_PromocaoDAO->CadastrarPromocao($this->obj_PromocaoModel);

            if ($PromocaoCadastrada) {
                $this->obj_Empresa_Promocao->promocaoid = $this->obj_PromocaoDAO->BuscaUltimaPromocao();
                $this->obj_PromocaoDAO->CadastrarEmpresaNaPromocao($this->obj_Empresa_Promocao);
                set_mensagem_sessao("Cadastro realizado com sucesso!");
                $this->novo();
            } else {
                set_mensagem_sessao("Não foi possível realizar seu cadastro, por favor tente novamente!");
                $this->novo();
            }
        }
    }

    public function ConsultarPromocao()
    {
        $dados['promocoes'] = $this->obj_PromocaoDAO->listaPromocoes();
        $this->load->view('Promocao/ConsultaPromocao_view', $dados);
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
        if($this->obj_PromocaoDAO->DeletarPromocao($id)){
            $this->ConsultarPromocao();
        } else {
            $this->ConsultarPromocao();
        }
    }

    public function AtualizarPromocao(){
        $this->load->library('form_validation');
        //Validando o nome
        $this->form_validation->set_rules('descricaopromocao', 'Descrição da Promoção', 'required|trim', array('required' => 'Você deve preencher a %s.'));
        $this->form_validation->set_rules('produto', 'Produto', 'required|trim', array('required' => 'Você deve preencher o %s.'));

        // definimos um nome aleatório para o diretório
        // definimos o path onde o arquivo será gravado
        $foto = $_FILES['foto'];
        $path = "./assets/img/promocao";
        $nomeFoto = $this->input->post("descricaopromocao");
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
        $this->upload->do_upload('foto');
        $data = $this->upload->data();
        $nomearquivo = $data["file_name"]; //Nome do Arquivo

//        if ( ! $this->upload->do_upload('foto')) //se o upload foi processado
//            set_mensagem_sessao($this->upload->display_errors());

        $caminho_inteiro = str_replace("./", "", base_url($configUpload['upload_path']));
        $this->obj_PromocaoModel->foto = $caminho_inteiro; //Caminho da foto
        $this->obj_PromocaoModel->arquivo = $nomearquivo;

        $this->input->post();
        if ($this->form_validation->run() == FALSE)
        {
            set_mensagem_sessao(validation_errors());
            $this->novo();
        }
        else
        {
            $dados_form = $this->input->post();
            $this->obj_PromocaoModel->preencher_do_post($dados_form);
            //Associando dados da promoção, para criar a relação entre tabela de empresa e promoção
            $PromocaoAtualizada = $this->obj_PromocaoDAO->AtualizarPromocao($this->obj_PromocaoModel);
            if ($PromocaoAtualizada) {
                set_mensagem_sessao("Promoção atualizada com sucesso!");
                $this->Alterar($this->obj_PromocaoModel->promocaoid);
            } else {
                set_mensagem_sessao("Não foi possível realizar seu cadastro, por favor tente novamente!");
                $this->Alterar($this->obj_PromocaoModel->promocaoid);
            }
        }
    }

    public function consultaPromocaoWS() {
        $dados['empresas'] = $this->obj_PromocaoModel->listaEmpresasArray();
        $json = json_encode($dados);

        echo $json;
    }

}
