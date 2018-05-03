<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$site = new SITE();

$pageText = include 'kernel/param/textForPage.php';
$site->head('about');
?>
    <div id="ul-content">
        <div id="ul-id-0-1" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-2" class="row ul-row"><div id="ul-id-0-3" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-4" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-5" class="row ul-row"><div id="ul-id-0-6" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-7" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center"><?=$pageText['about']['title']?></h1></div></div></div></div></div>
                <div id="ul-id-0-8" class="row ul-row"><div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-11" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-12" class="row ul-row"><div id="ul-id-0-13" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-14" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-15" class="row ul-row">
                    <div id="ul-id-0-16" class="col ul-col col-xs-12 col-sm-12 col-md-6">
                        <div id="ul-id-0-17" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                            <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p><span class="g-color-text-2"><?=$pageText['about']['section1Text']?></span><br></p><p></p></div>
                        </div>
                        <div id="ul-id-0-18" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-19" class="col ul-col col-xs-12 col-sm-12 col-md-6"><div id="ul-id-0-20" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="/img/allgift/podarok.jpg" class="imgZoom" style="width:100%" alt="О нас" title="О нас" data-lightbox="img/allgift/podarok.jpg" itemprop="contentUrl"></picture></div></div></div></div></div>
                </div>
                <div id="ul-id-0-21" class="row ul-row"><div id="ul-id-0-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-24" class="ul-container g-theme-block-1" data-theme="g-theme-block-1" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-66" class="row ul-row"><div id="ul-id-0-67" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-68" class="ul-widget ul-w-spacer" data-controls="mer" style="height:63px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-69" class="row ul-row"><div id="ul-id-0-70" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-71" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center"><?=$pageText['advantages']['title']?></span></div></div></div></div></div>
                <div id="ul-id-0-72" class="row ul-row">
                    <div id="ul-id-0-73" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-74" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-75" class="col ul-col col-xs-12 col-sm-12 col-md-10"><div id="ul-id-0-76" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2"><?=$pageText['advantages']['description']?></span></p></div></div></div>
                    <div id="ul-id-0-77" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-78" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-79" class="row ul-row">
                    <div id="ul-id-0-80" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-81" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-82" class="row ul-row">
                    <div id="ul-id-0-83" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-84" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-group fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/gift" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item1Title']?></div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data">
                                        <div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item1Text']?></div>
                                    </div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-85" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-86" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-87" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-heart fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/sweet" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item2Title']?></div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item2Text']?></div></div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-88" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-89" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-90" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon">
                                    <div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper">
                                        <span class="fa-birthday-cake fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/gift" class="js-goods-popup-link ul-goods-view-link"></a>
                                    </div>
                                </div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item3Title']?></div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data">
                                        <div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item3Text']?></div>
                                    </div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                        <div id="ul-id-0-91" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-92" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-93" class="ul-widget ul-widget-goods ul-goods-layout default ul-goods-layout-default" data-controls="mer" data-widget="goods" data-is-icon-shown="true" data-icon-set="fontAwesome">
                            <div class="ul-goods-view-item js-goods-item-linkPopover" itemscope itemtype="http://schema.org/Product">
                                <div class="ul-goods-view-image-wrap js-goods-image-wrap ul-goods-view-image-wrap--icon"><div class="ul-goods-view-image-wrap2 js-goods-image-changebtn-wrapper"><span class="fa-smile-o fa ul-goods-view-icon" style="font-size:48px"> </span> <a href="/celebration" class="js-goods-popup-link ul-goods-view-link"></a></div></div>
                                <div class="ul-goods-view-title" data-field-name="title"><div class="js-goods-contenteditable h4" itemprop="name"><?=$pageText['advantages']['item4Title']?></div></div>
                                <div class="ul-goods-view-details">
                                    <div class="ul-goods-view-descr" data-field-name="description.data"><div class="js-goods-contenteditable js-goods-descr note" itemprop="description"><?=$pageText['advantages']['item4Text']?></div></div>
                                </div>
                                <div style="display: none" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><meta itemprop="price" content="100"><meta itemprop="priceCurrency" content="RUR"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-94" class="row ul-row"><div id="ul-id-0-95" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-96" class="ul-widget ul-w-spacer" data-controls="mer" style="height:72px" data-widget="spacer"></div></div></div>
            </div>
        </div>
        <div id="ul-id-0-53" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-0-54" class="row ul-row">
                    <div id="ul-id-0-55" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-56" class="ul-widget ul-w-spacer" data-controls="mer" style="height:80px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-57" class="row ul-row">
                    <div id="ul-id-0-58" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-59" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer"  data-tag="span" data-widget="header">
                            <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">От<span class="g-color-text-3">зывы</span></span></div></div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-60" class="row ul-row">
                    <div id="ul-id-0-61" class="col ul-col col-xs-12 col-sm-12 col-md-1"><div id="ul-id-0-62" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div>
                    <div id="ul-id-0-63" class="col ul-col col-xs-12 col-sm-12 col-md-10">
                        <div id="ul-id-0-64" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><p style="text-align:center"><span class="g-color-text-2"></span></p></div></div>
                        <div id="ul-id-0-65" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                    <div id="ul-id-0-66" class="col ul-col col-xs-12 col-sm-12 col-md-1">
                        <div id="ul-id-0-67" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div>
                    </div>
                </div>
                <div id="ul-id-0-68" class="row ul-row"><?php
                    require_once 'kernel/Reviews.php';
                    $reviews = new Reviews();
                    $review = $reviews->select(3);

                    if ($review) {

                        while ($data = mysqli_fetch_array($review, MYSQLI_NUM)) {
                            ?><div id="ul-id-0-69" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                                <div id="ul-id-0-70" class="ul-widget ul-w-review" data-controls="mer" data-widget="review">
                                    <div class="ul-w-review-design1 ul-w-review-custom-design1">
                                        <div class="ul-w-review-tabcontent">
                                            <div class="ul-w-review-tabpane active" data-index="0" data-item-id="">
                                                <div class="ul-w-review-item" itemscope itemtype="http://schema.org/Review" itemref="id-contacts-schema-item">
                                                    <link itemprop="url" href="/reviews"><meta itemprop="datePublished" content="<?php echo date('Ymd') . 'T' . date('hms')?>">
                                                    <picture><img src="<?= $data[3] ? $data[3] : '/img/avatar_placeholder.svg' ?>" class="ul-w-review-avatar" title="Отзыв от <?= $data[2]?>" alt="Отзыв от <?= $data[2]?>"></picture>
                                                    <div class="ul-w-review-titles" itemprop="author" itemscope itemtype="http://schema.org/Person"><span class="ul-w-review-name h4" data-name="name" itemprop="name"><?= $data[2]?></span>
                                                        <div class="ul-w-review-extra note" itemprop="jobTitle" data-name="extra"><?php $number = random_int(1, 5);
                                                            switch ($number) {
                                                                case 1:
                                                                    echo 'Очень добрый человек';
                                                                    break;
                                                                case 2:
                                                                    echo 'Очень хороший человек';
                                                                    break;
                                                                case 3:
                                                                    echo 'Классный пользователь';
                                                                    break;
                                                                case 4:
                                                                    echo 'Всегда скажет что-то дельное';
                                                                    break;
                                                                case 5:
                                                                    echo 'Чуткий и добрый человек';
                                                                    break;
                                                            }?></div>
                                                    </div>
                                                    <div class="ul-w-review-text"><div class="ul-w-review-text-paragraph normal" data-name="review" itemprop="reviewBody"><?= $data[5]?></div></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><?php
                        }
                        mysqli_free_result($review);
                    }
                    ?></div>
                <div id="ul-id-0-77" class="row ul-row"><div id="ul-id-0-78" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-79" class="ul-widget ul-w-spacer" data-controls="mer" style="height:76px" data-widget="spacer"></div></div></div>
            </div>
        </div>

        <div id="ul-id-2-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container-fluid js-block-container">
                <div id="ul-id-3-0" class="row ul-row"><div id="ul-id-3-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-3-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-3-3" class="row ul-row"><div id="ul-id-3-4" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-3-5" class="ul-widget" type="border"><div class="ul-w-border" data-reactroot="" data-reactid="1" data-react-checksum="2056334462"><div class="hr ul-widget-border-style2" data-reactid="2"></div></div></div></div></div>
                <div id="ul-id-3-6" class="row ul-row"><div id="ul-id-3-7" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-3-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-2-5" class="row ul-row">
                    <div id="ul-id-2-6" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-feedBack-footerform1" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack"
                        <form class="feedBack" method="post" role="form">
                            <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Оставить свой отзыв</div></div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Имя</div>
                                <input class="ul-widget-feedBack-form-control normal" id="Name" type="text" name="name" placeholder="Имя, которое будет отображаться на сайте" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div><?php
                            $userTrigger = true;

                            if ($site->avt->userDb->login) {
                                $userTrigger = false;
                            }

                            ?><div class="ul-widget-feedBack-form-group has-feedback has-feedback" <?php echo (!$userTrigger)?'style="display:none;"':''?>>
                                <div class="ul-w-feedBack-control-label"><label class="control-label normal">E-mail</label></div>
                                <input class="ul-widget-feedBack-form-control normal" id="Mail" type="email" name="email" value="<?php echo (!$userTrigger) ? $site->avt->userDb->mail : ''?>" required placeholder="E-mail">
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback" <?php echo $userTrigger ? 'style="display:none;"' : ''?>>
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="theme.title">Номер заказа (если есть)</div>
                                <input class="ul-widget-feedBack-form-control normal" id="orderNumber" type="text" name="theme" placeholder="Номер заказа (если есть)">
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback">
                                <div class="ul-w-feedBack-editable" data-name="message.title"><div class="ul-w-feedBack-control-label ul-editor-wrapper clearfix normal" spellcheck="false"> Отзыв</div></div>
                                <textarea class="ul-widget-feedBack-form-control normal" id="Message" name="message" rows="3" placeholder="Отзыв" required></textarea>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block"><span id="helpBlock" class="help-block note"> Если Вы авторизованный пользователь, то в отзыве будет отображаться фотография из вашего профиля. </span></div>
                            <a type="submit" id="sendReviewsOrder" data-user-id="<?= $site->getUserId() ?>" style="cursor: pointer; margin: 25px" class="ul-w-button1 middle">Отправить отзыв</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>