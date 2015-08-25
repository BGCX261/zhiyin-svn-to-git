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
    
    
	dept_tree=new dhtmlXTreeObject("treeboxbox_dept_tree","100%","100%",0);
	dept_tree.setSkin('dhx_skyblue');
	dept_tree.setImagePath("/js/lib/dhx/tree_codebase/imgs/csh_dhx_skyblue/");	
	dept_tree.setOnClickHandler(treeClickHandler);

	function treeClickHandler(id) {
		var selectDeptId = dept_tree.getSelectedItemId();
		$("#deptName").val(dept_tree.getItemText(selectDeptId));
		$("#dept_id").val(selectDeptId);
		close_block_div($("#selectDeptPopBox"));
	};	
	
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

	function selectDept(){
		show_block_div("selectDeptPopBox"); 
	}	
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