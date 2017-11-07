<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class antrian extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "antrian";
		$this->data['antrian'] = $this->mkuratif->getAntrian();
		$this->template->load('template_home','antrian/antrian',$this->data);
	}
	public function lanjutan($id)
	{
		$this->data['page_name'] = "antrian";
		$this->data['lanjutan'] = $this->mkuratif->getLanjutan($id);
		// $this->data['anamnesa'] = $this->mmaster->getAnamnesa();
		$this->data['diagnosa'] = $this->mmaster->getDiagnosa();
		$this->data['obat'] = $this->mmaster->getObat();
		$this->data['temuan'] = $this->mkuratif->getTemuanByid($id)->result();
		$this->data['tindakan'] = $this->mkuratif->getTindakanByid($id)->result();
		$this->template->load('template_home','antrian/lanjutan',$this->data);

		$data = array(
        's_idkuratif' => $id
        );
        $this->session->set_userdata($data);
	}
	public function delete($id)
	{
		$this->mkuratif->deleteVital($id);
		$this->mkuratif->deleteTemuanPF($id);
		$this->mkuratif->deleteTindakan($id);
		$hasil = $this->mkuratif->deleteKuratif($id);

	}

}