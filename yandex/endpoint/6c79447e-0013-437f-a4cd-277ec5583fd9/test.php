<html>
<head>
    <title>Алиса</title>
    <script src="/js/lib/jquery-3.3.1.min.js"></script>
</head>
<body>
<h1>Тестирование Алисы</h1>
<div style="display: flex">
<input type="text" id="query" style="width: 81%">
<button id = 'click'>запрос</button>
</div>
<p id="result"></p>
<script>
    (function ($, window, document, undefined) {
        let pluginName = 'main', dataKey = 'plugin_' + pluginName;
        let Plugin = function Plagin(element, options) {
            this.element_ = element;
            this.temp = 0;this.trigger = false;this.triggerYet = false;
            this.init();
        };
        Plugin.prototype = {
            res: function (e){
                e.preventDefault();
                let dat = '{"text":"'+$('#query').val()+'"}';
                $.post('test1.php', {url: 'test1.php', dataType: 'json', data: dat}).done((data) => {
                    data = JSON.parse(data);
                    $('#result').html(data.response.text);
                }).fail(() => {});
            },
            init: function () {
                $('#query').keyup(
                    function () {
                        if(event.keyCode == 13) {
                            let dat = '{"text":"' + $('#query').val() + '"}';
                            $.post('test1.php', {url: 'test1.php', dataType: 'json', data: dat}).done((data) => {
                                data = JSON.parse(data);
                                $('#result').html(data.response.text);
                            }).fail(() => {
                            });
                        }
                    }
                ).keyup;
                $('#click').on('click', $.proxy(this.res, this));
            }
        };
        $.fn[pluginName] = function (options) {let plugin = this.data(dataKey);if (plugin instanceof Plugin) {if (typeof options !== 'undefined') {plugin.init(options);}} else {plugin = new Plugin(this, options);this.data(dataKey, plugin);}return plugin;}
    })(jQuery, window, document);
    jQuery(document).ready(function () {
        $(this).main();
    });
</script>
</body>
</html>
