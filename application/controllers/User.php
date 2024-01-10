<?php
defined('BASEPATH') or exit('No direct script access allowed');
class User extends CI_Controller
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

        
        $this->load->view("layout_admin/header", $data);
        $this->load->view('user/index', $data);
        $this->load->view("layout_admin/footer", $data);
    }



    // method
    public function berita()
    {
        $data['berita'] = $this->Berita_model->get();
        $this->load->view("layout_admin/header");
        $this->load->view("user/vw_admin_berita", $data);
        $this->load->view("layout_admin/footer");
    }
    public function lomba()
    {
        $data['lomba'] = $this->Lomba_model->get();
        $data['user'] = 1;
        $this->load->view("layout_admin/header");
        $this->load->view("user/vw_admin_lomba", $data);
        $this->load->view("layout_admin/footer");
    }

    public function club()
    {
        $data['club'] = $this->Club_model->get();
        $this->load->view("layout_admin/header");
        $this->load->view("user/vw_admin_club", $data);
        $this->load->view("layout_admin/footer");
    }
    public function data()
    {
        $data['user'] = $this->User_model->get(); // Gantilah dengan metode yang sesuai
        $this->load->view("layout_admin/header");
        $this->load->view("user/vw_admin_data", $data);
        $this->load->view("layout_admin/footer");
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
            $this->load->view("layout_admin/header");
            $this->load->view("user/vw_tambah_berita", $data);
            $this->load->view("layout_admin/footer");
        } else {
            if (!$this->upload->do_upload('poster')) {
                // Jika upload gagal, tampilkan pesan error
                $error = array('error' => $this->upload->display_errors());
                $this->load->view("layout_admin/header");
                $this->load->view("user/vw_tambah_berita", $error);
                $this->load->view("layout_admin/footer");
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
                redirect('User/berita');
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
            $this->load->view("layout_admin/header");
            $this->load->view("user/vw_tambah_data", $data);
            $this->load->view("layout_admin/footer");
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
            redirect('User/data');
        }
    }

    // FUnction hapus
    public function hapus_data($id)
    {
        $this->User_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            User Berhasil Dihapus!</div>');
        redirect('User/data');
    }
    public function hapus_berita($id)
    {
        $this->Berita_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            Berita Berhasil Dihapus!</div>');
        redirect('User/berita');
    }
    public function hapus_lomba($id)
    {
        $this->Lomba_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            Lomba Berhasil Dihapus!</div>');
        redirect('User/lomba');
    }
    public function hapus_club($id)
    {
        $this->Club_model->delete($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" 
            role="alert">Data
            Club Berhasil Dihapus!</div>');
        redirect('User/club');
    }

    // function edit




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
            $this->load->view("layout_admin/header");
            $this->load->view("user/vw_edit_berita", $data);  // Pass $data to the view
            $this->load->view("layout_admin/footer");
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
            redirect('user/berita');
        }



        // $data['berita'] = $this->Berita_model->getById($id);

        // $data['judul'] = "Halaman Edit Berita";
        // $this->load->view("layout_admin/header");
        // $this->load->view("user/vw_edit_berita", $data);
        // $this->load->view("layout_admin/footer");
    }
    public function edit_club($id)
    {
        $data['judul'] = "Halaman Edit Club";
        $data['club'] = $this->Club_model->getById($id);

        $this->form_validation->set_rules('nama_club', 'Nama_club', 'required');
        $this->form_validation->set_rules('nama_pic', 'Nama_pic', 'required');
        $this->form_validation->set_rules('nama_anggota', 'Nama_anggota', 'required');

        if ($this->form_validation->run() == false) {
            // Pass $data to the view
            $this->load->view("layout_admin/header");
            $this->load->view("user/vw_edit_club", $data);  // Pass $data to the view
            $this->load->view("layout_admin/footer");
        } else {
            $update_data = [
                'nama_club' => $this->input->post('nama_club'),
                'nama_pic' => $this->input->post('nama_pic'),
                'nama_anggota' => $this->input->post('nama_anggota'),
            ];

            // Use $update_data instead of $data
            $this->Club_model->update(['id' => $id], $update_data);

            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Club Berhasil DiUbah!</div>');
            redirect('user/club');
        }
    }

    public function edit_lomba($id)
    {
        $data['judul'] = "Halaman Edit Berita";
        $data['lomba'] = $this->Lomba_model->getById($id);

        $this->form_validation->set_rules('nama_lomba', 'Nama_lomba', 'required');
        $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
        $this->form_validation->set_rules('waktu', 'Waktu', 'required');
        $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
        $this->form_validation->set_rules('proposal', 'Proposal', 'required');
        $this->form_validation->set_rules('sertifikat', 'Sertifikat', 'required');


        if ($this->form_validation->run() == false) {
            // Pass $data to the view
            $this->load->view("layout_admin/header");
            $this->load->view("user/vw_edit_lomba", $data);  // Pass $data to the view
            $this->load->view("layout_admin/footer");
        } else {
            $update_data = [
                'nama_lomba' => $this->input->post('nama_lomba'),
                'lokasi' => $this->input->post('lokasi'),
                'waktu' => $this->input->post('waktu'),
                'tingkat' => $this->input->post('tingkat'),
                'proposal' => $this->input->post('proposal'),
                'sertifikat' => $this->input->post('sertifikat'),
            ];

            // Use $update_data instead of $data
            $this->Lomba_model->update(['id' => $id], $update_data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lomba Berhasil DiUbah!</div>');
            redirect('user/lomba');
        }
    }


    // public function edit_lomba($id)
    // {
    //     $data['judul'] = "Halaman Edit Lomba";
    //     $data['lomba'] = $this->Lomba_model->getById($id);

    //     $this->form_validation->set_rules('nama_lomba', 'Nama_Lomba', 'required');
    //     $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    //     $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    //     $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
    //     $this->form_validation->set_rules('proposal', 'Proposal', 'required');
    //     $this->form_validation->set_rules('sertifikat', 'Sertifikat', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout_admin/header");
    //         $this->load->view("user/vw_edit_lomba", $data);
    //         $this->load->view("layout_admin/footer");
    //     } else {
    //         $update_data = [
    //             'nama_lomba' => $this->input->post('nama_lomba'),
    //             'lokasi' => $this->input->post('lokasi'),
    //             'waktu' => $this->input->post('waktu'),
    //             'tingkat' => $this->input->post('tingkat'),
    //             'proposal' => $this->input->post('proposal'),
    //             'sertifikat' => $this->input->post('sertifikat'),
    //         ];

    //         // Update data
    //         $rows_affected = $this->Lomba_model->update(['id' => $id], $update_data);

    //         if ($rows_affected > 0) {
    //             $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lomba Berhasil DiUbah!</div>');
    //         } else {
    //             $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Gagal mengubah data Lomba. Silakan coba lagi!</div>');
    //         }

    //         redirect('user/lomba');
    //     }
    // }

    //Ini yang asli boy
    // public function edit_lomba($id)
    // {

    //     $data['judul'] = "Halaman Edit Lomba";
    //     $data['lomba'] = $this->Lomba_model->getById($id);

    //     $this->form_validation->set_rules('nama_lomba', 'Nama_Lomba', 'required');
    //     $this->form_validation->set_rules('lokasi', 'Lokasi', 'required');
    //     $this->form_validation->set_rules('waktu', 'Waktu', 'required');
    //     $this->form_validation->set_rules('tingkat', 'Tingkat', 'required');
    //     $this->form_validation->set_rules('proposal', 'Proposal', 'required');
    //     $this->form_validation->set_rules('sertifikat', 'Sertifikat', 'required');

    //     if ($this->form_validation->run() == false) {
    //         $this->load->view("layout_admin/header");
    //         $this->load->view("user/vw_edit_lomba", $data);
    //         $this->load->view("layout_admin/footer");
    //     } else {
    //         $update_data = [
    //             'nama_lomba' => $this->input->post('nama_lomba'),
    //             'lokasi' => $this->input->post('lokasi'),
    //             'waktu' => $this->input->post('waktu'),
    //             'tingkat' => $this->input->post('tingkat'),
    //             'proposal' => $this->input->post('proposal'),
    //             'sertifikat' => $this->input->post('sertifikat'),
    //         ];

    //         $this->Lomba_model->update(['id' => $id], $update_data);

    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Data Lomba Berhasil DiUbah!</div>');
    //         redirect('user/lomba');
    //     }
    // }

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
