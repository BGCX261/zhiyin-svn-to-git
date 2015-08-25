<?php
class MY_Controller extends CI_Controller {
	public function __construct() {
		parent::__construct();
		if (empty ( $_SESSION ['user'] )){
			header('location: /account/login');
		}
	}
}