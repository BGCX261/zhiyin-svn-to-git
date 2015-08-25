<?php

/**
 * 员工管理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Employees extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('baseinfo/M_Employees');
	}


	//default go to employee list
	public function index() {
		$data['employees']=$this->M_Employees->getAllEmployees();
		
		$data['_ADDRESS'] ='员工列表';
		$data['content'] ='baseinfo/employee_home';
		$this->load->vars($data);
		$this->load->view('template');		
		
	}
	
	//检查员工名称是否存在
	public function checkEmployeeNameExist(){	
		$name=$_REQUEST['name'];	
		$check_result=array("state"=>false);
		exit(json_encode($check_result));			
	}
	
	public function create(){
		if ($this->input->post('name')){
			$this->M_Employees->addEmployee();
			$this->session->set_flashdata('message','员工创建成功');
			redirect('baseinfo/employees/index','refresh');
		}else{
			$data['_ADDRESS'] ='员工创建';
			$data['content'] ='baseinfo/employee_create';
			$this->load->vars($data);
			$this->load->view('template');
		}					
	}
	
	function edit($id=0){
		if ($this->input->post('name')){
			$this->M_Employees->updateEmployee();
			$this->session->set_flashdata('message','员工修改成功');
			redirect('baseinfo/employees/index','refresh');
		}else{		
			$data['_ADDRESS'] ='员工信息修改';			
			$data['employee'] = $this->M_Employees->getEmployee($id);
			
			$data['content'] ='baseinfo/employee_edit';
			$this->load->vars($data);
			$this->load->view('template');			
		}
	}	
	
	
	function delete(){
		$this->M_Employees->deleteEmployee($_POST['id']);
		$this->session->set_flashdata('message','员工删除成功');
		redirect('baseinfo/employees/index','refresh');
	}
		

}

?>