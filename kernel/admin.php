<?php
if ($_SERVER['HTTP_HOST'] != $_SERVER['SERVER_NAME']) {
    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    echo '{"status":"0","msg":"Не санкционированный доступ! Атата"}';
} else {

    if ($_POST) {
        $dataPost = json_decode($_POST['data'], 1);
        switch ($dataPost['name']) {
            case 'exit':

                require_once 'Authorization.php';
                $avt = new Authorization();

                $avt->exitAvt();
                echo '{"status":"1"}';

                break;

            case 'findProduct':
                require_once 'Gift.php';
                $gift = new Gift();

                $datas = $gift->selectGiftNameAll($dataPost['dat']);
                $name = '';

                if ($datas) {
                    $text = '';

                    while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                        $name .= ' ' . $data[1];
                        $te = "<select class='ul-widget-feedBack-form-control normal' type='text' id='category" . $data[0] . "' placeholder='Категория' required><option value='1'" . (($data[2] == 1) ? 'selected' : '') . ">Для женщин</option><option value='2'" . (($data[2] == 2) ? 'selected' : '') . ">Для мужчин</option><option value='3'" . (($data[2] == 3) ? 'selected' : '') . ">Для детей</option><option value='4'" . (($data[2] == 4) ? 'selected' : '') . ">Для родителей</option><option value='5'" . (($data[2] == 5) ? 'selected' : '') . ">Для бабушек и дедушек</option><option value='6'" . (($data[2] == 6) ? 'selected' : '') . ">Цветы</option><option value='7'" . (($data[2] == 7) ? 'selected' : '') . ">Сладости</option><option value='8'" . (($data[2] == 8) ? 'selected' : '') . ">Коробки</option><option value='9'" . (($data[2] == 9) ? 'selected' : '') . ">Универсальные</option><option value='9'" . (($data[2] == 10) ? 'selected' : '') . '>Для дома</option></select>';
                        $text .= "<table border='1' style='width: 100%;margin-top: 25px;' id='productGiftId" . $data[0] . "'><tr><td>Наименование</td>";
                        $text .= "<td><input class='ul-widget-feedBack-form-control normal' type='text' id='name" . $data[0] . "' placeholder='Название' value='" . $data[1] . "'></td>";
                        $text .= '</tr><tr><td>Категория</td>';
                        $text .= "<td>$te</td>";
                        $text .= '</tr><tr><td>Краткое описание</td>';
                        $text .= "<td><textarea style='resize: vertical;' class='ul-widget-feedBack-form-control normal' id='incomplete" . $data[0] . "' type='text' placeholder='Краткое описание'>" . $data[3] . '</textarea></td>';
                        $text .= '</tr><tr><td>Полное описание</td>';
                        $text .= "<td><textarea style='resize: vertical;' class='ul-widget-feedBack-form-control normal' id='full" . $data[0] . "' type='text' placeholder='полное описание'>" . $data[4] . '</textarea></td>';
                        $text .= '</tr><tr><td>Цена</td>';
                        $text .= "<td><input class='ul-widget-feedBack-form-control normal' type='text' id='price" . $data[0] . "' placeholder='Цена' value='" . $data[5] . "'></td>";
                        $text .= '</tr><tr><td>Количество</td>';
                        $text .= "<td><input class='ul-widget-feedBack-form-control normal' type='text' id='count" . $data[0] . "' placeholder='Количество' value='" . $data[6] . "'></td>";
                        $text .= '</tr><td>Изображение<br>Загрузить изначальное изображение</td><td><img src="' . $data[8] . '" style="width: 50%;">' . "<div style='display: flex;'><input class='ul-widget-feedBack-form-control normal' id='staImg" . $data[0] . "' type='file' name='updateimg[]' multiple='true' min='1' max='7'><a type='submit' id='imgSta_" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle' data-image-product='" . $data[8] . "'>Загрузить обложку</a></div>" . '</td>';
                        $text .= '</tr><tr><td>Картинка</td>';
                        $text .= "<td><div style='display: flex;'><input class='ul-widget-feedBack-form-control normal' id='img" . $data[0] . "' type='file' name='updateimg[]' multiple='true' min='1' max='7'>";
                        $text .= "<a type='submit' id='upload_" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Загрузить</a></div><p id='fileProductDownload" . $data[0] . "'></p></td>";
                        $text .= "</tr><tr><td><a type='submit' id='remove_" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить</a></td>";
                        $text .= "<td><a type='submit' id='update_" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Изменить</a></td>";
                        $text .= '</tr></table><br>';
                    }
                }

                $text = json_encode($text);
                echo '{"status":"1","gift":"' . $name . '","text":' . $text . '}';

                break;
            case 'updateProduct':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo $admin->updateGift($dataPost);

                break;
            case 'removeProduct':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo $admin->delGift($dataPost);

                break;
            case 'updateImgProduct':
                require_once 'Gift.php';
                $giftDb = new Gift();
                $giftDb->id = $dataPost['id'];
                $giftDb->img = $dataPost['file'];
                $result = $giftDb->updateImg($dataPost['filePrev']);
                echo '{"status":"' . $result[0] . '","msg":"' . $result[1] . '"}';
                break;

            case 'updateOrder':

                require_once 'AdminSite.php';
                $order = new Order();

                $order->id = $dataPost['id'];
                $order->state = $dataPost['status'];

                echo '{"msg":"' . $order->updateOrder()[1] . '"}';

                break;
            case 'removeOrder':

                require_once 'AdminSite.php';
                $order = new Order();

                $order->id = $dataPost['id'];
                echo '{"msg":"' . $order->deleteOrder()[1] . '"}';

                break;

            case 'updateSitemap':

                require_once 'AdminSite.php';
                $admin = new Admin();

                $admin->updateSitemap($dataPost['sitemap']);
                echo '{"msg":"Информация успешно изменена"}';

                break;
            case 'createSitemap':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo '{"xml":' . $admin->sitemap() . '}';

                break;
            case 'sitemap':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo '{"xml":' . $admin->getSitemap() . '}';

                break;

            case 'refactError':

                require_once 'Error.php';
                $error = new ErrorSite();

                $error->id = $dataPost['id'];
                $error->updateError();

                break;

            case 'rssProduct':

                require_once 'AdminSite.php';
                $rss = new Admin();

                $rss->rssProduct();
                echo '{"msg":"Успешно создан"}';

                break;
            case 'rssCategory':

                require_once 'AdminSite.php';
                $rss = new Admin();

                $rss->rssCategory();
                echo '{"msg":"Успешно создан"}';

                break;

            case 'findArticle':

                require_once 'Articles.php';
                $article = new Articles();

                $datas = $article->selectArticleNameAll($dataPost['dat']);
                $text = '';

                if ($datas) {

                    while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                        $text .= "
                        <table border='1' style='margin-top: 25px' id='articleId" . $data[0] . "'>
                        <tr><td>Название статьи</td>
                        <td><input class='ul-widget-feedBack-form-control normal' type='text' id='articleTitle" . $data[0] . "' placeholder='Название' value='" . $data[1] . "'></td></tr>
                        <tr><td>Url</td>
                        <td><input class='ul-widget-feedBack-form-control normal' type='text' id='articleUrl" . $data[0] . "' placeholder='Название' value='" . $data[3] . "'></td></tr>
                        <tr><td>Description</td>
                        <td><textarea style='resize: vertical;' class='ul-widget-feedBack-form-control normal' type='text' id='articleDescription" . $data[0] . "' placeholder='Название' >" . $data[2] . "</textarea></td></tr>
                        <tr><td>Краткое описание</td>
                        <td><textarea style='resize: vertical;' class='ul-widget-feedBack-form-control normal' rows='5' type='text' id='articleIncomplete" . $data[0] . "' placeholder='Название' >" . $data[5] . "</textarea></td></tr>
                        <tr><td>Полное описание</td>
                        <td><textarea style='resize: vertical;' class='ul-widget-feedBack-form-control normal' rows='11' type='text' id='articleText" . $data[0] . "' placeholder='Название' >" . $data[6] . "</textarea></td></tr>
                        <tr><td>Автор</td>
                        <td><input class='ul-widget-feedBack-form-control normal' type='text' id='articleAuthor" . $data[0] . "' placeholder='Автор' value='" . $data[8] . "'></td></tr>
                        
                        <tr><td>Изображение<br>Загрузить изначальное изображение</td>
                        <td>
                        <img src=\"" . $data[7] . "\" style=\"width: 50%;\">
                        <div style='display: flex;'>
                        <input class='ul-widget-feedBack-form-control normal' id='artImg" . $data[0] . "' type='file' name='updateimg[]' multiple='true' min='1' max='7'>
                        <a type='submit' id='imgArt_" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle' data-image-product='" . $data[7] . "'>Загрузить обложку</a>
                        </div></td></tr>
                        
                        <tr><td>Картинки<br>(Название картинок желательно ставить числовое)</td>
                        <td><div style='display: flex;'><input class='ul-widget-feedBack-form-control normal' id='img" . $data[0] . "' type='file' name='updateimg[]' multiple='true' min='1' max='7'>
                        <a type='submit' id='upload_A" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Загрузить</a></div><p id='fileArticleDownload" . $data[0] . "'></p></td></tr>
                  
                        </tr><tr><td><a type='submit' id='remove_A" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить</a></td>
                        <td><a type='submit' id='update_A" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Изменить</a></td></tr>            
                        </table>
                    ";
                    }
                    mysqli_free_result($datas);
                }

                $text = json_encode($text);
                echo '{"status":"1","text":' . $text . '}';

                break;
            case 'updateArticle':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo $admin->updateArticle($dataPost);

                break;
            case 'removeArticle':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo $admin->removeArticle($dataPost);

                break;
            case 'updateImgArticle':
                require_once 'Articles.php';
                $article = new Articles();
                $article->id = $dataPost['id'];
                $article->img = $dataPost['file'];
                $result = $article->updateImg($dataPost['filePrev']);
                echo '{"status":"' . $result[0] . '","msg":"' . $result[1] . '"}';
                break;

            case 'findPromo':
                require_once 'Promotions.php';
                $promo = new Promotions();

                $promo->id = $dataPost['dat'];

                $findPromos = 0;
                if (is_numeric($promo->id)) {
                    $findPromos = $promo->selectPromo();
                }

                $text = '';

                if ($findPromos && mysqli_num_rows($findPromos)) {
                    $data = mysqli_fetch_array($findPromos, MYSQLI_NUM);
                    $text .= "
                    <table border='1' style='margin-top: 25px;width:100%;' id='promoId" . $data[0] . "'>                      
                        <tr><td>Текст</td>
                        <td><textarea style='resize: vertical;' class='ul-widget-feedBack-form-control normal' rows='11' type='text' id='promoText" . $data[0] . "' placeholder='Название' >" . $data[1] . "</textarea></td></tr>
                        <tr><td>Статус</td>
                        <td><input class='ul-widget-feedBack-form-control normal' type='text' id='promoStatus" . $data[0] . "' placeholder='Название' value='" . $data[2] . "'></td></tr>
                        <tr><td><a type='submit' id='remove_P" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить</a></td>
                        <td><a type='submit' id='update_P" . $data[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Изменить</a></td></tr>            
                        </table>
                    ";
                    mysqli_free_result($findPromos);
                } else {
                    $text .= 'Акции с данным индеском не существует!';
                }

                $text = json_encode($text);
                echo '{"status":"1","text":' . $text . '}';

                break;
            case 'addPromo':

                require_once 'Promotions.php';
                $promo = new Promotions();

                $promo->text = $dataPost['promoText'];
                $promo->status = $dataPost['promoStatus'];
                echo '{"msg":"' . $promo->insertPromo()[1] . '"}';

                break;
            case 'updatePromo':

                require_once 'Promotions.php';
                $promo = new Promotions();

                $promo->id = $dataPost['promoId'];
                $promo->text = $dataPost['promoText'];
                $promo->status = $dataPost['promoStatus'];
                echo '{"msg":"' . $promo->updatePromo()[1] . '"}';

                break;
            case 'deletePromo':

                require_once 'Promotions.php';
                $promo = new Promotions();

                $promo->id = $dataPost['promoId'];
                echo '{"msg":"' . $promo->deletePromo()[1] . '"}';

                break;

            case 'updateContact':

                require_once 'AdminSite.php';
                $admin = new Admin();

                $admin->updateContact($dataPost['contact']);
                echo '{"msg":"Информация успешно изменена"}';

                break;
            case 'showContact':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo '{"xml":' . $admin->getContact() . '}';

                break;

            case 'updatePage':

                require_once 'AdminSite.php';
                $admin = new Admin();

                $admin->updatePage($dataPost['page']);
                echo '{"msg":"Информация успешно изменена"}';

                break;
            case 'showPage':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo '{"xml":' . $admin->getPage() . '}';

                break;
            case 'updatePageText':

                require_once 'AdminSite.php';
                $admin = new Admin();

                $admin->updatePageText($dataPost['page']);
                echo '{"msg":"Информация успешно изменена"}';

                break;
            case 'showPageText':

                require_once 'AdminSite.php';
                $admin = new Admin();

                echo '{"xml":' . $admin->getPageText() . '}';

                break;

            case 'messageSend':
                require_once 'mailMessage.php';
                $mailMessage = new mailMessage();
                $mailMessage->send();
                echo '{"status":1}';
                break;

            case 'findCollection':
                require_once 'Img.php';
                $imgCollectionDb = new Img();
                $imgCollectionDb->imgCollect = $dataPost['find'];
                $trigger = false;
                if ($imgCollectionDb->imgCollect != '')
                    $imgCollections = $imgCollectionDb->selectCollectionLike();
                else {
                    $imgCollections = $imgCollectionDb->selectWhereCollection('WHERE 1 ORDER BY imgcollection');
                    $trigger = true;
                }
                $text = '';
                if ($imgCollections) {
                    if (!$trigger) {
                        $text = "<table border='1' style='margin-top: 25px;width:100%;' id='colleId" . $dataPost['find'] . "'>
                        <tr><td>Название коллекции</td>
                        <td><input class='ul-widget-feedBack-form-control normal' type='text'  placeholder='Название' value='" . $dataPost['find'] . "'></td></tr>
                        ";
                    }
                    $nameCollection = '';
                    $triggerStart = true;
                    while ($imgCollection = mysqli_fetch_array($imgCollections, MYSQLI_NUM)) {

                        if ($nameCollection != $imgCollection[1] && $trigger == true) {
                            if (!$triggerStart)
                                $text .= "<tr><td><a type='submit' id='remove_C" . $imgCollection[1] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить Коллекцию</a></td>
                                <td></td></tr></table>";
                            $triggerStart = false;
                            $triggers = true;
                            $nameCollection = $imgCollection[1];
                        } else {
                            $triggers = false;
                        }

                        if ($triggers) {
                            $text .= "<table border='1' style='margin-top: 25px;width:100%;word-break: break-all;' id='colleId" . $imgCollection[1] . "'>
                            <tr><td style='width:50%'>Название коллекции</td>
                            <td style='width:50%'><input class='ul-widget-feedBack-form-control normal' type='text'  placeholder='Название' value='" . $imgCollection[1] . "'></td></tr>
                            ";
                        }

                        $text .= "                                      
                        <tr><td>Картинка " . $imgCollection[2] . "</td>
                        <td><div><img src='" . $imgCollection[2] . "' style='width:50%;'>
                        <div style='display: flex;'><input class='ul-widget-feedBack-form-control normal' id='img" . $imgCollection[0] . "' type='file' name='updateimg[]' multiple='true' min='1' max='7'>
                        <a type='submit' id='upload_С" . $imgCollection[0] . "' style='cursor: pointer;' data-collection-img='" . $imgCollection[1] . "' class='ul-w-button1 middle'>Загрузить</a></div>
                        <div>
                        <a type='submit' id='delete_С" . $imgCollection[0] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить картинку</a></div>
                        </div><p id='fileCollectionDownload" . $imgCollection[0] . "'></p></td></tr>                                                                        
                    ";
                    }
                    $text .= "<tr><td><a type='submit' id='remove_C" . $dataPost['find'] . "' style='cursor: pointer;' class='ul-w-button1 middle'>Удалить Коллекцию</a></td>
                        <td></td></tr></table>";
                    mysqli_free_result($imgCollections);
                }
                $text = json_encode($text);
                echo '{"text":' . $text . '}';
                break;
            case 'updateCollection':
                require_once 'Img.php';
                $imgCollectionDb = new Img();
                $imgCollectionDb->imgId = $dataPost['id'];
                $imgCollectionDb->imgCollect = $dataPost['idCollection'];
                $imgCollectionDb->images[0] = '../collection/tmp/' . $dataPost['id'] . '_' . $dataPost['file'];
                rename('../collection/tmp/' . $dataPost['file'],'../collection/tmp/' . $dataPost['id'] . '_' . $dataPost['file']);

                if(strpos(mb_strtolower($imgCollectionDb->images[0]),'.jpg') !== false)
                    system("convert ".$imgCollectionDb->images[0]." -sampling-factor 4:2:0 -strip -quality 85 -interlace JPEG -colorspace sRGB ".$imgCollectionDb->images[0]."");
                else
                    system("convert ".$imgCollectionDb->images[0]." -strip [-resize WxH] [-alpha Remove] ".$imgCollectionDb->images[0]."");

                $result = $imgCollectionDb->updateImgCollection();
                echo '{"status":"' . $result[0] . '","msg":"' . $result[1] . '"}';
                break;
            case 'removeImgCollection':
                require_once 'Img.php';
                $imgCollectionDb = new Img();
                $imgCollectionDb->imgId = $dataPost['id'];
                $result = $imgCollectionDb->deleteImgCollectionId();
                echo '{"status":"' . $result[0] . '","msg":"' . $result[1] . '"}';
                break;
            case 'deleteCollection':
                require_once 'Img.php';
                $imgCollectionDb = new Img();
                $imgCollectionDb->imgId = $dataPost['id'];
                $result = $imgCollectionDb->deleteCollectionId();
                echo '{"status":"' . $result[0] . '","msg":"' . $result[1] . '"}';
                break;
        }
    }

    if (isset($_FILES['file'])) {

        if (0 < $_FILES['file']['error']) {
            echo '{"Error": "' . $_FILES['file']['error'] . '","file":"-1"}';
        } else {
            $file_name = $_FILES['file']['name'];
            $file_dir = '../product/tmp/' . $_FILES['file']['name'];
            $file_dir = str_replace(' ', '_', $file_dir);

            move_uploaded_file($_FILES['file']['tmp_name'], $file_dir);
            $file_name = json_encode($file_name, JSON_UNESCAPED_UNICODE);

            echo '{"file":' . $file_name . '}';
        }
    }

    if (isset($_FILES['staImg'])) {

        if (0 < $_FILES['file']['error']) {
            echo '{"Error": "' . $_FILES['staImg']['error'] . '","file":"-1"}';
        } else {
            $file_name = $_FILES['staImg']['name'];
            $file_dir = '../product/tmp/' . $_FILES['staImg']['name'];
            $file_dir = str_replace(' ', '_', $file_dir);

            move_uploaded_file($_FILES['staImg']['tmp_name'], $file_dir);
            $file_name = json_encode($file_name, JSON_UNESCAPED_UNICODE);

            echo '{"file":' . $file_name . '}';
        }
    }
}
