<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>印制管理系统</title>
<meta name="keywords" content="">
<meta name="description" content="">
<LINK REL="SHORTCUT ICON" HREF="/images/tps/i1/favicon.ico">

<link rel="stylesheet" href="/css/common/layout.css" type="text/css" />
<link rel="stylesheet" href="/css/common/global.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ngbtns.css" type="text/css" />
<script type="text/javascript" src="/js/lib/kissy/1.3.1/kissy-min.js"></script>
<script type="text/javascript" src="/js/lib/jquery/jquery-1.8.3.min.js"></script>
<script type="text/javascript" src="/js/global-min.js"></script>
</head>
<body>
	<div id="g_container">
		<div id="header_container">
			<?php $this->load->view('common/header');?>
		</div>
		<div id="main_container" class="page_bg">
			<?php $this->load->view('main');?>
		</div>
		<div id="footer_container">
			<?php $this->load->view('common/footer');?>
		</div>
	</div>
<script>
	//TB.Global.init();
</script>	
</body>
</html>
