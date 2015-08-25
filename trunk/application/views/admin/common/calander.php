<link rel="stylesheet" href="http://kf.97ng.com/css/common/signin.css" type="text/css" />
<div class="calendar_wrap">
	<?php
		$monthNames = Array("一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月", "十二月");
	?>	
	<div class="header_box">
		<div class="left"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color: #FFFFFF">&lt;&lt;&nbsp;上个月</a></div>
		<div class="center"><span style="font-size:16px;"><strong><?php echo $cYear.'  '.$monthNames[$cMonth-1]; ?></strong></span></div>
		<div class="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color: #FFFFFF">下个月 &gt;&gt;</a></div>
	</div>
	<div style="padding-left:13px;">
	<table width="455px" border="0" cellpadding="2" cellspacing="2">
		<tr height="20px">
			<td align="center" ><strong>周日</strong></td>
			<td align="center" ><strong>周一</strong></td>
			<td align="center" ><strong>周二</strong></td>
			<td align="center" ><strong>周三</strong></td>
			<td align="center" ><strong>周四</strong></td>
			<td align="center" ><strong>周五</strong></td>
			<td align="center" ><strong>周六</strong></td>
		</tr>					
	</table>
	</div>
	<ul class="sign_log_items">
		<?php 
					$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
					$maxday = date("t",$timestamp);
					$thismonth = getdate($timestamp);
					$startday = $thismonth['wday'];
					for ($i=0; $i<($maxday+$startday); $i++) {    				
    					if($i < $startday){ 
							echo "<li class='sign_icons exclude'></li>";
    					}else{
							$sep_day=(($i - $startday + 1)==$cDay); 
							
							echo "<li class=\"sign_icons ".($sep_day?"h":"")."\"><p><a href=\"/admin/regstat/day?year=".$cYear."&month=".$cMonth."&day=".($i - $startday + 1)."\"> ". ($i - $startday + 1) ."</a></p></li>";};    				
					}
					?>								
	</ul>
</div>	



