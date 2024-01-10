<?php
class User_model extends CI_Model
{
    public $table = 'user';
    public $id = 'user.id';
    public function __construct()
    {
        parent::__construct();

        // Mengecek koneksi database
        if ($this->db->conn_id === FALSE) {
            die("Tidak dapat terhubung ke database. Periksa pengaturan koneksi database Anda.");
        }
    }
    public function get()
    {

        $query = $this->db->get('user');
        return $query->result_array();
    }

    public function getById($id)
    {
        // Ambil data user berdasarkan ID
        return $this->db->get_where('user', ['id' => $id])->row_array();
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
        return $this->db->get('user')->result_array();
    }




}
