<?php
defined('BASEPATH') OR exit('No direct script access allowed');

abstract class My_Controller extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        //Minified Every HTML and JS on view
        // $this->ci_minifier->enable_obfuscator();
        
    }
    
}

class Admin_Controller extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('admin');
    }
}

class Dosen_Controller extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        $this->uauth->authorization('dosen');
    }
}

class Public_Controller extends MY_Controller {

    function __construct()
    {
        parent::__construct();
        
    }
}
