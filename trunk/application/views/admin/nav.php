<div class="ng-user-cneter-left-nav">

	<div class="user_menu">
		<dl>
			<dt>
				<span class="l_m5"></span>审核操作
			</dt>
			<dd>
				<ul>
					<li <?php echo $select['check_post_todo'];?>><a href="/admin/checkpost/todo">待审核</a></li>
					<li <?php echo $select['check_post_passed'];?>><a href="/admin/checkpost/passed">已审核</a></li>
				</ul>
			</dd>
			<!--  
			<dt>
				<span class="l_m1"></span>跳转统计
			</dt>
			<dd>
				<ul>
					<li <?php echo $select['jump_state_day'];?>><a href="/admin/jumpstat/day">按日期</a></li>
					<li <?php echo $select['jump_state_month'];?>><a href="/admin/jumpstat/month">按月份</a></li>
					<li <?php echo $select['jump_state_year'];?>><a href="/admin/jumpstat/year">按年份</a></li>
				</ul>
			</dd>	
			-->
			
			<dt>
				<span class="l_m1"></span>注册统计
			</dt>
			<dd>
				<ul>
					<li <?php echo $select['reg_state_day'];?>><a href="/admin/regstat/day">按日期</a></li>
					<!--  
					<li <?php echo $select['reg_state_month'];?>><a href="/admin/regstat/month">按月份</a></li>
					<li <?php echo $select['reg_state_year'];?>><a href="/admin/regstat/year">按年份</a></li>
					-->
					<li <?php echo $select['reg_state_period'];?>><a href="/admin/regstat/period">按时间段</a></li>
				</ul>
			</dd>	
			
			<dt>
				<span class="l_m3"></span>收入统计
			</dt>
			<dd>
				<ul>
					<li <?php echo $select['income_state_day'];?>><a href="/admin/incomestat/day">按日期</a></li>
					<!--  
					<li <?php echo $select['income_state_month'];?>><a href="/admin/incomestat/month">按月份</a></li>
					<li <?php echo $select['income_state_year'];?>><a href="/admin/incomestat/year">按年份</a></li>
					-->
					<li <?php echo $select['income_state_period'];?>><a href="/admin/incomestat/period">按时间段</a></li>
				</ul>
			</dd>			
		</dl>
	</div>

</div>
