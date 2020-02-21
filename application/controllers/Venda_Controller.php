<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Venda_Controller extends CI_Controller
{
    private $vendas;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('venda_model');
        $this->load->model('usuario_model');
        $this->load->model('produto_model');
        $this->load->model('cliente_model');
        
        if ($this->usuario_model->count_all() < 1) {
            $this->load->view('usuarios/adicionar_view');
        } elseif (!$this->session->userdata('id')) {
            redirect('login');
        }

        $this->vendas = $this->venda_model->fetch_all();
    }

    public function index()
    {
        if ($this->usuario_model->count_all() < 1) {
            return;
        }
        $data["vendas"] = $this->vendas;
        $this->load->view('vendas/vendas_view', $data);
    }

    public function adicionar()
    {
        $produtos = $this->produto_model->fetch_all();
        $clientes = $this->cliente_model->fetch_all();
        $data = array();
        $data["produtos"] = $produtos;
        $data["clientes"] = $clientes;
        $this->load->view('vendas/adicionar_view', $data);
    }

    public function salvar_venda()
    {
        $produtos_id = $this->input->post("produtos_id");
        $quantidade = $this->input->post("quantidade");
        $forma_pagamento = $this->input->post("forma_pagamento");
        $valor_total = $this->input->post("valor_total");
        $data_cadastro = $this->input->post("data");
        $clientes_id = $this->input->post("clientes_id");
        $status = 1;
        $session_id = $this->session->userdata('id');
        $usuario_logado = $this->usuario_model->get($session_id)["id"];

        if ($forma_pagamento == 1) {
            $forma_pagamento = "DINHEIRO";
        } elseif ($forma_pagamento == 2) {
            $forma_pagamento = "CARTÃO";
        } elseif ($forma_pagamento == 3) {
            $forma_pagamento = "CHEQUE";
        } else {
            $forma_pagamento = "BOLETO";
        }
        

        $data = array(
                "produtos_id" => $produtos_id,
                "clientes_id" => $clientes_id,
                "quantidade" => $quantidade,
                "forma_pagamento" => $forma_pagamento,
                "data" => $data_cadastro,
                "valor_total" => $valor_total,
                "usuarios_id" => $usuario_logado,
                "status" => $status,
            );
        
        $this->venda_model->insert($data);
        
        redirect('vendas/adicionar');
    }
}
