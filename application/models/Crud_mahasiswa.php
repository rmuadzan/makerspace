<?php defined('BASEPATH') OR exit('No direct script access allowed');
class Crud_Mahasiswa extends CI_Model {
    private $_mhs;
    public function __construct()
    {
        parent::__construct();
        $this->_mhs = $this->load->database('kinerja', TRUE);
        
    }
    public function ca($t){return $this->_mhs->get($t)->num_rows();}
    public function ga($t){return $this->_mhs->get($t)->result();}
    public function gao($t,$o){return $this->_mhs->order_by($o)->get($t)->result();}
    public function gl($t,$l,$f){return $this->_mhs->limit($l,$f)->get($t)->result();}
    public function glo($t,$l,$f,$o){return $this->_mhs->limit($l,$f)->order_by($o)->get($t)->result();}
    public function cw($t,$w){return $this->_mhs->where($w)->get($t)->num_rows();}
    public function cwlike($t,$w,$like){return $this->_mhs->where($w)->like($like)->get($t)->num_rows();}
    public function gw($t,$w){return $this->_mhs->where($w)->get($t)->result();}
    public function gwo($t,$w,$o){return $this->_mhs->where($w)->order_by($o)->get($t)->result();}
    public function gwl($t,$w,$l,$f){return $this->_mhs->where($w)->limit($l,$f)->get($t)->result();}
    public function gwlo($t,$w,$l,$f,$o){return $this->_mhs->where($w)->limit($l,$f)->order_by($o)->get($t)->result();}
    public function gjwlo($t,$tj,$c,$w,$l,$f,$o,$jj = 'LEFT'){return $this->_mhs->join($tj,$tj.'.'.$c.' = '.$t.'.'.$c,$jj)->where($w)->limit($l,$f)->order_by($o)->get($t)->result();} //$tj == table join, $c = kolom yang mau di cocokkan, $jj = jenis join
    public function gjwlikelo($t,$tj,$c,$w,$like,$l,$f,$o,$jj = 'LEFT'){return $this->_mhs->join($tj,$tj.'.'.$c.' = '.$t.'.'.$c,$jj)->where($w)->like($like)->limit($l,$f)->order_by($o)->get($t)->result();} //$tj == table join, $c = kolom yang mau di cocokkan, $jj = jenis join
    public function gd($t,$w){return $this->_mhs->where($w)->get($t)->row();}
    public function gjd($t,$tj,$c,$w,$jj = 'LEFT'){return $this->_mhs->join($tj,$tj.'.'.$c.' = '.$t.'.'.$c,$jj)->where($w)->get($t)->row();}
    public function gda($t,$w){return $this->_mhs->where($w)->get($t)->row_array();}
    public function i($t,$d){$this->_mhs->insert($t,$d);}
    public function u($t,$d,$w){$this->_mhs->where($w)->update($t,$d);}
    public function d($t,$w){$this->_mhs->where($w)->delete($t);}
    public function q($q){return $this->_mhs->query($q);}
    public function qa($q){return $this->_mhs->query($q)->result();}
}
