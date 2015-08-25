<div style="height:35px;width:100%;border:1px solid #ccc;margin-bottom:20px;padding-top:10px;padding-left:10px;">
<form name="q_form" action="/admin/regstat/period">
	开始时间：<input type="text" id="day_start" name="day_start" value="<?php echo $day_start;?>">
	结束时间：<input type="text" id="day_end" name="day_end" value="<?php echo $day_end;?>">
	<a class="button button-green button_small" href="javascript:void(0)" onclick="doquery();">查询</a>
</form>
</div>

<div style="width:100%; font-size:15px;">
注册数：<?php echo $reg_count;?> 
</div>

<script>

function doquery(){
	if($("#day_start").val()==""){
		alert("请输入开始日期！");
		return false;
	}
	if($("#day_end").val()==""){
		alert("请输入结束日期！");
		return false;
	}	
	q_form.submit();
	
}
KISSY.use('node,calendar,calendar/assets/dpl.css', function(S, Node, Calendar) {
    var S_Date = S.Date;
    new Calendar('#day_start', {
        popup:true,
        triggerType:['click'],
        closable:true
    }).on('select', function(e) {
        Node.one('#day_start').val(S_Date.format(e.date, 'yyyy-mm-dd'));
    });

    new Calendar('#day_end', {
        popup:true,
        triggerType:['click'],
        closable:true
    }).on('select', function(e) {
        Node.one('#day_end').val(S_Date.format(e.date, 'yyyy-mm-dd'));
    });    
});
</script>



