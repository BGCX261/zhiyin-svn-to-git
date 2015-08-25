<?php

/**
 * 权限管理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class Roles extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('account/M_Roles');
	}


	//default go to role list
	public function index() {
		$data['roles']=$this->M_Roles->getAllRoles();
		
		$data['_ADDRESS'] ='角色列表';
		$data['content'] ='account/role_home';
		$this->load->vars($data);
		$this->load->view('template');		
		

	}
	
	//检查角色名是否存在
	public function checkRoleNameExist(){	
		$name=$_REQUEST['name'];	
		$check_result=array("state"=>false);
		exit(json_encode($check_result));			
	}
	
	public function create(){
		if ($this->input->post('name')){
			$this->M_Roles->addRole();
			$this->session->set_flashdata('message','角色创建成功');
			redirect('account/roles/index','refresh');
		}else{
			$data['_ADDRESS'] ='角色创建';
			$data['content'] ='account/role_create';
			$this->load->vars($data);
			$this->load->view('template');
		}					
	}
	
	function edit($roleid=0){
		if ($this->input->post('name')){
			$this->M_Roles->updateRole();
			$this->session->set_flashdata('message','角色修改成功');
			redirect('account/roles/index','refresh');
		}else{
			
			$data['_ADDRESS'] ='角色修改';
			
			$data['role'] = $this->M_Roles->getRole($roleid);
			$data['assigned_actions'] = $this->M_Roles->getAssignedActions($roleid);			
			
			
			$data['content'] ='account/role_edit';
			$this->load->vars($data);
			$this->load->view('template');			
		}
	}	
	
	
	function delete(){
		$this->M_Roles->deleteRole($_POST['roleid']);
		$this->session->set_flashdata('message','角色删除成功');
		redirect('account/roles/index','refresh');
	}
		

}

?>