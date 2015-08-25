<?php
class My_Pagination{
	var $base_url			= ''; // The page we are linking to
	var $prefix				= ''; // A custom prefix added to the path.
	var $suffix				= ''; // A custom suffix added to the path.

	var $total_rows			=  0; // Total number of items (database results)
	var $per_page			= 10; // Max number of items you want shown per page
	var $cur_page			=  0; // The current page being viewed
	
	var $num_links			=  2; // Number of "digit" links to show before/after the currently viewed page

	var $first_link			= '首页';
	var $next_link			= '下一页';
	var $prev_link			= '上一页';
	var $last_link			= '末页';

	var $full_tag_open		= '';
	var $full_tag_close		= '';
	var $first_tag_open		= '';
	var $first_tag_close	= '&nbsp;';
	var $prev_tag_open		= '&nbsp;';
	var $prev_tag_close		= '';	

	var $cur_tag_open		= '';
	var $cur_tag_close		= '';

	var $num_tag_open		= '&nbsp;';
	var $num_tag_close		= '';	
	var $next_tag_open		= '&nbsp;';
	var $next_tag_close		= '&nbsp;';	
	var $last_tag_open		= '&nbsp;';
	var $last_tag_close		= '';	
	
	var $use_page_numbers	= TRUE; // Use page number for segment instead of offset
	var $page_query_string	= TRUE;
	var $query_string_segment = 'page';

	var $display_pages		= TRUE;
	var $anchor_class		= '';

	public function __construct($params = array()){
		if (count($params) > 0)
		{
			$this->initialize($params);
		}
	}

	function initialize($params = array())
	{
		if (count($params) > 0)
		{
			foreach ($params as $key => $val)
			{
				if (isset($this->$key))
				{
					$this->$key = $val;
				}
			}
		}
	}

	function create_links()
	{
		// If our item count or per-page total is zero there is no need to continue.
		if ($this->total_rows == 0 OR $this->per_page == 0)
		{
			return '';
		}

		// Calculate the total number of pages
		$num_pages = ceil($this->total_rows / $this->per_page);

		// Is there only one page? Hm... nothing more to do here then.
		if ($num_pages == 1)
		{
			return '';
		}

		// Set the base page index for starting page number

		$base_page = 1;

		// Determine the current page number.
		$CI =& get_instance();
		if ($CI->input->get($this->query_string_segment) != $base_page)
		{
			$this->cur_page = $CI->input->get($this->query_string_segment);
			// Prep the current page - no funny business!
			$this->cur_page = (int) $this->cur_page;
		}

		// Set current page to 1 if using page numbers instead of offset
		if ($this->cur_page == 0)
		{
			$this->cur_page = $base_page;
		}

		$this->num_links = (int)$this->num_links;

		if ($this->num_links < 1)
		{
			show_error('Your number of links must be a positive number.');
		}

		if ( ! is_numeric($this->cur_page))
		{
			$this->cur_page = $base_page;
		}

		// Is the page number beyond the result range?
		// If so we show the last page

		if ($this->cur_page > $num_pages)
		{
			$this->cur_page = $num_pages;
		}

		$uri_page_number = $this->cur_page;


		// Calculate the start and end numbers. These determine
		// which number to start and end the digit links with
		$start = (($this->cur_page - $this->num_links) > 0) ? $this->cur_page - ($this->num_links - 1) : 1;
		$end   = (($this->cur_page + $this->num_links) < $num_pages) ? $this->cur_page + $this->num_links : $num_pages;

		// Is pagination being used over GET or POST?  If get, add a per_page query
		// string. If post, add a trailing slash to the base URL if needed
		$this->base_url = rtrim($this->base_url).'&'.$this->query_string_segment.'=';


		// And here we go...
		$output = '';

		// Render the "First" link
		if  ($this->first_link !== FALSE AND $this->cur_page > ($this->num_links + 1))
		{
			$output .= '<a '.$this->anchor_class.'href="'.$this->base_url.'1'.'">'.$this->first_link.'</a>';
		}

		// Render the "previous" link
		if  ($this->prev_link !== FALSE AND $this->cur_page != 1)
		{
			$pre_page_num = $uri_page_number - 1;
			$pre_page_para = $this->prefix.$pre_page_num.$this->suffix;
			$output .= '<a '.$this->anchor_class.'href="'.$this->base_url.$pre_page_para.'">'.$this->prev_link.'</a>';
		}

		// Render the pages
		if ($this->display_pages !== FALSE)
		{
			// Write the digit links
			for ($loop = $start -1; $loop <= $end; $loop++)
			{
				$i = $loop;
				if ($i >= $base_page)
				{
					if ($this->cur_page == $loop)
					{
						$output .= $this->cur_tag_open.$loop.$this->cur_tag_close; // Current page
					}
					else
					{
						$i =  $this->prefix.$i.$this->suffix;
						$output .= '<a '.$this->anchor_class.'href="'.$this->base_url.$i.'">'.$loop.'</a>';							
					}
				}
			}
		}

		// Render the "next" link
		if ($this->next_link !== FALSE AND $this->cur_page < $num_pages)
		{
			$i = $this->cur_page + 1;
			$output .= '<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->next_link.'</a>';
		}

		// Render the "Last" link
		if ($this->last_link !== FALSE AND ($this->cur_page + $this->num_links) < $num_pages)
		{
			$i = $num_pages;
			$output .= '<a '.$this->anchor_class.'href="'.$this->base_url.$this->prefix.$i.$this->suffix.'">'.$this->last_link.'</a>';
		}
		
		if ($num_pages > 1) {
			$jump = '<span class="page-skip">&nbsp;共'.$this->total_rows.'条记录'. $num_pages .'页&nbsp;&nbsp;到第<input id="jump-num" type="text" value='.$this->cur_page.' class="page-num">页&nbsp;&nbsp;<a href="javascript:jump2()" id="pnum-confirm">确定</a></span>';
			$jump .= '<script>function jump2(){var gopage=$(\'#jump-num\').val(); window.location.href=\''.$this->base_url.'\'+gopage}</script>';
			
			$output.=$jump;
		} 
		

		// Kill double slashes.  Note: Sometimes we can end up with a double slash
		// in the penultimate link so we'll kill all double slashes.
		$output = preg_replace("#([^:])//+#", "\\1/", $output);

		// Add the wrapper HTML if exists
		$output = $this->full_tag_open.$output.$this->full_tag_close;

		return $output;
	}


}