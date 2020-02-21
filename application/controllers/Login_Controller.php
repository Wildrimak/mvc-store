<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login_Controller extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
       
        if ($this->usuario_model->count_all() < 1) {
            $this->load->view('usuarios/adicionar_view');
        }
    }

    public function index()
    {
        if ($this->usuario_model->count_all() < 1) {
            return;
        }

        $this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('login/login_view');
        } else {
            $matricula = $this->input->post("matricula");
            $senha = $this->input->post("senha");
            $user = $this->usuario_model->get_by_matricula($matricula);

            if (!$user or !password_verify($senha, $user["senha"])) {
                $this->session->set_flashdata('authError', 'Matrícula ou senha inválidas!');
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
