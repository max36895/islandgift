<?php
require_once 'Connect.php';

class User
{
    private $db;

    public $login;
    public $password;
    public $mail;
    public $phone;
    public $admin;

    public $cityId;
    public $city;

    public $loginId;
    public $id;
    public $name;
    public $surname;
    public $patronymic;
    public $sex;
    public $birthday;
    public $about;
    public $img;

    public function __construct()
    {
        $this->db = new Connect();
        $this->clear();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    private function clear(): void
    {
        $this->id = 0;
        $this->name = 0;
        $this->surname = 0;
        $this->patronymic = 0;
        $this->cityId = 0;
        $this->city = 0;
        $this->birthday = 0;
        $this->about = 0;
        $this->img = 0;
        $this->login = 0;
        $this->password = 0;
        $this->mail = 0;
        $this->phone = 0;
        $this->admin = 0;
    }

    public function selectUserLike(): void
    {
        $this->id = 0;
        $select = 'u.id,u.name,u.surname,u.patronymic,s.id,s.city,u.birthday,u.about,u.img,l.login,l.password,l.mail,l.phone,u.sex,l.admin';
        $param = 'INNER JOIN city s ON s.id = u.city INNER JOIN login l ON l.id = u.id WHERE l.login LIKE "%' . $this->login . '%" ORDER BY u.id DESC LIMIT 1';
        $datas = $this->db->select($select, 'user u', $param);

        if ($datas && mysqli_num_rows($datas)) {

            while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
                $this->id = $data[0];
                $this->name = $data[1];
                $this->surname = $data[2];
                $this->patronymic = $data[3];
                $this->cityId = $data[4];
                $this->city = $data[5];
                $this->birthday = $data[6];
                $this->about = $data[7];
                $this->img = $data[8];
                $this->login = $data[9];
                $this->password = $data[10];
                $this->mail = $data[11];
                $this->phone = $data[12];
                $this->sex = $data[13];
                $this->admin = $data[14];
            }

        }
    }

    public function select($sql)
    {
        return $this->db->query($sql);
    }

    public function selectUser($trigger = 1): void
    {

        $this->id = 0;
        $select = 'u.id,u.name,u.surname,u.patronymic,s.id,s.city,u.birthday,u.about,u.img,l.login,l.password,l.mail,l.phone,u.sex,l.admin';
        $param = 'INNER JOIN city s ON s.id = u.city INNER JOIN login l ON l.id = u.login WHERE binary l.login = "' . $this->login . '" ORDER BY u.id LIMIT 1';
        $datas = $this->db->select($select, 'user u', $param);

        if ($datas) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->id = $data[0];

            if ($trigger) {
                $this->name = $data[1];
                $this->surname = $data[2];
                $this->patronymic = $data[3];
                $this->cityId = $data[4];
                $this->city = $data[5];
                $this->birthday = $data[6];
                $this->about = $data[7];
                $this->img = $data[8];
                $this->login = $data[9];
                $this->password = $data[10];
                $this->mail = $data[11];
                $this->phone = $data[12];
                $this->sex = $data[13];
                $this->admin = $data[14];
            }

            mysqli_free_result($datas);
        }
    }

    private function isCity(): void
    {
        $dataCity = $this->db->select('*', '`city`', 'WHERE city =  "' . $this->city . '"');

        if ($dataCity) {
            if (mysqli_num_rows($dataCity)) {
                $dat = mysqli_fetch_array($dataCity, MYSQLI_NUM);
                $this->cityId = $dat[0];
                mysqli_free_result($dataCity);
            } else {
                $this->cityId = $this->db->insert('`city`(`city`)', '("' . $this->city . '")');
            }
        }
    }

    private function isLoginId(): void
    {
        $dataLogin = $this->db->select('login', '`user`', 'WHERE id = ' . $this->id . '');

        if ($dataLogin) {
            $dat = mysqli_fetch_array($dataLogin, MYSQLI_NUM);
            $this->loginId = $dat[0];
            mysqli_free_result($dataLogin);
        }
    }

    public function updateUser(): array
    {
        try {
            $this->isCity();
            $this->isLoginId();
            $set = '`login` = "' . $this->login . '",`password` = "' . $this->password . '",`mail` = "' . $this->mail . '",`phone` = "' . $this->phone . '", `admin` = ' . $this->admin . '';
            $this->db->update('`login`', $set, '`id` = ' . $this->loginId);

            $set = '`sex` = ' . $this->sex . ', `name` = "' . $this->name . '", `surname` = "' . $this->surname . '",`patronymic` = "' . $this->patronymic . '", `city` = ' . $this->cityId . ',`birthday` = "' . $this->birthday . '", `about` = "' . $this->about . '",`img` = "' . $this->img . '", `login` = ' . $this->loginId . '';
            $this->db->update('`user`', $set, '`id` = ' . $this->id);

            return [0, 'Информация успешно изменена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function insertUser(): array
    {
        try {

            $this->isCity();

            $into = '`login`(`login`,`password`,`mail`,`phone`, `admin`)';
            $value = '("' . $this->login . '","' . $this->password . '", "' . $this->mail . '","' . $this->phone . '",0)';
            $this->loginId = $this->db->insert($into, $value);

            $into = '`user`(`name`, `surname`, `patronymic`, `sex`, `city`, `birthday`, `about`, `img`, `login`)';
            $value = '("' . $this->name . '","' . $this->surname . '", "' . $this->patronymic . '",' . $this->sex . ',' . $this->cityId . ',"' . $this->birthday . '","' . $this->about . '","' . $this->img . '",' . $this->loginId . ')';
            $this->db->insert($into, $value);

            return [0, 'Информация успешно добавлена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }

    public function deleteUser(): array
    {
        try {
            $this->isLoginId();
            $this->db->delete('`login`', '`id` = ' . $this->loginId . ' ;');
            $this->db->delete('`user`', '`id` = ' . $this->id . ' ;');

            return [0, 'Информация успешно удалена'];
        } catch (Exception $e) {
            return [1, $e->getMessage()];
        }
    }
}