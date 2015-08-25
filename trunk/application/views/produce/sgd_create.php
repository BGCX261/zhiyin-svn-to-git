<script src="/js/My97DatePicker/WdatePicker.js"></script>
<link rel="stylesheet" href="/css/dpl/forms-min.css">
<link rel="stylesheet" href="/css/button/assets/dpl-min.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">
<style>
.form-horizontal{
	width:1000px;
}

.form-horizontal .control-group{
	width:400px;
	float:left;
}

.form-horizontal .control-group .control-label{
	width:80px;
}

.form-horizontal .controls {
margin-left: 85px;
}

</style>

<form class="form-horizontal" id="J_Auth" method="post" action="/produce/sgds/create">

	    <div class="control-group">
	        <label class="control-label" for="sgd_no">工单号</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="sgd_no" id="sgd_no" value="<?php echo $sgd_no;?>" readonly required>
	        </div>
	    </div>
	    
	    <div class="control-group">
	        <label class="control-label" for="manual_no">手工单号</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="manual_no" id="manual_no">
	        </div>
	    </div>	    
	
	    <div class="control-group">
	        <label class="control-label" for="customer_name">客户名称</label>
	        <div class="controls">
	            <input type="text" class="input-xlarge" name="customer_name" id="customer_name" required><a href="javascript:;" onclick="" id="sel_customer">+添加</a>
	            <input type="hidden" id="customer_id" name="customer_id" value="0">
	        </div>
	    </div>
	    <div class="clearfix"></div>
	    
	    <div class="control-group fl">
	        <label class="control-label" for="product_name">印件名称</label>
	        <div class="controls">
	            <input type="text" class="input-xlarge" name="product_name" id="product_name" required><a href="javascript:;" onclick="" id="sel_product">+添加</a>
	            <input type="hidden" id="product_id" name="product_id" value="0">
	        </div>
	    </div>  
	    <div class="clearfix"></div>   
	     
	    <div class="control-group">
	        <label class="control-label" for="need_number">订单数量</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="need_number" id="need_number" number="true" >            
	        </div>
	    </div>  
	    
	    <div class="control-group">
	        <label class="control-label" for="produce_number">投产数量</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="produce_number" id="produce_number">            
	        </div>
	    </div>     
	    
	    <div class="control-group">
	        <label class="control-label" for="ship_date">交货日期</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="ship_date" id="ship_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:false});" date="true">            
	        </div>
	    </div>  
	    
	    <div class="control-group">
	        <label class="control-label" for="unit_price">印件单价</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="unit_price" id="unit_price" >
	        </div>
	    </div>    
	    
	    <div class="control-group">
	        <label class="control-label" for="money">金额</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="money" id="money" >
	        </div>
	    </div>   
	    
	    <div class="clearfix"></div>   
	    
	    <div class="control-group fl">
	        <label class="control-label" for="note">备注</label>
	        <div class="controls">
	        	<textarea name="note" class="input-xxlarge"></textarea>
	        </div>
	    </div>  
	    <div class="clearfix"></div>   
	           
	  
	    <div class="form-actions">
	        <input class="ks-button ks-button-primary ks-button-shown" type="submit" value="提交">
	    </div>
</form>

<?php $this->load->view('produce/pop_sel_customer.php');?>

<?php $this->load->view('produce/pop_sel_product.php');?>
	
<script>
    var S = KISSY;
        var srcPath = "/js/lib/kissy/";
        S.config({
            packages:[
                {
                    name: "gallery/auth",
                    path: srcPath,
                    charset: "utf-8",
                    ignorePackageNameInUri: false
                }
            ]
        });
    S.use('gallery/auth/1.5/,gallery/auth/1.5/lib/msg/style.css', function (S, Auth) {
        var auth = new Auth('#J_Auth');
        auth.render();
    })
    
$(document).ready(function(){ 		
	$(".sel-customer-link").on('click',  function() {
		//var materialId=$(this).data('materialId');
		//$("#materialId").addClass("loading");
		//alert(materialId);
		//$("#"+materialId).removeClass("selected");
	});		
});    



  
</script>