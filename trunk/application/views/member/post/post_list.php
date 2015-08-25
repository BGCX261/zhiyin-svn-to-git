<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<div>
<table class="list-table" width="100%">
	<tr>
		<th width="15%">游戏名称</th>
		<th width="10%">服务器</th>
		<th width="22%">开服时间</th>
		<th width="43%">链接</th>
		<th width="10%">操作</th>
	</tr>
	<?php if(count($post_list)){ 
		foreach($post_list as $k=>$v) {?>
		<tr>
			<td><?php echo $v['game_name'];?></td>
			<td>双线<?php echo $v['server_id'];?>服</td>
			<td><?php echo $v['open_day'];?></td>
			<td><a href="<?php echo $v['linkto'];?>" target="_blank"><?php echo $v['linkto'];?></a></td>
			<td>&nbsp;</td>
		</tr>

	<?php }}else{?>
		<tr>
			<td colspan="5">无数据</td>
		</tr>
	<?php }?>
	</table>
</div>