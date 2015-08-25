
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

/**
 * 获取游戏中的uid
 * @param unknown_type $uid 数据库中的uid
 * @param unknown_type $game_sn 游戏编号，如欧冠的游戏编号为og
 * @return string|unknown
 */
function genUidForGame($uid, $game_sn){
	//哪些游戏的uid是加了1004491的,从“斗将魂”开始uid没有加1004491,即数据库uid就是游戏中的uid
	$gams_with_prefix = array("og", "djj", "rxlq", "dxz", "xmhzc", "sjsg", "jjsg", "gjzqjl", "khbd", "cssg", "ftxlq");
	if (in_array($game_sn, $gams_with_prefix)) {
		$base = 1000000;
		$pid = 4491;
		$pflag = $base + $pid;
		return $pflag.$uid;
	}else{
		return $uid;
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

/**
 * get site wide domain like ".97ng.com"
 * @return string
 */
function get_site_wide_domain(){
	$host_url = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : $_SERVER['SERVER_NAME'];//www.97ng.com
	$host_url_arrays=explode('.',$host_url);
	$site_wide_domain='.'.$host_url_arrays[1].'.'.$host_url_arrays[2];//".97ng.com"
	return $site_wide_domain;
}





/* End of file userstatus_helper.php */ /* Location:
 ./application/helpers/userstatus_helper.php */
