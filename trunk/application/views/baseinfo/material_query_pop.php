<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix" >
<div style="margin:10px;">
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="20%">分组名称</th>
		<th width="20%">物料名</th>
		<th width="20%">物料编号</th>		
		<th width="20%">规格</th>
		<th width="5%">单位</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($materials)){
		echo "<tr style=\"height:80px\"><td colspan=\"7\"><span class=\"h\">没有物料信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($materials as $k=>$v){$loop_index++;
			echo "<tr>";
			echo "<td>".$loop_index."</td>";
			echo "<td>".$v['group_name']."</td>";
			echo "<td>".$v['name']."</td>";
			echo "<td>".$v['material_no']."</td>";
			echo "<td>".$v['guige']."</td>";	
			echo "<td>".$v['unit']."</td>";
			echo "<td></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>




