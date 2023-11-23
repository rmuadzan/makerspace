
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sambutan extends Public_Controller
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
        $pengaturan = $this->crud->gw('pengaturan', array('id_pengaturan' => 1))[0];

        $data = array('title'       => 'Sambutan',
                    'pengaturan'    => $pengaturan,        
                    'isi'           => 'homepage/sambutan/index');
        $this->load->view('homepage/_layout/wrapper', $data);
    }
}