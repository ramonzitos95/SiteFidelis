<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 03/10/2016
 * Time: 22:11
 */
class Grade
{
    private $gradeid;
    private $cursoid;
    private $turmaid;
    private $usuarioid;
    private $semestreano;
    private $cargahoraria;
    private $diasemana;
    private $disciplinaid;
    private $datavalidade;
    private $datacadastro;

    /**
     * @return mixed
     */
    public function getGradeid()
    {
        return $this->gradeid;
    }

    /**
     * @param mixed $gradeid
     */
    public function setGradeid($gradeid)
    {
        $this->gradeid = $gradeid;
    }

    /**
     * @return mixed
     */
    public function getCursoid()
    {
        return $this->cursoid;
    }

    /**
     * @param mixed $cursoid
     */
    public function setCursoid($cursoid)
    {
        $this->cursoid = $cursoid;
    }

    /**
     * @return mixed
     */
    public function getTurmaid()
    {
        return $this->turmaid;
    }

    /**
     * @param mixed $turmaid
     */
    public function setTurmaid($turmaid)
    {
        $this->turmaid = $turmaid;
    }

    /**
     * @return mixed
     */
    public function getUsuarioid()
    {
        return $this->usuarioid;
    }

    /**
     * @param mixed $usuarioid
     */
    public function setUsuarioid($usuarioid)
    {
        $this->usuarioid = $usuarioid;
    }

    /**
     * @return mixed
     */
    public function getSemestreano()
    {
        return $this->semestreano;
    }

    /**
     * @param mixed $semestreano
     */
    public function setSemestreano($semestreano)
    {
        $this->semestreano = $semestreano;
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
    public function getDiasemana()
    {
        return $this->diasemana;
    }

    /**
     * @param mixed $diasemana
     */
    public function setDiasemana($diasemana)
    {
        $this->diasemana = $diasemana;
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
    public function getDatavalidade()
    {
        return $this->datavalidade;
    }

    /**
     * @param mixed $datavalidade
     */
    public function setDatavalidade($datavalidade)
    {
        $this->datavalidade = $datavalidade;
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



}