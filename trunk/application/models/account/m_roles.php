<?php 
/**
 * 权限管理
 * @author rogerhoo
 *
 */
class M_Roles extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	function getRole($roleid){
		$data = array();
		$options = array('role_id' => $roleid);
		$Q = $this->db->get_where('yz_roles',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllRoles(){
		$data = array();
		$Q = $this->db->get('yz_roles');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}


	function addRole(){
		$data = array(
				'name' => db_clean($_POST['name']),
				'description' => db_clean($_POST['description']),
		);
		$this->db->insert('yz_roles', $data);

		$new_role_id = $this->db->insert_id();

		$actions= $_POST['actionItems'];
		$array_actions=explode(',',$actions);

		if (count($array_actions)){
			foreach ($array_actions  as $value){
				$data = array('role_id' => $new_role_id,
						'action_id' => intval($value));
				$this->db->insert('yz_roles_actions',$data);
			}
		}

	}

	function updateRole(){

		$data = array(
				'name' => db_clean($_POST['name']),
				'description' => db_clean($_POST['description']),
		);

		$this->db->where('role_id', $_POST['roleid']);
		$this->db->update('yz_roles', $data);

		$this->db->where('role_id', $_POST['roleid']);
		$this->db->delete('yz_roles_actions');
			
		$actions= $_POST['actionItems'];
		$array_actions=explode(',',$actions);
		if (count($array_actions)){
			foreach ($array_actions  as $value){
				$data = array('role_id' => $_POST['roleid'],
						'action_id' => intval($value));
				$this->db->insert('yz_roles_actions',$data);
			}
		}

	}


	function deleteRole($roleid){
		$this->db->delete('yz_role', array('role_id' => $roleid));
		$this->db->delete('yz_roles_actions', array('role_id' => $roleid));
	}

	/**
	 * 查询此角色可以操作的项
	 * @param unknown_type $id
	 * @return multitype:unknown
	 */
	function getAssignedActions($id){
		$data = array();
		$this->db->select('action_id');
		$this->db->where('role_id',$id);
		$Q = $this->db->get('yz_roles_actions');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row['action_id'];
			}
		}
		$Q->free_result();
		return $data;
	}

}
?>
