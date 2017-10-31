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

}
