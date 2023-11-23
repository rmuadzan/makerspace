<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kerjasama extends Admin_Controller {

    private $table = 'kerjasama';
    private $pk = 'id_kerjasama';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        
        $kerjasama = $this->crud->ga('kerjasama');
        $data = array(  'title'         => 'Daftar kerjasama',
                        'data'          => $kerjasama,
                        'isi'           => 'adminpage/kerjasama/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');
        $dosen = $this->crud_mahasiswa->ga('data_dosen');

        $data = array(  'title'         => 'Tambah kerjasama',
                        'dosen'         => $dosen,
                        'isi'           => 'adminpage/kerjasama/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('mitra', 'Mitra', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tingkat', 'Tingkat Kerjasama', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kerjasama', 'Kerjasama', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tanggal_mulai', 'Tanggal Mulai', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tanggal_akhir', 'Tanggal Akhir', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nip', 'Dosen', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
           
            $file = upload_document('file', 'tambah', 'kerjasama', '', $data, TRUE);

            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL,'', FALSE);
                $data = array(  'mitra'         => $input['mitra'],
                                'tingkat'       => $input['tingkat'],
                                'kerjasama'     => $input['kerjasama'],
                                'tanggal_mulai' => $input['tanggal_mulai'],
                                'tanggal_akhir' => $input['tanggal_akhir'],
                                'nip'           => $input['nip'],
                                'file'          => $file,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('kerjasama', $data);
                $this->session->set_flashdata('sukses', 'Kerjasama berhasil ditambah.');
                redirect(admin_url('kerjasama'));
            }
        }
    }

    // Update
    public function edit($id_kerjasama = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $kerjasama = $this->crud_fakultas->gd($this->table, array($this->pk => $id_kerjasama));
        // Mengecek jika ID tidak valid
        if (empty($kerjasama)) view_error('Error 404', 404, 'adminpage');
        
        $data = array(  'title'         => 'Edit Data kerjasama',
                        'data'          => $kerjasama,
                        'isi'           => 'adminpage/kerjasama/edit');
        
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('institusi', 'Institusi', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis Kerjasama', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'tahun', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('masa_berlaku', 'masa_berlaku', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
        	$input = $this->input->post(NULL, TRUE);
            
            $data = array(  'institusi'               => $input['institusi'],
                            'jenis_kerjasama'         => $input['jenis'],
                            'tahun'                   => $input['tahun'],
                            'masa_berlaku'            => $input['masa_berlaku']);
            $this->crud_fakultas->u('kerjasama', $data, array($this->pk => $id_kerjasama));

            $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
            redirect(admin_url('kerjasama'));
        }
    }

    // Hapus
    public function hapus($id_kerjasama = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_kerjasama));
        if ($this->input->get('act', TRUE) == $id_kerjasama && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_kerjasama));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('kerjasama'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('kerjasama'));
        }
    }
}
