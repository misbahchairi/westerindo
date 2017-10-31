<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class hra extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "hra";
		$this->template->load('template_home','hra/hra',$this->data);
	}

}