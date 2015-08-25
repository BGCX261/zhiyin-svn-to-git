<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Index extends MY_Controller {
	public function __construct() {
		parent::__construct();
	}

	public function index() {
		$data['_ADDRESS'] ='welcome';
		$data['content'] ='welcome';
		$this->load->vars($data);
		$this->load->view('template');
	}
	
}

?>