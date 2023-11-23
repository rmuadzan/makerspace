<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Perpustakaan extends Public_Controller {

    private $table = 'perpustakaan';
    private $pk = 'id_perpustakaan';
    public $lang = '';

    public function __construct()
    {
        parent::__construct();
        // $this->lang = get_cookie('lang');
        // $this->load->library('counter');
        // $this->counter->add_visitor($this->input->ip_address());
    }

    public function buku()
    {
        $pp = $this->crud->gw('buku', array('jenis' => 'buku'));
        $data = array(  'title'         => 'Daftar Buku',
                        'pp'            => $pp,
                        'isi'           => 'homepage/perpustakaan/buku_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function jurnal()
    {
        $pp = $this->crud->gw('buku', array('jenis' => 'jurnal'));
        $data = array(  'title'         => 'Daftar Jurnal dan Prosiding',
                        'pp'            => $pp,
                        'isi'           => 'homepage/perpustakaan/buku_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function publikasi_lain()
    {
        $pp = $this->crud->gw('buku', array('jenis' => 'publikasi'));
        $data = array(  'title'         => 'Daftar Publikasi Lain',
                        'pp'            => $pp,
                        'isi'           => 'homepage/perpustakaan/buku_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function skripsi()
    {
        $pp = $this->crud->gw('perpustakaan', array('jenis' => 'skripsi'));
        $data = array(  'title'         => 'Daftar Skripsi',
                        'pp'            => $pp,
                        'isi'           => 'homepage/perpustakaan/skripsi_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $blogs = $this->crud->gjd('users',$this->table,'id_user',array('slug_id' => $slug));
        if($blogs == null) return view_error("Error 404", 404, 'homepage');
        $latest = $this->crud->gwlo($this->table, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');

        $data = array(  'title'     => $blogs->{'judul_id'},
                        'blogs'    => $blogs,
                        'latest'        => $latest,
                        'isi'       => 'homepage/blogs/detail_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function switch_lang($lang)
    {
        set_lang($lang);
        header('Content-Type: text/plain');
        echo 'oke';;
    }

}
