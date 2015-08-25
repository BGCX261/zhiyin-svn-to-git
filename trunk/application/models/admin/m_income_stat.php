<?php 
/**
 * 收入统计
 * @author rogerhoo
 *
 */
class m_income_stat extends CI_Model {
	public function __construct() {
		parent::__construct();
	}


	function sum_by_day($day){
		$time_start = strtotime($day);
		$this->db_nggamec = $this->load->database('nggamec', TRUE);	
		$sql='select COALESCE(SUM(money),0) as totalmoney from ng_pay_log where parent=278170 and pay_state=1 and paytime>'.$time_start.' and paytime<'.($time_start+1*24*3600);
		$result = $this->db_nggamec->query($sql)->row(0)->totalmoney;
		return $result;				
	}
	
	
	function sum_by_period($day_start, $day_end){	
		$stamp_start = strtotime($day_start);
		$stamp_end = strtotime($day_end);
		if($stamp_start == $stamp_end) $stamp_end=($stamp_start+1*24*3600);		
		$this->db_nggamec = $this->load->database('nggamec', TRUE);		
		$sql='select COALESCE(SUM(money),0) as totalmoney from ng_pay_log where parent=278170 and pay_state=1 and paytime>'.$stamp_start.' and paytime<'.($stamp_end+1*24*3600);
		$result = $this->db_nggamec->query($sql)->row(0)->totalmoney;
		return $result;		
	}	
		
}
?>
