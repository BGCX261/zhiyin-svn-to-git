<style>
.admin-header {
	height: 30px;
	border-bottom: 1px solid #ccc;
	width:100%;
}


.admin-header .account-box {
	height: 20px;
	margin-top: 10px;
	padding-left:20px;
}


</style>
<div class="admin-header">
	<div class="account-box">
	当前登录：<?php echo $_SESSION['admin']['name'];?>&nbsp;| 
	<a href="/admin/logout">退出</a>
	</div>
</div>
<div class="blank_d" style="height:10px;"></div>

