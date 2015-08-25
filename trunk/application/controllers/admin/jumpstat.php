<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class jumpstat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/m_reg_login');
		$this->m_reg_login->checkLogin();
	}

	public function day() {
		$this->load->model('post/m_post');
		//$data['open_list']=$this->m_post->get_post_open_tomorrow();	
		
		$data['_ADDRESS'] = '跳转统计-按天';
		$data['select'] =array('jump_state_day'=>' class="selected" ');
		$data['view_content'] ='admin/jumpstat/day';
		$this->load->vars($data);
		$this->load->view('admin/template');	
	}
	
	public function month() {
		$this->load->model('post/m_post');
		//$data['open_list']=$this->m_post->get_post_open_tomorrow();
	
		$data['_ADDRESS'] = '跳转统计-按月';
		$data['select'] =array('jump_state_month'=>' class="selected" ');
		$data['view_content'] ='admin/jumpstat/day';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	public function year() {
		$this->load->model('post/m_post');
		//$data['open_list']=$this->m_post->get_post_open_tomorrow();
	
		$data['_ADDRESS'] = '跳转统计-按年';
		$data['select'] =array('jump_state_year'=>' class="selected" ');
		$data['view_content'] ='admin/jumpstat/day';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	
	
	









}

?>