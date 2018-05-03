<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$site = new SITE();

$site->head('siteerror');

if (isset($_GET['msg'])) {
    if ($_GET['msg'] == 'thanks')
        echo '<script>alert("Благодарим Вас за найденную ошибку или предложение. Мы обязательно к вам прислушаемся и постараемся все реализовать. Спасибо Вам!");</script>';
}
?>
<div id="ul-content">
    <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-7-4" class="row ul-row"><div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div></div></div>
            <div id="ul-id-7-7" class="row ul-row"><div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" data-tag="h1" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:center">Сообщить об ошибке😳 <span class="g-color-text-3">или предложить идею для улучшения🎉</span>&nbsp;</h1></div></div></div></div></div>
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
                    <form class="feedBack" method="post" role="form" id="reg" action="/kernel/Error.php" enctype="multipart/form-data">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Введите свои данные и информацию об ошибке или предложении</div></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Ваше имя</div><?php
                            $userInfoTrigger = true;
                            if ($site->avt->userDb->login) {
                                $userInfoTrigger = false;
                            }
                            ?>
                            <input class="ul-widget-feedBack-form-control normal" type="text" name="name" autocomplete="name" placeholder="Ваше имя" value="<?php echo (!$userInfoTrigger)?(''.$site->avt->fullName().''):'';?>" required>
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                            <div style="column-count: 2;width: 100%"><span id="textstate"></span><span id="imgstate"></span></div>
                        </div><div class="ul-widget-feedBack-form-group has-feedback has-feedback" style="display: none;"><div class="ul-w-feedBack-control-label"><label class="control-label normal">Ваш логин</label></div><input title="логин" class="ul-widget-feedBack-form-control normal" type="text" name="login" value="<?php echo (!$userInfoTrigger)?(''.$site->avt->userDb->login.''):'Не авторизован';?>"><span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Почта</div>
                            <input class="ul-widget-feedBack-form-control normal" type="email" autocomplete="email" name="mail" placeholder="Ваша почта" value="<?php echo (!$userInfoTrigger)?(''.$site->avt->userDb->mail.''):'';?>" required>
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Информация об ошибке(предложении)</div>
                            <textarea class="ul-widget-feedBack-form-control normal" name="error" placeholder="Информация об ошибке" required></textarea>
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title" style="display: block;">Скриншот(фотография) ошибки</div>
                            <input class="ul-widget-feedBack-form-control normal" type="file" name="img">
                        </div>
                        <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;"><span id="helpBlock" class="help-block note"><span style="color: #8bc63e;">*</span>Обязательные поля </span></div>
                        <button type="submit" style="cursor: pointer;" class="ul-w-button1 middle">Отправить</button>
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
