var g_blockdiv_doing = false;
jQuery.fn.blockdiv=function(location){
	if(g_blockdiv_doing)
	{
		return true;
	}
	g_blockdiv_doing = true;
		//判断浏览器版本
	var isIE6=false;
	var Sys = {};
    var ua = navigator.userAgent.toLowerCase();
    var s;
    (s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] : 0;
	if(Sys.ie && Sys.ie=="6.0"){
		isIE6=true;
		if (document.documentElement && document.documentElement.scrollTop) {
			var st=document.documentElement.scrollTop;
		}
		else if (document.body) {
			var st=document.body.scrollTop;
		}
	}
	var windowWidth,windowHeight;//窗口的高和宽
	//取得窗口的高和宽
	if (self.innerHeight) {
		windowWidth=self.innerWidth;
		windowHeight=self.innerHeight;
	}else if (document.documentElement&&document.documentElement.clientHeight) {
		windowWidth=document.documentElement.clientWidth;
		windowHeight=document.documentElement.clientHeight;
	} else if (document.body) {
		windowWidth=document.body.clientWidth;
		windowHeight=document.body.clientHeight;
	}
	return this.each(function(){
		var loc;//层的绝对定位位置
		if($("#ng_block_div_wrap").size()==0){
			wrap = $("<div class='ng_block_div_wrap' id='ng_block_div_wrap'></div>");
		}else{
			wrap = $("#ng_block_div_wrap");
		}
		
		var top=-1;

		var l=0;//居左
		var t=0;//居上
		l=windowWidth/2-$(this).width()/2;
		t=windowHeight/2-$(this).height()/2;
		if(isIE6){
			t = Number(st) + Number(t);
		}
		top=t;
		loc={left:l+"px",top:t+"px"};

		/*fied ie6 css hack*/
		if(isIE6){
			if (top>=0){
				//wrap=$("<div style=\"top:expression(documentElement.scrollTop+"+top+");\"></div>");
			}else{
				wrap=$("<div class='block_div' style=\"top:expression(documentElement.scrollTop+documentElement.clientHeight-this.offsetHeight);\"></div>");
			}
		}

		$("body").append(wrap);		
		wrap.css(loc);
		//wrap;
		if (isIE6){
			wrap.css("position","absolute");
		}
		//将要固定的层添加到固定层里	

		$(this).appendTo(wrap);
		g_blockdiv_doing = false;
	});
};

(function(){

	var isIE6=false;
	var Sys = {};
	var ua = navigator.userAgent.toLowerCase();
	var s;
	(s = ua.match(/msie ([\d.]+)/)) ? Sys.ie = s[1] : 0;
	if(Sys.ie && Sys.ie=="6.0"){
		$(window).scroll(function(){
			if($("#fullbg").is(":visible")==true)
			{
				//$(".block_div").blockdiv();			
			}
		});
	}
});

