/*
Copyright 2013, KISSY UI Library v1.31
MIT Licensed
build time: Aug 15 16:16
*/
KISSY.add("editor/plugin/remove-format/index",function(c,d,e){function b(){}c.augment(b,{pluginRenderUI:function(a){e.init(a);a.addButton("removeFormat",{tooltip:"\u6e05\u9664\u683c\u5f0f",listeners:{click:function(){a.execCommand("removeFormat")}},mode:d.WYSIWYG_MODE})}});return b},{requires:["editor","./cmd","../button/"]});
