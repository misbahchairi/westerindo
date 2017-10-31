<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kuratif extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "kuratif";
		$this->template->load('template_home','kuratif/kuratif',$this->data);
	}
	public function administrasi()
	{
		$this->data['page_name'] = "kuratif";
		$this->data['anamnesa'] = $this->mmaster->getAnamnesa();
		$this->template->load('template_home','kuratif/administrasi',$this->data);
	}
	public function pengobatan()
	{
		$this->data['page_name'] = "kuratif";
		$this->data['anamnesa'] = $this->mmaster->getAnamnesa();
		$this->data['diagnosa'] = $this->mmaster->getDiagnosa();
		$this->data['obat'] = $this->mmaster->getObat();
		$this->template->load('template_home','kuratif/pengobatan',$this->data);
	}
	public function resume(){
		$this->data['page_name'] = "kuratif";

		$this->data['nama'] = $this->input->post('nama');
		$this->data['perihal'] = $this->input->post('perihal');
		$this->data['mcu'] = $this->input->post('mcu');
		$this->data['tanda_vital'] = $this->input->post('tanda_vital');
		$this->data['nadi'] = $this->input->post('nadi');
		$this->data['suhu'] = $this->input->post('suhu');
		$this->data['pernafasan'] = $this->input->post('pernafasan');
		$this->data['kesadaran_g'] = $this->input->post('kesadaran_g');
		$this->data['kesadaran_c'] = $this->input->post('kesadaran_c');
		$this->data['kesadaran_s'] = $this->input->post('kesadaran_s');
		$this->data['kepala'] = $this->input->post('kepala');
		$this->data['mata'] = $this->input->post('mata');
		$this->data['telinga'] = $this->input->post('telinga');
		$this->data['hidung'] = $this->input->post('hidung');
		$this->data['tenggorokan'] = $this->input->post('tenggorokan');
		$this->data['dada'] = $this->input->post('dada');
		$this->data['paru'] = $this->input->post('paru');
		$this->data['jantung'] = $this->input->post('jantung');
		$this->data['abdomen'] = $this->input->post('abdomen');
		$this->data['liver'] = $this->input->post('liver');
		$this->data['maag'] = $this->input->post('maag');
		$this->data['usus_besar'] = $this->input->post('usus_besar');
		$this->data['appendix'] = $this->input->post('appendix');
		$this->data['genital'] = $this->input->post('genital');
		$this->data['extremitas_atas'] = $this->input->post('extremitas_atas');
		$this->data['extremitas_bawah'] = $this->input->post('extremitas_bawah');
		$this->data['punggung'] = $this->input->post('punggung');
		$this->data['pinggang'] = $this->input->post('pinggang');
		$this->data['bokong'] = $this->input->post('bokong');
		$this->data['is_kontrol'] = $this->input->post('is_kontrol');

		$this->data['count_anamnesa'] = count($this->input->post('anamnesa'));
		for($i=0; $i < $this->data['count_anamnesa']; $i++) {
	        $this->data['anamnesa'.$i] = $this->input->post('anamnesa')[$i];
	        $this->data['anamnesa_durasi'.$i] = $this->input->post('anamnesa_durasi')[$i];
	    }

		$this->data['count_diagnosa'] = count($this->input->post('diagnosa'));
		for($i=0; $i < $this->data['count_diagnosa']; $i++) {
	        $this->data['diagnosa'.$i] = $this->input->post('diagnosa')[$i];
	        $this->data['keterangan_diagnosa'.$i] = $this->input->post('keterangan_diagnosa')[$i];
	    }

		$this->data['count_obat'] = count($this->input->post('obat'));
		for($i=0; $i < $this->data['count_obat']; $i++) {
	        $this->data['obat'.$i] = $this->input->post('obat')[$i];
	        $this->data['keterangan_obat'.$i] = $this->input->post('keterangan_obat')[$i];
	    }

		$this->template->load('template_home','kuratif/resume',$this->data);
	}
	public function tensi()
	{
		$this->data['page_name'] = "kuratif";
		$this->data['tensi'] = $this->mkuratif->getTensi();
		$this->template->load('template_home','kuratif/tensi',$this->data);
	}
	public function addtensi()
	{
		$data = $this->input->post();
		$hasil = $this->mkuratif->addTensi($data);
		if ($hasil) {
			redirect('kuratif/tensi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}
	public function edittensi($id)
	{
		$data = $this->input->post();
		$hasil = $this->mkuratif->editTensi($id,$data);
		if ($hasil) {
			redirect('kuratif/tensi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}
	public function deletetensi($id)
	{
		$hasil = $this->mkuratif->deleteTensi($id);
		if ($hasil) {
			redirect('kuratif/tensi','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
	}

	public function getRekamMedis() {
        $nama = $this->input->get('term',TRUE); //variabel kunci yang di bawa dari input text id kode
        $query = $this->mkuratif->getAllRekamMedis($nama)->result(); //query model
 
        $pasien =  array();
        foreach ($query as $d) {
            $pasien[]     = array(
                'label' => $d->nik." ( ".ucfirst($d->nama)." )", 
                'nama' => $d->nik." ( ".ucfirst($d->nama)." )",  
                'nik' => $d->nik  
            );
        }
        echo json_encode($pasien);      //data array yang telah kota deklarasikan dibawa menggunakan json
    }

    public function prosesriwayat(){
    	$nik = $this->input->post('nik');
        $query = $this->mkuratif->getRekamMedisByNIK($nik); //query model
        if ($query->num_rows() > 0) { 
            foreach ($query->result() as $val) {
            	?> <img src="<?=base_url()?><?=$val->foto?>" alt=""><?php
            }
        }
    }

}