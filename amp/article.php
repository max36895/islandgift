<?php
include 'amp.php';
$amp = new amp();

require_once '../kernel/Articles.php';
$article = new Articles();

$res = $article->articlesInfo();
$resDesktop = $article->articlesInfo();
if ($res[0] == 0) {
    echo '<script>document.location.href="https://www.islandgift.ru/amp/' . $res[1] . '"</script>';
}

$pageText = include '../kernel/param/PageParam.php';

if (isset($pageParam['article'])) {
    $find = ['article_name', 'article_description'];
    $replase = [$article->title, $article->description];
    $meta_d = str_replace($find, $replase, $pageParam['article']['description']);
    $meta_k = str_replace($find, $replase, $pageParam['article']['keyword']);
    $title = str_replace($find, $replase, $pageParam['article']['title']);
} else {
    $meta_d = $article->description;
    $meta_k = $article->title . ' читать интересно статья идея' . $meta_d;
    $title = $article->title;
}

$amp->head('none', $title, $meta_d, $meta_k);
?>
<main class="text-center">
    <div class="container">
        <h1><?= $title ?></h1>
    </div>
    <section class="success-stories">
        <?php
        $color = 'class="';
        $number = random_int(1,9);
        switch ($number){
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
            ['Главная','href="https://www.islandgift.ru/amp/" class="blue" title="Интернет магазин Maximko"'],
            ['Список статей📚','href="https://www.islandgift.ru/amp/articles" '. $color.' title="Список статей"'],
            [$article->title,'']
        );
        ?>
    </section>
    <section class="container">
        <?= $article->showArticleAmp()?>
        <div class="text-center">
            <p>Статья написана: <span><?=$article->author?></span></p>
        </div>
    </section>
</main>
<script type="application/ld+json">{
        "@context": "http://schema.org",
        "@type": "NewsArticle",
        "mainEntityOfPage": {
        "@type": "WebPage",
        "@id": "https://islandgift.ru<?=$_SERVER['REQUEST_URI']?>"
        },<?php $param = include'../kernel/param/PageParam.php';?>
        "headline": "<?=$article->title?>",
        "image": [
        "https://www.islandgift.ru<?php echo str_replace('../','/',$article->img);?>"
        ],
        "datePublished": "2018-04-04T08:00:00+03:00",
        "dateModified": "<?php echo date('Y-m-d').'T'.date('H:m:s').'+03:00'?>",
        "author": {
        "@type": "Person",
        "name": "Maximko"
        },
        "publisher": {
        "@type": "Organization",
        "name": "Максим М",
        "logo": {
        "@type": "ImageObject",
        "url": "https://www.islandgift.ru/logo.png"
        }
        },
        "description": "<?= $article->description?>"
        }</script>
<?php
$amp->footer();
?>
