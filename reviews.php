<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

include 'kernel/SITE.php';
require_once 'kernel/Reviews.php';
$site = new SITE();

$site->head('reviews');
?>
    <div id="ul-content">
        <div id="ul-id-2-0" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-2-4" class="row ul-row"><div id="ul-id-2-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
                <div id="ul-id-2-7" class="row ul-row">
                    <div id="ul-id-2-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-2-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header">
                            <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">От<span class="g-color-text-3">зывы</span>&nbsp;</h1></div></div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-2-10" class="row ul-row">
                    <div id="ul-id-2-11" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-2-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                    </div>
                </div>
            </div>
        </div>
        <div id="ul-id-2-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-2-1" class="row ul-row">
                    <div id="ul-id-2-2" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-2-3" class="ul-widget ul-w-review" data-controls="mer" data-widget="review">
                            <div class="ul-w-review-custom-design2 ul-w-review-design2">
                                <div class="ul-w-review-tabcontent"><?php
                                    $reviews = new Reviews();
                                    $review = $reviews->select();

                                    if ($review) {
                                        while ($data = mysqli_fetch_array($review, MYSQLI_NUM)) {
                                            ?>
                                            <div id="ul-id-0-69" class="col ul-col col-xs-12 col-sm-12 col-md-4">
                                                <div id="ul-id-0-70" class="ul-widget ul-w-review" data-controls="mer" data-widget="review">
                                                    <div class="ul-w-review-design1 ul-w-review-custom-design1">
                                                        <div class="ul-w-review-tabcontent">
                                                            <div class="ul-w-review-tabpane active" data-index="0" data-item-id="">
                                                                <div class="ul-w-review-item" itemscope itemtype="http://schema.org/Review" itemref="id-contacts-schema-item">
                                                                    <link itemprop="url" href="about"><meta itemprop="datePublished" content="20180109T013510">
                                                                    <picture><img src="<?=$data[3]?$data[3]:'/img/avatar_placeholder.svg'?>" class="ul-w-review-avatar" title="Отзыв от <?=$data[2]?>" alt="Отзыв от <?=$data[2]?>"></picture>
                                                                    <div class="ul-w-review-titles" itemprop="author" itemscope itemtype="http://schema.org/Person"><span class="ul-w-review-name h4" data-name="name" itemprop="name"><?=$data[2]?></span>
                                                                        <div class="ul-w-review-extra note" itemprop="jobTitle" data-name="extra">пользователь</div>
                                                                    </div>
                                                                    <div class="ul-w-review-text"><div class="ul-w-review-text-paragraph normal" data-name="review" itemprop="reviewBody"><?= $data[5]?></div></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        mysqli_free_result($review);
                                    }
                                    ?></div>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Оставить отзыв</div></div>
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
                                <input class="ul-widget-feedBack-form-control normal" id="Mail" type="email" name="email" value="<?php echo (!$userTrigger)?$site->avt->userDb->mail:''?>" required placeholder="E-mail">
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback" <?php echo $userTrigger?'style="display:none;"':''?>>
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="theme.title">Номер заказа (если есть)</div>
                                <input class="ul-widget-feedBack-form-control normal" id="orderNumber" type="text" name="theme" placeholder="Номер заказа (если есть)">
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback">
                                <div class="ul-w-feedBack-editable" data-name="message.title"><div class="ul-w-feedBack-control-label ul-editor-wrapper clearfix normal" spellcheck="false"> Отзыв</div></div>
                                <textarea class="ul-widget-feedBack-form-control normal" id="Message" name="message" rows="3" placeholder="Отзыв" required></textarea>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block"><span id="helpBlock" class="help-block note"> Если Вы авторизованный пользователь, то в отзыве будет отображаться фотография из вашего профиля. </span></div>
                            <a type="submit" id="sendReviewsOrder" data-user-id="<?=$site->getUserId()?>" style="cursor: pointer; margin: 25px" class="ul-w-button1 middle">Отправить</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>