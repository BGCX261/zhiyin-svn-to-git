<?php 
/**
 * 用户登录，注册
 * @author rogerhoo
 *
 */
class m_reg_login extends CI_Model {
	public function __construct() {
		parent::__construct();
	}
	
	/**
	 *验证用户登录
	 */
	function verifyUser($u, $pw){
		$user = array();
		$sql = "select * from yz_users where status=1 and (username='".$u."' or email='".$u."') and password='".md5($pw)."' limit 1";
		$Q = $this->db->query($sql);
		if ($Q->num_rows() > 0){
			$user = $Q->row_array();
			return $user;
		}else{
			return false;
		}
	}
		
}
?>
