<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mpromotif extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //  $this->load->database();
    }
    
    function add($array) {
        $query=$this->db->insert('promotif',$array);
        return $query;
    }
    function edit($id,$data){
       $this->db->where('id_promotif',$id);
       $result = $this->db->update('promotif',$data);
       return $result;
    }
    function delete($id){
       $this->db->where('id_promotif',$id);
       $result = $this->db->delete('promotif');
       return $result;
    }
    function getPromotif() {
        $query=$this->db->get('promotif');
        return $query;
    }
    function getPromotifKalender() {
        $this->db->join('m_kategori','m_kategori.id = promotif.idkategori');
        $query=$this->db->get('promotif');
        return $query;
    }
    function getPromotifByid($id) {
        $this->db->where('id_promotif',$id);
        $query=$this->db->get('promotif');
        return $query;
    }
    function getPromotifByid2($id) {
        $this->db->select('*, m_kategori.deskripsi as deskripsi_kategori');
        $this->db->join('m_kategori','m_kategori.id = promotif.idkategori');
        $this->db->where('id_promotif',$id);
        $query=$this->db->get('promotif');
        return $query;
    }
    function delmateri($id,$data){
       $this->db->where('id_promotif',$id);
       $result = $this->db->update('promotif',$data);
       return $result;
    }

    function getKategoriByTipe($tipe)
    {
        $this->db->where('tipe',$tipe);
        $query = $this->db->get('m_kategori');
        return $query;
    }

}
