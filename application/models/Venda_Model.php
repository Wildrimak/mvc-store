<?php
class Venda_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_all()
    {
        $query = $this->db->get('vendas');
        return $query->result();
    }

    public function get($venda_id)
    {
        $this->db->where('id', $venda_id);
        $query = $this->db->get('vendas');
        if ($query->result_array()) {
            return $query->result_array()[0];
        }
        return null;
    }

    public function insert($data)
    {
        $this->db->insert('vendas', $data);
    }

    public function update($venda_id, $data)
    {
        $this->db->where('id', $venda_id);
        $this->db->update('vendas', $data);
    }

    public function delete($venda_id)
    {
        $this->db->where('id', $venda_id);
        $this->db->delete('vendas');
    }
}
