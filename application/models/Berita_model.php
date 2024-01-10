<?php
class Berita_model extends CI_Model
{
	public $table = 'berita';
	public $id = 'id';  // Sesuaikan dengan nama kolom ID di tabel berita

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
		$query = $this->db->get($this->table);
		return $query->result_array();
	}

	public function getBy($id)
	{
		$this->db->where($this->id, $id);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}

	public function getById($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get($this->table);
		return $query->row_array();
	}

	public function getLainnya($id)
	{
		$this->db->where('id !=', $id);
		$this->db->order_by('rand()');
		$this->db->limit(3);
		$query = $this->db->get($this->table);
		return $query->result_array();
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
		$this->db->where($this->id, $id);
		$this->db->delete($this->table);
		return $this->db->affected_rows();
	}

	public function getUsers()
	{
		return $this->db->get($this->table)->result_array();
	}
}
