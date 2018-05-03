<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
require_once 'AdminSite.php';
$site = new Admin();

if ($site->avt->userDb->admin != 1 || !$site->avt->avtTriger) {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    echo '<script>document.location.href = "/"</script>';
}

$info = '';
if ($_POST) {
    $info = '<span style="color: black;font-weight: bold;">' . $site->addGift() . '</span>';
}

$site->head('Админка сайта', '', '');
echo $info;
?>
<div id="ul-content">
    <div id="ul-id-7-3" class="ul-container g-theme-block-2" data-theme="g-theme-block-2" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container js-block-container">
            <div id="ul-id-7-4" class="row ul-row">
                <div id="ul-id-7-5" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-6" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-7-7" class="row ul-row">
                <div id="ul-id-7-8" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-9" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="mer" placeholder="" data-tag="h1" data-widget="header">
                        <div spellcheck="false">
                            <div class="ul-header-editor clearfix ul-header-wrap" placeholder="placeholder" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 style="text-align:center">Админка <span class="g-color-text-3">сайта</span>&nbsp;
                                </h1></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-7-10" class="row ul-row">
                <div id="ul-id-7-11" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-7-12" class="ul-widget ul-w-spacer" data-controls="mer" style="height:36px" data-widget="spacer"></div>
                </div>
            </div>
        </div>
    </div>

    <div id="ul-id-5-4" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0"
         data-parallax="none" style="" data-bgtype="color"
         data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="none">
        <div class="container-fluid js-block-container">
            <div id="ul-id-6-0" class="row ul-row">
                <div id="ul-id-6-1" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-2" class="ul-widget ul-w-spacer" data-controls="mer"
                         style="height:50px" data-widget="spacer"></div>
                </div>
            </div>
            <div id="ul-id-6-3" class="row ul-row">
                <div id="ul-id-6-4" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-5" class="ul-widget" type="border">
                        <div class="ul-w-border" data-reactroot="" data-reactid="1"
                             data-react-checksum="2056334462">
                            <div class="hr ul-widget-border-style2" data-reactid="2"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="ul-id-6-6" class="row ul-row">
                <div id="ul-id-6-7" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                    <div id="ul-id-6-8" class="ul-widget ul-w-spacer" data-controls="mer"
                         style="height:50px" data-widget="spacer"></div>
                </div>
            </div>

            <div id="ul-id-9-0" class="row ul-row" style="text-align: center;">
                <div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="margin: 0 auto;">
                    <a type="submit" id="ButtonAdd" style="cursor: pointer;"
                       class="ul-w-button1 middle">
                        Добавить товар
                    </a>
                    <a type="submit" id="BittonUpdate" style="cursor: pointer;"
                            class="ul-w-button1 middle">
                        Изменить или удалить товар
                    </a>
                    <a type="submit" id="ButtonSitemap" style="cursor: pointer;"
                       class="ul-w-button1 middle">
                        sitemap и ошибки
                    </a>
                    <a type="submit" id="BittonOrder" style="cursor: pointer;"
                       class="ul-w-button1 middle">
                        Заказы
                    </a>
                    <a type="submit" id="sendMessage" style="cursor: pointer;"
                       class="ul-w-button1 middle">
                        Почта
                    </a>
                    <form class="feedBack" method="post" role="form" id="addProduct" action="addProduct.php" enctype="multipart/form-data" style="margin-top: 15px;margin-bottom: 15px;">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                            <div class="ul-w-feedBack-editable h2" data-name="header.title">Введите информацию о товаре
                            </div>
                        </div>

                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Название
                            </div>
                            <input class="ul-widget-feedBack-form-control normal" type="text"
                                   name="name" placeholder="Название" required> <span
                                    class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>

                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Категория
                            </div>
                            <select class="ul-widget-feedBack-form-control normal" type="text"
                                    name="category" placeholder="Категория" required>
                                <option value="1">Для женщин</option>
                                <option value="2">Для мужчин</option>
                                <option value="3">Для детей</option>
                                <option value="4">Для родителей</option>
                                <option value="5">Для бабушек и дедушек</option>
                                <option value="6">Цветы</option>
                                <option value="7">Сладости</option>
                                <option value="8">Коробки</option>
                                <option value="9">Универсальные</option>
                                <option value="10">Для дома</option>
                            </select>

                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Краткое описание
                            </div>
                            <textarea style='resize: vertical;' class="ul-widget-feedBack-form-control normal" type="text"
                                   name="incomplete" placeholder="Краткое описание" required></textarea>
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Подробное описание
                            </div>
                           <textarea style='resize: vertical;' class="ul-widget-feedBack-form-control normal" type="text" id="login"
                                   name="full" placeholder="Подробное описание" required></textarea>
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Цена
                            </div>
                            <input class="ul-widget-feedBack-form-control normal" type="text" id="login"
                                   name="price" placeholder="Цена" required> <span
                                    class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>

                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Количество
                            </div>
                            <input class="ul-widget-feedBack-form-control normal" type="text" id="login"
                                   name="count" placeholder="Количество" required> <span
                                    class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>

                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal"
                                 data-name="name.title" style="display: block;">Фотография товара
                            </div>
                            <input class="ul-widget-feedBack-form-control normal" type="file" name="img" required>
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>
                        <div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock" style="display: block;">
                            <span id="helpBlock" class="help-block note"> </span>
                            <span style="color: #8bc63e;">*</span>Обязательные поля
                        </div>
                        <button type="submit" id="add" style="cursor: pointer;" class="ul-w-button1 middle">
                            Добавить
                        </button>

                    </form>
                    <form class="feedBack"name="uploader" method="post" role="form" id="updateProduct" enctype="multipart/form-data" style=" margin-top: 15px;margin-bottom: 15px;display: none;">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                            <div class="ul-w-feedBack-editable h2" data-name="header.title">Введите название товара
                            </div>
                        </div>

                        <div class="ul-widget-feedBack-form-group has-feedback has-feedback">
                            <div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Название товара</div>
                            <input class="ul-widget-feedBack-form-control normal" type="text" id="product" name="product" placeholder="Название">
                            <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span>
                        </div>

                        <div id="text"></div>
                    </form>

                    <div id="sitemap" style="display: none;">
                        <div style="padding: 15px"></div>
                        <div style="width: 100%; margin-bottom: 15px;">
                            <h2>Url адреса</h2>
                            <p>Прописать все адреса в одинарных ковычках через запятую внутри квадратных скобок.<br>Статьи и продукция генерируются автоматически.</p>
                            <textarea id="textSitemap" style="resize: vertical;height: 512px;width: 100%;margin-bottom: 15px" title="Url адреса"></textarea>
                            <a type="submit" id="updateSitemap" style="cursor: pointer;" class="ul-w-button1 middle">Изменить</a>
                        </div>
                        <div style="margin: 15px">
                            <?php
                            require_once 'Error.php';
                            $error = new ErrorSite();

                            $dataE = $error->selectError();
                            if ($dataE) {
                                while ($data = mysqli_fetch_array($dataE, MYSQLI_NUM)) {
                            ?>
                                    <table border="1" id="error_<?=$data[0]?>">
                                        <tr>
                                            <td>ФИО нашедшего ошибку</td>
                                            <td><?=$data[1]?></td>
                                        </tr>
                                        <tr>
                                            <td>Логин</td>
                                            <td><?=$data[2]?></td>
                                        </tr>
                                        <tr>
                                            <td>Почта</td>
                                            <td><?=$data[3]?></td>
                                        </tr>
                                        <tr>
                                            <td>Ошибка/предложение</td>
                                            <td><?=$data[7]?></td>
                                        </tr>
                                        <tr>
                                            <td>Дата</td>
                                            <td><?=$data[4]?></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><img src="<?=$data[6]?>" style="width: 50%"></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><a type='submit' id='refact_<?=$data[0]?>' style='cursor: pointer;' class='ul-w-button1 middle'>Исправлена</a></td>
                                        </tr>
                                    </table>
                            <?php
                                }
                                mysqli_free_result($dataE);
                            }
                            ?>
                        </div>
                    </div>
                    <div id="order" style="display: none;">
                        <div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback">
                            <div class="ul-w-feedBack-editable h2" data-name="header.title">Заказы</div>
                        </div>
                        <?php
                        $order = new Order();
                        $datas = $order->selectAllOrder();
                        if ($datas) {
                            while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                        ?>
                        <table border="1" style="width: 100%;margin-top: 25px" id="tableOrder_<?=$data[0]?>">
                                <tr>
                                    <td>Номер заказа</td>
                                    <td><?=$data[0]?></td>
                                </tr>
                                <tr>
                                    <td>Пользователь</td>
                                    <td><?=$data[1]?></td>
                                </tr>
                                <tr>
                                    <td>Имя</td>
                                    <td><?=$data[8]?></td>
                                </tr>
                                <tr>
                                    <td>Почта</td>
                                    <td><a href="mailto:<?=$data[9]?>"><?=$data[9]?></a></td>
                                </tr>
                                <tr>
                                    <td>Товары</td>
                                    <td><?php
                                        $order->id = $data[0];
                                        $products = $order->selectAllGiftOrder();
                                        if ($products) {
                                            while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
                                        ?>
                                                <p><a href="/product/<?=$product[8]?>" title="товар-<?=$product[9]?>"><?=$product[9]?></a> :  в количестве: <?=$product[11]?> шт.</p><br>
                                        <?php
                                            }
                                        }
                                        ?></td>
                                </tr>
                                <tr>
                                    <td>Статус заказа</td>
                                    <td><select class='ul-widget-feedBack-form-control normal' type='text' id='statusO_<?=$data[0]?>' placeholder='Категория' required><option value='1'<?php echo (($data[4] == 1) ? 'selected' : '') ?> >Не оплачен</option><option value='2'<?php echo (($data[4] == 2) ? 'selected' : '') ?> >Оплачен</option><option value='3'<?php echo (($data[4] == 3) ? 'selected' : '') ?> >Доставлен</option></select></td>
                                </tr>
                                <tr>
                                    <td>Доставка</td>
                                    <td><?php echo $data[6]?'нужна':'не нужна'; ?></td>
                                </tr>
                                <tr>
                                    <td>Коментарий к заказу</td>
                                    <td><?=$data[7]?></td>
                                </tr>
                                <tr>
                                    <td>Стоимость</td>
                                    <td><?=$data[2]?></td>
                                </tr>
                                <tr>
                                    <td>
                                        <a type='submit' id='removeO_<?=$data[0]?>' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить</a>
                                    </td>
                                    <td>
                                        <a type='submit' id='updateO_<?=$data[0]?>' style='cursor: pointer;' class='ul-w-button1 middle'>Изменить</a>
                                    </td>
                                </tr>
                        </table>
                        <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
            <div id="ul-id-0-94" class="row ul-row"><div id="ul-id-0-95" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-96" class="ul-widget ul-w-spacer" data-controls="mer" style="height:72px" data-widget="spacer"></div></div></div>
        </div>
    </div>
</div>
<?php
$site->footer();
?>
