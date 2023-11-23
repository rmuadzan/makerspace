<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mata_kuliah extends Admin_Controller {

    private $table = 'mata_kuliah';
    private $pk = 'id_mata_kuliah';

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
        $mk = $this->crud_mahasiswa->gw('mata_kuliah', array('departemen' => 'Sistem Perkapalan'));
        
        $data = array(  'title'         => 'Daftar Mata Kuliah Teknik Sistem Perkapalan',
                        'mk'          => $mk,
                        // 'ketua'         => $ketua->nama_dosen,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/mk/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        $dosen = $this->crud_mahasiswa->ga('data_dosen');
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title'         => 'Tambah Mata Kuliah',
                        'dosen'         => $dosen,
                        'isi'           => 'adminpage/mk/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama', 'Nama Mata Kuliah', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kode', 'Kode Mata Kuliah', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('semester', 'Semester', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sks', 'SKS', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('dosen[]', 'Dosen', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            
            $input = $this->input->post(NULL,'', FALSE);
            $data_id = acak_f($this->table, $this->pk);
            $dosen = $input['dosen'];
            $data = array(  'id_mata_kuliah'   => $data_id['id'],
                            'nama_mata_kuliah'  => $input['nama'],
                            'kode_mata_kuliah'  => $input['kode'],
                            'semester'          => $input['semester'],
                            'sks'               => $input['sks'],
                            'jenis'             => $input['jenis'],
                            // 'laporan'        => $file,
                            'uat'           => date('Y-m-d H:i:s'));
            $this->crud_mahasiswa->i('mata_kuliah', $data);

            $id = $this->db->insert_id();
            $i = 0;

            foreach($dosen as $peneliti)
            {
                if(!empty($peneliti)){
                    $data1 = array( 'id_mk'         => $data_id['id'],
                                    'nip'           => $peneliti);
                    $this->crud->i('rel_dosen_mk', $data1);
                }
            }

            $this->session->set_flashdata('sukses', 'Mata Kuliah berhasil diupdate.');
            redirect(admin_url('mata_kuliah'));
        }
    }

    // Update
    public function edit($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $mk = $this->crud_mahasiswa->gd('mata_kuliah', array('id_mata_kuliah' => $id));
        $anggota = $this->crud->gw('rel_dosen_mk', array('id_mk' => $id));

        // Mengecek jika ID tidak valid
        if (empty($mk)) view_error('Error 404', 'admin');

        $dosen = $this->crud_mahasiswa->ga('data_dosen');
        $data = array(  'title' => 'Edit Mata Kuliah',
                        'data'  => $mk,
                        'dosen' => $dosen,
                        'anggota' => $anggota,
                        'isi'   => 'adminpage/mk/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama', 'Nama Mata Kuliah', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('kode', 'Kode Mata Kuliah', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('semester', 'Semester', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sks', 'SKS', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('dosen[]', 'Dosen', 'required|trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL,'', FALSE);
            $dosen = $input['dosen'];
            $data = array(  'nama_mata_kuliah'  => $input['nama'],
                            'kode_mata_kuliah'  => $input['kode'],
                            'semester'          => $input['semester'],
                            'sks'               => $input['sks'],
                            'jenis'             => $input['jenis'],
                            // 'laporan'        => $file,
                            'uat'           => date('Y-m-d H:i:s'));
            $this->crud_mahasiswa->u('mata_kuliah', $data, array('id_mata_kuliah' => $id));

            $this->crud->d('rel_dosen_mk', array('id_mk' => $id));

            foreach($dosen as $peneliti)
            {
                if(!empty($peneliti)){
                    $data1 = array( 'id_mk'         => $id,
                                    'nip'           => $peneliti);
                    $this->crud->i('rel_dosen_mk', $data1);
                }
            }

            $this->session->set_flashdata('sukses', 'Mata Kuliah berhasil diupdate.');
            redirect(admin_url('mata_kuliah'));
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
