<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Kp extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation'); // Tambahkan baris ini

        $this->load->model('User_model');
        $this->load->model('Club_model');
        $this->load->model('Lomba_model');
        $this->load->model('Berita_model');
    }

    public function index()
    {

        
        $data['user'] = $this->User_model->get();
        $data['lomba'] = $this->Lomba_model->get();
        $data['club'] = $this->Club_model->get();
        $data['berita'] = $this->Berita_model->get();
        
        $data['user'] = $this->User_model->get();
       
        $this->load->view("layout_kp/header", $data);
        $this->load->view('Kp/index', $data);
        $this->load->view("layout_kp/footer", $data);

    }

    // method
    public function berita()
    {
        $data['berita'] = $this->Berita_model->get();
        $this->load->view("layout_kp/header");
        $this->load->view("Kp/vw_kp_berita", $data);
        $this->load->view("layout_kp/footer");
    }
    public function lomba()
    {
        $data['lomba'] = $this->Lomba_model->get();
        $data['user'] = 1;
        $this->load->view("layout_kp/header");
        $this->load->view("Kp/vw_kp_lomba", $data);
        $this->load->view("layout_kp/footer");
    }

    public function club()
    {
        $data['club'] = $this->Club_model->get();
        $this->load->view("layout_kp/header");
        $this->load->view("Kp/vw_kp_club", $data);
        $this->load->view("layout_kp/footer");
    }
    public function data()
    {
        $data['user'] = $this->User_model->get(); // Gantilah dengan metode yang sesuai
        $this->load->view("layout_kp/header");
        $this->load->view("Kp/vw_kp_data", $data);
        $this->load->view("layout_kp/footer");
    }
    public function tambah_berita()
    {
        $data['judul'] = "Halaman Tambah Berita";
        $data['berita'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');

        // Set upload path
        $config['upload_path'] = FCPATH . 'path/to/upload/directory/';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 1024 * 2;

        $this->load->library('upload', $config);

        if ($this->form_validation->run() == false) {
            $this->load->view("layout_kp/header");
            $this->load->view("Kp/vw_tambah_berita", $data);
            $this->load->view("layout_kp/footer");
        } else {
            if (!$this->upload->do_upload('poster')) {
                // Jika upload gagal, tampilkan pesan error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view("layout_kp/header");
                $this->load->view("Kp/vw_tambah_berita", $error);
                $this->load->view("layout_kp/footer");
            } else {
                $data_upload = $this->upload->data();

                // Data yang akan disimpan ke database
                $data = [
                    'judul' => $this->input->post('judul'),
                    'isi' => $this->input->post('isi'),
                    'penulis' => $this->input->post('penulis'),
                    'poster' => $data_upload['file_name'], // Nama file yang diupload
                ];

                // Simpan data ke database
                $this->Berita_model->insert($data);

                $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Berita Berhasil Ditambahkan!</div>');

                // Redirect ke halaman kelola berita
                redirect('Kp/berita');
            }
        }

        // $data['judul'] = "Halaman Tambah Berita";
        // $this->load->view("layout_admin/header");
        // $this->load->view("user/vw_tambah_berita");
        // $this->load->view("layout_admin/footer");
    }



    public function tambah_data()
    {
        $data['judul'] = "Halaman Tambah User";
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout_kp/header");
            $this->load->view("Kp/vw_tambah_data", $data);
            $this->load->view("layout_kp/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
            ];

            // Simpan data ke database
            $this->User_model->insert($data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil Ditambah!</div>');

            // Redirect ke halaman kelola data
            redirect('Kp/data');
        }

    }

    // FUnction hapus
    public function hapus_data($id)
    {
        $this->User_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            User Berhasil Dihapus!</div>');
        redirect('Kp/data');
    }
    public function hapus_berita($id)
    {
        $this->Berita_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            Berita Berhasil Dihapus!</div>');
        redirect('Kp/berita');
    }
    public function hapus_lomba($id)
    {
        $this->Lomba_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            Lomba Berhasil Dihapus!</div>');
        redirect('Kp/lomba');
    }
    public function hapus_club($id)
    {
        $this->Club_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            Club Berhasil Dihapus!</div>');
        redirect('Kp/club');
    }

    // function edit





    public function edit_club($id)
    {
        $data['judul'] = "Halaman Edit Club";
        $data['club'] = $this->Club_model->getById($id);

        $this->form_validation->set_rules('status', 'Status', 'required');
     

        if ($this->form_validation->run() == false) {
            // Pass $data to the view
            $this->load->view("layout_kp/header");
            $this->load->view("kp/vw_edit_club", $data);  // Pass $data to the view
            $this->load->view("layout_kp/footer");
        } else {
            $update_data = [
                'status' => $this->input->post('status'),
       
            ];

            // Use $update_data instead of $data
            $this->Club_model->update(['id' => $id], $update_data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Status Club Berhasil DiUbah!</div>');
            redirect('kp/club');
        }
    }
    public function edit_lomba($id)
    {
        $data['judul'] = "Halaman Edit Berita";
        $data['lomba'] = $this->Lomba_model->getById($id);
    
        $this->form_validation->set_rules('status', 'Status', 'required');

    
        if ($this->form_validation->run() == false) {
            // Pass $data to the view
            $this->load->view("layout_kp/header");
            $this->load->view("kp/vw_edit_lomba", $data);
            $this->load->view("layout_kp/footer");
        } else {
            // Update data in the database
            $update_data = [
                'status' => $this->input->post('status'),

            ];
    
            // Use $update_data instead of $data
            $this->Lomba_model->update(['id' => $id], $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lomba Berhasil DiUbah!</div>');
            redirect('kp/lomba');
        }
    }
    public function edit_berita($id)
    {

        $data['judul'] = "Halaman Edit Berita";
        $data['berita'] = $this->Berita_model->getById($id);

        $this->form_validation->set_rules('judul', 'Judul', 'required');
        $this->form_validation->set_rules('isi', 'Isi', 'required');
        $this->form_validation->set_rules('penulis', 'Penulis', 'required');
        $this->form_validation->set_rules('poster', 'Poster', 'required');

        if ($this->form_validation->run() == false) {
            // Pass $data to the view
            $this->load->view("layout_kp/header");
            $this->load->view("kp/vw_edit_berita", $data);  // Pass $data to the view
            $this->load->view("layout_kp/footer");
        } else {
            $update_data = [
                'judul' => $this->input->post('judul'),
                'isi' => $this->input->post('isi'),
                'penulis' => $this->input->post('penulis'),
                'poster' => $this->input->post('poster'),
            ];

            // Use $update_data instead of $data
            $this->Berita_model->update(['id' => $id], $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Berita Berhasil DiUbah!</div>');
            redirect('kp/berita');
        }
    }





    public function edit_data($id)
    {


        $data['judul'] = "Halaman Edit User";
        $data['user'] = $this->User_model->getById($id);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('role_id', 'Role_id', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view("layout_admin/header");
            $this->load->view("user/vw_edit_data", $data);
            $this->load->view("layout_admin/footer");
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'role_id' => $this->input->post('role_id'),
            ];
            $this->User_model->update(['id' => $id], $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data User Berhasil DiUbah!</div>');
            redirect('user/data');
        }
    }
}
