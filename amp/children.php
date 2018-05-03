<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$productDb = new Product();

$products = $productDb->GetResultCatalogGift(3);
$productsDesktop = $productDb->GetResultCatalogGift(3);

$meta_d = 'каждый с удовольствием вспоминает детство.Правильно подобранный подарок для ребёнка является крайне важным,так как игрушка станет спутником его детства.Именно на нашем сайте вы можете выбрать подарок для детей,начиная с самого рождения.';
$meta_k = 'самым маленьким подарок детям игрушка с любовью мальчику девочке младенцу ребенку любовь забота игрушка радость день рождения 8 марта 23 февраля';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('children', 'Подарки самым маленьким', $meta_d, $meta_k);
?>
<main>
    <section>
        <div class="container">
            <h1><?=$pageText['children']['title']?></h1>
            <p><?=$pageText['children']['description']?></p>
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
            ['Подарки самым маленьким', '']
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
