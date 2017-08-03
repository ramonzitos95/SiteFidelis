<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Grade extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model(array('Curso_model', 'Disciplina_model', 'Turma_model', 'Grade_model', 'Auditoria_model'));
        $this->load->library(Aray('form_validation', 'Auditoria'));
    }

    public function index(){
        $dados['title']   = 'Cadastro de Grades';
        $dados['cursos'] = $this->Curso_model->listaCursos();
        $dados['disciplinas'] = $this->Disciplina_model->listaDisciplinas();
        $dados['turmas'] = $this->Turma_model->listaTurmas();
        $this->load->view('Grade/Grade_view', $dados);
	}

	public function validaGrade(){
	    $this->load->helper('form');

        $codigoGrade = $this->input->post('gradeid');
        $curso = $this->input->post('cursos');
        $turma = $this->input->post('turma');
        $semestreano = $this->input->post('semestreano');
        $cargahoraria = $this->input->post('cargahoraria');
        $diasemana = $this->input->post('diasemana');
        $disciplina = $this->input->post('disciplina');
        $datavalidade = $this->input->post('datavalidade');
        $datacadastro = date('Y-m-d');

        $dadosGrade = array(
            'gradeid' => $codigoGrade,
            'curso_cursoid' => $curso,
            'pessoa_turma_turmaid' => $turma,
            'semestreano' => $semestreano,
            'cargahoraria' => $cargahoraria,
            'diasemana' => $diasemana,
            'disciplinaid' => $disciplina,
            'datavalidade' => $datavalidade,
            'datacadastro' => $datacadastro
        );

        //Validando formulário
        $this->form_validation->set_rules('gradeid', 'required');
        $this->form_validation->set_rules('curso_cursoid', 'required');
        $this->form_validation->set_rules('pessoa_turma_id', 'required');
        $this->form_validation->set_rules('cargahoraria', 'required');
        $this->form_validation->set_rules('datavalidade', 'required');

        $cadastrado = $this->Grade_model->CadastrarGrade($dadosGrade);

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Login');
        }
        else
        {
            If($cadastrado){
                $texto = "Foi cadastrado a grade" . $codigoGrade;
                echo $this->Auditoria->gravandolog($texto);
                redirect('Grade');
            }else{
                $this->load->view('Error_view');
            }
        }
    }

    public function Consultar()
    {
        $dados['grades'] = $this->Grade_model->listaGrades();
        $this->load->view('Grade/ConsultaGrade_view', $dados);
    }

    public function DeletarGrade($id)
    {
        $this->load->model('Grade_model');
        $deletado = $this->Grade_model->DeletarGrade($id);
        if($deletado == false){
            echo base_url('Menu');
        } else {

            echo '<script>alert("Grade excluida com sucesso")</script>';
            redirect('Menu');
        }
    }

    public function Alteracao($gradeid)
    {
        $dados['grade'] = $this->Grade_model->listaCurso($gradeid);
        $dados['cursos'] = $this->Curso_model->listaCursos();
        $dados['disciplinas'] = $this->Disciplina_model->listaDisciplinas();
        $dados['turmas'] = $this->Turma_model->listaTurmas();
        $this->load->View('Grade/AtualizaGrade_view', $dados);
    }

    public function AtualizarGrade()
    {
        $this->load->helper('form');

        $codigoGrade = $this->input->post('gradeid');
        $curso = $this->input->post('cursos');
        $turma = $this->input->post('turma');
        $semestreano = $this->input->post('semestreano');
        $cargahoraria = $this->input->post('cargahoraria');
        $diasemana = $this->input->post('diasemana');
        $disciplina = $this->input->post('disciplina');
        $datavalidade = $this->input->post('datavalidade');
        $datacadastro = date('Y-m-d');

        $dadosGrade = array(
            'gradeid' => $codigoGrade,
            'curso_cursoid' => $curso,
            'pessoa_turma_turmaid' => $turma,
            'semestreano' => $semestreano,
            'cargahoraria' => $cargahoraria,
            'diasemana' => $diasemana,
            'disciplinaid' => $disciplina,
            'datavalidade' => $datavalidade,
            'datacadastro' => $datacadastro
        );

        //Validando formulário
        $this->form_validation->set_rules('gradeid', 'required');
        $this->form_validation->set_rules('curso_cursoid', 'required');
        $this->form_validation->set_rules('pessoa_turma_id', 'required');
        $this->form_validation->set_rules('cargahoraria', 'required');
        $this->form_validation->set_rules('datavalidade', 'required');

        $atualizado = $this->Grade_model->AtualizarGrade($dadosGrade);

        if ($this->form_validation->run() == FALSE)
        {
            $this->load->view('Login');
        }
        else
        {
            If($atualizado){
                $texto = "Foi cadastrado a grade" . $codigoGrade;
                echo $this->Auditoria->gravandolog($texto);
                redirect('Grade');
            }else{
                $this->load->view('Error_view');
            }
        }
    }
}
