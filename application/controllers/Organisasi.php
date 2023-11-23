<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Organisasi extends Public_Controller {

    private $table = 'halaman';
    private $search = 'blogs';
    public $lang = '';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('counter');
        $this->counter->add_visitor($this->input->ip_address());
    }

    public function index()
    {

        $data = array('title' => 'Struktur Organisasi',
            'isi' => 'homepage/organisasi/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }
}
