<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_Controller extends CI_Controller
{
    private $usuarios;

    public function __construct()
    {
        parent::__construct();

        $this->load->model('usuario_model');
        
        if ($this->usuario_model->count_all() < 1) {
            $this->load->view('usuarios/adicionar_view');
        } elseif (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->usuarios = $this->usuario_model->fetch_all();
    }

    public function index()
    {
        if ($this->usuario_model->count_all() < 1) {
            return;
        }
        $data["usuarios"] = $this->usuarios;
        $this->load->view('usuarios/usuarios_view', $data);
    }

    public function adicionar()
    {
        $this->load->view('usuarios/adicionar_view');
    }

    public function salvar_usuario()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|max_length[1000]');
        $this->form_validation->set_rules('matricula', 'Matricula', 'trim|required|min_length[3]|max_length[100]|is_unique[usuarios.matricula]');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        $this->form_validation->set_rules('confirmar_senha', 'Confirmar Senha', 'required|matches[senha]');
        $this->form_validation->set_rules('status', 'Status', 'max_length[1]');
        
        if ($this->form_validation->run() == false) {
            if ($this->usuario_model->count_all() < 1) {
                return;
            }
            $this->load->view('usuarios/adicionar_view');
        } else {
            $nome = $this->input->post("nome");
            $matricula = $this->input->post("matricula");
            $senha = $this->input->post("senha");
            $hash_senha = password_hash($senha, PASSWORD_DEFAULT, ['cost' => 12]);
            $status = ($this->input->post("status")) ? $this->input->post("status") : 1 ;
            
            $data = array(
                "nome" => $nome,
                "matricula" => $matricula,
                "senha" => $hash_senha,
                "status" => $status,
            );
        
            $this->usuario_model->insert($data);

            redirect('usuarios');
        }
    }

    public function atualizar_usuario($id)
    {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|max_length[1000]');
        $this->form_validation->set_rules('matricula', 'Matricula', 'trim|min_length[3]|max_length[100]');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required');
        $this->form_validation->set_rules('nova_senha', 'Nova Senha', 'trim|required');
        $this->form_validation->set_rules('confirmar_senha', 'Confirmar Senha', 'trim|required|matches[nova_senha]');
        $this->form_validation->set_rules('status', 'Status', 'max_length[1]');
        
        if ($this->form_validation->run() == false) {
            $data["id"] = $id;
            $this->load->view('usuarios/editar_view', $data);
        } else {
            $nome = $this->input->post("nome");
            $matricula = $this->input->post("matricula");
            $senha = $this->input->post("senha");
            $nova_senha = $this->input->post("nova_senha");
            $hash_senha = password_hash($nova_senha, PASSWORD_DEFAULT, ['cost' => 12]);
            $status = (!empty($this->input->post("status"))) ? $this->input->post("status") : 1 ;
            
            $session_id = $this->session->userdata('id');

            $usuario_logado = $this->usuario_model->get($session_id);

            if (!$usuario_logado or !password_verify($senha, $usuario_logado["senha"])) {
                $this->session->set_flashdata('authError', 'Senha inválida!');
                redirect(uri_string(), 'refresh');
            }

            $data = array(
                "nome" => $nome,
                "matricula" => $matricula,
                "senha" => $hash_senha,
                "status" => $status,
            );
        
            $this->usuario_model->update($id, $data);
            redirect('usuarios');
        }
    }

    public function editar($id)
    {
        $data["id"] = $id;
        $this->load->view('usuarios/editar_view', $data);
    }
    public function deletar($id)
    {
        $this->usuario_model->delete($id);
        redirect('usuarios');
    }
}