<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class master extends MY_Controller {

	public function index()
	{
		
	}
	// obat obatan
	public function obat()
	{
		$this->data['page_name'] = "obat";
		$this->data['obat'] = $this->mmaster->getObat();
		$this->data['kategori'] = $this->mmaster->getObatKategori();
		$this->template->load('template_home','master/obat',$this->data);
	}
	public function obat_kategori()
	{
		$this->data['page_name'] = "obat";
		$this->data['kategori'] = $this->mmaster->getObatKategori();
		$this->template->load('template_home','master/obat_kategori',$this->data);
	}
	public function obat_kategori_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddKategoriObat($data);
		redirect('master/obat_kategori','refresh');
	}
	public function obat_kategori_delete($id)
	{
		$this->mmaster->DeleteKategoriObat($id);
		redirect('master/obat_kategori','refresh');
	}
	public function obat_kategori_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditKategoriObat($id,$data);
		redirect('master/obat_kategori','refresh');
	}
	public function obat_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddObat($data);
		redirect('master/obat','refresh');
	}
	public function obat_delete($id)
	{
		$this->mmaster->DeleteObat($id);
		redirect('master/obat','refresh');
	}
	public function obat_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditObat($id,$data);
		redirect('master/obat','refresh');
	}

	// anamnesa
	public function anamnesa()
	{
		$this->data['page_name'] = "anamnesa";
		$this->data['anamnesa'] = $this->mmaster->getAnamnesa();
		$this->template->load('template_home','master/anamnesa',$this->data);
	}
	public function anamnesa_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddAnamnesa($data);
		redirect('master/anamnesa','refresh');
	}
	public function anamnesa_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditAnamnesa($id,$data);
		redirect('master/anamnesa','refresh');
	}
	public function anamnesa_delete($id)
	{
		$this->mmaster->DeleteAnamnesa($id);
		redirect('master/anamnesa','refresh');
	}

	// PF
	public function pf()
	{
		$this->data['page_name'] = "pf";
		$this->data['pf'] = $this->mmaster->getPf();
		$this->template->load('template_home','master/pf',$this->data);
	}
	public function pf_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddPf($data);
		redirect('master/pf','refresh');
	}
	public function pf_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditPf($id,$data);
		redirect('master/pf','refresh');
	}
	public function pf_delete($id)
	{
		$this->mmaster->DeletePf($id);
		redirect('master/pf','refresh');
	}

	// rujukan
	public function rujukan()
	{
		$this->data['page_name'] = "rujukan";
		$this->data['rujukan'] = $this->mmaster->getRujukan();
		$this->template->load('template_home','master/rujukan',$this->data);
	}
	public function rujukan_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddRujukan($data);
		redirect('master/rujukan','refresh');
	}
	public function rujukan_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditRujukan($id,$data);
		redirect('master/rujukan','refresh');
	}
	public function rujukan_delete($id)
	{
		$this->mmaster->DeleteRujukan($id);
		redirect('master/rujukan','refresh');
	}

	// rujukan
	public function diagnosa()
	{
		$this->data['page_name'] = "diagnosa";
		$this->data['diagnosa'] = $this->mmaster->getDiagnosa();
		$this->template->load('template_home','master/diagnosa',$this->data);
	}
	public function diagnosa_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddDiagnosa($data);
		redirect('master/diagnosa','refresh');
	}
	public function diagnosa_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditDiagnosa($id,$data);
		redirect('master/diagnosa','refresh');
	}
	public function diagnosa_delete($id)
	{
		$this->mmaster->DeleteDiagnosa($id);
		redirect('master/diagnosa','refresh');
	}

	// dokter
	public function dokter()
	{
		$this->data['page_name'] = "dokter";
		$this->data['dokter'] = $this->mmaster->getDokter();
		$this->data['unit'] = $this->mmaster->getUnit()->result();
		$this->template->load('template_home','master/dokter',$this->data);
	}
	public function dokter_add()
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		if ($_FILES['foto']['name']!=""){
				$name = $_FILES['foto']['name'];
				$type=pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file = $target_dir.$kode.".".$type;
				} else {
					$target_file="";
				}
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					$m = "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$m = "File is not an image.";
					$uploadOk = 0;
				}


				// Check file size

				// Allow certain file formats
				if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$m = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
					// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$m = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
			} else {
				if ($_FILES["foto"]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
						$m = "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto"]["tmp_name"], $target_file, 10);
				}
			}
		}

		$pass = md5($this->input->post('password'));

		$array = array(
		'nama' => $this->input->post('nama'),
		'spesialis' => $this->input->post('spesialis'),
		'unit' => $this->input->post('unit'),
		'alamat' => $this->input->post('alamat'),
		'email' => $this->input->post('email'),
		'no_telp' => $this->input->post('no_telp'),
		'is_aktif' => $this->input->post('is_aktif'),
		'keterangan' => $this->input->post('keterangan'),
		'username' => $this->input->post('username'),
		'password' => $pass,
		'foto' => $target_file,
		'role' => 1,
		);

		$this->mmaster->AddDokter($array);
		redirect('master/dokter','refresh');
	}
    function compress($source, $destination, $quality) 
    { 
    	$info = getimagesize($source); 
    	if ($info['mime'] == 'image/jpeg') $image = imagecreatefromjpeg($source); 
    	elseif ($info['mime'] == 'image/gif') $image = imagecreatefromgif($source); 
    	elseif ($info['mime'] == 'image/png') $image = imagecreatefrompng($source); 
    	imagejpeg($image, $destination, $quality); 
    	return $destination; 
    }
	public function dokter_edit($id)
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		if ($_FILES['foto']['name']!=""){
				$name = $_FILES['foto']['name'];
				$type=pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file = $target_dir.$kode.".".$type;
				} else {
					$target_file="";
				}
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					$m = "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$m = "File is not an image.";
					$uploadOk = 0;
				}


				// Check file size

				// Allow certain file formats
				if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$m = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
					// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$m = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
			} else {
				if ($_FILES["foto"]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
						$m = "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto"]["tmp_name"], $target_file, 10);
					@unlink('./'.$this->mmaster->getDokterByid($id)->row()->foto);
				}
			}
		} else {
			$target_file = $this->mmaster->getDokterByid($id)->row()->foto;
		}

		if ($this->input->post('password') != "") {
			$pass = md5($this->input->post('password'));
		} else{
			$pass = $this->mmaster->getDokterByid($id)->row()->password;
		}
		

		$data = array(
		'nama' => $this->input->post('nama'),
		'spesialis' => $this->input->post('spesialis'),
		'unit' => $this->input->post('unit'),
		'alamat' => $this->input->post('alamat'),
		'email' => $this->input->post('email'),
		'no_telp' => $this->input->post('no_telp'),
		'is_aktif' => $this->input->post('is_aktif'),
		'keterangan' => $this->input->post('keterangan'),
		'username' => $this->input->post('username'),
		'password' => $pass,
		'foto' => $target_file,
		);

		$this->mmaster->EditDokter($id,$data);
		redirect('master/dokter','refresh');
	}
	public function dokter_delete($id){
		@unlink('./'.$this->mmaster->getDokterByid($id)->row()->foto);
		$this->mmaster->DeleteDokter($id);
		redirect('master/dokter','refresh');
	}

	// user
	public function user()
	{
		$this->data['page_name'] = "user";
		$this->data['user'] = $this->mmaster->getUser();
		$this->data['unit'] = $this->mmaster->getUnit()->result();
		$this->template->load('template_home','master/user',$this->data);
	}
	public function user_add()
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		if ($_FILES['foto']['name']!=""){
				$name = $_FILES['foto']['name'];
				$type=pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file = $target_dir.$kode.".".$type;
				} else {
					$target_file="";
				}
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					$m = "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$m = "File is not an image.";
					$uploadOk = 0;
				}


				// Check file size

				// Allow certain file formats
				if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$m = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
					// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$m = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
			} else {
				if ($_FILES["foto"]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
						$m = "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto"]["tmp_name"], $target_file, 10);
				}
			}
		}

		$pass = md5($this->input->post('password'));

		$array = array(
		'nama' => $this->input->post('nama'),
		'spesialis' => $this->input->post('spesialis'),
		'unit' => $this->input->post('unit'),
		'alamat' => $this->input->post('alamat'),
		'email' => $this->input->post('email'),
		'no_telp' => $this->input->post('no_telp'),
		'is_aktif' => $this->input->post('is_aktif'),
		'keterangan' => $this->input->post('keterangan'),
		'username' => $this->input->post('username'),
		'password' => $pass,
		'foto' => $target_file,
		'role' => 2,
		);

		$this->mmaster->AddUser($array);
		redirect('master/user','refresh');
	}
	public function user_edit($id)
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		if ($_FILES['foto']['name']!=""){
				$name = $_FILES['foto']['name'];
				$type=pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file = $target_dir.$kode.".".$type;
				} else {
					$target_file="";
				}
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					$m = "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$m = "File is not an image.";
					$uploadOk = 0;
				}


				// Check file size

				// Allow certain file formats
				if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$m = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
					// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$m = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
			} else {
				if ($_FILES["foto"]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
						$m = "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto"]["tmp_name"], $target_file, 10);
					@unlink('./'.$this->mmaster->getUserByid($id)->row()->foto);
				}
			}
		} else {
			$target_file = $this->mmaster->getUserByid($id)->row()->foto;
		}

		if ($this->input->post('password') != "") {
			$pass = md5($this->input->post('password'));
		} else{
			$pass = $this->mmaster->getUserByid($id)->row()->password;
		}
		

		$data = array(
		'nama' => $this->input->post('nama'),
		'spesialis' => $this->input->post('spesialis'),
		'unit' => $this->input->post('unit'),
		'alamat' => $this->input->post('alamat'),
		'email' => $this->input->post('email'),
		'no_telp' => $this->input->post('no_telp'),
		'is_aktif' => $this->input->post('is_aktif'),
		'keterangan' => $this->input->post('keterangan'),
		'username' => $this->input->post('username'),
		'password' => $pass,
		'foto' => $target_file,
		);

		$this->mmaster->EditUser($id,$data);
		redirect('master/user','refresh');
	}
	public function user_delete($id){
		@unlink('./'.$this->mmaster->getUserByid($id)->row()->foto);
		$this->mmaster->DeleteUser($id);
		redirect('master/user','refresh');
	}

	// rujukan
	public function pasien()
	{
		$this->data['page_name'] = "pasien";
		$this->data['pasien'] = $this->mmaster->getPasien();
		$this->template->load('template_home','master/pasien',$this->data);
	}
	public function pasien_add()
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		if ($_FILES['foto']['name']!=""){
				$name = $_FILES['foto']['name'];
				$type=pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file = $target_dir.$kode.".".$type;
				} else {
					$target_file="";
				}
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					$m = "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$m = "File is not an image.";
					$uploadOk = 0;
				}


				// Check file size

				// Allow certain file formats
				if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$m = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
					// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$m = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
			} else {
				if ($_FILES["foto"]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
						$m = "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto"]["tmp_name"], $target_file, 10);
				}
			}
		}

		$data = $this->input->post();
		$data['foto'] = $target_file;
		$this->mmaster->AddPasien($data);
		redirect('master/pasien','refresh');
	}
	public function pasien_edit($id)
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		if ($_FILES['foto']['name']!=""){
				$name = $_FILES['foto']['name'];
				$type=pathinfo(basename($_FILES["foto"]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file = $target_dir.$kode.".".$type;
				} else {
					$target_file="";
				}
				$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto"]["tmp_name"]);
				if($check !== false) {
					$m = "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					$m = "File is not an image.";
					$uploadOk = 0;
				}


				// Check file size

				// Allow certain file formats
				if($imageFileType != "JPG" &&$imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
					&& $imageFileType != "gif" ) {
					$m = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
				$uploadOk = 0;
			}
					// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
				$m = "Sorry, your file was not uploaded.";
					// if everything is ok, try to upload file
			} else {
				if ($_FILES["foto"]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
						$m = "The file ". basename( $_FILES["foto"]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto"]["tmp_name"], $target_file, 10);
				}
			}
		}
		$data = $this->input->post();
		$data['foto'] = $target_file;
		$this->mmaster->EditPasien($id,$data);
		redirect('master/pasien','refresh');
	}
	public function pasien_delete($id)
	{
		$this->mmaster->DeletePasien($id);
		redirect('master/pasien','refresh');
	}

	// unit
	public function unit()
	{
		$this->data['page_name'] = "unit";
		$this->data['unit'] = $this->mmaster->getUnit();
		$this->template->load('template_home','master/unit',$this->data);
	}
	public function unit_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddUnit($data);
		redirect('master/unit','refresh');
	}
	public function unit_edit($id)
	{
		$data = $this->input->post();
		$this->mmaster->EditUnit($id,$data);
		redirect('master/unit','refresh');
	}
	public function unit_delete($id)
	{
		$this->mmaster->DeleteUnit($id);
		redirect('master/unit','refresh');
	}

	// anamnesa
	public function kategori()
	{
		$this->data['page_name'] = "Kategori";
		$this->data['kategori'] = $this->mmaster->getKategori();
		$this->template->load('template_home','master/kategori',$this->data);
	}
	public function kategori_add()
	{
		$data = $this->input->post();
		$this->mmaster->AddKategori($data);
		redirect('master/kategori','refresh');
	}
	public function kategori_edit()
	{
		$data = $this->input->post();
		$this->mmaster->EditKategori($data['id'],$data);
		redirect('master/kategori','refresh');
	}
	public function kategori_ajax($id)
	{
		$kategori = $this->mmaster->getKategoriById($id)->result_array();
		$this->output
			 ->set_content_type('application/json')
			 ->set_output(json_encode($kategori));
	}
	public function kategori_delete($id)
	{
		$this->mmaster->DeleteKategori($id);
		redirect('master/kategori','refresh');
	}

}