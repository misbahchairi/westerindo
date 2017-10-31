<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class farmasi extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "farmasi";
		$this->data['farmasi'] = $this->mfarmasi->getFarmasi();
		$this->template->load('template_home','farmasi/farmasi',$this->data);
	}
	public function add()
	{
		$data = $this->input->post();
		$hasil = $this->mfarmasi->AddFarmasi($data);
		if ($hasil) {
			redirect('farmasi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}
	public function edit($id)
	{
		$data = $this->input->post();
		$hasil = $this->mfarmasi->EditFarmasi($id,$data);
		if ($hasil) {
			redirect('farmasi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}
	public function delete($id)
	{
		$hasil = $this->mfarmasi->DeleteFarmasi($id);
		if ($hasil) {
			redirect('farmasi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}

}