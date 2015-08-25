<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">
	<div style="float:right;">
		<a href="/account/users/create" class="add-new-btn"><i>ƚ</i>新增用户</a>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="10%">序号</th>
		<th width="20%">用户名</th>
		<th width="30%">邮编</th>
		<th width="20%">所在组</th>
		<th width="10%">状态</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($users)){
		echo "<tr style=\"height:80px\"><td colspan=\"6\"><span class=\"h\">你还没有添加用户信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($users as $k=>$v){$loop_index++;
			echo "<tr>";
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['username']."</td>";
			echo "<td>".$v['email']."</td>";
			echo "<td>".($v['group']==9?'管理员':'普通用户')."</td>";	
			echo "<td>".($v['status']==1?'正常':'<span style="color:red;">禁用</span>')."</td>";
			echo "<td><a href=\"/account/users/edit/".$v['uid']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delUser(".$v['uid'].")\">禁用</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/account/users/delete" method="post">
	<input type="hidden" name="id" id="user_id_4_del" value="">
</form>

<script>
function delUser(userId){
	if(confirm("确定禁用此用户信息?")){
		$("#user_id_4_del").val(userId);
		delform.submit();
	}else{
		 return false;
	}
	
}
</script>

