<?php 
/**
 * 客户管理
 * @author rogerhoo
 *
 */
class M_Customers extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	//查询所有客户类型
	function getCustomerCategories(){
		$data = array();
		$Q = $this->db->get('yz_customer_categories');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	

	function getCustomer($id){
		$data = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where('yz_customers',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllCustomers(){
		$data = array();
		$Q = $this->db->get('yz_customers');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	
	function getCustomersByCategory($catid){
		$data = array();
		$this->db->select('*');
		$this->db->where('category_id', $catid);
		//$this->db->order_by('name','asc');
		$Q = $this->db->get('yz_customers');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	


	function addCustomer(){
		$data = array(
				'name' => db_clean($_POST['name']),
				'contact' => db_clean($_POST['contact']),
				'mobile' => db_clean($_POST['moblie']),
				'phone' => db_clean($_POST['phone']),	
				'fax' => db_clean($_POST['fax']),
				'addr' => db_clean($_POST['addr']),		
				'zipcode' => db_clean($_POST['zipcode'])
		);
		$this->db->insert('yz_customers', $data);

		$new_customer_id = $this->db->insert_id();

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

	function updateCustomer(){

		$data = array(
				'name' => db_clean($_POST['name']),
				'contact' => db_clean($_POST['contact']),
				'mobile' => db_clean($_POST['moblie']),
				'phone' => db_clean($_POST['phone']),	
				'fax' => db_clean($_POST['fax']),
				'addr' => db_clean($_POST['addr']),		
				'zipcode' => db_clean($_POST['zipcode'])
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('yz_customers', $data);

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


	function deleteCustomer($id){
		$this->db->delete('yz_customers', array('id' => $id));
		//同时删除客户的送货地址
		//$this->db->delete('yz_customers_ships', array('customer_id' => $id));
	}

	/**
	 * 查询此客户的送货地址
	 * @param unknown_type $id
	 * @return multitype:unknown
	 */
	function getCustomerShips($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('customer_id',$id);
		$Q = $this->db->get('yz_customers_ships');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}

}
?>
