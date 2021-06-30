<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model extends CI_Model{
    public function __construct()
    {
        parent::__construct();
    }
    public function getcatlog_detail($vid,$cid)
    {
        $this->db->where('vid',$vid);
        $this->db->where('cid',$cid);
       $ctdta= $this->db->get('product_tbl')->result_array();
        return $ctdta;
    }
}