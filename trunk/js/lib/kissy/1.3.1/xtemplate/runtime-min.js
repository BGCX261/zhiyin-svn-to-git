/*
Copyright 2013, KISSY UI Library v1.31
MIT Licensed
build time: Aug 15 00:08
*/
KISSY.add("xtemplate/runtime/base",function(d){function b(c,a){this.tpl=c;a=d.merge(g,a);a.subTpls=d.merge(a.subTpls,b.subTpls);a.commands=d.merge(a.commands,b.commands);this.option=a}var g={silent:!0,name:"",utils:{getProperty:function(c,a,e){if("this"==c||"."==c)return a.length?[a[0]]:!1;for(var c=c.split("."),g=c.length,b=e||0,f,d,i,k=a.length;b<k;b++){f=a[b];i=1;for(e=0;e<g;e++){d=c[e];if("object"!=typeof f||!(d in f)){i=0;break}f=f[d]}if(i)return"function"==typeof f&&(f=f.call(a[0])),[f]}return!1}}};
b.prototype={constructor:b,removeSubTpl:function(c){delete this.option.subTpls[c]},removeCommand:function(c){delete this.option.commands[c]},addSubTpl:function(c,a){this.option.subTpls[c]=a},addCommand:function(c,a){this.option.commands[c]=a},render:function(c,a){a||(c=[c]);return this.tpl(c,this.option)}};return b});
KISSY.add("xtemplate/runtime/commands",function(d,b){return{each:function(b,c){var a=c.params[0],e="",d;if(a){var h=[0,0].concat(b);d=a.length;for(var f=0;f<d;f++)h[0]=a[f],h[1]={xcount:d,xindex:f},e+=c.fn(h)}else c.inverse&&(e=c.inverse(b));return e},"with":function(b,c){var a=c.params[0],e=[0].concat(b),d="";a?(e[0]=a,d=c.fn(e)):c.inverse&&(d=c.inverse(b));return d},"if":function(b,c){var a="";c.params[0]?c.fn&&(a=c.fn(b)):c.inverse&&(a=c.inverse(b));return a},set:function(b,c){for(var a=b.length-
1;0<=a;a--)if("object"==typeof b[a]){d.mix(b[a],c.hash);break}return""},include:b.include}},{requires:["./include-command"]});
KISSY.add("xtemplate/runtime/include-command",function(d,b){var g={invokeEngine:function(c,a,e){return(new b(c,d.merge(e))).render(a,!0)},include:function(c,a){var b=a.params;if(!b||1!=b.length)return d[a.silent?"log":"error"]("include must has one param"),"";var b=b[0],j;if(!(j=a.subTpls[b]))return d[a.silent?"log":"error"]('does not include sub template "'+b+'"'),"";a.name=b;return g.invokeEngine(j,c,a)}};return g},{requires:["./base"]});
KISSY.add("xtemplate/runtime",function(d,b,g,c){b.addCommand=function(a,b){g[a]=b};b.removeCommand=function(a){delete g[a]};b.commands=g;b.includeCommand=c;var a={};b.subTpls=a;b.addSubTpl=function(b,c){a[b]=c};b.removeSubTpl=function(b){delete a[b]};return b.IncludeEngine=b},{requires:["./runtime/base","./runtime/commands","./runtime/include-command"]});