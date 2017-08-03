<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 25/09/2016
 * Time: 18:10
 */
class Disciplina
{
    private $disciplinaid;
    private $nome;
    private $professor;
    private $cargahoraria;
    private $datacadastro;
    private $conceito;
    private $ementa;
    private $datainicio;
    private $situacaodisciplina;
    private $universidade;
    private $modalidade;

    /**
     * Disciplina constructor.
     * @param $disciplinaid
     * @param $nome
     * @param $professor
     * @param $cargahoraria
     * @param $datacadastro
     * @param $conceito
     * @param $ementa
     * @param $datainicio
     * @param $situacaodisciplina
     * @param $universidade
     * @param $modalidade
     */
    public function __construct($disciplinaid, $nome, $professor, $cargahoraria, $datacadastro, $conceito, $ementa, $datainicio, $situacaodisciplina, $universidade, $modalidade)
    {
        $this->disciplinaid = $disciplinaid;
        $this->nome = $nome;
        $this->professor = $professor;
        $this->cargahoraria = $cargahoraria;
        $this->datacadastro = $datacadastro;
        $this->conceito = $conceito;
        $this->ementa = $ementa;
        $this->datainicio = $datainicio;
        $this->situacaodisciplina = $situacaodisciplina;
        $this->universidade = $universidade;
        $this->modalidade = $modalidade;
    }

    /**
     * @return mixed
     */
    public function getDisciplinaid()
    {
        return $this->disciplinaid;
    }

    /**
     * @param mixed $disciplinaid
     */
    public function setDisciplinaid($disciplinaid)
    {
        $this->disciplinaid = $disciplinaid;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getProfessor()
    {
        return $this->professor;
    }

    /**
     * @param mixed $professor
     */
    public function setProfessor($professor)
    {
        $this->professor = $professor;
    }

    /**
     * @return mixed
     */
    public function getCargahoraria()
    {
        return $this->cargahoraria;
    }

    /**
     * @param mixed $cargahoraria
     */
    public function setCargahoraria($cargahoraria)
    {
        $this->cargahoraria = $cargahoraria;
    }

    /**
     * @return mixed
     */
    public function getDatacadastro()
    {
        return $this->datacadastro;
    }

    /**
     * @param mixed $datacadastro
     */
    public function setDatacadastro($datacadastro)
    {
        $this->datacadastro = $datacadastro;
    }

    /**
     * @return mixed
     */
    public function getConceito()
    {
        return $this->conceito;
    }

    /**
     * @param mixed $conceito
     */
    public function setConceito($conceito)
    {
        $this->conceito = $conceito;
    }

    /**
     * @return mixed
     */
    public function getEmenta()
    {
        return $this->ementa;
    }

    /**
     * @param mixed $ementa
     */
    public function setEmenta($ementa)
    {
        $this->ementa = $ementa;
    }

    /**
     * @return mixed
     */
    public function getDatainicio()
    {
        return $this->datainicio;
    }

    /**
     * @param mixed $datainicio
     */
    public function setDatainicio($datainicio)
    {
        $this->datainicio = $datainicio;
    }

    /**
     * @return mixed
     */
    public function getSituacaodisciplina()
    {
        return $this->situacaodisciplina;
    }

    /**
     * @param mixed $situacaodisciplina
     */
    public function setSituacaodisciplina($situacaodisciplina)
    {
        $this->situacaodisciplina = $situacaodisciplina;
    }

    /**
     * @return mixed
     */
    public function getUniversidade()
    {
        return $this->universidade;
    }

    /**
     * @param mixed $universidade
     */
    public function setUniversidade($universidade)
    {
        $this->universidade = $universidade;
    }

    /**
     * @return mixed
     */
    public function getModalidade()
    {
        return $this->modalidade;
    }

    /**
     * @param mixed $modalidade
     */
    public function setModalidade($modalidade)
    {
        $this->modalidade = $modalidade;
    }



}