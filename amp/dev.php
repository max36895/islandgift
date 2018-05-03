<?php
include 'amp.php';
$amp = new amp();

$meta_d = 'Если вам нужна помощь с созданием rss-канала для Яндекса или amp-страницы для Google, то обращайтесь к нам';
$meta_k = 'rss amp турбо страницы яндекс гугл как создать генерация';
$amp->head('dev', 'Турбо страницы', $meta_d, $meta_k);

$param = include '../kernel/param/PageParam.php';
?>
<main class="text-center">
    <div class="container">
        <h1><?=$param['dev']['title']?></h1>
        <amp-img src="https://www.islandgift.ru/img/turbo/1.jpg" alt="MaxImko" class="rbt-inline-89"
                 width="358" height="239" layout="responsive"></amp-img>

        <div class="ul-wysivig-editor clearfix" placeholder="placeholder"><p><span class="g-color-text-2">На данный момент широкую популярность имеют так называемые быстрые страницы, которые позволяют пользователям практически моментально загружать необходимый сайт. И за счет этого увеличивается вероятность того, что пользователь в конечном итоге не покинет сайт из-за того, что страница долго загружается.<br>Каждая поисковая система активно продвигает свои алгоритмы и методы для быстрой загрузки сайтов, у Яндекса это турбо страницы, а у Google это amp.</span></p>
            <p><span class="g-color-text-2">Турбо — это технология Яндекса, которая ускоряет загрузку контента. Она позволяет создавать Турбо-страницы — лёгкие версии веб-страниц, которые быстро открываются на мобильных устройствах, а также ускоряет загрузку сайтов в Яндекс.Браузере.</span><br></p>
            <p><span class="g-color-text-2">AMP (Accelerated Mobile Pages) – это технология ускоренных мобильных страниц, которая разрабатывается независимыми разработчиками и активно продвигается компанией Google.</span></p>
            <p><span class="g-color-text-2">Каждый поисковик при мобильной выдаче отдает предпочтение быстрым страницам. В связи с этим не стоит пренебрегать разработкой соответствующих страниц. </span><br></p>
            <p><span class="g-color-text-2">В связи с этим мы предлагаем вам воспользоваться нашими услугами. Мы поможем вам разработать соответствующие страницы, а также поделимся своим опытом и своими наработками в данном вопросе, по приемлемой цене. К тому же у нас реализован алгоритм, который позволяет автоматически генерировать турбо страницы Яндекса.</span><br></p>
            <p><span class="g-color-text-2">Если вас заинтересовало данное предложение, то свяжитесь с нами и мы постараемся помочь вам как можно скорее.<br>Консультация бесплатная.</span><br></p>
            <p><span class="g-color-text-2">Подробнее о быстрых страницах</span><br></p>
            <p></p>
        </div>

        <div class="row">
            <div class="twelve columns">
            <div class="ul-widget ul-w-button text-center ul-scroll-animate">
                <a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/amp/yandexrss" title="Yandex RSS">Yandex RSS</a>
            </div>
            <div class="ul-widget ul-w-button text-center ul-scroll-animate">
                <a class="normal ul-w-button1 middle" target="_self" href="https://www.islandgift.ru/amp/googleamp" title="Google AMP">Google AMP</a>
            </div>
            </div>
        </div>
    </div>
    <section>
        <div class="container">
            <h2>Преимущества</h2>
            <p>Итоговая цена разработки страницы зависит от сложности портируемого сайта.</p>
            <amp-img src="https://www.islandgift.ru/amp/img/symbols/1.PNG" alt="MaxImko" class="rbt-inline-89"
                     width="219.8" height="151.2" layout="fixed"></amp-img>
            <h3>Помощь и консультация</h3>
            <p>К нам вы можете обратиться по любому вопросу. Мы сделаем все возможное чтобы решить все ваши вопросы.</p>
            <amp-img src="https://www.islandgift.ru/amp/img/symbols/2.PNG" alt="MaxImko" class="rbt-inline-89"
                     width="219.8" height="151.2" layout="fixed"></amp-img>
            <h3>Современные технологии</h3>
            <p>Мы стараемся быть в тренде. И поэтому используем последние наработки и технологии</p>
            <amp-img src="https://www.islandgift.ru/amp/img/symbols/4.PNG" alt="MaxImko" class="rbt-inline-89"
                     width="219.8" height="151.2" layout="fixed"></amp-img>
            <h3>Высокое качество и поддержка</h3>
            <p>Мы всегда следим за качеством конечного продукта. А также поддерживаем конечный продукт в актуальном состоянии, удаляя или добавляя новый функционал.</p>
        </div>
    </section>
</main>
<script type="application/ld+json">
{
  "@context": "http://schema.org",
  "@type": "NewsArticle",
  "mainEntityOfPage": {
    "@type": "WebPage",
    "@id": "https://islandgift.ru/dev"
  },
  "headline": "<?=$param['dev']['title']?>",
  "image": [
    "https://www.islandgift.ru/img/turbo/1.jpg"
   ],
  "datePublished": "2018-04-04T08:00:00+03:00",
  "dateModified": "<?=date('Y-m-d');?>T00:05:00+03:00",
  "author": {
    "@type": "Person",
    "name": "Maximko"
  },
   "publisher": {
    "@type": "Organization",
    "name": "Maximko",
    "logo": {
      "@type": "ImageObject",
      "url": "https://www.islandgift.ru/logo.png"
    }
  },
  "description": "<?= $param['dev']['description']?>"
}
</script>
<?php
$amp->footer();
?>
