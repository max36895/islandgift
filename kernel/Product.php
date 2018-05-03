<?php
require_once 'Order.php';

class Product extends Order
{
    public function printGift($dataPost): string
    {
        $status = 3;
        $result = '';

        if ($dataPost['find']) {
            $id = $dataPost['id'];
            $find = $dataPost['find'];

            require_once 'Gift.php';
            $gift = new Gift();

            $whereId = $gift->setWhereId($id);

            if ($whereId != '') {
                $whereId = ' AND ' . $whereId;
            }
            $orderBy = '';
            if ($dataPost['statusNew'] == 1) {
                $orderBy .= ' g.id DESC';
            } else if ($dataPost['statusNew'] == 2) {
                $orderBy .= ' g.id';
            }

            if ($dataPost['statusCheaper'] == 1) {
                if ($orderBy != '') {
                    $orderBy .= ',';
                }
                $orderBy .= ' des.price DESC';
            } else if ($dataPost['statusCheaper'] == 2) {
                if ($orderBy != '') {
                    $orderBy .= ',';
                }
                $orderBy .= ' des.price';
            }
            if ($orderBy != '') {
                $orderBy = ' ORDER BY' . $orderBy;
            }

            $search = include 'param/find.php';
            $find = str_replace($search[0], $search[1], mb_strtolower($find));

            $where = ' WHERE ((g.name LIKE "%' . $find . '%") OR (des.full LIKE "%' . $find . '%"))  ' . $whereId . $orderBy;
            $results = $gift->select($where);
            $status = 0;

            if ($results) {
                $pageindex = 1;
                $itemCount = 0;
                $trigger = false;

                while ($product = mysqli_fetch_array($results, MYSQLI_NUM)) {
                    if ($itemCount == 0) {
                        $trigger = true;
                        $style = '';

                        if ($pageindex != 1) {
                            $style = 'style="display:none"';
                        }

                        $result .= '<div class="row ul-row" id="pageNumberFind_' . $pageindex . '" ' . $style . '>';
                    }
                    $itemCount++;

                    $result .= "<div id='ul-id-2-" . $product[0] . "' class='col ul-col col-xs-12 col-sm-12 col-md-4'><a href='/product/" . $product[0] . "' id='ul-id-2-1' class='ul-widget ul-w-productCard js-w-productCard' data-controls='mer' data-widget='productCard' data-design='design-0' data-alignment='center'><div class='ul-w-productCard__picture'><img class='ul-w-productCard__picture__image js-w-productCard__picture__image' src=\"" . $product[8] . "\" alt='" . $product[1] . "' title='" . $product[1] . "'></div><div class='ul-w-productCard__title'><div class='ul-w-productCard__title__content h4'>" . $product[1] . "&nbsp;</div></div><div class='ul-w-productCard__description note'>" . $product[3] . "</div><div class='ul-w-productCard__spacer' data-position='description'></div><div class='ul-w-productCard__price price-small'><div data-type='value' data-raw='" . $product[5] . "'>" . $product[5] . "</div><div data-type='currency'>руб.</div></div><div class='ul-w-productCard__action'><span role='button' class='ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart' data-price-value='" . $product[5] . "' data-product-id='" . $product[0] . "' data-product-title='" . $product[1] . "' data-product-quantity='" . $product[8] . "' data-description-visible='true' data-button-style='ul-w-button1 middle' id='addGift_" . $product[0] . "'><div class='ul-w-productCard__action__button__caption'>Купить</div></span></div></a></div>";
                    $status = 1;

                    if ($itemCount == 30) {
                        $trigger = false;
                        $result .= '</div>';
                        $itemCount = 0;
                        $pageindex++;
                    }
                }

                mysqli_free_result($results);
                if ($trigger) {
                    $result .= '</div>';
                }
                if ($pageindex > 1) {
                    $result .= '<div class="text-center">';

                    for ($i = 1; $i <= $pageindex; $i++) {
                        $isActive = '';

                        if ($i == 1) {
                            $isActive = 'is-active';
                        }

                        $result .= '<span role="button" style="margin:25px 5px 0 5px; " class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart ' . $isActive . '" data-count="' . $pageindex . '" data-button-style="ul-w-button1 middle" id="pageFind_' . $i . '"><div class="ul-w-productCard__action__button__caption">' . $i . '</div></span>';
                    }

                    $result .= '</div>';
                }
            }

        } else if ($dataPost['statusCheaper'] != 0 || $dataPost['statusCheaper'] != 3 || $dataPost['statusNew'] != 0 || $dataPost['statusNew'] != 3) {
            $id = $dataPost['id'];

            require_once 'Gift.php';
            $gift = new Gift();

            $whereId = $gift->setWhereId($id);

            $orderBy = '';

            if ($dataPost['statusNew'] == 1) {
                $orderBy .= ' g.id DESC';
            } else if ($dataPost['statusNew'] == 2) {
                $orderBy .= ' g.id';
            }

            if ($dataPost['statusCheaper'] == 1) {
                if ($orderBy != '') {
                    $orderBy .= ',';
                }
                $orderBy .= ' des.price DESC';
            } else if ($dataPost['statusCheaper'] == 2) {
                if ($orderBy != '') {
                    $orderBy .= ',';
                }
                $orderBy .= ' des.price';
            }

            if ($orderBy != '') {
                $orderBy = ' ORDER BY' . $orderBy;
            }

            $where = ' WHERE ' . $whereId . $orderBy;
            $results = $gift->select($where);
            $status = 0;

            if ($results) {
                $pageindex = 1;
                $itemCount = 0;
                $trigger = false;

                while ($product = mysqli_fetch_array($results, MYSQLI_NUM)) {
                    if ($itemCount == 0) {
                        $trigger = true;
                        $style = '';

                        if ($pageindex != 1) {
                            $style = 'style="display:none"';
                        }

                        $result .= '<div class="row ul-row" id="pageNumberFind_' . $pageindex . '" ' . $style . '>';
                    }
                    $itemCount++;

                    $result .= "<div id='ul-id-2-" . $product[0] . "' class='col ul-col col-xs-12 col-sm-12 col-md-4'><a href='/product/" . $product[0] . "' id='ul-id-2-1' class='ul-widget ul-w-productCard js-w-productCard' data-controls='mer' data-widget='productCard' data-design='design-0' data-alignment='center'><div class='ul-w-productCard__picture'><img class='ul-w-productCard__picture__image js-w-productCard__picture__image' src=\"" . $product[8] . "\" alt='" . $product[1] . "' title='" . $product[1] . "'></div><div class='ul-w-productCard__title'><div class='ul-w-productCard__title__content h4'>" . $product[1] . "&nbsp;</div></div><div class='ul-w-productCard__description note'>" . $product[3] . "</div><div class='ul-w-productCard__spacer' data-position='description'></div><div class='ul-w-productCard__price price-small'><div data-type='value' data-raw='" . $product[5] . "'>" . $product[5] . "</div><div data-type='currency'>руб.</div></div><div class='ul-w-productCard__action'><span role='button' class='ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart' data-price-value='" . $product[5] . "' data-product-id='" . $product[0] . "' data-product-title='" . $product[1] . "' data-product-quantity='" . $product[8] . "' data-description-visible='true' data-button-style='ul-w-button1 middle' id='addGift_" . $product[0] . "'><div class='ul-w-productCard__action__button__caption'>Купить</div></span></div></a></div>";
                    $status = 1;

                    if ($itemCount == 30) {
                        $trigger = false;
                        $result .= '</div>';
                        $itemCount = 0;
                        $pageindex++;
                    }
                }

                mysqli_free_result($results);
                if ($trigger) {
                    $result .= '</div>';
                }
                if ($pageindex > 1) {
                    $result .= '<div class="text-center">';

                    for ($i = 1; $i <= $pageindex; $i++) {
                        $isActive = '';

                        if ($i == 1) {
                            $isActive = 'is-active';
                        }

                        $result .= '<span role="button" style="margin:25px 5px 0 5px; " class="ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart ' . $isActive . '" data-count="' . $pageindex . '" data-button-style="ul-w-button1 middle" id="pageFind_' . $i . '"><div class="ul-w-productCard__action__button__caption">' . $i . '</div></span>';
                    }

                    $result .= '</div>';
                }
            }
        }

        $result = json_encode($result);
        return '{"status":"' . $status . '","text":' . $result . '}';
    }

    public function generateGift($dataPost): string
    {
        $textForUser = '';
        $category = (int)$dataPost['isGift'];
        $dop_category = (int)$dataPost['isLove'];
        $budget = (int)$dataPost['budget'];
        switch ($category) {
            case 1:
                $textForUser = 'Каждая женщина радуется, получив в подарок необычные и оригинальные подарки. Если именно сейчас вы ломаете голову над тем что подарить, то обратитесь к нам.';
                break;
            case 2:
                $textForUser = 'Что подарить мужчине? Подарок должен быть полезным,индивидуальным и как минимум соответствовать 3 праздникам:Новый год,23 февраля,и конечно,День рождения.';
                break;
            case 3:
                $textForUser = 'Каждый с удовольствием вспоминает детство. Правильно подобранный подарок для ребёнка является крайне важным,так как игрушка станет спутником его детства.';
                break;
            case 4:
                $textForUser = 'Родители играют главную роль в нашей жизни. Преподнесенный вами подарок, заставит сердца ваших родных трепетать от счастья и гордости.';
                break;
            case 5:
                $textForUser = 'Выбрать подарок самым старшим членам семьи - дело крайне непростое. С ними у нас связаны наши самые счастливые воспоминания. Воплотим их мечты в жизнь вместе.';
                break;
            case 6:
                $textForUser = 'Порой хочется побаловать себя каким-то подарком, и это совершенно нормально явление. Все мы любим подарки и сюркпризы.';
                break;
        }
        switch ($dop_category) {
            case 1:
                $textForUser .= '<br>Все раньше играли в игрушки. Не так ли? Не важно сколько лет или кокой пол. Всегда приятно получить милую и приятную игрушку, темболее от дорогого человека.';
                break;
            case 2:
                $textForUser .= '<br>Практически каждый человек любит сладости. Сладкое повышает настроение и заставляет могш работать лучше. А если у человека диабеи или не переносимость сахара, то можно взять сладость, которые не содержат сахар.';
                break;
            case 3:
                if ($category != 2)
                    $textForUser .= '<br>У всех наверняка дома есть цветы. И они стоят там не спроста. Хороший букет или цветок, станет хорошим дополнением к основному подарку.';
                break;
        }

        require_once 'Gift.php';
        $gift = new Gift();

        switch ($dop_category) {
            case 1:
                $gift->category = $category;
                break;
            case 2:
                $gift->category = 7;
                break;
            case 3:
                $gift->category = 6;
                break;
            case 4:
                $gift->category = 0;
                break;
            case 5:
                $gift->category = $category;
                break;
            default:
                $gift->category = 0;
        }

        if ($category == 6)
            $gift->category = 7;

        $price = 0;
        $categoryId = 0;

        if ($gift->category) {
            $categoryId = ' g.categoryId = ' . $gift->category . '';

            if ($dop_category == 5)
                $categoryId = $gift->SetWhereId($gift->category);
        }

        switch ($budget) {
            case 1:
                $price = 0;
                break;
            case 2:
                $price = ' des.price <= 2000 ';
                break;
            case 3:
                $price = ' des.price <= 1000 ';
                break;
            case 4:
                $price = ' des.price <= 300 ';
                break;
        }

        $where = '';

        if ($categoryId) {
            $where = ' WHERE ' . $categoryId . ' ';
        }

        if ($price) {
            if ($where != '')
                $where .= ' AND ';
            else
                $where = ' WHERE ';

            $where .= $price;
        }

        $where .= ' ORDER BY RAND() LIMIT 6';

        $results = $gift->select($where);
        $status = 0;
        $result = '';

        if ($results) {
            $result .= $textForUser;
            while ($product = mysqli_fetch_array($results, MYSQLI_NUM)) {
                $result .= "<div id='ul-id-2-" . $product[0] . "' class='col ul-col col-xs-12 col-sm-12 col-md-4'><a href='/product/" . $product[0] . "' id='ul-id-3-" . $product[0] . "' class='ul-widget ul-w-productCard js-w-productCard' data-controls='mer' data-widget='productCard' data-design='design-0' data-alignment='center'><div class='ul-w-productCard__picture'><img class='ul-w-productCard__picture__image js-w-productCard__picture__image' src=\"" . $product[8] . "\" alt='" . $product[1] . "' title='" . $product[1] . "'></div><div class='ul-w-productCard__title'><div class='ul-w-productCard__title__content h4'>" . $product[1] . "&nbsp;</div></div><div class='ul-w-productCard__description note'>" . $product[3] . "</div><div class='ul-w-productCard__spacer' data-position='description'></div><div class='ul-w-productCard__price price-small'><div data-type='value' data-raw='" . $product[5] . "'>" . $product[5] . "</div><div data-type='currency'>руб.</div></div><div class='ul-w-productCard__action'><span role='button' class='ul-w-productCard__action__button ul-w-button1 middle js-w-productCard__to-cart' data-price-value='" . $product[5] . "' data-product-id='" . $product[0] . "' data-product-title='" . $product[1] . "' data-product-quantity='" . $product[8] . "' data-description-visible='true' data-button-style='ul-w-button1 middle' id='addGift_" . $product[0] . "'><div class='ul-w-productCard__action__button__caption'>Купить</div></span></div></a></div>";
                $status = 1;
            }
            mysqli_free_result($results);
        }

        $result = json_encode($result);
        return '{"status":"' . $status . '","text":' . $result . '}';
    }

    public function GetPopulationProduct()
    {
        $data = [];

        if ($this->db->getError()[0] == 1) {
            $sql = 'SELECT g.id, g.name, des.incomplete, des.full, des.price, g.img FROM gift g INNER JOIN description des ON des.id = g.descId ORDER BY g.orderCount DESC  LIMIT 5;';
            $data = $this->db->query($sql);
        }

        return $data;
    }

    public function GetResultCatalogGift($index, $limit = '', $orderBy = 'g.id, des.price')
    {

        if ($this->db->getError()[0] == 1) {
            if (is_int($index)) {
                require_once 'Gift.php';
                $gift = new Gift();

                $whereId = $gift->setWhereId($index);

                $sql = 'SELECT g.id, g.name, des.incomplete, des.full, des.price, g.img FROM gift g ';
                $sql .= ' INNER JOIN description des on des.id = g.descId WHERE ' . $whereId . '';
                $sql .= ' ORDER BY ' . $orderBy . ' ' . $limit . ';';
                $data = $this->db->query($sql);
            } else
                $data = [0, '<script>document.location.href = \'404.php\';</script>'];

        } else {
            $data = $this->db->getError();
        }

        return $data;
    }

    public function GetResultGift($index)
    {

        if ($this->db->getError()[0] == 1) {
            if (is_int($index)) {
                $sql = 'SELECT g.id, g.name, des.incomplete, des.full, des.price, g.img, g.imgcollection, g.categoryId FROM gift g INNER JOIN description des ON des.id = g.descId WHERE g.id = ' . $index . ' ';
                $data = $this->db->query($sql);
            } else
                $data = [0, '<script>document.location.href = \'404.php\';</script>'];

        } else {
            $data = $this->db->getError();
        }

        return $data;
    }

    public function allGift($limit = '')
    {

        if ($this->db->getError()[0] == 1) {
            $sql = 'SELECT g.id, g.name, des.incomplete, des.full, des.price, g.img, g.imgcollection, g.categoryId FROM gift g  INNER JOIN description des ON des.id = g.descId ORDER BY g.id DESC ' . $limit;
            $data = $this->db->query($sql);
        } else {
            $data = $this->db->getError();
        }

        return $data;
    }

}
