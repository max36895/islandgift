<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$productDb = new Product();

$products = $productDb->GetResultCatalogGift(5);
$productsDesktop = $productDb->GetResultCatalogGift(5);

$meta_d = 'Выбрать подарок самым старшим членам семьи-бабушке и делушке-дело крайне непростое.С ними у нас связаны наши самые счастливые воспоминания.Так давайте эти воспоминания воплотим в жизнь и преподнесенный вами подарок они оценят вдвойне.';
$meta_k = 'бабушка дедушка любимым полезный счастье новый год день рождения юбилей годовщина 8 марта 23 февраля оригинально праздник';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('grandma', 'Любимым бабушкам и дедушкам', $meta_d, $meta_k);
?>
<main>
    <section>
        <div class="container">
            <h1><?=$pageText['grandma']['title']?></h1>
            <p><?=$pageText['grandma']['description']?></p>
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
            ['Любимым бабушкам и дедушкам', '']
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
