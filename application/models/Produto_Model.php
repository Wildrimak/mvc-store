<?php
class Produto_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_all()
    {
        $query = $this->db->get('produtos');
        return $query->result();
    }

    public function get($produto_id)
    {
        $this->db->where('id', $produto_id);
        $query = $this->db->get('produtos');
        if ($query->result_array()) {
            return $query->result_array()[0];
        }
        return null;
    }

    public function insert($data)
    {
        $this->db->insert('produtos', $data);
    }

    public function update($produto_id, $data)
    {
        $this->db->where('id', $produto_id);
        $this->db->update('produtos', $data);
    }

    public function delete($produto_id)
    {
        $this->db->where('id', $produto_id);
        $this->db->delete('produtos');
    }
}
