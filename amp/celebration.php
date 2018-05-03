<?php
require 'amp.php';
$amp = new amp();

$meta_d = 'Ведущий, тамада на свадьбу. Проведение мероприятий: юбилей, корпоратив, выпускной, новый год. Ярославль, Москва';
$meta_k = 'ведущий тамада диджей DJ свадьба юбилей корпоратив новый год выпускной ярославль Москва Эмиль Абасов организация праздника';
$amp->head('celebration','Организация праздника',$meta_d,$meta_k);?>
    <main>
        <div class="container">
            <h1>Организация праздника</h1>
            <p>К сожалению на данная страница доступна только на полной версии сайта. Пожалуйста перейдите на полную версию сайта или сразу перейдите на сайт ведущего.</p>
            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/celebration">Наш сайт</a></div>
            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="http://emilabasov.ru">Перейти на сайт ведущего</a></div>
        </div>
    </main>
<?php
$amp->footer();
?>