<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produto_Controller extends CI_Controller
{
    private $produtos;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('produto_model');
        $this->load->model('usuario_model');
        
        if (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->produtos = $this->produto_model->fetch_all();
    }

    public function index()
    {
        $data["produtos"] = $this->produtos;
        $this->load->view('produtos/produtos_view', $data);
    }

    public function adicionar()
    {
        $this->load->view('produtos/adicionar_view');
    }

    public function salvar_produto()
    {
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('detalhamento', 'Detalhamento', 'trim|required|min_length[45]|max_length[2000]');
        $this->form_validation->set_rules('preco_vista', 'Preço à vista', 'trim|required');
        $this->form_validation->set_rules('preco_prazo', 'Preço a prazo', 'trim|required');
        $this->form_validation->set_rules('codigo_barras', 'Código de barras', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $this->load->view('produtos/adicionar_view');
        } else {
            $descricao = $this->input->post("descricao");
            $detalhamento = $this->input->post("detalhamento");
            $preco_vista = $this->input->post("preco_vista");
            $preco_prazo = $this->input->post("preco_prazo");
            $codigo_barras = $this->input->post("codigo_barras");
            $status = ($this->input->post("status")) ? $this->input->post("status") : 1;
            $session_id = $this->session->userdata('id');
            $usuario_logado = $this->usuario_model->get($session_id)["id"];

            $data = array(
                "descricao" => $descricao,
                "detalhamento" => $detalhamento,
                "preco_vista" => $preco_vista,
                "preco_prazo" => $preco_prazo,
                "codigo_barras" => $codigo_barras,
                "status" => $status,
                "usuarios_id" => $usuario_logado,
            );
        
            $this->produto_model->insert($data);

            redirect('produtos');
        }
    }

    public function atualizar_produto($id)
    {
        $this->form_validation->set_rules('descricao', 'Descrição', 'trim|required|min_length[3]|max_length[45]');
        $this->form_validation->set_rules('detalhamento', 'Detalhamento', 'trim|required|min_length[45]|max_length[2000]');
        $this->form_validation->set_rules('preco_vista', 'Preço à vista', 'trim|required');
        $this->form_validation->set_rules('preco_prazo', 'Preço a prazo', 'trim|required');
        $this->form_validation->set_rules('codigo_barras', 'Código de barras', 'trim|required');
        
        if ($this->form_validation->run() == false) {
            $data["id"] = $id;
            $this->load->view('produtos/editar_view', $data);
        } else {
            $descricao = $this->input->post("descricao");
            $detalhamento = $this->input->post("detalhamento");
            $preco_vista = $this->input->post("preco_vista");
            $preco_prazo = $this->input->post("preco_prazo");
            $codigo_barras = $this->input->post("codigo_barras");
            $status = ($this->input->post("status")) ? $this->input->post("status") : 1;
        
            $data = array(
                "descricao" => $descricao,
                "detalhamento" => $detalhamento,
                "preco_vista" => $preco_vista,
                "preco_prazo" => $preco_prazo,
                "codigo_barras" => $codigo_barras,
                "status" => $status,
            );
            
            $this->produto_model->update($id, $data);
            redirect('produtos');
        }
    }

    public function editar($id)
    {
        $data["id"] = $id;
        $this->load->view('produtos/editar_view', $data);
    }
    public function deletar($id)
    {
        $this->produto_model->delete($id);
        redirect('produtos');
    }
}
