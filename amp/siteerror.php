<?php
require 'amp.php';
$amp = new amp();

$amp->head('siteerror','Сообщить об ошибке на сайте', 'Сообщить об ошибке на сайте islandgift.ru, или предложить идеи', 'Ошибка на сайте предложения идеи мнение не работает');
?>
<main>
    <div class="container">
        <h1>Сообщить <span class="g-color-text-3">об ошибке</span></h1>
        <p>К сожалению на данный момент сообщить об ошибке можно только на полной версии сайта. Пожалуйста перейдите на полную версию сайта и сообщите об найденой ошибке.</p>
        <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/siteerror">Сообщить об ошибке</a></div>
    </div>
</main>
<?php
$amp->footer();
?>
