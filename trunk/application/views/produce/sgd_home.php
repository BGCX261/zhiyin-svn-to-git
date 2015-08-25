<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<link rel="stylesheet" href="/css/common/ng-module.css" type="text/css" />

<div class="ng_main_wrap clearfix" >
<div style="margin:10px;">
	<div>
		<div style="float:left;">
			<a href="/produce/sgds" class="add-new-btn">全部单据</a>
			<a href="/produce/sgds/listbystatus/1" class="add-new-btn">未生产</a>
			<a href="/produce/sgds/listbystatus/2" class="add-new-btn">正在生产</a>
			<a href="/produce/sgds/listbystatus/3" class="add-new-btn">已经完工</a>
		</div>	
		<div style="float:right;">
			<a href="/produce/sgds/create" class="add-new-btn"><i>ƚ</i>新增施工单</a>
		</div>
	</div>
	<div class="blank_d" style="height:8px;"></div>
	<table class="list-table" width="100%" align="center">
	<tr>
		<th width="5%">序号</th>
		<th width="8%">制单日期</th>
		<th width="12%">工单号</th>
		<!--  <th width="8%">手工单号</th>-->
		<th width="15%">客户名称</th>
		<th width="15%">印件名称</th>
		<th width="5%">订单数</th>
		<th width="5%">生产数</th>
		<th width="5%">单价</th>
		<th width="5%">金额</th>		
		<th width="8%">交货日期</th>
		<th width="5%">状态</th>
		<th width="10%">操作</th>
	</tr>	
	<?php if (!count($sgds)){
		echo "<tr style=\"height:80px\"><td colspan=\"14\"><span class=\"h\">没有施工单信息!</span></td></tr>";
	}else{
		$loop_index=0;
		foreach ($sgds as $k=>$v){$loop_index++;
			echo "<tr>";
			echo "<td>".$loop_index."</td>";
			echo "<td>".date('Y-m-d',$v['create_time'])."</td>";
			echo "<td><a href=\"javascript:;\" class=\"show-sgd-detail\" data-sgd-no=\"".$v['sgd_no']."\" title=\"查看详细\">".$v['sgd_no']."</a></td>";
			//echo "<td>".$v['manual_no']."</td>";	
			echo "<td>".$v['customer_name']."</td>";
			echo "<td>".$v['product_name']."</td>";
			echo "<td>".$v['need_number']."</td>";
			echo "<td>".$v['produce_number']."</td>";
			echo "<td>".$v['unit_price']."</td>";
			echo "<td>".$v['money']."</td>";
			echo "<td>".$v['ship_date']."</td>";	
			echo "<td>".($v['status']==1?'未生产':'完成')."</td>";
			echo "<td><a href=\"/produce/sgds/edit/".$v['id']."\">修改</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href=\"javascript:;\" onclick=\"delSgd(".$v['id'].")\">删除</a></td>";
			echo "</tr>";
		}
	}?>
	</table>
</div>
<div class="blank_d" style="height:200px;"></div>
</div>
<form name="delform" action="/produce/sgds/delete" method="post">
	<input type="hidden" name="id" id="sgd_id_4_del" value="">
</form>

<?php $this->load->view('produce/pop_sgd_detail.php');?>

<script>
function delSgd(sgdId){
	if(confirm("确定删除此客户信息?")){
		$("#sgd_id_4_del").val(sgdId);
		delform.submit();
	}else{
		 return false;
	}	
}
</script>

