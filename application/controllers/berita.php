<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 class berita extends CI_Controller 
 {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Mahasiswa_model');
        $this->load->model('Prodi_model');

    }
    public function index()
    {
        $data['judul'] = "Halaman Mahasiswa";
        $data['user']=$this->db->get_where('user',['email'=>$this->session->userdata('email')])->row_array();
        $data['mahasiswa'] = $this->Mahasiswa_model->get();
        $this->load->view("layout/header",$data);
        $this->load->view("mahasiswa/vw_mahasiswa",$data);
        $this->load->view("layout/footer",$data);
    }
    public function berita()
    {
        $data['berita'] = $this->Berita_model->get();
        $this->load->view("layout_admin/header");
        $this->load->view("user/vw_admin_berita", $data);
        $this->load->view("layout_admin/footer");
    }
    public function berita_detail($berita_id)
    {
        // Load model
        $this->load->model('Berita_model');

        // Get berita by ID
        $data['berita'] = $this->Berita_model->getById($berita_id);

        // Load view
        $this->load->view('layout_user_mahasiswa/header');
        $this->load->view('mahasiswa/vw_mahasiswa_berita_detail', $data);
        $this->load->view('layout_user_mahasiswa/footer');
    }
}