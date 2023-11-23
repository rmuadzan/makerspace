<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku extends Admin_Controller {

    private $table = 'buku';
    private $pk = 'id_buku';

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
        $buku = $this->crud->ga('buku');
        
        $data = array(  'title'         => 'Daftar Buku Teknik Sistem Perkapalan',
                        'buku'          => $buku,
                        // 'ketua'         => $ketua->nama_dosen,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/buku/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title'         => 'Tambah Buku',
                        'isi'           => 'adminpage/buku/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('penulis', 'Penulis', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jilid', 'Jilid', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('edisi', 'Edisi', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('isbn', 'ISBN', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jumlah', 'Jumlah Buku', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber', 'Sumber Buku', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL,'', FALSE);
            $dosen = $input['dosen'];
            $data = array(  'judul'         => $input['judul'],
                            'penulis'          => $input['penulis'],
                            'jilid'   => $input['jilid'],
                            'edisi'         => $input['edisi'],
                            'tahun'         => $input['tahun'],
                            'isbn'         => $input['isbn'],
                            'jumlah'         => $input['jumlah'],
                            'sumber'         => $input['sumber'],
                            'jenis'         => $input['jenis'],
                            'iat'           => date('Y-m-d H:i:s'));
            $this->crud->i('buku', $data);
            $this->session->set_flashdata('sukses', 'Buku berhasil ditambah.');
            redirect(admin_url('buku'));
        }
    }

    // Update
    public function edit($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $penelitian = $this->crud->gd('penelitian', array('id_penelitian' => $id));
        $anggota = $this->crud->gw('dosen_penelitian', array('id_penelitian' => $id));

        // Mengecek jika ID tidak valid
        if (empty($penelitian)) view_error('Error 404', 'admin');

        $dosen = $this->crud_mahasiswa->ga('data_dosen');
        $data = array(  'title' => 'Edit Penelitian',
                        'data'  => $penelitian,
                        'dosen' => $dosen,
                        'anggota' => $anggota,
                        'isi'   => 'adminpage/penelitian/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul', 'Judul Penelitian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('dana', 'Dana', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber_dana', 'Sumber Dana', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun', 'required|trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // $file = upload_document('file', 'tambah', 'penelitian', $penelitian->laporan, $data);

            // // Masuk ke database
            // if ($file !== FALSE)
            // {
                $input = $this->input->post(NULL,'', FALSE);
                $dosen = $input['dosen'];
                $data = array(  'judul'         => $input['judul'],
                                'dana'          => $input['dana'],
                                'sumber_dana'   => $input['sumber_dana'],
                                'tahun'         => ($input['tahun']),
                                // 'laporan'       => $file,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('penelitian', $data);
                $i = 0;

                foreach($dosen as $peneliti)
                {
                    if(!empty($peneliti)){
                        $data1 = array( 'id_penelitian' => $id,
                                        'nip'           => $peneliti,
                                        'jabatan'       => $i == 0? 'ketua' : 'anggota');
                        $this->crud->i('dosen_penelitian', $data1);
                    }
                    $i++;
                }

                $this->session->set_flashdata('sukses', 'Penelitian berhasil ditambah.');
                redirect(admin_url('penelitian'));
            // }
        }
    }

    // Hapus
    public function hapus($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd('penelitian', array('id_penelitian' => $id));
        if ($this->input->get('act', TRUE) == $id && ! empty($cek))
        {
            if ($cek->file != '')
            {
                unlink('./'.upload_path('penelitian').$cek->laporan);
            }
            $this->crud->d('penelitian', array('id_penelitian' => $id));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('penelitian'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('penelitian'));
        }
    }
}
