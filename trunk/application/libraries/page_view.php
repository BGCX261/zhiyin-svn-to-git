<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
require_once BASEPATH . 'libraries/Pagination.php';
/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of MY_pagination
 *
 * @author asus
 */
class Page_view extends CI_pagination {

    public function __construct($params = array()) {
        parent::__construct($params);
    }

    public function create($base_url, $total, $per_page, $cur_page) {
        $config['base_url'] = $base_url;
        $config['total_rows'] = $total;
        $config['per_page'] = $per_page;
        $config['cur_page'] = $cur_page;
        $config['num_links'] = 2;
        $config['use_page_numbers'] = TRUE;
        $config['page_query_string'] = TRUE;
        $config['query_string_segment'] = 'page';
        $config['first_link'] = '首页';
//        $config['first_tag_open'] = '<a>';
//        $config['first_tag_close'] = '</a>';
        $config['last_link'] = '末页';
//        $config['last_tag_open'] = '<a>';
//        $config['last_tag_close'] = '</a>';
        $config['next_link'] = '下一页';
//        $config['next_tag_open'] = '<a>';
//        $config['next_tag_close'] = '</a>';
        $config['prev_link'] = '上一页';
//        $config['prev_tag_open'] = '<a>';
//        $config['prev_tag_close'] = '</a>';
        $config['cur_tag_open'] = '&nbsp;<a href=# class="pnum01">';
        $config['cur_tag_close'] = '</a>';
//        $config['num_tag_open'] = '<a>';
//        $config['num_tag_close'] = '</a>';
        $config['anchor_class'] = 'class="pnum"';
        $this->initialize($config);
        $links = $this->create_links();
        $pages = ceil($total / $per_page);
        if ($pages > 1) {
            $jump = '&nbsp;&nbsp;共' . $pages . '页&nbsp;&nbsp;到第<input id="jump-num" type="text" class="text">页&nbsp;&nbsp;<a href="javascript:set_search(\'page\',$(\'#jump-num\').val())" id="pnum-confirm" class="pnum">确定</a>';
        } else {
            $jump = '';
        }
        return $links . $jump;
    }
    
    public function create_paging($base_url, $total, $per_page, $cur_page) {
    	$config['base_url'] = $base_url;
    	$config['total_rows'] = $total;
    	$config['per_page'] = $per_page;
    	$config['cur_page'] = $cur_page;
    	
    	$config['num_links'] = 2;
    	$config['use_page_numbers'] = TRUE;
    	$config['page_query_string'] = TRUE;
    	$config['query_string_segment'] = 'page';
    	$config['first_link'] = '首页';
    	$config['last_link'] = '末页';
    	$config['next_link'] = '下一页';
    	$config['prev_link'] = '上一页';
    	
    	$config['cur_tag_open'] = '&nbsp;<a href=# class="pnum01">';
    	$config['cur_tag_close'] = '</a>';
    	
    	$config['anchor_class'] = 'class="pnum"';
    	$this->initialize($config);
    	$links = $this->create_links();
    	$pages = ceil($total / $per_page);
    	if ($pages > 1) {
    		//$jump = '&nbsp;&nbsp;共' . $pages . '页&nbsp;&nbsp;到第<input id="jump-num" type="text" class="text">页&nbsp;&nbsp;<a href="javascript:set_search(\'page\',$(\'#jump-num\').val())" id="pnum-confirm" class="pnum">确定</a>';
    		$jump = '&nbsp;&nbsp;共' . $pages . '页'.$total.'记录';
    	} else {
    		$jump = '';
    	}
    	return $links . $jump;
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
