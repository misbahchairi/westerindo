<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class laporan extends MY_Controller {

	public function index()
	{
		
	}
	public function rekap_harian()
	{
		$this->data['page_name'] = 'rekap_harian';
		$this->template->load('template_home','laporan/rekap_harian',$this->data);
	}
	public function surat_rujukan()
	{
		$this->data['page_name'] = 'surat_rujukan';
		$this->template->load('template_home','laporan/surat_rujukan',$this->data);
	}
	public function surat_sakit()
	{
		$this->data['page_name'] = 'surat_sakit';
		$this->template->load('template_home','laporan/surat_sakit',$this->data);
	}
	public function kunjungan_by_jam()
	{
		$this->data['page_name'] = 'kunjungan_by_jam';
		$this->template->load('template_home','laporan/kunjungan_by_jam',$this->data);
	}
	public function penggunaan_obat()
	{
		$this->data['page_name'] = 'penggunaan_obat';
		$this->template->load('template_home','laporan/penggunaan_obat',$this->data);
	}
	public function penyakit()
	{
		$this->data['page_name'] = 'penyakit';
		$this->template->load('template_home','laporan/penyakit',$this->data);
	}
	public function penyakit_by_departement()
	{
		$this->data['page_name'] = 'penyakit_by_departement';
		$this->template->load('template_home','laporan/penyakit_by_departement',$this->data);
	}

}