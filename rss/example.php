<?php
$menu = include 'module/menu.php';
$footer = include 'module/footer.php';
$pageText = include '../kernel/param/textForPage.php';
echo include 'module/head.php';
echo '
<item turbo="true">
    <title>Заголовок страницы</title>
    <link>https://www.islandgift.ru/</link>
    <category>Категория(Подарки, финансы ...)</category>
    <description>
    Описание страницы
    </description>
    
    <turbo:content>
    <![CDATA[
        <header>
            <figure>
                <img src="https://www.islandgift.ru/logo.png" />
            </figure>
            <h1>Тут то, что находится в теге h1. Этот является заголовком страницы. Далее идет блок меню</h1>' . $menu . '
        </header>
            
        <h2>Тут сам контент страницы</h2>
        <figure>
            <img src="https://www.islandgift.ru/logo.png" />
            <figcaption>картинка с подписью</figcaption>
        </figure>
            
        <h3>Картинка без подписи</h3>
        <img src="https://www.islandgift.ru/logo.png" />
           
        <h3>Галерея</h3>
        <div data-block="gallery">
            <header>Галерея</header>
            <img src="https://www.islandgift.ru/logo.png" />
            <img src="https://www.islandgift.ru/logo.png" />
            <img src="https://www.islandgift.ru/logo.png" />
        </div>
        <p>
            Можно использовать множество тегов.<br>
            Подробное описание доступно по ссылке:
            <a href="https://yandex.ru/support/webmaster/turbo/rss-elements.html#rss-elements">Описание всех элементов</a>
        </p>
        <h3>Поделиться</h3>
        <div data-block="share" data-network="twitter, facebook"></div>
';
echo $footer;
echo '</channel></rss>';