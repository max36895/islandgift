<?php
require_once 'Connect.php';

class Order
{
    public $db;
    public $id;
    public $userId;
    public $name;
    public $mail;
    public $fullPrice;
    public $dateIn;
    public $state;
    public $dateOut;
    public $shipping;
    public $comment;

    public $giftId;
    public $giftName;
    public $incomplete;
    public $count;
    public $price;

    public function selectOrderUser()
    {
        $sql = 'SELECT o.id, o.userId, o.fullPrice, o.dateIn, o.state, o.dateOut, o.shipping, o.comment, g.id, g.name, d.incomplete, og.count, og.price, o.name, o.mail, g.img ';
        $sql .= ' FROM `order` o ';
        $sql .= ' INNER JOIN `orderGift` og ON og.orderId = o.id ';
        $sql .= ' INNER JOIN `gift` g ON og.giftId = g.id ';
        $sql .= ' INNER JOIN `description` d ON d.Id = g.descid ';
        $sql .= ' WHERE o.userId = ' . $this->userId . ' ';
        $sql .= ' ORDER BY o.dateIn DESC ';

        return $this->db->query($sql);
    }

    public function selectOrder()
    {
        $sql = 'SELECT o.id, o.userId, o.fullPrice, o.dateIn, o.state, o.dateOut, o.shipping, o.comment, g.id, g.name, d.incomplete, og.count, og.price, o.name, o.mail ';
        $sql .= ' FROM `order` o ';
        $sql .= ' INNER JOIN `orderGift` og ON og.orderId = o.id ';
        $sql .= ' INNER JOIN `gift` g ON og.giftId = g.id ';
        $sql .= ' INNER JOIN `description` d ON d.Id = g.descid ';
        $sql .= ' WHERE o.id = ' . $this->id . ' ';
        $sql .= ' ORDER BY o.dateIn DESC';
        $datas = $this->db->query($sql);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->id = $data[0];
            $this->userId = $data[1];
            $this->fullPrice = $data[2];
            $this->dateIn = $data[3];
            $this->state = $data[4];
            $this->dateOut = $data[5];
            $this->shipping = $data[6];
            $this->comment = $data[7];
            $this->giftId = $data[8];
            $this->giftName = $data[9];
            $this->incomplete = $data[10];
            $this->count = $data[11];
            $this->price = $data[12];
            $this->name = $data[13];
            $this->mail = $data[14];
            mysqli_free_result($datas);
        }

        return $datas;
    }

    public function selectAllGiftOrder()
    {
        $sql = 'SELECT o.id, o.userId, o.fullPrice, o.dateIn,o.state,o.dateOut,o.shipping, o.comment, g.id,g.name,d.incomplete,og.count,og.price, o.name, o.mail ';
        $sql .= ' FROM `order` o ';
        $sql .= ' INNER JOIN `orderGift` og ON og.orderId = o.id ';
        $sql .= ' INNER JOIN `gift` g ON og.giftId = g.id ';
        $sql .= ' INNER JOIN `description` d ON d.Id = g.descid ';
        $sql .= ' WHERE o.id = ' . $this->id . ' ';
        $sql .= ' ORDER BY o.dateIn DESC';

        return $this->db->query($sql);
    }

    public function selectAllOrder()
    {
        $sql = 'SELECT o.id, n.login, o.fullprice, o.dateIn, o.state, o.dateOut, o.shipping, o.comment, o.name, o.mail FROM `order`o LEFT JOIN `user` n ON o.userId = n.id';
        $sql .= ' ORDER BY id DESC';

        return $this->db->query($sql);
    }

    public function selectOrderEndAll($triget = 1): void
    {
        $this->id = 0;
        $sql = ' SELECT o.id, o.userId, o.fullPrice, o.dateIn,o.state,o.dateOut,o.shipping, o.comment, og.id,g.name,d.incomplete,og.count,og.price, o.name, o.mail ';
        $sql .= ' FROM `order` o ';
        $sql .= ' INNER JOIN `orderGift` og ON og.orderId = o.id';
        $sql .= ' INNER JOIN `gift` g ON og.giftId = g.id ';
        $sql .= ' INNER JOIN `description` d ON d.Id = g.descid ';
        $sql .= ' ORDER BY o.dateIn DESC ';

        $datas = $this->db->query($sql);

        if ($datas) {

            while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                $this->id = $data[0];

                if ($triget) {
                    $this->userId = $data[1];
                    $this->fullPrice = $data[2];
                    $this->dateIn = $data[3];
                    $this->state = $data[4];
                    $this->dateOut = $data[5];
                    $this->shipping = $data[6];
                    $this->comment = $data[7];

                    $this->giftId = $data[8];
                    $this->giftName = $data[9];
                    $this->incomplete = $data[10];
                    $this->count = $data[11];
                    $this->price = $data[12];
                    $this->name = $data[13];
                    $this->mail = $data[14];
                }
            }

            mysqli_free_result($datas);
        }
    }

    public function selectOrderEndId(): void
    {
        $this->id = 0;
        $sql = 'SELECT * FROM `order` ORDER BY id DESC LIMIT 1';
        $datas = $this->db->query($sql);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->id = $data[0];
            mysqli_free_result($datas);
        }
    }

    public function selectOrderWhere($where = ''): void
    {
        $sql = 'SELECT * FROM `order` ' . $where . ' LIMIT 1';
        $datas = $this->db->query($sql);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->userId = $data[1];
            $this->fullPrice = $data[2];
            $this->dateIn = $data[3];
            $this->state = $data[4];
            $this->dateOut = $data[5];
            $this->shipping = $data[6];
            $this->comment = $data[7];
            mysqli_free_result($datas);
        }
    }

    public function insertOrder(): int
    {
        try {
            $this->dateIn = date('Y-m-d');

            $into = '`order`(`userId`,`fullPrice`,`dateIn`,`state`,`dateOut`,`shipping`,`comment`, `name`, `mail`)';
            $value = '("' . $this->userId . '","' . $this->fullPrice . '","' . $this->dateIn . '",1,"0000-00-00","' . $this->shipping . '","' . $this->comment . '"
            ,"' . $this->name . '","' . $this->mail . '")';
            $this->id = $this->db->insert($into, $value);

            $giftAll = $this->getOrderTmp();

            foreach ($giftAll as $gift) {
                $into = '`orderGift`(`orderId`,`giftId`,`count`,`price`)';
                $value = '("' . $this->id . '","' . $gift[1] . '","' . $gift[2] . '","' . $gift[5] . '")';
                $this->db->insert($into, $value);
            }

            return 1;
        } catch (Exception $e) {
            return 0;
        }
    }

    public function updateOrder(): array
    {
        try {
            $this->dateOut = date('Y-m-d');

            $set = '`state` = ' . $this->state . ', `dateOut` = "' . $this->dateOut . '"';
            $this->db->update('`order`', $set, 'id = ' . $this->id);

            return [0, 'Информация успешно изменена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteOrder(): array
    {
        try {
            $this->db->delete('`orderGift`', 'orderId = ' . $this->id);
            $this->db->delete('`order`', 'id = ' . $this->id);

            return [0, 'Информация успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function getOrderTmp(): array
    {
        $data = [];
        $id = $_COOKIE['id'];
        $fullPrice = $_COOKIE['price'];
        $fullCount = $_COOKIE['count'];

        $tmpId = explode(':', $id);

        $i = 0;

        foreach ($tmpId as $tmp) {
            $dataid = explode(';', $tmp);
            $data[$i] = [1 => $dataid[0], 2 => $dataid[1], 3 => $dataid[2], 4 => $dataid[3], 5 => $dataid[4], 6 => $fullPrice, 7 => $fullCount];
            $i++;
        }
        // 1-id
        // 2-количество
        // 3-картинка
        // 4-наименование
        // 5-цена
        // 6-полная цена
        // 7-полное количество
        return $data;
    }

    public function isOrder(): int
    {
        if (isset($_COOKIE['id'], $_COOKIE['price'], $_COOKIE['count'])) {
            return 1;
        }

        return 0;
    }

    public function isOrderCache(): array
    {
        if (isset($_COOKIE['id'], $_COOKIE['price'], $_COOKIE['count'])) {
            return [0 => $_COOKIE['price'], 1 => $_COOKIE['count']];
        }

        return [0, 0];
    }

    public function orderAddproduct($id, $price, $img, $name): array
    {
        $count = 1;
        $idTxt = '';
        $idPrice = $price;
        $idCount = 1;
        $countMax = false;

        if (isset($_COOKIE['id'])) {
            $tmpId = explode(':', $_COOKIE['id']);
            $res = '';

            foreach ($tmpId as $dataIds) {
                $dataId = explode(';', $dataIds);
                $count = $dataId[1];

                if ($dataId[0] == $id) {
                    $count = $dataId[1];
                    if($count < 99){
                        $count++;
                        $dataId[4] += $price;
                    }else {
                        $price = 0;
                        $countMax = true;
                    }
                    $idPrice = $dataId[4];
                    $idCount = $count;
                }

                $res .= $dataId[0] . ';' . $count . ';' . $dataId[2] . ';' . $dataId[3] . ';' . $dataId[4] . ':';
            }

            $count = 1;

            if ($idCount >= 2) {
                $idTxt = substr($res, 0, -1);
            } else
                $idTxt = $_COOKIE['id'] . ':' . $id . ';' . $count . ';' . $img . ';' . $name . ';' . $price . '';

        } else {
            $idTxt = $id . ';' . $count . ';' . $img . ';' . $name . ';' . $price;
        }

        setcookie('id', $idTxt, 0, '/');

        if (isset($_COOKIE['price'])) {
            $price = (int)$_COOKIE['price'] + $price;
        }

        setcookie('price', $price, 0, '/');

        $cCount = 1;

        if (isset($_COOKIE['count'])) {
            $cCount = (int)$_COOKIE['count'];
            if(!$countMax)
                $cCount += 1;
        }

        setcookie('count', $cCount, 0, '/');

        return [0 => $price, 1 => $cCount, 2 => $idPrice, 3 => $idCount, 4 => $idTxt, 5 => $countMax];
    }

    public function orderRemoveProduct($id, $price): array
    {
        $count = 99999;
        $idCount = 1;
        $idPrice = 0;
        $idText = '';

        if (isset($_COOKIE['id'])) {
            $tmpId = explode(':', $_COOKIE['id']);
            $res = '';

            foreach ($tmpId as $dataIds) {
                $dataId = explode(';', $dataIds);
                $count = $dataId[1];

                if ($dataId[0] == $id) {
                    $count = (int)$dataId[1] - 1;
                    $dataId[4] -= $price;
                    $idPrice = $dataId[4];
                    $idCount = $count;
                }

                if ($count > 0) {
                    $res .= $dataId[0] . ';' . $count . ';' . $dataId[2] . ';' . $dataId[3] . ';' . $dataId[4] . ':';
                }

            }

            $idText = substr($res, 0, -1);
        }

        setcookie('id', $idText, 0, '/');

        if (isset($_COOKIE['price'])) {
            $price = (int)$_COOKIE['price'] - $price;
        }

        if ($price < 0) {
            $price = 0;
        }

        setcookie('price', $price, 0, '/');
        $cCount = 0;

        if (isset($_COOKIE['count'])) {
            $cCount = (int)$_COOKIE['count'] - 1;
        }

        if ($cCount < 0)
            $cCount = 0;

        setcookie('count', $cCount, 0, '/');

        return [0 => $price, 1 => $cCount, 2 => $idPrice, 3 => $idCount, 4 => $idText];
    }

    public function orderRemoveProductAll($id, $price): array
    {
        $count = 99999;
        $idCount = 1;
        $idPrice = 0;
        $idText = '';

        if (isset($_COOKIE['id'])) {
            $tmpId = explode(':', $_COOKIE['id']);
            $res = '';

            foreach ($tmpId as $dataIds) {
                $dataId = explode(';', $dataIds);
                $count = $dataId[1];

                if ($dataId[0] == $id) {
                    $idPrice = $dataId[4];
                    $idCount = $dataId[1];
                    $count = 0;
                }

                if ($count > 0) {
                    $res .= $dataId[0] . ';' . $count . ';' . $dataId[2] . ';' . $dataId[3] . ';' . $dataId[4] . ':';
                }

            }

            $idText = substr($res, 0, -1);
        }

        setcookie('id', $idText, 0, '/');

        if (isset($_COOKIE['price'])) {
            $price = (int)$_COOKIE['price'] - $idPrice;
        }

        if ($price < 0) {
            $price = 0;
        }

        setcookie('price', $price, 0, '/');

        $cCount = 0;

        if (isset($_COOKIE['count'])) {
            $cCount = (int)$_COOKIE['count'] - $idCount;
        }

        if ($cCount < 0)
            $cCount = 0;

        setcookie('count', $cCount, 0, '/');

        return [0 => $price, 1 => $cCount, 2 => $idPrice, 3 => $idCount, 4 => $idText];
    }

    public function orderRemoveAllProduct(): void
    {
        setcookie('id', '', time() - 3600, ' / ');
        setcookie('price', '', time() - 3600, ' / ');
        setcookie('count', '', time() - 3600, ' / ');
    }
}
