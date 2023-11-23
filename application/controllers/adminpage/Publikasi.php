<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Publikasi extends Admin_Controller {

    private $table = 'publikasi';
    private $pk = 'id_publikasi';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        // $ketua = NULL
        $penelitian = $this->crud->ga('publikasi');
        
        $data = array(  'title'         => 'Daftar Publikasi Teknik Sistem Perkapalan',
                        'buku'          => $penelitian,
                        // 'ketua'         => $ketua->nama_dosen,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/publikasi/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        // $dosen = $this->crud_mahasiswa->ga('dosen');
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title'         => 'Tambah File',
                        // 'dosen'         => $dosen,
                        'isi'           => 'adminpage/publikasi/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('dosen[]', 'Dosen', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('luar[]', 'Penulis Luar', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul', 'Judul Publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('level', 'Level', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jurnal', 'Jurnal Publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('vol', 'Volume', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('no', 'No', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('pp', 'PP', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('bulan', 'Bulan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun Publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('doi', 'DOI', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sitasi', 'Sitasi', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('scopus', 'Scopus', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL,'', FALSE);
            $data = array(  'judul'         => $input['judul'],
                            'jenis'         => $input['jenis'],
                            'level'         => $input['level'],
                            'jurnal'        => $input['jurnal'],
                            'vol'           => $input['vol'],
                            'no'            => $input['no'],
                            'pp'            => $input['pp'],
                            'bulan'         => $input['bulan'],
                            'tahun'         => $input['tahun'],
                            'doi'           => $input['doi'],
                            'sitasi'        => $input['sitasi'],
                            'scopus'        => $input['scopus'],
                            'iat'           => date('Y-m-d H:i:s'));
            $this->crud->i('publikasi', $data);
            $id = $this->db->insert_id();
            $dosen = $input['dosen'];
            $luar = $input['luar'];

            foreach($dosen as $peneliti)
            {
                if(!empty($peneliti)){
                    $data1 = array( 'id_publikasi'  => $id,
                                    'nip'           => $peneliti);
                    $this->crud->i('rel_dosen_publikasi', $data1);
                }
            }

            foreach($luar as $peneliti)
            {
                if(!empty($peneliti)){
                    $data1 = array( 'id_publikasi'  => $id,
                                    'nama_peneliti' => $peneliti);
                    $this->crud->i('rel_publikasi_luar', $data1);
                }
            }
            $this->session->set_flashdata('sukses', 'Penelitian berhasil ditambah.');
            redirect(admin_url('publikasi'));
        }
    }

    // Update
    public function edit($id = NULL)
    {
        $publikasi = $this->crud->gd('publikasi', array('id_publikasi' => $id));
        $anggota = $this->crud->gw('rel_dosen_publikasi', array('id_publikasi' => $id));
        $luar = $this->crud->gw('rel_publikasi_luar', array('id_publikasi' => $id));

        // Mengecek jika ID tidak valid
        if (empty($publikasi)) view_error('Error 404', 'admin');

        $dosen = $this->crud_mahasiswa->ga('data_dosen');

        $data = array(  'title'         => 'Tambah File',
                        'data'          => $publikasi,
                        'anggota'       => $anggota,
                        'luar'          => $luar,
                        'dosen'         => $dosen,
                        'isi'           => 'adminpage/publikasi/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('dosen[]', 'Dosen', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('luar[]', 'Penulis Luar', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul', 'Judul Publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('level', 'Level', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jurnal', 'Jurnal Publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('vol', 'Volume', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('no', 'No', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('pp', 'PP', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('bulan', 'Bulan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun Publikasi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('doi', 'DOI', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sitasi', 'Sitasi', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('scopus', 'Scopus', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL,'', FALSE);
            $data = array(  'judul'         => $input['judul'],
                            'jenis'         => $input['jenis'],
                            'level'         => $input['level'],
                            'jurnal'        => $input['jurnal'],
                            'vol'           => $input['vol'],
                            'no'            => $input['no'],
                            'pp'            => $input['pp'],
                            'bulan'         => $input['bulan'],
                            'tahun'         => $input['tahun'],
                            'doi'           => $input['doi'],
                            'sitasi'        => $input['sitasi'],
                            'scopus'        => $input['scopus'],
                            'iat'           => date('Y-m-d H:i:s'));
            $this->crud->u('publikasi', $data, array('id_publikasi' => $id));
            $this->crud->d('rel_dosen_publikasi', array('id_publikasi' => $id));
            $this->crud->d('rel_publikasi_luar', array('id_publikasi' => $id));
            $dosen = $input['dosen'];
            $luar = $input['luar'];

            foreach($dosen as $peneliti)
            {
                if(!empty($peneliti)){
                    $data1 = array( 'id_publikasi'  => $id,
                                    'nip'           => $peneliti);
                    $this->crud->i('rel_dosen_publikasi', $data1);
                }
            }

            foreach($luar as $peneliti)
            {
                if(!empty($peneliti)){
                    $data1 = array( 'id_publikasi'  => $id,
                                    'nama_peneliti' => $peneliti);
                    $this->crud->i('rel_publikasi_luar', $data1);
                }
            }
            $this->session->set_flashdata('sukses', 'Publiksai berhasil diupdate.');
            redirect(admin_url('publikasi'));
        }
    }

    // Hapus
    public function hapus($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd('publikasi', array('id_publikasi' => $id));
        if ($this->input->get('act', TRUE) == $id && ! empty($cek))
        {
            $this->crud->d('rel_publikasi_luar', array('id_publikasi' => $id));
            $this->crud->d('rel_dosen_publikasi', array('id_publikasi' => $id));
            $this->crud->d('publikasi', array('id_publikasi' => $id));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('publikasi'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('publikasi'));
        }
    }
}
