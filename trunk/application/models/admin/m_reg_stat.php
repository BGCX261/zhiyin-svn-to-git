<?php 
/**
 * 注册统计
 * @author rogerhoo
 *
 */
class m_reg_stat extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	/**
	 * 按日期统计
	 * 	 
	 * */
	function count_reg_by_day($year, $month, $day){
		$today_start = mktime(0, 0, 0, $month, $day, $year);		
		$this->db_nggamec = $this->load->database('nggamec', TRUE);		
		$this->db_nggamec->where('parenter', 278170);
		$this->db_nggamec->where('regdate >', $today_start);
		$this->db_nggamec->where('regdate <', $today_start+1*24*3600);
		$this->db_nggamec->from('ng_users');
		return $this->db_nggamec->count_all_results();
	}
	
	
	function count_reg_by_period($day_start, $day_end){
		$stamp_start = strtotime($day_start);
		$stamp_end = strtotime($day_end);
		if($stamp_start == $stamp_end) $stamp_end=($stamp_start+1*24*3600);

		$this->db_nggamec = $this->load->database('nggamec', TRUE);
		$this->db_nggamec->where('parenter', 278170);
		$this->db_nggamec->where('regdate >', $stamp_start);
		$this->db_nggamec->where('regdate <', $stamp_end+1*24*3600);
		$this->db_nggamec->from('ng_users');
		return $this->db_nggamec->count_all_results();
	}	
		
}
?>
