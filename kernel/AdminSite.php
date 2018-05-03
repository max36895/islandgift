<?php
ini_set('display_errors', 'On');
error_reporting('E_ALL');

require_once 'SITE.php';
require_once 'Gift.php';
require_once 'Articles.php';

class Admin
{
    public $avt;
    private $gift;
    private $articles;
    private $mail;
    private $address;
    private $phone;
    private $skype;

    public function __construct()
    {
        $this->mail = 'info@islandgift.ru';
        $this->address = 'Ярославль';
        $this->phone = '+7(909)281-35-20';
        $this->skype = 'max36895';

        $this->avt = new Authorization();
        $this->gift = new Gift();
        $this->articles = new Articles();
    }

    public function head($title, $meta_d, $meta_k): void
    {
        include 'admin/head.php';
        $this->header();
    }

    public function footer(): void
    {
        include 'admin/footer.php';
    }

    public function header(): void
    {
        include 'admin/header.php';
    }

    public function addArticle(): string
    {
        $this->articles->title = $_POST['name'];
        $this->articles->description = $_POST['description'];
        $this->articles->url = $_POST['url'];
        $this->articles->incomplete = $_POST['incomplete'];
        $this->articles->text = $_POST['full'];
        $this->articles->author = $_POST['author'];

        $dir = $this->articles->createDir('../articlesImg/' . $this->articles->url . '/', false) . $this->articles->title;

        $uploadFile = $dir . basename($_FILES['img']['name']);
        $uploadFile = str_replace(' ', '_', $uploadFile);

        $this->articles->img = $uploadFile;
        $this->articles->imgCollectionId = 0;

        $this->articles->insertArticle();

        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            $fileError = fopen('../error/articles.log', 'a');

            $text = ' ';
            $text .= date('Y-m-d H:i:s');
            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
            $text .= $this->articles->title;
            $text .= "Ошибка загрузки файла.\n";

            fwrite($fileError, $text);
            fclose($fileError);
            return 'Не удалось добавить статью!';
        }else{
            if(strpos(mb_strtolower($uploadFile),'.jpg') !== false)
                system("convert ".$uploadFile." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$uploadFile."");
            else
                system("convert ".$uploadFile." -strip [-resize WxH] [-alpha Remove] ".$uploadFile."");
        }

        return 'Статья успешно добавлена';
    }

    public function updateArticle($dataPost): string
    {
        $this->articles->id = $dataPost['id'];
        $this->articles->selectArticleInit();

        $filesNew = $dataPost['file'];
        $index = 0;

        if ($filesNew != -1 || $filesNew != '-1') {

            $filesNew = explode(';', $filesNew);
            $this->articles->imgCollect = $this->articles->url;

            if ($this->articles->imgCollectionId) {
                $this->articles->deleteCollection('../articlesImg/' . $this->articles->url . '/', false);
            }

            foreach ($filesNew as $fileNew) {

                if (isset($fileNew) && $fileNew != ' ' && $fileNew != '') {
                    $filePrev = '../articlesImg/tmp/' . $fileNew;
                    $fileGift = '../articlesImg/' . $this->articles->url . '/' . $fileNew;
                    $fileGift = str_replace(' ', '_', $fileGift);

                    if ($index == 0) {
                        if (!copy($filePrev, $fileGift)) {
                            $fileError = fopen('../error/articles.log', 'a');

                            $text = ' ';
                            $text .= date('Y-m-d H:i:s');
                            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                            $text .= $this->articles->title . ' category: ' . $this->articles->description;
                            $text .= "Ошибка загрузки файла.\n";

                            fwrite($fileError, $text);
                            fclose($fileError);
                        } else {
                            if(strpos(mb_strtolower($fileGift),'.jpg') !== false)
                                system("convert ".$fileGift." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$fileGift."");
                            else
                                system("convert ".$fileGift." -strip [-resize WxH] [-alpha Remove] ".$fileGift."");

                            if (file_exists($this->articles->img))
                                unlink($this->articles->img);
                            $this->articles->img = $fileGift;
                        }
                    }

                    $fileNew = $this->articles->createDir('../articlesImg/' . $this->articles->url . '', false) . '/' . $fileNew;
                    $fileNew = str_replace(' ', '_', $fileNew);

                    $this->articles->images[$index] = $fileNew;

                    if (!copy($filePrev, $fileNew)) {
                        $fileError = fopen('../error/articles.log', 'a');

                        $text = ' ';
                        $text .= date('Y-m-d H:i:s');
                        $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                        $text .= $this->articles->title . ' category: ' . $this->articles->description;
                        $text .= "Ошибка загрузки файла.\n";

                        fwrite($fileError, $text);
                        fclose($fileError);
                    } else {

                        if(strpos(mb_strtolower($fileNew),'.jpg') !== false)
                            system("convert ".$fileNew." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$fileNew."");
                        else
                            system("convert ".$fileNew." -strip [-resize WxH] [-alpha Remove] ".$fileNew."");

                        if (file_exists($filePrev))
                            unlink($filePrev);
                    }
                    $index++;
                }
            }
            $this->articles->updateCollection();
        }

        $this->articles->title = $dataPost['articleTitle'];
        $this->articles->url = $dataPost['url'];
        $this->articles->incomplete = $dataPost['incomplete'];
        $this->articles->text = str_replace('&quot;', '"', $dataPost['text']);
        $this->articles->description = $dataPost['description'];
        $this->articles->author = $dataPost['author'];
        $this->articles->imgCollectionId = 0;

        if ($index > 1) {
            $this->articles->imgCollectionId = $this->articles->url;
        }

        $res = $this->articles->updateArticle();
        return '{"status":"' . $res[0] . '","msg":"' . $res[1] . '"}';
    }

    public function removeArticle($dataPost): string
    {
        $this->articles->id = $dataPost['id'];
        $this->articles->selectArticleInit();

        if (file_exists($this->articles->img))
            unlink($this->articles->img);

        $res = $this->articles->deleteArticle();

        return '{"status":"' . $res[0] . '","msg":"' . $res[1] . '"}';
    }

    public function addGift(): string
    {
        $id = $this->gift->findEnd();
        $this->gift->name = $_POST['name'];
        $this->gift->category = $_POST['category'];
        $this->gift->incomplete = $_POST['incomplete'];
        $this->gift->full = $_POST['full'];
        $this->gift->price = $_POST['price'];
        $this->gift->count = $_POST['count'];
        $this->gift->orderCount = 0;

        $dir = '../product/img/' . $id . '_';
        $uploadFile = $dir . basename($_FILES['img']['name']);
        $uploadFile = str_replace(' ', '_', $uploadFile);

        $this->gift->img = $uploadFile;
        $this->gift->imgCollection = 0;

        $this->gift->insertGift();

        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
            $fileError = fopen('../error/gift.log', 'a');

            $text = ' ';
            $text .= date('Y-m-d H:i:s');
            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
            $text .= $this->gift->name . ' category: ' . $this->gift->category;
            $text .= "Ошибка загрузки файла.\n";

            fwrite($fileError, $text);
            fclose($fileError);
            return 'Не удалось добавить продукт!';
        }else{
            if(strpos(mb_strtolower($uploadFile),'.jpg') !== false)
                system("convert ".$uploadFile." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$uploadFile."");
            else
                system("convert ".$uploadFile." -strip [-resize WxH] [-alpha Remove] ".$uploadFile."");
        }

        return 'Продукт успешно добавлен';
    }

    public function delGift($dataPost): string
    {
        $this->gift->id = $dataPost['id'];
        $this->gift->selectGift();

        if (file_exists($this->gift->img))
            unlink($this->gift->img);

        $res = $this->gift->deleteGift();

        return '{"status":"' . $res[0] . '","msg":"' . $res[1] . '"}';
    }

    public function updateGift($dataPost): string
    {
        $this->gift->id = $dataPost['id'];
        $this->gift->selectGift();

        $filesNew = $dataPost['file'];
        $index = 0;

        if ($filesNew != -1 || $filesNew != '-1') {
            $filesNew = explode(';', $filesNew);
            $this->gift->imgCollect = $this->gift->id;

            if ($this->gift->imgCollection != 0)
                $this->gift->deleteCollection();

            foreach ($filesNew as $fileNew) {

                if (isset($fileNew) && $fileNew != ' ' && $fileNew != '') {
                    $filePrev = '../product/tmp/' . $fileNew;
                    $fileGift = '../product/img/' . $this->gift->id . '_' . $fileNew;
                    $fileGift = str_replace(' ', '_', $fileGift);

                    if ($index == 0) {
                        if (!copy($filePrev, $fileGift)) {
                            $fileError = fopen('../error/gift.log', 'a');

                            $text = ' ';
                            $text .= date('Y-m-d H:i:s');
                            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                            $text .= $this->gift->name . '  ';
                            $text .= $filePrev . ' <-prev: gift-> ' . $fileGift;
                            $text .= " Ошибка загрузки файла.\n";

                            fwrite($fileError, $text);
                            fclose($fileError);
                        } else {

                            if(strpos(mb_strtolower($fileGift),'.jpg') !== false)
                                system("convert ".$fileGift." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$fileGift."");
                            else
                                system("convert ".$fileGift." -strip [-resize WxH] [-alpha Remove] ".$fileGift."");

                            if (file_exists($this->gift->img))
                                unlink($this->gift->img);

                            $this->gift->img = $fileGift;
                        }
                    }

                    $fileNew = $this->gift->createDir() . '/' . $this->gift->id . '_' . $fileNew;
                    $fileNew = str_replace(' ', '_', $fileNew);

                    $this->gift->images[$index] = $fileNew;

                    if (!copy($filePrev, $fileNew)) {
                        $fileError = fopen('../error/gift.log', 'a');

                        $text = ' ';
                        $text .= date('Y-m-d H:i:s');
                        $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                        $text .= $this->gift->name . '  ';
                        $text .= "Ошибка загрузки файла.\n";

                        fwrite($fileError, $text);
                        fclose($fileError);
                    } else {

                        if(strpos(mb_strtolower($fileNew),'.jpg') !== false)
                            system("convert ".$fileNew." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$fileNew."");
                        else
                            system("convert ".$fileNew." -strip [-resize WxH] [-alpha Remove] ".$fileNew."");

                        if (file_exists($filePrev))
                            unlink($filePrev);
                    }
                    $index++;
                }
            }

            $this->gift->updateCollection();
        }

        $this->gift->name = $dataPost['nameProduct'];
        $this->gift->category = $dataPost['category'];
        $this->gift->incomplete = $dataPost['incomplete'];
        $this->gift->full = $dataPost['full'];
        $this->gift->price = $dataPost['price'];
        $this->gift->count = $dataPost['count'];

        if ($index > 1) {
            $this->gift->imgCollection = $this->gift->id;
        }

        $res = $this->gift->updateGift();

        return '{"status":"' . $res[0] . '","msg":"' . $res[1] . '"}';
    }

    public function showSitemap(): string
    {
        $url = include 'param/url.php';
        $textxml = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n";
        $textxml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

        $countUrl = count($url);
        for ($i = 0; $i < $countUrl; $i++) {
            $textxml .= "    <url>\n";
            $textxml .= '        <loc>https://www.islandgift.ru' . $url[$i] . "</loc>\n";
            $textxml .= '        <lastmod>' . date('Y-m-d') . "</lastmod>\n";
            $textxml .= "        <changefreq>daily</changefreq>\n";
            $textxml .= "        <priority>1.0</priority>\n";
            $textxml .= "    </url>\n";
        }

        $datas = $this->gift->selectGiftIdAll();

        if ($datas) {

            while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                $textxml .= "    <url>\n";
                $textxml .= '        <loc>https://www.islandgift.ru/product/' . $data[0] . "</loc>\n";
                $textxml .= '        <lastmod>' . date('Y-m-d') . "</lastmod>\n";
                $textxml .= "        <changefreq>daily</changefreq>\n";
                $textxml .= "        <priority>0.7</priority>\n";
                $textxml .= "    </url>\n";
            }

        }
        mysqli_free_result($datas);

        $datas = $this->articles->selectArticle();

        if ($datas) {
            while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                $textxml .= "    <url>\n";
                $textxml .= '        <loc>https://www.islandgift.ru/article/' . $data[3] . "</loc>\n";
                $textxml .= '        <lastmod>' . date('Y-m-d') . "</lastmod>\n";
                $textxml .= "        <changefreq>daily</changefreq>\n";
                $textxml .= "        <priority>0.7</priority>\n";
                $textxml .= "    </url>\n";
            }
        }
        mysqli_free_result($datas);

        $textxml .= '</urlset>';
        return $textxml;
    }

// delete
    public function sitemap(): string
    {
        $filexml = fopen('../sitemap.xml', 'w');
        $url = [];
        $url[0] = '';
        $url[1] = '/picking';
        $url[2] = '/about';
        $url[3] = '/reviews';
        $url[4] = '/gift';
        $url[5] = '/woman';
        $url[6] = '/man';
        $url[7] = '/children';
        $url[8] = '/parent';
        $url[9] = '/grandma';
        $url[10] = '/allgift';
        $url[11] = '/flowers';
        $url[12] = '/sweet';
        $url[13] = '/box';
        $url[14] = '/celebration';
        $url[15] = '/registration';
        $url[16] = '/you';
        $url[17] = '/siteerror';
        $url[18] = '/dev';
        $url[19] = '/yandexrss';
        $url[20] = '/googleamp';
        $url[21] = '/product';
        $textxml = "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>\n";
        $textxml .= "<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n";

        for ($i = 0; $i < 22; $i++) {
            $textxml .= "    <url>\n";
            $textxml .= '        <loc>https://www.islandgift.ru' . $url[$i] . "</loc>\n";
            $textxml .= "        <changefreq>daily</changefreq>\n";
            $textxml .= "        <priority>1.0</priority>\n";
            $textxml .= "    </url>\n";
        }

        $datas = $this->gift->selectGiftIdAll();

        if ($datas) {
            while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                $textxml .= "    <url>\n";
                $textxml .= '        <loc>https://www.islandgift.ru/product/' . $data[0] . "</loc>\n";
                $textxml .= "        <changefreq>daily</changefreq>\n";
                $textxml .= "        <priority>1.0</priority>\n";
                $textxml .= "    </url>\n";
            }
        }

        $textxml .= '</urlset>';
        fwrite($filexml, $textxml);
        $textxml = json_encode($textxml);
        fclose($filexml);

        return $textxml;
    }

    public function updateSitemap($text): void
    {
        $filexml = fopen('param/url.php', 'w');
        $textxml = str_replace(['\\"', '<br>'], ['"', "\n"], $text);

        fwrite($filexml, $textxml);
        fclose($filexml);
    }

    public function getSitemap(): string
    {
        $filexml = fopen('param/url.php', 'r');
        $textXml = '';

        if ($filexml) {
            while (!feof($filexml)) {
                $textXml .= fgets($filexml, 999);
            }
        }

        fclose($filexml);

        $textXml = json_encode($textXml);
        return $textXml;
    }

    public function updateContact($text): void
    {
        $filexml = fopen('param/contact.php', 'w');
        $textxml = str_replace(['\\"', '<br>'], ['"', "\n"], $text);

        fwrite($filexml, $textxml);
        fclose($filexml);
    }

    public function getContact(): string
    {
        $filexml = fopen('param/contact.php', 'r');
        $textXml = '';

        if ($filexml) {
            while (!feof($filexml)) {
                $textXml .= fgets($filexml, 999);
            }
        }

        fclose($filexml);

        $textXml = json_encode($textXml);
        return $textXml;
    }

    public function updatePage($text): void
    {
        $filexml = fopen('param/PageParam.php', 'w');
        $textxml = str_replace(['\\"', '<br>'], ['"', "\n"], $text);

        fwrite($filexml, $textxml);
        fclose($filexml);
    }

    public function getPage(): string
    {
        $filexml = fopen('param/PageParam.php', 'r');
        $textXml = '';

        if ($filexml) {
            while (!feof($filexml)) {
                $textXml .= fgets($filexml, 999);
            }
        }

        fclose($filexml);

        $textXml = json_encode($textXml);
        return $textXml;
    }

    public function updatePageText($text): void
    {
        $filexml = fopen('param/textForPage.php', 'w');
        $textxml = str_replace(['\\"', '<bt>'], ['"', "\n"], $text);

        fwrite($filexml, $textxml);
        fclose($filexml);
    }

    public function getPageText(): string
    {
        $filexml = fopen('param/textForPage.php', 'r');
        $textXml = '';

        if ($filexml) {
            while (!feof($filexml)) {
                $textXml .= fgets($filexml, 999);
            }
        }

        fclose($filexml);

        $textXml = json_encode($textXml);
        return $textXml;
    }

    protected function getRssCategory($title, $link, $category, $desc, $option, $id = -1): string
    {
        require_once 'Product.php';
        $productDb = new Product();

        if ($id == -1)
            $products = $productDb->allGift();
        else
            $products = $productDb->GetResultCatalogGift($id);

        $text = '';
        $text .= '
        <item turbo="true">
            <title>' . $title . '</title>
            <link>https://www.islandgift.ru/' . $link . '</link>
            <category>' . $category . '</category>
            <description>
            ' . $desc . '
            </description>
            <turbo:content>
                <![CDATA[
                <header>
                    <figure>
                        <img src="https://www.islandgift.ru/logo.png" />
                    </figure>
                    <h1>' . $title . '</h1>';

        $text .= include '../rss/module/menu.php';

        $text .= '</header>          
                <p>
               ' . $option . '
                </p>
                <pre></pre>';
        $index = 1;

        if ($products) {

            while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
                $text .= '<h2>' . $product[1] . '</h2>
                <img src="https://www.islandgift.ru/' . $product[5] . '" />
                <h3>Описание:</h3>
                <p>
                    ' . $product[2] . '
                </p>
                <h3>Цена:</h3>
                <p>
                    ' . $product[4] . ' руб.
                </p>
                <a href="https://www.islandgift.ru/product/' . $product[0] . '">Купить</a>';
                $index++;
                if ($index > 45) {
                    $text .= '<p><a href="https://www.islandgift.ru/' . $link . '">Посмотреть все товары</a></p>';
                    break;
                }
            }
            mysqli_free_result($products);
        }
        $text .= include '../rss/module/footer.php';

        return $text;
    }

    protected function getRssGift(): string
    {
        $pageParam = include 'param/PageParam.php';
        $pageText = include 'param/textForPage.php';

        $text = '';
        $text .= '
            <item turbo="true">
            <title>' . $pageParam['gift']['title'] . '</title>
            <link>https://www.islandgift.ru/gift</link>
            <category>Подарки, мишки, день рождения</category>
            <description>' . $pageParam['gift']['description'] . '</description>

            <turbo:content>
                <![CDATA[
                <header>
                    <figure>
                        <img src="https://www.islandgift.ru/logo.png" />
                    </figure>
                    <h1>' . $pageParam['gift']['title'] . '</h1>';

        $text .= include '../rss/module/menu.php';

        $option = $pageText['gift']['section1Text'];
        if ($option != '36895') {
            $option = '<p>' . $option . '</p>';
        } else {
            $option = '';
        }

        $text .= '</header>' . $option . '
                <h2>Категории</h2>
                <p>' . $pageText['gift']['categoryText'] . '</p>

                <h3>Подарки Для Женщин</h3>
                <img src="https://www.islandgift.ru/img/woman/1.png" />
                <p>Достойные подарки для любимой женщины</p>
                <a href="https://www.islandgift.ru/woman">Подробнее</a>

                <h3>Подарки Для Мужчин</h3>
                <img src="https://www.islandgift.ru/img/man/1.jpg" />
                <p>Подарки настоящему мужчине</p>
                <a href="https://www.islandgift.ru/man">Подробнее</a>

                <h3>Подарки Для Детей</h3>
                <img src="https://www.islandgift.ru/img/children/1.png" />
                <p>Подарки самым маленьким</p>
                <a href="https://www.islandgift.ru/children">Подробнее</a>

                <h3>Подарки Для Родителей</h3>
                <img src="https://www.islandgift.ru/img/parent/1.png" />
                <p>Маленькое чудо для родителей</p>
                <a href="https://www.islandgift.ru/parent">Подробнее</a>

                <h3>Подарки Для Бабушек и Дедушек</h3>
                <img src="https://www.islandgift.ru/img/grandmather/1.png" />
                <p>Подарки для любимых бабушек и дедушек</p>
                <a href="https://www.islandgift.ru/grandmather">Подробнее</a>

                <h3>Все Подарки</h3>
                <img src="https://www.islandgift.ru/img/allgift/1.jpg" />
                <p>Здесь собранна вся коллекция подарков и услуг которые мы с радостью предоставляем для Вас</p>
                <a href="https://www.islandgift.ru/allgift">Подробнее</a>

                <h3>Цветы</h3>
                <img src="https://www.islandgift.ru/img/flowers/1.jpg" />
                <p>Цветы и букеты на любой вкус</p>
                <a href="https://www.islandgift.ru/flowers">Подробнее</a>

                <h3>Сладости</h3>
                <img src="https://www.islandgift.ru/img/sweet/1.jpg" />
                <p>Любимые сладости</p>
                <a href="https://www.islandgift.ru/sweet">Подробнее</a>

                <h3>Наборы и упаковка</h3>
                <img src="https://www.islandgift.ru/img/box/1.jpg" />
                <p>Креативные наборы и упаковки</p>
                <a href="https://www.islandgift.ru/box">Подробнее</a>

                <h3>Организация праздника</h3>
                <img src="https://www.islandgift.ru/img/celebration/1.jpg" />
                <p>Незабываемый праздник</p>
                <a href="https://www.islandgift.ru/celebration">Подробнее</a>      
        ';
        require_once 'Promotions.php';
        $promo = new Promotions();
        $text .= $promo->showPromoRss();
        $text .= '<h2><b> Подарки';
        $month = date('m');
        $day = date('d');
        $category = 0;
        if ($month == 2) {
            if ($day > 23) {
                $category = 1;
                $text .= ' к 8 марта';
                $descriptionText = 'Поздравьте свою любимую с этим замечательным праздником';
            } else {
                $category = 2;
                $text .= ' на 23 Февраля';
                $descriptionText = 'Поздравьте своего защитника с этим замечательным праздником';
            }
        } else if ($month == 3) {
            $category = 1;
            if ($day <= 8) {
                $text .= ' на 8 марта';
                $descriptionText = 'Поздравьте свою любимую с этим замечательным праздником';
            } else {
                $index = random_int(1, 2);
                if ($index == 1) {
                    $text .= ' на День рождения';
                    $category = 0;
                    $descriptionText = 'Подарите самый лучший подарок в День рождения, который наверняка понравится именнинику';
                } else {
                    $text .= ' для себя';
                    $category = 7;
                    $descriptionText = 'Порадуйте себя вкусняшкой😇';
                }
            }
        } else if ($month == 12) {
            $category = 9;
            $text .= ' к Новому году';
            $year = date('Y') + 1;
            $descriptionText = 'Поздравьте своих близких с Новым ' . $year . ' годом! И подарите им самый лучший подарок';
        } else {
            $index = random_int(1, 2);
            if ($index == 1) {
                $text .= ' на День Рождения';
                $category = 0;
                $descriptionText = 'Подарите самый лучший подарок в День рождения, который наверняка понравится именнинику';
            } else {
                $text .= ' для себя';
                $category = 7;
                $descriptionText = 'Порадуйте себя вкусняшкой😇';
            }
        }
        $text .= '</b></h2><p>' . $descriptionText . '</p>';

        require_once 'Product.php';
        $productDb = new Product();

        $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 6');

        if ($productP) {
            while ($product = mysqli_fetch_array($productP, MYSQLI_NUM)) {
                $text .= '<h3>' . $product[1] . '</h3>
                <img src="https://www.islandgift.ru/' . $product[5] . '" />
                <b>Описание:</b>
                <p>
                    ' . $product[2] . '
                </p>
                <b>Цена:</b>
                <p>
                    ' . $product[4] . '
                </p>
                <a href="https://www.islandgift.ru/product/' . $product[0] . '">Купить</a>';
            }
            mysqli_free_result($productP);
        }

        $text .= '<h2>Популярные товары и услуги</h2><p>Здесь собраны товары и услуги, которые пользуются спросом😉</p>';
        $productP = $productDb->GetPopulationProduct();

        if ($productP) {
            while ($product = mysqli_fetch_array($productP, MYSQLI_NUM)) {
                $text .= '<h3>' . $product[1] . '</h3>
                <img src="https://www.islandgift.ru/' . $product[5] . '" />
                <b>Описание:</b>
                <p>
                    ' . $product[2] . '
                </p>
                <b>Цена:</b>
                <p>
                    ' . $product[4] . '
                </p>
                <a href="https://www.islandgift.ru/product/' . $product[0] . '">Купить</a>';
            }
            mysqli_free_result($productP);
        }

        $file = fopen('../weather/weather.txt', 'r');
        $temp = 0;
        $temp_min = 0;
        $temp_max = 0;

        if ($file) {
            while ($texts = fgets($file, 4096)) {
                $texts = explode(';', $texts);
                $temp = $texts[0];
                $temp_min = $texts[1];
                $temp_max = $texts[2];
            }
        }
        $text .= '
        <h2>Погода</h2>
        <img src="https://www.islandgift.ru/amp/img/weather.jpg" />
        <h3>Сейчас в Ярославле: ' . $temp . '°</h3>
        <p>Минимальная температура: ' . $temp_min . '°</p>
        <p>Максимсальная температура: ' . $temp_max . '°</p>
        ';

        $text .= include '../rss/module/footer.php';
        return $text;
    }

    public function rssProduct($trigger = false): string
    {
        $text = include '../rss/module/head.php';
        require_once 'Product.php';
        $productDb = new Product();
        $products = $productDb->allGift();

        $menu = include '../rss/module/menu.php';
        $footer = include '../rss/module/footer.php';
        $pageParam = include 'param/PageParam.php';

        if ($products) {
            while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {

                $categoryText = '';
                $url = '';
                $recommendation = '';
                $category = 1;
                switch ($product[7]) {
                    case 1:
                        $categoryText = 'Подарки для женщин';
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
                        $categoryText = 'Подарки для мужчин';
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
                        $categoryText = 'Подарки для детей';
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
                        $categoryText = 'Подарки для родителей';
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
                        $categoryText = 'Подарки для бабушек и дедушек';
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
                        $categoryText = 'Цветы';
                        $url = '/flowers';
                        $recommendation .= 'К цветам определенно нужны сладости😁';
                        $category = 7;
                        break;
                    case 7:
                        $categoryText = 'Сладости';
                        $url = '/sweet';
                        $recommendation .= 'Сладости стоит упаковать в коробочку🎁';
                        $category = 8;
                        break;
                    case 8:
                        $categoryText = 'Наборы и упаковка';
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
                        $categoryText = 'Все подарки';
                        $url = '/allgift';
                        $recommendation .= 'Эти товары наверняка вас заинтрересуют✌';
                        $category = 9;
                        break;
                }

                if (isset($pageParam['product'])) {
                    $find = ['product_name', 'product_description', 'product_price'];
                    $replase = [$product[1], $product[2], $product[4]];
                    $meta_d = str_replace($find, $replase, $pageParam['product']['description']);
                    $title = str_replace($find, $replase, $pageParam['product']['title']);
                } else {
                    $meta_d = '' . $product[2] . ' Возьмите даный продукт у нас по заманчивой цене.' . $product[4];
                    $title = $product[1];
                }
                $text .= '
                <item turbo="true">
                    <title>' . str_replace('&', ' and ', $title) . '</title>
                    <link>https://www.islandgift.ru/product/' . $product[0] . '</link>
                    <category>Подарки</category>
                    <description>' . str_replace(['&', '<br>'], [' and ', ''], $meta_d) . '</description>
                    <turbo:content>
                        <![CDATA[
                        <header>
                            <figure>
                                <img src="https://www.islandgift.ru/logo.png" />
                            </figure>
                            <h1>' . $product[1] . '</h1>';
                $text .= $menu;
                $text .= '</header>
<p><a href="https://www.islandgift.ru/gift" title="Подарок для тебя">Подарок для тебя♥</a> / <a href="https://www.islandgift.ru' . $url . '" title="' . $categoryText . '">' . $categoryText . '</a> / ' . $product[1] . '</p>
                        <h2>Информация о товаре</h2>
                        <img src="https://www.islandgift.ru/' . $product[5] . '" />                      
                        <h3>Описание:</h3>
                        <p>
                            ' . $product[3] . '
                        </p>
                        <h3>Цена:</h3>
                        <p>
                            ' . $product[4] . ' руб.
                        </p>
        
                        <a href="https://www.islandgift.ru/product/' . $product[0] . '">Купить</a>
                        ';

                $text .= '<h2><b>' . $recommendation . '</b></h2>';
                $productP = $productDb->GetResultCatalogGift($category, ' LIMIT 3', 'RAND()');

                if ($productP) {

                    while ($productRec = mysqli_fetch_array($productP, MYSQLI_NUM)) {
                        $text .= '<h2>' . $productRec[1] . '</h2>
                        <img src="https://www.islandgift.ru/' . $productRec[5] . '" />
                        <h3>Описание:</h3>
                        <p>
                            ' . $productRec[2] . '
                        </p>
                        <h3>Цена:</h3>
                        <p>
                            ' . $productRec[4] . '
                        </p>
                        <a href="https://www.islandgift.ru/product/' . $productRec[0] . '">Купить</a>';
                    }
                    mysqli_free_result($productP);

                }

                $text .= $footer;
            }
            mysqli_free_result($products);
        }
        $text .= '</channel>
        </rss>';

        if ($trigger) {
            echo $text;
        } else {
            $file = fopen('../rss/product.xml', 'w');
            fwrite($file, $text);
            fclose($file);
        }
    }

    public function rssCategory($trigger = false): string
    {
        $pageParam = include 'param/PageParam.php';
        $text = include '../rss/module/head.php';
        $pageText = include 'param/textForPage.php';

        $desc = $pageParam['allgift']['description'];
        $option = $pageText['allgift']['description'];
        $text .= $this->getRssCategory($pageParam['allgift']['title'], 'allgift', 'Подарки радость', $desc, $option);

        $desc = $pageParam['woman']['description'];
        $option = $pageText['woman']['description'];
        $text .= $this->getRssCategory($pageParam['woman']['title'], 'woman', 'Подарки девушка женщина любимая', $desc, $option, 1);

        $desc = $pageParam['man']['description'];
        $option = $pageText['man']['description'];
        $text .= $this->getRssCategory($pageParam['man']['title'], 'man', 'Подарки парень мужчина любимый', $desc, $option, 2);

        $desc = $pageParam['children']['description'];
        $option = $pageText['children']['description'];
        $text .= $this->getRssCategory($pageParam['children']['title'], 'children', 'Подарки дети детишки', $desc, $option, 3);

        $desc = $pageParam['parent']['description'];
        $option = $pageText['parent']['description'];
        $text .= $this->getRssCategory($pageParam['parent']['title'], 'parent', 'Подарки родители мама папа родственники', $desc, $option, 4);

        $desc = $pageParam['grandma']['description'];
        $option = $pageText['grandma']['description'];
        $text .= $this->getRssCategory($pageParam['grandma']['title'], 'grandma', 'Подарки бабушка дедушка родственники', $desc, $option, 5);

        $desc = $pageParam['flowers']['description'];
        $option = $pageText['flowers']['description'];
        $text .= $this->getRssCategory($pageParam['flowers']['title'], 'flowers', 'Цветы букеты наборы', $desc, $option, 6);

        $desc = $pageParam['sweet']['description'];
        $option = $pageText['sweet']['description'];
        $text .= $this->getRssCategory($pageParam['sweet']['title'], 'sweet', 'Сладости конфеты вкусняшки', $desc, $option, 7);

        $desc = $pageParam['box']['description'];
        $option = $pageText['box']['description'];
        $text .= $this->getRssCategory($pageParam['box']['title'], 'box', 'Коробки подарочные наборы подарки', $desc, $option, 8);

        $text .= $this->getRssGift();

        $text .= '</channel>
        </rss>';

        if ($trigger)
            return $text;
        else {
            $file = fopen('../rss/category.xml', 'w');
            fwrite($file, $text);
            fclose($file);
        }
    }

    public function rssArticle($trigger = false)
    {
        $pageParam = include 'param/PageParam.php';
        $text = include '../rss/module/head.php';
        $pageText = include 'param/textForPage.php';

        $text .= '<item turbo="true">
            <title>' . $pageParam['articles']['title'] . '</title>
            <link>https://www.islandgift.ru/articles</link>
            <category>Статьи</category>
            <description>
            ' . str_replace('<br>', '', $pageParam['articles']['description']) . '
            </description>
            <turbo:content>
                <![CDATA[
                <header>
                    <figure>
                        <img src="https://www.islandgift.ru/logo.png" />
                    </figure>
                    <h1>' . $pageParam['articles']['title'] . '</h1>';

        $text .= include '../rss/module/menu.php';
        $text .= '</header>          
                <p>На данной странице представленны интересные статьи для вас, в них Вы сможете найти полезную информацию для себя.</p>
                <pre></pre>';

        $articles = $this->articles->selectArticle();
        if ($articles) {
            while ($article = mysqli_fetch_array($articles, MYSQLI_NUM)) {
                $text .= '<h2>' . $article[1] . '</h2>
                <img src="https://www.islandgift.ru/' . $article[7] . '" />
                <h3>Описание:</h3>
                <p>
                    ' . $article[5] . '
                </p>
                
                <a href="https://www.islandgift.ru/article/' . $article[3] . '">Читать</a>
                ';
            }
            mysqli_free_result($articles);
        }

        $text .= include '../rss/module/footer.php';

        $text .= $this->allArticle();

        $text .= '</channel>
        </rss>';
        if ($trigger)
            return $text;
        else {
            $file = fopen('../rss/category.xml', 'w');
            fwrite($file, $text);
            fclose($file);
        }
    }

    protected function allArticle(): string
    {
        $text = '';
        $articles = $this->articles->selectArticle();
        if ($articles) {
            while ($article = mysqli_fetch_array($articles, MYSQLI_NUM)) {
                $this->articles->initParam($article);
                $text .= '<item turbo="true">
            <title>' . $article[1] . '</title>
            <link>https://www.islandgift.ru/article/' . $article[3] . '</link>
            <category>Статьи</category>
            <description>
            ' . str_replace('<br>', '', $article[5]) . '
            </description>
            <author>' . $article[8] . '</author>
            <turbo:content>
                <![CDATA[
                <header>
                    <figure>
                        <img src="https://www.islandgift.ru/logo.png" />
                    </figure>
                    <h1>' . $article[1] . '</h1>';

                $text .= include '../rss/module/menu.php';
                $text .= '</header>' . str_replace('../', 'https://www.islandgift.ru/', $this->articles->showArticleRss()) . '          
                
                
                <a href="https://www.islandgift.ru/article/' . $article[3] . '">Перейти на полную версию статьи</a>
                ';
                $text .= include '../rss/module/footer.php';
            }
            mysqli_free_result($articles);
        }
        return $text;
    }
}