<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 24/09/2016
 * Time: 22:59
 */
class Curso
{
    private $cursoid;
    private $cursonome;
    private $cargahoraria;
    private $ementa;
    private $bibliografia;
    private $modocurso;
    private $origemcurso;
    private $situacao;

    /**
     * Curso constructor.
     * @param $cursoid
     * @param $cursonome
     * @param $cargahoraria
     * @param $ementa
     * @param $bibliografia
     * @param $modocurso
     * @param $origemcurso
     * @param $situacao
     */
    public function __construct($cursoid, $cursonome, $cargahoraria, $ementa, $bibliografia, $modocurso, $origemcurso, $situacao)
    {
        $this->cursoid = $cursoid;
        $this->cursonome = $cursonome;
        $this->cargahoraria = $cargahoraria;
        $this->ementa = $ementa;
        $this->bibliografia = $bibliografia;
        $this->modocurso = $modocurso;
        $this->origemcurso = $origemcurso;
        $this->situacao = $situacao;
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
    public function getCursonome()
    {
        return $this->cursonome;
    }

    /**
     * @param mixed $cursonome
     */
    public function setCursonome($cursonome)
    {
        $this->cursonome = $cursonome;
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
    public function getBibliografia()
    {
        return $this->bibliografia;
    }

    /**
     * @param mixed $bibliografia
     */
    public function setBibliografia($bibliografia)
    {
        $this->bibliografia = $bibliografia;
    }

    /**
     * @return mixed
     */
    public function getModocurso()
    {
        return $this->modocurso;
    }

    /**
     * @param mixed $modocurso
     */
    public function setModocurso($modocurso)
    {
        $this->modocurso = $modocurso;
    }

    /**
     * @return mixed
     */
    public function getOrigemcurso()
    {
        return $this->origemcurso;
    }

    /**
     * @param mixed $origemcurso
     */
    public function setOrigemcurso($origemcurso)
    {
        $this->origemcurso = $origemcurso;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->situacao;
    }

    /**
     * @param mixed $situacao
     */
    public function setSituacao($situacao)
    {
        $this->situacao = $situacao;
    }




}