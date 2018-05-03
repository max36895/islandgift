let file = '-1';
$('#close-button').add('#modal-overlay').on('click', function () {
    $('#modal_form').animate({opacity: 0}, 579).addClass('closed');
    $('#modal-overlay').addClass('closed');
});

function modal(title, text) {
    $('#modalTitle').html(title);
    $('#modal_form').removeClass('closed').animate({opacity: 1, top: '50%'}, 111);
    $('#modal-overlay').removeClass('closed');
    $('#messageForUser').html(text);
}

function error(title = 'Упс...') {
    let text = "Произошла внутреняя ошибка сайта.<br>Просим прощения за доставленные неудобства.";
    modal(title, text);
}

function decoding(data, trigger = 1) {
    data = data.replace(/\n/g, "<br>");
    data = data.replace(/\//g, "\/");
    data = data.replace(/\\/g, "\\\\");
    data = data.replace(/\t/g, "    ");
    data = data.replace(/&/g, "&amp;");
    if (trigger)
        data = data.replace(/\"/g, "&quot;");
    else
        data = data.replace(/\"/g, '\\\"');
    data = data.replace(/`/g, "&quot;");

    return data;
}

function encoding(data) {
    data = data.replace(/<br>/g, "\n");
    return data;
}

(function ($, window, document, undefined) {
    let pluginName = 'main', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.trigger = false;
        this.triggerYet = false;
        this.init();
    };
    Plugin.prototype = {
        mainMenu_main: function () {
            if (!this.trigger) $('#ul-id-mainmenu-main').addClass('ul-w-mainmenu-collapse-in');
            else $('#ul-id-mainmenu-main').removeClass('ul-w-mainmenu-collapse-in');
            this.trigger = !this.trigger;
        },
        mainMenu_toggle: function () {
            if (!this.triggerYet) $('.ul-w-mainmenu-toggle').addClass('active');
            else $('.ul-w-mainmenu-toggle').removeClass('active');
            this.triggerYet = !this.triggerYet;
        },
        review: function (e) {
            e.preventDefault();
            let dat = '{"name":"reviews","userName":"';
            dat += $('#userName').val();
            dat += '","userMail":"';
            dat += $('#userMail').val();
            dat += '","userMessage":"';
            dat += $('#userMessage').val();
            dat += '"}';

            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {
                    let text = $('#userName').val() + "<br>Благодарим вас за отзыв.<br>Мы обязательно прислушаемся к вашему мнению и приложим все улилия что бы использование нашего сайта стало более комфортным для Вас.";
                    modal('Благодарим за отзыв!', text);
                } else {
                    let text = "Не заполнены обязательные поля, или в поле присутствует ошибка.<br>Перепроверьте все данные и попробуйте еще раз.";
                    modal('Ошибка!', text);
                }
            }).fail(() => {
                error()
            });
        },
        exit: function (e) {
            e.preventDefault();
            let dat = '{"name":"exit"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {
                    document.location.href = '/';
                }
            }).fail(() => {
                error()
            });
        },
        message: function (e) {
            e.preventDefault();
            let dat = '{"name":"messageSend"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                if (data.status == 1) {
                    alert('yes');
                }
            }).fail(() => {
                error()
            });
        },
        init: function () {
            $('.ul-w-mainmenu-toggle-button').on('click', $.proxy(this.mainMenu_main, this));
            $('.ul-w-mainmenu-toggle-more').on('click', $.proxy(this.mainMenu_toggle, this));
            $('#remove-order').on('click', $.proxy(this.removeOrder, this));
            $('#exit').on('click', $.proxy(this.exit, this));
            $('#sendReviews').on('click', $.proxy(this.review, this));
            $('#sendMessage').on('click', $.proxy(this.message, this));
        }
    };
    $.fn[pluginName] = function (options) {
        let plugin = this.data(dataKey);
        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    }
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Articles', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.trigger = 1;
        this.init();
    };
    Plugin.prototype = {
        showArticleCreate: function () {
            $('#updateArticle').hide(777);
            $('#createArticle').show(777);
        },
        showArticleUpdate: function () {
            $('#createArticle').hide(777);
            $('#updateArticle').show(777);
        },
        findArticle: function () {
            //if ($(this).is(':focus')) {
            let product = '{"name": "findArticle", "dat": "';
            product += decoding($(this).val());
            product += '"}';

            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: product}).done((data) => {
                data = JSON.parse(data);
                data.text = encoding(data.text);
                $('#text').html(data.text);

                $('[id*=upload_A]').on('click', function () {
                    let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                    let img = $('#img' + id).prop('files');
                    file = '';
                    let fileDownloadInfo = '';
                    for (let i = 0; i < img.length; i++) {
                        let form_data = new FormData();
                        form_data.append('fileArticles', img[i]);
                        $('#fileArticleDownload' + id).html('Файл ' + img[i]['name'] + ' загружается');

                        $.ajax({
                            url: 'Articles.php',
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (data) {
                                data = JSON.parse(data);
                                file += data.file + ';';
                                if (data.file != -1)
                                    fileDownloadInfo += 'Файл ' + data.file + ' успешно загружен<br>';
                                else
                                    fileDownloadInfo += 'Файл ' + data.file + ' не загружен<br>';
                                $('#fileArticleDownload' + id).html(fileDownloadInfo);
                            }
                        });
                    }
                });
                $('[id*=imgArt_]').on('click', function () {
                    let id = $(this)[0].id.substring(7, $(this)[0].id.length);
                    let imgProduct = $(this)[0].dataset.imageProduct;
                    let img = $('#artImg' + id).prop('files');
                    file = '';
                    for (let i = 0; i < img.length; i++) {
                        let form_data = new FormData();
                        form_data.append('fileArticles', img[i]);
                        $.ajax({
                            url: 'Articles.php',
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (data) {
                                data = JSON.parse(data);
                                if (data.file != -1) {
                                    let dat = '{"name":"updateImgArticle","id":"' + id + '","file":"' + data.file + '","filePrev":"' + imgProduct + '"}';
                                    $.post('admin.php', {
                                        url: 'admin.php',
                                        dataType: 'json',
                                        data: dat
                                    }).done((data) => {
                                        data = JSON.parse(data);
                                        modal("Информация", data.msg);
                                    }).fail(() => {
                                        error();
                                    });
                                }
                                else
                                    modal('Ошибка', 'Картинка не загружена');
                            }
                        });
                    }
                });

                $('[id*=update_A]').on('click', function () {
                    let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                    let incomplete = decoding($("#articleIncomplete" + id).val());
                    let text = decoding($("#articleText" + id).val());
                    let dat = '{"name":"updateArticle","id":"' + id + '",' +
                        '"articleTitle":"' + decoding($("#articleTitle" + id)[0].value) + '", ' +
                        '"url":"' + $('#articleUrl' + id)[0].value + '",' +
                        '"incomplete":"' + incomplete + '",' +
                        '"text":"' + text + '",' +
                        '"description":"' + $('#articleDescription' + id)[0].value + '",' +
                        '"file":"' + file + '"' +
                        ',"author":"' + $('#articleAuthor' + id)[0].value + '"}';
                    $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                        data = JSON.parse(data);
                        modal("Информация", data.msg);
                        file = -1;
                    }).fail(() => {
                        error();
                    });
                });
                $('[id*=remove_A]').on('click', function () {
                    let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                    let dat = '{"name":"removeArticle","id":"' + id + '"}';
                    $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                        data = JSON.parse(data);
                        modal("Информация", data.msg);
                        $('#articleId' + id).hide(597);
                    }).fail(() => {
                        error();
                    });
                });
            }).fail(() => {
                error()
            });
            //}
        },
        showArticleOption: function () {
            if (this.trigger) {
                $('#option').show(555);
            } else {
                $('#option').hide(555);
            }
            this.trigger = !this.trigger;
        },
        init: function () {
            $('#ButtonArticleCreate').on('click', $.proxy(this.showArticleCreate, this));
            $('#ButtonArticleUpdate').on('click', $.proxy(this.showArticleUpdate, this));
            $('#ArticleOption').on('click', $.proxy(this.showArticleOption, this));
            $('#articleFind').keyup(this.findArticle).keyup();
        }
    };
    $.fn[pluginName] = function (options) {
        let plugin = this.data(dataKey);
        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    }
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Product', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        file = '-1';
        this.init();
    };
    Plugin.prototype = {
        findProduct: function () {
            if ($(this).is(':focus')) {
                let product = '{"name": "findProduct", "dat": "';
                product += decoding($(this).val());
                product += '"}';

                $.post('admin.php', {url: 'admin.php', dataType: 'json', data: product}).done((data) => {
                    data = JSON.parse(data);
                    data.text = encoding(data.text);
                    $('#text').html(data.text);

                    $('[id*=upload_]').on('click', function () {
                        let id = $(this)[0].id.substring(7, $(this)[0].id.length);
                        let img = $('#img' + id).prop('files');
                        file = '';
                        let fileDownloadInfo = '';
                        for (let i = 0; i < img.length; i++) {
                            let form_data = new FormData();
                            form_data.append('file', img[i]);
                            $('#fileProductDownload' + id).html('Файл ' + img[i]['name'] + ' загружается');
                            $.ajax({
                                url: 'admin.php',
                                dataType: 'text',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'post',
                                success: function (data) {
                                    data = JSON.parse(data);
                                    file += data.file + ';';
                                    if (data.file != -1)
                                        fileDownloadInfo += 'Файл ' + data.file + ' успешно загружен<br>';
                                    else
                                        fileDownloadInfo += 'Файл ' + data.file + ' не загружен<br>';
                                    $('#fileProductDownload' + id).html(fileDownloadInfo);
                                }
                            });
                        }
                    });
                    $('[id*=imgSta_]').on('click', function () {
                        let id = $(this)[0].id.substring(7, $(this)[0].id.length);
                        let imgProduct = $(this)[0].dataset.imageProduct;
                        let img = $('#staImg' + id).prop('files');
                        file = '';
                        for (let i = 0; i < img.length; i++) {
                            let form_data = new FormData();
                            form_data.append('file', img[i]);
                            $.ajax({
                                url: 'admin.php',
                                dataType: 'text',
                                cache: false,
                                contentType: false,
                                processData: false,
                                data: form_data,
                                type: 'post',
                                success: function (data) {
                                    data = JSON.parse(data);
                                    if (data.file != -1) {
                                        let dat = '{"name":"updateImgProduct","id":"' + id + '","file":"' + data.file + '","filePrev":"' + imgProduct + '"}';
                                        $.post('admin.php', {
                                            url: 'admin.php',
                                            dataType: 'json',
                                            data: dat
                                        }).done((data) => {
                                            data = JSON.parse(data);
                                            modal("Информация", data.msg);
                                        }).fail(() => {
                                            error();
                                        });
                                    }
                                    else
                                        modal('Ошибка', 'Картинка не загружена');
                                }
                            });
                        }
                    });

                    $('[id*=update_]').on('click', function () {
                        let id = $(this)[0].id.substring(7, $(this)[0].id.length);
                        let incomplete = decoding($("#incomplete" + id).val());
                        let full = decoding($("#full" + id).val());
                        let dat = '{"name":"updateProduct","id":"' + id + '",' +
                            '"nameProduct":"' + decoding($("#name" + id)[0].value) + '", ' +
                            '"category":"' + $('#category' + id)[0].value + '",' +
                            '"incomplete":"' + incomplete + '",' +
                            '"full":"' + full + '",' +
                            '"price":"' + $('#price' + id)[0].value + '",' +
                            '"count":"' + $('#count' + id)[0].value + '",' +
                            '"file":"' + file + '"' +
                            '}';
                        $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                            data = JSON.parse(data);
                            modal("Информация", data.msg);
                            file = -1;
                        }).fail(() => {
                            error();
                        });
                    });
                    $('[id*=remove_]').on('click', function () {
                        let id = $(this)[0].id.substring(7, $(this)[0].id.length);
                        let dat = '{"name":"removeProduct","id":"' + id + '"}';
                        $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                            data = JSON.parse(data);
                            modal("Информация", data.msg);
                            $('#productGiftId' + id).hide(597);
                        }).fail(() => {
                            error();
                        });
                    });
                }).fail(() => {
                    error()
                });
            }
        },
        showAddProduct: function () {
            $('#addProduct').show(777);
            $('#updateProduct').hide(777);
            $('#sitemap').hide(777);
            $('#order').hide(777);
        },
        showUpdateProduct: function () {
            $('#addProduct').hide(777);
            $('#updateProduct').show(777);
            $('#sitemap').hide(777);
            $('#order').hide(777);
        },
        showSitemap: function () {
            $('#addProduct').hide(777);
            $('#updateProduct').hide(777);
            $('#sitemap').show(777);
            $('#order').hide(777);
            let dat = '{"name":"sitemap"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                $('#textSitemap')[0].value = data.xml;
            }).fail(() => {
                error();
            });
        },
        showOrder: function () {
            $('#addProduct').hide(777);
            $('#updateProduct').hide(777);
            $('#sitemap').hide(777);
            $('#order').show(777);
        },
        generateSitemap: function () {
            let dat = '{"name":"createSitemap"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                $('#textSitemap')[0].value = data.xml;
            }).fail(() => {
                error();
            });
        },
        updateSitemap: function () {
            let text = $('#textSitemap').val;
            text = text.replace(/\n/g, "<br>");
            text = text.replace(/\"/g, "\\\"");
            let dat = '{"name":"updateSitemap","sitemap":"' + text + '"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                modal("Информация", data.msg);
            }).fail(() => {
                error();
            });
        },
        updateOrder: function () {
            let id = $(this)[0].id.substring(8, $(this)[0].id.length);
            let dat = '{"name":"updateOrder","id":"' + id + '",' +
                '"status":"' + $("#statusO_" + id)[0].value + '"' +
                '}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                modal("Информация", data.msg);
                file = -1;
            }).fail(() => {
                error();
            });
        },
        removeOrder: function () {
            let id = $(this)[0].id.substring(8, $(this)[0].id.length);
            let dat = '{"name":"removeOrder","id":"' + id + '"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                modal("Информация", data.msg);
                $('#tableOrder_' + id).hide(555);
            }).fail(() => {
                error();
            });
        },
        refactError: function () {
            let id = $(this)[0].id.substring(7, $(this)[0].id.length);
            let dat = '{"name":"refactError","id":"' + id + '"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                $('#error_' + id).hide(555);
            }).fail(() => {
                error();
            });
        },
        init: function () {
            $('#ButtonAdd').on('click', $.proxy(this.showAddProduct, this));
            $('#BittonUpdate').on('click', $.proxy(this.showUpdateProduct, this));
            $('#ButtonSitemap').on('click', $.proxy(this.showSitemap, this));
            $('#BittonOrder').on('click', $.proxy(this.showOrder, this));
            $('#generateSitemap').on('click', $.proxy(this.generateSitemap, this));
            $('#updateSitemap').on('click', $.proxy(this.updateSitemap, this));
            $('#product').keyup(this.findProduct).keyup();

            $('[id*=updateO_]').on('click', this.updateOrder);
            $('[id*=removeO_]').on('click', this.removeOrder);
            $('[id*=refact_]').on('click', this.refactError);
        }
    };
    $.fn[pluginName] = function (options) {
        let plugin = this.data(dataKey);
        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    }
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Contact', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {

        showContact: function () {
            $('#pageUpdate').hide(777);
            $('#pageUpdateText').hide(777);
            $('#contactUpdate').show(777);
            let dat = '{"name":"showContact"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                $('#textContact')[0].value = data.xml;
            }).fail(() => {
                error();
            });
        },
        showPage: function () {
            $('#contactUpdate').hide(777);
            $('#pageUpdateText').hide(777);
            $('#pageUpdate').show(777);
            let dat = '{"name":"showPage"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                $('#textPage')[0].value = data.xml;
            }).fail(() => {
                error();
            });
        },
        showPageText: function () {
            $('#contactUpdate').hide(777);
            $('#pageUpdate').hide(777);
            $('#pageUpdateText').show(777);
            let dat = '{"name":"showPageText"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                $('#textForPage')[0].value = data.xml;
            }).fail(() => {
                error();
            });
        },
        updateContact: function () {
            let text = $('#textContact').val;
            text = text.replace(/\n/g, "<br>");
            text = text.replace(/\"/g, "\\\"");
            if (text != "" || text != " ") {
                let dat = '{"name":"updateContact","contact":"' + text + '"}';
                $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                    data = JSON.parse(data);
                    modal("Информация", data.msg);
                }).fail(() => {
                    error();
                });
            }
        },
        updatePage: function () {
            let text = $('#textPage').val;
            text = text.replace(/\n/g, "<br>");
            text = text.replace(/\"/g, "\\\"");
            if (text != "" || text != " ") {
                let dat = '{"name":"updatePage","page":"' + text + '"}';
                $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                    data = JSON.parse(data);
                    modal("Информация", data.msg);
                }).fail(() => {
                    error();
                });
            }
        },
        updatePageText: function () {
            let text = $('#textForPage').val;
            text = text.replace(/\n/g, "<bt>");
            text = text.replace(/\"/g, "\\\"");
            if (text != "" || text != " ") {
                let dat = '{"name":"updatePageText","page":"' + text + '"}';
                $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                    data = JSON.parse(data);
                    modal("Информация", data.msg);
                }).fail(() => {
                    error();
                });
            }
        },

        init: function () {
            this.showContact();
            $('#ButtonUpdateContact').on('click', $.proxy(this.showContact, this));
            $('#ButtonUpdatePage').on('click', $.proxy(this.showPage, this));
            $('#ButtonUpdatePageText').on('click', $.proxy(this.showPageText, this));
            $('#updateConact').on('click', $.proxy(this.updateContact, this));
            $('#updatePage').on('click', $.proxy(this.updatePage, this));
            $('#updateForPage').on('click', $.proxy(this.updatePageText, this));
        }
    };
    $.fn[pluginName] = function (options) {
        let plugin = this.data(dataKey);
        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    }
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Promotions', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.init();
    };
    Plugin.prototype = {

        findPromo: function () {
            if ($(this).is(':focus')) {
                let product = '{"name": "findPromo", "dat": "';
                product += decoding($(this).val());
                product += '"}';

                $.post('admin.php', {url: 'admin.php', dataType: 'json', data: product}).done((data) => {
                    data = JSON.parse(data);

                    data.text = encoding(data.text);
                    $('#text').html(data.text);

                    $('[id*=update_P]').on('click', function () {
                        let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                        let text = decoding($("#promoText" + id).val(), 0);
                        let dat = '{"name":"updatePromo","promoId":"' + id + '",' +
                            '"promoText":"' + text + '",' +
                            '"promoStatus":"' + $('#promoStatus' + id)[0].value +
                            '"}';
                        $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                            data = JSON.parse(data);
                            modal("Информация", data.msg);
                        }).fail(() => {
                            error();
                        });
                    });
                    $('[id*=remove_P]').on('click', function () {
                        let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                        let dat = '{"name":"deletePromo","promoId":"' + id + '"}';
                        $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                            data = JSON.parse(data);
                            modal("Информация", data.msg);
                            $('#promoId' + id).hide(597);
                        }).fail(() => {
                            error();
                        });
                    });
                }).fail(() => {
                    error()
                });
            }
        },
        addPromotions: function () {
            let text = decoding($("#textPromotions").val(), 0);
            let dat = '{"name":"addPromo",' +
                '"promoText":"' + text + '",' +
                '"promoStatus":"' + $('#statusPromotions')[0].value +
                '"}';
            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                data = JSON.parse(data);
                modal("Информация", data.msg);
            }).fail(() => {
                error();
            });
        },

        init: function () {
            $('#addPromotions').on('click', $.proxy(this.addPromotions, this));
            $('#findPromotions').keyup(this.findPromo).keyup();
        }
    };
    $.fn[pluginName] = function (options) {
        let plugin = this.data(dataKey);
        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    }
})(jQuery, window, document);
(function ($, window, document, undefined) {
    let pluginName = 'Collection', dataKey = 'plugin_' + pluginName;
    let Plugin = function Plagin(element, options) {
        this.element_ = element;
        this.trigger = 1;
        this.init();
    };
    Plugin.prototype = {
        findCollection: function () {
            let product = '{"name": "findCollection", "find": "';
            product += decoding($(this).val());
            product += '"}';

            $.post('admin.php', {url: 'admin.php', dataType: 'json', data: product}).done((data) => {
                data = JSON.parse(data);

                $('#textCollection').html(data.text);

                $('[id*=upload_С]').on('click', function () {
                    let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                    let idCollection = $(this)[0].dataset.collectionImg;
                    let img = $('#img' + id).prop('files');
                    file = '';
                    let fileDownloadInfo = '';
                    for (let i = 0; i < img.length; i++) {
                        let form_data = new FormData();
                        form_data.append('fileCollection', img[i]);
                        $('#fileCollectionDownload' + id).html('Файл ' + img[i]['name'] + ' загружается');

                        $.ajax({
                            url: 'Img.php',
                            dataType: 'text',
                            cache: false,
                            contentType: false,
                            processData: false,
                            data: form_data,
                            type: 'post',
                            success: function (data) {
                                data = JSON.parse(data);
                                file += data.file + ';';
                                if (data.file != -1) {
                                    fileDownloadInfo += 'Файл ' + data.file + ' успешно загружен<br>';
                                    $('#fileCollectionDownload' + id).html(fileDownloadInfo);
                                    let dat = '{"name":"updateCollection","id":"' + id + '","file":"' + data.file + '","idCollection":"' + idCollection + '"}';
                                    $.post('admin.php', {
                                        url: 'admin.php',
                                        dataType: 'json',
                                        data: dat
                                    }).done((data) => {
                                        data = JSON.parse(data);
                                        modal("Информация", data.msg);
                                        file = -1;
                                    }).fail(() => {
                                        error();
                                    });
                                }
                                else {
                                    fileDownloadInfo += 'Файл ' + data.file + ' не загружен<br>';
                                    $('#fileCollectionDownload' + id).html(fileDownloadInfo);
                                }
                            }
                        });
                    }
                });

                $('[id*=delete_С]').on('click', function () {
                    let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                    let dat = '{"name":"removeImgCollection","id":"' + id + '"}';
                    $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                        data = JSON.parse(data);
                        modal("Информация", data.msg);
                        $('#collectionImage' + id).hide(597);
                    }).fail(() => {
                        error();
                    });
                });

                $('[id*=remove_C]').on('click', function () {
                    let id = $(this)[0].id.substring(8, $(this)[0].id.length);
                    let dat = '{"name":"deleteCollection","id":"' + id + '"}';
                    $.post('admin.php', {url: 'admin.php', dataType: 'json', data: dat}).done((data) => {
                        data = JSON.parse(data);
                        modal("Информация", data.msg);
                        $('#colleId' + id).hide(597);
                    }).fail(() => {
                        error();
                    });
                });
            }).fail(() => {
                error()
            });
        },
        init: function () {
            $('#collection').keyup(this.findCollection).keyup();
        }
    };
    $.fn[pluginName] = function (options) {
        let plugin = this.data(dataKey);
        if (plugin instanceof Plugin) {
            if (typeof options !== 'undefined') {
                plugin.init(options);
            }
        } else {
            plugin = new Plugin(this, options);
            this.data(dataKey, plugin);
        }
        return plugin;
    }
})(jQuery, window, document);