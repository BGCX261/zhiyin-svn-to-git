<style>
.shotcut-action-items {
	width: 800px;
	height: 500px;
	margin: 0px auto;
	position: relative;
	border: 0px solid gray;
	background:url("/images/tps/i1/flow.jpg") no-repeat;
}

.shotcut-action-item {
	width: 100px;
	height: 100px;
	position: absolute;
	border: 1px solid transparent;
	
}

.shotcut-action-item-hover {
	border: 1px dashed gray;
	background:#eee2d7;
}



.shotcut-action-item .tip_box {
	width: 30px;
	height: 30px;
	top: -15px;
	right: -15px;
	position: absolute;
	background: transparent;
	display:;	
}

.shotcut-action-item .tip_box_h{

	background-image: url(/images/tps/i1/needpurchase.gif);
  	background-color: red;
  	background-repeat: no-repeat;
  	background-position:center;
}

.shotcut-action-item a {
	text-decoration: none;
	color: #4d4d4d;
	outline: none;
}



.shotcut-action-item span.app-icon {
	width: 100px;
	height: 70px;
	padding-top: 0;
	text-indent: -9999px;


	margin: 0 auto;
	display: block;
	overflow: hidden;
}

.shotcut-action-item span {
	display: block;
	padding-top: 5px;
	text-decoration: none;
	text-align: center;
	font-size:14px;
}

.app-icon-sgd {
	background-image: url("/images/tps/i1/sgd.jpg");
	background-size: cover;
}

.app-icon-wlxq{
	background-image: url("/images/tps/i1/wlxq.jpg");
	background-size: cover;
}
.app-icon-cgdd{
	background-image: url("/images/tps/i1/cgd2.jpg");
	background-size: cover;
}

.app-icon-cgrk{
	background-image: url("/images/tps/i1/cgrk.jpg");
	background-size: cover;
}

.app-icon-fkd{
	background-image: url("/images/tps/i1/fkd.jpg");
	background-size: cover;
}

.app-icon-clkc{
	background-image: url("/images/tps/i1/clkc.jpg");
	background-size: cover;
}

.app-icon-scll{
	background-image: url("/images/tps/i1/scll.jpg");
	background-size: cover;
}
.app-icon-skd{
	background-image: url("/images/tps/i1/skd.jpg");
	background-size: cover;
}
.app-icon-shdlb{
	background-image: url("/images/tps/i1/shdlb.jpg");
	background-size: cover;
}
.app-icon-shd{
	background-image: url("/images/tps/i1/shd.jpg");
	background-size: cover;
}


</style>
<div class="shotcut-action-items">

	<div class="shotcut-action-item" style="left:0px;top:250px;">
		<div class="tip_box"></div>
		<a class="" href="/produce/sgds/create">
			<span class="app-icon app-icon-sgd">施工单</span>
			<span>施工单</span>
		</a>
	</div>
		
	<div class="shotcut-action-item" style="left:180px;top:150px;">
	
		<div class="tip_box <?php echo $hasLowMaterial?'tip_box_h':'';?>" id="material_need_tip"></div>
		<a class="" href="/baseinfo/materials/notEnough4SgdList">
			<span class="app-icon app-icon-wlxq">物料需求</span>
			<span>物料需求</span>
		</a>	
	</div>
	
	<div class="shotcut-action-item" style="left:330px;top:150px;">
	
		<div class="tip_box"></div>
		<a class="" href="/produce/MaterialPurchases/create">
			<span class="app-icon app-icon-cgdd">采购订单</span>
			<span>采购订单</span>
		</a>	
	</div>
	
	<div class="shotcut-action-item" style="left:480px;top:150px;">
	
		<div class="tip_box"></div>
		<a class="" href="/produce/MaterialPurchases">
			<span class="app-icon app-icon-cgrk">采购入库</span>
			<span>采购入库</span>
		</a>	
	</div>
	
	<div class="shotcut-action-item" style="left:480px;top:0px;">
	
		<div class="tip_box"></div>
		<a class="" href="javascript:;">
			<span class="app-icon app-icon-fkd">付款单</span>
			<span>付款单</span>
		</a>	
	</div>
	
	
	
	<div class="shotcut-action-item" style="left:180px;top:350px;">
	
		<div class="tip_box"></div>
		<a class="" href="javascript:;">
			<span class="app-icon app-icon-shdlb">待送货列表</span>
			<span>待送货列表</span>
		</a>	
	</div>
	
	<div class="shotcut-action-item" style="left:330px;top:350px;">
	
		<div class="tip_box"></div>
		<a class="" href="javascript:;">
			<span class="app-icon app-icon-shd">送货单</span>
			<span>送货单</span>
		</a>	
	</div>
	
	<div class="shotcut-action-item" style="left:480px;top:350px;">
	
		<div class="tip_box"></div>
		<a class="" href="javascript:;">
			<span class="app-icon app-icon-skd">收款单</span>
			<span>收款单</span>
		</a>	
	</div>	
	
	
	
	
	<div class="shotcut-action-item" style="left:660px;top:80px;">
	
		<div class="tip_box"></div>
		<a class="" href="/baseinfo/materials">
			<span class="app-icon app-icon-clkc">材料库存</span>
			<span>材料库存</span>
		</a>	
	</div>
	
	<div class="shotcut-action-item" style="left:660px;top:220px;">
	
		<div class="tip_box"></div>
		<a class="" href="javascript:;">
			<span class="app-icon app-icon-scll">生产领料</span>
			<span>生产领料</span>
		</a>	
	</div>
	
</div>	







<script type="text/javascript" src="http://kf.97ng.com/js/ngc/game/hot_p3_game.js"></script>
<script type="text/javascript" src="http://www.97ng.com/js/ngc/game/award_active.js"></script>
<script type="text/javascript" src="http://www.97ng.com/js/ngc/game/all_game.js"></script>
<script type="text/javascript">

$(document).ready(function(){ 
	$(".shotcut-action-item").hover(function() {
		$(this).toggleClass("shotcut-action-item-hover");
	});
}); 

			KISSY.use('ngc/game/hot-p3-game', function(S, HotP3Game){
			    S.ready(function(S){
			       new HotP3Game();			        
			    });
			});	
			KISSY.use('ngc/game/award-active', function(S, AwardActive){
			    S.ready(function(S){
			       new AwardActive();			        
			    });
			});	

			KISSY.use('ngc/game/all-game', function(S, AllGame){
			    S.ready(function(S){
			      new AllGame();			        
			    });
			});									
</script>
