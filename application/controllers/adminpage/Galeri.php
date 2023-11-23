<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri extends Admin_Controller {

    private $table = 'galeri';
    private $pk = 'id_galeri';

    // Load database
    public function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('editor');
    }

    // Index
    public function index()
    {
        $galeri = $this->crud->ga($this->table);
        $data = array(  'title'         => 'Galeri Sistem Perkapalan',
                        'galeri'        => $galeri,
                        'jml'           => jml_nav(),
                        'isi'           => 'adminpage/galeri/list');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }

    // Tambah
    public function tambah()
    {
        $data = array(  'title'     => 'Tambah Gambar Berita',
                        'isi'       => 'adminpage/blogs/gambar');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('keterangan', 'Keterangan', 'trim|strip_tags|htmlspecialchars');;

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 720;

            $gambar = upload_image(array('foto', $cfoto), 'tambah', 'blogs', '', $data, TRUE);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'file'          => $gambar,
                                'keterangan'    => $input['keterangan'],
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->i('galeri', $data);
                $this->session->set_flashdata('sukses', 'Gambar berhasil ditambah.');
                redirect(admin_url('blogs/view/'.$id));
            }
        }
    }

    // Update
    public function edit($id = NULL)
    {

        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $kegiatan = $this->crud->gd($this->table, array($this->pk => $id));

        // Mengecek jika ID tidak valid
        if (empty($kegiatan)) view_error('Error 404');

        $data = array(  'title' => 'Edit Kegiatan',
                        'data'  => $kegiatan,
                        // 'jml'   => jml_nav(),
                        'isi'   => 'adminpage/galeri/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('keterangan', 'Keterangan', 'trim|strip_tags|htmlspecialchars');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            // Mekanisme upload gambar
            $cfoto = json_decode($this->input->post('cfoto'));
            if ($cfoto) $cfoto->default_width = 720;

            $gambar = upload_image(array('gambar', $cfoto), 'edit', 'blogs', $kegiatan->file, $data);

            // Masuk ke database
            if ($gambar !== FALSE)
            {
                $input = $this->input->post(NULL, TRUE);
                $data = array(  'file'          => $gambar,
                                'keterangan'    => $input['keterangan'],
                                'iat'           => date('Y-m-d H:i:s'));
                $this->crud->u($this->table, $data, array($this->pk => $id));
                $this->session->set_flashdata('sukses', 'kegiatan berhasil diperbarui.');
                redirect(admin_url('galeri'));
            }
        }
    }

    // Hapus
    public function hapus($id = NULL)
    {
        if ($this->session->akses_level == 'Blocked') view_error('Error 404');

        $cek = $this->crud->gd($this->table, array($this->pk => $id));
        if ($this->input->get('act', TRUE) == $id && ! empty($cek))
        {
            if ($cek->gambar != '')
            {
                unlink('./'.upload_path('blogs').$cek->file);
                unlink('./'.upload_path('blogs').'thumbs/'.$cek->file);
            }
            $this->crud->d($this->table, array($this->pk => $id));
            $this->session->set_flashdata('sukses', 'Data berhasil dihapus.');
            redirect(admin_url('galeri'));
        }
        else
        {
            $this->session->set_flashdata('gagal', 'Data gagal dihapus.');
            redirect(admin_url('galeri'));
        }
    }
}
