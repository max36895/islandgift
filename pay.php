<?php
include 'kernel/SITE.php';
$site = new SITE();

$meta_d = 'Оплата заказа';
$meta_k = '';
$site->head('none', 'Оплата заказа', $meta_d, $meta_k);
$price = 5;
$id = 1;
$mail = 'nun@mail.ru';

if (isset($_GET['price'], $_GET['id'])) {
    $price = $_GET['price'];
    $id = $_GET['id'];
    $mail = $_GET['mail'];
} else {
    echo '<script>document.location.href = \'/gift\';</script>';
}

?>
    <div id="ul-content">
        <div id="ul-id-0-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="shop:checkout">
            <div class="container js-block-container">
                <div id="ul-id-0-1" class="row ul-row"><div id="ul-id-0-2" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-3" class="ul-widget ul-w-spacer" data-controls="ue" style="height:69px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-4" class="row ul-row">
                    <div id="ul-id-0-5" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-page_header-0" spellcheck="false"
                             class="ul-widget ul-widget-wysivig-header" data-controls="ue"
                             data-tag="span" data-widget="header">
                            <div spellcheck="false">
                                <div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:left">Оплата заказа</h1></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-6" class="row ul-row yandexMoney">
                    <div id="ul-id-0-7" class="col ul-col col-xs-12 col-sm-12 col-md-12" style="padding-left: 0;">
                        <iframe src="https://money.yandex.ru/quickpay/shop-widget?writer=seller&targets=%D0%BE%D0%BF%D0%BB%D0%B0%D1%82%D0%B0%20%D0%BF%D0%BE%D0%BA%D1%83%D0%BF%D0%BA%D0%B8&targets-hint=&default-sum=<?=$price?>&button-text=11&payment-type-choice=on&fio=on&comment=on&mail=on&hint=%D0%B2%D0%B2%D0%B5%D0%B4%D0%B8%D1%82%D0%B5%20%D1%81%D0%B2%D0%BE%D0%B9%20%D0%BB%D0%BE%D0%B3%D0%B8%D0%BD(%D0%B5%D1%81%D0%BB%D0%B8%20%D0%BE%D0%BD%20%D0%B5%D1%81%D1%82%D1%8C)&successURL=https%3A%2F%2Fwww.islandgift.ru%2Fyandexmoney%3Fid%3D<?=$id?>%26price%3D<?=$price?>%26mail%3D<?=$mail?>&quickpay=shop&account=410014603054118" width="450" height="290" frameborder="0" allowtransparency="true" scrolling="no"></iframe>
                    </div>
                </div>
                <div id="ul-id-0-53" class="row ul-row"><div id="ul-id-0-54" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-55" class="ul-widget ul-w-spacer" data-controls="ue" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>