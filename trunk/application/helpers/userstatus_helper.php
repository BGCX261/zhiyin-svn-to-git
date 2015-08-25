
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function logged_in()
{
	//return TRUE;
	//if($CI->session->userdata('logged_in') == TRUE)
		
	//$CI =& get_instance();
	
	if ($_SESSION['user']['uid'] == '' || !isset($_SESSION['user']['uid'])) {
		return TRUE;
	}else{
		return FALSE;
	}

}




function GetIP(){
	if (getenv("HTTP_CLIENT_IP") && strcasecmp(getenv("HTTP_CLIENT_IP"), "unknown"))
		$ip = getenv("HTTP_CLIENT_IP");
	else if (getenv("HTTP_X_FORWARDED_FOR") && strcasecmp(getenv("HTTP_X_FORWARDED_FOR"), "unknown"))
		$ip = getenv("HTTP_X_FORWARDED_FOR");
	else if (getenv("REMOTE_ADDR") && strcasecmp(getenv("REMOTE_ADDR"), "unknown"))
		$ip = getenv("REMOTE_ADDR");
	else if (isset($_SERVER['REMOTE_ADDR']) && $_SERVER['REMOTE_ADDR'] && strcasecmp($_SERVER['REMOTE_ADDR'], "unknown"))
		$ip = $_SERVER['REMOTE_ADDR'];
	else
		$ip = "unknow";
	return($ip);
}



/* End of file userstatus_helper.php */ /* Location:
 ./application/helpers/userstatus_helper.php */
