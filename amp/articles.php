<?php
include 'amp.php';
$amp = new amp();

require_once '../kernel/Articles.php';
$articleDb = new Articles();

$articles = $articleDb->selectArticle();
$articlesDesktop = $articleDb->selectArticle();

$pageText = include '../kernel/param/textForPage.php';
$amp->head('articles');
?>
<main class="text-center">
    <div class="container">
        <h1><?= $pageText['articles']['title'] ?></h1>
        <p><?= $pageText['articles']['description'] ?></p>
    </div>
    <section class="success-stories">
        <div class="container">
            <div class="row">
                <div class="twelve columns">
                    <?php
                    $urlArticles = $amp->cardArticleDesktop($articlesDesktop);
                    mysqli_free_result($articlesDesktop);

                    $amp->cardArticleMobile($articles);
                    mysqli_free_result($articles);
                    ?>
                </div>
            </div>
        </div>
    </section>
</main>
<script type="application/ld+json">
{
  "@context":"http://schema.org",
  "@type":"ItemList",
  "itemListElement":[
    <?=$urlArticles?>
  ]
}
</script>
<?php
$amp->footer();
?>
