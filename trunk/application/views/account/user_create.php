<link rel="stylesheet" href="/css/dpl/forms-min.css">
<link rel="stylesheet" href="/css/button/assets/dpl-min.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">

<form class="form-horizontal" id="J_Auth" method="post" action="/account/users/create">
    <div class="control-group">
        <label class="control-label" for="username">用户名</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="username" id="username" required>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="password">密码</label>
        <div class="controls">
            <input type="password" class="input-xlarge" name="password" id="password" required>
        </div>
    </div>  
    

    
    <div class="control-group">
        <label class="control-label" for="email">邮箱</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="email" id="email" email="true" >            
        </div>
    </div>     
    
    
    <div class="control-group">
        <label class="control-label" for="group">用户组</label>
        <div class="controls">
            <select name="group">
            	<option value="0">普通用户</option>
            	<option value="9">管理员用户</option>
            </select>
        </div>
    </div>    
    
    <div class="control-group">
        <label class="control-label" for="status">状态</label>
        <div class="controls">
            <select name="status">
            	<option value="1">正常</option>
            	<option value="0">禁用</option>
            </select>
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