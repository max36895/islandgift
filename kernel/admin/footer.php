</main><footer>
    <div class="footer-middle"><div class="container"><div class="row"><div class="col-md-4 col-xs-12"><div class="logo-head"><div id="ul-id-header-siteName2" spellcheck="false" class="ul-widget ul-widget-wysivig-header" data-controls="e" placeholder="" data-tag="span" data-widget="header"><div spellcheck="false"><div class="ul-header-editor clearfix ul-header-wrap" placeholder="placeholder" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" style="text-align:center"><span class="g-color-text-2">max</span><span class="g-color-text-3">IMKO</span></span></div></div></div></div><div id="ul-id-wysiwyg-footerabout" class="ul-widget ul-widget-wysivig" data-image="true" data-controls="e" data-widget="wysiwyg"><div class="ul-wysivig-editor clearfix" placeholder="placeholder" style="outline:0;word-wrap:break-word"><p><span class="g-color-text-2"><?php
                                    $randtext = random_int(0,8);$text = ''; switch ($randtext){
                                        case 0:
                                            $text = 'Благодарим Вас за визит. Надеемся что вы смогли найти все необходимое на страницах нашего сайта.😊';
                                            break;
                                        case 1:
                                            $text = 'На страницах нашего сайта представлен огромный ассортимент необычных и оригинальных товаров.🎈';
                                            break;
                                        case 2:
                                            $text = 'Интернет-магазин подарков Maximko – это то самое место, где вы всегда найдете море подарков на любой вкус и к каждому торжественному случаю.✌';
                                            break;
                                        case 3:
                                            $text = 'Мы занимаемся не только тем, что готовим подарки, но и организовываем праздники.🎁';
                                            break;
                                        case 4:
                                            $text = 'Не знаете что подарить?<br> Воспользуйтесь сервисом для генерации подарков😉';
                                            break;
                                        case 5:
                                            $text = 'Корпоративы, свадьбы, новый год, день рождения-нам по плечу любая задача.✨';
                                            break;
                                        default:
                                            $text = 'Не смогли ничего найти?😞<br>Напишите нам, мы постараемся помочь Вам😇';
                                            break;
                                    }
                                    echo $text;
                                    ?></span><br></p></div></div><div style="text-align:  center;"><img src="/logo_white.png" alt="MaxImko" style="width: 70%;"></div></div><div class="col-md-4 col-xs-12"><div id="ul-id-contacts-bottom" itemscope class="ul-widget ul-w-contacts" data-controls="e" data-widget="contacts"><div id="id-contacts-schema-item" itemprop="itemReviewed" class="ul-w-contacts-design1 ul-w-contacts-custom-design1" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="maxIMKO"><div class="ul-w-contacts-item" data-item-id="146a02c1-348e-4eca-9c38-b3d4359c2d8c"><div class="ul-w-contacts-list"><span class="ul-w-contacts-item-title h2">Контакты</span><ul><li class="ul-w-contacts-f-phone normal"><a id="ul-w-contacts-phoneLink" class="ul-w-contacts-phoneLink" href="tel:<?=$this->phone;?>"><span itemprop="telephone"><span role="phone"><?=$this->phone;?></span></span></a></li><li class="ul-w-contacts-f-address normal" itemprop="address"><span><?=$this->address;?></span></li><li class="ul-w-contacts-f-skype normal"><a href="skype://live:<?=$this->skype;?>?chat"><?=$this->skype;?></a></li><li class="ul-w-contacts-f-email normal"><a href="mailto:<?=$this->mail?>"><span itemprop="email"><?=$this->mail?></span></a></li></ul></div></div></div></div><div class="bot-social-bar"><div id="ul-id-social-bar2" class="ul-widget ul-w-social ul-w-social-design1 ul-w-social-custom-design1" data-controls="e" data-widget="social" style="text-align:left"><span class="ul-w-social-icons" style="display:inline-block"><span class="ul-w-social-item"> <a href="https://vk.com/islandgift" class="ul-w-social-icon ul-w-social-vkontakte ul-w-social-icon-active" target="_blank"></a> </span><span class="ul-w-social-item"> <a href="http://t.me/max36895" class="ul-w-social-icon ul-w-social-telegram ul-w-social-icon-active" target="_blank"></a> </span><span class="ul-w-social-item"> <a href="skype://live:<?=$this->skype?>?chat" class="ul-w-social-icon ul-w-social-skype ul-w-social-icon-active" target="_blank"></a> </span><span class="ul-w-social-item"> <a href="https://api.whatsapp.com/send?phone=79092813520" class="ul-w-social-icon ul-w-social-whatsapp ul-w-social-icon-active" target="_blank"></a> </span></span></div>
                        <script src="//yastatic.net/es5-shims/0.0.2/es5-shims.min.js"></script><script src="//yastatic.net/share2/share.js"></script><p style="padding-bottom: 0; padding-top: 5px;"><span class="g-color-text-2">Поделиться в соц. сетях</span></p><div class="ya-share2" data-services="vkontakte,facebook,telegram,odnoklassniki,whatsapp,viber,skype,moimir" data-counter="" data-limit="5"></div>
                    </div></div><div class="col-md-4 col-xs-12"><div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack"><form class="feedBack" method="post" role="form"><div class="ul-widget-feedBack-form-group ul-widget-feedBack-header has-feedback"><div class="ul-w-feedBack-editable h2" data-name="header.title">Связаться с нами</div></div><div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Имя</div><input class="ul-widget-feedBack-form-control normal" type="text" id="userName" name="name" ul-model="name" placeholder="Имя" required> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div><div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label"><label class="control-label normal">E-mail</label></div><input class="ul-widget-feedBack-form-control normal" type="email" id="userMail" name="email" ul-model="email" required placeholder="E-mail"> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div><div class="ul-widget-feedBack-form-group has-feedback"><div class="ul-w-feedBack-editable" data-name="message.title"><div class="ul-w-feedBack-control-label ul-editor-wrapper clearfix normal" spellcheck="false"> Сообщение</div></div><textarea class="ul-widget-feedBack-form-control normal" name="message" id="userMessage" ul-model="message" rows="3" placeholder="Сообщение" required></textarea> <span class="ul-widget-feedBack-form-control-feedback icon-content-special-required"></span></div><div class="ul-w-feedBack-control-label ul-w-feedBack-control-helpBlock"><span id="helpBlock" class="help-block note"> <span class="icon-content-special-required"></span> Обязательные поля </span></div><a type="submit" id="sendReviews" style="cursor: pointer;" class="ul-w-button1 middle">Отправить</a><div class="alert ul-widget-feedBack-responce note" style="display:none" role="alert" data-error-email="Неверно введён адрес E-mail."></div></form></div></div></div></div></div>
    <div class="footer-sub"><div class="container"><div class="pull-left"><div id="ul-id-wysiwyg-copyright1" class="ul-widget ul-widget-wysivig" data-image="" data-controls="e" data-widget="wysiwyg" data-animation-type="fade" data-was-animated="true"><div class="ul-wysivig-editor clearfix" placeholder="placeholder" style="outline:0;word-wrap:break-word"><p><span class="g-color-text-2">© <?php echo date('Y');?>&nbsp;</span><span><a rel="nofollow" target="_blank" href="https://vk.com/islandgift">MAX</a><a href="http://иннка.рф" target="_blank" class="g-color-text-3">IMKO</a></span></p></div></div></div><div class="pull-right"><div id="ul-id-wysiwyg-copyright1" class="ul-widget ul-widget-wysivig ul-scroll-animate" data-image="" data-controls="e" data-widget="wysiwyg" data-animation-type="fade" data-was-animated="true"><div class="ul-wysivig-editor clearfix" placeholder="placeholder" style="outline:0;word-wrap:break-word"><p><a rel="nofollow" href="/siteerror">Нашли ошибку?<span class="g-color-text-3"> Сообщите нам</span></a></p></div></div></div></div></div>
</footer>
<div class="modal-overlay closed" id="modal-overlay"></div><div class="modal closed" id="modal_form"  aria-hidden="true" aria-labelledby="modalTitle" aria-describedby="modalDescription" role="dialog"><div class="closeModal" id="close-button" title="Закрыть окно"><i></i></div><div class="modal-guts" role="document"><div class="ul-header-editor clearfix ul-header-wrap" style="outline:0;word-wrap:break-word;margin:0 5px"><span class="ul-w-header-span h1" id="modalTitle" style="text-align:center;font-size: 42px !important;"></span></div><p><span class="g-color-text-2" id="messageForUser" style="text-align:center"></span></p></div></div><div id="overlay"></div></div></div></div>
<script src="script/plugins/plugin.js" ></script><script src="script/siteadminka.js"></script>
<div id="upbutton-container" class="ul-upbutton"><div class="ul-upbutton-icon"></div></div>
<script src="/js/lib/requirejs.min.js"></script><script src="/js/requireConf.js"></script><script src="/js/ulib/ulib.js"></script>
<!-- Yandex.Metrika counter --> <script type="text/javascript" > (function (d, w, c) { (w[c] = w[c] || []).push(function() { try { w.yaCounter47399530 = new Ya.Metrika2({ id:47399530, clickmap:true, trackLinks:true, accurateTrackBounce:true, webvisor:true, trackHash:true }); } catch(e) { } }); var n = d.getElementsByTagName("script")[0], s = d.createElement("script"), f = function () { n.parentNode.insertBefore(s, n); }; s.type = "text/javascript"; s.async = true; s.src = "https://mc.yandex.ru/metrika/tag.js"; if (w.opera == "[object Opera]") { d.addEventListener("DOMContentLoaded", f, false); } else { f(); } })(document, window, "yandex_metrika_callbacks2"); </script> <!-- /Yandex.Metrika counter -->
<!-- Global site tag (gtag.js) - Google Analytics --><script async src="https://www.googletagmanager.com/gtag/js?id=UA-85624028-3"></script>
<script>  window.dataLayer = window.dataLayer || [];function gtag(){dataLayer.push(arguments);}gtag('js', new Date());gtag('config', 'UA-85624028-3');</script>
</body>
</html>
