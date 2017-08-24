<?php
/**
 * Created by PhpStorm.
 * User: Ramon
 * Date: 24/08/2017
 * Time: 00:12
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        session_destroy();
        array();
        redirect('Login');
    }
}