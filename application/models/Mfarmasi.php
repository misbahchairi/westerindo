<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mfarmasi extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //  $this->load->database();
    }

    function getFarmasi()
    {
        $query = $this->db->get('farmasi');
        return $query;
    }
    function AddFarmasi($data)
    {
        $query = $this->db->insert('farmasi',$data);
        return $query;
    }
    function EditFarmasi($id,$data)
    {
        $this->db->where('id',$id);
        $query = $this->db->update('farmasi',$data);
        return $query;
    }
    function DeleteFarmasi($id)
    {   
        $this->db->where('id',$id);
        $query = $this->db->delete('farmasi');
        return $query;
    }

    function getKategori()
    {
        $query = $this->db->get('m_obat_kategori');
        return $query;
    }
    function AddKategori($data)
    {
        $query = $this->db->insert('m_obat_kategori',$data);
        return $query;
    }
    function EditKategori($id,$data)
    {
        $this->db->where('id',$id);
        $query = $this->db->update('m_obat_kategori',$data);
        return $query;
    }
    function DeleteKategori($id)
    {   
        $this->db->where('id',$id);
        $query = $this->db->delete('m_obat_kategori');
        return $query;
    }

    function getAllKategoriObat(){
        return $this->db->get('m_obat_kategori');
    }

    function getObatByKat($id){
        $this->db->where('id_kategori',$id);
        $this->db->where('unit',$this->session->userdata('unit'));
        return $this->db->get('m_obat');
    }

    function getObatById($id){
        $this->db->where('id_obat',$id);
        return $this->db->get('m_obat');
    }

    function InsertObat($param)
    {
        $query = $this->db->insert('m_obat',$param);
        return $query;
    }
    function UpdateObat($param)
    {
        $this->db->where('id_obat',$param['id_obat']);
        $query = $this->db->update('m_obat',$param);
        return $query;
    }
    function DeleteObat($id)
    {   
        $this->db->where('id_obat',$id);
        $query = $this->db->delete('m_obat');
        return $query;
    }

}
