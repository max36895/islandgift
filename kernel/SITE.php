<?php
require_once 'Authorization.php';
require_once 'Product.php';

class SITE
{
    private $mail;
    private $address;
    private $phone;
    private $skype;

    private $pageParam;

    private $login = [];
    public $avt;

    public function __construct()
    {
        $this->pageParam = include "param/PageParam.php";
        $contact = include "param/contact.php";

        $this->mail = $contact['']['mail'] ?? 'info@islandgift.ru';
        $this->address = $contact['']['address'] ?? 'Ярославль';
        $this->phone = $contact['']['phone'] ?? '+7(909) 281-35-20';
        $this->skype = $contact['']['skype'] ?? 'max36895';

        $this->avt = new Authorization();
        $result = $this->avt->userInfo();
        $this->login[] = $result[0];

        if ($result[0]) {

            if ($result[0] != 1)
                $this->login[] = '/kernel/siteadminka';
            else
                $this->login[] = '/you';

        } else {
            $this->login[] = '/registration';
        }

        $this->login[] = $result[1];
    }

    public function userLogin(): string
    {
        $title = $this->login[0] ? 'Личный кабинет' : 'Авторизация пользователя';
        $text = '<a href="' . $this->login[1] . '" style="color:#337ab7;margin:11px;"   title="' . $title . '">' . $this->login[2];

        if ($this->login[0]) {
            $text .= '</a><a id="exit" style="margin-left: 11px; color: black;cursor: pointer;">Выход';
        }

        $text .= '</a>';
        return $text;
    }

    public function setParam($fMail, $fAddress, $fTelephone, $fSkype): void
    {
        $this->mail = $fMail;
        $this->address = $fAddress;
        $this->phone = $fTelephone;
        $this->skype = $fSkype;
    }

    public function head($param, $title = '', $meta_d = '', $meta_k = ''): void
    {
        if (isset($this->pageParam[$param])) {
            $title = $this->pageParam[$param]['title'];
            $meta_d = $this->pageParam[$param]['description'];
            $meta_k = $this->pageParam[$param]['keyword'];
        }

        include 'site/head.php';
        $this->header($title);
    }

    public function footer(): void
    {
        include 'site/footer.php';
    }

    public function header($title): void
    {
        include 'site/header.php';
    }

    public function startUser(): int
    {
        if (isset($_COOKIE['startSession'])) {
            return 1;
        }

        $sessionLive = time() + (3601 * 24);
        setcookie('startSession', 'Приветик', $sessionLive, '/');
        return 0;
    }

    /*
     * 0 - id
     * 1 - наименование
     * 2 - краткое описание
     * 3 - поолное описание
     * 4 - цена
     * 5 - картинка
     */
    public function productInfo(): array
    {
        if (isset($_GET['productid'])) {

            $get = $_GET['productid'];
            $product = new Product();

            if (is_numeric($get)) {
                $dataProducts = $product->GetResultGift((int)$get);

                if ($dataProducts && mysqli_num_rows($dataProducts) > 0) {
                    $dataProduct = mysqli_fetch_array($dataProducts, MYSQLI_NUM);
                    mysqli_free_result($dataProducts);
                    return $dataProduct;
                }
            }
        }

        return [0];
    }

    public function getUserId():int
    {
        return $this->avt->userDb->id;
    }

    public function yandexMoneyWidget($url)
    {
        return file_get_contents($url);
    }

    public function breadcrumbList($list1, $list2, $list3): void
    {
        ?><nav style="text-align: center;" itemscope itemtype="http://schema.org/BreadcrumbList">
<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a <?= $list1[1] ?> itemscope itemtype="http://schema.org/Thing" itemprop="item"><span itemprop="name"><?= $list1[0] ?></span></a><meta itemprop="position" content="1"/></span> /
<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><a <?= $list2[1] ?> itemscope itemtype="http://schema.org/Thing" itemprop="item"><span itemprop="name"><?= $list2[0] ?></span></a><meta itemprop="position" content="2"/></span> /
<span itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem"><span itemprop="name"><?= $list3[0] ?></span><meta itemprop="position" content="3"/></span>
        </nav><?php
    }

    public function showPromo(): string
    {
        require_once 'Promotions.php';
        $promo = new Promotions();
        return $promo->showPromo();
    }

    public function findProductText($id = 0): void
    {
        ?>
<div id="ul-id-9-0" class="row ul-row" style="text-align: center;"><div id="ul-id-feedBack-footerform" class="ul-widget ul-widget-feedBack clearfix default" data-controls="e" data-widget="feedBack" style="width: 100%; padding: 15px;"><div class="feedBack"><div class="ul-widget-feedBack-form-group has-feedback has-feedback"><div class="ul-w-feedBack-control-label ul-w-feedBack-editable normal" data-name="name.title">Поиск товара</div><input class="ul-widget-feedBack-form-control normal" type="text" id="findProduct<?=$id?>" name="name" placeholder="Поиск товара"><p>Сортировка:<br class="br">
<select class="selectIsland" type='text' id="NewOnOld<?=$id?>"><option selected value="0">По новизне</option><option value="1">Сначала новые</option><option value="2">Сначала старые</option><option value="3">Не имеет значения</option></select>
<select class="selectIsland" type='text' id="CheaperOnExpensive<?=$id?>"><option selected value="0">По цене</option><option value="1">Сначала дорогие</option><option value="2">Сначала дешевые</option><option value="3">Не имеет значения</option></select>
</div></div></div></div>
        <?php
    }

    public function showProduct($products): void
    {
        if($products){
            $pageindex = 1;
            $itemCount = 0;
            $trigger = false;

            while($product = mysqli_fetch_array($products,MYSQLI_NUM)){

                if($itemCount == 0){
                    $trigger = true;
                    $style = '';

                    if($pageindex != 1){
                        $style = 'style="display:none"';
                    }

                    echo '<div class="row ul-row" id="pageNumber_'.$pageindex.'" '.$style.'>';
                }
                $itemCount++;
                ?><div class="col ul-col col-xs-12 col-sm-12 col-md-4"><a href="/product/<?= $product[0]?>" id="ul-id-8-<?=$product[0]?>" class="ul-widget ul-w-productCard js-w-productCard" data-controls="mer" data-widget="productCard" data-design="design-0" data-alignment="center" itemscope itemtype="http://schema.org/Product">
<div class="ul-w-productCard__picture"><img class="ul-w-productCard__picture__image js-w-productCard__picture__image" src="<?= str_replace('../','/',$product[5])?>" alt="<?= $product[1]?>" title="<?= $product[1]?> "></div>
<div class="ul-w-productCard__title"><div class="ul-w-productCard__title__content h4" itemprop="name"><?= $product[1]?>&nbsp;</div></div><div class="ul-w-productCard__description note" itemprop="description"><?= $product[2]?></div><div class="ul-w-productCard__spacer" data-position="description"></div>
<div class="ul-w-productCard__price price-small" itemprop="offers" itemscope itemtype="http://schema.org/Offer"><div data-type="value" data-raw="<?= $product[4]?>"><?= $product[4]?></div><div data-type="currency">руб.</div><meta itemprop="price" content="<?= $product[4]?>"><meta itemprop="priceCurrency" content="RUR"></div>
<div class="ul-w-productCard__action"><span role="button" class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart" data-price-value="<?= $product[4]?>" data-product-id="<?= $product[0]?>" data-product-title="<?= $product[1]?>" data-product-quantity="<?= $product[5]?>" data-description-visible="true" data-button-style="ul-w-button1 middle" id="add_<?= $product[0]?>" title="Купить <?=$product[1]?>"><div class="ul-w-productCard__action__button__caption">Купить</div></span></div></a></div>
                <?php
                if($itemCount == 30){
                    $trigger = false;
                    $itemCount = 0;
                    $pageindex++;
                    echo '</div>';
                }
            }
            mysqli_free_result($products);

            if($trigger){
                echo '</div>';
            }

            if($pageindex > 1) {
                echo '<div class="text-center">';

                for ($i = 1; $i <= $pageindex; $i++) {
                    $isActive = '';

                    if ($i == 1) {
                        $isActive = 'is-active';
                    }

                    echo '<span role="button" style="margin:25px 5px 0 5px; " class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart ' . $isActive . '" data-count="' . $pageindex . '" data-button-style="ul-w-button1 middle" id="page_' . $i . '"><div class="ul-w-productCard__action__button__caption">' . $i . '</div></span>';
                }

                echo '</div>';
            }
        }
    }
}