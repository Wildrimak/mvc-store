<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuarios extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        
        if (!$this->session->userdata('id')) {
            redirect('login');
        }
    }

    public function index()
    {
        $data["usuarios"] = $this->usuario_model->fetch_all();
        $this->load->view('usuarios_view', $data);
    }
}
