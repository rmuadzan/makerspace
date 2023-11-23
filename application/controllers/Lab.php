<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lab extends Public_Controller {

    private $table = 'lab';
    private $search = 'blogs';
    private $pk = 'id_lab';

    public function __construct()
    {
        parent::__construct();
        $this->load->library('counter');
        $this->load->model('model_join');
        $this->counter->add_visitor($this->input->ip_address());
    }

    public function index($slug = '')
    {
        $lab = $this->crud->gd($this->table,array('slug_id' => $slug));
        $staf = explode(",",$lab->staf);
        
        if($lab == null) return view_error("Error 404", 404, 'homepage');

        $latest = $this->crud->gwlo($this->search, array('publikasi' => 'Publish'), 5, 0, 'iat DESC');
        $data = array(  'title'     => $lab->lab_id,
                        'latest'   => $latest,
                        'staf'      => $staf,
                        'lab'    => $lab,
                        'isi'       => 'homepage/lab/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

    public function detail($slug = '')
    {
        $lab = $this->crud->gd($this->table,array('slug_id' => $slug));
        $ketua = $this->crud_fakultas->gd('dosen',array('nip' => $lab->ketua_lab));
        $anggota = $this->model_join->anggotalab($lab->id_lab);
        $gambar = $this->crud->gw('galeri', array('id_blog' => $lab->id_lab));
        $alat = $this->crud->gw('rel_alat_labo', array('id_lab' => $lab->id_lab));
        if($lab == null) return view_error("Error 404", 404, 'homepage');

        $latest = empty_blog_en('id');
        $data = array(  'title'     => $lab->{'lab_id'},
                        'ketua'     => $ketua,
                        'anggota'   => $anggota,
                        'gambar'    => $gambar,
                        'alat'      => $alat,
                        'latest'    => $latest,
                        'lab'    => $lab,
                        'isi'       => 'homepage/lab/view_#id');
        $this->load->view('homepage/_layout/wrapper', $data);
    }

}
