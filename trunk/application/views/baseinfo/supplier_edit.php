<link rel="stylesheet" href="/css/dpl/forms-min.css">
<link rel="stylesheet" href="/css/button/assets/dpl-min.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">

<form class="form-horizontal" id="J_Auth" method="post" action="/baseinfo/suppliers/edit">
	<input type="hidden" name="id" value="<?php echo $supplier['id']?>">
    <div class="control-group">
        <label class="control-label" for="name">供应商名称</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="name" id="name" value="<?php echo $supplier['name']?>" required>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="contact">联系人</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="contact" id="contact" value="<?php echo $supplier['contact']?>">
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="mobile">手机号码</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="mobile" id="mobile" mobile="true" value="<?php echo $supplier['mobile']?>">            
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="phone">电话号码</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="phone" id="phone" value="<?php echo $supplier['phone']?>" >            
        </div>
    </div>     
    
    <div class="control-group">
        <label class="control-label" for="fax">传真</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="fax" id="fax" value="<?php echo $supplier['fax']?>">            
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="addr">地址</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="addr" id="addr" value="<?php echo $supplier['addr']?>">
        </div>
    </div>    
    
    <div class="control-group">
        <label class="control-label" for="zipcode">邮编</label>
        <div class="controls">
            <input type="text" class="input-xsmall" name="zipcode" id="zipcode" value="<?php echo $supplier['zipcode']?>">
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