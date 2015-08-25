<?php 
/**
 * 供应商管理
 * @author rogerhoo
 *
 */
class M_Suppliers extends CI_Model {
	public function __construct() {
		parent::__construct();
	}


	function getSupplier($id){
		$data = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where('yz_suppliers',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllSuppliers(){
		$data = array();
		$Q = $this->db->get('yz_suppliers');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	

	function addSupplier(){
		$data = array(
				'name' => db_clean($_POST['name']),
				'contact' => db_clean($_POST['contact']),
				'mobile' => db_clean($_POST['moblie']),
				'phone' => db_clean($_POST['phone']),	
				'fax' => db_clean($_POST['fax']),
				'addr' => db_clean($_POST['addr']),		
				'zipcode' => db_clean($_POST['zipcode'])
		);
		$this->db->insert('yz_suppliers', $data);

		$new_supplier_id = $this->db->insert_id();

	}

	function updateSupplier(){

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
		$this->db->update('yz_suppliers', $data);


	}


	function deleteSupplier($id){
		$this->db->delete('yz_suppliers', array('id' => $id));
	}


}
?>
