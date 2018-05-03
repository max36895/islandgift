<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$productDb = new Product();

$products = $productDb->GetResultCatalogGift(1);
$productsDesktop = $productDb->GetResultCatalogGift(1);

$meta_d = 'Каждая женщина радуется, получив в подарок необычные и оригинальные вещицы.Но ничуть не меньше она любит получать презенты, которые принесут практическую пользу.Если именно сейчас вы ломаете голову над этим, то обратитесь к нам';
$meta_k = 'любимой девушка подруга коллега женщина подарок радость оригинальная вещица удовольствие милый красивый день рождения юбилей годовщина 8 марта новый год';
$pageText = include '../kernel/param/textForPage.php';
$amp->head('woman', 'Прекрасным женщинам и девушкам', $meta_d, $meta_k);
?>
<main>
    <section>
        <div class="container">
            <h1><?=$pageText['woman']['title']?></h1>
            <p><?=$pageText['woman']['description']?></p>
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
            ['Любимой женщине (девушке)', '']
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
