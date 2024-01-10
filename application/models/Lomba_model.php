<?php
class Lomba_model extends CI_Model
{
    public $table = 'lomba';
    public $id = 'lomba.id';
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
        $this->db->from($this->table);
        $query = $this->db->get();
        return $query->result_array();
        // $query = $this->db->get('club');
        // return $query->result_array();
    }

    public function getById($id)
    {
        // Ambil data user berdasarkan ID
        return $this->db->get_where('lomba', ['id' => $id])->row_array();
    }


    public function getLombaById($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row_array();
    }

    public function insert($data)
    {
        $this->db->insert($this->table, $data);

        return ($this->db->affected_rows() > 0) ? $this->db->insert_id() : false;
    }



    public function update($where, $data)
    {
        $this->db->update($this->table, $data, $where);
        return $this->db->affected_rows();
    }

    public function delete($id)
    {
        $this->db->where($this->id, $id);  // Perbaikan disini
        $this->db->delete($this->table);
        return $this->db->affected_rows();  // Perbaikan typo di sini
    }


    public function getUsers()
    {
        return $this->db->get('lomba')->result_array();
    }



    public function get_all_lomba()
    {
        // Gantilah dengan logika pengambilan data lomba dari database
        return $this->db->get('lomba')->result_array();
    }
}
