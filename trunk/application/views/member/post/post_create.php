<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />
<div>
<form name="contentform" action="/member/post/create" method="post">
	<table width="100%" class="input-table">
		<tr>
			<td width="20%">游戏名称</td>
			<td width="80%"><input name="game_name" id="game_name" type="text"></td>
		</tr>
		<tr>
			<td>区服</td>
			<td>双线<input name="server_id" id="server_id" type="text">区</td>
		</tr>
		<tr>
			<td>开服时间</td>
			<td>
				<input name="open_day" id="open_day" type="text">
				<select name="open_hour" id="open_hour">
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					<option value="19">19</option>
					<option value="20">20</option>
					<option value="21">21</option>
					<option value="22">22</option>					
				</select>&nbsp;点
			</td>
		</tr>
		<tr>
			<td>进入链接</td>
			<td><input name="linkto" type="text" id="linkto" style="width:400px;" value="http://"></td>
		</tr>
		<tr>
			<td>是否消费</td>
			<td>
                <input  type="radio" name="ispay" value="1" />&nbsp;是
                <input type="radio" name="ispay" value="0" checked/>&nbsp;否			
			</td>
		</tr>
		<tr>
			<td colspan="2">
			<a href="javascript:void(0)" class="button button-green button_small" onclick="check_val();">提交</a>			
			</td>
		</tr>		
	</table>
</form>
</div>
<script>
KISSY.use('node,calendar,calendar/assets/dpl.css', function(S, Node, Calendar) {
    var S_Date = S.Date;
    new Calendar('#open_day', {
        popup:true,
        triggerType:['click'],
        closable:true
    }).on('select', function(e) {
        Node.one('#open_day').val(S_Date.format(e.date, 'yyyymmdd'));
    });
   
});

	function check_val(){
		if($.trim($("#game_name").val())==""){
			alert("请输入游戏名");
			return false;
		}
		if($.trim($("#server_id").val())==""){
			alert("请输入区服");
			return false;
		}	
		var intRegex = /^\d+$/;
		if(!intRegex.test($.trim($("#server_id").val()))) {
			alert("区服请输入整数");
			return false;
		}
		
		if($.trim($("#open_day").val())==""){
			alert("请输入开服日期");
			return false;
		}	
		if($.trim($("#linkto").val())==""){
			alert("请输入进入链接");
			return false;
		}	
		

		contentform.submit();	
	}
</script>