<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$productDb = new Product();

$products = $productDb->GetResultCatalogGift(6);
$productsDesktop = $productDb->GetResultCatalogGift(6);

$meta_d = 'На нашем сайте вы можете купить цветы на любой вкус и для любого мероприятия.Мы сделаем так, чтобы все соответствовало вашим предпочтениям.';
$meta_k = 'цветы на любой вкус праздник подарок красивые необходимые розы архидеи набор букет романтика любовь юбилей 14 февраля годовщина букет';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('flowers', 'Цветы и букеты', $meta_d, $meta_k);
?>
<main>
    <section>
        <div class="container">
            <h1><?=$pageText['flowers']['title']?></h1>
            <p><?=$pageText['flowers']['description']?></p>
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
            ['Главная', 'href="https://www.islandgift.ru/amp/"  class="blue" title="Интернет магазин Maximko"'],
            ['Подарок для тебя💝', 'href="https://www.islandgift.ru/amp/gift" ' . $color . ' title="Подарок для тебя"'],
            ['Цветы и букеты', '']
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
