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
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
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
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
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
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
			redirect('farmasi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}

	public function obat()
	{
		$this->data['page_name'] = "obat";
		$kategori = $this->mfarmasi->getAllKategoriObat()->result();
		$this->data['kategori'] = $kategori;
		foreach ($kategori as $val) {
			$obat[$val->id] = $this->mfarmasi->getObatByKat($val->id)->result_array();
		}
		$this->data['obat'] = $obat;
		// print_r($this->data['obat']);
		$this->template->load('template_home','farmasi/obat',$this->data);
	}

	public function add_obat(){
		$param = $this->input->post();
		$param['unit'] = $this->session->userdata('unit');

		$query = $this->mfarmasi->InsertObat($param);
		if ($query) {
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
			redirect('farmasi/obat');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
		
	}

	public function edit_obat(){
		$param = $this->input->post();

		$query = $this->mfarmasi->UpdateObat($param);
		if ($query) {
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
		redirect('farmasi/obat');
	}

	public function delete_obat(){
		$param = $this->input->get('id_obat');

		$query = $this->mfarmasi->DeleteObat($param);
		if ($query) {
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
		redirect('farmasi/obat');
	}

	public function kategori_obat()
	{
		$this->data['page_name'] = "kategori-obat";
		$this->data['kategori'] = $this->mfarmasi->getKategori();
		$this->template->load('template_home','farmasi/kategori',$this->data);
	}
	public function add_kategori()
	{
		$data = $this->input->post();
		$hasil = $this->mfarmasi->AddKategori($data);
		if ($hasil) {
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
			redirect('farmasi/kategori_obat','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}
	public function edit_kategori($id)
	{
		$data = $this->input->post();
		$hasil = $this->mfarmasi->EditKategori($id,$data);
		if ($hasil) {
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
			redirect('farmasi/kategori_obat','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}
	public function delete_kategori($id)
	{
		$hasil = $this->mfarmasi->DeleteKategori($id);
		if ($hasil) {
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
			redirect('farmasi/kategori_obat','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}


}