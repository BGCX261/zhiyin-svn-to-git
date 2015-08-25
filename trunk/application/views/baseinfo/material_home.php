<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">

	<div>
		<div style="float:left;">
			<a href="/baseinfo/materials" class="add-new-btn">全部物料</a>
			<a href="/baseinfo/materials/low_list" class="add-new-btn">低于告警值物料</a>
		</div>	
		<div style="float:right;">
			<a href="/baseinfo/materials/create" class="add-new-btn"><i>ƚ</i>新增物料</a>
		</div>
	</div>	
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="10%">分组名称</th>
		<th width="25%">物料名</th>
		<th width="15">当前库存</th>
		<th width="15%">告警值</th>		
		<th width="10%">规格</th>
		<th width="5%">单位</th>
		<th width="5%">价格</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($materials)){
		echo "<tr style=\"height:80px\"><td colspan=\"7\"><span class=\"h\">你还没有添加物料信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($materials as $k=>$v){$loop_index++;
			if($v['current_store']>$v['low_store_alert']){
				echo "<tr class=\"n\">";
			}else{
				echo "<tr class=\"h\">";
			}
			
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['group_name']."</td>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['current_store']."</td>";
			echo "<td>".$v['low_store_alert']."</td>";
			echo "<td>".$v['guige']."</td>";	
			echo "<td>".$v['unit']."</td>";
			echo "<td>".$v['unit_price']."</td>";
			echo "<td><a href=\"/baseinfo/materials/edit/".$v['id']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delMaterial(".$v['id'].")\">删除</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div style="height:30px; margin-left:10px;border:1px dashed yellow;width:600px;background:#fff8d3;line-height:30px;padding-left:5px;">
	红色的物料库存已经过低！
</div>
</div>
<form name="delform" action="/baseinfo/materials/delete" method="post">
	<input type="hidden" name="id" id="material_id_4_del" value="">
</form>

<script>
function delMaterial(materialId){
	if(confirm("确定删除此物料信息?")){
		$("#material_id_4_del").val(materialId);
		delform.submit();
	}else{
		 return false;
	}
	
}
</script>

