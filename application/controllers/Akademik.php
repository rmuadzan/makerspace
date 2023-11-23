<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Akademik extends Public_Controller {

    private $table = 'akademik';
    private $search = 'blogs';
    private $pk = 'id_akademik';
    public $lang = '';

    public function __construct()
    {
        parent::__construct();
        $this->lang = get_cookie('lang');
        $this->load->library('counter');
        $this->counter->add_visitor($this->input->ip_address());
    }

    public function index()
    {
        // $latest = $this->crud->gwlo($this->search, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');
        $data = array(  'title'     => 'Akademik',
                        'isi'       => 'homepage/akademik/index');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function capaian_pembelajaran_prodi()
    {
        $data = array(  'title'     => 'Capaian Pembelajaran Program Studi',
                        'isi'       => 'homepage/akademik/cpps');

        $this->load->view('homepage/_layout/wrapper', $data);
    }


    public function capaian_pembelajaran_lulusan()
    {
        $data = array(  'title'     => 'Capaian Pembelajaran Lulusan',
                        'isi'       => 'homepage/akademik/cpl');

        $this->load->view('homepage/_layout/wrapper', $data);
    }


    public function mata_kuliah()
    {
        $data = array(  'title'     => 'Mata Kuliah',
                        'isi'       => 'homepage/akademik/mk');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function mk_wajib_labo()
    {
        $data = array(  'title'     => 'Mata Kuliah',
                        'isi'       => 'homepage/akademik/mk_wajib');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function mk_umum_labo()
    {
        $data = array(  'title'     => 'Mata Kuliah',
                        'isi'       => 'homepage/akademik/mk_umum');

        $this->load->view('homepage/_layout/wrapper', $data);
    }


    public function standar_operasional()
    {
        $data = array(  'title'     => 'Standar Operasional',
                        'isi'       => 'homepage/akademik/sop');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function beasiswa()
    {
        $data = array(  'title'     => 'Beasiswa dan Bantuan',
                        'isi'       => 'homepage/akademik/beasiswa');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function sarjana()
    {
        $akademik = $this->crud_geo->ga('akademik_submenus', array('akademik_id' => 4));
        $data = array(  'title'     => 'Program Sarjana',
                        'data'      => $akademik,
                        'isi'       => 'homepage/akademik/sarjana');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function magister()
    {
        $data = array(  'title'     => 'Program Magister',
                        'isi'       => 'homepage/akademik/magister');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function doktor()
    {
        $data = array(  'title'     => 'Program Doktor',
                        'isi'       => 'homepage/akademik/doktor');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function iabee()
    {
        $data = array(  'title'     => 'Laporan IABEE',
                        'isi'       => 'homepage/iabee/index');

        $this->load->view('homepage/_layout/wrapper', $data);
    }

}
