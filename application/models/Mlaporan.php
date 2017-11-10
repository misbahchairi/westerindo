<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlaporan extends CI_Model {

	public function getLaporanRekapHarian(){
		$this->db->select('*,m_diagnosa.nama as nama_diagnosa');
		$this->db->join('kuratif','ku_idpasien = id_pasien','right');
		$this->db->join('kuratif_riwayat','rp_idpasien = id_pasien','left');
		$this->db->join('kuratif_tandavital','tv_idkuratif = kuratif.idkuratif','left');
		$this->db->join('kuratif_temuanpf','pf_idkuratif = kuratif.idkuratif','left');
		$this->db->join('kuratif_tindakan','td_idkuratif = kuratif.idkuratif','left');
		$this->db->join('m_diagnosa','ku_iddiagnosa = id_diagnosa','left');
		$this->db->join('dokter','ku_iddokter = iddokter','left');
		$this->db->join('perawat','ku_idperawat = id_perawat','left');
		return $this->db->get('m_pasien');
	}

	public function getLaporanRekapHarianByDate($tanggal){
		$this->db->select('*,m_diagnosa.nama as nama_diagnosa, m_pasien.nama as nama_pasien');
		$this->db->join('kuratif','ku_idpasien = id_pasien','right');
		// $this->db->join('kuratif_riwayat','rp_idpasien = id_pasien','left');
		$this->db->join('kuratif_tandavital','tv_idkuratif = kuratif.idkuratif','left');
		$this->db->join('kuratif_temuanpf','pf_idkuratif = kuratif.idkuratif','left');
		// $this->db->join('kuratif_tindakan','td_idkuratif = kuratif.idkuratif','left');
		$this->db->join('m_diagnosa','ku_iddiagnosa = id_diagnosa','left');
		$this->db->join('dokter','ku_iddokter = iddokter','left');
		$this->db->join('perawat','ku_idperawat = id_perawat','left');
		$this->db->where('date(kuratif.ku_created_at)',$tanggal);
		return $this->db->get('m_pasien');
	}

	public function getLaporanRujukan($param){
		$this->db->join('m_rujukan','id_rujukan = r_idrujukan');
		$this->db->join('m_pasien','id_pasien = r_idpasien');
		$this->db->where('DATE(surat_rujukan.r_created_at) >= "'.$param['start'].'"');
    	$this->db->where('DATE(surat_rujukan.r_created_at) <= "'.$param['end'].'"');
		return $this->db->get('surat_rujukan');
	}

	public function getLaporanSuratSakit($tanggal){
		$this->db->select('*, m_diagnosa.nama as nama_diagnosa, m_pasien.nama as nama_pasien');
		$this->db->join('m_pasien','id_pasien = ku_idpasien');
		$this->db->join('m_diagnosa','id_diagnosa = ku_iddiagnosa');
		$this->db->join('kuratif_tindakan','td_idkuratif = idkuratif');
		$this->db->join('m_obat','id_obat = td_idobat');
		$this->db->where('DATE(kuratif.ku_created_at) >= "'.$tanggal['start'].'"');
    	$this->db->where('DATE(kuratif.ku_created_at) <= "'.$tanggal['end'].'"');
		return $this->db->get('kuratif');
	}

	public function getLaporanKunjunganByJam($awal,$akhir,$tanggal,$tipe){
		$this->db->join('m_pasien','id_pasien = ku_idpasien');
		$this->db->where('time(kuratif.ku_created_at) between "'.$awal.'" AND "'.$akhir.'"');
		$this->db->where('DATE(kuratif.ku_created_at) >= "'.$tanggal['start'].'"');
    	$this->db->where('DATE(kuratif.ku_created_at) <= "'.$tanggal['end'].'"');
		$this->db->where('status_pgw',$tipe);
		return $this->db->get('kuratif');
	}

	public function getLaporanKunjunganByJam2($awal,$akhir,$tanggal){
		$this->db->join('m_pasien','id_pasien = ku_idpasien');
		$this->db->where('time(kuratif.ku_created_at) between "'.$awal.'" AND "'.$akhir.'"');
		$this->db->where('DATE(kuratif.ku_created_at) >= "'.$tanggal['start'].'"');
    	$this->db->where('DATE(kuratif.ku_created_at) <= "'.$tanggal['end'].'"');
		$this->db->where('status_pgw','kontrak');
		return $this->db->get('kuratif');
	}

	public function getLaporanPenggunaanObat($param){
		$this->db->select('*, sum(td_jumlahobat) as total_obat');
		$this->db->join('kuratif','idkuratif = td_idkuratif');
		$this->db->join('m_obat','id_obat = td_idobat');
		$this->db->where('DATE(ku_created_at) >= "'.$param['start'].'"');
    	$this->db->where('DATE(ku_created_at) <= "'.$param['end'].'"');
    	if (@$param['unit']) {
	    	$this->db->where('ku_idunit',$param['unit']);
    	}
		$this->db->group_by('id_obat');
		return $this->db->get('kuratif_tindakan');
	}

	public function getLaporanPenyakit($param){
		$this->db->select('*, count(*) as total');
		$this->db->join('m_diagnosa','ku_iddiagnosa = id_diagnosa');
		$this->db->where('DATE(ku_created_at) >= "'.$param['start'].'"');
    	$this->db->where('DATE(ku_created_at) <= "'.$param['end'].'"');
    	if (@$param['unit']) {
	    	$this->db->where('ku_idunit',$param['unit']);
    	}
		$this->db->group_by('id_diagnosa');
		return $this->db->get('kuratif');
	}

	public function getLaporanPenyakitByDept($iddiagnosa,$iddepartment,$param){
		$this->db->join('m_diagnosa','ku_iddiagnosa = id_diagnosa');
		$this->db->join('m_pasien','ku_idpasien = id_pasien');
		$this->db->join('m_department','p_iddepartment = id_department');
		$this->db->where('DATE(ku_created_at) >= "'.$param['start'].'"');
    	$this->db->where('DATE(ku_created_at) <= "'.$param['end'].'"');
    	if (@$param['unit']) {
	    	$this->db->where('ku_idunit',$param['unit']);
    	}
		$this->db->where('id_diagnosa',$iddiagnosa);
		$this->db->where('id_department',$iddepartment);
		return $this->db->get('kuratif');
	}

}

/* End of file mlaporan.php */
/* Location: ./application/models/mlaporan.php */