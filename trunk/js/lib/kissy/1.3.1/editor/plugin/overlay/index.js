/*
Copyright 2013, KISSY UI Library v1.31
MIT Licensed
build time: Aug 15 16:16
*/
/**
 * custom overlay  for kissy editor
 * @author yiminghe@gmail.com
 */
KISSY.add("editor/plugin/overlay/index", function (S, Editor, Overlay, focusFix, ConstrainPlugin, DragPlugin) {
    var Overlay4E = Overlay.extend({
        bindUI: function () {
            focusFix.init(this);
        }
    }, {
        ATTRS: {
            prefixCls: {
                value: "ks-editor-"
            },
            "zIndex": {
                value: Editor.baseZIndex(Editor.zIndexManager.OVERLAY)
            }
        }
    });

    Overlay4E.Dialog = Overlay.Dialog.extend({
        initializer:function(){
            this.plug(new DragPlugin({
                handlers: ['.ks-editor-stdmod-header'],
                plugins: [
                    new ConstrainPlugin({
                        constrain: window
                    })
                ]
            }));
        },
        bindUI: function () {
            focusFix.init(this);
        },
        show: function () {
            var self = this;
            //在 show 之前调用
            self.center();
            var y = self.get("y");
            //居中有点偏下
            if (y - S.DOM.scrollTop() > 200) {
                y = S.DOM.scrollTop() + 200;
                self.set("y", y);
            }
            Overlay4E.prototype.show.call(self);
        }
    }, {
        ATTRS: {
            prefixCls: {
                value: "ks-editor-"
            },
            "zIndex": {
                value: Editor.baseZIndex(Editor.zIndexManager.OVERLAY)
            }
        }
    });

    return Overlay4E
}, {
    requires: ["editor", 'overlay', '../focus-fix/', 'dd/plugin/constrain', 'component/plugin/drag']
});
