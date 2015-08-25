<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class index extends CI_Controller {

    public function __construct() {
        parent::__construct();
    }
	
	public function index(){	
		header('location: /admin');
		
// 		$data['_ADDRESS'] ='welcome';
// 		$data['content'] ='welcome';
// 		$this->load->vars($data);
// 		$this->load->view('template');	
	}
	
		
}
