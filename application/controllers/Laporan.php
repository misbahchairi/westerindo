<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends MY_Controller {

	public function index()
	{
		
	}
	public function rekap_harian()
	{
		$tanggal = $this->input->get('tanggal');
		$this->data['page_name'] = 'rekap_harian';
		$this->data['rekap'] = $this->mlaporan->getLaporanRekapHarianByDate($tanggal);
		$this->template->load('template_home','laporan/rekap_harian',$this->data);
	}
	public function surat_rujukan()
	{
		$tanggal = $this->input->get('tanggal');

		$this->data['page_name'] = 'surat_rujukan';
		$this->data['rujukan'] = $this->mlaporan->getLaporanRujukan($tanggal);
		$this->template->load('template_home','laporan/surat_rujukan',$this->data);
	}
	public function surat_sakit()
	{
		$tanggal = $this->input->get('tanggal');

		$this->data['page_name'] = 'surat_sakit';
		$this->data['surat'] = $this->mlaporan->getLaporanSuratSakit($tanggal);
		$this->template->load('template_home','laporan/surat_sakit',$this->data);
	}
	public function kunjungan_by_jam()
	{
		$tanggal = $this->input->get('tanggal');
		$this->data['page_name'] = 'kunjungan_by_jam';
		$d=7; for ($i=0; $i < 24 ; $i++) {
        	if ($d==24) {$d=0;} 
	        $m=str_pad(($d), 2, "0", STR_PAD_LEFT);
	        $this->data['kunjungan'][$i][] = $this->mlaporan->getLaporanKunjunganByJam1($m.":00",$m.":59",$tanggal)->num_rows();
	        $this->data['kunjungan'][$i][] = $this->mlaporan->getLaporanKunjunganByJam2($m.":00",$m.":59",$tanggal)->num_rows();
	        $d++;
        } 
        // print_r($this->data['kunjungan']);
		$this->template->load('template_home','laporan/kunjungan_by_jam',$this->data);
	}
	public function penggunaan_obat()
	{
		$param = $this->input->get();
		if ($this->session->userdata('role') > 0) {
			$param['unit'] = $this->session->userdata('unit');
		}
		$this->data['unit'] = $this->mmaster->getUnit()->result();
		$this->data['page_name'] = 'penggunaan_obat';
		$this->data['laporan'] = $this->mlaporan->getLaporanPenggunaanObat($param)->result();
		$this->template->load('template_home','laporan/penggunaan_obat',$this->data);
	}
	public function penyakit()
	{
		$param = $this->input->get();
		if ($this->session->userdata('role') > 0) {
			$param['unit'] = $this->session->userdata('unit');
		}
		$this->data['unit'] = $this->mmaster->getUnit()->result();
		$this->data['page_name'] = 'penyakit';
		$this->data['laporan'] = $this->mlaporan->getLaporanPenyakit($param)->result();
		$this->template->load('template_home','laporan/penyakit',$this->data);
	}
	public function penyakit_by_departement()
	{
		$this->data['page_name'] = 'penyakit_by_departement';
		$this->template->load('template_home','laporan/penyakit_by_departement',$this->data);
	}

}