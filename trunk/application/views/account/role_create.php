<script src="/js/lib/dhx/tree_codebase/dhtmlxcommon.js"></script>
<script src="/js/lib/dhx/tree_codebase/dhtmlxtree.js"></script>
<script src="/js/lib/dhx/tree_codebase/ext/dhtmlxtree_json.js"></script>
<link rel="stylesheet" type="text/css" href="/js/lib/dhx/tree_codebase/dhtmlxtree.css">
<link rel="stylesheet" type="text/css" href="/css/common/inputs.css">

<form name="roleForm" action="/account/roles/create" method="post">
<input type="hidden" name="actionItems" id="actionItems" value="">

	<div class="i-item item-name" id="J_ItemName">
		<span class="item-label">角色名称：<i>*</i>
		</span> <input name="name" placeholder="请输入角色名" class="i-text" id="J_Name" type="text" value="">
		<div class="msg hide" id="J_MsgName">
			<i></i>
			<div class="msg-cnt"></div>
		</div>
	</div>

	<div class="i-item item-desc" id="J_ItemDesc">
		<span class="item-label">描述：</span>
		<div class="ks-combobox" id="J_ComboboxDesc" aria-pressed="false">
			<div class="ks-combobox-input-wrap">
				<textarea class="ks-combobox-input i-ta" aria-combobox="list" role="combobox" autocomplete="off" name="description" id="J_Desc" placeholder=""></textarea>
			</div>
		</div>
		<div class="msg-box hide">
			<div class="msg msg-error" id="J_MsgDesc">
				<i></i>
				<div class="msg-cnt"></div>
			</div>
		</div>
	</div>

	<div class="i-item item-actions" id="J_ItemActions">
		<span class="item-label">用户权限：<i>*</i>
		</span>
		<div style="width: 430px">
			<a href="javascript:void(0);" onClick="actions_tree.openAllItems(0);">展开</a> 
			<a href="javascript:void(0);" onClick="actions_tree.closeAllItems(0);">收缩</a>
			<div id="treeboxbox_actions_tree" style="width: 100%; height: 450px; background-color: #ffffff; border: 1px solid Silver;; overflow: auto;"></div>
		</div>

		<div class="msg-box hide">
			<div class="msg msg-error" id="J_MsgActions">
				<i></i>
				<div class="msg-cnt"></div>
			</div>
		</div>
	</div>
	
	<div style="padding-left: 135px;">
		<div class="skin-gray">	
			<button type="button" class="short-btn" onclick="doPostForm()">保存</button>		
		</div>
	</div>
	
</form>		
	
<script src="/js/account/roles.js"></script>