<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$site = new SITE();

$pageText = include 'kernel/param/textForPage.php';
$site->head('search');
?>
<div id="ul-content">
    <div id="ul-id-0-1" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-0-2" class="row ul-row"><div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-4" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-0-5" class="row ul-row"><div id="ul-id-0-6" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-7" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['search']['title']?></h1></div></div></div></div></div>
            <div id="ul-id-0-8" class="row ul-row"><div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <p class="text-center"><?=$pageText['search']['description']?></p>
            <div class="ya-site-form ya-site-form_inited_no" onclick="return {'action':'https://www.islandgift.ru/search','arrow':false,'bg':'transparent','fontsize':15,'fg':'#000000','language':'ru','logo':'rb','publicname':'поиск по islandgift.ru','suggest':true,'target':'_self','tld':'ru','type':2,'usebigdictionary':true,'searchid':2319268,'input_fg':'#000000','input_bg':'#ffffff','input_fontStyle':'italic','input_fontWeight':'normal','input_placeholder':'Поиск по сайту','input_placeholderColor':'#000000','input_borderColor':'#000000'}"><form action="https://yandex.ru/search/site/" method="get" target="_self" accept-charset="utf-8"><input type="hidden" name="searchid" value="2319268"/><input type="hidden" name="l10n" value="ru"/><input type="hidden" name="reqenc" value=""/><input type="search" name="text" value="<?php if(isset($_GET['text'])) echo $_GET['text'];?>"/><input type="submit" value="Найти"/></form></div><style type="text/css">.ya-page_js_yes .ya-site-form_inited_no { display: none; }</style><script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0],e=d.documentElement;if((' '+e.className+' ').indexOf(' ya-page_js_yes ')===-1){e.className+=' ya-page_js_yes';}s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Form.init()})})(window,document,'yandex_site_callbacks');</script>
            <div id="ul-id-0-11" class="row ul-row"><div id="ul-id-0-12" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-13" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <div id="ul-id-0-71" class="ul-container g-theme-block-1" data-theme="g-theme-block-1" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ya-site-results" onclick="return {'tld': 'ru','language': 'ru','encoding': 'utf-8','htmlcss': '1.x','updatehash': true}"></div>
            <script type="text/javascript">(function(w,d,c){var s=d.createElement('script'),h=d.getElementsByTagName('script')[0];s.type='text/javascript';s.async=true;s.charset='utf-8';s.src=(d.location.protocol==='https:'?'https:':'http:')+'//site.yandex.net/v2.0/js/all.js';h.parentNode.insertBefore(s,h);(w[c]||(w[c]=[])).push(function(){Ya.Site.Results.init();})})(window,document,'yandex_site_callbacks');</script>
            <div id="ul-id-0-14" class="row ul-row"><div id="ul-id-0-15" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>
</div>
<script type="application/ld+json">{"@context": "http://schema.org","@type": "WebSite","url": "https://www.islandgift.ru/","potentialAction": {"@type": "SearchAction","target": "https://www.islandgift.ru/search?searchid=2319268&text={search_term_string}&web=0","query-input": "required name=search_term_string"}}</script>
<?php
$site->footer();
?>
