<?php 
/**
 * 用户管理
 * @author rogerhoo
 *
 */
class M_Users extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	function getUser($uid){
		$data = array();
		$options = array('uid' => $uid);
		$Q = $this->db->get_where('yz_users',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllUsers(){
		$data = array();
		$Q = $this->db->get('yz_users');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	

	function addUser(){
		$data = array(
				'username' => db_clean($_POST['username']),
				'password' => md5($_POST['password']),
				'email' => db_clean($_POST['email']),
				'group' => id_clean($_POST['group']),	
				'status' => id_clean($_POST['status'])

		);
		$this->db->insert('yz_users', $data);

		$new_user_id = $this->db->insert_id();

/* 		$actions= $_POST['actionItems'];
		$array_actions=explode(',',$actions);

		if (count($array_actions)){
			foreach ($array_actions  as $value){
				$data = array('roleid' => $new_role_id,
						'actionid' => intval($value));
				$this->db->insert('yz_role_action',$data);
			}
		} */

	}

	function updateUser(){

		$data = array(
				'username' => db_clean($_POST['username']),
				'password' => md5($_POST['password']),
				'email' => db_clean($_POST['email']),
				'group' => id_clean($_POST['group']),	
				'status' => id_clean($_POST['status'])
		);

		$this->db->where('uid', $_POST['uid']);
		$this->db->update('yz_users', $data);

/* 		$this->db->where('roleid', $_POST['roleid']);
		$this->db->delete('yz_role_action');
			
		$actions= $_POST['actionItems'];
		$array_actions=explode(',',$actions);
		if (count($array_actions)){
			foreach ($array_actions  as $value){
				$data = array('roleid' => $_POST['roleid'],
						'actionid' => intval($value));
				$this->db->insert('yz_role_action',$data);
			}
		} */

	}


	function deleteUser($uid){
		$data = array(	
				'status' => 0
		);
		$this->db->where('uid', $uid);
		$this->db->update('yz_users', $data);
	}


}
?>
