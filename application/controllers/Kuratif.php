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

		$idkuratif = $this->session->userdata('s_idkuratif');

		$this->data['temuan'] = $this->mkuratif->getTemuanByid($idkuratif)->result();
		$this->data['tindakan'] = $this->mkuratif->getTindakanByid($idkuratif)->result();
		$this->data['data'] = $this->mkuratif->getLanjutan($idkuratif)->row();

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
                'nik' => $d->nik  ,
                'idpasien' => $d->id_pasien 
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

    public function ajaxperihal(){
    	if ($this->session->userdata('role')=='2') {
    		$idperawat = $this->session->userdata('user_id');
    	} elseif ($this->session->userdata('role')=='1') {
    		$iddokter = $this->session->userdata('user_id');
    	}
    	
    	$array = array(
    		'ku_idperawat' => @$idperawat,
    		'ku_iddokter' => @$iddokter,
    		'ku_idunit' => $this->session->userdata('unit'),
			'ku_idpasien' => $this ->input->post('idpasien'),
			'ku_perihal' => $this ->input->post('perihal'),
			'ku_state' => 'perihal'
		);
		$getid = $this->mkuratif->addKuratif($array);

		$data = array(
        's_idkuratif' => $getid
        );
        $this->session->set_userdata($data);

    }
    public function ajaxriwayat(){
		$idkuratif = $this->session->userdata('s_idkuratif');
		$this->mkuratif->deleteRiwayat($idkuratif);

    	$array = array(
			'rp_idpasien' => $this ->input->post('idpasien2'),
			'rp_status' => $this ->input->post('status'),
			'rp_penjelasan' => $this ->input->post('penjelasan'),
		);
		$this->mkuratif->addRiwayat($array);

		$array2 = array(
			'ku_state' => 'riwayat'
		);
		$this->mkuratif->updateKuratif($array2,$idkuratif);
    }

    public function ajaxvital(){
		$idkuratif = $this->session->userdata('s_idkuratif');

    	$array = array(
			'tv_idkuratif' => $idkuratif,
			'tv_tandavital' => $this ->input->post('tanda_vital'),
			'tv_nadi' => $this ->input->post('nadi'),
			'tv_suhu' => $this ->input->post('suhu'),
			'tv_pernafasan' => $this ->input->post('pernafasan'),
			'tv_kesadarang' => $this ->input->post('kesadaran_g'),
			'tv_kesadaranc' => $this ->input->post('kesadaran_c'),
			'tv_kesadarans' => $this ->input->post('kesadaran_s'),
		);
		$this->mkuratif->addVital($array);

		$array2 = array(
			'ku_state' => 'tanda_vital'
		);
		$this->mkuratif->updateKuratif($array2,$idkuratif);
    }

    public function ajaxtemuanpf(){
		$idkuratif = $this->session->userdata('s_idkuratif');
		$this->mkuratif->deleteTemuanPF($idkuratif);

		for ($i=1; $i < 20 ; $i++) { 
			$this->data['pf-'.$i] = $this->input->post('pf-'.$i);

			if($i==1) { $bagian = 'Kepala'; }
			if($i==2) { $bagian = 'Mata'; }
			if($i==3) { $bagian = 'Telinga'; }
			if($i==4) { $bagian = 'Hidung'; }
			if($i==5) { $bagian = 'Tenggorokan,Mulut,Geligi'; }
			if($i==6) { $bagian = 'Dada'; }
			if($i==7) { $bagian = 'Paru'; }
			if($i==8) { $bagian = 'Jantung'; }
			if($i==9) { $bagian = 'Abdomen'; }
			if($i==10) { $bagian = 'Liver'; }
			if($i==11) { $bagian = 'Maag'; }
			if($i==12) { $bagian = 'Usus Besar'; }
			if($i==13) { $bagian = 'Appendix'; }
			if($i==14) { $bagian = 'Genital'; }
			if($i==15) { $bagian = 'Extremitas Atas'; }
			if($i==16) { $bagian = 'Extremitas Bawah'; }
			if($i==17) { $bagian = 'Punggung'; }
			if($i==18) { $bagian = 'Pinggang'; }
			if($i==19) { $bagian = 'Bokong'; }

	    	if ($this->data['pf-'.$i]!="") {

	    		$array[$i] = array(
					'pf_idkuratif' => $idkuratif ,
					'pf_bagian' => $bagian ,
					'pf_temuan' => $this->data['pf-'.$i] ,
					'pf_nomer' => $i,
				);
				$this->mkuratif->addTemuanPF($array[$i]);
	    	}
		}

		$arraydata = array(
			'ku_state' => 'temuan'
		);
		$this->mkuratif->updateKuratif($arraydata,$idkuratif);
    }

    public function ajaxpenunjang(){
		$idkuratif = $this->session->userdata('s_idkuratif');

		unset($config);
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'png|jpg|pdf';
        $config['max_size']    = 0;
    	$config['overwrite'] = false;
        $this->load->library('upload');
        $this->upload->initialize($config);

		if ($_FILES['file']['name']!="") {
    		$this->upload->do_upload('file');
	        $upload_data1 = $this->upload->data();
	        $file_data = $upload_data1['file_name']; 
    	}

		$array2 = array(
			'ku_penunjang_medis' => $this ->input->post('kategori'),
			'ku_penunjang_medis_file' => $file_data,
			'ku_state' => 'penunjang_medis'
		);
		$this->mkuratif->updateKuratif($array2,$idkuratif);
    }

    public function ajaxdiagnosa(){
		$idkuratif = $this->session->userdata('s_idkuratif');

		$array2 = array(
			'ku_iddiagnosa' => $this ->input->post('diagnosa') ,
			'ku_state' => 'diagnosa'
		);
		$this->mkuratif->updateKuratif($array2,$idkuratif);
    }

    public function ajaxtindakan(){
		$idkuratif = $this->session->userdata('s_idkuratif');
		$this->mkuratif->deleteTindakan($idkuratif);

		$jumlah = count($this ->input->post('jumlah')) + 1;

		$arrayitem = array();

		for ($i=1; $i < $jumlah ; $i++) {

			// oral
			if($this->input->post('jenis'.$i) == 'oral'){

				if ($this->input->post('oral-tipe'.$i) == 'tablet') {
					$tindakan[$i] = array(
						'jenis' => $this->input->post('jenis'.$i) , 
						'tipe' => $this->input->post('oral-tipe'.$i) ,
						'pemakaian' => $this->input->post('oral-minum'.$i) ,
					);
				} 
				if ($this->input->post('oral-tipe'.$i) == 'sirup') {
					$tindakan[$i] = array(
						'jenis' => $this->input->post('jenis'.$i) , 
						'tipe' => $this->input->post('oral-tipe'.$i) ,
						'pemakaian' => $this->input->post('oral-sendok'.$i) .' , '. $this->input->post('oral-minum'.$i) 
					);
				}
				$this->data['jumlah'.$i] = $this->input->post('jml-minum'.$i);

			} 

			// topikal
			if ($this->input->post('jenis'.$i) == 'topikal') {

				if ($this->input->post('topikal-tipe'.$i) == 'oles') {
					$tindakan[$i] = array(
						'jenis' => $this->input->post('jenis'.$i) , 
						'tipe' => $this->input->post('topikal-tipe'.$i) ,
						'pemakaian' => $this->input->post('topikal-pakai'.$i) ,
					);
				}
				if ($this->input->post('topikal-tipe'.$i) == 'tetes') {
					$tindakan[$i] = array(
						'jenis' => $this->input->post('jenis'.$i) , 
						'tipe' => $this->input->post('topikal-tipe'.$i) ,
						'pemakaian' => $this->input->post('topikal-letak-pakai'.$i).' '.$this->input->post('topikal-letak-spesifik'.$i).' '.$this->input->post('topikal-pakai-tetes'.$i).' , '.$this->input->post('topikal-pakai'.$i) ,
					);
				}
				$this->data['jumlah'.$i] = $this->input->post('jml-topikal'.$i);

			} 

			// suntikan
			if ($this->input->post('jenis'.$i) == 'suntikan') {

				$tindakan[$i] = array(
					'jenis' => $this->input->post('jenis'.$i) , 
					'tipe' => $this->input->post('suntikan-tipe'.$i) ,
					'pemakaian' => '' ,
				);
				$this->data['jumlah'.$i] = $this->input->post('jml-suntikan'.$i);

			} 

			// rectum
			if ($this->input->post('jenis'.$i) == 'rectum') {

				$tindakan[$i] = array(
					'jenis' => $this->input->post('jenis'.$i) , 
					'tipe' => $this->input->post('rectum-tipe'.$i) ,
					'pemakaian' => '' ,
				);
				$this->data['jumlah'.$i] = $this->input->post('jml-rectum'.$i);

			}

			array_push($arrayitem, $tindakan[$i]);
    		$arraytindakan[$i] = array(
				'td_idkuratif' => $idkuratif ,
				'td_idobat' => $this->input->post('obat'.$i) ,
				'td_carapenggunaan' => json_encode($tindakan[$i]) ,
				'td_jumlahobat' => $this->data['jumlah'.$i] ,
			);
			$this->mkuratif->addTindakan($arraytindakan[$i]);

		}

		if($this ->input->post('is_kontrol')!=''){
			$kontrol = 1;
		} else {
			$kontrol = 0;
		}

		$array2 = array(
			'ku_iskontrol' => $kontrol ,
			'ku_created_by' => '' ,
			'ku_created_at' => '' ,
			'ku_state' => 'tindakan'
		);
		$this->mkuratif->updateKuratif($array2,$idkuratif);
    }

}

