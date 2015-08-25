<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');
class regstat extends CI_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('admin/m_reg_login');
		$this->m_reg_login->checkLogin();
	}

	public function day() {
		//获取年份，月份
		if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
		if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n");
		if (!isset($_REQUEST["day"])) $_REQUEST["day"] = date("j");
		
		$cYear = $_REQUEST["year"];
		$cMonth = $_REQUEST["month"];		
		$cDay = $_REQUEST["day"];
		
		$prev_year = $cYear;
		$next_year = $cYear;
		$prev_month = $cMonth-1;
		$next_month = $cMonth+1;
		if ($prev_month == 0 ) {
			$prev_month = 12;
			$prev_year = $cYear - 1;
		}
		if ($next_month == 13 ) {
			$next_month = 1;
			$next_year = $cYear + 1;
		}
		
		$data['cYear']=$cYear;
		$data['cMonth']=$cMonth;
		$data['cDay']=$cDay;
		$data['prev_year']=$prev_year;
		$data['prev_month']=$prev_month;
		$data['next_year']=$next_year;
		$data['next_month']=$next_month;	
		$this->load->model('admin/m_reg_stat');
		$data['reg_count']=$this->m_reg_stat->count_reg_by_day($cYear, $cMonth,$cDay);	
		
		$data['_ADDRESS'] = '注册统计-按天';
		$data['select'] =array('reg_state_day'=>' class="selected" ');
		$data['view_content'] ='admin/regstat/day';
		$this->load->vars($data);
		$this->load->view('admin/template');	
	}
	
	public function month() {
		$this->load->model('admin/m_reg_stat');	
		$data['_ADDRESS'] = '注册统计-按月';
		$data['select'] =array('reg_state_month'=>' class="selected" ');
		$data['view_content'] ='admin/regstat/month';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}

	public function year() {
		$this->load->model('admin/m_reg_stat');	
		$data['_ADDRESS'] = '注册统计-按年';
		$data['select'] =array('reg_state_year'=>' class="selected" ');
		$data['view_content'] ='admin/regstat/year';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	
	public function period() {
		if (!isset($_REQUEST["day_start"])) $_REQUEST["day_start"] = date("Y-m-d");
		if (!isset($_REQUEST["day_end"])) $_REQUEST["day_end"] = date("Y-m-d");
		$day_start=$_REQUEST["day_start"];
		$day_end=$_REQUEST["day_end"];
					
		$this->load->model('admin/m_reg_stat');
		$data['reg_count']=$this->m_reg_stat->count_reg_by_period($day_start, $day_end);
		
		$data['day_start'] = $day_start;
		$data['day_end'] = $day_end;
				
		$data['_ADDRESS'] = '注册统计-按时间段';
		$data['select'] =array('reg_state_period'=>' class="selected" ');
		$data['view_content'] ='admin/regstat/period';
		$this->load->vars($data);
		$this->load->view('admin/template');
	}	
	
	
	









}

?>