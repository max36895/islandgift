<?php
require 'amp.php';
$amp = new amp();

$meta_d = 'Не знаете что подарить? Воспользуйтесь данным сервисом для генерации подарков. С ним Вы сможете найти хорошую идею, а так же можете сразу купить необходимый товар.';
$meta_k = 'подбор подарок новый год день рождения 8 марта 23 февраля идеи праздник сервис генерация идеи';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('picking', 'Идеи для подарка', $meta_d, $meta_k);
?>
<main>
    <div class="container">
        <h1><?=$pageText['picking']['title']?></h1>
        <p><?=$pageText['picking']['section1Text']?></p>
        <p>К сожалению на данный момент сервис работает только на полной версии сайта. Пожалуйста перейдите на полную
            версию сайта и используйте данный сервис.<br> Благодарим за внимание</p>
        <div class="ul-widget ul-w-button text-center ul-scroll-animate">
            <a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/picking">Идеи для подарка</a>
        </div>
    </div>
</main>
<?php
$amp->footer();
?>
