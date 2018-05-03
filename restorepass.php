<?php
require_once 'kernel/SITE.php';
$site = new SITE();

$meta_d = 'Восстановление пароля на сайте';
$meta_k = 'восстановить пароль на сайте islandgift maximko подарки личный кабинет';
$text = '';

if ($_GET) {
    $site->avt->userDb->login = $_GET['login'];
    $site->avt->userDb->password = $_GET['urluser'];

    $find = ["\n", "\"", "'",];
    $replase = ["\\n", "\\\"", "\'",];
    $site->avt->userDb->login = str_replace($find, $replase, $site->avt->userDb->login);

    $sql = 'SELECT l.password FROM user u INNER JOIN login l ON l.id = u.login WHERE l.login = "' . $site->avt->userDb->login . '" ORDER BY u.id LIMIT 1';
    $datas = $site->avt->userDb->select($sql);

    if ($datas && mysqli_num_rows($datas)) {

        $data = mysqli_fetch_array($datas, MYSQLI_NUM);

        if ($site->avt->userDb->password == $data[0]) {

            $res = $site->avt->avt($site->avt->userDb->login, $site->avt->userDb->password, true);

            if ($res == 1) {

                $data = '/you';

                if ($site->avt->userDb->admin != 0)
                    $data = '/kernel/siteadminka';

                $text = '<script>document.location.href = "' . $data . '"</script>';
            }

        } else {
            $text = '<h2>Ошибка!</h2><p>Не удалось восстановить пароль. Свяжитесь с нами.</p>';
        }

        mysqli_free_result($datas);

    } else {
        $text = '<h2>Ошибка!</h2><p>Не удалось восстановить пароль. Свяжитесь с нами.</p>';
    }
}

$site->head('none', 'Восстановление пароля', $meta_d, $meta_k);
?><div id="ul-content">
    <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-7-4" class="row ul-row"><div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-7-7" class="row ul-row">
                <div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header">
                        <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">Восстановление <span class="g-color-text-3">пароля</span>&nbsp;</h1></div></div>
                    </div>
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
                <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;"><?php
                    if($_GET){
                       echo $text;
                    }
                    else{?><form class="feedBack" method="post" role="form" id="avt">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                            <div class="ul-w-feedBack-editable h2" data-name="header.title">Введите свой логин и имя</div>
                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Логин</div>
                            <input class="ul-widget-feedBack-form-control normal" type="text" id="Login" name="name" placeholder="Логин" required autocomplete="on"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label"><label class="control-label normal">Имя</label></div>
                            <input class="ul-widget-feedBack-form-control normal" type="text" id="Name" name="name" required placeholder="Имя" autocomplete="on"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;">
                            <span id="helpBlock" class="help-block note">
                            <span style="color: #8bc63e;">*</span>Обязательные поля </span>
                            <br>
                        </div>
                        <a type="submit" id="restore" style="cursor: pointer;" class="ul-w-button1 middle">Восстановить пароль</a>
                        <div class="alert ul-widget-feedBack-responce note" style="display:none" role="alert" data-error-email="Неверно введён адрес E-mail."></div>
                    </form><?php }?></div>
            </div>
            <div id="ul-id-7-0" class="row ul-row"><div id="ul-id-7-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
        </div>
    </div>
</div>
<?php
$site->footer()
?>