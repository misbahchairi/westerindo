<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class dashboard extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "dashboard";
		$this->template->load('template_home','dashboard/index',$this->data);
	}

}
