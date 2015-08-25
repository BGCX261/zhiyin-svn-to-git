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

<form class="form-horizontal" id="J_Auth" method="post" action="/produce/materialPurchases/create">

	    <div class="control-group">
	        <label class="control-label" for="materialPurchase_no">采购单号</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="materialPurchase_no" id="materialPurchase_no" value="<?php echo $materialPurchase_no;?>" readonly required>
	        </div>
	    </div>
	    <div class="clearfix"></div>
	    	
	    <div class="control-group">
	        <label class="control-label" for="supplier_name">供货商名称</label>
	        <div class="controls">
	            <input type="text" class="input-xlarge" name="supplier_name" id="supplier_name" required><a href="javascript:;" onclick="" id="sel_supplier">+添加</a>
	            <input type="hidden" id="supplier_id" name="supplier_id" value="0">
	        </div>
	    </div>
	    <div class="clearfix"></div>
	    
	    <div class="control-group fl">
	        <label class="control-label" for="material_name">物料名称</label>
	        <div class="controls">
	            <input type="text" class="input-xlarge" name="material_name" id="material_name" value="<?php echo $material_name;?>" required><a href="javascript:;" onclick="" id="sel_material">+添加</a>
	            <input type="hidden" id="material_id" name="material_id" value="<?php echo $material_id;?>">
	        </div>
	    </div>  
	    <div class="clearfix"></div>   
	     
	    <div class="control-group">
	        <label class="control-label" for="purchase_much">采购数量</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="purchase_much" id="purchase_much" number="true" >            
	        </div>
	    </div>  
	    
	    <div class="control-group">
	        <label class="control-label" for="unit_price">单价</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="unit_price" id="unit_price"  number="true" >            
	        </div>
	    </div>     
	    
	    <div class="control-group">
	        <label class="control-label" for="ship_date">交货日期</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="ship_date" id="ship_date" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:false});" date="true">            
	        </div>
	    </div>  
	    
	    <div class="control-group">
	        <label class="control-label" for="money">金额</label>
	        <div class="controls">
	            <input type="text" class="input-medium" name="money" id="money" number="true" >
	        </div>
	    </div>    
	    

	    
	    <div class="clearfix"></div>   
	    
	    <div class="control-group fl">
	        <label class="control-label" for="quality_note">质量要求</label>
	        <div class="controls">
	        	<textarea name="quality_note" class="input-xxlarge"></textarea>
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

<?php $this->load->view('produce/pop_sel_supplier.php');?>

<?php $this->load->view('produce/pop_sel_material.php');?>
	
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
	$(".sel-supplier-link").on('click',  function() {
		//var materialId=$(this).data('materialId');
		//$("#materialId").addClass("loading");
		//alert(materialId);
		//$("#"+materialId).removeClass("selected");
	});		
});    



  
</script>