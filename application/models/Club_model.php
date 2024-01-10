<?php
class Club_model extends CI_Model
{
    public $table = 'club';
    public $id = 'club.id';
    public function __construct()
    {
        parent::__construct();
    
        // Load necessary libraries and helpers here
        $this->load->library('form_validation');
    
        // Load the Berita_model
        $this->load->model('Berita_model');
    
        // Load the Club_model
        $this->load->model('Club_model');
    
        // ... (other code)
    }
    public function get()
    {
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
        // $query = $this->db->get('club');
        // return $query->result_array();
    }

    public function getById($id)
    {
        // Ambil data user berdasarkan ID
        return $this->db->get_where('club', ['id' => $id])->row_array();
    }
    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }
    public function insert($data)
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }
    public function delete($id)
    {
        $this->db->where($this->id, $id);  // Perbaikan disini
        $this->db->delete($this->table);
        return $this->db->affected_rows();  // Perbaikan typo di sini
    }


    public function getUsers()
    {
        return $this->db->get('club')->result_array();
    }
    public function get_club_data()
    {
        // Mengambil semua data dari tabel 'club'
        return $this->db->get('club')->result_array();
    }
    
}
