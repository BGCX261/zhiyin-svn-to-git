function show_block_mask(){
	if($("#pop_mask").size()==0)
	{
		$("body").prepend('<div class="pop_mask" id="pop_mask"></div>');
	}
	$("#pop_mask").show();
}

function hide_block_mask()
{
	$(".ng_block").hide();
	$("#pop_mask").hide();
}

function show_block_div(div_id)
{
	show_block_mask();
	$("#"+div_id).blockdiv().show();
	//$(".ng_block_div_wrap").show();
}

function close_block_div(o)
{
	$(o).hide();
	hide_block_mask();
}

function resize_mask(){
	var bH2 = $(window).height() + $(window).scrollTop();
	var bW2 = $(window).width() + $(window).scrollLeft();
	$("#pop_mask").css({width:bW2,height:bH2,top:0});
}

$(function(){		
	$(".ng_block_closer").live('click',function(){
		close_block_div($(this).parent());
	});	
	$(".ng_block .btn-close").live('click',function(){
		close_block_div($(this).parent().parent());
	});		
});




