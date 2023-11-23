<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Penelitian extends Admin_Controller {

    private $table = 'penelitian';
    private $pk = 'id_penelitian';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('tahun', 'judul', 'sumber_dana'));

        $config['total_rows'] = $this->crud->cw('penelitian','('.$cari_query.') AND jenis = "penelitian"');
        $config['per_page'] = 10;
        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        $penelitian = $this->crud->gwlo('penelitian' ,'('.$cari_query.') AND jenis = "penelitian"', $config['per_page'], $offset, 'tahun ASC');
        
        $data = array(  'title'         => 'Daftar Penelitian Teknik Sistem Perkapalan',
                        'buku'          => $penelitian,
                        // 'ketua'         => $ketua->nama_dosen,
                        'jml'           => jml_nav(),
                        'pagination'    => $this->pagination->create_links(),
                        'isi'           => 'adminpage/penelitian/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    public function pengabdian()
    {
        // $ketua = NULL
        $q = $this->input->get('q', TRUE) ? $this->input->get('q', TRUE) : NULL;
        $cari_query = cari_query($q, array('tahun', 'judul', 'sumber_dana'));

        $config['total_rows'] = $this->crud->cw('penelitian','('.$cari_query.') AND jenis = "pengabdian"');
        $config['per_page'] = 10;
        $offset = (($this->input->get('p', TRUE) ? $this->input->get('p', TRUE) : 1) - 1) * $config['per_page'];
        $this->pagination->initialize($config);

        $penelitian = $this->crud->gwlo('penelitian' ,'('.$cari_query.') AND jenis = "pengabdian"', $config['per_page'], $offset, 'tahun ASC');
        
        $data = array(  'title'         => 'Daftar Penelitian Teknik Sistem Perkapalan',
                        'buku'          => $penelitian,
                        // 'ketua'         => $ketua->nama_dosen,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/penelitian/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        $dosen = $this->crud_mahasiswa->ga('dosen');
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title'         => 'Tambah File',
                        'dosen'         => $dosen,
                        'isi'           => 'adminpage/penelitian/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('dosen[]', 'Dosen', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul', 'Judul Penelitian', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('dana', 'Dana', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('sumber_dana', 'Sumber Dana', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tahun', 'Tahun', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis', 'Jenis', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $file = upload_document('file', 'tambah', 'penelitian', '', $data);

            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL,'', FALSE);
                $dosen = $input['dosen'];
                $data = array(  'judul'         => $input['judul'],
                                'dana'          => $input['dana'],
                                'sumber_dana'   => $input['sumber_dana'],
                                'tahun'         => $input['tahun'],
                                'jenis'         => $input['jenis'],
                                'laporan'       => $file,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('penelitian', $data);

                $id = $this->db->insert_id();
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
            }
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

        $dosen = $this->crud_mahasiswa->ga('dosen');
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
                                'jenis'         => ($input['jenis']),
                                // 'laporan'       => $file,
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->u('penelitian', $data, array('id_penelitian' => $id));
                $i = 0;

                $this->crud->d('dosen_penelitian', array('id_penelitian' => $id));

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
            $this->crud->d('dosen_penelitian', array('id_penelitian' => $id));
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
