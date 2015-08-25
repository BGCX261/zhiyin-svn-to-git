<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix pk5-content-box" >
<div style="margin:10px;">
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="25%">物料名</th>
		<th width="15">当前库存</th>
		<th width="15%">告警值</th>		
		<th width="10%">规格</th>
		<th width="5%">单位</th>
		<th width="5%">价格</th>
		<th width="10">工单占用</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($materials)){
		echo "<tr style=\"height:80px\"><td colspan=\"7\"><span class=\"h\">你还没有添加物料信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($materials as $k=>$v){$loop_index++;
			echo "<tr>";		
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['current_store']."</td>";
			echo "<td>".$v['low_store_alert']."</td>";
			echo "<td>".$v['guige']."</td>";	
			echo "<td>".$v['unit']."</td>";
			echo "<td>".$v['unit_price']."</td>";
			echo "<td class=\"h\">".$v['sgd_need']."</td>";
			echo "<td><a href=\"/produce/MaterialPurchases/create/?material_id=".$v['id']."\">去采购</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" data-materialId=\"".$v['id']."\" class=\"showSgd\">查看工单</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>

</div>




