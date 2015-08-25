<?php 
/**
 * 印件管理
 * @author rogerhoo
 *
 */
class M_Products extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	//查询所有印件类型
	function getProductCategories(){
		$data = array();
		$Q = $this->db->get('yz_product_categories');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	

	function getProduct($id){
		$data = array();
		$options = array('id' => $id);
		$Q = $this->db->get_where('yz_products',$options,1);
		if ($Q->num_rows() > 0){
			$data = $Q->row_array();
		}

		$Q->free_result();
		return $data;
	}
	
	/**
	 * 查询印件所需物料
	 * @param unknown_type $id
	 * @return multitype:
	 */
	function getProductMaterials($id){
		$data = array();
		$sql="select t1.material_id, t1.need_materials, t2.name, t2.guige, t2.unit, t2.unit_price, t2.current_store, t2.low_store_alert from yz_products_materials t1 LEFT JOIN yz_materials t2 ON t1.material_id=t2.id where t1.product_id=".$id;
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}	
		$Q->free_result();
		return $data;
	}	

	function getAllProducts(){
		$data = array();
		$Q = $this->db->get('yz_products');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}
	
	function getProductsByCategory($catid){
		$data = array();
		$this->db->select('*');
		$this->db->where('category_id', $catid);
		//$this->db->order_by('name','asc');
		$Q = $this->db->get('yz_products');
		if ($Q->num_rows() > 0){
			foreach ($Q->result_array() as $row){
				$data[] = $row;
			}
		}
		$Q->free_result();
		return $data;
	}	


	function addProduct(){
		$data = array(
				'name' => db_clean($_POST['name']),
				'guige' => db_clean($_POST['guige']),
				'unit' => db_clean($_POST['unit']),
				'note' => db_clean($_POST['note']),	
				//'is_common' => db_clean($_POST['is_common']),//是否通用印件
				//'craft_id' => db_clean($_POST['craft_id'])//工艺号
		);
		$this->db->insert('yz_products', $data);

		$new_product_id = $this->db->insert_id();
		
		//print_r($_POST['materials']);
		//exit;
		$materials = $_POST['materials'];
		if (count($materials)){
			foreach ($materials  as $k=>$v){
				$data = array(
						'product_id' => $new_product_id,
						'material_id' => $k,
						'need_materials'=>$v
						);
				$this->db->insert('yz_products_materials',$data);
			}
		}  

	}

	function updateProduct(){

		$data = array(
				'name' => db_clean($_POST['name']),
				'guige' => db_clean($_POST['guige']),
				'unit' => db_clean($_POST['unit']),
				'note' => db_clean($_POST['note']),	
				//'is_common' => db_clean($_POST['is_common']),
				//'craft_id' => db_clean($_POST['craft_id'])
		);

		$this->db->where('id', $_POST['id']);
		$this->db->update('yz_products', $data);

 		$this->db->where('product_id', $_POST['id']);
		$this->db->delete('yz_products_materials');
			
		$materials = $_POST['materials'];
		if (count($materials)){
			foreach ($materials  as $k=>$v){
				$data = array(
						'product_id' => $_POST['id'],
						'material_id' => $k,
						'need_materials'=>$v
						);
				$this->db->insert('yz_products_materials',$data);
			}
		}  

	}


	function deleteProduct($id){
		$this->db->delete('yz_products', array('id' => $id));
		//同时删除印件的送货地址
		//$this->db->delete('yz_products_ships', array('product_id' => $id));
	}

	/**
	 * 查询此印件的送货地址
	 * @param unknown_type $id
	 * @return multitype:unknown
	 */
	function getProductShips($id){
		$data = array();
		$this->db->select('*');
		$this->db->where('product_id',$id);
		$Q = $this->db->get('yz_products_ships');
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
