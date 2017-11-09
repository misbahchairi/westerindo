<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');

class mmaster extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        //  $this->load->database();
    }
    // obat
    function getObat() {
        $this->db->select('*');
        $this->db->from('m_obat_kategori');
        $this->db->join('m_obat', 'm_obat.id_kategori = m_obat_kategori.id');
        $query = $this->db->get();
        return $query;
    }
    function getObatByid($id) {
        $this->db->select('*');
        $this->db->from('m_obat_kategori');
        $this->db->join('m_obat', 'm_obat.id_kategori = m_obat_kategori.id');
        $this->db->where('m_obat.id_obat',$id);
        $query = $this->db->get();
        return $query;
    }
    function getObatByidMini($id) {
        $this->db->where('id_obat',$id);
        $query = $this->db->get('m_obat');
        return $query;
    }
    function getObatKategori()
    {
        $query = $this->db->get('m_obat_kategori');
        return $query;
    }
    function AddKategoriObat($data)
    {
        $query = $this->db->insert('m_obat_kategori',$data);
        return $query;
    }
    function DeleteKategoriObat($id)
    {   
        $this->db->where('id',$id);
        $query = $this->db->delete('m_obat_kategori');
        return $query;
    }
    function EditKategoriObat($id,$data)
    {
        $this->db->where('id',$id);
        $query = $this->db->update('m_obat_kategori',$data);
        return $query;
    }
    function AddObat($data)
    {
        $query = $this->db->insert('m_obat',$data);
        return $query;
    }
    function DeleteObat($id)
    {   
        $this->db->where('id_obat',$id);
        $query = $this->db->delete('m_obat');
        return $query;
    }
    function EditObat($id,$data)
    {
        $this->db->where('id_obat',$id);
        $query = $this->db->update('m_obat',$data);
        return $query;
    }

    // anamnesa
    function getAnamnesa()
    {
        $query = $this->db->get('m_anamnesa');
        return $query;
    }
    function getAnamnesaByid($id)
    {
        $this->db->where('id_anamnesa',$id);
        $query = $this->db->get('m_anamnesa');
        return $query;
    }
    function AddAnamnesa($data)
    {
        $query = $this->db->insert('m_anamnesa',$data);
        return $query;
    }
    function EditAnamnesa($id,$data)
    {
        $this->db->where('id_anamnesa',$id);
        $query = $this->db->update('m_anamnesa',$data);
        return $query;
    }
    function DeleteAnamnesa($id)
    {   
        $this->db->where('id_anamnesa',$id);
        $query = $this->db->delete('m_anamnesa');
        return $query;
    }

    // anamnesa
    function getDepartment()
    {
        $query = $this->db->get('m_department');
        return $query;
    }
    function getDepartmentByid($id)
    {
        $this->db->where('id_department',$id);
        $query = $this->db->get('m_department');
        return $query;
    }
    function AddDepartment($data)
    {
        $query = $this->db->insert('m_department',$data);
        return $query;
    }
    function EditDepartment($id,$data)
    {
        $this->db->where('id_department',$id);
        $query = $this->db->update('m_department',$data);
        return $query;
    }
    function DeleteDepartment($id)
    {   
        $this->db->where('id_department',$id);
        $query = $this->db->delete('m_department');
        return $query;
    }

    // pf
    function getPf()
    {
        $query = $this->db->get('m_pf');
        return $query;
    }
    function AddPf($data)
    {
        $query = $this->db->insert('m_pf',$data);
        return $query;
    }
    function EditPf($id,$data)
    {
        $this->db->where('id_pf',$id);
        $query = $this->db->update('m_pf',$data);
        return $query;
    }
    function DeletePf($id)
    {   
        $this->db->where('id_pf',$id);
        $query = $this->db->delete('m_pf');
        return $query;
    }

    // pf
    function getRujukan()
    {
        $query = $this->db->get('m_rujukan');
        return $query;
    }
    function AddRujukan($data)
    {
        $query = $this->db->insert('m_rujukan',$data);
        return $query;
    }
    function EditRujukan($id,$data)
    {
        $this->db->where('id_rujukan',$id);
        $query = $this->db->update('m_rujukan',$data);
        return $query;
    }
    function DeleteRujukan($id)
    {   
        $this->db->where('id_rujukan',$id);
        $query = $this->db->delete('m_rujukan');
        return $query;
    }

    // diagnosa
    function getDiagnosa()
    {
        $query = $this->db->get('m_diagnosa');
        return $query;
    }
    function getDiagnosaByid($id)
    {
        $this->db->where('id_diagnosa',$id);
        $query = $this->db->get('m_diagnosa');
        return $query;
    }
    function AddDiagnosa($data)
    {
        $query = $this->db->insert('m_diagnosa',$data);
        return $query;
    }
    function EditDiagnosa($id,$data)
    {
        $this->db->where('id_diagnosa',$id);
        $query = $this->db->update('m_diagnosa',$data);
        return $query;
    }
    function DeleteDiagnosa($id)
    {   
        $this->db->where('id_diagnosa',$id);
        $query = $this->db->delete('m_diagnosa');
        return $query;
    }

    // dokter
    function getDokter()
    {
        $this->db->select('m_user.*, m_unit.nama as nama_unit');
        $this->db->join('m_unit','id_unit = unit');
        $this->db->where('role', 1);
        $query = $this->db->get('m_user');
        return $query;
    }
    function getDokterByid($id)
    {   
        $this->db->select('m_user.*, m_unit.nama as nama_unit');
        $this->db->join('m_unit','id_unit = unit');
        $this->db->where('role', 1);
        $this->db->where('user_id',$id);
        $query = $this->db->get('m_user');
        return $query;
    }
    function AddDokter($data)
    {
        $query = $this->db->insert('m_user',$data);
        return $query;
    }
    function EditDokter($id,$data)
    {
        $this->db->where('user_id',$id);
        $query = $this->db->update('m_user',$data);
        return $query;
    }
    function DeleteDokter($id)
    {   
        $this->db->where('user_id ',$id);
        $query = $this->db->delete('m_user');
        return $query;
    }

    // dokter
    function getUser()
    {
        $this->db->select('m_user.*, m_unit.nama as nama_unit');
        $this->db->join('m_unit','id_unit = unit');
        $this->db->where('role', 2);
        $query = $this->db->get('m_user');
        return $query;
    }
    function getUserByid($id)
    {   
        $this->db->where('user_id',$id);
        $query = $this->db->get('m_user');
        return $query;
    }
    function AddUser($data)
    {
        $query = $this->db->insert('m_user',$data);
        return $query;
    }
    function EditUser($id,$data)
    {
        $this->db->where('user_id',$id);
        $query = $this->db->update('m_user',$data);
        return $query;
    }
    function DeleteUser($id)
    {   
        $this->db->where('user_id ',$id);
        $query = $this->db->delete('m_user  ');
        return $query;
    }

    // pasien
    function getPasien()
    {
        $query = $this->db->get('m_pasien');
        return $query;
    }
    function getPasienByDept()
    {
        $this->db->join('m_department','id_department = p_iddepartment');
        return $this->db->get('m_pasien');
    }
    function AddPasien($data)
    {
        $query = $this->db->insert('m_pasien',$data);
        return $query;
    }
    function EditPasien($id,$data)
    {
        $this->db->where('id_pasien',$id);
        $query = $this->db->update('m_pasien',$data);
        return $query;
    }
    function DeletePasien($id)
    {   
        $this->db->where('id_pasien',$id);
        $query = $this->db->delete('m_pasien');
        return $query;
    }

    // unit
    function getUnit()
    {
        $query = $this->db->get('m_unit');
        return $query;
    }
    function AddUnit($data)
    {
        $query = $this->db->insert('m_unit',$data);
        return $query;
    }
    function EditUnit($id,$data)
    {
        $this->db->where('id_unit',$id);
        $query = $this->db->update('m_unit',$data);
        return $query;
    }
    function DeleteUnit($id)
    {   
        $this->db->where('id_unit',$id);
        $query = $this->db->delete('m_unit');
        return $query;
    }


    // kategori
    function getKategori()
    {
        $query = $this->db->get('m_kategori');
        return $query;
    }
    function getKategoriByid($id)
    {
        $this->db->where('id',$id);
        $query = $this->db->get('m_kategori');
        return $query;
    }
    function AddKategori($data)
    {
        $query = $this->db->insert('m_kategori',$data);
        return $query;
    }
    function EditKategori($id,$data)
    {
        $this->db->where('id',$id);
        $query = $this->db->update('m_kategori',$data);
        return $query;
    }
    function DeleteKategori($id)
    {   
        $this->db->where('id',$id);
        $query = $this->db->delete('m_kategori');
        return $query;
    }

    function getNotifPromotif(){
        $this->db->where('tgl_kegiatan > DATE_SUB(NOW(), INTERVAL 1 WEEK)');
        return $this->db->get('promotif')->result();
    }

    function getNotifPreventif(){
        $this->db->where('tgl_kegiatan > DATE_SUB(NOW(), INTERVAL 1 WEEK)');
        return $this->db->get('preventif')->result();
    }

    public function cekUser($usr, $pass) {
        $pass = md5($pass);
        $this->db->where('username = "'.$usr.'" and password="'.$pass.'"');
        $query = $this->db->get('m_user');
        return $query;
    }

    public function cekUnit($id){
        $this->db->where('id_unit',$id);
        return $this->db->get('m_unit');
    }
}
