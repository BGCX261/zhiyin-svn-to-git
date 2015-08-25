<?php

/**
 * 部门管理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Departments extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('baseinfo/M_Departments');
	}


	//default go to department list
	public function index() {
		$data['departments']=$this->M_Departments->getAllDepartments();
		
		$data['_ADDRESS'] ='部门管理';
		$data['content'] ='baseinfo/department_home';
		$this->load->vars($data);
		$this->load->view('template');		
		
	}
	
	public function getalldeptsInJson(){
		$data = $this->M_Departments->getAllDepartments();
		exit(json_encode(array("results"=>$data)));
	}
	
	//检查部门名称是否存在
	public function checkDepartmentNameExist(){	
		$name=$_REQUEST['name'];	
		$check_result=array("state"=>false);
		exit(json_encode($check_result));			
	}
	

	
	public function create(){
		if ($this->input->get('name')){
			$name=$_REQUEST['name'];
			$up_id=$_REQUEST['up_id'];
			$newDeptId=$this->M_Departments->addDepartment($name,$up_id);
			if($newDeptId==0){
				//出错
				exit(json_encode(array("state"=>false)));				
			}else{
				$result=array("name"=>$name,"dept_id"=>$newDeptId,"up_id"=>$up_id);
				exit(json_encode(array("state"=>true, "data"=>$result)));				
			}
		}					
	}
	
	public function rename(){
		if ($this->input->get('name')){
			$id=$_REQUEST['id'];
			$name=$_REQUEST['name'];			
			$updateResult=$this->M_Departments->updateDepartment($id, $name);
			if(!$updateResult){
				//出错
				exit(json_encode(array("state"=>false)));
			}else{
				$result=array("name"=>$name,"dept_id"=>$id);
				exit(json_encode(array("state"=>true, "data"=>$result)));
			}
		}
	}	
	
	
	function delete(){
		$id=$_REQUEST['id'];
		$delResult = $this->M_Departments->deleteDepartment($id);
		if($delResult == 0){
			exit(json_encode(array("state"=>false, "msg"=>"删除失败")));
		}else if($delResult == -1){
			exit(json_encode(array("state"=>false,"msg"=>"此部门下有员工，不能删除")));
		}else{
			exit(json_encode(array("state"=>true)));
		}		
	}
	
	function updown(){
		$id=$_REQUEST['id'];
		$up_id=$_REQUEST['parentId'];
		$moveType=$_REQUEST['moveType'];
		$result = $this->M_Departments->change_sort($id,$up_id,$moveType);
		if($result===0){
			exit(json_encode(array("state"=>false,"msg"=>($moveType=="up"?"此部门已经在同级顶部":"此部门已经在同级底部"))));
		}else{
			exit(json_encode(array("state"=>true)));
		}
		

		
	
	}	
		

}

?>