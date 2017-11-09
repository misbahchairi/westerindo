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
    function deleteKuratif($idkuratif)
    {
        $this->db->where('idkuratif' , $idkuratif);
        $query = $this->db->delete('kuratif');

        return $query;
    }
    function addRiwayat($data)
    {
        return $this->db->insert('kuratif_riwayat',$data);
    }
    function getRiwayatByid($id)
    {
        $this->db->where('rp_idpasien',$id);
        return $this->db->get('kuratif_riwayat');
    }
    function addVital($data)
    {
        return $this->db->insert('kuratif_tandavital',$data);
    }
    function deleteVital($id)
    {
        $this->db->where('tv_idkuratif',$id);
        return $this->db->delete('kuratif_tandavital');
    }
    function addTemuanPF($data)
    {
        return $this->db->insert('kuratif_temuanpf',$data);
    }
    function getTemuanByid($id)
    {
        $this->db->where('pf_idkuratif',$id);
        return $this->db->get('kuratif_temuanpf');
    }
    function deleteTemuanPF($id)
    {
        $this->db->where('pf_idkuratif',$id);
        return $this->db->delete('kuratif_temuanpf');
    }
    function addTindakan($data)
    {
        return $this->db->insert('kuratif_tindakan',$data);
    }
    function getTindakanByid($id)
    {
        $sql = "SELECT tdk.* , 
                       obt.nama_obat 
                FROM kuratif_tindakan tdk
                LEFT JOIN m_obat obt ON tdk.td_idobat = obt.id_obat 
                WHERE tdk.td_idkuratif = '".$id."'
                ;";
        $query = $this->db->query($sql);
        return $query;
    }
    function deleteTindakan($id)
    {
        $this->db->where('td_idkuratif',$id);
        return $this->db->delete('kuratif_tindakan');
    }


    // antrian
    function getAntrian()
    {
        $sql = "SELECT ktf.* , 
                       usr.nama as nama_perawat ,
                       psn.nama as nama_pasien ,
                       dkr.nama as nama_dokter ,
                       unt.nama as nama_unit ,
                       udkr.nama as nama_unit_dokter 
                FROM kuratif ktf
                LEFT JOIN m_user usr ON ktf.ku_idperawat = usr.user_id
                LEFT JOIN m_user dkr ON ktf.ku_iddokter = dkr.user_id
                LEFT JOIN m_pasien psn ON  ktf.ku_idpasien = psn.id_pasien
                LEFT JOIN m_unit unt ON  usr.unit = unt.id_unit
                LEFT JOIN m_unit udkr ON  dkr.unit = udkr.id_unit
                WHERE NOT ktf.ku_state = 'tindakan'
                ;";
        $query = $this->db->query($sql);
        return $query;
    }
    function getAntrianByid()
    {
        $sql = "";
        $query = $this->db->query($sql);
        return $query;
    }
    function getLanjutan($id)
    {
        $sql = "SELECT ktf.* , 
                       psn.nama as nama_pasien , psn.* ,
                       psn.foto ,
                       dgs.nama as nama_diagnosa, dgs.keterangan as ket_diagnosa,
                       tv.* 
                FROM kuratif ktf
                LEFT JOIN m_pasien psn ON  ktf.ku_idpasien = psn.id_pasien
                LEFT JOIN kuratif_tandavital tv ON  tv.tv_idkuratif = ktf.idkuratif
                LEFT JOIN m_diagnosa dgs ON ktf.ku_iddiagnosa = dgs.id_diagnosa
                WHERE ktf.idkuratif = '".$id."' GROUP BY ktf.idkuratif
                ;";
        $query = $this->db->query($sql);
        return $query;
    }
    function getRiwayatPasien($id)
    {
        $sql = "SELECT ktf.* , 
                       psn.nama as nama_pasien , psn.* ,
                       psn.foto ,
                       dgs.nama as nama_diagnosa, dgs.keterangan as ket_diagnosa,
                       tv.*,
                       drjk.nama_rs , drjk.nama_dr 
                FROM kuratif ktf
                LEFT JOIN m_pasien psn ON  ktf.ku_idpasien = psn.id_pasien
                LEFT JOIN kuratif_tandavital tv ON  tv.tv_idkuratif = ktf.idkuratif
                LEFT JOIN m_diagnosa dgs ON ktf.ku_iddiagnosa = dgs.id_diagnosa
                LEFT JOIN m_rujukan drjk ON ktf.ku_idrujukan = drjk.id_rujukan
                WHERE ktf.ku_idpasien = '".$id."' 
                ;";
        $query = $this->db->query($sql);
        return $query;
    }

    function addRujukan($data)
    {
        $this->db->insert('m_rujukan',$data);
        return $this->db->insert_id();
    }


}
