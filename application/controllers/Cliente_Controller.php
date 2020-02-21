<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Cliente_Controller extends CI_Controller
{
    private $clientes;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('cliente_model');
        $this->load->model('usuario_model');

        if ($this->usuario_model->count_all() < 1) {
            $this->load->view('usuarios/adicionar_view');
        } elseif (!$this->session->userdata('id')) {
            redirect('login');
        }
        
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->clientes = $this->cliente_model->fetch_all();
    }

    public function index()
    {
        if ($this->usuario_model->count_all() < 1) {
            return;
        }
        $data["clientes"] = $this->clientes;
        $this->load->view('clientes/clientes_view', $data);
    }

    public function adicionar()
    {
        $this->load->view('clientes/adicionar_view');
    }

    public function salvar_cliente()
    {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|max_length[1000]');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('rg', 'RG', 'trim|required');
        $this->form_validation->set_rules('endereco', 'Endereço', 'trim|required|min_length[10]|max_length[1000]');
        $this->form_validation->set_rules('numero', 'Número', 'trim|required');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required|min_length[2]|max_length[2]');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('renda', 'Renda', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('clientes/adicionar_view');
        } else {
            $nome = $this->input->post("nome");
            $cpf = $this->input->post("cpf");
            $rg = $this->input->post("rg");
            $endereco = $this->input->post("endereco");
            $numero = $this->input->post("numero");
            $estado = $this->input->post("estado");
            $cidade = $this->input->post("cidade");
            $renda = $this->input->post("renda");
            $status = ($this->input->post("status")) ? $this->input->post("status") : 1;
            $session_id = $this->session->userdata('id');
            $usuario_logado = $this->usuario_model->get($session_id)["id"];

            $data = array(
                "nome" => $nome,
                "cpf" => $cpf,
                "rg" => $rg,
                "endereco" => $endereco,
                "numero" => $numero,
                "estado" => $estado,
                "cidade" => $cidade,
                "renda" => $renda,
                "status" => $status,
                "usuarios_id" => $usuario_logado,
            );
        
            $this->cliente_model->insert($data);

            redirect('clientes');
        }
    }

    public function atualizar_cliente($id)
    {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]|max_length[1000]');
        $this->form_validation->set_rules('cpf', 'CPF', 'trim|required|min_length[11]|max_length[11]');
        $this->form_validation->set_rules('rg', 'RG', 'trim|required');
        $this->form_validation->set_rules('endereco', 'Endereço', 'trim|required|min_length[10]|max_length[1000]');
        $this->form_validation->set_rules('numero', 'Número', 'trim|required');
        $this->form_validation->set_rules('estado', 'Estado', 'trim|required|min_length[2]|max_length[2]');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|min_length[2]|max_length[1000]');
        $this->form_validation->set_rules('renda', 'Renda', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $data["id"] = $id;
            $this->load->view('clientes/editar_view', $data);
        } else {
            $nome = $this->input->post("nome");
            $cpf = $this->input->post("cpf");
            $rg = $this->input->post("rg");
            $endereco = $this->input->post("endereco");
            $numero = $this->input->post("numero");
            $estado = $this->input->post("estado");
            $cidade = $this->input->post("cidade");
            $renda = $this->input->post("renda");
            $status = ($this->input->post("status")) ? $this->input->post("status") : 1;
            $session_id = $this->session->userdata('id');
            $usuario_logado = $this->usuario_model->get($session_id)["id"];

            $data = array(
                "nome" => $nome,
                "cpf" => $cpf,
                "rg" => $rg,
                "endereco" => $endereco,
                "numero" => $numero,
                "estado" => $estado,
                "cidade" => $cidade,
                "renda" => $renda,
                "status" => $status,
                "usuarios_id" => $usuario_logado,
            );
            
            $this->cliente_model->update($id, $data);
            redirect('clientes');
        }
    }

    public function editar($id)
    {
        $data["id"] = $id;
        $this->load->view('clientes/editar_view', $data);
    }
    public function deletar($id)
    {
        $this->cliente_model->delete($id);
        redirect('clientes');
    }
}
