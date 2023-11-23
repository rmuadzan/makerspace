
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Akreditasi extends Public_Controller
{

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

        $data = array('title' => 'Akreditasi',
            'isi' => 'homepage/akreditasi/index');
        $this->load->view('homepage/_layout/wrapper', $data);
    }
}