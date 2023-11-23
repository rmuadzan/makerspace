<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends Dosen_Controller {

    private $table = 'lab';
    private $pk = 'nip';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('dosen');
    }

    // Index
    public function index()
    {
        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $this->load->library('image_dosen');
        $load_manager = $this->image_dosen->load_manager('img', upload_url('imagemanager').'article/small/no_image.png');

        $data = array(  'title'         => 'Bioadata Dosen',
                        'data'          => $bio,
                        'load_manager'  => $load_manager['config'],
                        'jabatan'  => $this->config->item("jabatan"),
                        'isi'           => 'dosenpage/biodata/biodata');
        $this->load->view('dosenpage/_layout/wrapper', $data);
    }

    // Update
    public function edit($nip = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');

        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        
        // Mengecek jika ID tidak valid

        $data = array(  'title'         => 'Bioadata Dosen',
                        'data'          => $bio,
                        'jabatan'  => $this->config->item("jabatan"),
                        'isi'           => 'dosenpage/biodata/biodata');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('nama', 'Nama Lengkap Tanpa Gelar', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_depan', 'Gelar Depan', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('gelar_belakang', 'Gelar Belakang', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nidn', 'NIDN', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nip', 'NIP', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jabatan', 'Jabatan Akademik', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('email', 'Email', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('keahlian', 'Bidang Keahlian', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('jenis_kelamin', 'Jenis Kelamini', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tempat_lahir', 'Tempat Lahir', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('scholar_id', 'Id Google Scholar');
        $valid->set_rules('sinta_id', 'Id Sinta');
        $valid->set_rules('telepon', 'Telepon', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('fax', 'Fax', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('alamat', 'Alamat', 'required');
        $valid->set_rules('s1', 'Universitas(S1)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('s2', 'Universitas(S2)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('s3', 'Universitas(S3)', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('dosenpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            //$gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            $file = upload_image('nama_file', 'edit', 'dosen', $bio->foto_dosen, $data);
            
            // // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'nip'               => $input['nip'],
                                'nidn'              => $input['nidn'],
                                'nama_dosen'        => $input['nama'],
                                'gelar_depan'       => $input['gelar_depan'],
                                'gelar_belakang'    => $input['gelar_belakang'],
                                'jabatan_dosen'     => $input['jabatan'],
                                'email_dosen'       => $input['email'],
                                'bidang_penelitian' => $input['keahlian'],
                                'jenis_kelamin'     => $input['jenis_kelamin'],
                                'tanggal_lahir'     => $input['tanggal_lahir'],
                                'tempat_lahir'      => $input['tempat_lahir'],
                                'scholar_id'        => $input['scholar_id'],
                                'sinta_id'          => $input['sinta_id'],
                                'telepon'           => $input['telepon'],
                                'fax'               => $input['fax'],
                                'alamat'            => $input['alamat'],
                                'foto_dosen'        => $file,
                                's1'                => $input['s1'],
                                's2'                => $input['s2'],
                                's3'                => $input['s3']);
                $this->crud_fakultas->u('dosen', $data, array($this->pk => $nip));
                $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
                redirect(dosen_url('biodata'));
            }
        }
    }

    // Hapus
    public function edit_pass($nip = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404', 404, 'dosenpage');
        
        
        $input = $this->input->post(NULL, TRUE);
        $data = array(  'password'  => do_hash($input['password']));
        $this->crud->u('users', $data, array('username' => $nip));
        $this->session->set_flashdata('sukses', 'halaman berhasil diperbarui.');
        redirect(dosen_url('biodata'));
    }

    public function cv_print()
    {
        $bio = $this->crud_fakultas->gd('dosen',array('nip' => $this->session->username));
        $penelitian = $this->crud->gjw('dosen_penelitian', 'penelitian', 'id_penelitian', array('dosen_penelitian.nip' => $bio->nip));
        $publikasi = $this->crud->gjw('rel_dosen_publikasi', 'publikasi', 'id_publikasi', array('rel_dosen_publikasi.nip' => $bio->nip));
        $haki = $this->crud->gjw('rel_dosen_haki', 'haki', 'id_haki', array('rel_dosen_haki.nip' => $bio->nip));

        $data = array(
            'bio'           => $bio,
            'penelitian'    => $penelitian,
            'publikasi'     => $publikasi,
            'haki'          => $haki
        );

        $html = $this->load->view('dosenpage/biodata/pdf', $data, true);
        // $html = $this->load->view('departemen/pdf/pdf', [], true);
        $this->pdf->createPDF($html, 'CV '.$bio->nama_dosen, false);
    }
}
