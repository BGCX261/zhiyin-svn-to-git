<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix" >
<div style="margin:10px;">
	<div>
		<div style="float:left;">
			<a href="/produce/materialPurchases" class="add-new-btn">全部单据</a>
			<a href="/produce/materialPurchases/listbystatus/0" class="add-new-btn">未入库</a>
			<a href="/produce/materialPurchases/listbystatus/1" class="add-new-btn">已入库</a>
		</div>	
		<div style="float:right;">
			<a href="/produce/materialPurchases/create" class="add-new-btn"><i>ƚ</i>新增物料采购单</a>
		</div>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="8%">制单日期</th>
		<th width="12%">单据号</th>
		<th width="8%">供应商</th>
		<th width="15%">物料名称</th>
		<th width="8%">物料规格</th>
		<th width="5%">数量</th>
		<th width="5%">单位</th>
		<th width="5%">单价</th>
		<th width="5%">金额</th>		
		<th width="8%">交货日期</th>
		<th width="5%">状态</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($materialPurchases)){
		echo "<tr style=\"height:80px\"><td colspan=\"14\"><span class=\"h\">没有物料采购单信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($materialPurchases as $k=>$v){$loop_index++;
			if($v['status']==1){
				echo "<tr class=\"h_g\">";
			}else{
				echo "<tr>";
			}
			echo "<td>".$loop_index."</td>";
			echo "<td>".date('Y-m-d',$v['create_time'])."</td>";
			echo "<td><a href=\"javascript:;\" class=\"show-materialPurchase-detail\" data-materialPurchase-no=\"".$v['materialPurchase_no']."\" title=\"查看详细\">".$v['purchase_no']."</a></td>";
			echo "<td>".$v['supplier_name']."</td>";	
			echo "<td>".$v['material_name']."</td>";
			echo "<td>".$v['material_guige']."</td>";
			echo "<td>".$v['purchase_much']."</td>";
			echo "<td>".$v['material_unit']."</td>";
			echo "<td>".$v['unit_price']."</td>";
			echo "<td>".$v['money']."</td>";
			echo "<td>".$v['ship_date']."</td>";	
			echo "<td>".($v['status']==0?'未到货':'已入库')."</td>";
			echo "<td><a href=\"/produce/materialPurchases/intostore/".$v['id']."\">入库</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div style="height:30px; margin-left:10px;border:1px dashed yellow;width:600px;background:#fff8d3;line-height:30px;padding-left:5px;">
	绿色为已经到货的采购单！
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/produce/materialPurchases/delete" method="post">
	<input type="hidden" name="id" id="materialPurchase_id_4_del" value="">
</form>



<script>
function delMaterialPurchase(materialPurchaseId){
	if(confirm("确定删除此客户信息?")){
		$("#materialPurchase_id_4_del").val(materialPurchaseId);
		delform.submit();
	}else{
		 return false;
	}	
}
</script>

