<link rel="stylesheet" href="/css/dpl/forms-min.css">
<link rel="stylesheet" href="/css/button/assets/dpl-min.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">
<link rel="stylesheet" href="/css/overlay/pop.css" type="text/css" />

<script src="/js/lib/dhx/tree_codebase/dhtmlxcommon.js"></script>
<script src="/js/lib/dhx/tree_codebase/dhtmlxtree.js"></script>
<script src="/js/lib/dhx/tree_codebase/ext/dhtmlxtree_json.js"></script>
<link rel="stylesheet" type="text/css" href="/js/lib/dhx/tree_codebase/dhtmlxtree.css">

<script type="text/javascript" src="/js/overlay/jquery.myblock.js"></script>
<script type="text/javascript" src="/js/overlay/mask.pop.js"></script>

<script src="/js/My97DatePicker/WdatePicker.js"></script>

<form class="form-horizontal" id="J_Auth" method="post" action="/baseinfo/employees/create">
    <div class="control-group">
        <label class="control-label" for="name">员工名称</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="name" id="name" required>
        </div>
    </div>
    
    <div class="control-group">
        <label class="control-label" for="deptName">所在部门</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="deptName" id="deptName" required readonly>&nbsp;&nbsp;<a href="javascript:void(0);" onClick="selectDept();">选择部门</a>
            <input type="hidden"  name="dept_id" id="dept_id" >
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="position">职务</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="position" id="position" >
        </div>
    </div>     
    
    <div class="control-group">
        <label class="control-label" for="enterday">入职时间</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="enterday" id="enterday" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:false});" date="true">            
        </div>
    </div> 
    
    <div class="control-group">
        <label class="control-label" for="mobile">手机号码</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="mobile" id="mobile" mobile="true" >            
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="telephone">电话号码</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="telephone" id="telephone"  >            
        </div>
    </div>   
    
    <div class="control-group">
        <label class="control-label" for="birthday">生日</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="birthday" id="birthday" onclick="WdatePicker({dateFmt:'yyyy-MM-dd',alwaysUseStartDate:false});" date="true">            
        </div>
    </div>      
    
    <div class="control-group">
        <label class="control-label" for="idcard">身份证</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="idcard" id="idcard">            
        </div>
    </div>  
    
    <div class="control-group">
        <label class="control-label" for="graduateschool">毕业学校</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="graduateschool" id="graduateschool">            
        </div>
    </div> 
    
    <div class="control-group">
        <label class="control-label" for="education">学历</label>
        <div class="controls"> 
            <select name="education">
            	<option value="">请选择</option>
            	<option value="博士">博士</option>
            	<option value="硕士">硕士</option>
            	<option value="本科">本科</option>
            	<option value="大专">大专</option>
            	<option value="职高">职高</option>
            	<option value="高中">高中</option>
            	<option value="初中">初中</option>            
            </select>
        </div>
    </div>     
      
    <div class="control-group">
        <label class="control-label" for="address">地址</label>
        <div class="controls">
            <input type="text" class="input-xlarge" name="address" id="address" >
        </div>
    </div>    
    
    <div class="control-group">
        <label class="control-label" for="zipcode">邮编</label>
        <div class="controls">
            <input type="text" class="input-xsmall" name="zipcode" id="zipcode" >
        </div>
    </div>        
           
  
    <div class="form-actions">
        <input class="ks-button ks-button-primary ks-button-shown" type="submit" value="提交">
    </div>
</form>


<div id="selectDeptPopBox" class="ng_block" style="display:none; position:relative; width: 500px;">
		<div class="hd"><h3>选择部门</h3></div>
		<div class="bd">
			<div class="normal" style="padding:0px 0px;">
				<div id="treeboxbox_dept_tree" style="width: 450px; height: 500px; background-color: #ffffff; border: 1px solid Silver;; overflow: auto;"></div>			
			</div>			
		</div>
		<div class="ft">
			  <!--  <div class="buttons"><button onclick="addDept();">确定</button></div>-->
			  <a href="#" onclick="return false" title="关闭此窗口" class="btn-close" >×</a>
		</div>
</div>

<script src="/js/baseinfo/employee.js"></script>
<script>
  
</script>