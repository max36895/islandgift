<?php $pageText = include '../kernel/param/textForPage.php';?>
<amp-sidebar id="sidebar" side="right" layout="nodisplay">
    <form class="menu-layer primary" action="https://www.islandgift.ru/" target="_top">
        <button type="reset" class="close-button" id="menu-button" on="tap:sidebar.toggle"></button>
        <div class="items">
            <a class="menu-item item-layer-1" href="https://www.islandgift.ru/amp/">Главная</a>
            <label class="menu-item item-layer-1 has-sub-level"><input type="checkbox">Подарки
                <div class="submenu menu-layer secondary"><div class="return-button">Назад</div><button type="reset" class="close-button" id="menu-button" on="tap:sidebar.toggle"></button>
                    <div class="items">
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/gift"><?=$pageText['gift']['title']?></a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/allgift">Все подарки</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/woman">Женщинам</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/man">Мужчинам</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/children">Детям</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/parent">Родителям</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/grandma">Бабушкам и дедушкам</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/flowers">Цветы</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/box">Наборы и упаковка</a>
                        <a class="menu-item item-layer-2" href="https://www.islandgift.ru/amp/sweet">Сладости</a>
                    </div>
                </div>
            </label>
            <a class="menu-item item-layer-1" href="https://www.islandgift.ru/amp/celebration"><?=$pageText['celebration']['title']?></a>
            <a class="menu-item item-layer-1" href="https://www.islandgift.ru/amp/picking"><?=$pageText['picking']['title']?></a>
            <a class="menu-item item-layer-1" href="https://www.islandgift.ru/amp/about"><?=$pageText['about']['title']?></a>
            <a class="menu-item item-layer-1" href="https://www.islandgift.ru/amp/articles"><?=$pageText['articles']['title']?></a>
            <a class="menu-item item-layer-1" href="https://www.islandgift.ru/searth"><?=$pageText['search']['title']?></a>
        </div>
    </form>
</amp-sidebar>
<header class="header fixed">
    <div class="container">
        <div class="nav-container">
            <div class="left-nav alt"><a href="https://www.islandgift.ru/amp/" class="tab header-title"><span></span></a>
                <div class="tabs">
                    <div class="tab"><a href="https://www.islandgift.ru/amp/">Главная</a></div>
                    <div class="tab"><a href="https://www.islandgift.ru/amp/gift"><?=$pageText['gift']['title']?></a>
                        <div class="list-container">
                            <div class="list-shadow"></div>
                            <ul>
                                <li><a href="https://www.islandgift.ru/amp/allgift">Все подарки</a></li>
                                <li><a href="https://www.islandgift.ru/amp/woman">Женщинам</a></li>
                                <li><a href="https://www.islandgift.ru/amp/man">Мужчинам</a></li>
                                <li><a href="https://www.islandgift.ru/amp/children">Детям</a></li>
                                <li><a href="https://www.islandgift.ru/amp/parent">Родителям</a></li>
                                <li><a href="https://www.islandgift.ru/amp/grandma">Бабушкам и дедушкам</a></li>
                                <li><a href="https://www.islandgift.ru/amp/flowers">Цветы</a></li>
                                <li><a href="https://www.islandgift.ru/amp/box">Наборы и упаковка</a></li>
                                <li><a href="https://www.islandgift.ru/amp/sweet">Сладости</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="tab"><a href="https://www.islandgift.ru/amp/celebration"><?=$pageText['celebration']['title']?></a></div>
                    <div class="tab"><a href="https://www.islandgift.ru/amp/picking"><?=$pageText['picking']['title']?></a></div>
                    <div class="tab"><a href="https://www.islandgift.ru/amp/about"><?=$pageText['about']['title']?></a></div>
                    <div class="tab"><a href="https://www.islandgift.ru/amp/articles"><?=$pageText['articles']['title']?></a></div>
                    <div class="tab"><a href="https://www.islandgift.ru/searth"><?=$pageText['search']['title']?></a></div>
                </div>
            </div>
            <div class="right alt"><button class="tab hamburger" id="menu-button" on="tap:sidebar.toggle"></button></div>
        </div>
    </div>
</header><div class="wrap"><div class="content">
