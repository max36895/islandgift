<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');
include 'kernel/SITE.php';
$product = new Product();

$isOrder = $product->isOrder();
$sumOrder = 0;
$countOrder = 0;

if ($isOrder) {
    $allOrder = $product->getOrderTmp();
    $sumOrder = $allOrder[0][6];
    $countOrder = $allOrder[0][7];

    if ($sumOrder <= 0 || $countOrder <= 0) {
        echo '<script>document.location.href = \'/gift\'</script>';
    }

} else
    echo '<script>document.location.href = \'/gift\'</script>';

$site = new SITE();
$meta_d = 'Оформление заказа';
$meta_k = '';
$site->head('none', 'Оформить заказ', $meta_d, $meta_k);
?>
    <div id="ul-content">
        <div id="ul-id-0-0" class="ul-container g-theme-block-0 g-theme-block-2" data-theme="g-theme-block-0" data-parallax="none" style="" data-bgtype="color" data-map-settings="" data-auto_height="true" data-is-100vh-enabled="false" data-behavior="shop:checkout">
            <div class="container js-block-container" id="productOrder">
                <div id="ul-id-0-1" class="row ul-row"><div id="ul-id-0-2" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-3" class="ul-widget ul-w-spacer" data-controls="ue" style="height:69px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-4" class="row ul-row">
                    <div id="ul-id-0-5" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-page_header-0" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="ue" data-tag="span" data-widget="header">
                            <div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><h1 class="ul-w-header-span h1" style="text-align:left">Оформление заказа</h1></div></div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-6" class="row ul-row">
                    <div id="ul-id-0-7" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-page_description-0" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"> После оформления заказа на ваш адрес будет выслано письмо с дальнейшими инструкциями по оплате. Для способа доставки Курьером, обязательно укажите свой адрес.</div></div>
                    </div>
                </div>
                <div id="ul-id-0-8" class="row ul-row">
                    <div id="ul-id-0-9" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-10" class="ul-widget ul-w-spacer" data-controls="ue" style="height:42px" data-widget="spacer"></div>
                    </div>
                </div>
                <div id="ul-id-0-11" class="row ul-row">
                    <div id="ul-id-0-12" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-13" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2 style="text-align:left">Проверьте выбранные товары&nbsp;</h2></div></div>
                    </div>
                </div>
                <div id="ul-id-0-14" class="row ul-row">
                    <div id="ul-id-0-15" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-extended_cart-0" class="ul-widget ul-w-extendedCart js-w-extendedCart" data-controls="ue" data-widget="extendedCart">
                            <table class="ul-w-extendedCart__table js-ul-w-extendedCart__table">
                                <thead><tr>
                                    <th data-col-type="title"><div class="h4" data-model="dictionary.title">Название товара</div></th>
                                    <th data-col-type="quantity"><div class="h4" data-model="dictionary.quantity">Количество</div></th>
                                    <th data-col-type="remove"></th><th data-col-type="price"><div class="h4" data-model="dictionary.price">Цена</div></th>
                                </tr></thead>
                                <tbody id="allOrder"></tbody>
                                <?php
                                foreach ($allOrder as $order) {
                                        ?>
                                        <tr class="ul-w-extendedCart__product js-w-extendedCart__table__product" id="<?= $order[1] ?>_tr" data-product-id="5a533bf08b4415f65b231f57" data-uid="5a533bf08b4415f65b231f57">
                                            <td data-col-type="title">
                                                <a href="/product/<?=$order[1]?>" class="ul-w-extendedCart__product__info" title="Посмотреть <?= $order[4] ?>">
                                                    <span class="ul-w-extendedCart__product__info__image"><img src="<?= $order[3] ?>" class="imgZoom" alt="<?= $order[4] ?>"></span>
                                                    <span class="ul-w-extendedCart__product__info__title "><p class="ul-w-extendedCart__product__info__title__plain normal"><?= $order[4] ?></p></span>
                                                </a>
                                            </td>
                                            <td data-col-type="quantity">
                                                <div class="ul-w-extendedCart__product__quantity js-w-extendedCart__table__quantity">
                                                    <span class="ul-w-extendedCart__product__quantity__minus js-w-extendedCart__table__quantity__action" id="remove_<?= $order[1]; ?>" data-price-value="<?=$order[5]/$order[2]?>" data-product-id="<?=$order[1]?>" data-product-title="<?=$order[4]?>" data-product-quantity="<?=$order[3]?>" data-action="minus"><span class="icon-content-special-minus ul-w-extendedCart__product__quantity__icon"></span></span>
                                                    <span style="font-weight: bold;" class="ul-w-extendedCart__product__quantity__value js-w-extendedCart__table__quantity__value normal" id="<?= $order[1];?>_count"><?= $order[2]; ?></span>
                                                    <span class="ul-w-extendedCart__product__quantity__plus js-w-extendedCart__table__quantity__action" id="add_<?= $order[1]; ?>" data-price-value="<?=$order[5]/$order[2];?>" data-product-id="<?=$order[1]?>" data-product-title="<?=$order[4]?>" data-product-quantity="<?=$order[3]?>" data-action="plus"><span class="icon-content-special-plus ul-w-extendedCart__product__quantity__icon"></span></span>
                                                </div>
                                            </td>
                                            <td data-col-type="remove">
                                                <div class="ul-w-extendedCart__product__remove" id="removeProduct_<?= $order[1]?>" data-price-value="<?=$order[5]/$order[2];?>" data-product-id="<?=$order[1]?>"><span class="ul-w-extendedCart__product__remove__icon icon-content-special-cross-small js-w-extendedCart__table__remove" title="Полностью удалить данный товар"></span></div>
                                            </td>
                                            <td data-col-type="price">
                                                <div style="font-weight: bold;" class="ul-w-extendedCart__product__price normal"><span data-type="value" id="<?= $order[1]; ?>_price" data-raw="<?= $order[5]; ?>"><?= $order[5]; ?></span> <span data-type="currency">руб.</span></div>
                                            </td>
                                        </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <div class="ul-w-extendedCart__in-total">
                                <div class="ul-w-extendedCart__in-total__text"><div class="normal" data-model="dictionary.inTotal">Итого</div></div>
                                <div style="font-weight:700" class="ul-w-extendedCart__in-total__price js-w-extendedCart__in-total__price h3"><span data-type="value" data-raw="0" id="sumOrder"><?= $sumOrder;?></span> <span data-type="currency">руб.</span></div>
                            </div>
                            <div class="ul-w-extendedCart__continue-shopping"><a href="/gift" class="normal" style="color: #0f7bff" data-model="dictionary.backToShopping">Продолжить покупки</a></div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-16" class="row ul-row"><div id="ul-id-0-17" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-18" class="ul-widget ul-w-spacer" data-controls="ue" style="height:114px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-19" class="row ul-row">
                    <div id="ul-id-0-20" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-customer_info_header-0" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2 style="text-align:left">Заполните информацию о себе&nbsp;</h2></div></div>
                    </div>
                </div>
                <?php
                $userInfoTrigger = true;

                if ($site->avt->userDb->login) {
                    $userInfoTrigger = false;
                }
                ?>
                <div id="ul-id-0-21" class="row ul-row">
                    <div id="ul-id-0-22" class="col ul-col col-xs-12 col-sm-12 col-md-9">
                        <div id="ul-id-customer_info-0" class="ul-widget ul-widget-customerInfo js-widget-customerInfo" data-widget="customerInfo" data-controls="ue" data-customerinfo="">
                            <div class="ul-widget-customerInfo-wrapper">
                                <form class="js-widget-customerInfo-form ul-widget-customerInfo-wrapper-form" role="form">
                                    <div class="ul-custom-fields">
                                        <div class="ul-custom-fields-wrapper" data-validation="name" data-type="text" <?php echo (!$userInfoTrigger)?'style="display:none;"':'';?>>
                                            <div class="ul-custom-fields-wrapper-content">
                                                <input type="text" name="5a50c183eead5be83c0804f3" autocomplete="name" class="ul-custom-fields-wrapper-content-control normal" <?php echo (!$userInfoTrigger)?('value="'.$site->avt->fullName().'"'):'';?> placeholder="Имя" required id="orderName"><span class="ul-custom-fields-wrapper-required-icon">*</span>
                                            </div>
                                        </div>
                                        <div class="ul-custom-fields-wrapper" data-validation="email" data-type="text" <?php echo (!$userInfoTrigger)?'style="display:none;"':'';?>>
                                            <div class="ul-custom-fields-wrapper-content">
                                                <input type="email" name="5a50c183eead5be83c0804f2" autocomplete="email" class="ul-custom-fields-wrapper-content-control normal" <?php echo (!$userInfoTrigger)?('value="'.$site->avt->userDb->mail.'"'):'';?> placeholder="E-mail" required id="orderMail"><span class="ul-custom-fields-wrapper-required-icon">*</span>
                                            </div>
                                        </div>
                                        <div class="ul-custom-fields-wrapper" data-validation="none" data-type="textarea">
                                            <div class="ul-custom-fields-wrapper-content"><textarea name="5a50c183eead5be83c0804f1" class="ul-custom-fields-wrapper-content-control normal" rows="5" placeholder="Комментарии к заказу" id="orderMessage"></textarea></div>
                                            <span class="ul-custom-fields-wrapper-description g-color-text-1 note">Укажите дополнительные пожелания к заказу</span>
                                        </div>
                                    </div>
                                    <a type="submit" class="js-widget-customerInfo-fake-submit ul-widget-customerInfo-fake-submit"></a>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="ul-id-0-23" class="col ul-col col-xs-12 col-sm-12 col-md-3"><div id="ul-id-0-24" class="ul-widget ul-w-spacer" data-controls="ue" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-25" class="row ul-row"><div id="ul-id-0-26" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-27" class="ul-widget ul-w-spacer" data-controls="ue" style="height:114px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-28" class="row ul-row">
                    <div id="ul-id-0-29" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-shipping_header-0" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2 style="text-align:left">Выберите доставку&nbsp;</h2></div></div>
                    </div>
                </div>
                <div id="ul-id-0-30" class="row ul-row">
                    <div id="ul-id-0-31" class="col ul-col col-xs-12 col-sm-12 col-md-9">
                        <div id="ul-id-shipping-0" class="ul-widget ul-widget-shipping js-widget-shipping" data-widget="shipping" data-controls="ue">
                            <div class="ul-widget-shipping-wrapper">
                                <div class="row">
                                    <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
                                        <div class="ul-widget-shipping-wrapper-switcher"><label class="ul-widget-shipping-wrapper-switcher-radio"><input name="shipping" type="radio" value="5a50c183eead5be83c0804f8" checked="checked" id="isShippingFalse"><span class="ul-widget-shipping-wrapper-switcher-radio-fakeInput"></span><span class="ul-widget-shipping-wrapper-switcher-radio-fakeText g-color-text-1 normal"> Самовывоз </span></label></div>
                                        <p class="g-color-text-1 ul-widget-shipping-wrapper-descrition note"></p>
                                        <p class="g-color-text-1 ul-widget-shipping-wrapper-time note"></p>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 text-right"><div class="ul-widget-shipping-wrapper-payment"><span class="g-color-text-2 ul-widget-shipping-wrapper-payment-price normal"> бесплатно </span></div></div>
                                </div>
                                <div class="ul-widget-shipping-wrapper-separator">
                                    <div class="ul-widget-shipping-wrapper-separator-line"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-7 col-sm-7 col-xs-7 col-lg-7">
                                        <div class="ul-widget-shipping-wrapper-switcher"><label class="ul-widget-shipping-wrapper-switcher-radio"><input name="shipping" type="radio" value="5a50c183eead5be83c0804f7" id="isShippingTrue"><span class="ul-widget-shipping-wrapper-switcher-radio-fakeInput"></span><span class="ul-widget-shipping-wrapper-switcher-radio-fakeText g-color-text-1 normal"> Доставка курьером </span></label></div>
                                        <p class="g-color-text-1 ul-widget-shipping-wrapper-descrition note">Курьерская доставка до двери </p>
                                        <p class="g-color-text-1 ul-widget-shipping-wrapper-time note"> от 3 до 5 дней </p></div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 col-lg-5 text-right">
                                        <div class="ul-widget-shipping-wrapper-payment"><span class="g-color-text-2 ul-widget-shipping-wrapper-payment-price normal"> <span data-type="value" data-raw="300">300</span> <span data-type="currency">руб.</span> </span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="ul-id-0-32" class="col ul-col col-xs-12 col-sm-12 col-md-3"><div id="ul-id-0-33" class="ul-widget ul-w-spacer" data-controls="ue" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-34" class="row ul-row"><div id="ul-id-0-35" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-36" class="ul-widget ul-w-spacer" data-controls="ue" style="height:114px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-37" class="row ul-row">
                    <div id="ul-id-0-38" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-39" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2 style="text-align:left">Выберите способ оплаты&nbsp;</h2></div></div>
                    </div>
                </div>
                <div id="ul-id-0-40" class="row ul-row">
                    <div id="ul-id-0-41" class="col ul-col col-xs-12 col-sm-12 col-md-9">
                        <div id="ul-id-payments-0" class="ul-widget ul-widget-payment js-widget-payment" data-widget="payment" data-controls="ue">
                            <div class="ul-widget-payment-wrapper">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <div class="ul-widget-payment-wrapper-switcher" id="yandexOff"><label class="ul-widget-payment-wrapper-switcher-radio"><input name="payment" type="radio" value="5a50c183eead5be83c0804f6" checked="checked"> <span class="ul-widget-payment-wrapper-switcher-radio-fakeInput"></span><span class="ul-widget-payment-wrapper-switcher-radio-fakeText g-color-text-1 normal"> Наличными </span></label></div>
                                        <p class="g-color-text-1 ul-widget-payment-wrapper-descrition note"></p>
                                    </div>
                                </div>
                                <div class="ul-widget-payment-wrapper-separator"><div class="ul-widget-payment-wrapper-separator-line"></div></div>
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                                        <div class="ul-widget-payment-wrapper-switcher" id="yandexOn">
                                            <label class="ul-widget-payment-wrapper-switcher-radio">
                                                <input name="payment" type="radio" value="1">
                                                <span class="ul-widget-payment-wrapper-switcher-radio-fakeInput"></span>
                                                <span class="ul-widget-payment-wrapper-switcher-radio-fakeText g-color-text-1 normal"> Яндекс деньги </span>
                                            </label>
                                        </div>
                                        <p class="g-color-text-1 ul-widget-payment-wrapper-descrition note">Оплата через Яндекс кошелек </p>
                                    </div>
                                </div>
                                <div class="ul-widget-payment-wrapper-separator"><div class="ul-widget-payment-wrapper-separator-line"></div></div>
                            </div>
                        </div>
                    </div>
                    <div id="ul-id-0-42" class="col ul-col col-xs-12 col-sm-12 col-md-3"><div id="ul-id-0-43" class="ul-widget ul-w-spacer" data-controls="ue" style="height:36px" data-widget="spacer"></div></div>
                </div>
                <div id="ul-id-0-44" class="row ul-row"><div id="ul-id-0-45" class="col ul-col col-xs-12 col-sm-12 col-md-12"><div id="ul-id-0-46" class="ul-widget ul-w-spacer" data-controls="ue" style="height:114px" data-widget="spacer"></div></div></div>
                <div id="ul-id-0-47" class="row ul-row">
                    <div id="ul-id-0-48" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-checkout_header-0" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="ue" data-widget="wysiwyg">
                            <div class="ul-wysivig-editor clearfix" style="outline:0;word-wrap:break-word"><h2 style="text-align:left">Оформите заказ&nbsp;</h2></div>
                        </div>
                    </div>
                </div>
                <div id="ul-id-0-49" class="row ul-row">
                    <div id="ul-id-0-50" class="col ul-col col-xs-12 col-sm-12 col-md-9">
                        <div id="ul-id-checkout-0" class="ul-widget ul-widget-checkout js-widget-checkout" data-widget="checkout" data-controls="ue">
                            <div class="ul-widget-checkout-wrapper">
                                <div class="row ul-widget-checkout-wrapper-productsQuantity-wrapper">
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <div data-namespace="productsQuantity" class="ul-widget-checkout-wrapper-productsQuantity-text js-w-checkout-productsQuantity-text g-color-text-1 normal">Количество товаров</div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 ul-w-checkout-right" data-is-not-editable="true">
                                        <span data-fill="quantity" class="ul-widget-checkout-wrapper-productsQuantity-countProducts js-w-checkout-productsQuantity-countProducts g-color-text-1 h3" id="resultCountOrder"><?= $countOrder;?></span>
                                        <span class="ul-widget-checkout-wrapper-productsQuantity-countType js-w-checkout-productsQuantity-countType h3">шт.</span>
                                    </div>
                                </div>
                                <div class="row ul-widget-checkout-wrapper-totalProductsCost-wrapper">
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <div data-namespace="totalProductsCost" class="ul-widget-checkout-wrapper-totalProductsCost-text js-w-checkout-sumCost-text g-color-text-1 normal">Общая стоимость</div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 ul-w-checkout-right" data-is-not-editable="true"><span class="ul-widget-checkout-wrapper-totalProductsCost g-color-text-1 h3" data-fill="totalProductsCost"><span data-type="value" data-raw="0" id="resultSumOrder"><?=$sumOrder?></span><span data-type="currency">руб.</span> </span></div>
                                </div>
                                <div class="row ul-widget-checkout-wrapper-shipping-wrapper">
                                    <div class="col-md-7 col-sm-7 col-xs-7">
                                        <div data-namespace="shipping" class="ul-widget-checkout-wrapper-shipping-text js-w-checkout-shipping-text g-color-text-1 normal">Доставка</div>
                                    </div>
                                    <div class="col-md-5 col-sm-5 col-xs-5 ul-w-checkout-right" data-is-not-editable="true"><span class="ul-widget-checkout-wrapper-shipping-cost g-color-text-1 h3" data-fill="shippingCost"> <span data-type="value" data-raw="0" id="shipping">0</span> <span data-type="currency">руб.</span> </span></div>
                                </div>
                                <div class="ul-widget-checkout-wrapper-separator"><div class="ul-widget-checkout-wrapper-separator-line"></div></div>
                                <div class="row ul-widget-checkout-wrapper-inTotal-wrapper">
                                    <div class="col-md-7 col-sm-7 col-xs-5"><div data-namespace="inTotal" class="g-color-text-1 ul-widget-checkout-wrapper-inTotal-text js-w-checkout-inTotal-text h4">Итого</div></div>
                                    <div class="col-md-5 col-sm-5 col-xs-7 ul-w-checkout-right" data-is-not-editable="true"><span data-fill="inTotal" class="ul-widget-checkout-wrapper-inTotal-cost g-color-text-1 h2"> <span data-type="value" data-raw="0" id="SumOrderAll"><?=$sumOrder?></span> <span data-type="currency">руб.</span> </span></div>
                                </div>
                            </div>
                        </div>
                        <div id="ul-id-submit_order-0" class="ul-widget ul-w-button text-right" data-controls="ue" data-widget="button">
                            <a class="normal ul-w-button1 middle" target="_self" id="createOrder">Оформить заказ</a>
                        </div>
                    </div>
                    <div id="ul-id-0-51" class="col ul-col col-xs-12 col-sm-12 col-md-3">
                        <div id="ul-id-0-52" class="ul-widget ul-w-spacer" data-controls="ue" style="height:36px" data-widget="spacer"></div>
                    </div>
                </div>
                <div id="ul-id-0-53" class="row ul-row">
                    <div id="ul-id-0-54" class="col ul-col col-xs-12 col-sm-12 col-md-12">
                        <div id="ul-id-0-55" class="ul-widget ul-w-spacer" data-controls="ue" style="height:80px" data-widget="spacer"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
$site->footer();
?>