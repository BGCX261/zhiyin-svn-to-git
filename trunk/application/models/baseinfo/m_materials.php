<?php 
/**
 * 物料管理
 * @author rogerhoo
 *
 */
class M_Materials extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	//查询所有物组
	function getMaterialGroups(){
		$data = array();
		$Q = $this->db->get('yz_material_groups');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	

	function getMaterial($id){
		$data = array();
		$sql="select t1.id, t1.group_id, t1.material_no, t1.name, t1.guige, t1.unit, t1.unit_price, t1.supplier_id, t1.low_store_alert, t1.current_store, t2.name as group_name from yz_materials t1, yz_material_groups t2 where t1.id=".$id." and t1.group_id=t2.id limit 0,1";
		$Q = $this->db->query($sql);
				
		//$options = array('id' => $id);
		//$Q = $this->db->get_where('yz_materials',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllMaterials(){
		$data = array();
		$sql="select t1.id, t1.group_id, t1.material_no, t1.name, t1.guige, t1.unit, t1.unit_price, t1.supplier_id, t1.low_store_alert, t1.current_store, t2.name as group_name from yz_materials t1, yz_material_groups t2 where t1.group_id=t2.id";
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	
	function getMaterialsByGroup($groupid){
		$data = array();
		$this->db->select('*');
		$this->db->where('group_id', $groupid);
		//$this->db->order_by('name','asc');
		$Q = $this->db->get('yz_materials');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	


	function addMaterial(){
		$data = array(
				'name' => db_clean($_POST['name']),
				'group_id' => id_clean($_POST['group']),
				'guige' => db_clean($_POST['guige']),
				'unit' => db_clean($_POST['unit']),
				'unit_price' => db_clean($_POST['unit_price']),
				'supplier_id' => id_clean($_POST['supplier']),
				'low_store_alert' => $_POST['low_store_alert'],
				'current_store' => $_POST['current_store']
				
		);
		$this->db->insert('yz_materials', $data);

		$new_material_id = $this->db->insert_id();

	}

	function updateMaterial(){
		$data = array(
				'name' => db_clean($_POST['name']),
				'group_id' => id_clean($_POST['group']),
				'guige' => db_clean($_POST['guige']),
				'unit' => db_clean($_POST['unit']),
				'unit_price' => db_clean($_POST['unit_price']),
				'supplier_id' => id_clean($_POST['supplier']),
				'low_store_alert' => $_POST['low_store_alert'],
				'current_store' => $_POST['current_store']
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('yz_materials', $data);
	}


	function deleteMaterial($id){
		$this->db->delete('yz_materials', array('id' => $id));
	}
	
	/**
	 * 检查是否有物料库存过低
	 * @return boolean
	 */
	function checkStoreLow(){
		$notEnoughForSgd = $this->getNotEnoughForSgd();
		if(count($notEnoughForSgd)){
			return true;
		}else{
			return false;
		}
		
	}
	
	/**
	 * 不够订单领料/领料后低于告警值的物料
	 * @return multitype:unknown
	 */
	function getNotEnoughForSgdOrLowAfterTook(){
		$data = array();
		$sql="select t1.id, t1.group_id, t1.material_no, t1.name, t1.guige, t1.unit, t1.unit_price, t1.supplier_id, t1.low_store_alert, t1.current_store, t2.name as group_name, t3.sgd_need from yz_materials t1, yz_material_groups t2, (select sum(need_material) as sgd_need, material_id from yz_sgds_materials where outted=0 group by material_id ) t3 where t1.group_id=t2.id and t3.material_id=t1.id and (t1.current_store<t3.sgd_need or (t1.current_store-t3.sgd_need)<t1.low_store_alert) ";
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	
	
	/**
	 * 查询库存低于告警值的物料
	 */
	function getStoreLowMaterials(){
		$data = array();
		$sql="select t1.id, t1.group_id, t1.material_no, t1.name, t1.guige, t1.unit, t1.unit_price, t1.supplier_id, t1.low_store_alert, t1.current_store, t2.name as group_name from yz_materials t1, yz_material_groups t2 where t1.group_id=t2.id and t1.current_store<t1.low_store_alert";
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	

	
	/**
	 * 不够订单领料的
	 * @return multitype:unknown
	 */
	function getNotEnoughForSgd(){
		$data = array();
		$sql="select t1.id, t1.group_id, t1.material_no, t1.name, t1.guige, t1.unit, t1.unit_price, t1.supplier_id, t1.low_store_alert, t1.current_store, t2.name as group_name, t3.sgd_need from yz_materials t1, yz_material_groups t2, (select sum(need_material) as sgd_need, material_id from yz_sgds_materials where outted=0 group by material_id ) t3 where t1.group_id=t2.id and t3.material_id=t1.id and t1.current_store<t3.sgd_need";
		$Q = $this->db->query($sql);
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
