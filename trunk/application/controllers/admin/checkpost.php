<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class checkpost extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/m_reg_login');
		$this->m_reg_login->checkLogin();
	}
	
	public function index() {
		$this->load->model('post/m_post');
		$data['open_list']=$this->m_post->get_post_will_open_unpass();
		$data['_ADDRESS'] = '开服审核';
		$data['select'] =array('check_post_todo'=>' class="selected" ');
		$data['view_content'] ='admin/checkpost/todo';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
		
	public function todo() {
		$this->load->model('post/m_post');
		$data['open_list']=$this->m_post->get_post_will_open_unpass();
		$data['_ADDRESS'] = '开服审核';
		$data['select'] =array('check_post_todo'=>' class="selected" ');
		$data['view_content'] ='admin/checkpost/todo';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	
	public function passed() {
		$this->load->model('post/m_post');
		$data['open_list']=$this->m_post->get_post_will_open_passed();
		$data['_ADDRESS'] = '开服审核';
		$data['select'] =array('check_post_passed'=>' class="selected" ');
		$data['view_content'] ='admin/checkpost/passed';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	
	
	public function pass($post_id) {
		$this->load->model('post/m_post');		
		$this->m_post->pass($post_id);
		$data['open_list']=$this->m_post->get_post_will_open_unpass();
		$data['_ADDRESS'] = '开服审核';
		$data['select'] =array('check_post'=>' class="selected" ');
		$data['view_content'] ='admin/checkpost/todo';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	
	public function unpass($post_id) {
		$this->load->model('post/m_post');
		$this->m_post->unpass($post_id);
		$data['open_list']=$this->m_post->get_post_will_open_passed();
		$data['_ADDRESS'] = '开服审核';
		$data['select'] =array('check_post'=>' class="selected" ');
		$data['view_content'] ='admin/checkpost/passed';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	









}

?>