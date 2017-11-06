<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends MY_Controller {

	public function ajaxObat(){
		$idobat = $this->input->get('id_obat');

		$vendor = $this->mfarmasi->getObatById($idobat)->result_array();
		$this->output
			 ->set_content_type('application/json')
			 ->set_output(json_encode($vendor));
	}

}