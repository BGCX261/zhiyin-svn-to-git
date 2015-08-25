var actionItems=new Array(["1","0","系统"],
		["2","1","公告管理"],
		["201","2","编辑公告"],
		["202","2","公告列表"],
		["203","2","常见问题"],
		["3","1","岗位管理"],
		["301","3","编辑岗位"],
		["302","3","岗位列表"],
		["303","3","已发布岗位"],
		["304","3","已屏蔽岗位"],
		["4","1","应聘管理"],
		["401","4","简历管理"],
		["402","4","初审通过"],
		["403","4","初审未通过"],
		["404","4","初审预备一"],
		["405","4","初审预备二"],
		["406","4","拟后留用库"],
		["407","4","复审通过"],
		["408","4","复审未通过"],
		["409","4","复审预备"],
		["410","4","拟录用"],
		["411","4","简历总库"],
		["412","4","面试人员"],
		["5","1","系统管理"],
		["501","5","字典设置"],
		["502","5","部门设置"],
		["6","1","用户管理"],
		["601","6","用户管理"],
		["602","6","角色管理"]);
		
	actions_tree=new dhtmlXTreeObject("treeboxbox_actions_tree","100%","100%",0);
	actions_tree.setSkin('dhx_skyblue');
	actions_tree.setImagePath("/js/lib/dhx/tree_codebase/imgs/csh_dhx_skyblue/");
	actions_tree.enableCheckBoxes(1);
	actions_tree.setOnClickHandler(clickHandler);
	actions_tree.setOnCheckHandler(checkHandler);
	actions_tree.loadJSArray(actionItems);
	actions_tree.openAllItems(0);
	
	// 点击事件处理
	function clickHandler(id) {
		showme(id);
	};

	// 选中事件处理
	function checkHandler(id, state) {
	  actions_tree.setSubChecked(id,(state) ? true: false);
	 // doLog("Item " + tree.getItemText(id) + " was " + ((state) ?
		// "checked": "unchecked"));
	};

	

	// 设置某个item选中
	function setTreeItemChecked(id) {
		actions_tree.setCheck(id,true);
	};
	

	// 把选中的值放入form中，post提交
	function collectCheckedItems(){
      roleForm.actionItems.value=actions_tree.getAllChecked();
	}
	
	// 提交表单
	function doPostForm() { 
		if($("#name").val() == ""){
			alert("请输入角色名称！");
		  return false;
		}

		// 设置能操作的项
		collectCheckedItems();
		// alert($("#actionItems").val());

		if($("#actionItems").val() == ""){
			alert("请选中能操作的项！");
		  return false;
		}		

		var rolename = $("#name").val();
		// 检查角色名是否已经存在
        $.ajax({
            type: "POST",
            url: "/account/roles/checkRoleNameExist",
            dataType: 'json',
            data : {name:rolename},
            success: function(backdata){ 
                alert(backdata.state);                                         
                if(backdata.state){
					// 已经存在，提示
					return false;
                }else{
                    // 不存在，继续

                }
            }
        })		

        document.roleForm.submit();
	}	
