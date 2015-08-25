<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once APPPATH . 'libraries/my_pagination.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_pagination
 *
 * @author asus
 */
class Paging extends My_Pagination {

    public function __construct($params = array()) {
        parent::__construct($params);
    }
    
    public function create_paging($base_url, $total, $per_page, $cur_page) {
    	$config['base_url'] = $base_url;
    	$config['total_rows'] = $total;
    	$config['per_page'] = $per_page;
    	$config['cur_page'] = $cur_page;
    	  	
    	$config['cur_tag_open'] = '<span class="page-cur">';
    	$config['cur_tag_close'] = '</span>';
    	
    	$config['full_tag_open'] = '<div class="g-pagination"><div class="page-bottom">';
    	$config['full_tag_close'] = '</div></div>';    	
    	
    	$config['anchor_class'] = '';
    	
    	$this->initialize($config);
    	$links = $this->create_links();
    	
//     	$pages = ceil($total / $per_page);
//     	if ($pages > 1) {
//     		$jump = '&nbsp;&nbsp;共'. $pages.'页&nbsp;&nbsp;到第<input id="jump-num" type="text" class="text">页&nbsp;&nbsp;<a href="javascript:jump2()" id="pnum-confirm">确定</a>';
//     		$jump .= '<script>function jump2(){document.location=}</script>';
//     	} else {
//     		$jump = '';
//     	}
    	return $links ;
    }    
    


    public function makeGetString() {
        $tmp = array();
        foreach ($_GET as $k => $v) {
            if ($k == 'page')
                continue;
            $tmp[] = urlencode($k) . '=' . urlencode($v);
        }
        return '?' . implode('&', $tmp);
    }

}

?>
