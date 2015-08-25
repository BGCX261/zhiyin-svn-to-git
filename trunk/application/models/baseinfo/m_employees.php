<?php 
/**
 * 员工管理
 * @author rogerhoo
 *
 */
class M_Employees extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	function getEmployee($id){
		$data = array();
		//$options = array('id' => $id);
		//$Q = $this->db->get_where('yz_employees',$options,1);
		
		$sql="select t1.*, t2.name as dept_name from yz_employees t1, yz_departments t2 where t1.id=".$id." and t1.dept_id=t2.id limit 0,1";
		$Q = $this->db->query($sql);
				
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllEmployees(){
		$data = array();
		//$Q = $this->db->get('yz_employees');
		$sql="select t1.*, t2.name as dept_name from yz_employees t1, yz_departments t2 where  t1.dept_id=t2.id";
		$Q = $this->db->query($sql);		
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	
	function getEmployeesByDept($dept_id){
		$data = array();
		$this->db->select('*');
		$this->db->where('dept_id', $dept_id);
		//$this->db->order_by('name','asc');
		$Q = $this->db->get('yz_employees');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	


	function addEmployee(){
		$birthday = isset($_POST['birthday'])?$_POST['birthday']:'0-0-0';
		$array_birth = explode('-',$birthday);
		
		$enterday = isset($_POST['enterday'])?$_POST['enterday']:'0-0-0';
		$array_enter = explode('-',$enterday);		
		
		$data = array(
				'name' => db_clean($_POST['name']),
				'dept_id' => id_clean($_POST['dept_id']),
				'position' => db_clean($_POST['position']),
				'mobile' => db_clean($_POST['mobile']),
				'telephone' => db_clean($_POST['telephone']),	
				'address' => db_clean($_POST['address']),		
				'zipcode' => db_clean($_POST['zipcode']),
				'birth_year' => id_clean($array_birth[0]),
				'birth_month' => id_clean($array_birth[1]),
				'birth_day' => id_clean($array_birth[2]),
				'enter_year' => id_clean($array_enter[0]),
				'enter_month' => id_clean($array_enter[1]),
				'enter_day' => id_clean($array_enter[2]),
				'idcard' => db_clean($_POST['idcard']),
				'graduateschool' => db_clean($_POST['graduateschool']),
				'education' => db_clean($_POST['education'])
				
		);
		$this->db->insert('yz_employees', $data);

		$new_employee_id = $this->db->insert_id();
	}

	function updateEmployee(){
		$birthday = isset($_POST['birthday'])?$_POST['birthday']:'0-0-0';
		$array_birth = explode('-',$birthday);
		$enterday = isset($_POST['enterday'])?$_POST['enterday']:'0-0-0';
		$array_enter = explode('-',$enterday);		
		$data = array(
				'name' => db_clean($_POST['name']),
				'dept_id' => id_clean($_POST['dept_id']),
				'position' => db_clean($_POST['position']),
				'mobile' => db_clean($_POST['mobile']),
				'telephone' => db_clean($_POST['telephone']),	
				'address' => db_clean($_POST['address']),		
				'zipcode' => db_clean($_POST['zipcode']),
				'birth_year' => id_clean($array_birth[0]),
				'birth_month' => id_clean($array_birth[1]),
				'birth_day' => id_clean($array_birth[2]),
				'enter_year' => id_clean($array_enter[0]),
				'enter_month' => id_clean($array_enter[1]),
				'enter_day' => id_clean($array_enter[2]),
				'idcard' => db_clean($_POST['idcard']),
				'graduateschool' => db_clean($_POST['graduateschool']),
				'education' => db_clean($_POST['education'])
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('yz_employees', $data);

	}


	function deleteEmployee($id){
		$this->db->delete('yz_employees', array('id' => $id));
	}

}
?>
