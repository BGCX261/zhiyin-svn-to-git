<?php

/**
 * 登录处理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Login extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('account/m_reg_login');
	}


	public function index() {
		if ($this->input->post('account')){
			//return msg like:{"state":false,"message":"您输入的密码和账户名不匹配，请重新输入。","data":{"code":3501,"url":"http://www.zhiyin.com/","needrefresh":false}}
			$user = $this->m_reg_login->verifyUser($_REQUEST['account'],$_REQUEST['password']);
			if($user){
				$_SESSION['user']['uid'] = $user['uid'];
				$_SESSION['user']['name'] = $user['username'];				
				$login_result=array(
						"state"=>true,
						"message"=>"登录成功",
						"data"=>array(
								"code"=>1,
								"url"=>'http://www.zhiyin.com/admin',
								"needrefresh"=>true
						)
				);
				exit(json_encode($login_result));				

			}else{
				$login_result=array(
						"state"=>false,
						"message"=>"您输入的密码和账户名不匹配",
						"data"=>array(
								"code"=>1,
								"url"=>'',
								"needrefresh"=>false
						)
				);
				exit(json_encode($login_result));

			}			
		}else{
			//go to login page
			$this->load->view('account/login');
		}

	}

}

?>