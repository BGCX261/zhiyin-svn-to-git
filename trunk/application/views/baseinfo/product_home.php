<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">
	<div style="float:right;">
		<a href="/baseinfo/products/create" class="add-new-btn"><i>ƚ</i>新增印件</a>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="10%">印件名</th>
		<th width="10%">印件类别</th>
		<th width="10%">规格</th>
		<th width="10%">备注</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($products)){
		echo "<tr style=\"height:80px\"><td colspan=\"10\"><span class=\"h\">你还没有添加印件信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($products as $k=>$v){$loop_index++;
			echo "<tr>";
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['category_name']."</td>";
			echo "<td>".$v['guige']."</td>";	
			echo "<td>".$v['note']."</td>";
			echo "<td><a href=\"/baseinfo/products/edit/".$v['id']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delProduct(".$v['id'].")\">删除</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/baseinfo/products/delete" method="post">
	<input type="hidden" name="id" id="product_id_4_del" value="">
</form>

<script>
function delProduct(productId){
	if(confirm("确定删除此印件信息?")){
		$("#product_id_4_del").val(productId);
		delform.submit();
	}else{
		 return false;
	}
	
}
</script>

