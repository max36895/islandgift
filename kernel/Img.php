<?php
require_once 'Connect.php';

class Img
{
    public $imgId;
    public $imgCollect;
    public $images = [];

    protected $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function createDir($standartDir = '../product/collection/', $trigger = true)
    {

        $dir = $standartDir;

        if ($trigger)
            $dir .= $this->imgCollect;

        if (!is_dir($dir)) {
            if (!mkdir($dir) && !is_dir($dir)) {
                return 0;
            }
        }

        return $dir;
    }

    protected function deleteImg($imgDel): void
    {
        if (file_exists($imgDel))
            unlink($imgDel);
    }

    protected function deleteDir($standartDir = '../product/collection/', $trigger = true): int
    {
        $dir = $standartDir;

        if ($trigger)
            $dir .= $this->imgCollect;

        if (is_dir($dir)) {
            if (rmdir($dir)) {
                return 1;
            }
        }

        return 0;
    }

    public function insertCollection(): array
    {
        try {
            $into = '`img`(`imgcollection`,`img`)';

            $countImage = count($this->images);

            for ($i = 0; $i < $countImage; $i++) {
                $value = '("' . $this->imgCollect . '","' . $this->images[$i] . '")';
                $this->db->insert($into, $value);
            }

            return [0, 'Коллекция успешно добавлена'];

        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function updateCollection()
    {
        try {
            $this->insertCollection();
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function updateImgCollection(): array
    {
        try {
            $datas = $this->selectWhereCollection('WHERE `id` = "' . $this->imgId . '"');

            if ($datas && mysqli_num_rows($datas)) {
                $data = mysqli_fetch_array($datas, MYSQLI_NUM);
                $this->imgId = $data[0];
                $this->deleteImg($data[2]);
                $this->db->delete('`img`', 'img = "' . $this->images[0] . '" ;');
                mysqli_free_result($datas);
            }

            $into = '`img`(`imgcollection`,`img`)';
            $value = '("' . $this->imgCollect . '","' . $this->images[0] . '")';
            $this->db->insert($into, $value);

            return [0, 'Картинка(и) успешно изменена(ы)'];

        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteCollection($standartDir = '../product/collection/', $trigger = true): array
    {
        try {
            $this->deleteDir($standartDir, $trigger);
            $this->db->delete('`img`', 'imgcollection = "' . $this->imgCollect . '" ;');

            return [0, 'Коллекция успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteCollectionId(): array
    {
        try {
            $imgs = $this->selectWhereCollection('WHERE `imgcollection` = "' . $this->imgId.'"');
            if ($imgs) {
                while ($img = mysqli_fetch_array($imgs, MYSQLI_NUM)) {
                    $this->deleteImg($img[2]);
                    $this->db->delete('`img`', 'id = ' . $this->imgId . ' ;');
                }
                mysqli_free_result($imgs);
            }
            $this->db->update('`articles`', '`imgCollectionId` = 0', '`imgCollectionId` = "' . $this->imgId . '"');
            $this->db->update('`gift`', '`imgcollection` = 0', '`imgcollection` = "' . $this->imgId . '"');

            return [0, 'Коллекция успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteImgCollection($standartDir = '../product/collection/'): array
    {
        try {
            $this->deleteImg($standartDir . $this->images[0]);
            $this->db->delete('`img`', 'img = "' . $this->images[0] . '" ;');

            return [0, 'картинка успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteImgCollectionId(): array
    {
        try {
            $imgs = $this->selectWhereCollection('WHERE `id` = ' . $this->imgId);
            if ($imgs) {
                $img = mysqli_fetch_array($imgs, MYSQLI_NUM);
                $this->deleteImg($img[2]);
                $this->db->delete('`img`', 'id = ' . $this->imgId . ' ;');
                mysqli_free_result($imgs);
            }
            return [0, 'картинка успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function selectCollection()
    {
        return $this->db->select('*', '`img`', ' WHERE imgcollection = "' . $this->imgCollect . '" ;');
    }

    public function selectCollectionLike()
    {
        return $this->db->select('*', '`img`', ' WHERE imgcollection LIKE "%' . $this->imgCollect . '%" ;');
    }

    public function selectWhereCollection($where = 'WHERE 1')
    {
        return $this->db->select('*', '`img`', $where . '');
    }
}

if (isset($_FILES['fileCollection'])) {

    if (0 < $_FILES['fileCollection']['error']) {
        echo '{"Error": "' . $_FILES['fileCollection']['error'] . '","file":"-1"}';
    } else {
        $file_name = $_FILES['fileCollection']['name'];
        $file_dir = '../collection/tmp/' . $_FILES['fileCollection']['name'];
        $file_dir = str_replace(' ', '_', $file_dir);
        move_uploaded_file($_FILES['fileCollection']['tmp_name'], $file_dir);
        echo '{"file":"' . $file_name . '"}';
    }
}