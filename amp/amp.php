<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 12.03.2018
 * Time: 11:23
 */

class amp
{
    private $pageParam;

    public function __construct()
    {
        $this->pageParam = include '../kernel/param/PageParam.php';
    }

    public function head($param, $title = '', $meta_d = '', $meta_k = ''): void
    {
        if (isset($this->pageParam[$param])) {
            $title = $this->pageParam[$param]['title'];
            $meta_d = $this->pageParam[$param]['description'];
            $meta_k = $this->pageParam[$param]['keyword'];
        }
        include 'module/head.php';
        $this->header();
    }

    public function header(): void
    {
        include 'module/header.php';
    }

    public function footer(): void
    {
        include 'module/footer.php';
    }

    public function cardArticleDesktop($articles): string
    {
        $urlArticles = '';
        if ($articles) {
            $index = 0;
            $tagClose = false;
            $indexUrl = 1;
            while ($article = mysqli_fetch_array($articles, MYSQLI_NUM)) {
                if ($index == 4 || $index == 0) {
                    $index = 1;
                    echo '<amp-carousel class="success-carousel desktop-up"
                                  height="750" controls
                                  layout="flex-item"
                                  type="slides"><div class="card-container">';
                    $tagClose = false;
                }

                if ($index == 1) {
                    $style = 'wapo';
                } else if ($index == 2) {
                    $style = 'wired';
                } else
                    $style = 'teads';

                $index++;
                ?>
                <div class="card centered <?= $style ?>">
                    <div class="card-inner">
                        <amp-img class="card-icon"
                                 noloading
                                 height="280"
                                 width="450"
                                 layout=responsive
                                 src="https://www.islandgift.ru<?php echo str_replace('..', '', $article[7]); ?>">
                        </amp-img>
                        <a class="card-content" href="https://www.islandgift.ru/amp/article/<?= $article[3] ?>">
                            <h3><?= $article[1] ?></h3>
                            <p><?= $article[5] ?></p>
                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                        class="normal ul-w-button1 middle" target="_self"
                                        href="https://www.islandgift.ru/amp/article/<?= $article[3] ?>"
                                        title="<?= $article[1] ?>">Читать</a></div>
                        </a>
                    </div>
                </div>
                <?php
                if ($index == 4) {
                    echo '</div></amp-carousel>';
                    $tagClose = true;
                }

                if($urlArticles != '')
                    $urlArticles .= ',';
                $urlArticles .= '{"@type":"ListItem","position":'.$indexUrl.',"url":"https://www.islandgift.ru/amp/article/'.$article[3].'"}';
                $indexUrl++;

            }
            if(!$tagClose || $indexUrl < 3)
                echo '</div></amp-carousel>';
        }
        return $urlArticles;
    }

    public function cardArticleMobile($articles): void
    {
        if ($articles) {
            $index = 0;
            $tagClose = false;

            while ($article = mysqli_fetch_array($articles, MYSQLI_NUM)) {
                if ($index == 4 || $index == 0) {
                    $index = 1;
                    echo '<amp-carousel class="success-carousel mobile-down"
                                  height="750" controls
                                  layout="flex-item"
                                  type="slides">';
                    $tagClose = false;
                }

                if ($index == 1) {
                    $style = 'wapo';
                } else if ($index == 2) {
                    $style = 'wired';
                } else {
                    $style = 'teads';
                }
                $index++;
                ?>
                <div class="card-container">
                    <div class="card centered <?= $style ?>">
                        <div class="card-inner">
                            <amp-img class="card-icon"
                                     noloading
                                     height="280"
                                     width="450"
                                     layout=responsive
                                     src="https://www.islandgift.ru<?php echo str_replace('..', '', $article[7]); ?>">
                            </amp-img>
                            <a class="card-content" href="https://www.islandgift.ru/amp/article/<?= $article[3] ?>">
                                <h3><?= $article[1] ?></h3>
                                <p><?= $article[5] ?></p>
                                <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                            class="normal ul-w-button1 middle" target="_self"
                                            href="https://www.islandgift.ru/amp/article/<?= $article[3] ?>"
                                            title="<?= $article[1] ?>">Читать</a></div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                if ($index == 4) {
                    echo '</amp-carousel>';
                    $tagClose = true;
                }
            }
            if(!$tagClose)
                echo '</amp-carousel>';
        }
    }

    public function cardProductDesktop($products): void
    {
        if ($products) {
            $index = 0;
            $tagClose = false;
            while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
                if ($index == 4 || $index == 0) {
                    $index = 1;
                    echo '<amp-carousel class="success-carousel desktop-up"
                                  height="750" controls
                                  layout="flex-item"
                                  type="slides">
<div class="card-container">';
                    $tagClose = false;
                }

                if ($index == 1) {
                    $style = 'wapo';
                } else if ($index == 2) {
                    $style = 'wired';
                } else
                    $style = 'teads';

                $index++;
                ?>
                <div class="card centered <?= $style ?>">
                    <div class="card-inner">
                        <amp-img class="card-icon"
                                 noloading
                                 height="280"
                                 width="450"
                                 layout=responsive
                                 src="https://www.islandgift.ru<?php echo str_replace('..', '', $product[5]); ?>">
                        </amp-img>
                        <a class="card-content" href="https://www.islandgift.ru/amp/product/<?= $product[0] ?>">
                            <h3><?= $product[1] ?></h3>
                            <h3>Цена: <?= $product[4] ?> руб.</h3>
                            <p><?= $product[2] ?></p>
                            <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                        class="normal ul-w-button1 middle" target="_self"
                                        href="https://www.islandgift.ru/product/<?= $product[0] ?>"
                                        title="<?= $product[1] ?>">Купить</a></div>
                        </a>
                    </div>
                </div>
                <?php
                if ($index == 4) {
                    echo '</div></amp-carousel>';
                    $tagClose = true;
                }
            }
            if(!$tagClose)
                echo '</div></amp-carousel>';
        }
    }

    public function cardProductMobile($products): void
    {
        if ($products) {
            $index = 0;
            $tagClose = false;
            while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
                if ($index == 4 || $index == 0) {
                    $index = 1;
                    echo '<amp-carousel class="success-carousel mobile-down"
                                  height="550" controls
                                  layout="flex-item"
                                  type="slides">';
                    $tagClose = false;
                }

                if ($index == 1) {
                    $style = 'wapo';
                } else if ($index == 2) {
                    $style = 'wired';
                } else {
                    $style = 'teads';
                }
                $index++;
                ?>
                <div class="card-container">
                    <div class="card centered <?= $style ?>">
                        <div class="card-inner">
                            <amp-img class="card-icon"
                                     noloading
                                     height="280"
                                     width="450"
                                     layout=responsive
                                     src="https://www.islandgift.ru<?php echo str_replace('..', '', $product[5]); ?>">
                            </amp-img>
                            <a class="card-content" href="https://www.islandgift.ru/amp/product/<?= $product[0] ?>">
                                <h3><?= $product[1] ?></h3>
                                <h3>Цена: <?= $product[4] ?> руб.</h3>
                                <p><?= $product[2] ?></p>
                                <div class="ul-widget ul-w-button text-center ul-scroll-animate"><a
                                            class="normal ul-w-button1 middle" target="_self"
                                            href="https://www.islandgift.ru/product/<?= $product[0] ?>"
                                            title="<?= $product[1] ?>">Купить</a></div>
                            </a>
                        </div>
                    </div>
                </div>
                <?php
                if ($index == 4) {
                    echo '</amp-carousel>';
                    $tagClose = true;
                }
            }
            if(!$tagClose)
                echo '</amp-carousel>';
        }
    }

    public function breadcrumbList($list1, $list2, $list3): void
    {
        ?><nav class="text-center" itemscope itemtype="http://schema.org/BreadcrumbList">
        <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a <?= $list1[1] ?> itemscope itemtype="http://schema.org/Thing" itemprop="item"><span itemprop="name"><?= $list1[0] ?></span></a><meta itemprop="position" content="1"/></span> /
        <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a <?= $list2[1] ?> itemscope itemtype="http://schema.org/Thing" itemprop="item"><span itemprop="name"><?= $list2[0] ?></span></a><meta itemprop="position" content="2"/></span> /
        <span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?= $list3[0] ?></span><meta itemprop="position" content="3"/></span>
        </nav><?php
    }
}