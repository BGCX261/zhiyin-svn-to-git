<?php 
/**
 * 物料采购单管理
 * @author rogerhoo
 *
 */
class M_MaterialPurchases extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	function getMaterialPurchase($id){
		$data = array();		
		$sql="select t1.*, t2.name as customer_name, t2.contact, t2.mobile, t2.phone, t2.addr, t3.name as product_name, t3.guige, t3.unit from yz_materialPurchases t1, yz_customers t2, yz_products t3 where t1.id=".$id." and t1.customer_id=t2.id and t1.product_id=t3.id limit 0,1";
		$Q = $this->db->query($sql);		
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllMaterialPurchases(){
		$data = array();
		$sql="select t1.*, t2.name as supplier_name, t3.name as material_name, t3.guige as material_guige, t3.unit as material_unit from yz_material_purchases t1, yz_suppliers t2, yz_materials t3 where t1.supplier_id=t2.id and t1.material_id=t3.id";
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
	 * 按生产状态查询
	 * @param unknown_type $status 状态0未到货1已经到货
	 * @return multitype:unknown
	 */
	function getMaterialPurchasesByStatus($status){
		$data = array();
		$sql="select t1.*, t2.name as supplier_name, t3.name as material_name from yz_material_purchases t1, yz_suppliers t2, yz_materials t3 where t1.supplier_id=t2.id and t1.material_id=t3.id and t1.status=".$status;
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
	 * 统计这个月的订单数量
	 */
	function countThisMonth(){
		$firstDayThisMonth = date('Y-m-01');
		$lastDayThisMonth = date('Y-m-t');
		$startTimeStamp=strtotime($firstDayThisMonth);
		$endTimeStamp=strtotime($lastDayThisMonth)+24*60*60;
		
		$this->db->where('create_time >=', $startTimeStamp);
		$this->db->where('create_time <=', $endTimeStamp);
		$this->db->from('yz_material_purchases');
		return $this->db->count_all_results();
	}
	
	/**
	 * 生成物料采购单号
	 */
	function generateMaterialPurchaseNo(){
		$countMaterialPurchaseThisMonth = $this->countThisMonth();
		return 'CGD'.date('Ym').'-'.str_pad($countMaterialPurchaseThisMonth+1,4,'0',STR_PAD_LEFT);
	}


	function addMaterialPurchase(){
		$materialPurchase_no = $this->generateMaterialPurchaseNo();
		$data = array(
				'create_time' => now(),
				'purchase_no' => $materialPurchase_no,				
				'supplier_id' => $_POST['supplier_id'],
				'material_id' => $_POST['material_id'],
				
				'purchase_much' => $_POST['purchase_much'],	
				'unit_price' => $_POST['unit_price'],
				'money' => $_POST['money'],
				'ship_date' => $_POST['ship_date'],
				
				'unit_price' => $_POST['unit_price'],		
				
				
				'quality_note' => $_POST['quality_note'],
				'note' => $_POST['note'],
				
				'status' => 0,
				'create_by' => $_SESSION['user']['uid']
		);
		$this->db->insert('yz_material_purchases', $data);

		$new_materialPurchase_id = $this->db->insert_id();
		
	}

	function updateMaterialPurchase(){

		$data = array(
				'create_time' => now(),
				'purchase_no' => $purchase_no,				
				'supplier_id' => $_POST['supplier_id'],
				'material_id' => $_POST['material_id'],
				
				'purchase_much' => $_POST['purchase_much'],	
				'unit_price' => $_POST['unit_price'],
				'money' => $_POST['money'],
				'ship_date' => $_POST['ship_date'],
				
				'unit_price' => $_POST['unit_price'],		
				
				
				'quality_note' => $_POST['quality_note'],
				'note' => $_POST['note'],
				
				'status' => 0,
				'create_by' => $_SESSION['user']['name']
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('yz_material_purchases', $data);


	}


	/**
	 * 入库
	 * @param unknown_type $id
	 */
	function intostore($id){
		$data = array(				
				'status' => 1
		);

		$this->db->where('id', $id);
		$this->db->update('yz_material_purchases', $data);
	}



}
?>
