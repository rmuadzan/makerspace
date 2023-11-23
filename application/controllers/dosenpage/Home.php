<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Dosen_Controller {
    
    public function index()
    {
        //Staff can access
        $this->uauth->authorization('dosen');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $publikasi = $this->crud->cw('rel_dosen_publikasi',array('nip' => $bio->nip));
        $penelitian = $this->crud->cjw('dosen_penelitian', 'penelitian', 'id_penelitian', array('nip' => $bio->nip, 'jenis' => 'penelitian'));
        $pengabdian = $this->crud->cjw('dosen_penelitian', 'penelitian', 'id_penelitian', array('nip' => $bio->nip, 'jenis' => 'pengabdian'));

        $data = array(  'title'     => 'Halaman Dasbor',
                        'subtitle'  => 'Selamat datang, '.$this->session->fullname.'.',
                        'data'      => $bio,
                        'penelitian' => $penelitian,
                        'publikasi' => $publikasi,
                        'pengabdian' => $pengabdian,
                        'isi'       => 'dosenpage/home/beranda');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }
}
