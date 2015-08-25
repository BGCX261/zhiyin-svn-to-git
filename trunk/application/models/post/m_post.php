<?php 

class m_post extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->driver('cache', array('adapter' => 'memcache', 'backup' => 'file'));
	}
	public function addPost(){
		$data = array(
				'publisher_id' => $_SESSION['member']['id'],
				'game_name' => $_POST['game_name'],
				'server_id' => $_POST['server_id'],
				'open_day' => intval($_POST['open_day']),
				'open_hour' => intval($_POST['open_hour']),
				'linkto' => $_POST['linkto'],
				'ispay' => intval($_POST['ispay']),	
				'ischecked' => 1,
		);	
		//var_dump($data);
		$this->db->insert('kf_post', $data);
		$new_post_id = $this->db->insert_id();
	}
	
	function getPostsByPublisherId($publisher_id){
		$data = array();
		$Q = $this->db->where('publisher_id',$publisher_id);
		$Q = $this->db->order_by('post_id','desc');
		$Q = $this->db->get('kf_post');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	
	
	
	
	/**
	 * 查询明天开服信息
	 * @return multitype:unknown
	 */
	public function get_post_open_tomorrow_2(){			
			$today_start = mktime(0, 0, 0);
			$today_end = mktime(23, 59, 59);
			//$sql="select post_id, publisher_id, game_name, server_id, FROM_UNIXTIME(open_time, '%Y-%m-%d %H:%i:%S') open_time, ispay, ischecked, linkto from kf_post where ischecked=0 and open_time>".($today_start+1*24*3600)." and open_time<".($today_start+2*24*3600)." order by open_time";			
			$sql="select post_id, publisher_id, game_name, server_id, FROM_UNIXTIME(open_time, '%Y-%m-%d %H:%i:%S') open_time, ispay, ischecked, linkto from kf_post where ischecked=0 and open_time>".($today_start+1*24*3600)." order by open_time";
			$result = array();			
			$query = $this->db->query($sql);
			if ($query->num_rows() > 0){
				foreach ($query->result_array() as $row){
					$result[] = $row;
				}
			}
			return $result;
	}	
	
	
	public function get_post_will_open_unpass(){
		//$today_start = mktime(0, 0, 0);
		//$today_end = mktime(23, 59, 59);
		
		$today=intval(date('Ymd'));
		
		$sql="select post_id, publisher_id, game_name, server_id, open_day, open_hour, ispay, ischecked, linkto from kf_post where ischecked=0 and open_day>=".$today." order by open_day, open_hour";
		$result = array();
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[] = $row;
			}
		}
		return $result;
	}	
	
	public function get_post_will_open_passed(){
		//$today_start = mktime(0, 0, 0);
		//$today_end = mktime(23, 59, 59);
		$today=intval(date('Ymd'));
		
		$sql="select post_id, publisher_id, game_name, server_id, open_day, open_hour, ispay, ischecked, linkto from kf_post where ischecked=1 and open_day>=".$today." order by open_day, open_hour";
		$result = array();
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[] = $row;
			}
		}
		return $result;
	}	
	
	public function get_post_open_today(){
		$today=intval(date('Ymd'));
		$sql="select post_id, publisher_id, game_name, server_id, open_day, open_hour, ispay, ischecked, linkto from kf_post where ischecked=1 and open_day=".$today." order by open_hour";		
		$result = array();
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[] = $row;
			}
		}
		return $result;
	}	
	
	public function get_post_open_tomorrow(){
		$today=intval(date('Ymd'));
		$sql="select post_id, publisher_id, game_name, server_id, open_day, open_hour, ispay, ischecked, linkto from kf_post where ischecked=1 and open_day=".($today+1)." order by open_hour";
		$result = array();
		$query = $this->db->query($sql);
		if ($query->num_rows() > 0){
			foreach ($query->result_array() as $row){
				$result[] = $row;
			}
		}
		return $result;
	}	
	
	public function pass($post_id){
		$updateSql = "update kf_post set ischecked=1 where post_id=".$post_id;
		$this->db->query($updateSql);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
	
	public function unpass($post_id){
		$updateSql = "update kf_post set ischecked=0 where post_id=".$post_id;
		$this->db->query($updateSql);
		if($this->db->affected_rows()>0){
			return TRUE;
		}else{
			return FALSE;
		}
	}	
		
}
?>
