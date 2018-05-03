<?php
$contact = include __DIR__.'/../../kernel/param/contact.php';
$randText = random_int(0, 8);
$textFooterInfo = '';
switch ($randText) {
    case 0:
        $textFooterInfo = 'Благодарим Вас за визит. Надеемся что вы смогли найти все необходимое на страницах нашего сайта.😊';
        break;
    case 1:
        $textFooterInfo = 'На страницах нашего сайта представлен большой ассортимент необычных и оригинальных товаров.🎈';
        break;
    case 2:
        $textFooterInfo = 'Интернет-магазин подарков Maximko – это то самое место, где вы всегда найдете море подарков на любой вкус и к каждому торжественному случаю.✌';
        break;
    case 3:
        $textFooterInfo = 'Мы занимаемся не только тем, что готовим подарки, но и организовываем праздники.🎁';
        break;
    case 4:
        $textFooterInfo = 'Не знаете что подарить?<br> Воспользуйтесь <a href="/picking" title="Идеи для подарка" style="color: #0f7bff !important;">сервисом</a> для генерации подарков😉';
        break;
    case 5:
        $textFooterInfo = 'Корпоративы, свадьбы, новый год, день рождения-нам по плечу любая задача.✨';
        break;
    case 6:
        $textFooterInfo = 'Не знаете что подарить? Напишите нам и мы обязательно вам поможем✨';
        break;
    case 7:
        $textFooterInfo = 'У вас есть идеи по улучшению сайта? или хотите поделиться с нами своими идеями, то пишите нам, и мы обязательно к вам прислушаемся✌';
        break;
    case 8:
        $textFooterInfo = 'А вы знали что мы теперь в Алисе!<br>Для того чтобы вызвать нас, запустите Яндекс(бета) и скажите "запусти исланд гифт". Вместе мы делаем данный ресурс лучше!';
        break;
    default:
        $textFooterInfo = 'Не смогли ничего найти?😞<br>Напишите нам, мы обязательно поможем Вам😇';
        break;
}
$textFooterInfo .= '<br>Будем крайне благодарны если Вы поучаствуете в нашем <a href="https://www.islandgift.ru/survey" title="Опрос">опросе</a>';
return '
<div data-block="share" data-network="vkontakte, telegram, facebook, odnoklassniki, google, twitter"></div> 
<p>' . $textFooterInfo . '</p><h2>Контактная информация</h2>
<p>Город: ' . $contact['']['address'] . '</p>
<p>Телефон: <a href="tel:+79092813520">' . $contact['']['phone'] . '</a></p>
<p>Email: <a href="mailto:info@islandgift.ru">' . $contact['']['mail'] . '</a></p>
<p>VK: <a href="https://vk.com/islandgift">https://vk.com/islandgift</a></p>
<p>Telegram: <a href="http://t.me/max36895">@max36895</a></p>
<p>WhatsApp: <a href="https://api.whatsapp.com/send?phone=79092813520">89092813520</a></p>
]]>
</turbo:content>
<pubDate>' . date('r') . '</pubDate>
</item>
';