<?php

class MAdmin extends CI_Model {

    public function __construct() {
        parent::__construct();
    }

    public function checkLogin() {
        $class = current($this->uri->rsegments);
        $method = next($this->uri->rsegments);
        if (!$this->isLogin() && $method != 'login') {
            header('location: /index.php/admin/login');
            exit();
        } else {
            return true;
        }
    }


    public function isLogin() {
        return isset($_SESSION['admin']['aid']);
    }

    public function login($name, $pwd) {
        if ($name == 'admin' && md5($pwd) == '34e00305b509cf53b35be654c14ebae5') {
            $_SESSION['admin']['aid'] = 1;
            $_SESSION['admin']['name'] = $name;
            return true;
        } else {
            return false;
        }
    }
    public function login_m($name, $pwd) {
    	if ($name == 'admin' && md5($pwd) == '935184c7469e2081b2e3ee0f3b9f95ec') { //nangua*admin
    		$_SESSION['admin']['aid'] = 1;
    		$_SESSION['admin']['name'] = $name;
    		return true;
    	} else {
    		return false;
    	}
    }
}

?>
