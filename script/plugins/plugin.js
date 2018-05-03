!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):a("object"==typeof exports?require("jquery"):jQuery)}(function(a){let b,c=navigator.userAgent,d=/iphone/i.test(c),e=/chrome/i.test(c),f=/android/i.test(c);a.mask={definitions:{9:"[0-9]",a:"[A-Za-z]","*":"[A-Za-z0-9]"},autoclear:!0,dataName:"rawMaskFn",placeholder:"_"},a.fn.extend({caret:function(a,b){let c;if(0!==this.length&&!this.is(":hidden"))return"number"==typeof a?(b="number"==typeof b?b:a,this.each(function(){this.setSelectionRange?this.setSelectionRange(a,b):this.createTextRange&&(c=this.createTextRange(),c.collapse(!0),c.moveEnd("character",b),c.moveStart("character",a),c.select())})):(this[0].setSelectionRange?(a=this[0].selectionStart,b=this[0].selectionEnd):document.selection&&document.selection.createRange&&(c=document.selection.createRange(),a=0-c.duplicate().moveStart("character",-1e5),b=a+c.text.length),{begin:a,end:b})},unmask:function(){return this.trigger("unmask")},mask:function(c,g){let h,i,j,k,l,m,n,o;if(!c&&this.length>0){h=a(this[0]);let p=h.data(a.mask.dataName);return p?p():void 0}return g=a.extend({autoclear:a.mask.autoclear,placeholder:a.mask.placeholder,completed:null},g),i=a.mask.definitions,j=[],k=n=c.length,l=null,a.each(c.split(""),function(a,b){"?"==b?(n--,k=a):i[b]?(j.push(new RegExp(i[b])),null===l&&(l=j.length-1),k>a&&(m=j.length-1)):j.push(null)}),this.trigger("unmask").each(function(){function h(){if(g.completed){for(let a=l;m>=a;a++)if(j[a]&&C[a]===p(a))return;g.completed.call(B)}}function p(a){return g.placeholder.charAt(a<g.placeholder.length?a:0)}function q(a){for(;++a<n&&!j[a];);return a}function r(a){for(;--a>=0&&!j[a];);return a}function s(a,b){let c,d;if(!(0>a)){for(c=a,d=q(b);n>c;c++)if(j[c]){if(!(n>d&&j[c].test(C[d])))break;C[c]=C[d],C[d]=p(d),d=q(d)}z(),B.caret(Math.max(l,a))}}function t(a){let b,c,d,e;for(b=a,c=p(a);n>b;b++)if(j[b]){if(d=q(b),e=C[b],C[b]=c,!(n>d&&j[d].test(e)))break;c=e}}function u(){let a=B.val(),b=B.caret();if(o&&o.length&&o.length>a.length){for(A(!0);b.begin>0&&!j[b.begin-1];)b.begin--;if(0===b.begin)for(;b.begin<l&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}else{for(A(!0);b.begin<n&&!j[b.begin];)b.begin++;B.caret(b.begin,b.begin)}h()}function v(){A(),B.val()!=E&&B.change()}function w(a){if(!B.prop("readonly")){let b,c,e,f=a.which||a.keyCode;o=B.val(),8===f||46===f||d&&127===f?(b=B.caret(),c=b.begin,e=b.end,e-c===0&&(c=46!==f?r(c):e=q(c-1),e=46===f?q(e):e),y(c,e),s(c,e-1),a.preventDefault()):13===f?v.call(this,a):27===f&&(B.val(E),B.caret(0,A()),a.preventDefault())}}function x(b){if(!B.prop("readonly")){let c,d,e,g=b.which||b.keyCode,i=B.caret();if(!(b.ctrlKey||b.altKey||b.metaKey||32>g)&&g&&13!==g){if(i.end-i.begin!==0&&(y(i.begin,i.end),s(i.begin,i.end-1)),c=q(i.begin-1),n>c&&(d=String.fromCharCode(g),j[c].test(d))){if(t(c),C[c]=d,z(),e=q(c),f){let k=function(){a.proxy(a.fn.caret,B,e)()};setTimeout(k,0)}else B.caret(e);i.begin<=m&&h()}b.preventDefault()}}}function y(a,b){let c;for(c=a;b>c&&n>c;c++)j[c]&&(C[c]=p(c))}function z(){B.val(C.join(""))}function A(a){let b,c,d,e=B.val(),f=-1;for(b=0,d=0;n>b;b++)if(j[b]){for(C[b]=p(b);d++<e.length;)if(c=e.charAt(d-1),j[b].test(c)){C[b]=c,f=b;break}if(d>e.length){y(b+1,n);break}}else C[b]===e.charAt(d)&&d++,k>b&&(f=b);return a?z():k>f+1?g.autoclear||C.join("")===D?(B.val()&&B.val(""),y(0,n)):z():(z(),B.val(B.val().substring(0,f+1))),k?b:l}let B=a(this),C=a.map(c.split(""),function(a,b){return"?"!=a?i[a]?p(b):a:void 0}),D=C.join(""),E=B.val();B.data(a.mask.dataName,function(){return a.map(C,function(a,b){return j[b]&&a!=p(b)?a:null}).join("")}),B.one("unmask",function(){B.off(".mask").removeData(a.mask.dataName)}).on("focus.mask",function(){if(!B.prop("readonly")){clearTimeout(b);let a;E=B.val(),a=A(),b=setTimeout(function(){B.get(0)===document.activeElement&&(z(),a==c.replace("?","").length?B.caret(0,a):B.caret(a))},10)}}).on("blur.mask",v).on("keydown.mask",w).on("keypress.mask",x).on("input.mask paste.mask",function(){B.prop("readonly")||setTimeout(function(){let a=A(!0);B.caret(a),h()},0)}),e&&f&&B.off("input.mask").on("input.mask",u),A()})}})});
let shipping = 0, price = 0, file = '-1', user = 0, scrollTrigger = true;
$('#close-button').add('#modal-overlay').on('click', function () {$('#modal_form').animate({opacity: 0}, 579).addClass('closed');$('#modal-overlay').addClass('closed');if(user) document.location.href='/you';});
function loadingActive(){$('.page_loading').addClass('is-active');$('.questionnaire__progress').addClass('loading');}function loadingNoActive() {$('.page_loading').removeClass('is-active');$('.questionnaire__progress').removeClass('loading');}
function scroll() {let width = document.documentElement.clientWidth, index = 129;if (width > 752 && width < 974) index = 99;if ($(window).scrollTop() > 129 || index == 99) {if (scrollTrigger) {let card_0 = $('#ul-id-cart-0');card_0.css('top', '18px');if (card_0.css('top') == 18) {scrollTrigger = false;}}} else {let pos = index - $(window).scrollTop() + 18;$('#ul-id-cart-0').css('top', pos);scrollTrigger = true;}}
function modal(title, text) {$('#modalTitle').html(title);$('#modal_form').removeClass('closed').animate({opacity: 1}, 555);$('#modal-overlay').removeClass('closed');$('#messageForUser').html(text);}
function error(title = 'Упс...') {let text = "Произошла внутреняя ошибка сайта.<br>Просим прощения за доставленные неудобства.";modal(title, text);loadingNoActive();}
function decoding(data) {data = data.replace(/\n/g, "<br>");data = data.replace(/\//g, "\/");data = data.replace(/\\/g, "\\\\");data = data.replace(/\"/g, "&quot;");data = data.replace(/`/g, "&quot;");return data;}
function addProduct(prod) {
    let dat = '{"name":"orderAdd","id":"' + prod.dataset.productId + '","price":"' + prod.dataset.priceValue + '",' +
        '"img":"' + prod.dataset.productQuantity + '","nameP":"' + prod.dataset.productTitle + '"}';loadingActive();
    $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
        data = JSON.parse(data);
        if (data.state == 1) {
            scroll();
            if (document.location.pathname != '/order') {
                $('#ul-id-cart-0').show(555);$('#price').html(data.price);$('#countShop').html(data.count);
                if(data.statusOrder){modal('Информация', 'К сожалению на нашем сайте стоит ограничение на количество покупаемых товаров.<br> У нас вы можете приобрести не более 99 единиц одного товара.<br> Благодарим за понимание.')}
            } else {
                let id = prod.id.substring(4, prod.id.length);
                if(data.statusOrder){modal('Информация', 'К сожалению на нашем сайте стоит ограничение на количество покупаемых товаров.<br> У нас вы можете приобрести не более 99 единиц одного товара.<br> Благодарим за понимание.')}
                $('#' + id + '_count').html(data.idCount);$('#' + id + '_price').html(data.idPrice);
                $('#resultSumOrder').html(data.price);$('#resultCountOrder').html(data.count);$('#sumOrder').html(data.price);
                if (!shipping) $('#SumOrderAll').html(data.price); else $('#SumOrderAll').html(data.price + 300);
            }price = data.price;
        }loadingNoActive();
    }).fail(() => {error();});
}
(function ($, window, document, undefined) {
    let pluginName = 'main', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.temp = 0;this.trigger = false;this.triggerYet = false;
        this.init();
    };
    Plugin.prototype = {
        hello: function () {
            let start = '{"name":"isOrder"}';
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: start}).done((data) => {
                data = JSON.parse(data);
                if (data.state == 1 && data.price > 0) {
                    if (document.location.pathname != '/order') {
                        scroll();$('#ul-id-cart-0').show(789);$('#price').html(data.price);$('#countShop').html(data.count);
                    }price = data.price;
                }
                if (data.userStart == 0) {$('#ul-id-hello').show(1107).hide(1711);this.temp = 1;}
            }).fail(() => {error();});
        },
        isScroll: function () {if (price) scroll();},
        weather: function () {
            let where = document.referrer;
            if (where == 0) this.temp = 1; else {if (!this.temp) {if (where.indexOf('islandgift.ru') == -1) this.temp = 1; else this.temp = 0;}}
            if (this.temp) {
                let weather = '{"name":"weather"}';
                $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: weather}).done((data) => {
                    data = JSON.parse(data);$('#weatherText').html(data.msg);$('#ul-id-weather').show(2017).hide(2017);
                }).fail(() => {error();});
            }
        },
        removeOrder: function (e) {
            e.preventDefault();
            let dat = '{"name":"orderRemoveAll"}';
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.state == 1) {$('#ul-id-cart-0').hide(555);$('#price').html(data.price);price = data.price;}
            }).fail(() => {error()});
        },
        mainMenu_main: function () {
            if (!this.trigger) $('#ul-id-mainmenu-main').addClass('ul-w-mainmenu-collapse-in');
            else $('#ul-id-mainmenu-main').removeClass('ul-w-mainmenu-collapse-in');
            this.trigger = !this.trigger;
        },
        exit: function (e) {
            e.preventDefault();
            let dat = '{"name":"exit"}';
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {document.location.href = '/';}
            }).fail(() => {error()});
        },
        imageZoom: function (e) {
            e.preventDefault();
            let src = $(this).attr('src');
            $('body').append('<div id="overlay"></div><div id="magnify"><img src="' + src + '"><div class="closeModal" id="close-popup"><i></i></div></div>');
            let imageIn_Zoom = $('#magnify');
            imageIn_Zoom.css({
                left: ($(document).width() - imageIn_Zoom.outerWidth()) / 2,
                top: ($(window).height() - imageIn_Zoom.outerHeight()) / 2,
                textAlign: 'center'
            });
            $('#overlay, #magnify').fadeIn('fast');
        },
        closeImageZoom: function (e) {
            e.preventDefault();
            $('#overlay, #magnify').fadeOut('fast', function () {
                $('#close-popup, #magnify, #overlay').remove();
            });
        },
        init: function () {
            $(window).on("scroll", $.proxy(this.isScroll, this));
            $('.ul-w-mainmenu-toggle-button').on('click', $.proxy(this.mainMenu_main, this));//$('.ul-w-mainmenu-toggle-more').on('click', $.proxy(this.mainMenu_toggle, this));
            $('#remove-order').on('click', $.proxy(this.removeOrder, this));$('#exit').on('click', $.proxy(this.exit, this));
            $(window).resize($.proxy(this.isScroll, this));this.hello();this.weather();
            $('.imgZoom').on('click', this.imageZoom);$('body').on('click', '#close-popup, #overlay', this.closeImageZoom);
        }
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Registration', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.authorization = $('#avt');this.registration = $('#reg');
        this.init();
    };
    Plugin.prototype = {
        showAuthorization: function (e) {
            e.preventDefault();
            this.registration.hide(999);this.authorization.show(999);
            $('html').animate({scrollTop: $('#ul-id-6-6').offset().top}, 1100);
        },
        showRegistration: function (e) {
            e.preventDefault();
            this.authorization.hide(999);this.registration.show(999);
            $('html').animate({scrollTop: $('#ul-id-6-6').offset().top}, 1100);
        },
        userAuthorization: function () {
            let dat = '{"name":"Authorization","avtLogin":"';
            dat += decoding($('#avtLogin').val());dat += '","avtPassword":"';
            dat += decoding($('#avtPass').val());dat += '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {document.location.href = data.href;} else {let text = "Не правильный логин или пароль!<br>Перепроверьте все данные и попробуйте еще раз.";modal('Ошибка!', text);}loadingNoActive();
            }).fail(() => {error()});
        },
        logIn: function(){
            if(event) {
                if (event.keyCode == 13) {
                    this.userAuthorization()
                }
            }
        },
        isLogin: function () {
            if($('#login').is(':focus')) {
                let login = '{"name": "avt", "data": "';login += decoding($(this).val());login += '"}';
                $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: login}).done((data) => {
                    data = JSON.parse(data);let img = '<img style="width:32px;" src="';
                    if (data.status == '1') {img += 'img/status/ok.png';} else {img += 'img/status/error.png';}img += '">';
                    $('#imgstate').html(img);$('#textstate').text(data.text);
                }).fail(() => {
                    $('#textstate').text('Данное имя уже занято');
                });
            }
        },
        init: function () {
            $('#authorization').on('click', $.proxy(this.showAuthorization, this));$('#registration').on('click', $.proxy(this.showRegistration, this));
            $('#authorizationUser').on('click', $.proxy(this.userAuthorization, this));
            $('#login').keyup(this.isLogin).keyup();$('#phone').mask("+7 (999) 999-9999");
            $('#avtPass').keyup($.proxy(this.logIn, this)).keyup();
        }
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Reviews', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {
        sendReviews: function (e) {
            e.preventDefault();
            let dat = '{"name":"reviews","userName":"';let message = decoding($('#userMessage').val());dat += decoding($('#userName').val());
            dat += '","userMail":"';dat += decoding($('#userMail').val());
            dat += '","userMessage":"';dat += message;dat += '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {let text = decoding($('#userName').val()) + "<br>Благодарим вас за отзыв.<br>Мы обязательно прислушаемся к вашему мнению и приложим все улилия что бы использование нашего сайта стало более комфортным для Вас.";modal('Благодарим за отзыв!', text);
                } else {let text = "Не заполнены обязательные поля, или в поле присутствует ошибка.<br>Перепроверьте все данные и попробуйте еще раз.";modal('Ошибка!', text);
                    let message = $('#userMessage');message.addClass('error');let mail = $('#userMail');$('html').animate({scrollTop: mail.offset().top}, 1100);mail.addClass('error');
                }loadingNoActive();
            }).fail(() => {error()});
        },
        init: function () {$('#sendReviews').on('click', $.proxy(this.sendReviews, this));}
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'ReviewsOrder', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {
        sendReviewsOrder: function (e) {
            e.preventDefault();
            let dat = '{"name":"reviewsOrder","userName":"';
            let message = decoding($('#Message').val());dat += decoding($('#Name').val());
            dat += '","userMail":"';dat += decoding($('#Mail').val());
            dat += '","orderNumber":"';dat += decoding($('#orderNumber').val());
            dat += '","userMessage":"';dat += message;
            dat += '"' + ',"userId":"' + decoding($(this)[0].dataset.userId) + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {let text = decoding($('#userName').val()) + "<br>Благодарим вас за отзыв.<br>Надеемся что вы остались довольны, и в следующий раз снова обратитесь к нам.";modal('Благодарим за отзыв!', text);} else {
                    let text = "Не заполнены обязательные поля, или в поле присутствует ошибка.<br>Перепроверьте все данные и попробуйте еще раз.";modal('Ошибка!', text);
                    let message = $('#Message');message.addClass('error');let mail = $('#Mail');$('html').animate({scrollTop: message.offset().top}, 1100);mail.addClass('error');
                }loadingNoActive();
            }).fail(() => {error()});
        },
        init: function () {$('#sendReviewsOrder').on('click', this.sendReviewsOrder);}
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Product', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;this.yandex = 0;this.init();
    };
    let statusNew = 3;let statusCheaper = 3;
    function finds(id) {let find = decoding($('#findProduct'+id).val());let dat = '{"name":"findProduct","id":"' + id + '","find":"' + find + '","statusNew":"'+statusNew+'","statusCheaper":"'+statusCheaper+'"}';loadingActive();$.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {data = JSON.parse(data);if (data.status == 1) {$('#ul-id-8-36').show(769).html(data.text);$('#notFind').hide(769);$('[id*=addGift_]').on('click', function (e) {e.preventDefault();addProduct($(this)[0]);});$('[id*=pageFind_]').on('click',Plugin.prototype.pageFind)} else if (data.status == 0) {let text = '<h4 style="margin-top: 25px;text-align: center;width: 100%;">Сожалеем, но мы не смогли ничего найти.😞 Попробуйте написать нам и ма с радостью вам поможем.</h4>';$('#ul-id-8-36').show(579).html(text);$('#notFind').hide(579);} else {$('#ul-id-8-36').hide(999);$('#notFind').show(999);}loadingNoActive();}).fail(() => {error()});}
    Plugin.prototype = {
        add: function (e) {e.preventDefault();addProduct($(this)[0]);},
        remove: function (e) {
            e.preventDefault();
            let dat = '{"name":"orderRemove","id":"' + $(this)[0].dataset.productId + '","price":"' + $(this)[0].dataset.priceValue + '",' +
                '"img":"' + decoding($(this)[0].dataset.productQuantity) + '","nameP":"' + decoding($(this)[0].dataset.productTitle) + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.state == 1) {
                    if (document.location.pathname != '/order') {$('#ul-id-cart-0').show(555);$('#price').html(data.price);$('#countShop').html(data.count);} else {
                        let id = $(this)[0].id.substring(7, $(this)[0].id.length);
                        $('#' + id + '_count').html(data.idCount);$('#' + id + '_price').html(data.idPrice);
                        $('#resultSumOrder').html(data.price);$('#sumOrder').html(data.price);$('#resultCountOrder').html(data.count);
                        if (!shipping) $('#SumOrderAll').html(data.price); else $('#SumOrderAll').html(Number(data.price) + Number(300));
                        if (data.idCount <= 0) {$('#' + id + '_tr').hide(555);}if (data.count <= 0) {document.location.href = '/gift';}
                    }price = data.price;
                }loadingNoActive();
            }).fail(() => {error();});
        },
        removeProduct: function (e) {
            e.preventDefault();
            let dat = '{"name":"orderRemoveProduct","id":"' + $(this)[0].dataset.productId + '","price":"' + $(this)[0].dataset.priceValue + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.state == 1) {
                    if (document.location.pathname != '/order') {$('#ul-id-cart-0').show(555);$('#price').html(data.price);$('#countShop').html(data.count);if (data.idCount <= 0) {document.location.href = '/gift';}} else {
                        let id = $(this)[0].id.substring(14, $(this)[0].id.length);
                        $('#sumOrder').html(data.price);$('#resultSumOrder').html(data.price);$('#resultCountOrder').html(data.count);
                        $('#' + id + '_tr').hide(555);
                        if (!shipping) $('#SumOrderAll').html(data.price); else $('#SumOrderAll').html(Number(data.price) + Number(300));
                        if (data.count <= 0) {document.location.href = '/gift';}
                    }price = data.price;
                }loadingNoActive();
            }).fail(() => {error();});
        },
        createOrder: function (e) {
            e.preventDefault();
            let userName = decoding($('#orderName').val());let userMail = decoding($('#orderMail').val());let userMess = decoding($('#orderMessage').val());
            let dat = '{"name":"createOrder","shipping":"' + shipping + '","orderName":"' + userName + '",' +
                '"orderMail":"' + userMail + '","orderMess":"' + userMess + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status != 0) {
                    if (document.location.pathname == '/order' || document.location.pathname == '/order.php') {if (this.yandex) {document.location.href = 'pay.php?mail=' + userMail + '&id=' + data.status + '&price=' + price + '&name=' + userName;} else document.location.href = 'success.php?name=' + userName + '&mail=' + userMail;}
                } else {modal('Произошла ошибка при формировании вашего заказа.', data.msg);let mail = $('#orderMail');$('html').animate({scrollTop: mail.offset().top}, 1100);mail.addClass('error');}loadingNoActive();
            }).fail(() => {error()});
        },
        isShippingTrue: function () {if (!shipping) {$('#shipping').html(300);$('#SumOrderAll').html(Number(price) + Number(300));shipping = 1;}},
        isShippingFalse: function () {if (shipping) {$('#shipping').html(0);$('#SumOrderAll').html((price));shipping = 0;}},
        yandexOn: function () {if (!this.yandex) {this.yandex = 1;}},
        yandexOff: function () {if (this.yandex) {this.yandex = 0;}},
        findProduct: function () {
            if($(this).is(':focus')){
            let id = $(this)[0].id.substring(11, $(this)[0].id.length);let find = decoding($(this).val());
            let dat = '{"name":"findProduct","id":"' + id + '","find":"' + find + '"' +
                ',"statusNew":"'+statusNew+'","statusCheaper":"'+statusCheaper+'"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {$('#ul-id-8-36').show(999).html(data.text);$('#notFind').hide(999);$('[id*=addGift_]').on('click', function (e) {e.preventDefault();addProduct($(this)[0]);});
                } else if (data.status == 0) {let text = '<h4 style="margin-top: 25px;text-align: center;width: 100%;">Сожалеем, но мы не смогли ничего найти.😞 Попробуйте написать нам и ма с радостью вам поможем.</h4>';$('#ul-id-8-36').show(999).html(text);$('#notFind').hide(999);} else {$('#ul-id-8-36').hide(999);$('#notFind').show(999);}loadingNoActive();
            }).fail(() => {error()});}
        },
        page: function () {
            let id = $(this)[0].id.substring(5, $(this)[0].id.length);let countPage = $(this)[0].dataset.count;$('html').animate({scrollTop: $('#ul-id-5-4').offset().top}, 1100);
            for (let i=1;i<=countPage;i++){if(i==id){$('#page_'+i).addClass('is-active');$('#pageNumber_'+i).show(11);} else {$('#page_'+i).removeClass('is-active');$('#pageNumber_'+i).hide(11);}}
        },
        pageFind: function () {
            let id = $(this)[0].id.substring(9, $(this)[0].id.length);let countPage = $(this)[0].dataset.count;$('html').animate({scrollTop: $('#ul-id-5-4').offset().top}, 1100);
            for (let i=1;i<=countPage;i++){if(i==id){$('#pageFind_'+i).addClass('is-active');$('#pageNumberFind_'+i).show(11);} else {$('#pageFind_'+i).removeClass('is-active');$('#pageNumberFind_'+i).hide(11);}}
        },
        NewOnOld: function () {statusNew = $(this).val();let id=$(this)[0].id.substring(8,$(this)[0].id.length);finds(id);},
        CheaperOnExpensive: function () {statusCheaper = $(this).val();let id=$(this)[0].id.substring(18,$(this)[0].id.length);finds(id);},
        init: function () {
            $('[id*=add_]').on('click', this.add);$('[id*=remove_]').on('click', this.remove);$('[id*=removeProduct_]').on('click', this.removeProduct);
            $('#createOrder').on('click', $.proxy(this.createOrder,this));
            $('#isShippingTrue').on('click', $.proxy(this.isShippingTrue, this));$('#isShippingFalse').on('click', $.proxy(this.isShippingFalse, this));
            $('#yandexOn').on('click', $.proxy(this.yandexOn, this));$('#yandexOff').on('click', $.proxy(this.yandexOff, this));
            $('[id*=findProduct]').keyup(this.findProduct).keyup();$('[id*=page_]').on('click',this.page);$('[id*=NewOnOld]').on('change',this.NewOnOld);$('[id*=CheaperOnExpensive]').on('change',this.CheaperOnExpensive);
        }
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'generateGift', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {
        generateGift: function (e) {
            e.preventDefault();
            let dat = '{"name":"generateGift",' + '"isGift":"' + decoding($('#isGift').val()) + '",' + '"isLove":"' + decoding($('#isLove').val()) + '",' + '"budget":"' + decoding($('#budget').val()) + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                let text = '';
                if (data.status == 1) {text = data.text;} else {text = '<h4 style="margin-top: 25px;text-align: center; width: 100%;">Сожалеем, но мы не смогли ничего найти.😞 Попробуйте написать нам и ма с радостью вам поможем.</h4>'}
                let findProduct = $('#ul-id-36-89');if (findProduct.is(':visible')) {findProduct.hide(359);}findProduct.html(text).show(999);
                $('[id*=addGift_]').on('click', function (e) {e.preventDefault();addProduct($(this)[0]);});loadingNoActive();
            }).fail(() => {error();});
        },
        init: function () {$('#generateGift').on('click', this.generateGift);}
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'updatePassword', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {
        showUpdatePassword: function (e) {e.preventDefault();let updatepass = $('#updatePass');if (!updatepass.is(':visible')) updatepass.show(769); else updatepass.hide(769);},
        updatePassword: function (e) {
            e.preventDefault();let password = decoding($('#newPassword').val());let dat = '{"name":"newPassword","pass":"' + password + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);modal('Информация', data.msg);$('#updatePass').hide(769);loadingNoActive();
            }).fail(() => {error();});
        },
        init: function () {$('#showUpdatepass').on('click', $.proxy(this.showUpdatePassword, this));$('#updatePassword').on('click', $.proxy(this.updatePassword, this));}
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'updateUserInfo', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {
        updateUserData: function (e) {
            e.preventDefault();
            let about = decoding($('#about').val());
            let dat = '{"name":"updateUserData","newName":"' + decoding($('#newName').val()) + '",' +
                '"surname":"' + decoding($('#surname').val()) + '","patronymic":"' + decoding($('#patronymic').val()) + '",' +
                '"sex":"' + $('#sex').val() + '","city":"' + decoding($('#city').val()) + '",' + '"birthday":"' + $('#birthday').val() + '","about":"' + about + '",' +
                '"mail":"' + decoding($('#mail').val()) + '","phone":"' + decoding($('#phone').val()) + '",' +
                '"file":"' + file + '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);modal('Информация', data.msg);user = 1;loadingNoActive();
            }).fail(() => {error();});
        },
        updateAvatar: function (e) {
            e.preventDefault();
            let img = $('#imgAvatar').prop('files')[0], form_data = new FormData();
            form_data.append('file', img);
            $('#fileDownloadInfo').html('Ваше фото загружается');loadingActive();
            $.ajax({
                url: '/islandgiftScript.php', dataType: 'text', cache: false, contentType: false, processData: false, data: form_data, type: 'post',
                success: function (data) {data = JSON.parse(data);file = data.file; if(file == -1){$('#fileDownloadInfo').css('color','red').html(data.Error);}else{$('#fileDownloadInfo').html('Ваша фотография успешно загружена')} loadingNoActive();}
            });
        },
        init: function () {$('#updateUserData').on('click', $.proxy(this.updateUserData, this));$('#updateAvatar').on('click', $.proxy(this.updateAvatar, this));$('#phone').mask("+7 (999) 999-9999");}
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'RestorePassword', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {
        restorePass: function () {
            let restore = '{"name":"restorePass","login":"';
            restore += decoding($('#Login').val()); restore += '","userName":"';
            restore += decoding($('#Name').val());restore += '"}';loadingActive();
            $.post('/islandgiftScript.php', {url: '/islandgiftScript.php', dataType: 'json', data: restore}).done((data) => {
                data = JSON.parse(data);modal('Восстановление пароля', data.msg);loadingNoActive();
            }).fail(() => {error()});
        },
        init: function () {
            $('#restore').on('click', $.proxy(this.restorePass, this));
        }
    };
    $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
})(jQuery, window, document);