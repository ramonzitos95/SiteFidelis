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

class Curl
{
    private $endereco_ws = "http://viacep.com.br/ws";
    private $url_ws;

    public function consulta($cep) {

        $this->url_ws = $this->endereco_ws . '/' . $cep . '/json/';

        // abre a conexão
        $ch = curl_init();

        // define url
        curl_setopt($ch, CURLOPT_URL, $this->url_ws);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // executa o post
        $resultado = curl_exec($ch);

        if (curl_error($ch)) {
            echo 'Erro:' . curl_error($ch);
            return false;
        }
        return $resultado;

        // fecha a conexão
        curl_close($ch);

    }
}