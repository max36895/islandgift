<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$productDb = new Product();

$products = $productDb->GetResultCatalogGift(4);
$productsDesktop = $productDb->GetResultCatalogGift(4);

$meta_d = 'Родители играют главную роль в нашей жизни.Приподнесенный вами подарок,заставит сердца ваших родных трепетать от счастья и гордости.Позвольте нам помочь сотворить маленькое чудо для ваших близких.';
$meta_k = 'родителям любимым годовщина подарок юбилей близким мама папа красиво день рождения новый год 8 марта необычно 23 февраля';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('parent', 'Маленькое чудо для родителей', $meta_d, $meta_k);
?>
<main>
    <section>
        <div class="container">
            <h1><?=$pageText['parent']['title']?></h1>
            <p><?=$pageText['parent']['description']?></p>
        </div>
    </section>
    <section class="breadCrumbList">
        <?php
        $color = 'class="';
        $number = random_int(1, 9);
        switch ($number) {
            case 1:
                $color .= 'hotpink"';
                break;
            case 2:
                $color .= 'mediumblue"';
                break;
            case 3:
                $color .= 'deeppink"';
                break;
            case 4:
                $color .= 'mediumvioletred"';
                break;
            case 5:
                $color .= 'darkred"';
                break;
            case 6:
                $color .= 'blueviolet"';
                break;
            case 7:
                $color .= 'magenta"';
                break;
            case 8:
                $color .= 'navy"';
                break;
            case 9:
                $color .= 'blue"';
                break;
        }
        $amp->breadcrumbList(
            ['Главная', 'href="https://www.islandgift.ru/amp/" class="blue" title="Интернет магазин Maximko"'],
            ['Подарок для тебя💝', 'href="https://www.islandgift.ru/amp/gift" ' . $color . ' title="Подарок для тебя"'],
            ['Маленькое чудо для родителей', '']
        );
        ?>
    </section>
    <section class="success-stories">
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    $amp->cardProductDesktop($productsDesktop);
                    mysqli_free_result($productsDesktop);

                    $amp->cardProductMobile($products);
                    mysqli_free_result($products);
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<?php
$amp->footer();
?>
