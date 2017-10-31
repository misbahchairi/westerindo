<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mpreventif extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //  $this->load->database();
    }
    
    function add($array) {
        $query=$this->db->insert('preventif',$array);
        return $query;
    }
    function edit($id,$data){
       $this->db->where('id_preventif',$id);
       $result = $this->db->update('preventif',$data);
       return $result;
    }
    function delete($id){
       $this->db->where('id_preventif',$id);
       $result = $this->db->delete('preventif');
       return $result;
    }
    function getPreventif() {
        $query=$this->db->get('preventif');
        return $query;
    }
    function getPreventifByid($id) {
        $this->db->where('id_preventif',$id);
        $query=$this->db->get('preventif');
        return $query;
    }
    function getPreventifByid2($id) {
        $this->db->select('*, m_kategori.deskripsi as kode_kategori');
        $this->db->join('m_kategori','m_kategori.id = preventif.kategori');
        $this->db->where('id_preventif',$id);
        $query=$this->db->get('preventif');
        return $query;
    }
    function delmateri($id,$data){
       $this->db->where('id_preventif',$id);
       $result = $this->db->update('preventif',$data);
       return $result;
    }

}
