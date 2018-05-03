<?php
require 'amp.php';
include '../kernel/SITE.php';
$amp = new amp();
$site = new SITE();

$product = $site->productInfo();
if ($product[0] == 0) {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    $product[1] = 'Продукт не найден';
}

$pageParam = include '../kernel/param/PageParam.php';

if (isset($pageParam['product'])) {
    $find = ['product_name', 'product_description', 'product_price'];
    $replase = [$product[1], $product[2], $product[4]];
    $meta_d = str_replace($find, $replase, $pageParam['product']['description']);
    $meta_k = str_replace($find, $replase, $pageParam['product']['keyword']);
    $title = str_replace($find, $replase, $pageParam['product']['title']);
} else {
    $meta_d = $product[2] . ' Возьмите даный продукт у нас по заманчивой цене.' . $product[4];
    $meta_k = 'купить в Ярославле подарки 8 марта 23 февраля день рождения новый год необычно ' . $product[1];
    $title = $product[1];
}

$amp->head('none', $title, $meta_d, $meta_k);
?>
<main>
    <section class="text-center">
        <?php
        $text = '';
        $url = '';
        $recommendation = '';
        $category = 1;
        switch ($product[7]) {
            case 1:
                $text = 'Подарки для женщин';
                $url = '/woman';
                $recommendation .= 'Рекомендуем посмотреть другие';
                $category = random_int(1, 3);

                if ($category == 1) {
                    $category = 1;
                    $recommendation .= ' товары для дам';
                } else if ($category == 2) {
                    $category = 7;
                    $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                } else {
                    $category = 6;
                    $recommendation = 'Любая девушка любит получать цветы!😉';
                }
                break;
            case 2:
                $text = 'Подарки для мужчин';
                $url = '/man';
                $recommendation .= 'Рекомендуем посмотреть другие';
                $category = random_int(1, 2);

                if ($category == 1) {
                    $category = 2;
                    $recommendation .= ' товары для мужчин';
                } else {
                    $category = 7;
                    $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                }
                break;
            case 3:
                $text = 'Подарки для детей';
                $url = '/children';
                $recommendation .= 'Рекомендуем посмотреть другие ';
                $category = random_int(1, 2);

                if ($category == 1) {
                    $category = 3;
                    $recommendation .= ' товары для детишек';
                } else {
                    $category = 7;
                    $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                }
                break;
            case 4:
                $text = 'Подарки для родителей';
                $url = '/parent';
                $recommendation .= 'Рекомендуем посмотреть другие';
                $category = random_int(1, 2);

                if ($category == 1) {
                    $category = 4;
                    $recommendation .= ' товары для родителей';
                } else {
                    $category = 7;
                    $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                }
                break;
            case 5:
                $text = 'Подарки для бабушек и дедушек';
                $url = '/grandma';
                $recommendation .= 'Рекомендуем посмотреть другие';
                $category = random_int(1, 2);

                if ($category == 1) {
                    $category = 5;
                    $recommendation .= ' товары для бабушек и дедушек';
                } else {
                    $category = 7;
                    $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                }
                break;
            case 6:
                $text = 'Цветы';
                $url = '/flowers';
                $recommendation .= 'К цветам определенно нужны сладости😁';
                $category = 7;
                break;
            case 7:
                $text = 'Сладости';
                $url = '/sweet';
                $recommendation .= 'Сладости стоит упаковать в коробочку🎁';
                $category = 8;
                break;
            case 8:
                $text = 'Наборы и упаковка';
                $url = '/box';
                $category = random_int(1, 2);
                if ($category == 1) {
                    $category = 8;
                    $recommendation = 'Может посмотреть на другие коробочки и наборы?';
                } else {
                    $category = 7;
                    $recommendation = 'Все мы любим сладости!😁 <br>Не так ли?';
                }
                break;
            case 9:
                $text = 'Все подарки';
                $url = '/allgift';
                $recommendation .= 'Эти товары наверняка вас заинтрересуют✌';
                $category = 9;
                break;
        }
        ?>
        <p><a href="https://islandgift.ru/amp/gift" title="Подарок для тебя">Подарок для тебя💝</a> / <a href="https://islandgift.ru/amp<?=$url?>" title="<?=$text?>"><?=$text?></a> / <?=$product[1]?></p>
        <h1><span class="g-color-text-3"><?=$product[1]?></span></h1>
        <div class="container">
            <?php
            $img = '"https://www.islandgift.ru/logo.png"';
            if ($product[0] == 0) {
                ?>
                <h2>К сожалению данного продукта нет.<br>Посмотрите другие товары.</h2>
                <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/amp/gift">Смотреть другие товары</a></div>
                <?php
            } else {

                $img = '"' . str_replace('../', 'https://www.islandgift.ru/', $product[5]) . '"';
                if ($product[6]) {
                    require_once '../kernel/Gift.php';
                    $collectiondb = new Gift();
                    $collectiondb->imgCollect = $product[6];
                    $collections = $collectiondb->selectCollection();
                    if ($collections) {
                        $img = '';
                        while ($collection = mysqli_fetch_array($collections, MYSQLI_NUM)) {
                            if ($img != '') {
                                $img .= ',';
                            }
                            $img .= '"' . str_replace('../', 'https://www.islandgift.ru/', $collection[2]) . '"';

                        }
                        mysqli_free_result($collections);
                    }
                }
                ?>
            <amp-img src="https://www.islandgift.ru/<?php echo str_replace('..','',$product[5]);?>" alt="MaxImko" class="rbt-inline-89"
                     width="350" height="240" layout="responsive"></amp-img>
            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru<?php echo str_replace('/amp','',$_SERVER['REQUEST_URI']); ?>">Купить за <?=$product[4]?> руб.</a></div>
            <p><?=$product[3]?></p>
            <?php }?>
        </div>
    </section>
    <section class="success-stories">
        <h2><?=$recommendation?></h2>
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    $productDb = new Product();
                    $productsDesktop = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');
                    $products = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');

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
<script type="application/ld+json">{"@context": "http://schema.org/","@type": "Product","name": "<?=$title?>","image": [<?=$img?>],"description": "<?=str_replace('<br>', '',$product[3])?>","aggregateRating": {"@type": "AggregateRating","ratingValue": "4.4","reviewCount": "89"},"offers": {"@type": "Offer","priceCurrency": "RUS","price": "<?=$product[4]?>","priceValidUntil": "<?=(date('Y')+5).date('-m-d')?>","itemCondition": "http://schema.org/UsedCondition","availability": "http://schema.org/InStock","seller": {"@type": "Organization","name": "Maximko"}}}</script>
<?php
$amp->footer();
?>
