/*
Copyright 2013, KISSY UI Library v1.31
MIT Licensed
build time: Aug 15 16:16
*/
KISSY.add("editor/plugin/source-area/index",function(d,a){function c(){}var e=a.SOURCE_MODE,f=a.WYSIWYG_MODE;d.augment(c,{pluginRenderUI:function(b){b.addButton("sourceArea",{tooltip:"\u6e90\u7801",listeners:{afterSyncUI:function(){var a=this;b.on("wysiwygMode",function(){a.set("checked",!1)});b.on("sourceMode",function(){a.set("checked",!0)})},click:function(){this.get("checked")?b.set("mode",e):b.set("mode",f)}},checkable:!0})}});return c},{requires:["editor","../button/"]});
