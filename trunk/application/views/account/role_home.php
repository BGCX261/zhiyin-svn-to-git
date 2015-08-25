<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />
<style>
@font-face {
    font-family: mticonfont;
    src: url(/icon-font/1.1.5/iconfont.eot);
    src: url(/icon-font/1.1.5/iconfont.eot?#iefix) format("embedded-opentype"),url(/icon-font/1.1.5/iconfont.woff) format("woff"),url(http://www.97ng.com/icon-font/1.1.5/iconfont.ttf) format("truetype"),url(/icon-font/1.1.5/iconfont.svg#iconfont) format("svg")
}
em, i {
	font-style: normal;
}
.add-new-btn{
	/*display: block;*/
	width: 100%;
	padding:5px;
	border: 1px #d8d8d8 solid;
}

.add-new-btn i{
	margin-right: 5px;
	font-size: 12px;
	font-family: mticonfont;
}

.add-new-btn:hover{
	color: #f40;
}

</style>

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">
	<div style="float:right;">
		<a href="/account/roles/create" class="add-new-btn"><i>ƚ</i>新增角色</a>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="20%">角色名</th>
		<th width="60%">描述</th>
		<th width="20%">操作</th>
	</tr>	
	<?php if (!count($roles)){
		echo "<tr style=\"height:80px\"><td colspan=\"3\"><span class=\"h\">你还没有定义角色!</span></td></tr>";
	}else{
		foreach ($roles as $k=>$v){
			echo "<tr>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['description']."</td>";			
			echo "<td><a href=\"/account/roles/edit/".$v['role_id']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delRole(".$v['role_id'].")\">删除</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/account/roles/delete" method="post">
	<input type="hidden" name="roleid" id="roleid" value="">
</form>

<script>
function delRole(roleId){
	if(confirm("确定删除此角色?")){
		$("#roleid").val(roleId);
		delform.submit();
	}else{
		 return false;
	}
	
}
</script>

