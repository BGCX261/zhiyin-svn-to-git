<div style="height:35px;width:100%;border:1px solid #ccc;margin-bottom:20px;padding-top:10px;padding-left:10px;">
<form name="q_form" action="/admin/incomestat/day">
	时间：<input type="text" id="day" name="day" value="<?php echo $day;?>">
	<a class="button button-green button_small" href="javascript:void(0)" onclick="doquery();">查询</a>
</form>
</div>

<div style="width:100%; font-size:15px;">
充值总金额：<?php echo $income_sum;?> 
</div>

<script>

function doquery(){
	if($("#day").val()==""){
		alert("请输入日期！");
		return false;
	}

	q_form.submit();
	
}
KISSY.use('node,calendar,calendar/assets/dpl.css', function(S, Node, Calendar) {
    var S_Date = S.Date;
    new Calendar('#day', {
        popup:true,
        triggerType:['click'],
        closable:true
    }).on('select', function(e) {
        Node.one('#day').val(S_Date.format(e.date, 'yyyy-mm-dd'));
    });
   
});
</script>





