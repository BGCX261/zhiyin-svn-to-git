<link rel="stylesheet" href="/css/dpl/forms-min.css">
<link rel="stylesheet" href="/css/button/assets/dpl-min.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">

<form class="form-horizontal" id="J_Auth" method="post" action="/baseinfo/materials/edit">
	<input type="hidden" name="id" value="<?php echo $material['id']?>">
	
    <div class="control-group">
        <label class="control-label" for="name">物料名称</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="name" id="name" value="<?php echo $material['name']?>" required>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="group">物料组</label>
        <div class="controls">
            <select name="group" id="group" style="width:280px;">
            <?php foreach ($groups as $k=>$v){?>
            	<option value="<?php echo $v['id']?>" <?php echo ($v['id']==$material['group_id'])?'selected':''?> ><?php echo $v['name']?></option>
            <?php }?>
            	
            </select>
        </div>
    </div>  
       
    <div class="control-group">
        <label class="control-label" for="guige">规格</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="guige" id="guige" value="<?php echo $material['guige']?>">            
        </div>
    </div>  
      
    <div class="control-group">
        <label class="control-label" for="unit">单位</label>
        <div class="controls">
            <input type="text" class="input-xsmall" name="unit" id="unit" placeholder="张" value="<?php echo $material['unit']?>">
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="unit_price">单价</label>
        <div class="controls">
            <input type="text" class="input-xsmall" name="unit_price" id="unit_price" value="<?php echo $material['unit_price']?>" number="true">
        </div>
    </div>        
    
    <div class="control-group">
        <label class="control-label" for="supplier">供货商</label>
        <div class="controls">
            <select name="supplier" id="supplier" style="width:280px;">
            	<option value="0">选择供货商</option>
            <?php foreach ($suppliers as $k=>$v){?>
            	<option value="<?php echo $v['id']?>" <?php echo ($v['id']==$material['supplier_id'])?'selected':''?> ><?php echo $v['name']?></option>
            <?php }?>
            	
            </select>
        </div>
    </div>  
    
    
    <div class="control-group">
        <label class="control-label" for="current_store">当前库存</label>
        <div class="controls">
            <input type="text" class="input-xsmall" name="current_store" id="current_store"  value="<?php echo $material['current_store']; ?>" number="true" required>
        </div>
    </div>      
    
    
    <div class="control-group">
        <label class="control-label" for="low_store_alert">库存告警值</label>
        <div class="controls">
            <input type="text" class="input-xsmall" name="low_store_alert" id="low_store_alert" placeholder="库存低于此值是告警" value="<?php echo $material['low_store_alert']; ?>" number="true" required>
        </div>
    </div>  
           
  
    <div class="form-actions">
        <input class="ks-button ks-button-primary ks-button-shown" type="submit" value="提交">
    </div>
</form>

	
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
</script>