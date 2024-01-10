<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Beritaa extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $this->load->view("layout/header");
        $this->load->view("mahasiswa/vw_mahasiswa");
        $this->load->view("layout/footer");
    }

}

?>