<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">
	<div style="float:right;">
		<a href="/baseinfo/suppliers/create" class="add-new-btn"><i>ƚ</i>新增供应商</a>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="10%">供应商名</th>
		<th width="10%">供应商编号</th>
		<th width="10%">联系人</th>
		<th width="10%">手机</th>
		<th width="10%">电话</th>
		<th width="10%">传真</th>
		<th width="20%">地址</th>
		<th width="5%">邮编</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($suppliers)){
		echo "<tr style=\"height:80px\"><td colspan=\"10\"><span class=\"h\">你还没有添加供应商信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($suppliers as $k=>$v){$loop_index++;
			echo "<tr>";
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['supplier_no']."</td>";
			echo "<td>".$v['contact']."</td>";	
			echo "<td>".$v['mobile']."</td>";
			echo "<td>".$v['phone']."</td>";
			echo "<td>".$v['fax']."</td>";
			echo "<td>".$v['addr']."</td>";
			echo "<td>".$v['zipcode']."</td>";
			echo "<td><a href=\"/baseinfo/suppliers/edit/".$v['id']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delSupplier(".$v['id'].")\">删除</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/baseinfo/suppliers/delete" method="post">
	<input type="hidden" name="id" id="supplier_id_4_del" value="">
</form>

<script>
function delSupplier(supplierId){
	if(confirm("确定删除此供应商信息?")){
		$("#supplier_id_4_del").val(supplierId);
		delform.submit();
	}else{
		 return false;
	}
	
}
</script>

