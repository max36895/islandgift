'use strict';


define('widget-feedBack-view', ['jquery', 'U', 'goals/handlers', 'ul-fileinput', 'icon-set-loader', 'i18n-view', 'aDialog', 'css!/css/require/emailStatusDialog.css'], function (a, b, c, d, f, g, h) {
    var j = {
        name: 'feedBack-view',
        isShowCaptcha: !1,
        files: [],
        Captcha: {
            list: {},
            get: function () {
                return function (l, m) {
                    a.post('/api/captcha', {action: 'get'}, function (n) {
                        if (n[0] || !n[1] || !n[1].url)

                            return void console.log('get captcha error', n[0]);

                        var o = n[1];
                        a('#captcha-' + l.attr('id')).attr('src', o.url),
                            m();
                    });
                }
            }(),
            check: function () {
                return function (l) {
                    var m = l.attr('id');
                    return (

                        m, void 0);


                }
            }(),
            reset: function () {
                return function (l) {
                    var m = l.attr('id');
                    return (

                        m, void 0);


                }
            }()
        },


        opened: !1,


        $getWidget: function () {
            return function (l) {
                return l.closest('.ul-widget-feedBack');
            }
        }(),


        init: function () {
            return function () {


            }
        }(),


        initCaptcha: function () {
            return function () {
                var l = this;

                if (window.grecaptcha) {
                    var m = a('#js-captchaPublicKey').data('key');

                    m &&


                    a('.ul-w-feedBack-captchare-fuct').each(function () {
                        var n = a(this).attr('id');
                        l.Captcha.list[n] = window.grecaptcha.render(n, {sitekey: m});
                    });

                } else
                    setTimeout(function () {
                        l.initCaptcha();
                    }, 1e3);

            }
        }(),


        send: function () {
            return function (l, m, n) {
                var o = this,
                    p = {inputs: []};

                a('[ul-model]', l).each(function () {
                    var y = a(this),
                        z = y.attr('ul-model');

                    'inputs' === z.substr(0, 6) ? p.inputs.push(y.val()) :
                        p[z] = y.val();
                });

                var q = l.closest('.ul-widget-feedBack').attr('id');


                if (m = a.extend(!0, m, p), m.inputs) {
                    var s = [],
                        t = Object.keys(m.inputs).length - 1;
                    t = parseInt(Object.keys(m.inputs)[t]);
                    for (var u = 0; u <= t; u++)
                        s.push(m.inputs[u] || '');

                    m.inputs = JSON.stringify(s);
                }

                delete m.attachments;


                var v = new FormData;

                a.extend(!0, m, {siteUrl: b.params.siteUrl || b.params.site}, m);

                var w = l.attr('action');

                if (m.isCheck)
                    w = m.url,
                        delete m.url,
                        delete v.isCheck; else {
                    o.files = o.attachmentFile[q].getFileInput();
                    var x = o.files && Object.keys(o.files).length;
                    if (a('.js-file-input', l).hasClass('required') && !x)


                        return o.attachmentFile[q].clearInput(), o.attachmentFile[q].clearLabel(), void o.attachmentFile[q].errorMessage(g('all.required field'));


                    x &&
                    a.each(o.files, function (y, z) {
                        v.append('attachments', z);
                    });

                }

                a.each(m, function (y, z) {
                    v.append(y, z);
                }),

                    a.ajax({
                        method: 'post',
                        url: w,
                        data: v,
                        contentType: !1,
                        processData: !1,
                        success: function () {
                            return function (z) {
                                o.clearForm(l),

                                    z[0] ?
                                        o.info(l, 'server error', 1) :

                                        n(z[1]);

                            }
                        }()
                    });

            }
        }(),

        open: function () {
            return function (l) {
                var m = this;


                if (m.opened || (m.init(l), m.opened = !0), m.$el = a('#' + l), !m.$el || 0 == m.$el.length)

                    return console.log('el not found'), !1;

                var n = a('form', m.$el);


                if (f.loadIconSet('fontAwesome', function () {
                    }), window.constructorMode || window.previewMode || window.wizardTemplatePreviewMode)


                    return void n.on('submit.feedBack', function (u) {
                        u.preventDefault()
                    });


                var o = c.getHandlerFunction(m.$el.data('goalsData')),
                    p = a('.ul-w-feedBack-captcha'),
                    q = a('.js-file-input', n);

                0 < p.length && p.remove(),


                m.attachmentFile || (m.attachmentFile = {});

                var s = a.extend({
                        maxFilesCount: 20,
                        maxFileSize: 5
                    },
                    window.cache.publishedForm);

                m.attachmentFile[l] = new d({
                    $el: q,
                    allowedMimeTypes: ['text/plain', 'application/pdf', 'image/jpeg', 'image/png', 'image/gif', 'image/bmp', 'application/zip', 'application/x-zip-compressed', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'],


                    specialFileList: !0,
                    id: l,
                    maxFiles: s.maxFilesCount,
                    maxFileSize: 1024 * (1024 * s.maxFileSize),
                    maxSumSize: 1024 * (1024 * s.maxFileSize),
                    selectFile: function () {
                        return function () {

                        }
                    }(),
                    open: function () {
                        return function () {

                        }
                    }(),
                    error: function () {
                        return function () {
                        }
                    }()
                }),

                    m.attachmentFile[l].init(),


                    a('.ul-widget-feedBack-form-control[required]', n).on('change', function () {


                        if (/\/uwizard/i.test(window.location.toString())) return !1;

                        var u = a(this);
                        m.send(n, {url: '/api/feedBack/check', isCheck: !0}, function (v) {
                            if (v) {

                                var w = m.parseErrors(v.errors, [u.attr('ul-model')]);

                                if (w) ; else if (v.errors && v.errors.captcha && !m.isShowCaptcha) {
                                    var x = m.$getWidget(n);
                                    m.Captcha.get(x, function () {
                                        m.isShowCaptcha = !0;
                                    }),

                                        m.clearMessage(n);
                                }
                            }
                        });
                    }),

                    n.on('submit.feedBack', function (u) {
                        u.preventDefault(),
                            m.submitForm(n, o);
                    });


                var t = window.location.toString();

                t.match(/uwizard/) ||
                a.ajax({
                    url: '/api/feedBack/pass',
                    method: 'GET',
                    dataType: 'json',
                    error: function () {
                        return function () {

                        }
                    }(),
                    success: function () {
                        return function (v) {
                            var w =
                                '<input type="text" style="display: none;" value="" ul-model="' +


                                v.name + '" name="' +
                                v.name + '">';

                            n.append(w);
                        }
                    }()
                });


            }
        }(),


        infoTimer: null,


        submitForm: function () {
            return function (l, m) {
                var n = this,
                    o = l.closest('.ul-widget-feedBack').attr('id');
                return !

                    /\/uwizard/i.test(window.location.toString()) && (
                    a('button[type="submit"]').attr('disabled', 'disabled'),
                        n.send(l, {}, function (p) {
                            return (
                                a('button[type="submit"]').removeAttr('disabled'),
                                    p ?
                                        p.etext ? n.info(l, p.etext, 1) : void(

                                            p.ok && (

                                                p.afterMail && n.info(l, p.afterMail, 0),

                                                    n.clearMessage(l),
                                                    n.attachmentFile[o].clearInput(),
                                                    n.attachmentFile[o].clearLabel(),
                                                    m())) : void 0);

                        }), !1);


            }
        }(),

        info: function () {
            return function (l, m, n) {

                h.open({
                    wide: !1,
                    title: '',
                    data: '<h2>' + g('widgets.feedBack.name') + '</h2><div class="ul-feedBack-status-dialog">' + m + '</div>',
                    afterOpen: function () {
                        return function () {
                            a(document).trigger('openButtonOrderForm');
                        }
                    }(),
                    beforeClose: function () {
                        return function () {
                            a(document).trigger('closeButtonOrderForm');
                        }
                    }()
                }),


                n || l[0].reset();


            }
        }(),


        clearForm: function () {
            return function (l) {
                a('.ul-w-feedBack-captcha', l).removeClass('has-error'),
                    a('.ul-widget-feedBack-form-group', l).each(function () {
                        a(this).removeClass('has-error');
                    }),
                    a('.ul-widget-feedBack-responce', l).hide().text('');
            }
        }(),


        clearMessage: function () {
            return function (l) {
                a('[ul-model="message"]', l).val('');
            }
        }(),


        destroy: function () {
            return function () {
                a('form').off('submit.feedBack', this.submitForm);
            }
        }(),


        parseErrors: function () {
            return function (l, m) {
                if (l) {
                    var n = '',
                        o = m ? m : Object.keys(l);


                    return o.forEach(function (p) {
                        l[p] && ('captcha' == p ? a('.ul-w-feedBack-captcha').addClass('has-error') : a('[ul-model = "' + p + '"]').closest('.ul-widget-feedBack-form-group').addClass('has-error'), n += p + ' ' + l[p] + '\n')
                    }), n || !1;
                }
                return !1;

            }
        }()
    };


    return j;
});
//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map

//# sourceMappingURL=view.js.map
