<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Mahasiswa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();

        // Load necessary libraries and helpers here
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('Mahasiswa_model');

        // Load the Berita_model
        $this->load->model('Lomba_model');
        $this->load->model('Berita_model'); // Sesuaikan dengan nama model yang benar
        $this->load->model('Club_model'); // Sesuaikan dengan nama model yang benar
    }
    public function index()
    {
            
        $data['lomba'] = $this->Lomba_model->get();
        $data['club'] = $this->Club_model->get();
        $data['berita'] = $this->Berita_model->get();

        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view("layout_user_mahasiswa/header",$data);
        $this->load->view("mahasiswa/dashboard",$data);
        $this->load->view("layout_user_mahasiswa/footer",$data);
    }

    public function berita()
    {
        $this->load->model('Berita_model');
		$data['berita'] = $this->Berita_model->get();

        // Load the views and pass the data
        $this->load->view("layout_user_mahasiswa/header", $data);
        $this->load->view("mahasiswa/vw_mahasiswa_berita", $data);
        $this->load->view("layout_user_mahasiswa/footer", $data);
    }
	public function berita_detail($berita_id)
	{
		// Load model
		$this->load->model('Berita_model');

		// Get berita by ID
		$data['berita'] = $this->Berita_model->getById($berita_id);
		$data['berita_lainnya'] = $this->Berita_model->getLainnya($berita_id);

		// Load view
		$this->load->view('layout_user_mahasiswa/header');
		$this->load->view('mahasiswa/vw_mahasiswa_berita_detail', $data);
		$this->load->view('layout_user_mahasiswa/footer');
	}


    public function lomba()
    {
        // Load the Lomba_model
        $this->load->model('Lomba_model');

        $data['lomba'] = $this->Lomba_model->get();
        $this->load->view("layout_user_mahasiswa/header");
        $this->load->view("mahasiswa/vw_mahasiswa_lomba", $data);
        $this->load->view("layout_user_mahasiswa/footer");
    }

    public function club()
    {
        // Load the Club_model (gantilah dengan nama model yang sesuai)
        $this->load->model('Club_model');

        // Ambil data club dari model
        $data['club'] = $this->Club_model->get_club_data(); // Sesuaikan dengan metode atau model yang sesuai

        $this->load->view("layout_user_mahasiswa/header");
        $this->load->view("mahasiswa/vw_mahasiswa_club", $data);
        $this->load->view("layout_user_mahasiswa/footer");
    }


    // Edit atau ajukan
    public function editlomba($id)
    {
        $data['lomba'] = $this->Lomba_model->getLombaById($id);

        if ($this->input->post()) {
            $this->form_validation->set_rules('nama_lomba', 'Nama Lomba', 'required');
            $this->form_validation->set_rules('lokasi', 'Lokasi Lomba', 'required');
            $this->form_validation->set_rules('waktu', 'Tanggal Lomba', 'required');
            $this->form_validation->set_rules('tingkat', 'Tingkat Lomba', 'required');

            if ($this->form_validation->run() == true) {
                // Jika formulir valid, lakukan pembaruan data
                $updated_data = [
                    'nama_lomba' => $this->input->post('nama_lomba'),
                    'lokasi' => $this->input->post('lokasi'),
                    'waktu' => $this->input->post('waktu'),
                    'tingkat' => $this->input->post('tingkat'),
                ];

                // Periksa apakah ada pengunggahan file proposal
                if (!empty($_FILES['proposal']['name'])) {
                    $config['upload_path']   = APPPATH . '/files/proposal/';
                    $config['allowed_types'] = 'pdf';
                    $config['max_size']      = 2048;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('proposal')) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', 'Gagal mengunggah proposal: ' . $error);
                        // redirect('Mahasiswa/editlomba/' . $id);
                    } else {
                        $proposal_data = $this->upload->data();
                        $updated_data['proposal'] = $proposal_data['file_name'];
                    }
                }

                // Periksa apakah ada pengunggahan file sertifikat
                if (!empty($_FILES['sertifikat']['name'])) {
                    $config['upload_path']   = APPPATH . '/files/sertifikat/';
                    $config['allowed_types'] = 'jpg|jpeg|png|gif';
                    $config['max_size']      = 2048;

                    $this->load->library('upload', $config);

                    if (!$this->upload->do_upload('sertifikat')) {
                        $error = $this->upload->display_errors();
                        $this->session->set_flashdata('message', 'Gagal mengunggah sertifikat: ' . $error);
                        // redirect('Mahasiswa/editlomba/' . $id);
                    } else {
                        $sertifikat_data = $this->upload->data();
                        $updated_data['sertifikat'] = $sertifikat_data['file_name'];
                    }
                }

                // Lakukan pembaruan data ke database
                $this->Lomba_model->update(['id' => $id], $updated_data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lomba berhasil diubah!</div>');
                redirect('Mahasiswa/Lomba');
            }
        }

        // Jika tidak ada pengiriman formulir atau formulir tidak valid, tampilkan formulir edit
        $this->load->view("layout_user_mahasiswa/header");
        $this->load->view("mahasiswa/vw_mahasiswa_editlomba", $data);
        $this->load->view("layout_user_mahasiswa/footer");
    }

    public function tambahlomba()
    {
        $this->load->view("layout_user_mahasiswa/header");
        $this->load->view("mahasiswa/vw_mahasiswa_tambahlomba");
        $this->load->view("layout_user_mahasiswa/footer");
    }

    public function simpanlomba()
    {
        $data['judul'] = "Halaman Tambah Lomba";

        $this->form_validation->set_rules('nama_lomba', 'Nama Lomba', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('nama_pembimbing', 'nama_pembimbing', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout_user_mahasiswa/header");
            $this->load->view("mahasiswa/vw_mahasiswa_tambahlomba", $data);
            $this->load->view("layout_user_mahasiswa/footer");
        } else {
            $config['upload_path']   = APPPATH . '/files/proposal/';
            $config['allowed_types'] = 'pdf';
            $config['max_size']      = 2048; // 2 MB

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('proposal')) {
                $error = $this->upload->display_errors();
                $this->session->set_flashdata('message', 'Gagal mengunggah file: ' . $error);
            } else {
                $proposal_data = $this->upload->data();
                $proposal_path = $proposal_data['file_name'];

                $data_lomba = [
                    'nama_lomba' => $this->input->post('nama_lomba'),
                    'lokasi' => $this->input->post('lokasi'),
                    'waktu' => $this->input->post('waktu'),
                    'tingkat' => $this->input->post('tingkat'),
                    'nama_pembimbing' => $this->input->post('nama_pembimbing'),
                    'proposal' => $proposal_path,
                ];

                $insert_id = $this->Lomba_model->insert($data_lomba);

                if ($insert_id) {
                    $this->session->set_flashdata('message', 'Data Lomba berhasil ditambah!');
                } else {
                    $this->session->set_flashdata('message', 'Gagal menyimpan data ke database.');
                }
            }

            redirect('Mahasiswa/Lomba');
        }
    }




    public function tambah_club()
    {
        $data['judul'] = "Halaman Tambah Club";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama_club', 'nama_club', 'required');
        $this->form_validation->set_rules('nama_pic', 'nama_pic', 'required');
        $this->form_validation->set_rules('nama_anggota', 'nama_anggota', 'required');
        $this->form_validation->set_rules('prodi', 'prodi', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout_user_mahasiswa/header");
            $this->load->view("mahasiswa/vw_add_club", $data);
            $this->load->view("layout_user_mahasiswa/footer");
        } else {
            $data = [
                'nama_club' => $this->input->post('nama_club'),
                'nama_pic' => $this->input->post('nama_pic'),
                'nama_anggota' => $this->input->post('nama_anggota'),
                'prodi' => $this->input->post('prodi'),
            ];

            // Simpan data ke database
            $this->Club_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Club Berhasil Ditambah!</div>');

            // Redirect ke halaman kelola data
            redirect('Mahasiswa/club');
        }
        // $data['judul'] = "Halaman Tambah data";
        // $this->load->view("layout_admin/header");
        // $this->load->view("user/vw_tambah_data",$data);
        // $this->load->view("layout_admin/footer");


        // $this->load->library('form_validation');
        // $this->load->library('upload');

        // $this->load->view("layout_user_mahasiswa/header");
        // $this->load->view("mahasiswa/vw_mahasiswa_tambahlomba");
        // $this->load->view("layout_user_mahasiswa/footer");
    }

    private function load_berita_data()
    {
        return $this->Berita_model->get_berita_data(); // Replace with the actual method to get berita data
    }
}
