<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pessoa extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->library(array('form_validation','Auditoria'));
        $this->load->model(array('Pessoa_model',
                                'Turma_model',
                                'Auditoria_model',
                                'cidades_model'));
    }

    function index()
    {
        $dados['turmas'] = $this->Turma_model->listaTurmas();
        //$dados['estados'] = $this->cidades_model->getEstados();
        $this->load->view('Pessoa/cadastrarPessoa_view', $dados);
    }

    function cadastro()
    {
        $turma = $this->input->post('turma');
        $nome = $this->input->post('nome');
        $cpf = $this->input->post('cpf');
        $rg = $this->input->post('rg');
        $endereco = $this->input->post('endereco');
        $email = $this->input->post('email');
        $cidade = $this->input->post('cidade');
        $bairro = $this->input->post('bairro');
        $estado = $this->input->post('estado');
        $telefone = $this->input->post('telefone');
        $celular = $this->input->post('celular');
        $cep = $this->input->post('cep');
        $estadocivil = $this->input->post('estadocivil');
        $datanascimento = $this->input->post('datanascimento');
        $grauescolaridade = $this->input->post('grauescolar');
        $disciplinaextra = $this->input->post('extra');
        $naturalidade = $this->input->post('naturalidade');
        $matricula = $this->input->post('matricula');
        //Verificando o tipo de usuário para gravar o atributo na tabela
        $tipousuario = $this->session->userdata('tipousuario');
        $id = $this->session->userdata('id');
        if($tipousuario == "aluno"){
            $idUsuarioAluno = $id;
        } elseif ($tipousuario == "colaborador"){
            $idUsuarioColaborador = $id;
        }
        $dadosPessoa = array(
            'turma_turmaid' => $turma,
            'colaborador_idcolaborador' => $idUsuarioColaborador,
            'aluno_idaluno' => $idUsuarioAluno,
            'nome' => $nome,
            'cpf' => $cpf,
            'rg' => $rg,
            'endereco' => $endereco,
            'email' => $email,
            'cidade' => $cidade,
            'bairro' => $bairro,
            'estado' => $estado,
            'telefone' => $telefone,
            'celular' => $celular,
            'cep' => $cep,
            'estadocivil' => $estadocivil,
            'datanascimento' => $datanascimento,
            'grauescolaridade' => $grauescolaridade,
            'disciplinaextra' => $disciplinaextra,
            'naturalidade' => $naturalidade,
            'matricula' => $matricula
        );

        //Validando formulário
        $this->form_validation->set_rules('turma', 'required');
        $this->form_validation->set_rules('cpf', 'required');
        $this->form_validation->set_rules('rg', 'required');
        $this->form_validation->set_rules('email', 'required', 'valid_email');
        $this->form_validation->set_rules('telefone', 'required');
        $this->form_validation->set_rules('celular', 'required');
        $this->form_validation->set_rules('datanascimento', 'required');
        $this->form_validation->set_rules('matricula', 'required');

        //Cadastrando a pessoa
        $foiCadastradoPessoa = $this->Pessoa_model->CadastrarPessoa($dadosPessoa);

        if ($this->form_validation->run() == FALSE) {
            echo validation_errors();
        }
        else
        {
            if($foiCadastradoPessoa)
            {
                $textoLog = "Foi cadastrado a pessoa: " . $nome . " do tipo " . $tipousuario;
                echo $this->Auditoria->gravandolog($textoLog);
                echo ("<script>alert('Usuário: ' + $nome + ' foi cadastrado com sucesso' + ' do tipo ' + $tipousuario)</script>");
                redirect('login');
            }
            else
            {
                echo "Houve algum erro ao cadastrar a pessoa";
            }
        }

    }




}


