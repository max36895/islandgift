<?php
include 'kernel/SITE.php';
$site = new SITE();

if (!$site->avt->userDb->login) {
    echo '<script>document.location.href = \'/\'</script>';
}

$meta_d = 'Изменить данные ' . $site->avt->fullName();
$meta_k = $site->avt->userDb->city . ' ' . $site->avt->fullName();
$title = 'Изменить данные ' . $site->avt->lessName();
$site->head('none', $title, $meta_d, $meta_k);
?>
    <div id="ul-content">
        <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none"><div class="container js-block-container"><div id="ul-id-7-4" class="row ul-row"><div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div><div id="ul-id-7-7" class="row ul-row"><div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">Изменить <span class="g-color-text-3">свои данные</span>&nbsp;</h1></div></div></div></div></div><div id="ul-id-7-10" class="row ul-row"><div id="ul-id-7-11" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div></div></div>
        <div id="ul-id-5-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
            <div class="container-fluid js-block-container"><div id="ul-id-6-0" class="row ul-row"><div id="ul-id-6-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div><div id="ul-id-6-3" class="row ul-row"><div id="ul-id-6-4" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-5" class="ul-widget" type="border"><div class="ul-w-border" data-reactroot="" data-reactid="1" data-react-checksum="2056334462"><div class="hr ul-widget-border-style2" data-reactid="2"></div></div></div></div></div><div id="ul-id-6-6" class="row ul-row"><div id="ul-id-6-7" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-6-8" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
                <div id="ul-id-9-0" class="row ul-row" style="text-align: center;">
                    <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;" >
                        <form class="feedBack" method="post" role="form" enctype="multipart/form-data">
                            <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Введите свои данные</div></div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Ваше имя</div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" id="newName" placeholder="Имя" value="<?= $site->avt->userDb->name ?>" autocomplete="given-name" required> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Ваша фамилия</div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" value="<?= $site->avt->userDb->surname ?>" id="surname" placeholder="Фамилия" autocomplete="family-name" required><span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Ваше отчество</div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" value="<?= $site->avt->userDb->patronymic ?>" id="patronymic" placeholder="Отчество" autocomplete="patronymic">
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Ваш Пол</div>
                                <select class="ul-widget-feedBack-form-control normal" type="text" id="sex" placeholder="Пол" required>
                                    <option value="1"<?php echo(($site->avt->userDb->sex == 1) ? 'selected' : '') ?>>Женский</option>
                                    <option value="2"<?php echo(($site->avt->userDb->sex == 2) ? 'selected' : '') ?>>Мужской</option>
                                </select>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Ваш город</div>
                                <input class="ul-widget-feedBack-form-control normal" type="text" value="<?= $site->avt->userDb->city ?>" id="city" placeholder="Город" autocomplete="address-level2" required><span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">О Вас</div>
                                <textarea class="ul-widget-feedBack-form-control normal" type="text" id="about" placeholder="О Вас"><?= $site->avt->userDb->about ?></textarea>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Ваша Почта</div>
                                <input class="ul-widget-feedBack-form-control normal" type="email"  value="<?= $site->avt->userDb->mail ?>" id="mail" placeholder="Ваша почта" autocomplete="email" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block">Ваш телефон</div>
                                <input class="ul-widget-feedBack-form-control normal" type="text"  value="<?= $site->avt->userDb->phone ?>" id="phone" placeholder="Ваш телефон" autocomplete="tel">
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Дата рождения</div>
                                <input class="ul-widget-feedBack-form-control normal" type="date" value="<?= $site->avt->userDb->birthday ?>" id="birthday" placeholder="Дата рождения" required>
                                <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            </div>
                            <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                                <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Ваша фотография</div>
                                <div style="display: flex"><input class="ul-widget-feedBack-form-control normal" type="file" id="imgAvatar" name="img"><a type="submit" id="updateAvatar" style="cursor: pointer;" class="ul-w-button1 middle">Загрузить</a></div>
                                <p id="fileDownloadInfo"></p>
                            </div>
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;"><span id="helpBlock" class="help-block note"></span><span style="color: #8bc63e;">*</span>Обязательные поля</div>
                            <a type="submit" id="updateUserData" style="cursor: pointer;" class="ul-w-button1 middle">Изменить</a>
                        </form>
                    </div>
                </div>
                <div id="ul-id-7-0" class="row ul-row"><div id="ul-id-7-1" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-2" class="ul-widget ul-w-spacer" data-controls="mer" style="height:50px" data-widget="spacer"></div></div></div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>