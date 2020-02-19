<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
    }

    public function index()
    {
        $this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|min_length[5]|max_length[12]');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[4]');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('login_view');
        } else {
            $matricula = $this->input->post("matricula");
            $senha = $this->input->post("senha");
            $user = $this->usuario_model->get_by_matricula($matricula);

            if (!$user) {
                redirect(uri_string());
            }
        
            if (!password_verify($senha, $user["senha"])) {
                redirect(uri_string());
            }

            $data_user = array(
                'id' => $user["id"],
                'matricula' => $user["matricula"],
            );
                        
            $this->session->set_userdata($data_user);
            redirect('usuarios');
        }
    }
 
    public function logout()
    {
        $this->session->sess_destroy();
        redirect('login');
    }
}
