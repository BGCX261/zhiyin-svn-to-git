<style>
#overlay-container-2 {
	z-index: 12;
}

#content-settings-page {
	min-width: 620px;
}

section {
	-webkit-padding-start: 18px;
	margin-bottom: 24px;
	margin-top: 8px;
	max-width: 600px;
}

section>h3 {
	-webkit-margin-start: -18px;
}

.controlled-setting-with-label {
	-webkit-box-align: center;
	display: -webkit-box;
	padding-bottom: 7px;
	padding-top: 7px;
}

.controlled-setting-with-label>input+span {
	-webkit-box-align: center;
	-webkit-box-flex: 1;
	-webkit-margin-start: 0.6em;
	display: -webkit-box;
}
</style>
<link rel="stylesheet" href="/css/form/widgets.css">
<link rel="stylesheet" type="text/css" href="/css/overlay/overlay.css">
<link rel="stylesheet" href="/css/common/ng-table.css" type="text/css" />

<div id="overlay-container-2" class="overlay" style="display:none ">
	<div id="content-settings-page" class="page" style="max-height: 800px">
		<div class="close-button"></div>
		<h1>选择印件</h1>
		<div class="content-area loading" id="product-select-box" style="min-height:400px;">
		</div>		
		<div class="action-area" style="display:none">
			<div class="button-strip" >
				<button id="content-settings-overlay-confirm" class="default-button" >完成</button>
			</div>
		</div>
	</div>
</div>

<script>

$(document).ready(function(){ 
	
	$(".overlay .close-button").click(function() {
		$(".overlay").hide();
	});

	$("#sel_product").click(function() {
		$("#product-select-box").addClass("loading");
		$("#product-select-box").load('/baseinfo/products/queryByAjaxHtml', {},function(){$("#product-select-box").removeClass("loading");});	
		$("#overlay-container-2").show();		
	});
		
});

function sel_product(id,name){
    $("#product_name").val(name);
    $("#product_id").val(id);
    $(".overlay").hide(); 	
}  


</script>

