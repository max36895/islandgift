<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
require_once 'kernel/SITE.php';

$result = 0;
$information = '';

if (isset($_POST['login'])) {
    $avt = new Authorization();
    $result = $avt->registration();
    unset($_POST);
}

if (isset($_GET['uid'], $_GET['first_name'], $_GET['last_name'], $_GET['photo'], $_GET['hash'])) {
    $hash = $_GET['hash'];
    $key = md5('' . $_GET['uid'] . '');
    if ($key == $hash) {
        $avt = new Authorization();
        $result = $avt->registrationVk();
    } else {
        $vkError = fopen('error/vkError.log', 'a');
        $text = 'uid->' . $_GET['uid'] . '; file_name->' . $_GET['first_name'] . '; last_name->' . $_GET['last_name'] . '; photo->' . $_GET['photo'] . '; hash->' . $_GET['hash'] . ";\n";
        fwrite($vkError, $text);
        fclose($vkError);
        $information = '<p>Произошла ошибка при авторизации через Вконтакте!</p>';
    }
}

$site = new SITE();

if ($result) {
    echo $result;
} else if ($site->avt->userDb->login)
    echo '<script>document.location.href=\'/\';</script>';

$site->head('registration');
?>
<div id="ul-content">
    <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-7-4" class="row ul-row"><div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-7-7" class="row ul-row">
                <div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">Авторизация <span class="g-color-text-3">на сайте</span>&nbsp;</h1></div></div></div><?=$information?>
                </div>
            </div>
            <div id="ul-id-7-10" class="row ul-row"><div id="ul-id-7-11" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
        </div>
    </div>

    <div id="ul-id-5-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container-fluid js-block-container">
            <div id="ul-id-6-0" class="row ul-row"><div id="ul-id-6-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            <div id="ul-id-6-3" class="row ul-row"><div id="ul-id-6-4" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-5" class="ul-widget" type="border"><div class="ul-w-border" data-reactroot="" data-reactid="1" data-react-checksum="2056334462"><div class="hr ul-widget-border-style2" data-reactid="2"></div></div></div></div></div>
            <div id="ul-id-6-6" class="row ul-row"><div id="ul-id-6-7" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            <div id="ul-id-9-0" class="row ul-row" style="text-align: center;">
                <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;">
                    <form class="feedBack" method="post" role="form" id="avt">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Введите свой логин и пароль</div></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Логин</div><input class="ul-widget-feedBack-form-control normal" type="text" id="avtLogin" name="name" placeholder="Логин" required autocomplete="login"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label"><label class="control-label normal">Пароль</label></div><input class="ul-widget-feedBack-form-control normal" type="password" id="avtPass" name="password" required placeholder="Пароль" autocomplete="password"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;"><span id="helpBlock" class="help-block note"><span style="color: #8bc63e;">*</span>Обязательные поля </span><br><a href="/restorepass" title="Восстановление пароля" style="color: #23527e !important;background: none;">Восстановление пароля</a></div>
                        <a type="submit" id="registration" style="cursor: pointer; margin: 7px;" class="ul-w-button1 middle">Регистрация</a><a type="submit" id="authorizationUser" style="cursor: pointer;margin: 7px;" class="ul-w-button1 middle">Войти</a>
                    </form>
                    <form class="feedBack" method="post" role="form" id="reg" action="/registration.php" enctype="multipart/form-data" style="display: none;">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Введите свои данные</div></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Логин</div><input class="ul-widget-feedBack-form-control normal" type="text" id="login" name="login" placeholder="Логин" required autocomplete="login"><span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span><div style="column-count: 2;width: 100%"><span id="textstate"></span><span id="imgstate"></span></div></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label"><label class="control-label normal">Пароль</label></div><input class="ul-widget-feedBack-form-control normal" type="password" name="password" required placeholder="Пароль" autocomplete="password"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Имя</div><input class="ul-widget-feedBack-form-control normal" type="text" name="name" placeholder="Имя" required autocomplete="given-name"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Фамилия</div><input class="ul-widget-feedBack-form-control normal" type="text" name="surname" placeholder="Фамилия" required autocomplete="family-name"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Отчество</div><input class="ul-widget-feedBack-form-control normal" type="text" name="patronymic" placeholder="Отчество" autocomplete="patronymic"></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Пол</div><select class="ul-widget-feedBack-form-control normal" name="sex" placeholder="Пол" required ><option value="1">Женский</option><option value="2">Мужской</option></select></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Адрес</div><input class="ul-widget-feedBack-form-control normal" type="text" name="city" placeholder="Город" required autocomplete="address-level2"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">О Вас</div><textarea class="ul-widget-feedBack-form-control normal" name="about" placeholder="О Вас"></textarea></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Почта</div><input class="ul-widget-feedBack-form-control normal" type="email" name="mail" placeholder="Ваша почта" required autocomplete="email"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Телефон</div><input class="ul-widget-feedBack-form-control normal" type="tel" id="phone" name="phone" placeholder="Ваш телефон" autocomplete="tel"></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Дата рождения</div><input class="ul-widget-feedBack-form-control normal" type="date" name="birthday" placeholder="Дата рождения" required autocomplete="birthday"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Ваша фотография</div><input class="ul-widget-feedBack-form-control normal" type="file" name="img"><span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;"><span id="helpBlock" class="help-block note"><span style="color: #8bc63e;">*</span>Обязательные поля </span></div><a type="submit" id="authorization" style="cursor: pointer;margin: 7px;" class="ul-w-button1 middle">Авторизация</a><button type="submit" id="registrationUser" style="cursor: pointer;margin: 7px;" class="ul-w-button1 middle">Зарегистрироваться</button>
                    </form>
                    <div style="margin: 0 auto; margin-top: 27px">
                        <script type="text/javascript" src="//vk.com/js/api/openapi.js?152"></script><script type="text/javascript">VK.init({apiId: });</script>
                        <!-- VK Widget --><div id="vk_auth" style="margin: 0 auto"></div><script type="text/javascript">VK.Widgets.Auth("vk_auth", {"width":250,"authUrl":"/registration"});</script>
                    </div>
                </div>
            </div>
            <div id="ul-id-7-0" class="row ul-row"><div id="ul-id-7-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
        </div>
    </div>
</div>
<?php
$site->footer();
?>
