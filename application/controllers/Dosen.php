
<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends Public_Controller
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
        $dosen = $this->crud_fakultas->ga('dosen');

        $data = array('title' => 'Staff Pengajar',
            'dosen' => $dosen,
            'isi' => 'homepage/dosen/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $this->load->model('informasi_model');
        $dosen = $this->crud_fakultas->gd('dosen', array('nip' => $slug));
        $_load = $this->load->database('fakultas', true);
        // debug($_load);
        $publikasi = $this->crud->gjwo('rel_dosen_publikasi', 'publikasi', 'id_publikasi', array('nip' => $slug), 'tahun ASC');
        $penelitian = $this->crud->gjwo('dosen_penelitian', 'penelitian', 'id_penelitian', array('nip' => $slug), 'tahun ASC');
        $mk = $this->crud->gw('rel_dosen_mk', array('nip' => $slug));
        // debug($dosen);
        // $kuliah = $this->model_join->get_kuliah($dosen->nip, $_load);
        $informasi = $this->informasi_model->get_published_top();
        if ($dosen == null) {
            return view_error("Error 404", 404, 'homepage');
        }
        // $latest = empty_blog_en($this->lang);

        $data = array(
            'title' => ($dosen->gelar_depan != '' ? $dosen->gelar_depan . '. ' : '') . $dosen->nama_dosen . ($dosen->gelar_belakang != '' ? ', ' . $dosen->gelar_belakang : ''),
            // 'latest' => $latest,
            'dosen' => $dosen,
            'publikasi' => $publikasi,
            'informasi' => $informasi,
            'mk' => $mk,
            // 'kuliah' => $kuliah,
            'penelitian' => $penelitian,
            'title' => 'Detail Dosen',
            'isi' => 'homepage/dosen/detail_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function pages($link)
    {
        $page = $this->db->where('link_en', $link)->or_where('link_id', $link)->get($this->table)->row();
        if (!$page) {
            if ($this->lang == 'en') {
                $data = array('title' => 'Error 404',
                    'page' => '<h2 class="title-page">Page Not Found!</h2><p>The page you are looking for is not found.</p><br/><br/>',
                    'isi' => 'homepage/_error/404');
            } else {
                $data = array('title' => 'Error 404',
                    'page' => '<h2 class="title-page">Halaman tidak ditemukan!</h2><p>Sepertinya halaman yang Anda cari tidak ditemukan.</p><br/><br/>',
                    'isi' => 'homepage/_error/404');
            }
            $this->load->view('homepage/_layout/wrapper', $data);
            return;
        }
        $data = array('title' => $page->nama_id,
            'page' => $page,
            'isi' => 'homepage/home/view_#' . $this->lang);
        $this->load->view('homepage/_layout/wrapper', $data);
    }
}
