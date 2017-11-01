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
    function updateKuratif($data,$idkuratif)
    {
        $this->db->where('idkuratif' , $idkuratif);
        $query = $this->db->update('kuratif',$data);
        return $query;
    }
    function addRiwayat($data)
    {
        return $this->db->insert('kuratif_riwayat',$data);
    }
    function addVital($data)
    {
        return $this->db->insert('kuratif_tandavital',$data);
    }


    // antrian
    function getAntrian()
    {
        $sql = "SELECT ktf.* , 
                       usr.nama as nama_perawat ,
                       psn.nama as nama_pasien ,
                       dkr.nama as nama_dokter ,
                       unt.nama as nama_unit
                FROM kuratif ktf
                LEFT JOIN m_user usr ON ktf.ku_idperawat = usr.user_id
                LEFT JOIN m_user dkr ON ktf.ku_iddokter = usr.user_id
                LEFT JOIN m_pasien psn ON  ktf.ku_idpasien = psn.id_pasien
                LEFT JOIN m_unit unt ON  usr.unit = unt.id_unit
                ;";
        $query = $this->db->query($sql);
        return $query;
    }


}
