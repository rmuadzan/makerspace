<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends Public_Controller {

    private $table = 'halaman';
    public $lang = '';

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $pub = $this->crud_geo->gao('publikasis', 'tahun ASC');
        
        $data = array(  'title'     => 'Data Publikasi',
                        'data'      => $pub,
                        'isi'       => 'homepage/publikasi/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function penelitian()
    {
        $p = $this->crud_geo->gwo('penelitians', array('jenis' => 'Penelitian'), 'tahun ASC');

        $data = array(  'title'     => 'Data Penelitian',
                        'data'      => $p,
                        'isi'       => 'homepage/publikasi/penelitian_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function pengabdian()
    {
        $p = $this->crud_geo->gwo('penelitians', array('jenis' => 'Pengabdian'), 'tahun ASC');

        $data = array(  'title'     => 'Data Pengabdian',
                        'data'      => $p,
                        'isi'       => 'homepage/publikasi/penelitian_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function kerjasama()
    {
        $p = $this->crud->ga('kerjasama');

        $data = array(  'title'     => 'Data Kerjasama',
                        'data'      => $p,
                        'isi'       => 'homepage/kerjasama/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function haki()
    {
        $p = $this->crud->ga('haki');

        $data = array(  'title'     => 'Data HAKI',
                        'data'      => $p,
                        'isi'       => 'homepage/haki/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function pages($link)
    {
        $page = $this->db->where('link_en', $link)->or_where('link_id', $link)->get($this->table)->row();
        if (!$page) {
            if ($this->lang == 'en') {
                $data = array(  'title'     => 'Error 404',
                                'page'      => '<h2 class="title-page">Page Not Found!</h2><p>The page you are looking for is not found.</p><br/><br/>',
                                'isi'       => 'homepage/_error/404');
            } else {
                $data = array(  'title'     => 'Error 404',
                                'page'      => '<h2 class="title-page">Halaman tidak ditemukan!</h2><p>Sepertinya halaman yang Anda cari tidak ditemukan.</p><br/><br/>',
                                'isi'       => 'homepage/_error/404');
            }
            $this->load->view('homepage/_layout/wrapper', $data);
            return;
        }
        $data = array(  'title'     => $page->nama_id,
                        'page'      => $page,
                        'isi'       => 'homepage/home/view_#'.$this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function switch_lang($lang)
    {
        set_lang($lang);
        header('Content-Type: text/plain');
        echo 'oke';;
    }
}
