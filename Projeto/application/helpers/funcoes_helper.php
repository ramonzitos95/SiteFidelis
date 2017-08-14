<?php

/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 12/09/2016
 * Time: 23:51
 */


defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('set_mensagem_sessao')) {

    /**
     * Funcao para atribuir a sessao uma mensagem que sera exibida ao usuário
     * @access public
     * @param String $mensagem Mensagem
     * @return void */
    function set_mensagem_sessao($mensagem = NULL) {
        $ci = & get_instance();
        $ci->session->set_userdata('mensagem', $mensagem);
    }

}

if (!function_exists('get_mensagem_sessao')) {

    /**
     * Funcao para pegar a mensagem da sessao atribuida atraves da funcao setMensagemSessao,
     * apos sua execucao esta funcao apaga ou não a mensagem, conforme definido no parametro.
     * @access public
     * @author Siluana Klein
     * @param Boolean $destroy Variavel verificada para excluir (ou nao) a mensagem da session
     * @return String    */
    function get_mensagem_sessao($destroy = TRUE) {
        $ci = & get_instance();
        $retorno = $ci->session->userdata('mensagem');
        if ($destroy)
            $ci->session->unset_userdata('mensagem');
        return $retorno;
    }
}

if (!function_exists('verifica_login')) {

    /**
     * Funcao que verifica se o usuário está ou não logado. Caso não esteja logado, por padrão,
     * o usuário é direcionado para a funcão 'login' do 'Main controller'
     * @access public
     * @author Siluana Klein
     * @param String $redirect Caso queira redirecionar para função diferente da default
     * @return Void */
    function verifica_login($redirect = 'login') {
        $ci = & get_instance();
        $uri_destino = uri_string();
        //verifica se as existem todas as informações da session e se o token é válido 
        date_default_timezone_set('America/Sao_Paulo');
        if (!($ci->session->has_userdata('id_usuario')) or ! ($ci->session->has_userdata('nm_nome'))
            or ! ($ci->session->has_userdata('usuario')) or
            $ci->obj_controller_model->valida_token($ci->session->userdata('tx_token'), date('Y-m-d'), $ci->session->userdata('tipo_usuario'), $ci->session->userdata('id_usuario'))) {
            if($this->session->has_userdata('tx_token')){
                $this->obj_controller_model->excluir_token($this->session->userdata('tx_token'));
            }
            $ci->obj_controller_model->excluir_tokens_vencidos(date('Y-m-d'));
            if (($uri_destino == '') or ( is_null($uri_destino)) or ( $uri_destino == 'logout')) {
                $ci->session->set_userdata('uri_destino', 'home');
            } else {
                $ci->session->set_userdata('uri_destino', $uri_destino);
            }
            $this->session->sess_destroy();
            $ci->session->set_userdata('mensagem', 'Acesso restrito! Faça login para continuar.');
            redirect($redirect, 'refresh');
        }
    }

}
