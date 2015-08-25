<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>开服表</title>
<link rel="stylesheet" href="/css/common/layout.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ngbtns.css" type="text/css" />
<link rel="stylesheet" href="/css/global-min.css" type="text/css" />
<link rel="stylesheet" href="/css/uc/common/global.css" type="text/css" />
<script type="text/javascript" src="/js/lib/kissy/1.3.1/kissy-min.js"></script>
<script type="text/javascript" src="/js/lib/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/js/lib/jquery/jquery.blockUI.js"></script>

</head>
<body>
	<div id="g_container">
		<div id="header_container">
			<?php $this->load->view('member/common/header');?>
		</div>
		<div id="main_container">
			<div class="ng-uc-main">
				<!-- 左边导航 -->
				<div class="ng-uc-nav">
					<?php $this->load->view('member/common/nav.php');?>
				</div>
				<!-- 右边主内容 -->
				<div class="ng-uc-content-wrap">
					<div class="title-wrap clearfix">
						<span class="title"><?php echo $_ADDRESS?></span>
					</div>	
					<div class="content-body">
						<?php $this->load->view($view_content);?>
					</div>
				</div>
			</div>		
		</div>
	</div>
</body>
</html>
