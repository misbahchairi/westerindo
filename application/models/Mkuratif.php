<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mkuratif extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //  $this->load->database();
    }

    function getTensi()
    {
        $query = $this->db->get('tensi');
        return $query;
    }
    function addTensi($data)
    {
        $query = $this->db->insert('tensi',$data);
        return $query;
    }
    function editTensi($id,$data)
    {
        $this->db->where('id_tensi',$id);
        $query = $this->db->update('tensi',$data);
        return $query;
    }
    function deleteTensi($id)
    {
        $this->db->where('id_tensi',$id);
        $query = $this->db->delete('tensi');
        return $query;
    }
    function getAllRekamMedis($kode){
        $this->db->or_like('nik',$kode);
        $this->db->or_like('nama',$kode);
        $query = $this->db->get('m_pasien');
        return $query;
    }

    function getRekamMedisByNIK($nik){
        $this->db->where('nik',$nik);
        return $this->db->get('m_pasien');
    }

    function addKuratif($data)
    {
        $this->db->insert('kuratif',$data);
        return $this->db->insert_id();
    }
}
