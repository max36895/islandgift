<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$site = new SITE();

$triggerUser = true;
if (!$site->avt->userDb->login) {
    $triggerUser = false;
}

$pageParam = include 'kernel/param/PageParam.php';

if (isset($pageParam['you'])) {
    if ($triggerUser) {
        $find = ['user_full_name', 'user_less_name', 'user_city'];
        $replase = [$site->avt->fullName(), $site->avt->lessName(), $site->avt->userDb->city];
        $meta_d = str_replace($find, $replase, $pageParam['you']['description']);
        $meta_k = str_replace($find, $replase, $pageParam['you']['keyword']);
        $title = str_replace($find, $replase, $pageParam['you']['title']);
    } else {
        $meta_d = 'Личный кабинет. Добро пожаловать на наш сайт. ';
        $meta_k = '';
        $title = 'Ваш личный кабинет. Добро пожаловать 💻';
    }
} else {
    if ($triggerUser) {
        $meta_d = 'Личный кабинет ' . $site->avt->fullName();
        $meta_k = $site->avt->userDb->city . ' ' . $site->avt->fullName();
        $title = 'Ваш личный кабинет ' . $site->avt->lessName();
    } else {
        $meta_d = 'Личный кабинет. Добро пожаловать на наш сайт. ';
        $meta_k = '';
        $title = 'Ваш личный кабинет. Добро пожаловать 💻';
    }
}

$site->head('none', $title, $meta_d, $meta_k);
?>
<div id="ul-content">
    <div id="ul-id-2-20" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-21" class="row ul-row"><div id="ul-id-2-22" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-23" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-24" class="row ul-row"><div id="ul-id-2-25" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-26" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">Ваш личный <span class="g-color-text-3">кабинет</span></h1></div></div></div></div></div>
            <div id="ul-id-2-27" class="row ul-row"><div id="ul-id-2-28" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-29" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <?php if ($triggerUser) { ?>
    <div id="ul-id-2-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-8" class="row ul-row"><div id="ul-id-2-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-11" class="row ul-row"><div id="ul-id-2-12" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-13" class="ul-widget" type="border"><div class="ul-w-border"><div class="hr ul-widget-border-style1" data-reactid="2"></div></div></div></div></div>
            <div id="ul-id-2-14" class="row ul-row"><div id="ul-id-2-15" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-1" class="row ul-row">
                <div id="ul-id-2-2" class="col ul-col col-xs-12 col-sm-12 col-md-6"><div id="ul-id-2-3" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="<?=$site->avt->userDb->img;?>" class="imgZoom" style="width:100%" alt="<?=$site->avt->lessName()?>" title="<?=$site->avt->lessName()?>" itemprop="contentUrl"></picture></div></div></div></div></div>
                <div id="ul-id-2-4" class="col ul-col col-xs-12 col-sm-12 col-md-6">
                    <div id="ul-id-2-5" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                        <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">
                            <h2 style="text-align:left"><?= $site->avt->userDb->login ?></h2>
                            <h3 style="text-align:left">Контактные данные</h3>
                            <table>
                                <tr><td>ФИО</td><td><?=$site->avt->fullName()?></td></tr>
                                <tr><td>Пол</td><td><?php $vkTrigger = false;if($site->avt->userDb->sex == 1) echo'Женский';else if($site->avt->userDb->sex == 2) echo'Мужской';else{echo 'Не определенно'; $vkTrigger = true;}?></td></tr>
                                <tr><td>Дата рождения</td><td><?=$site->avt->userDb->birthday?></td></tr>
                                <tr><td>Город</td><td><?=$site->avt->userDb->city?></td></tr>
                                <tr><td>Почта</td><td><?=$site->avt->userDb->mail?></td></tr>
                                <tr><td>Телефон</td><td><?=$site->avt->userDb->phone?></td></tr>
                                <tr><td style="padding: 5px;padding-top: 25px"><a role="button" href="/updateinfo" class="ul-w-price-button ul-w-button1 middle" style="text-align: center"> Изменить данные </a></td><td style="padding: 5px;padding-top: 25px;"><a role="button" class="ul-w-price-button ul-w-button1 middle" id="showUpdatepass" style="text-align: center"> Поменять пароль </a></td></tr>
                            </table>
                            <?php if($vkTrigger) { ?>
                                <p>Вы авторизовались через ВКонтакте. Пожалуйста заполните недостающие или не корректные данные. Так же вы можете создать или сменить ваш пароль, что бы в дальнейшем осуществлять вход через нашу форму авторизации (не рекомендуем использовать в качестве пароля ваш существующий логин в ВК).</p>
                            <?php } ?>
                            <div id="updatePass" style="display: none; margin-top: 11px">
                                <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;">
                                    <form class="feedBack" method="post" role="form" enctype="multipart/form-data">
                                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Введите новый пароль</div><input class="ul-widget-feedBack-form-control normal" type="password" id="newPassword" placeholder="Новый пароль" autocomplete="on" required> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span><a style="margin-top: 25px" role="button" id="updatePassword" class="ul-w-price-button ul-w-button1 middle"> Изменить пароль </a></div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-17" class="row ul-row" style="display: block;"><h2 style="text-align:left">О Вас</h2><p style="text-align:left"><?= $site->avt->userDb->about?></p><div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-19" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
        </div>
    </div>
    <div id="ul-id-2-30" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-2-31" class="row ul-row"><div id="ul-id-2-32" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-33" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-2-34" class="row ul-row"><div id="ul-id-2-35" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-36" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center">Ваши заказы</span></div></div></div></div></div>
            <div id="ul-id-2-40" class="row ul-row">
                <div id="ul-id-2-41" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-2-42" class="ul-widget ul-w-price ul-w-price-horizontal ul-w-price-custom-horizontal" data-controls="mer" data-widget="price"><h2 class="ul-w-price-title h2">Здесь отображаются все товары, которые Вы заказали на нашем сайте</h2>
                        <table class="ul-w-price-table">
                            <thead class="ul-w-price-table-head"><tr><td class="note">Название</td><td class="note">Описание</td><td class="note">Количество / Дата заказа</td><td class="note">Цена</td><td></td></tr></thead>
                            <tbody class="ul-w-price-table-body"><?php
                            require_once 'kernel/Order.php';
                            $order = new Order();
                            $order->userId = $site->avt->userDb->id;
                            $orderAll = $order->selectOrderUser();
                            $information = '';
                            if ($orderAll) {
                                while ($orderOne = mysqli_fetch_array($orderAll, MYSQLI_NUM)) {
                                    ?>
                                    <tr itemscope itemtype="http://schema.org/Product">
                                        <td class="ul-w-price-item-name normal" itemprop="name"><img class="imgZoom imgOrder" src="https://www.islandgift.ru/<?=$orderOne[15]?>" title="<?=$orderOne[9]?>" alt="<?=$orderOne[9]?>"><?=$orderOne[9];?></td>
                                        <td class="ul-w-price-item-description normal" itemprop="description"><?=$orderOne[10];?></td>
                                        <td class="ul-w-price-item-extra normal"><?=$orderOne[11];?> шт.<br><?php $date = explode('-',$orderOne[3]); echo $date[2].'-'.$date[1].'-'.$date[0].'<br>';
                                            if ($orderOne[4] == '1') {
                                                echo 'Товар не получен';
                                            } else if ($orderOne[4] == '2') {
                                                $date = explode('-', $orderOne[5]);
                                                echo 'Товар оплачен:<br> ' . $date[2] . '-' . $date[1] . '-' . $date[0];
                                            } else {
                                                $date = explode('-', $orderOne[5]);
                                                echo 'Товар получен:<br> ' . $date[2] . '-' . $date[1] . '-' . $date[0];
                                            }
                                        ?></td>
                                        <td class="ul-w-price-item-price normal" itemprop="offers" itemscope><?=$orderOne[12]?> руб<meta itemprop="price" content="<?=$orderOne[12]?>"><meta itemprop="priceCurrency" content="RUR"></td>
                                        <td class="ul-w-price-item-button"><a role="button" href="product/<?=$orderOne[8];?>" class="ul-w-price-button ul-w-button1 middle">Подробнее </a></td>
                                    </tr>
                                    <?php
                                }
                                mysqli_free_result($orderAll);
                            }else{
                                $information = "<p class='text-center'>На данный момент Вы ничего не заказали😊<br>Данные появятся после оформления заказа🎁</p>";
                            }
                            ?></tbody></table><?=$information?>
                    </div>
                </div>
            </div>
            <div id="ul-id-2-37" class="row ul-row"><div id="ul-id-2-38" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-39" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>
<?php }
else { ?>
        <div id="ul-id-2-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container js-block-container">
                <div id="ul-id-2-8" class="row ul-row"><div id="ul-id-2-9" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-10" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-2-11" class="row ul-row"><div id="ul-id-2-12" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-13" class="ul-widget" type="border"><div class="ul-w-border"><div class="hr ul-widget-border-style1" data-reactid="2"></div></div></div></div></div>
                <div id="ul-id-2-14" class="row ul-row"><div id="ul-id-2-15" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-16" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-2-1" class="row ul-row">
                    <div id="ul-id-2-2" class="col ul-col col-xs-12 col-sm-12 col-md-6"><div id="ul-id-2-3" class="ul-widget ul-w-imagezoom" data-controls="mer" data-widget="imagezoom"><div class="ul-w-wrap ul-w-imagezoom-type-none ul-imagezoom-published" itemscope itemtype="http://schema.org/ImageObject"><div class="ul-w-imagezoom-img-wrap"><div><picture><img src="/templates/c_bestday/img/scaled/goods-default-img-720.jpg" class="imgZoom" style="width:100%" alt="Ваш личный кабинет тут" title="Ваш личный кабинет тут" itemprop="contentUrl"></picture></div></div></div></div></div>
                    <div id="ul-id-2-4" class="col ul-col col-xs-12 col-sm-12 col-md-6">
                        <div id="ul-id-2-5" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="mer" data-widget="wysiwyg">
                            <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word">
                                <h2 style="text-align:left">Приветствуем Вас.</h2>
                                <p style="text-align:left">Для Вашего удобства мы разработали личный кабинет клиента интернет-магазина. Он позволит Вам быстрее и удобнее производить заказы, а так же можно посмотреть товары и услуги, которые Вы заказали у нас.</p>
                                <p>
                                    Если вы до сих пор не авторизованы, то настоятельно рекомендуем Вам сделать это.
                                    Так как после регистрации вы сможете получить множество приятных бонусов и сюрпризов для себя.<br>
                                    Для того чтобы пройти регистрацию на сайте “islandgift” и получить личный кабинет, пройдите небольшую регистрацию. Это займет у Вас не более 3 минут, а если у вас есть аккаунт ВКонтакте, то данная процедура не займет и минуты!</p>
                                    <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="text-align: center;">
                                        <a href="/registration" role="button" class="ul-w-price-button ul-w-button1 middle"> Зарегистрироваться </a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-2-17" class="row ul-row" style="display: block;"><h2 style="text-align:left">Благодарим за визит</h2><p style="text-align:left">Надеемся что наш сайт смог помочь решить Ваши проблемы.<br>Дарите близким радость и приятные воспоминания🍀<br>С наилучшими пожеланиями Maximko</p><div id="ul-id-2-18" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-2-19" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    <?php } ?>
</div>
<?php
$site->footer();
?>
