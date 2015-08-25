/*! mbis/0.2.2 2014-02-18 15:07:02 */
KISSY.config({
    combine: !0,
    tag: KISSY.now(),
    base: "",
    packages: {
        tpl: {base: "http://" + (!window.location.hostname || ~window.location.hostname.indexOf("daily") ? "g.assets.daily.taobao.net" : "g.tbcdn.cn") + "/tb/mbis/0.2.2/deliver/js",
            combine: !1,
            tag: "1384851536",
            debug: !1}
    }
}),

KISSY.add("message", function (t) {
    var e = function (e, i) {
        this.msg = t.one(e), this.msg && (this.title = this.msg && this.msg.one(".msg-tit"), this.content = this.msg && this.msg.one(".msg-cnt"), this.source = t.isPlainObject(i) ? i : null, this.type = this._getType())
    }, i = function (t, i) {
        return new e(t, i)
    };
    return t.augment(e, {change: function (t, e) {
        if (!this.msg)return this;
        switch (this.show(), t = t && t.toUpperCase() || "") {
            case"OK":
            case"ERROR":
            case"TIPS":
            case"NOTICE":
            case"ATTENTION":
            case"QUESTION":
            case"STOP":
                this._changeType(t);
                break;
            default:
        }
        return this.type = this._getType(), this._changeText(e), this
    }, _changeType: function (t) {
        var e = this.msg.attr("class"), i = /\bmsg(?:-b)?-(?:ok|error|tips|notice|attention|question|stop)\b/g, n = e.match(i), o = ~e.indexOf("msg-b") ? "msg-b-" : "msg-";
        n ? this.msg.attr("class", e.replace(i, o + t.toLowerCase())) : this.msg.addClass(o + t.toLowerCase())
    }, _changeTitle: function (e) {
        this.title && t.isString(e) && this.title.html(e)
    }, _changeContent: function (e) {
        this.content && t.isString(e) && this.content.html(this.source ? this.source[e] || "" : e)
    }, _changeText: function (e) {
        var i = t.isObject(e) && t.isString(e.title) ? e.title : "", n = t.isObject(e) && t.isString(e.content) ? e.content : t.isString(e) ? e : "";
        this._changeTitle(i), this._changeContent(n), i || n || !this.msg || this.msg.addClass("msg-weak")
    }, ok: function (t) {
        return this.change("ok", t), this
    }, error: function (t) {
        return this.change("error", t), this
    }, tips: function (t) {
        return this.change("tips", t), this
    }, notice: function (t) {
        return this.change("notice", t), this
    }, attention: function (t) {
        return this.change("attention", t), this
    }, question: function (t) {
        return this.change("question", t), this
    }, stop: function (t) {
        return this.change("stop", t), this
    }, weak: function () {
        this.msg.replaceClass("msg", "msg-weak"), this.msg.replaceClass("msg-b", "msg-b-weak")
    }, _getType: function () {
        var t = "", e = this.msg.attr("class");
        return e.match(/\bmsg-(b-)?error\b/) ? t = "ERROR" : e.match(/\bmsg-(b-)?tips\b/) ? t = "TIPS" : e.match(/\bmsg-(b-)?attention\b/) ? t = "ATTENTION" : e.match(/\bmsg-(b-)?notice\b/) ? t = "NOTICE" : e.match(/msg-ok|msg-b-ok/) ? t = "OK" : e.match(/\bmsg-(b-)?question\b/) ? t = "QUESTION" : e.match(/\bmsg-(b-)?stop\b/) && (t = "STOP"), t
    }, isHide: function () {
        return"hidden" === this.msg.css("visibility") || "none" === this.msg.css("display")
    }, hide: function () {
        return this.msg.css("visibility", "hidden").removeClass("show").addClass("hide"), this
    }, show: function () {
        return this.msg.css("visibility", "visible").removeClass("hide").addClass("show"), this
    }, laterHide: function (e) {
        return t.later(this.hide, e || 2e3, !1, this), this
    }}), i
}),

KISSY.add("placeholder", function (t) {
    var e = function (t) {
        return this instanceof e ? (t = t || {}, this.attrName = t.attrName, this.className = t.className || "", this._init(), void 0) : new e(t)
    }, i = function () {
        var t = document.createElement("input");
        return"placeholder"in t
    }();
    return t.augment(e, {_init: function () {
        !i && this.attrName && (this.els = t.all("[" + this.attrName + "]"), this.placeholder())
    }, placeholder: function () {
        var e = this;
        t.each(this.els, function (i) {
            i = t.one(i);
            var n = t.all('<div class="' + e.className + '">' + i.attr(e.attrName) + "</div>"), o = i.offset();
            n.css({width: i.width(), position: "absolute", left: o.left + window.parseFloat(i.css("paddingLeft"), 10), top: o.top + window.parseFloat(i.css("paddingTop"), 10)}), i.after(n)
        })
    }}), e
}),

KISSY.add("xdialog", function (t, e, i, n) {
    var o = ['<div class="xdialog">', '<div class="xdialog-content">{text}</div>', '<div class="xdialog-buttons">', '<button type="button" style="display:{btnOkShow};" class="xdialog-btn xdialog-btn-ok">{btnOk}</button>', '<button type="button" style="display:{btnCancelShow};" class="xdialog-btn xdialog-btn-cancel">{btnCancel}</button>', "</div>"].join(""), a = !1, s = [".xd-overlay{position:absolute;border:8px solid rgba(0,0,0,.5);*border:8px solid #666;border-radius:5px;-moz-background-clip:border;-webkit-background-clip:border;background-clip:border-box;-moz-background-clip:padding;-webkit-background-clip:padding;background-clip:padding-box;-moz-background-clip:content;-webkit-background-clip:content;background-clip:content-box;background:#FFF;}", ".xdialog{padding:20px 20px 10px;line-height:1.6;color:#666;background:#FFF;}", ".xdialog-content{padding-bottom:20px;}", ".xdialog-buttons{padding-top:10px;text-align:center;border-top:1px solid #DEDEDE;}", ".xdialog-btn{color:#666;padding:0 10px;margin:0 5px;font-size:12px;height:24px;line-height:20px;border:1px solid #D0D0D0;border-radius:3px;background:#FFF;cursor:pointer;}", ".xd-ext-mask,.xd-overlay-mask{background:#000;filter:alpha(opacity=0);opacity:0;}"].join(""), r = function (e) {
        return this instanceof r ? (e = e || {}, this.buttons = t.isObject(e.buttons) ? e.buttons : {}, this.text = e.text, this.width = t.isNumber(e.width) ? e.width : 300, this.height = t.isNumber(e.height) ? e.height : "", this.mask = !!e.mask, this.available = !0, this._init(), void 0) : new r(e)
    };
    return t.augment(r, i.Target, {_init: function () {
        return this.text ? void 0 : (this.avaiable = !1, void 0)
    }, show: function (e) {
        if (this.available) {
            var i = this;
            this._addStyleSheet();
            var a = t.substitute(o, {text: i.text, btnOk: i.buttons.ok, btnOkShow: i.buttons.ok ? "" : "none", btnCancel: i.buttons.cancel, btnCancelShow: i.buttons.cancel ? "" : "none"});
            return this.o = new n({prefixCls: "xd-", width: i.width, height: i.height, content: a, align: {points: ["cc", "cc"]}, mask: this.mask, zIndex: 999999}), this.o.render(), this.o.show(), t.isNumber(e) && t.later(function () {
                i.hide()
            }, 1e3 * e), this.el = this.o.get("contentEl"), this._bindEvent(), this
        }
    }, hide: function () {
        return this.available ? (this.o && this.o.destroy(), this.o = null, this.el = null, this) : void 0
    }, _bindEvent: function () {
        var t = this;
        i.delegate(this.el, "click", ".xdialog-btn", function () {
            t.hide()
        }), i.delegate(this.el, "click", ".xdialog-btn-ok", function () {
            t.fire("ok")
        }), i.delegate(this.el, "click", ".xdialog-btn-cancel", function () {
            t.fire("cancel")
        })
    }, _addStyleSheet: function () {
        a || (e.addStyleSheet(s), a = !0)
    }}), r
}, {requires: ["dom", "event", "overlay"]}),

KISSY.add("deliver", function (S) {
    var e,
        i = window.CONSTANT || {},
        n = (S.require("placeholder"),
            S.require("message")
            ),
        o = S.require("xdialog"),
        a = S.require("xtemplate/runtime"),
        s = S.require("combobox"),
        r = {form: S.require("tpl/form-xtpl")},
        l = !window.location.hostname || ~window.location.hostname.indexOf("daily"),
        d = l ? "http://lsp.wuliu.taobao.net" : "http://lsp.wuliu.taobao.com",
        c = function (t) {
            return this instanceof c ? (
                this.cfg = t || {},
                    this.api = this.cfg.api,
                    this.id = this.cfg.id,
                    this.token = this.cfg._tb_token_,
                    this.btn = !!this.cfg.btn,
                    this.title = !!this.cfg.title,
                    this.addr = this.cfg.addr || {},
                    this._init(), void 0) : new c(t)
        };

    return S.augment(c, {
        _init: function () {
            if (this.api && (this.page = S.one("#J_Page"), this.page)) {
                this.render({id: this.id}), this.form = S.one("#J_FormDeliver"), this._bind(), this._initMsg(), this._initCombobox(), this._autoAdaptIframe(), this._submit();
                try {
                    (new Image).src = "http://gm.mmstat.com/member.6.1"
                } catch (e) {
                }
            }
        },
        render: function (e) {
            var arr_phone = this.addr.phone ? this.addr.phone.split("-") : [];
            this.page.append(new a(r.form).render(S.merge(this.addr, {btn: this.btn, title: this.title, phoneSection: arr_phone[0] || "", phoneCode: arr_phone[1] || "", phoneExt: arr_phone[2] || ""}))), this._renderAddress(e)
        },
        _initMsg: function () {
            this.msgDivision = n("#J_MsgDivision"), this.msgPostCode = n("#J_MsgPostCode"), this.msgStreet = n("#J_MsgStreet"), this.msgName = n("#J_MsgName"), this.msgMobile = n("#J_MsgMobile"), this.msgPhone = n("#J_MsgPhone")
        },
        _renderAddress: function (i) {
            function n() {
                if (o.division)return o.division.focus({id: i.id}), void 0;
                var n = o.addr, a = {}, s = {};
                n.townDivisionCode && (s.id = n.townDivisionCode), a.id = n.areaDivisionCode || n.cityDivisionCode || n.provDivisionCode || n.countryDivisionCode, o.division = e({elSelects: {province: "#J_Province", country: "#J_Country", provinceExt: "#J_ProvinceExt", city: "#J_City", area: "#J_Area", town: "#J_Town"}, focus: a, town: s, daily: l, includeOther: !1, oversea: !0, overseaPy: !0}).on("change", function () {
                    var e = this.val();
                    "990000" === e.province ? S.all("#J_PostCode").val("000000") : "990000" !== e.province && "000000" === S.all("#J_PostCode").val() && S.all("#J_PostCode").val(""), "810000" === e.province ? S.all("#J_PostCode").val("999077") : "810000" !== e.province && "999077" === S.all("#J_PostCode").val() && S.all("#J_PostCode").val(""), "820000" === e.province ? S.all("#J_PostCode").val("999078") : "820000" !== e.province && "999078" === S.all("#J_PostCode").val() && S.all("#J_PostCode").val(""), e && "" === e.town ? S.all("#J_TipTown").show().css({left: S.all("#J_Town").offset().left}) : S.all("#J_TipTown").hide(), o._comboboxDataSource(), o.validateDivision(), S.all("#J_PostCode").fire("valuechange"), o._autoAdaptIframe()
                })
            }

            var o = this;
            i = i || {}, e ? n() : S.getScript("http://" + (l ? "g.assets.daily.taobao.net" : "g.tbcdn.cn") + "/tbc/address/0.2.5/index-min.js", function () {
                e = S.require("tbc/address/0.2.5/index"), n()
            }, "utf-8")
        }, _paramDivision: function () {
            var e = this.division ? this.division.val() : null, i = {};
            return S.each(e, function (t, e) {
                if (t)switch (e) {
                    case"province":
                        i.l1 = t;
                        break;
                    case"city":
                        i.l2 = t;
                        break;
                    case"area":
                        i.l3 = t;
                        break;
                    case"town":
                        i.l4 = t;
                        break;
                    default:
                }
            }), i
        }, _comboboxDataSource: function () {
            return this._remoteDataSource ? (this._remoteDataSource.set("xhrCfg", {url: d + "/locationservice/addr/suggestion.do", dataType: "jsonp", scriptCharset: "utf-8", data: this._paramDivision()}), this._remoteDataSource) : (this._remoteDataSource = new s.RemoteDataSource({paramName: "addr", parse: function (t, e) {
                return e.result
            }, cache: !1}), this._comboboxDataSource())
        }, _initCombobox: function () {
            var e = new s({srcNode: S.one("#J_ComboboxStreet"), focused: !1, hasTrigger: !1, dataSource: this._comboboxDataSource()});
            e.render(), e.get("input").on("focus", function () {
                e.sendRequest("")
            })
        }, _bind: function () {
            var ele_phone = S.all("#J_Phone"),
                ele_phoneSection = S.all("#J_PhoneSection"),
                ele_phoneCode = S.all("#J_PhoneCode"),
                ele_phoneExt = S.all("#J_PhoneExt"),
                self = this;
            S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").on("valuechange blur", function (e) {
                var arr_phones = [],
                    vPhoneSection = S.trim(ele_phoneSection.val()),
                    vPhoneCode = S.trim(ele_phoneCode.val()),
                    vPhoneExt = S.trim(ele_phoneExt.val());

                vPhoneSection && (arr_phones[0] = vPhoneSection),
                    vPhoneCode && (arr_phones[1] = vPhoneCode),
                    vPhoneExt && (arr_phones[2] = vPhoneExt),
                    ele_phone.val(arr_phones.join("-")),
                    S.one(e.currentTarget).hasClass("input-err") && self.validatePhone()
            }),
                S.all("#J_PostCode").on("valuechange blur", function (e) {
                    S.one(e.currentTarget).hasClass("input-err") && self._validate(e.currentTarget, self.msgPostCode)
                }),

                S.all("#J_Street").on("valuechange blur",function (e) {
                    S.one(e.currentTarget).hasClass("input-err") && self._validate(e.currentTarget, self.msgStreet, 1)
                }).on("blur", function () {
                        self._validateDivisionMatchStreet()
                    }),

                S.all("#J_Name").on("valuechange blur", function (e) {
                    S.one(e.currentTarget).hasClass("input-err") && self._validate(e.currentTarget, self.msgName, 1)
                }),
                S.all("#J_Mobile").on("valuechange blur", function (e) {
                    S.one(e.currentTarget).hasClass("input-err") && self.validateMobile()
                }),

                S.all("body").delegate("click", "#J_SelectCode", function (e) {
                    e.halt();
                    var i = S.one(e.currentTarget), n = i.attr("data-code");
                    if (n = n ? n.split("_") : null, n && !(2 > n.length) && self.division) {
                        self.division.focus({id: n[0]}, {id: n[1]});
                        try {
                            (new Image).src = "http://gm.mmstat.com/member.6.3"
                        } catch (e) {
                        }
                    }
                })
        }, _submit: function () {
            var self = this;
            this.form.on("submit", function (e) {
                e.halt();
                var i = self.validateDivision(!0),
                    n = self._validate("#J_PostCode", self.msgPostCode),
                    o = self._validate("#J_Street", self.msgStreet, 1),
                    a = self._validate("#J_Name", self.msgName, 1),
                    s = self.validateMobile(),
                    r = self.validatePhone();
                return i && n && o && a && s && r ? (self._post(), void 0) : (self._autoAdaptIframe(), void 0)
            })
        }, _post: function () {
            var e = this;
            S.IO({url: this.api, type: "post", form: this.form, dataType: "json", data: {_tb_token_: this.token, id: this.id}, timeout: 2, complete: function (t) {
                t && t.success ? o({buttons: {ok: "\u786e\u5b9a"}, text: '<div class="msg msg-ok msg-weak"><i></i><div class="msg-cnt">\u64cd\u4f5c\u6210\u529f\uff01</div></div>', mask: !0}).show().on("ok", function () {
                    window.top.location.assign((l ? "http://member1.daily.taobao.net/" : "http://member1.taobao.com/") + "member/fresh/deliver_address.htm")
                }) : n("#J_MsgGlobal").error({title: "\u64cd\u4f5c\u5931\u8d25\uff01", content: t && t.msg && i ? i[t.msg] || "\u7cfb\u7edf\u9519\u8bef\uff0c\u8bf7\u91cd\u8bd5\uff01" : "\u7cfb\u7edf\u9519\u8bef\uff0c\u8bf7\u91cd\u8bd5\uff01"}), e._autoAdaptIframe()
            }})
        }, submit: function () {
            this.form.fire("submit")
        }, _validate: function (e, i, n) {
            e = S.one(e);
            var o = e && RegExp(e.attr("data-pattern")), a = e && e.attr("data-item");
            return e && o ? a && "postcode" === a && !e.val() ? (i && i.hide(), e.removeClass("input-err"), !0) : o.test(n ? e.val().replace(/[^\x00-\xff]/g, "**") : e.val()) ? (i && i.hide(), e.removeClass("input-err"), !0) : (e.addClass("input-err"), i && i.error(e.attr("data-msg") || ""), !1) : !1
        }, _validateDivisionMatchStreet: function () {
            var e = this._paramDivision(), i = this;
            return e.addr = S.all("#J_Street").val(), (e.l4 || e.l3 || e.l2 || e.l1) && e.addr ? (S.IO({url: d + "/locationservice/addr/validateAddress.do", data: e, dataType: "jsonp", scriptCharset: "utf-8", timeout: 2, complete: function (t) {
                return t && t.result && t.code ? (i.msgDivision.attention("\u4f60\u8f93\u5165\u7684\u884c\u653f\u533a\u548c\u8857\u9053\u5730\u5740\u4e0d\u5339\u914d\uff0c\u662f\u5426\u662f\uff1a<a href='nogo' id='J_SelectCode' data-code='" + t.code + "'>" + t.result + "</a>"), i._autoAdaptIframe(), void 0) : (i.msgDivision.hide(), i._autoAdaptIframe(), void 0)
            }}), void 0) : (this.msgDivision.hide(), this._autoAdaptIframe(), void 0)
        }, validateDivision: function (t) {
            if (!this.division)return!1;
            var e = this.division.val();
            for (var i in e)if (!e[i] && "town" !== i)return this.msgDivision.error("\u8bf7\u9009\u62e9\u5730\u533a"), !1;
            return this.msgDivision.hide(), t || this._validateDivisionMatchStreet(), !0
        },
        validateMobile: function () {
            var ele_mobile = S.one("#J_Mobile"),
                ele_phone = S.one("#J_Phone"),
                pattern_4_mobile = ele_mobile && RegExp(ele_mobile.attr("data-pattern")),
                msg_4_mobile = this.msgMobile;

            if (!S.trim(ele_mobile.val()) && ele_phone && ele_phone.val()) {
                msg_4_mobile && msg_4_mobile.hide();
                ele_mobile.removeClass("input-err");
                return true;
            } else {
                if (ele_mobile && pattern_4_mobile) {
                    if (pattern_4_mobile.test(ele_mobile.val())) {
                        msg_4_mobile && msg_4_mobile.hide();
                        ele_mobile.removeClass("input-err");
                        return true;
                    } else {
                        ele_mobile.addClass("input-err");
                        msg_4_mobile && msg_4_mobile.error(ele_mobile.attr("data-msg") || "");
                        return false;
                    }

                } else {
                    return false;
                }


            }
            /*        return!S.trim(ele_mobile.val()) && ele_phone && ele_phone.val()
             ? (msg_4_mobile && msg_4_mobile.hide(), ele_mobile.removeClass("input-err"), !0)
             : ele_mobile && pattern_4_mobile
             ? pattern_4_mobile.test(ele_mobile.val())
             ? (msg_4_mobile && msg_4_mobile.hide(), ele_mobile.removeClass("input-err"), !0)
             : (ele_mobile.addClass("input-err"), msg_4_mobile && msg_4_mobile.error(ele_mobile.attr("data-msg") || ""), !1)
             : !1*/
        },
        validatePhone: function () {
            var ele_phone = S.one("#J_Phone"),
                ele_mobile = S.one("#J_Mobile"),
                pattern_4_phone = ele_phone && RegExp(ele_phone.attr("data-pattern")),
                msg_4_phone = this.msgPhone;

            if (!S.trim(ele_phone.val()) && ele_mobile && ele_mobile.val()) {
                msg_4_phone && msg_4_phone.hide();
                ele_phone.removeClass("input-err");
                return true;
            } else {
                if (ele_phone && pattern_4_phone) {
                    if (ele_phone.val()) {
                        if (pattern_4_phone.test(ele_phone.val())) {
                            S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").removeClass("input-err");
                            msg_4_phone && msg_4_phone.hide();
                            return true;
                        } else {
                            S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").addClass("input-err");
                            msg_4_phone && msg_4_phone.error(ele_phone.attr("data-msg") || "");
                            return false;
                        }

                    } else {
                        S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").removeClass("input-err");
                        msg_4_phone && msg_4_phone.hide();
                        return true;
                    }

                } else {
                    return true;
                }

            }
            /*        return!S.trim(ele_phone.val()) && ele_mobile && ele_mobile.val()
             ?
             (msg_4_phone && msg_4_phone.hide(), ele_phone.removeClass("input-err"), !0)
             :
             ele_phone && pattern_4_phone
             ? ele_phone.val()
             ?pattern_4_phone.test(ele_phone.val())
             ? (S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").removeClass("input-err"), msg_4_phone && msg_4_phone.hide(), !0)
             : (S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").addClass("input-err"), msg_4_phone && msg_4_phone.error(ele_phone.attr("data-msg") || ""), !1)
             : (S.all("#J_PhoneSection, #J_PhoneCode, #J_PhoneExt").removeClass("input-err"), msg_4_phone && msg_4_phone.hide(), !0)
             : !0*/
        },
        _autoAdaptIframe: function () {
            try {
                window.top.document.getElementById("J_DeliverIframe").style.height = S.one("#J_FormBox").height() + "px"
            } catch (e) {
                S.log(e)
            }
        }
    }), c
}, {requires: ["node", "event", "ajax", "placeholder", "message", "xdialog", "xtemplate/runtime", "tpl/form-xtpl", "combobox"]}),

 KISSY.use("deliver", function (t, e) {
    window.deliver = e(t.merge(window.CONFIG, {title: !0}))
});