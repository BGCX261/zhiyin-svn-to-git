var toolbar = {
	data_topbar : $("#header").attr("data-topbar"),
	data_toolbar : $("#wrapinner").attr("data-toolbar"),
	data_style : $("#toolbar").attr("data-style"),
	toolbar_width : $("#toolbar").width(),
	toolbtn_width : $(".toolbar-btn").width(),
	topbar_height : $("#header").height(),
	data_list_show : function() {
		for ( var i = 0, len = $("#toolbar .toolbar-list li").length; i < len; i += 1) {
			if ($("#toolbar .toolbar-list li").eq(i).attr("data-list-show") == "true") {
				$("#toolbar .toolbar-list li").eq(i).find(".menu").show()
			}
		}
	},
	data_list_num : function() {
		for ( var i = 0, len = $("#toolbar .toolbar-list li").length; i < len; i += 1) {
			if ($("#toolbar .toolbar-list li").eq(i).attr("data-list-num") == "false") {
				$("#toolbar .toolbar-list li").eq(i).remove()
			}
		}
	},
	addfavor : function(url, title) {
		if (confirm("游戏名称：" + title + "\n游戏地址：" + url + "\n确定添加收藏?")) {
			var ua = navigator.userAgent.toLowerCase();
			if (ua.indexOf("msie 8") > -1) {
				external.AddToFavoritesBar(url, title, 'butao')
			} else {
				try {
					window.external.addFavorite(url, title)
				} catch (e) {
					try {
						window.sidebar.addPanel(title, url, "")
					} catch (e) {
						alert("加入收藏失败，请使用Ctrl+D进行收藏")
					}
				}
			}
		}
		return false
	},
	scroller : function(config, callback) {
		this.Obj = config.Obj;
		this.list = this.Obj.eq(0).find("ol:first");
		this.lineH = this.list.find("li:first").height();
		this.line = config.line ? parseInt(config.line, 10) : parseInt(this.Obj
				.height()
				/ this.lineH, 10);
		this.speed = config.speed ? parseInt(config.speed, 10) : 500;
		this.timer = config.timer ? parseInt(config.timer, 10) : 3000;
		this.timerID = null;
		if (this.line == 0)
			this.line = 1;
		this.upHeight = 0 - this.line * this.lineH;
		this.scrollUp = function() {
			this.list.animate({
				marginTop : this.upHeight
			}, this.speed, function() {
				for ( var j = 1; j <= this.ScrollBox.line; j++) {
					$(this).find("li:first").appendTo($(this))
				}
				$(this).css({
					marginTop : 0
				})
			});
			var SBox = this;
			SBox.timerID = setTimeout(function() {
				toolbar.gobalScroll.apply(this, [ SBox ])
			}, SBox.timer)
		};
		this.list[0].ScrollBox = this;
		this.stop = function() {
			var ScrollBox = this.ScrollBox;
			clearTimeout(ScrollBox.timerID)
		};
		this.scroll = function() {
			var ScrollBox = this.ScrollBox;
			ScrollBox.timerID = setTimeout(function() {
				toolbar.gobalScroll.apply(this, [ ScrollBox ])
			}, ScrollBox.timer)
		};
		this.list.hover(this.stop, this.scroll);
		var ScrollBox1 = this;
		ScrollBox1.timerID = setTimeout(function() {
			toolbar.gobalScroll.apply(this, [ ScrollBox1 ])
		}, ScrollBox1.timer)
	},
	gobalScroll : function(obj) {
		obj.scrollUp()
	},
	newGame : function() {
		var temHtml = '';
		for ( var i = 0, len = gameTJ_maxNumber; i < len; i += 1) {
			temHtml += '<a href="' + gameTJ_ToolBar[i].href + '" class="fl">'
					+ gameTJ_ToolBar[i].showname + '<img alt="'
					+ gameTJ_ToolBar[i].gamename
					+ '" src="http://images.51wan.com' + gameTJ_ToolBar[i].ui
					+ '" /></a>'
		}
		$(".new-games dd").html(temHtml)
	}
};
if ($("#notice").length) {
	toolbar.scroller({
		line : 1,
		speed : 1000,
		timer : 4000,
		Obj : $("#notice")
	})
}
if (toolbar.data_topbar == "true") {
	$("#header").show();
	$("#wrapinner").css({
		"height" : $(window).height() - toolbar.topbar_height
	});
	$("#topbar-show").hide()
} else {
	$("#header").hide();
	$("#wrapinner").css({
		"height" : $(window).height()
	});
	$("#topbar-show").show()
}
if (toolbar.data_style == "1" || toolbar.data_style == "2"
		|| toolbar.data_style == "3" || toolbar.data_style == "4"
		|| toolbar.data_style == "5" || toolbar.data_style == "6") {
	$("#toolbar").removeClass().addClass("toolbar-style" + toolbar.data_style)
}
toolbar.newGame();
toolbar.data_list_num();
toolbar.data_list_show();
if (toolbar.data_toolbar == "false") {
	$("#toolbar").css({
		"width" : toolbar.toolbtn_width
	});
	$("#main").css({
		"marginLeft" : toolbar.toolbtn_width
	});
	$("#toolbar").find(".toolbar-btn").addClass("toolbar-btnUnfold").find(
			".pack").hide().end().find(".unfold").show()
}
$(".toolbar-list h2").click(function() {
	$(".toolbar-list .menu").hide();
	$(this).siblings(".menu").show()
});
$(".toolbar-btn span").bind(
		"click",
		function() {
			if ($(this).attr("class") == "pack") {
				$(this).hide().siblings(".unfold").show()
						.parent(".toolbar-btn").addClass("toolbar-btnUnfold");
				$("#toolbar").css({
					"width" : toolbar.toolbtn_width + "px"
				});
				$("#main").animate({
					"marginLeft" : toolbar.toolbtn_width + "px"
				}, "fast")
			} else if ($(this).attr("class") == "unfold") {
				$(this).hide().siblings(".pack").show().parent(".toolbar-btn")
						.removeClass("toolbar-btnUnfold");
				$("#toolbar").css({
					"width" : toolbar.toolbar_width + "px"
				});
				$("#main").animate({
					"marginLeft" : toolbar.toolbar_width + "px"
				}, "fast")
			}
		});
$("#header .close").click(function() {
	$("#header").hide();
	$("#topbar-show").show();
	$("#wrapinner").css({
		"height" : $(window).height()
	});
	$("#toolbar").css({
		"height" : $(window).height()
	})
});
$("#topbar-show").click(function() {
	$("#header").show();
	$("#wrapinner").css({
		"height" : $(window).height() - toolbar.topbar_height
	});
	$("#toolbar").css({
		"height" : $(window).height() - toolbar.topbar_height
	});
	$(this).hide()
});
$(window).bind("resize load", function() {
	var winH = $(window).height();
	if (!$("#header").is(":hidden")) {
		if ($("#wrapinner").height() == winH - toolbar.topbar_height) {
			return
		}
		$("#wrapinner").css({
			"height" : winH - toolbar.topbar_height
		})
	} else {
		if ($("#wrapinner").height() == winH) {
			return
		}
		$("#wrapinner").css({
			"height" : winH
		})
	}
});
$("#link-favorite").click(function() {
	toolbar.addfavor(game_url, game_title);
	return false
});