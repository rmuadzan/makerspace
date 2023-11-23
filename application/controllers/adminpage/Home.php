<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Admin_Controller {
    
    public function index()
    {
        //Staff can access
        $this->uauth->authorization('admin');

        // $date1 = date_create(date("Y-m-d"));
        // $date2 = date_create("2022-02-01");

        // $date = date_diff($date1, $date2);

        // var_dump($date->y." years ".$date->m." months ".$date->d." days");
        // die();

        $data = array(  'title'     => 'Halaman Dasbor',
                        'subtitle'  => 'Selamat datang, '.$this->session->fullname.'.',
                        'isi'       => 'adminpage/home/beranda');
        $this->load->view('adminpage/_layout/wrapper', $data);
    }
}
