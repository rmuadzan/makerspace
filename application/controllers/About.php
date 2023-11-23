<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends Public_Controller {

    private $table = 'sambutan';
    private $pk = 'id_sambutan';

    // Load database
    public function __construct()
    {
        parent::__construct();
    }

    // Index
    public function index()
    {
        var_dump(password_hash('123456', PASSWORD_BCRYPT));
        die();
        

        $pengantar = $this->crud->gd($this->table, array($this->pk => 1));
        $sambutan = $this->crud->gd($this->table, array($this->pk => 2));

        $data = array(  'title'     => 'Kata Pengantar & Sambutan',
                        'pengantar' => $pengantar,
                        'sambutan'  => $sambutan,
                        'jml'       => jml_nav(),
                        'isi'       => 'adminpage/about/edit');

        $valid = $this->form_validation;
        $valid->set_error_delimiters('<i style="color: red;">', '</i>');
        $valid->set_rules('judul_id_pengantar', 'Judul Pengantar (Bahasa Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en_pengantar', 'Judul Pengantar (English)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('isi_id_pengantar', 'Isi Pengantar (Bahasa Indonesia)', 'required');
        $valid->set_rules('isi_en_pengantar', 'Isi Pengantar (English)', 'required');
        $valid->set_rules('judul_id_sambutan', 'Judul Sambutan (Bahasa Indonesia)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('judul_en_sambutan', 'Judul Sambutan (English)', 'required|trim|strip_tags|htmlspecialchars');
        $valid->set_rules('isi_id_sambutan', 'Isi Sambutan (Bahasa Indonesia)', 'required');
        $valid->set_rules('isi_en_sambutan', 'Isi Sambutan (English)', 'required');

        if ($valid->run() === FALSE) $this->load->view('adminpage/_layout/wrapper', $data);
        else
        {
            $input = $this->input->post(NULL, TRUE);
            $data1 = array( 'judul_id'  => $input['judul_id_pengantar'],
                            'judul_en'  => $input['judul_en_pengantar'],
                            'isi_id'    => $input['isi_id_pengantar'],
                            'isi_en'    => $input['isi_en_pengantar'],
                            'uat'       => date('Y-m-d H:i:s'));
            $data2 = array( 'judul_id'  => $input['judul_id_sambutan'],
                            'judul_en'  => $input['judul_en_sambutan'],
                            'isi_id'    => $input['isi_id_sambutan'],
                            'isi_en'    => $input['isi_en_sambutan'],
                            'uat'       => date('Y-m-d H:i:s'));
            $this->crud->u($this->table, $data1, array($this->pk => 1));
            $this->crud->u($this->table, $data2, array($this->pk => 2));
            $this->session->set_flashdata('sukses', 'Data berhasil diperbarui.');
            redirect(admin_url('about'));
        }
    }

    function PindahDataLogin(){
        $all_dosen = $this->crud_fakultas->ga('dosen');
        $total_data = $this->crud_fakultas->ca('dosen');

        //hash
        $pass = '123456';
        $hash_pass = do_hash($pass);

        //checlk
        $check = TRUE;
        var_dump('total data : '.$total_data);
        $i = 1;
        foreach ($all_dosen as $dosen ) {
            var_dump('data ke-'.$i);
            $i++;
            $data_id = acak_id('users', 'id_user')['id'];
            $params = array(
                        'id_user' => $data_id,
                        'username' => $dosen->nip,
                        'password' => $hash_pass,
                        'roles' => 'dosen',
                        'email' => $dosen->email_dosen,
                        );
            if ($this->crud->gd('users', array("username"=>$dosen->nip)))
                continue;
            else
            {
                $result = $this->crud->i('users', $params);
                if($this->db->affected_rows() == 0){
                $check = FALSE;
                var_dump($params, 'Data dosen dengan nip: '. $dosen->nip . ' Gagal Dipindahkan. Proses dihentikan');
                die();
                }
            }
        
        }

        return die('Proses selesai! semua data dosen berhasil dipindahkan');
    }
}
