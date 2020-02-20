<?php
class Cliente_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_all()
    {
        $query = $this->db->get('clientes');
        return $query->result();
    }

    public function get($cliente_id)
    {
        $this->db->where('id', $cliente_id);
        $query = $this->db->get('clientes');
        if ($query->result_array()) {
            return $query->result_array()[0];
        }
        return null;
    }

    public function insert($data)
    {
        $this->db->insert('clientes', $data);
    }

    public function update($cliente_id, $data)
    {
        $this->db->where('id', $cliente_id);
        $this->db->update('clientes', $data);
    }

    public function delete($cliente_id)
    {
        $this->db->where('id', $cliente_id);
        $this->db->delete('clientes');
    }
}
