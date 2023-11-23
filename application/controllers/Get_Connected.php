<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Get_Connected extends Public_Controller {

    private $table = 'halaman';
    // public $lang = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    { 
        $data = array(  'title'     => 'Beranda Departemen Sistem Perkapalan',
                        'isi'       => 'homepage/get_connected/index');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function tambah() {
        $name = $this->input->post('Name');
        $email = $this->input->post('Email');
        $subject = $this->input->post('Subject');
        $message = $this->input->post('Message');
        
        $data = array( 'name' => $name,
                        'email' => $email,
                        'subject' => $subject,
                        'message' => $message);
        
        $this->crud->i('contact', $data);

        redirect(base_url());
    }

}