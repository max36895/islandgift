<?php
require_once 'Connect.php';

class Reviews
{
    public $id;
    public $userId;
    public $userName;
    public $userImg;
    public $order;
    public $comment;
    public $publication;
    protected $db;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    private function clear(): void
    {
        $this->id = 0;
        $this->userId = 0;
        $this->userName = '';
        $this->userImg = '';
        $this->order = 0;
        $this->comment = '';
        $this->publication = 0;
    }

    public function findEnd($trigger = 1): void
    {
        $sql = 'SELECT r.id,r.userId,r.name,u.img,r.order,r.comment,r.publication FROM `review` r LEFT JOIN `user` u ON r.userId = u.id ORDER BY id DESC LIMIT 1';

        if ($trigger)
            $this->clear();

        $datas = $this->db->query($sql);

        if ($datas) {

            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->id = $data[0];

            if ($trigger) {
                $this->userId = $data[1];
                $this->userName = $data[2];
                $this->userImg = $data[3];
                $this->order = $data[4];
                $this->comment = $data[5];
                $this->publication = $data[6];
            }

            mysqli_free_result($datas);
        }
    }

    public function selectWhere($where = 'WHERE 1')
    {
        $sql = 'SELECT r.id,r.userId,u.name,u.img,r.order,r.comment,r.publication FROM `review` r LEFT JOIN `user` u ON r.userId = u.id ' . $where . ' ';
        return $this->db->query($sql);
    }

    public function select($limit = 5)
    {
        $sql = 'SELECT r.id,r.userId,r.name,u.img,r.order,r.comment,r.publication FROM `review` r LEFT JOIN `user` u ON r.userId = u.id ORDER BY RAND() LIMIT ' . $limit;
        return $this->db->query($sql);
    }

    public function update(): array
    {
        try {
            $set = '`userId` = ' . $this->userId . ', `order` = ' . $this->order . ', `comment` = "' . $this->comment . '",`publication` = ' . $this->publication . '';
            $this->db->update('`review`', $set, 'id = ' . $this->id);

            return [0, 'Информация успешно изменена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function insert(): array
    {
        try {
            $into = ' `review`(`userId`,`name`, `order`, `comment`, `publication`)';
            $value = ' (' . $this->userId . ',"' . $this->userName . '",' . $this->order . ',"' . $this->comment . '",' . $this->publication . ')';
            $this->db->insert($into, $value);

            return [0, 'Отзыв успешно добавлен'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function delete(): array
    {
        try {
            $this->db->delete('`review`', 'id = ' . $this->id . ' ;');
            return [0, 'Отзыв успешно удален'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }
}