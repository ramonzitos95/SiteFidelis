<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper(array('form'));
        $this->load->library(array('form_validation', 'Imagem', 'session'));
        $this->obj_Imagem = new Imagem();

        $this->load->model(array('Empresa_DAO'));
        $this->obj_Empresa_DAO = new Empresa_DAO();

        $this->load->model(array('Empresa_Model'));
        $this->obj_Empresa_Model = new Empresa_Model();
    }

    public function novo()
    {
        $this->load->library('session');
        $dados['title'] = 'Menu';
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa_nome'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $dados['action'] = 'Empresa/CadastrarEmpresa';
        $dados['tituloprincipal'] = 'Cadastro de Empresa';
        $dados['tituloBotao'] = 'Cadastrar';
        $this->load->view('Empresa/CadastroEmpresa_view', $dados);
    }

    public function Alterar()
    {
        $this->load->library('session');
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $empresaid = $this->session->userdata('empresa_id');
        $dadosEmpresa = $this->obj_Empresa_DAO->buscaEmpresa($empresaid);
        $dados['obj_empresa_model'] = $dadosEmpresa;
        $dados['title'] = "Alterar Participante";
        $dados['action'] = 'Empresa/AtualizarEmpresa';
        $dados['tituloprincipal'] = 'Atualizaçao da Empresa';
        $dados['tituloBotao'] = 'Atualizar';
        $this->load->view('Empresa/CadastroEmpresa_view', $dados);
    }

     public function Alterar2($id)
    {
        $this->load->library('session');
        $dados['email'] =  $this->session->userdata('usuario');
        $dados['empresa'] =  $this->session->userdata('empresa_nome');
        $dados['site'] =  $this->session->userdata('site');
        $dadosEmpresa = $this->obj_Empresa_DAO->buscaEmpresa($id);
        $dados['obj_empresa_model'] = $dadosEmpresa;
        $dados['title'] = "Alterar Participante";
        $dados['action'] = 'Empresa/AtualizarEmpresa';
        $dados['tituloprincipal'] = 'Atualizaçao da Empresa';
        $dados['tituloBotao'] = 'Atualizar';
        $this->load->view('Empresa/CadastroEmpresa_view', $dados);
    }

    public function cadastrarEmpresa()
    {
        $this->load->library('form_validation');
        //Validando o nome
        $this->form_validation->set_rules('razaosocial', 'Razão social', 'required|trim', array('required' => 'Você deve preencher a %s.'));
        //Validando o CNPJ
        $this->form_validation->set_rules('cnpj', 'CPF', 'required|max_length[20]|trim|is_unique[empresa.cnpj]');
        //Validando o CEP
        $this->form_validation->set_rules('ds_cep', 'CEP', 'trim|max_length[10]');
        //Validando o Logradouro
        $this->form_validation->set_rules('endereco', 'Endereço', 'trim');
        //Validando a cidade
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim');
        //Validando o estado
        $this->form_validation->set_rules('estado', 'Estado', 'trim');
        // definimos um nome aleatório para o diretório
        // definimos o path onde o arquivo será gravado
        $foto = $_FILES['foto'];
        $path = "./assets/img/empresa";
        $nomeFoto = $this->input->post("razaosocial");
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
        $nomearquivo = $data["file_name"];
//        if ( ! $this->upload->do_upload('foto')) //se o upload foi processado
//        {
//            set_mensagem_sessao($this->upload->display_errors());
//            $this->novo();
//        }
//        else
//        {
//            $data = array('upload_data' => $this->upload->data());
//        }

        $this->obj_Empresa_Model->situacao = 1;
        $this->obj_Empresa_Model->foto = $configUpload['upload_path'];
        $this->obj_Empresa_Model->arquivo = $nomearquivo;  

        $this->input->post();
        if ($this->form_validation->run() == FALSE)
        {
            set_mensagem_sessao(validation_errors());
            $this->novo();
        }
        else
        {
            $dados_form = $this->input->post();
            $this->obj_Empresa_Model->preencher_do_post($dados_form);

            if ($this->obj_Empresa_DAO->CadastrarEmpresa($this->obj_Empresa_Model))
            {
                set_mensagem_sessao("Cadastro realizado com sucesso!");
                $this->novo();
            } 
            else 
            {
                set_mensagem_sessao("Não foi possível realizar seu cadastro, por favor tente novamente!");
                $this->novo();
            }
        }
    }

    public function Consultar()
    {
        $dados['empresas'] = $this->obj_Empresa_DAO->listaEmpresas();
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
        $dados['empresas'] = $this->obj_Empresa_DAO->listaEmpresaFiltro($dadosFiltro);

        $this->load->view('Empresa/ConsultaEmpresaFiltro_view', $dados);
    }


    public function DeletarEmpresa($id)
    {
        $deletado = $this->obj_Empresa_DAO->DeletarEmpresa($id);
        $dados = array(
            'id' => $id
        );
        if($deletado == false){
            echo base_url('Menu');
        } else {
            redirect('Empresa/Consultar');
        }
    }

    public function AtualizarEmpresa(){

        $this->load->library('form_validation');
        //Validando o nome
        $this->form_validation->set_rules('razaosocial', 'Razão social', 'required|trim', array('required' => 'Você deve preencher a %s.'));
        //Validando o CNPJ
        $this->form_validation->set_rules('cnpj', 'CNPJ', 'required|max_length[20]|trim');
        //Validando o CEP
        $this->form_validation->set_rules('ds_cep', 'CEP', 'trim|max_length[10]');
        //Validando o Logradouro
        $this->form_validation->set_rules('endereco', 'Endereço', 'trim');
        //Validando a cidade
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim');
        //Validando o estado
        $this->form_validation->set_rules('estado', 'Estado', 'trim');

        if ($this->form_validation->run() == false) {
            set_mensagem_sessao(validation_errors());
            $this->Alterar();
        } else {
            $dados_form = $this->input->post();
            $this->obj_Empresa_Model->preencher_do_post($dados_form);
        }

        $this->obj_Empresa_Model->empresaid = $this->input->post("empresaid");

        if ($this->obj_Empresa_DAO->AtualizarEmpresa($this->obj_Empresa_Model)) {
            set_mensagem_sessao("Atualização realizada com sucesso!");
            $this->Alterar();

        } else {
            set_mensagem_sessao("Não foi possível atualizar seu cadastro, por favor tente novamente!");
            $this->Alterar();
        }
    }

    public function consultaEmpresaWS() {
        $dados['empresas'] = $this->obj_Empresa_DAO->listaEmpresasArray();
        $json = json_encode($dados);
        //$json = serialize($json); //Converte para objeto
        echo $json;
    }

}
