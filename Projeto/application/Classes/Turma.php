<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 03/10/2016
 * Time: 22:21
 */
class Turma
{
    private $turmaid;
    private $turmanome;

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
    public function getTurmanome()
    {
        return $this->turmanome;
    }

    /**
     * @param mixed $turmanome
     */
    public function setTurmanome($turmanome)
    {
        $this->turmanome = $turmanome;
    }


}