<link rel="stylesheet" href="/css/admin/left.css" type="text/css" />
<style>
.menu-list {
	width: 120px;
	margin: 0px 0px 10px 0px;
}

.menu-list h2 {
	height: 28px;
	/* text-indent: -999em; */
	overflow: hidden;
	cursor: pointer;
	line-height:28px;
	text-align:center;
	background: transparent url(/images/tps/i1/bg_thead_grade.png) repeat-x scroll 0 0;
	border-top: 1px solid #aec7e5;
	border-bottom: 1px solid #aec7e5;
		
}

.menu-list h2 {

	/* background-image:url(http://images.51wan.com/v2/toolbar/images/s1/title.jpg); */
	/* background-repeat: no-repeat; */
}

.menu-list .menu {

	background:#D8EFF1;
}

.menu-bd dd{
	height:30px;
	line-height:30px;
	text-align:center;
}

</style>
<div class="ng-user-cneter-left-nav" style="float: left; width: 120px; margin-left: -100%; background: white; height: 600px;border-right: 1px solid #aec7e5;">
	<ol class="menu-list">
		<li class="model-box system" data-ifshow="false">
			<h2>
				<a href="javascript:;" target="_blank">系统设置</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd>
						<a href="/account/users">用户管理</a>
					</dd>

					<dd>
						<a href="/account/roles">权限管理</a>
					</dd>
					<!-- 
					<dd>
						<a href="/account/changepwd">权限职能组</a>
					</dd>
					<dd>
						<a href="/account/changepwd">修改密码</a>
					</dd>
					 -->
										
				</dl>
			</div>
		</li>
		<li class="model-box baseinfo" data-ifshow="true">
			<h2>
				<a href="javascript:;" target="_blank">基础信息</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd>
						<a href="/baseinfo/customers">客户列表</a>
					</dd>
					<dd>
						<a href="/baseinfo/suppliers">供应商列表</a>
					</dd>
					<dd>
						<a href="/baseinfo/materials">物料列表</a>
					</dd>
					<dd>
						<a href="/baseinfo/products">印件列表</a>
					</dd>					
					<dd>
						<a href="/baseinfo/departments">部门管理</a>
					</dd>					
					<dd>
						<a href="/baseinfo/employees">职员列表</a>
					</dd>

					<dd>
						<a href="/baseinfo/guiges">常用规格</a>
					</dd>
					<!--  
					<dd>
						<a href="/baseinfo/process">工序列表</a>
					</dd>
					<dd>
						<a href="/baseinfo/payreqs">付款条件列表</a>
					</dd>
					<dd>
						<a href="/baseinfo/equipments">生产设备列表</a>
					</dd>
					-->					
				</dl>
			</div>
		</li>



		
		<li class="model-box produce" data-ifshow="false">
			<h2>
				<a href="javascript:;" target="_blank">生产管理</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd class="">
						<a href="/produce/sgds">施工单</a>
					</dd>
					<dd>
						<a href="/produce/materialPurchases">物料采购</a>
					</dd>						
					<dd>
						<a href="/produce/">未领料清单</a>
					</dd>					
				</dl>
			</div>
		</li>	
		
		<li class="model-box weiqin" data-ifshow="false">
			<h2>
				<a href="javascript:;" target="_blank">未清事项</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd>
						<a href="#">未到采购物料</a>
					</dd>
					
					<dd>
						<a href="#">未领料清单</a>
					</dd>					
				</dl>
			</div>
		</li>		
		
		<li class="model-box caiwu" data-ifshow="false">
			<h2>
				<a href="javascript:;" target="_blank">财务报表</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd>
						<a href="#">应收账款</a>
					</dd>					
					<dd>
						<a href="#">应付账款</a>
					</dd>					
				</dl>
			</div>
		</li>
		
		<li class="model-box report" data-ifshow="false">
			<h2>
				<a href="javascript:;" target="_blank">库存报表</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd>
						<a href="#">采购订单明细</a>
					</dd>					
					<dd>
						<a href="#">采购入库明细</a>
					</dd>					
				</dl>
			</div>
		</li>
		
		<li class="model-box salary" data-ifshow="false">
			<h2>
				<a href="javascript:;" target="_blank">工资管理</a>
			</h2>
			<div class="menu" style="display: none;">
				<dl class="menu-bd">
					<dd>
						<a href="#">月工资</a>
					</dd>					
					
				</dl>
			</div>
		</li>								
	</ol>


</div>



<script>
$(document).ready(function(){ 
	var nav_module = <?php echo isset($gnav['module'])?('"'.$gnav['module'].'"'):'n/v';?>;
	var nav_item = <?php echo isset($gnav['item'])?('"'.$gnav['item'].'"'):'n/v';?>;

	if(nav_module != 'n/v'){
		$("."+nav_module).find(".menu").show();
	}
	/*
	$('.model-box').each(function() {
	    alert( $(this).data('ifshow') );
	    if($(this).data('ifshow')){
	    	$(this).find(".menu").show();
	    }
	});
	*/
	
}); 

$(".model-box h2").click(function() {
	$(".model-box .menu").hide();
	$(this).siblings(".menu").show();
});
</script>
