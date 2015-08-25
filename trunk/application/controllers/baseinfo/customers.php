<?php

/**
 * 客户管理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Customers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('baseinfo/M_Customers');
	}


	//default go to customer list
	public function index() {
		$data['customers']=$this->M_Customers->getAllCustomers();
		
		$data['_ADDRESS'] ='客户列表';
		$data['content'] ='baseinfo/customer_home';
		$this->load->vars($data);
		$this->load->view('template');		
		
	}
	
	//检查客户名称是否存在
	public function checkCustomerNameExist(){	
		$name=$_REQUEST['name'];	
		$check_result=array("state"=>false);
		exit(json_encode($check_result));			
	}
	
	public function create(){
		if ($this->input->post('name')){
			$this->M_Customers->addCustomer();
			$this->session->set_flashdata('message','客户创建成功');
			redirect('baseinfo/customers/index','refresh');
		}else{
			$data['_ADDRESS'] ='客户创建';
			$data['content'] ='baseinfo/customer_create';
			$this->load->vars($data);
			$this->load->view('template');
		}					
	}
	
	function edit($id=0){
		if ($this->input->post('name')){
			$this->M_Customers->updateCustomer();
			$this->session->set_flashdata('message','客户修改成功');
			redirect('baseinfo/customers/index','refresh');
		}else{
			
			$data['_ADDRESS'] ='客户信息修改';
			
			$data['customer'] = $this->M_Customers->getCustomer($id);
			//$data['ships'] = $this->M_Customers->getCustomerShips($id);			
			
			
			$data['content'] ='baseinfo/customer_edit';
			$this->load->vars($data);
			$this->load->view('template');			
		}
	}	
	
	
	function delete(){
		$this->M_Customers->deleteCustomer($_POST['id']);
		$this->session->set_flashdata('message','客户删除成功');
		redirect('baseinfo/customers/index','refresh');
	}
		

}

?>