<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends Admin_Controller {

    private $table = 'dosen';
    private $pk = 'nip';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        
        $dosen = $this->crud_fakultas->ga('dosen');
        $data = array(  'title'         => 'Daftar Dosen',
                        'data'          => $dosen,
                        'isi'           => 'adminpage/dosen/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        $data = array(  'title'         => 'Tambah Dosen',
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/dosen/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nip', 'NIP', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nidn', 'NIDN', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_dosen', 'Nama Dosen', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jabatan_dosen', 'Jabatan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_belakang', 'Gelar Belakang', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_depan', 'Gelar Depan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('email_dosen', 'E-mail', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('bidang_penelitian', 'Bidang Penelitian', 'required|trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('s1', 'S1', 'trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('s2', 'S2', 'trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('s3', 'S3', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            
            $file = upload_image('gambar', 'tambah', 'dosen', '', $data);
            
            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);                
                $data = array(  'nip'                   => $input['nip'],
                                'nama_dosen'            => $input['nama_dosen'],
                                'jabatan_dosen'         => $input['jabatan_dosen'],
                                'gelar_belakang'        => $input['gelar_belakang'],
                                'gelar_depan'           => $input['gelar_depan'],
                                'email_dosen'           => $input['email_dosen'],
                                'bidang_penelitian'     => $input['bidang_penelitian'],
                                // 's1'                    => $input['s1'],
                                // 's2'                    => $input['s2'],
                                // 's3'                    => $input['s3'],
                                'foto_dosen'            => $file,);
                $this->crud_fakultas->i('dosen', $data);

                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('dosen'));
            }
        }
    }

    // Update
    public function edit($id_dosen = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $dosen = $this->crud_fakultas->gd($this->table, array($this->pk => $id_dosen));
        // Mengecek jika ID tidak valid
        if (empty($dosen)) view_error('Error 404', 404, 'adminpage');

        $this->load->library('image_manager');
        $load_manager = $this->image_manager->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');
        
        $data = array(  'title'         => 'Edit Data Dosen',
                        'data'          => $dosen,
                        'load_manager'  => $load_manager['config'],
                        'isi'           => 'adminpage/dosen/edit');
        
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nip', 'NIP', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nidn', 'NIDN', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_dosen', 'Nama Dosen', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jabatan_dosen', 'Jabatan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_belakang', 'Gelar Belakang', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_depan', 'Gelar Depan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('email_dosen', 'E-mail', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('bidang_penelitian', 'Bidang Penelitian', 'required|trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('s1', 'S1', 'trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('s2', 'S2', 'trim|strip_tags|htmlspecialchars');
        // $valid->set_rules('s3', 'S3', 'trim|strip_tags|htmlspecialchars');
        
        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
        	// Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_image('gambar', 'edit', 'dosen', '', $data);
            
            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);                
                $data = array(  'nip'                   => $input['nip'],
                                'nama_dosen'            => $input['nama_dosen'],
                                'jabatan_dosen'         => $input['jabatan_dosen'],
                                'gelar_belakang'        => $input['gelar_belakang'],
                                'gelar_depan'           => $input['gelar_depan'],
                                'email_dosen'           => $input['email_dosen'],
                                'bidang_penelitian'     => $input['bidang_penelitian'],
                                // 's1'                    => $input['s1'],
                                // 's2'                    => $input['s2'],
                                // 's3'                    => $input['s3'],
                                'foto_dosen'          => $file);
                $this->crud_fakultas->u('dosen', $data, array($this->pk => $id_dosen));

                $this->session->set_flashdata('sukses', 'Halaman berhasil diupdate.');
                redirect(admin_url('dosen'));
            }
        }
    }

    // Hapus
    public function hapus($id_staff = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'adminpage');

        $cek = $this->crud_fakultas->gd($this->table, array($this->pk => $id_staff));
        if ($this->input->get('act', TRUE) == $id_staff && ! empty($cek))
        {
            $this->crud_fakultas->d($this->table, array($this->pk => $id_staff));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('dosen'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('dosen'));
        }
    }

    public function get_dosen(){
        $data = $this->crud_mahasiswa->ga('dosen');
        echo json_encode($data);
    }
}
