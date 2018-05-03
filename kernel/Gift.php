<?php
require_once 'Img.php';

class Gift extends Img
{

    public $id;
    public $name;
    public $category;
    public $incomplete;
    public $full;
    public $price;
    public $count;
    public $orderCount;
    public $img;
    public $imgCollection;

    public $whereId;

    public function setWhereId($id)
    {
        $whereId = '';
        switch ($id) {
            case 0:
                $whereId = ' 1 ';
                break;
            case 1:
                $whereId = ' ( g.categoryId = 1 OR g.categoryId = 9 ) ';
                break;
            case 2:
                $whereId = ' ( g.categoryId = 2 OR g.categoryId = 9  ) ';
                break;
            case 3:
                $whereId = ' ( g.categoryId = 3 OR g.categoryId = 9 ) ';
                break;
            case 4:
                $whereId = ' ( g.categoryId = 4 OR g.categoryId = 9 ) ';
                break;
            case 5:
                $whereId = ' ( g.categoryId = 5 OR g.categoryId = 9 ) ';
                break;
            case 6:
                $whereId = ' g.categoryId = 6';
                break;
            case 7:
                $whereId = ' g.categoryId = 7';
                break;
            case 8:
                $whereId = ' g.categoryId = 8';
                break;
            case 9:
                $whereId = ' g.categoryId = 9';
                break;
        }
        return $whereId;
    }

    private function clear()
    {
        $this->id = 0;
        $this->name = 0;
        $this->category = 0;
        $this->incomplete = 0;
        $this->full = 0;
        $this->price = 0;
        $this->count = 0;
        $this->orderCount = 0;
        $this->img = 0;
        $this->imgCollection = 0;
    }

    public function findEnd()
    {
        $sql = 'SELECT id FROM gift ORDER BY id DESC LIMIT 1';
        $datas = $this->db->query($sql);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->id = $data[0];
            mysqli_free_result($datas);
        }

        return $this->id + 1;
    }

    public function findGift($name)
    {
        if ($name) {
            $this->clear();
            $sql = 'SELECT g.id, g.name,g.categoryId,des.incomplete,des.full,des.price,des.count,g.orderCount,g.img FROM gift g  INNER JOIN description des ON des.id = g.descId WHERE g.name = ' . $name . ' ORDER BY id DESC LIMIT 1';

            $datas = $this->db->query($sql);

            if ($datas) {
                $data = mysqli_fetch_array($datas, MYSQLI_NUM);
                $this->id = $data[0];
                $this->name = $data[1];
                $this->category = $data[2];
                $this->incomplete = $data[3];
                $this->full = $data[4];
                $this->price = $data[5];
                $this->count = $data[6];
                $this->orderCount = $data[7];
                $this->img = $data[8];
            }

            mysqli_free_result($datas);
        }
    }

    public function select($where = 'WHERE 1')
    {
        $sql = 'SELECT g.id, g.name,g.categoryId,des.incomplete,des.full,des.price,des.count,g.orderCount,g.img FROM gift g  INNER JOIN description des ON des.id = g.descId ' . $where . ' ';
        return $this->db->query($sql);
    }

    public function selectGiftNameAll($name)
    {
        if ($name) {
            $this->clear();
            $sql = 'SELECT g.id, g.name,g.categoryId,des.incomplete,des.full,des.price,des.count,g.orderCount,g.img FROM gift g  INNER JOIN description des ON des.id = g.descId WHERE g.name LIKE "%' . $name . '%" ORDER BY id DESC';
            return $this->db->query($sql);
        }

        return $this->selectGiftIdAll();
    }

    public function selectGiftIdAll()
    {
        $sql = 'SELECT g.id, g.name,g.categoryId,des.incomplete,des.full,des.price,des.count,g.orderCount,g.img FROM gift g  INNER JOIN description des ON des.id = g.descId ORDER BY g.id DESC';

        return $this->db->query($sql);
    }

    public function selectGift()
    {
        $sql = 'SELECT g.id, g.name,g.categoryId,des.incomplete,des.full,des.price,des.count,g.orderCount,g.img FROM gift g  INNER JOIN description des ON des.id = g.descId WHERE g.id = ' . $this->id . ' ORDER BY g.id DESC LIMIT 1';

        $datas = $this->db->query($sql);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->name = $data[1];
            $this->category = $data[2];
            $this->incomplete = $data[3];
            $this->full = $data[4];
            $this->price = $data[5];
            $this->count = $data[6];
            $this->orderCount = $data[7];
            $this->img = $data[8];
            mysqli_free_result($datas);
        }
    }

    protected function sqlCheck()
    {
        $find = ["\n", "\"", '--',];
        $replase = ["\\n", "\\\"", '',];

        $this->id = str_replace($find, $replase, $this->id);
        $this->name = str_replace($find, $replase, $this->name);
        $this->category = str_replace($find, $replase, $this->category);
        $this->incomplete = str_replace($find, $replase, $this->incomplete);
        $this->full = str_replace($find, $replase, $this->full);
        $this->price = str_replace($find, $replase, $this->price);
        $this->count = str_replace($find, $replase, $this->count);
        $this->orderCount = str_replace($find, $replase, $this->orderCount);
        $this->img = str_replace($find, $replase, $this->img);
    }

    protected function selectDesc($id)
    {
        $desc = $this->db->select('descId', '`gift`', ' WHERE id =' . $id . ' ORDER BY id DESC LIMIT 1');

        $data = mysqli_fetch_array($desc, MYSQLI_NUM);
        mysqli_free_result($desc);

        return $data[0];
    }

    protected function selectCollectImg($id)
    {
        $desc = $this->db->select('imgcollection,img', '`gift`', ' WHERE id =' . $id . ' ORDER BY id DESC LIMIT 1');

        $data = mysqli_fetch_array($desc, MYSQLI_NUM);
        mysqli_free_result($desc);

        return $data;
    }

    protected function deleteImage($img)
    {
        unlink($img);
    }

    public function updateGift()
    {
        try {
            $descId = $this->selectDesc($this->id);
            $this->sqlCheck();
            $set = '`categoryId` = ' . $this->category . ', `descId` = ' . $descId . ', `name` = "' . $this->name . '",`img` = "' . $this->img . '", `orderCount` = ' . $this->orderCount . ',`imgcollection` = ' . $this->imgCollection . '';
            $this->db->update('`gift`', $set, 'id = ' . $this->id);

            $set = '`incomplete` = "' . $this->incomplete . '", `full` = "' . $this->full . '",`price` = ' . $this->price . ', `count` = ' . $this->count . '';
            $this->db->update('`description`', $set, 'id = ' . $descId);

            return [0, 'Информация успешно изменена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteGift()
    {
        try {
            $descId = $this->selectDesc($this->id);
            $data = $this->selectCollectImg($this->id);
            $this->imgCollect = $data[0];

            if ($this->imgCollect != 0) {
                $this->deleteCollection();
            }

            $this->deleteImage($data[1]);
            $this->db->delete('`description`', 'id = ' . $descId . ' ;');
            $this->db->delete('`gift`', 'id = ' . $this->id . ' ;');

            return [0, 'Товар успешно удален'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function insertGift()
    {
        try {
            $this->sqlCheck();
            $into = '`description`(`incomplete`, `full`, `price`, `count`)';
            $value = '("' . $this->incomplete . '","' . $this->full . '",' . $this->price . ',' . $this->count . ')';
            $this->id = $this->db->insert($into, $value);

            $into = '`gift`(`categoryId`, `descId`, `name`, `img`, `orderCount`, `imgcollection`)';
            $value = '(' . $this->category . ',' . $this->id . ',"' . $this->name . '","' . $this->img . '", ' . $this->orderCount . ',' . $this->imgCollection . ')';
            $this->db->insert($into, $value);

            return [0, 'Товар успешно добавлен'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function updateImg($fileEnd)
    {
        try {
            if (!copy('../product/tmp/' . $this->img, '../product/img/' . $this->img)) {
                $fileError = fopen('../error/gift.log', 'a');

                $text = ' ';
                $text .= date('Y-m-d H:i:s');
                $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                $text .= '../product/tmp/' . $this->img . ' <-prev: gift-> ' . '../product/img/' . $this->img;
                $text .= " Ошибка загрузки файла.\n";

                fwrite($fileError, $text);
                fclose($fileError);
            } else {
                if($fileEnd != '../product/img/'.$this->img) {
                    if (file_exists($fileEnd))
                        unlink($fileEnd);
                }
                if (file_exists('../product/tmp/' . $this->img))
                    unlink('../product/tmp/' . $this->img);
            }

            $this->sqlCheck();
            $set = '`img` = "../product/img/' . $this->img . '"';
            $this->db->update('`gift`', $set, 'id = ' . $this->id);

            return [0, 'картинка успешно обновлена'];

        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }
}
