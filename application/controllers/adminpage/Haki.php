<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Haki extends Admin_Controller {

    private $table = 'haki';
    private $pk = 'id_haki';

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
        $haki = $this->crud->ga('haki');
        
        $data = array(  'title'         => 'Daftar HAKI Teknik Sistem Perkapalan',
                        'haki'          => $haki,
                        // 'ketua'         => $ketua->nama_dosen,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/haki/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        // $dosen = $this->crud_mahasiswa->ga('data_dosen');
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title'         => 'Tambah Daftar HAKI',
                        // 'dosen'         => $dosen,
                        'isi'           => 'adminpage/haki/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('dosen[]', 'Dosen', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('status[]', 'Status', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama', 'Nama Barang', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('status_barang', 'status', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('uraian', 'Uraian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tanggal_permohonan', 'Tanggal Permohonan', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nomor_permohonan', 'Nomor Permohonan', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('web', 'WEB', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {

            $gambar = upload_image('foto', 'tambah', 'blogs', '', $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL,'', FALSE);
                $data = array(  'nama'              => $input['nama'],
                                'jenis'             => $input['jenis'],
                                'uraian'            => $input['uraian'],
                                'tanggal_permohonan'=> $input['tanggal_permohonan'],
                                'nomor_permohonan'  => $input['nomor_permohonan'],
                                'web'               => $input['web'],
                                'status'            => $input['status_barang'],
                                'foto'              => $gambar,
                                'iat'               => date('Y-m-d H:i:s'));
                $this->crud->i('haki', $data);
                $id = $this->db->insert_id();
                $dosen = $input['dosen'];
                $status = $input['status'];

                $combined = array_combine($dosen, $status);

                foreach($combined as $key => $value)
                {
                    $data1 = array( 'id_haki'   => $id,
                                    'nip'       => $key,
                                    'status'    => $value);
                    $this->crud->i('rel_dosen_haki', $data1);
                }

                $this->session->set_flashdata('sukses', 'Penelitian berhasil ditambah.');
                redirect(admin_url('haki'));
            }
        }
    }

    // Update
    public function edit($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $penelitian = $this->crud->gd('penelitian', array('id_penelitian' => $id));

        // Mengecek jika ID tidak valid
        if (empty($penelitian)) view_error('Error 404', 'admin');

        $dosen = $this->crud_mahasiswa->ga('data_dosen');
        $data = array(  'title' => 'Edit Penelitian',
                        'data'  => $penelitian,
                        'dosen' => $dosen,
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

    public function catat()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');
        $tanggal_pencatatan = $this->input->post('tanggal_pencatatan');
        $nomor_pencatatan = $this->input->post('nomor_pencatatan');
        $tanggal_akhir = $this->input->post('tanggal_akhir');
        $status = $this->input->post('status');

        $data = [
            'tanggal_pencatatan'=> $tanggal_pencatatan,
            'nomor_pencatatan'  => $nomor_pencatatan,
            'tanggal_akhir'     => $tanggal_akhir,
            'status'            => $status
        ];

        $this->crud->u('haki', $data, array("id_haki" => $this->input->post('id_haki')));

        redirect(admin_url('haki'));
    }
}
