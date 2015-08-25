<?php 
/**
 * 施工单管理
 * @author rogerhoo
 *
 */
class M_Sgds extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	


	function getSgd($id){
		$data = array();
		//$options = array('id' => $id);
		//$Q = $this->db->get_where('yz_sgds',$options,1);
		
		$sql="select t1.*, t2.name as customer_name, t2.contact, t2.mobile, t2.phone, t2.addr, t3.name as product_name, t3.guige, t3.unit from yz_sgds t1, yz_customers t2, yz_products t3 where t1.id=".$id." and t1.customer_id=t2.id and t1.product_id=t3.id limit 0,1";
		$Q = $this->db->query($sql);		
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}

	function getAllSgds(){
		$data = array();
		//$Q = $this->db->get('yz_sgds');
		$sql="select t1.*, t2.name as customer_name, t2.contact, t2.mobile, t2.phone, t2.addr, t3.name as product_name, t3.guige, t3.unit from yz_sgds t1, yz_customers t2, yz_products t3 where t1.customer_id=t2.id and t1.product_id=t3.id";
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
	 * @param unknown_type $status 施工单状态:0未审核1未生产2正在生产3已完工
	 * @return multitype:unknown
	 */
	function getSgdsByStatus($status){
		$data = array();
		$sql="select t1.*, t2.name as customer_name, t2.contact, t2.mobile, t2.phone, t2.addr, t3.name as product_name, t3.guige, t3.unit from yz_sgds t1, yz_customers t2, yz_products t3 where t1.customer_id=t2.id and t1.product_id=t3.id and t1.status=".$status;
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
		$this->db->from('yz_sgds');
		return $this->db->count_all_results();
	}
	
	/**
	 * 生成施工单号
	 */
	function generateSgdNo(){
		$countSgdThisMonth = $this->countThisMonth();
		return 'SGD'.date('Ym').'-'.str_pad($countSgdThisMonth+1,4,'0',STR_PAD_LEFT);
	}


	function addSgd(){
		$sgd_no = $this->generateSgdNo();
		$data = array(
				'create_time' => now(),
				'sgd_no' => $sgd_no,
				'manual_no' => $_POST['manual_no'],
				
				'customer_id' => $_POST['customer_id'],
				'product_id' => $_POST['product_id'],
				
				'need_number' => $_POST['need_number'],	
				'produce_number' => $_POST['need_number'],
				
				'unit_price' => $_POST['unit_price'],		
				'money' => $_POST['money'],
				'ship_date' => $_POST['ship_date'],
				'note' => $_POST['note'],
				'create_by' => $_SESSION['user']['name'],
				'status' => 1
		);
		$this->db->insert('yz_sgds', $data);

		$new_sgd_id = $this->db->insert_id();
		
		//此印件需要的物料
		$this->load->model('baseinfo/M_Products');
		$materialsForProduct = $this->M_Products->getProductMaterials($_POST['product_id']);
		if(count($materialsForProduct)){
			foreach ($materialsForProduct  as $k => $v){
				$data = array(
						'sgd_no' => $sgd_no,
						'manual_no' => $_POST['manual_no'],
						'customer_id' => $_POST['customer_id'],
						'product_id' => $_POST['product_id'],
						'material_id' => $v['material_id'],
						'material_name' => $v['name'],
						'material_guige' => $v['guige'],
						'material_unit' => $v['unit'],
						'need_material' => $v['need_materials']*$_POST['need_number'],
						'outted' => 0
						);
	
				$this->db->insert('yz_sgds_materials',$data);								
			}
		}


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

	function updateSgd(){

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
		$this->db->update('yz_sgds', $data);

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


	function deleteSgd($id){
		$this->db->delete('yz_sgds', array('id' => $id));
		//同时删除施工单的送货地址
		//$this->db->delete('yz_sgds_ships', array('sgd_id' => $id));
	}

	/**
	 * 查询此施工单的送货地址
	 * @param unknown_type $id
	 * @return multitype:unknown
	 */
	function getSgdShips($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('sgd_id',$id);
		$Q = $this->db->get('yz_sgds_ships');
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
