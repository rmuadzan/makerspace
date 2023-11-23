<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Skripsi extends Admin_Controller {

    private $table = 'perpustakaan';
    private $pk = 'id_perpustakaan';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('admin');
    }

    // Index
    public function index()
    {
        
        $buku = $this->crud->gw('perpustakaan', array('jenis' => 'skripsi'));
        $data = array(  'title'         => 'Daftar Skripsi Teknik Sistem Perkapalan',
                        'buku'          => $buku,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/skripsi/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        $mahasiswa = $this->crud_mahasiswa->gw('mahasiswa_aktif', array('departemen' => 'Sistem Perkapalan'));
        $dosen = $this->crud_fakultas->ga('data_dosen');
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $data = array(  'title'         => 'Tambah File',
                        'mahasiswa'     => $mahasiswa,
                        'dosen'         => $dosen,
                        'isi'           => 'adminpage/skripsi/tambah');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('mahasiswa', 'Mahasiswa', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_file_id', 'Nama Laboratorium (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_file_en', 'Nama Laboratorium (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('pembimbing[]', 'Pembimbing', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('penguji[]', 'Penguji', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tanggal_proposal', 'Tanggal Proposal', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            // $gambar = upload_image('gambar', 'tambah', 'blogs', '', $data);
            
            $file = upload_document('file', 'tambah', 'skripsi', '', $data, TRUE);

            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL,'', FALSE);
                $mhs = explode(' - ', $input['mahasiswa']);
                $data = array(  'nim'                   => $mhs[0],
                                'nama_mahasiswa'        => $mhs[1],
                                'nama_file_id'          => $input['nama_file_id'],
                                'nama_file_en'          => $input['nama_file_en'],
                                'tanggal_proposal'      => $input['tanggal_proposal'],
                                'jenis'                 => 'skripsi',
                                'file'                  => $file,
                                'iat'                   => date('Y-m-d H:i:s'));
                $this->crud->i('perpustakaan', $data);



                $b = $input['pembimbing'];
                $u = $input['penguji'];
                $ib = 1;
                $iu = 1;

                $id = $this->db->insert_id();

                foreach($b as $pembimbing)
                {
                    if(!empty($pembimbing)){
                        $data1 = array( 'id_skripsi'=> $id,
                                        'nip'       => $pembimbing,
                                        'status'    => 'Pembimbing '.$ib);
                        $this->crud->i('rel_dosen_skripsi', $data1);
                    }
                    $ib++;
                }

                foreach($u as $penguji)
                {
                    if(!empty($penguji)){
                        $data1 = array( 'id_skripsi'=> $id,
                                        'nip'       => $penguji,
                                        'status'    => 'Penguji '.$ib);
                        $this->crud->i('rel_dosen_skripsi', $data1);
                    }
                    $iu++;
                }
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('skripsi'));
            }
        }
    }

    // Update
    public function edit($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $skripsi = $this->crud->gd('perpustakaan', array('id_perpustakaan' => $id));
        $mahasiswa = $this->crud_mahasiswa->gw('mahasiswa_aktif', array('departemen' => 'Sistem Perkapalan'));
        $dosen = $this->crud_fakultas->ga('data_dosen');

        // Mengecek jika ID tidak valid
        if (empty($skripsi)) view_error('Error 404', 'admin');

        $data = array(  'title' => 'Edit Skripsi',
                        'data'  => $skripsi,
                        'mahasiswa' => $mahasiswa,
                        'dosen'     => $dosen,
                        'kategori'  => $this->config->item("kategori"),
                        'isi'   => 'adminpage/skripsi/edit');

        $this->load->helper('security');
        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('mahasiswa', 'Mahasiswa', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_file_id', 'Nama Laboratorium (Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('nama_file_en', 'Nama Laboratorium (Inggris)', 'trim|strip_tags|htmlspecialchars');
        $valid->set_rules('pembimbing[]', 'Pembimbing', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('penguji[]', 'Penguji', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('tanggal', 'Tanggal Ujian', 'required|trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $file = upload_document('file', 'edit', 'skripsi', $skripsi->file, $data);

            // Masuk ke database
            if ($file !== FALSE)
            {
                $input = $this->input->post(NULL,'', FALSE);
                $mhs = explode(' - ', $input['mahasiswa']);
                $data = array(  'nim'           => $mhs[0],
                                'nama_mahasiswa'=> $mhs[1],
                                'nama_file_id'  => $input['nama_file_id'],
                                'nama_file_en'  => $input['nama_file_en'],
                                'tanggal'       => $input['tanggal'],
                                'jenis'         => 'skripsi',
                                'file'          => $file,
                                'iat'           => date('Y-m-d H:i:s'));


                $b = $input['pembimbing'];
                $u = $input['penguji'];
                $ib = 1;
                $iu = 1;

                $this->crud->d('rel_dosen_skripsi', ['id_skripsi' => $id]);

                foreach($b as $pembimbing)
                {
                    if(!empty($pembimbing)){
                        $data1 = array( 'id_skripsi'=> $id,
                                        'nip'       => $pembimbing,
                                        'status'    => 'Pembimbing '.$ib);
                        $this->crud->i('rel_dosen_skripsi', $data1);
                    }
                    $ib++;
                }

                foreach($u as $penguji)
                {
                    if(!empty($penguji)){
                        $data1 = array( 'id_skripsi'=> $id,
                                        'nip'       => $penguji,
                                        'status'    => 'Penguji '.$ib);
                        $this->crud->i('rel_dosen_skripsi', $data1);
                    }
                    $iu++;
                }

                $this->crud->u('perpustakaan', $data, array('id_perpustakaan' => $id));
                $this->session->set_flashdata('sukses', 'Halaman berhasil ditambah.');
                redirect(admin_url('skripsi'));
            }
        }
    }

    // Hapus
    public function hapus($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd('perpustakaan', array('id_perpustakaan' => $id));
        if ($this->input->get('act', TRUE) == $id && ! empty($cek))
        {
            if ($cek->file != '')
            {
                unlink('./'.upload_path('skripsi').$cek->file);
            }
            $this->crud->d('perpustakaan', array('id_perpustakaan' => $id));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('skripsi'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('skripsi'));
        }
    }

    public function ujian()
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');
        $tanggal = $this->input->post('tanggal');

        $data = [
            'tanggal'    => $tanggal,
        ];

        // var_dump($data);
        // die();

        $this->crud->u('perpustakaan', $data, array("nim" => $this->input->post('nim')));

        redirect(admin_url('skripsi'));
    }
}
