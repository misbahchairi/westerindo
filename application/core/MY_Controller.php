<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

abstract class MY_Controller extends CI_Controller{

	public function __construct() {
		parent::__construct();

		$this -> load -> model('mpromotif');
		$this -> load -> model('mpreventif');
		$this -> load -> model('mmaster');
		$this -> load -> model('mfarmasi');
		$this -> load -> model('mlaporan');
		$this -> load -> model('mkuratif');

		date_default_timezone_set("Asia/Jakarta");

		// $this -> load -> model('muser');
		
	}

	function flash($param) 
	{
		if ($param)  
			$this->session->set_flashdata('message', '<div class="flash-success"><b>SUCCESS !! </b> Data berhasil diproses</div>');
		else 
			$this->session->set_flashdata('message', '<span class="flash-failed"><b>FAILED !!</b> Data telah gagal diproses, silahkan coba lagi</div>');
	}


}