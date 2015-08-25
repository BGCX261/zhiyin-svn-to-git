<?php

/**
 * 供应商管理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Suppliers extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('baseinfo/M_Suppliers');
	}


	//default go to supplier list
	public function index() {
		$data['suppliers']=$this->M_Suppliers->getAllSuppliers();
		
		$data['_ADDRESS'] ='供应商列表';
		$data['content'] ='baseinfo/supplier_home';
		$this->load->vars($data);
		$this->load->view('template');		
		
	}
	
	//检查供应商名称是否存在
	public function checkSupplierNameExist(){	
		$name=$_REQUEST['name'];	
		$check_result=array("state"=>false);
		exit(json_encode($check_result));			
	}
	
	public function create(){
		if ($this->input->post('name')){
			$this->M_Suppliers->addSupplier();
			$this->session->set_flashdata('message','供应商创建成功');
			redirect('baseinfo/suppliers/index','refresh');
		}else{
			$data['_ADDRESS'] ='供应商创建';
			$data['content'] ='baseinfo/supplier_create';
			$this->load->vars($data);
			$this->load->view('template');
		}					
	}
	
	function edit($id=0){
		if ($this->input->post('name')){
			$this->M_Suppliers->updateSupplier();
			$this->session->set_flashdata('message','供应商修改成功');
			redirect('baseinfo/suppliers/index','refresh');
		}else{
			
			$data['_ADDRESS'] ='供应商信息修改';
			
			$data['supplier'] = $this->M_Suppliers->getSupplier($id);
			//$data['ships'] = $this->M_Suppliers->getSupplierShips($id);			
			
			
			$data['content'] ='baseinfo/supplier_edit';
			$this->load->vars($data);
			$this->load->view('template');			
		}
	}	
	
	
	function delete(){
		$this->M_Suppliers->deleteSupplier($_POST['id']);
		$this->session->set_flashdata('message','供应商删除成功');
		redirect('baseinfo/suppliers/index','refresh');
	}
		

}

?>