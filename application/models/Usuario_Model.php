<?php
class Usuario_Model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function fetch_all()
    {
        $query = $this->db->get('usuarios');
        return $query->result();
    }

    public function count_all(){
        return $this->db->count_all_results('usuarios');
    }

    public function get($user_id)
    {
        $this->db->where('id', $user_id);
        $query = $this->db->get('usuarios');
        if ($query->result_array()) {
            return $query->result_array()[0];
        }
        return null;
    }

    public function get_by_matricula($matricula)
    {
        $this->db->where('matricula', $matricula);
        $query = $this->db->get('usuarios');
       
        if ($query->result_array()) {
            return $query->result_array()[0];
        }

        return null;
    }

    public function insert($data)
    {
        $this->db->insert('usuarios', $data);
    }

    public function update($user_id, $data)
    {
        $this->db->where('id', $user_id);
        $this->db->update('usuarios', $data);
    }

    public function delete($user_id)
    {
        $this->db->where('id', $user_id);
        $this->db->delete('usuarios');
    }
}
