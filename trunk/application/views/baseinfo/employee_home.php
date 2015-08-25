<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">
	<div style="float:right;">
		<a href="/baseinfo/employees/create" class="add-new-btn"><i>ƚ</i>新增员工</a>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="4%">序号</th>
		<th width="8%">员工名</th>
		<th width="10%">部门</th>
		<th width="8%">职务</th>
		<th width="8%">入职时间</th>
		<!--  <th width="5%">性别</th>-->
		<!-- <th width="8%">生日</th>-->
		<th width="8%">电话</th>
		<th width="8%">手机</th>
		<th width="36%">地址</th>
		<!--<th width="5%">邮编</th>-->
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($employees)){
		echo "<tr style=\"height:80px\"><td colspan=\"9\"><span class=\"h\">你还没有添加员工信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($employees as $k=>$v){$loop_index++;
			echo "<tr>";
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['dept_name']."</td>";
			echo "<td>".$v['position']."</td>";	
			echo "<td>".($v['enter_year']==0?'':$v['enter_year'].'-'.$v['enter_month'].'-'.$v['enter_day'])."</td>";
			//echo "<td>".$v['gender']."</td>";
			//echo "<td>".($v['birth_year']==0?'':$v['birth_year'].'-'.$v['birth_month'].'-'.$v['birth_day'])."</td>";
			echo "<td>".$v['telephone']."</td>";
			echo "<td>".$v['mobile']."</td>";
			echo "<td>".$v['address']."</td>";
			//echo "<td>".$v['zipcode']."</td>";
			echo "<td><a href=\"/baseinfo/employees/edit/".$v['id']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delEmployee(".$v['id'].")\">删除</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/baseinfo/employees/delete" method="post">
	<input type="hidden" name="id" id="employee_id_4_del" value="">
</form>

<script>
function delEmployee(employeeId){
	if(confirm("确定删除此员工信息?")){
		$("#employee_id_4_del").val(employeeId);
		delform.submit();
	}else{
		 return false;
	}
	
}
</script>

