<?php 
/**
 * 部门管理
 * @author rogerhoo
 *
 */
class M_Departments extends CI_Model {
	public function __construct() {
		parent::__construct();
	}


	function getDepartment($id){
		$data = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where('yz_departments',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllDepartments(){
		$data = array();
		$this->db->order_by('up_id,seq');
		$Q = $this->db->get('yz_departments');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

	function addDepartment($name,$up_id){
		$data = array(
				'name' => db_clean($name),
				'up_id' => db_clean($up_id)
		);
		$this->db->insert('yz_departments', $data);

		$new_department_id = $this->db->insert_id();

		$data = array(
				'seq' => db_clean($new_department_id)
		);
		$this->db->where('id', $new_department_id);
		$this->db->update('yz_departments', $data);
		if($this->db->affected_rows()>0){
			return $new_department_id;
		}else{
			return 0;
		}

	}

	function updateDepartment($id,$name){
		$data = array(
				'name' => db_clean($name)
		);
		$this->db->where('id', $id);
		$this->db->update('yz_departments', $data);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}


	function deleteDepartment($id){
		//查询是否有员工在此部门下
		$this->db->where('dept_id',$id);
		$this->db->from('yz_employees');
		$count = $this->db->count_all_results();

		if($count>0){
			//同时修改员工表的部门id为0，到公司级下
			//$this->db->delete('yz_departments_ships', array('department_id' => $id));
			return -1;
				
		}else{
			$this->db->delete('yz_departments', array('id' => $id));
			if($this->db->affected_rows()>0){
				return 1;
			}else{
				return 0;
			}
		}
	}

	/**
	 * 修改排序
	 * @param unknown_type $game_id
	 * @param unknown_type $updown 1:up 0:down
	 */
	public function change_sort($id, $up_id, $updown){
		$data_on = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where('yz_departments',$options,1);
		if ($Q->num_rows() > 0){
			$has_on = true;
			$data_on = $Q->row_array();
			$data_on_seq = $data_on['seq'];
		}

		$data_to = array();

		if($updown=='up'){

			$this->db->select('id, seq');
			$this->db->where('up_id', $up_id);
			$this->db->where('seq <', $data_on_seq);
			$this->db->order_by('seq','desc');
			$this->db->limit(1);
			$Q = $this->db->get('yz_departments');
			if ($Q->num_rows() > 0){
				$has_to = true;
				$data_to = $Q->row_array();
				$data_to_seq = $data_to['seq'];
				$id_to = $data_to['id'];
			}

		}else{

			$this->db->select('id, seq');
			$this->db->where('up_id', $up_id);
			$this->db->where('seq >', $data_on_seq);
			$this->db->order_by('seq','asc');
			$this->db->limit(1);
			$Q = $this->db->get('yz_departments');
			if ($Q->num_rows() > 0){
				$has_to = true;
				$data_to = $Q->row_array();
				$data_to_seq = $data_to['seq'];
				$id_to = $data_to['id'];
			}

		}
		if($has_on && $has_to){
			$data = array(
					'seq' => $data_to_seq
			);
			$this->db->where('id', $id);
			$this->db->update('yz_departments', $data);

			$data = array(
					'seq' => $data_on_seq
			);
			$this->db->where('id', $id_to);
			$this->db->update('yz_departments', $data);
			return 1;
		}else{
			return 0;
		}


	}



}
?>
