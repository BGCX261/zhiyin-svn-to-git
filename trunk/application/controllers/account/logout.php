<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Logout extends CI_Controller {

	public function __construct() {
		parent::__construct();

	}


	public function index() {
		unset($_SESSION['admin']['aid']);
		unset($_SESSION['admin']['name']);
		header('location: /admin');
	}

}

?>