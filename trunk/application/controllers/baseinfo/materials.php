<?php

/**
 * 物料管理
 */
if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Materials extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('baseinfo/M_Materials');
	}


	//default go to material list
	public function index() {
		$data['materials']=$this->M_Materials->getAllMaterials();
		
		$data['_ADDRESS'] ='物料列表';
		$data['content'] ='baseinfo/material_home';
		$this->load->vars($data);
		$this->load->view('template');		
		
	}
	
	//检查物料名称是否存在
	public function checkMaterialNameExist(){	
		$name=$_REQUEST['name'];	
		$check_result=array("state"=>false);
		exit(json_encode($check_result));			
	}
	
	public function create(){
		if ($this->input->post('name')){
			$this->M_Materials->addMaterial();
			$this->session->set_flashdata('message','物料创建成功');
			redirect('baseinfo/materials/index','refresh');
		}else{
			$data['_ADDRESS'] ='物料创建';
			$data['content'] ='baseinfo/material_create';
			
			$data['groups'] = $this->M_Materials->getMaterialGroups();
			
			$this->load->vars($data);
			$this->load->view('template');
		}					
	}
	
	function edit($id=0){
		if ($this->input->post('name')){
			$this->M_Materials->updateMaterial();
			$this->session->set_flashdata('message','物料修改成功');
			redirect('baseinfo/materials/index','refresh');
		}else{
			
			$data['_ADDRESS'] ='物料信息修改';
			
			$data['material'] = $this->M_Materials->getMaterial($id);
			$data['groups'] = $this->M_Materials->getMaterialGroups();		
			
			
			$data['content'] ='baseinfo/material_edit';
			$this->load->vars($data);
			$this->load->view('template');			
		}
	}	
	
	
	function delete(){
		$this->M_Materials->deleteMaterial($_POST['id']);
		$this->session->set_flashdata('message','物料删除成功');
		redirect('baseinfo/materials/index','refresh');
	}
		

}

?>