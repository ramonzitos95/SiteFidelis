<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by Ramon.
 * User: Usuario
 * Date: 14/10/2016
 * Time: 12:40
 * /**
 * Implementa o CURL e configura o endereço do webservice
 * de consulta o CEP.
 *
 * @author Ramon S. S.
 */

class Auditoria
{

    public function gravandoLog($texto)
    {
        $dadosLogin = array(
            'loghora' => time(),
            'logdata' => date('y-m-d'),
            'logtexto' => $texto
        );
        $this->Auditoria_model->logar($dadosLogin);
    }
}
