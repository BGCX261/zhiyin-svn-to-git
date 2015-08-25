<script src="/js/lib/dhx/tree_codebase/dhtmlxcommon.js"></script>
<script src="/js/lib/dhx/tree_codebase/dhtmlxtree.js"></script>
<script src="/js/lib/dhx/tree_codebase/ext/dhtmlxtree_json.js"></script>
<link rel="stylesheet" type="text/css" href="/js/lib/dhx/tree_codebase/dhtmlxtree.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">
<link rel="stylesheet" href="/css/overlay/pop.css" type="text/css" />

<script type="text/javascript" src="/js/overlay/jquery.myblock.js"></script>
<script type="text/javascript" src="/js/overlay/mask.pop.js"></script>

<div style="width:700px; margin:20px auto;background:;">
	<div style="height:30px;line-height:30px;background:#c2d5dc;width:672px;">
		<div style="float:left;width:200px;margin-left:5px;">
			<a href="javascript:void(0);" onClick="dept_tree.openAllItems(0);">展开</a> 
			<a href="javascript:void(0);" onClick="dept_tree.closeAllItems(0);">收缩</a>
		</div>
		<div style="float:right;">
		<a href="javascript:void(0);" onClick="showAddBox();">添加</a>&nbsp; 
		<a href="javascript:void(0);" onClick="showRenameBox();">重命名</a> &nbsp;
		<a href="javascript:void(0);" onClick="showDelConfirmBox();">删除</a> &nbsp;
		</div>
	</div>
	<div style="width: 670px; float:left;">
		<div id="treeboxbox_dept_tree" style="width: 100%; height: 500px; background-color: #ffffff; border: 1px solid Silver;; overflow: auto;"></div>
	</div>
	<div style="float:right;">
		<a href="javascript:;" onClick="updown('up');" title="上移"><img src="/images/tps/i1/up.png" alt=""></a><br><br>
		<a href="javascript:;" onClick="updown('down');" title="下移"><img src="/images/tps/i1/down.png" alt=""></a>
	</div>
</div>


<div id="addDeptPopBox" class="ng_block" style="display:none; position:relative; width: 500px;">
		<div class="hd"><h3>添加部门</h3></div>
		<!--  <a href="#" onclick="return false" class="ng_block_closer">×</a>-->
		<div class="bd">
			<div class="normal" style="padding:30px 0px;">
				<div class="i-item item-name" id="J_ItemName">
					<span class="item-label">部门名称：<i>*</i></span> 
					<input name="name" placeholder="请输入部门名" class="i-text" id="J_Name" type="text" value="">
					<div class="msg hide" id="J_MsgName">
						<i></i>
						<div class="msg-cnt"></div>
					</div>
				</div>	
				<div class="i-item item-name" id="J_ItemName">
					<span class="item-label">添加到选中部门的：<i>*</i></span> 
					<input name="addto" type="radio" value="next" checked/>同级部门&nbsp;&nbsp;<input name="addto" type="radio" value="sub" />下级部门
				</div>				
			</div>			
		</div>
		<div class="ft">
			  <div class="buttons"><button onclick="addDept();">确定</button></div>
			  <a href="#" onclick="return false" title="关闭此窗口" class="btn-close" >×</a>
		</div>
</div>

<div id="renameDeptPopBox" class="ng_block" style="display:none; position:relative; width: 500px;">
		<div class="hd"><h3>重命名部门</h3></div>
		<!--  <a href="#" onclick="return false" class="ng_block_closer">×</a>-->
		<div class="bd">
			<div class="normal" style="padding:30px 0px;">
				<div class="i-item item-name" id="J_ItemName">
					<span class="item-label">部门名称：<i>*</i></span> 
					<input name="rename" class="i-text" id="J_ReName" type="text" value="">
					<div class="msg hide" id="J_MsgReName">
						<i></i>
						<div class="msg-cnt"></div>
					</div>
				</div>					
			</div>			
		</div>
		<div class="ft">
			  <div class="buttons"><button onclick="renameDept();">确定</button></div>
			  <a href="#" onclick="return false" title="关闭此窗口" class="btn-close" >×</a>
		</div>
</div>

<div id="deleteDeptPopBox" class="ng_block" style="display:none; position:relative; width: 500px;">
		<div class="hd"><h3>提示</h3></div>
		<!--  <a href="#" onclick="return false" class="ng_block_closer">×</a>-->
		<div class="bd">
			<div class="normal" style="padding:30px 0px;">
				<p>您确定要删除<span class="h" id="deleteDeptNameBox"></span>吗?</p>	
					<div class="msg hide" id="J_MsgDel">
						<i></i>
						<div class="msg-cnt"></div>
					</div>							
			</div>			
		</div>
		<div class="ft">
			  <div class="buttons"><button onclick="deleteDept();">确定</button></div>
			  <a href="#" onclick="return false" title="关闭此窗口" class="btn-close" >×</a>
		</div>
</div>

<div id="updownPopBox" class="ng_block" style="display:none; position:relative; width: 500px;">
		<div class="hd"><h3>提示</h3></div>
		<!--  <a href="#" onclick="return false" class="ng_block_closer">×</a>-->
		<div class="bd">
			<div class="normal" style="padding:30px 0px;">
					<p><span id="updownmsg">移动中...</span></p>							
			</div>			
		</div>
		<div class="ft">
			  <a href="#" onclick="return false" title="关闭此窗口" class="btn-close" >×</a>
		</div>
</div>

<script>

		
	dept_tree=new dhtmlXTreeObject("treeboxbox_dept_tree","100%","100%",0);
	dept_tree.setSkin('dhx_skyblue');
	dept_tree.setImagePath("/js/lib/dhx/tree_codebase/imgs/csh_dhx_skyblue/");

	//dept_tree.loadJSArray(actionItems);
	//dept_tree.openAllItems(0);
	
	//init tree
	$(document).ready(function(){ 
	  	 $.ajax({
	            type: "POST",
	            url: "/baseinfo/departments/getalldeptsInJson",
	            dataType: "json",
	            success: function(data){
	            	initTree(data);
	            },
	            error:function(xhr) {alert(xhr.status);}
	        });
	});

	function initTree(data){
		var treeArray = new Array();	 
		for(var i=0;i < data.results.length;i++){
			//alert(data.nodes[i].text);
			var item = new Array();
			item.push(data.results[i].id);
			item.push(data.results[i].up_id);
			item.push(data.results[i].name);
			treeArray.push(item);
	   }     
	   //dept_tree.loadJSONObject(data); 
	   dept_tree.loadJSArray(treeArray);	
	   dept_tree.openAllItems(0);
	   dept_tree.selectItem(1,false,false);
	}	

	
	function showAddBox(){
		show_block_div("addDeptPopBox"); 
	}
	function addDept(){	
		if($.trim($("#J_Name").val())==""){
			$("#J_MsgName .msg-cnt").html("请输入部门名称").show();
			$("#J_MsgName").show();
			return false;
		}
		var addTarget=$("input:radio[name=addto]:checked").val();		       
		var parentId;		
		//添加到根目录下级
		if(addTarget == "nextToRoot"){
			parentId = '1';
		}else if(addTarget == "sub"){
			parentId = dept_tree.getSelectedItemId();
			if(parentId == ""){
			   alert("请在左边树上选中要添加为其下级的部门！");
			   return;
			}
		}else if(addTarget == "next"){
			parentId = dept_tree.getParentId(dept_tree.getSelectedItemId());
			if(parentId == ""){
			   alert("请在左边树上选中一个要添加为其同级的部门，不能添加为根目录的同级！");
			   return;
			}
		}

		var deptName=$.trim($("#J_Name").val());
			
		$.ajax({
  		 type: "GET",
  		 url: "/baseinfo/departments/create?name="+encodeURIComponent(deptName)+"&up_id="+parentId,
  		 dataType: "json",
  		 success: function(backdata){
  	  		 //alert(backdata.state);
			 if(backdata.state){
				if(addTarget == "nextToRoot"){
					insertNextToRoot(backdata.data.dept_id);
				}else if(addTarget == "sub"){
					insertNewSub(backdata.data.dept_id);
				}else if(addTarget == "next"){
					insertNewNext(backdata.data.dept_id);
				}
				close_block_div($("#addDeptPopBox"));
			 }
  	 	},
  		 error:function(xhr) {alert(xhr.status);}
  	   });   	   		
	}	

	function insertNextToRoot(newItemId){
		dept_tree.insertNewItem(1,newItemId,document.getElementById('J_Name').value,0,0,0,0,'SELECT'); 
		fixImage(1);
 	}
	function insertNewNext(newItemId){
		dept_tree.insertNewNext(dept_tree.getSelectedItemId(),newItemId,document.getElementById('J_Name').value,0,0,0,0,'SELECT'); 
		fixImage(newItemId);
	}	 	
	function insertNewSub(newItemId){
		dept_tree.insertNewItem(dept_tree.getSelectedItemId(),newItemId,document.getElementById('J_Name').value,0,0,0,0,'SELECT'); 
		fixImage(newItemId);
	}

	function fixImage(id){
		dept_tree.setItemImage2(id,'leaf.gif','folderClosed.gif','folderOpen.gif');	
		return;
		//alert(rtree.getLevel(id))
		switch(dept_tree.getLevel(id)){
		case 1:
			dept_tree.setItemImage2(id,'folderClosed.gif','folderOpen.gif','folderClosed.gif');
			break;
		case 2:
			dept_tree.setItemImage2(id,'folderClosed.gif','folderOpen.gif','folderClosed.gif');			
			break;
		case 3:
			dept_tree.setItemImage2(id,'folderClosed.gif','folderOpen.gif','folderClosed.gif');			
			break;			
		default:
			dept_tree.setItemImage2(id,'leaf.gif','folderClosed.gif','folderOpen.gif');			
			break;
		}
	}	

	function showRenameBox(){
		var crtId = dept_tree.getSelectedItemId();
		if(crtId==""){
			alert("请选择要重命名的部门！");
			return false;
		}	
		$("#J_ReName").val(dept_tree.getItemText(crtId));			
		show_block_div("renameDeptPopBox"); 
	}
	function renameDept(){	
		if($.trim($("#J_ReName").val())==""){
			$("#J_MsgReName .msg-cnt").html("请输入部门名称").show();
			$("#J_MsgReName").show();
			return false;
		}

		var crtId = dept_tree.getSelectedItemId();
		var deptName=$.trim($("#J_ReName").val());
		$.ajax({
  		 type: "GET",
  		 url: "/baseinfo/departments/rename?name="+encodeURIComponent(deptName)+"&id="+crtId,
  		 dataType: "json",
  		 success: function(backdata){
			 if(backdata.state){
				 dept_tree.setItemText(crtId, deptName);
				 dept_tree.selectItem(crtId,false,false);
				 close_block_div($("#renameDeptPopBox"));			
			 }
  	 	},
  		 error:function(xhr) {alert(xhr.status);}
  	   });   	   		
	}	

	
	function showDelConfirmBox(){
		var crtId = dept_tree.getSelectedItemId();
		if(crtId==""){
			alert("请选择要删除的部门！");
			return false;
		}	
		$("#deleteDeptNameBox").html(dept_tree.getItemText(crtId));			
		show_block_div("deleteDeptPopBox"); 
	}
	function deleteDept(){	  
			var selectedItemId = dept_tree.getSelectedItemId();
			if(selectedItemId ==1){
				$("#J_MsgDel .msg-cnt").html("不能删除根目录").show();
				$("#J_MsgDel").show();
				return false;
			}
			$.ajax({
  			type: "GET",
  			url: "/baseinfo/departments/delete?id="+selectedItemId,
  			dataType: "json",
  			success: function(backdata){
				if(backdata.state){
					dept_tree.deleteItem(dept_tree.getSelectedItemId(),true);
					 close_block_div($("#deleteDeptPopBox"));
				}else{
					$("#J_MsgDel .msg-cnt").html(backdata.msg);
					$("#J_MsgDel").show();					
					
				}
  	 		},
  			error:function(xhr) {alert(xhr.status);}
  			});   

	}

	function updown(moveType){
		var crtId = dept_tree.getSelectedItemId();
		if(crtId==""){
			alert("请选择要移动的节点！");
			return;
		}
		if(crtId==1){
			alert("不能移动根节点！");
			return;
		}
		$("#updownmsg").html("移动中...").removeClass("h");	
		show_block_div("updownPopBox"); 		
		
		var parentId = dept_tree.getParentId(dept_tree.getSelectedItemId());
		
		$.ajax({
  		 type: "GET",
  		 url: "/baseinfo/departments/updown?moveType="+moveType+"&parentId="+parentId+"&id="+crtId,
  		 dataType: "json",
  		 success: function(backdata){
				if(backdata.state){
					dept_tree.moveItem(crtId, moveType, crtId);
					dept_tree.selectItem(crtId,false,false);
					close_block_div($("#updownPopBox"));
				}else{
					$("#updownmsg").html(backdata.msg).addClass("h");										
				}
  	 	},
  		 error:function(xhr) {alert(xhr.status);}
  	   }); 
	}

	// 设置某个item选中
	function setTreeItemChecked(id) {
		dept_tree.setCheck(id,true);
	};

</script>
