<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class industrial extends MY_Controller {

	public function index()
	{
		$this->data['page_name'] = "industrial";
		$this->template->load('template_home','industrial/industrial',$this->data);
	}

}