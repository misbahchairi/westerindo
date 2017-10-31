<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class promotif extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "promotif";
		$this->data['promotif'] = $this->mpromotif->getPromotif();
		$this->template->load('template_home','promotif/all_promotif',$this->data);
	}
	public function detail($id)
	{
		$this->data['detail'] = $this->mpromotif->getPromotifByid2($id);
		$this->template->load('template_home','promotif/detail_promotif',$this->data);
	}
	public function add()
	{
		$this->data['page_name'] = "t-promotif";
		$this->data['kategori'] = $this->mpromotif->getKategoriByTipe('1')->result();
		$this->template->load('template_home','promotif/add_promotif',$this->data);
	}
	public function addproses()
	{
        $this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		for($i=1;$i<=5;$i++){
			if ($_FILES['foto'.$i]['name']!=""){
				$name = $_FILES['foto'.$i]['name'];
				$type=pathinfo(basename($_FILES["foto".$i]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file[$i] = $i.$kode.".".$type;
				} else {
					$target_file[$i]="";
				}
				$imageFileType = pathinfo($target_file[$i],PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto".$i]["tmp_name"]);
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
				if ($_FILES["foto".$i]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto".$i]["tmp_name"], $target_file[$i])) {
						$m = "The file ". basename( $_FILES["foto".$i]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto".$i]["tmp_name"], $target_file[$i], 10);
				}
				if($i==1){
					$d = $this->compress($target_file[$i], "thumbs/".$target_file[$i], 5);
				}
			}

		}
		}

		unset($config);
        $config['upload_path'] = './uploads/materi/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = 0;   
    	$config['overwrite'] = false;
        $this->load->library('upload');
        $this->upload->initialize($config);

    	if ($_FILES['materi1']['name']!="") {
    		$this->upload->do_upload('materi1');
	        $upload_data1 = $this->upload->data();
	        $file_name1 = $upload_data1['file_name']; 
    	}
    	if ($_FILES['materi2']['name']!="") {
    		$this->upload->do_upload('materi2');
	        $upload_data2 = $this->upload->data();
	        $file_name2 = $upload_data2['file_name']; 
    	}
    	if ($_FILES['materi3']['name']!="") {
    		$this->upload->do_upload('materi3');
	        $upload_data3 = $this->upload->data();
	        $file_name3 = $upload_data3['file_name']; 
    	}

		$array = array(
		'judul' => $this->input->post('judul'),
		'idkategori' => $this->input->post('idkategori'),
		'deskripsi' => $this->input->post('deskripsi'),
		'tgl_kegiatan' => $this->input->post('tgl_kegiatan'),
		'materi1' => @$file_name1,
		'materi2' => @$file_name2,
		'materi3' => @$file_name3,
		'foto1' => @$target_file[1],
		'foto2' => @$target_file[2],
		'foto3' => @$target_file[3],
		'foto4' => @$target_file[4],
		'foto5' => @$target_file[5]
		);

		$hasil = $this->mpromotif->add($array);

		if ($hasil) {
			redirect('promotif','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
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
	public function delete($id)
	{
		$path1 = './';
		$path2 = './uploads/materi/';
		$getdata = $this->mpromotif->getPromotifByid($id)->row();

		@unlink($path2.$getdata->materi1);
		@unlink($path2.$getdata->materi2);
		@unlink($path2.$getdata->materi3);

		@unlink($path1.$getdata->foto1);
		@unlink($path1.$getdata->foto2);
		@unlink($path1.$getdata->foto3);
		@unlink($path1.$getdata->foto4);
		@unlink($path1.$getdata->foto5);

		$hasil = $this->mpromotif->delete($id);

		if($hasil){
			redirect('promotif','refresh');
		}else{
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
		
		
	}
	public function edit($id)
	{
		$this->data['page_name'] = "promotif";
		$this->data['promotif'] = $this->mpromotif->getPromotifByid($id);
		$this->data['kategori'] = $this->mpromotif->getKategoriByTipe('1')->result();
		$this->template->load('template_home','promotif/edit_promotif',$this->data);
	}
	public function editproses($id)
	{
		$this->load->library('upload');
		$target_dir = "uploads/";
		$kode=mt_rand(0,999)."".uniqid();
		for($i=1;$i<=5;$i++){
			$rafo = 'foto'.$i;
			if ($_FILES['foto'.$i]['name']!=""){
				$name = $_FILES['foto'.$i]['name'];
				$type=pathinfo(basename($_FILES["foto".$i]["name"]),PATHINFO_EXTENSION);
				$uploadOk = 1;
				if ($type!=""){
					$target_file[$i] = $target_dir.$i.$kode.".".$type;
				} else {
					$target_file[$i]="";
				}
				$imageFileType = pathinfo($target_file[$i],PATHINFO_EXTENSION);
				// Check if image file is a actual image or fake image

				$check = getimagesize($_FILES["foto".$i]["tmp_name"]);
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
				if ($_FILES["foto".$i]["size"] < 400000) {
					if (move_uploaded_file($_FILES["foto".$i]["tmp_name"], $target_file[$i])) {
						$m = "The file ". basename( $_FILES["foto".$i]["name"]). " has been uploaded.";
					} else {
						$m= "Sorry, there was an error uploading your file.";
					}
				} else {
					$d = $this->compress($_FILES["foto".$i]["tmp_name"], $target_file[$i], 10);
					@unlink('./'.$this->mpromotif->getPromotifByid($id)->row()->$rafo);
				}
				if($i==1){
					$d = $this->compress($target_file[$i], "thumbs/".$target_file[$i], 5);
				}
			}

		}else{
			$target_file[$i] = $this->mpromotif->getPromotifByid($id)->row()->$rafo;
		}
		}

		unset($config);
        $config['upload_path'] = './uploads/materi/';
        $config['allowed_types'] = 'pdf';
        $config['max_size']    = 0;   
    	$config['overwrite'] = false;
        $this->load->library('upload');
        $this->upload->initialize($config);

    	if ($_FILES['materi1']['name']!="") {
    		@unlink('./uploads/materi/'.$this->mpromotif->getPromotifByid($id)->row()->materi1);
    		$this->upload->do_upload('materi1');
	        $upload_data1 = $this->upload->data();
	        $file_name1 = $upload_data1['file_name']; 
    	}else{
    		$file_name1 = $this->mpromotif->getPromotifByid($id)->row()->materi1;
    	}

    	if ($_FILES['materi2']['name']!="") {
    		@unlink('./uploads/materi/'.$this->mpromotif->getPromotifByid($id)->row()->materi2);
    		$this->upload->do_upload('materi2');
	        $upload_data2 = $this->upload->data();
	        $file_name2 = $upload_data2['file_name']; 
    	}else{
    		$file_name2 = $this->mpromotif->getPromotifByid($id)->row()->materi2;
    	}

    	if ($_FILES['materi3']['name']!="") {
    		@unlink('./uploads/materi/'.$this->mpromotif->getPromotifByid($id)->row()->materi3);
    		$this->upload->do_upload('materi3');
	        $upload_data3 = $this->upload->data();
	        $file_name3 = $upload_data3['file_name']; 
    	}else{
    		$file_name3 = $this->mpromotif->getPromotifByid($id)->row()->materi3;
    	}

		$data = array(
		'judul' => $this ->input->post('judul'),
		'idkategori' => $this ->input->post('idkategori'),
		'deskripsi' => $this ->input->post('deskripsi'),
		'tgl_kegiatan' => $this ->input->post('tgl_kegiatan'),
		'materi1' => @$file_name1,
		'materi2' => @$file_name2,
		'materi3' => @$file_name3,
		'foto1' => @$target_file[1],
		'foto2' => @$target_file[2],
		'foto3' => @$target_file[3],
		'foto4' => @$target_file[4],
		'foto5' => @$target_file[5]
		);
		$hasil = $this->mpromotif->edit($id,$data);
		if ($hasil) {
			redirect('promotif/edit/'.$id.'','refresh');
		} else {
			echo "<script>window.alert('Gagal !');
				window.history.back()</script>";
		}
		
	}
	public function delmateri()
	{
		$id = $this ->input->get('id');
		$materi = $this ->input->get('materi');

    	$data = array(
			$materi => '',
		);
		
    	@unlink('./uploads/materi/'.$this->mpromotif->getPromotifByid($id)->row()->$materi);
		$this->mpromotif->delmateri($id,$data);

		redirect('promotif/edit/'.$id,'refresh');
		
	}
	public function delfoto()
	{
		$id = $this ->input->get('id');
		$foto = $this ->input->get('foto');

    	$data = array(
			$foto => '',
		);
		
    	@unlink('./'.$this->mpromotif->getPromotifByid($id)->row()->$foto);
		$this->mpromotif->delmateri($id,$data);

		redirect('promotif/edit/'.$id,'refresh');
		
	}
	public function kalender()
	{
		$this->data['page_name'] = "k-promotif";
		$this->data['promotif'] = $this->mpromotif->getPromotifKalender();
		$this->template->load('template_home','promotif/kalender_promotif',$this->data);
	}

}