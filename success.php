<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

if (!isset($_GET['name'], $_GET['mail'])) {
    echo '<script>document.location.href = \'/gift\';</script>';
}

include 'kernel/SITE.php';

$site = new SITE();
$meta_d = 'Заказ успешно оформлен';
$meta_k = '';
$site->head('none', 'Заказ успешно оформлен', $meta_d, $meta_k);
?>
    <div id="ul-content">
        <div id="ul-id-0-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="shop:success">
            <div class="container js-block-container">
                <div id="ul-id-0-1" class="row ul-row"><div id="ul-id-0-2" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-3" class="ul-widget ul-w-spacer" data-controls="ue" style="height:144px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-4" class="row ul-row"><div id="ul-id-0-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-6" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="ue" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?php $name=''; if(isset($_GET['name']))$name = $_GET['name']; echo $name;?>,Ваш заказ успешно оформлен!</h1></div></div></div></div></div>
                <div id="ul-id-0-7" class="row ul-row"><div id="ul-id-0-8" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-9" class="ul-widget ul-w-spacer" data-controls="ue" style="height:40px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-10" class="row ul-row"><div id="ul-id-0-11" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-12" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><?php
                                    $name = $_GET['name'];
                                    $mail = $_GET['mail'];
                                    echo 'Уважаемый(ая), ' . $name . '.<br>Ваш заказ успешно оформлен.<br>На Вашу почту( ' . $mail . ' ) будет выслана вся дальнейшая информация по заказу.<br><br>
      Благодарим за то что решили воспользоваться нашими услугами🎉<br>Будем рады видеть Вас в числе наших постоянных покупателей 😄';
?>&nbsp;</p></div></div></div></div>
                <div id="ul-id-0-13" class="row ul-row"><div id="ul-id-0-14" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-15" class="ul-widget ul-w-spacer" data-controls="ue" style="height:40px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-16" class="row ul-row"><div id="ul-id-0-17" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-18" class="ul-widget ul-w-button text-center" data-controls="ue" data-widget="button"><a class="normal ul-w-button1 middle" target="_self" href="/">Вернуться на главную</a></div></div></div>
                <div id="ul-id-0-19" class="row ul-row"><div id="ul-id-0-20" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-21" class="ul-widget ul-w-spacer" data-controls="ue" style="height:162px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>