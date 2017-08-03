<?php defined('BASEPATH') OR exit('No direct script access allowed');


/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 17/09/2016
 * Time: 21:08
 */
class cidades_model extends CI_Model
{
    function getEstados(){
        return $this->db->get('estado')->result();
    }

    function getCidades($id){
        return $this->db->get('cidade.id', 'cidade.nome')
            ->from('estado')
            ->join('cidade', 'cidade.id = estado.id')
            ->where(array('estado.id' => $id))
            ->get()->result();
    }
}