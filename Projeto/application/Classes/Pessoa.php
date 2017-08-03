<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 03/10/2016
 * Time: 22:17
 */
class Pessoa
{
    private $pessoaid;
    private $turma;
    private $colaborador;
    private $idaluno;
    private $nome;
    private $cpf;
    private $rg;
    private $endereco;
    private $email;
    private $cidade;
    private $bairro;
    private $estado;
    private $telefone;
    private $celular;
    private $cep;
    private $estadocivil;
    private $datanascimento;
    private $grauescolaridade;
    private $disciplinaextra;
    private $naturalidade;
    private $matricula;

    /**
     * @return mixed
     */
    public function getPessoaid()
    {
        return $this->pessoaid;
    }

    /**
     * @param mixed $pessoaid
     */
    public function setPessoaid($pessoaid)
    {
        $this->pessoaid = $pessoaid;
    }

    /**
     * @return mixed
     */
    public function getTurma()
    {
        return $this->turma;
    }

    /**
     * @param mixed $turma
     */
    public function setTurma($turma)
    {
        $this->turma = $turma;
    }

    /**
     * @return mixed
     */
    public function getColaborador()
    {
        return $this->colaborador;
    }

    /**
     * @param mixed $colaborador
     */
    public function setColaborador($colaborador)
    {
        $this->colaborador = $colaborador;
    }

    /**
     * @return mixed
     */
    public function getIdaluno()
    {
        return $this->idaluno;
    }

    /**
     * @param mixed $idaluno
     */
    public function setIdaluno($idaluno)
    {
        $this->idaluno = $idaluno;
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
    public function getCpf()
    {
        return $this->cpf;
    }

    /**
     * @param mixed $cpf
     */
    public function setCpf($cpf)
    {
        $this->cpf = $cpf;
    }

    /**
     * @return mixed
     */
    public function getRg()
    {
        return $this->rg;
    }

    /**
     * @param mixed $rg
     */
    public function setRg($rg)
    {
        $this->rg = $rg;
    }

    /**
     * @return mixed
     */
    public function getEndereco()
    {
        return $this->endereco;
    }

    /**
     * @param mixed $endereco
     */
    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getCidade()
    {
        return $this->cidade;
    }

    /**
     * @param mixed $cidade
     */
    public function setCidade($cidade)
    {
        $this->cidade = $cidade;
    }

    /**
     * @return mixed
     */
    public function getBairro()
    {
        return $this->bairro;
    }

    /**
     * @param mixed $bairro
     */
    public function setBairro($bairro)
    {
        $this->bairro = $bairro;
    }

    /**
     * @return mixed
     */
    public function getEstado()
    {
        return $this->estado;
    }

    /**
     * @param mixed $estado
     */
    public function setEstado($estado)
    {
        $this->estado = $estado;
    }

    /**
     * @return mixed
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * @param mixed $telefone
     */
    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;
    }

    /**
     * @return mixed
     */
    public function getCelular()
    {
        return $this->celular;
    }

    /**
     * @param mixed $celular
     */
    public function setCelular($celular)
    {
        $this->celular = $celular;
    }

    /**
     * @return mixed
     */
    public function getCep()
    {
        return $this->cep;
    }

    /**
     * @param mixed $cep
     */
    public function setCep($cep)
    {
        $this->cep = $cep;
    }

    /**
     * @return mixed
     */
    public function getEstadocivil()
    {
        return $this->estadocivil;
    }

    /**
     * @param mixed $estadocivil
     */
    public function setEstadocivil($estadocivil)
    {
        $this->estadocivil = $estadocivil;
    }

    /**
     * @return mixed
     */
    public function getDatanascimento()
    {
        return $this->datanascimento;
    }

    /**
     * @param mixed $datanascimento
     */
    public function setDatanascimento($datanascimento)
    {
        $this->datanascimento = $datanascimento;
    }

    /**
     * @return mixed
     */
    public function getGrauescolaridade()
    {
        return $this->grauescolaridade;
    }

    /**
     * @param mixed $grauescolaridade
     */
    public function setGrauescolaridade($grauescolaridade)
    {
        $this->grauescolaridade = $grauescolaridade;
    }

    /**
     * @return mixed
     */
    public function getDisciplinaextra()
    {
        return $this->disciplinaextra;
    }

    /**
     * @param mixed $disciplinaextra
     */
    public function setDisciplinaextra($disciplinaextra)
    {
        $this->disciplinaextra = $disciplinaextra;
    }

    /**
     * @return mixed
     */
    public function getNaturalidade()
    {
        return $this->naturalidade;
    }

    /**
     * @param mixed $naturalidade
     */
    public function setNaturalidade($naturalidade)
    {
        $this->naturalidade = $naturalidade;
    }

    /**
     * @return mixed
     */
    public function getMatricula()
    {
        return $this->matricula;
    }

    /**
     * @param mixed $matricula
     */
    public function setMatricula($matricula)
    {
        $this->matricula = $matricula;
    }


}