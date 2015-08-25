KISSY.use("event,switchable,node", function (S, Event,Switchable) {
    var Slide = Switchable.Slide;
    S.ready(function (S) {
        Slide('#foc-u-xw', {
            contentCls : 'news-items',
            hasTriggers : false,
            effect : 'scrolly',
            easing : 'easeOutStrong',
            interval : 2,
            duration : .2
        });
    });
});
 