<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Usuario_Controller extends CI_Controller
{

    private $usuarios;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('usuario_model');
        
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->usuarios = $this->usuario_model->fetch_all();
    }

    public function index()
    {
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
        
        if ($this->form_validation->run() == false) {
            $this->load->view('usuarios/adicionar_view');
        } else {
            
            $nome = $this->input->post("nome");
            $matricula = $this->input->post("matricula");
            $senha = $this->input->post("senha");
            $hash_senha = password_hash($senha, PASSWORD_DEFAULT, ['cost' => 12]);
            
            $data = array(
                "nome" => $nome,
                "matricula" => $matricula,
                "senha" => $hash_senha,
            );
        
            $this->usuario_model->insert($data);

            redirect('usuarios');
        }
    }

    public function editar($id)
    {
        echo "editar ".$id;
    }
    public function deletar($id)
    {
        $this->usuario_model->delete($id);
        redirect('usuarios');
    }
}
