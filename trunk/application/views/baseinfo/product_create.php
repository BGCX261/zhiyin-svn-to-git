<link rel="stylesheet" href="/css/dpl/forms-min.css">
<link rel="stylesheet" href="/css/button/assets/dpl-min.css3">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">

<style>


#selected-material-list .selected-material-item {
	clear:both;
	height:30px;
}

#selected-material-list .selected-material-item span{
	float: left;
	margin-right:20px;
}

#selected-material-list .selected-material-item input{
	float: left;
	margin-right:20px;
}

a.material-del {
	background: url("https://img.alipay.com/img/jz/delete.png") no-repeat scroll 0 0 transparent;
	display: block;
	float: left;
	height: 20px;
	margin-left: 15px;
	margin-top: 6px;
	position: relative;
	width: 20px;
}

.material-list{

}
.material-list .vid {
	float: left;
	_display: inline;
	padding: 3px 0 0 20px;
	height: 24px;
	white-space: nowrap;
	width: 115px;
}

.material-list  .pro-wrapper {
	float: left;
	max-width: 112px;
	_width: 112px;
}

.material-list .vid .m-checkbox {
	float: left;
	_display: inline;
	margin: 5px 2px 0;
	width: 12px;
	height: 12px;
	font-size: 0;
	background: url(http://img02.taobaocdn.com/tps/i2/T1inxNXAdbXXa0_6.A-70-800.png) 0 -195px no-repeat;
}

.material-list .vid-135 .vid .text {
	max-width: 94px;
	_width: 94px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}
.material-list .vid .text {
	float: left;
	text-align: left;
	cursor: pointer;
	padding: 0 0 0 2px;
}

.material-list .selected .m-checkbox {
	background-image: url(http://img02.taobaocdn.com/tps/i2/T1Py76XlXjXXX6wAPS-39-250.png);
}
.material-list .selected  .m-checkbox {
	background-position: 0 -210px;
}
</style>

<form class="form-horizontal" id="J_Auth" method="post" action="/baseinfo/products/create">
    <div class="control-group">
        <label class="control-label" for="name">印件名称</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="name" id="name" required>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="guige">规格</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="guige" id="guige" >
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="note">备注</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="note" id="note">            
        </div>
    </div>  
      
    <div class="control-group">
        <label class="control-label" for="note">此印件所需物料</label>
        <div class="controls">
        	<!--  <div><span style="display: inline-block;width:300px;">印件名称</span><span style="display: inline-block;width:250px;">单个印件所需物料数量</span><span style="display: inline-block;width:50px;">操作</span></div>-->
        	<div id="selected-material-list">

			</div>
			<!-- <a href="javascript:;" id="add-more" class="add-more">+添加物料</a>    -->
            <div class="material-list vid-135" style="zoom:1;overflow:hidden;clear:both; border:1px solid gray;margin-top:20px">
            <?php if (!count($materials)){?>
            <?php 
				}else{
            		foreach ($materials as $k => $v){
            ?>
            	<a class="J_Ajax vid" id="material_<?php echo $v['id']?>" data-id="<?php echo $v['id']?>" data-name="<?php echo $v['name']?>" href="#" title="<?php echo $v['name']?>" data-selected="0">
					<span class="pro-wrapper"><i class="m-checkbox"></i><span class="text"><?php echo $v['name']?></span></span>
				</a>
            
            <?php }}?>
			</div> 
        </div>
    </div>     
       
    <div class="form-actions">
        <input class="ks-button ks-button-primary ks-button-shown" type="submit" value="提交">
    </div>
</form>

<style>


</style>

<script>
	function delMaterial(materialId){
		//alert(materialId);
		$("#material_"+materialId).removeClass("selected");
		$("#material_"+materialId).data('selected',0);
		$("#selected-material-item-"+materialId).remove();
		
		
	}

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
	$(".material-list .vid").click(function() {
		if($(this).data('selected') == 0){
			$(this).addClass("selected");
			$(this).data('selected',1);
			var text = [
		        		'<div id="selected-material-item-'+$(this).data('id')+'" class="selected-material-item">',
		        		'<span>'+$(this).data('name')+'</span>',
		        		'<input type="text" class="input-small" name="materials['+$(this).data('id')+']" id="material-num-'+$(this).data('id')+'" required number="true">',
		        		'<a href="#" onclick="delMaterial('+$(this).data('id')+');" class="material-del" data-materialId="'+$(this).data('id')+'" title="删除"></a>',
		        		'</div>'
		        		].join("");
			$("#selected-material-list").append(text);			
		}else{
						
		}				
	});



	$(".material-del").on('click',  function() {
		alert("");
		var materialId=$(this).data('materialId');
		//$("#materialId").addClass("loading");
		alert(materialId);
		$("#"+materialId).removeClass("selected");
	});


	$(".add-more").click(function() {
		$("#material-select-box").addClass("loading");
		$("#material-select-box").load('/baseinfo/materials/queryByAjaxHtml', {},function(){$("#material-select-box").removeClass("loading");});	
		$("#overlay-container-1").show();		
		/*
		var type = 1;
		var exclude = 1;
        $.ajax({
            type: "GET",
            url: "/baseinfo/materials/queryJson",
            dataType: 'json',
            data : {type:type,exclude:exclude},
            success: function(redata){ 
            	jQuery.each(redata, function(i, val) {
            		  //$("#" + i).append(document.createTextNode(" - " + val));
          		 		 alert(val.name);
            		});              
            }
        })	
        */
	});
});     
</script>

