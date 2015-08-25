<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class incomestat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/m_reg_login');
		$this->m_reg_login->checkLogin();
	}

	public function day() {

		if (!isset($_REQUEST["day"])) $_REQUEST["day"] = date("Y-m-d");
		$day = $_REQUEST["day"];
		
		$this->load->model('admin/m_income_stat');
		$data['income_sum']=$this->m_income_stat->sum_by_day($day);		
		$data['day'] = $day;
		$data['_ADDRESS'] = '收入统计-按天';
		$data['select'] =array('income_state_day'=>' class="selected" ');
		$data['view_content'] ='admin/incomestat/day';
		$this->load->vars($data);
		$this->load->view('admin/template');	
	}
	
	
	public function period() {
		if (!isset($_REQUEST["day_start"])) $_REQUEST["day_start"] = date("Y-m-d");
		if (!isset($_REQUEST["day_end"])) $_REQUEST["day_end"] = date("Y-m-d");
		$day_start=$_REQUEST["day_start"];
		$day_end=$_REQUEST["day_end"];
			
		$this->load->model('admin/m_income_stat');
		$data['income_sum']=$this->m_income_stat->sum_by_period($day_start, $day_end);
		$data['day_start'] = $day_start;
		$data['day_end'] = $day_end;
	
		$data['_ADDRESS'] = '收入统计-按时间段';
		$data['select'] =array('income_state_period'=>' class="selected" ');
		$data['view_content'] ='admin/incomestat/period';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	

	
	
	









}

?>