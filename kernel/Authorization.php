<?php
session_start();
require_once 'User.php';

class Authorization
{
    public $userName;
    public $name;
    public $surname;
    public $patronymic;
    public $userid;
    public $avtTriger;

    private $db;
    public $userDb;

    public function __construct()
    {
        $this->userDb = new User();
        $this->db = new Connect();

        if (isset($_COOKIE['avtSession'])) {
            $this->userName = $_COOKIE['userSession'];
            $nameS = explode(' ', $_COOKIE['fullnameSession']);
            $this->name = $nameS[1];
            $this->surname = $nameS[0];
            $this->patronymic = $nameS[2];
            $this->userid = $_COOKIE['idSession'];
            $this->userDb->login = $this->userName;
            $this->userDb->selectUser();
            $this->avtTriger = true;
        } else {
            $this->avtTriger = false;
        }
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function getUserName()
    {
        if ($this->avtTriger) {
            return $this->userName;
        }
        return 0;
    }

    public function isLogin($login): string
    {
        $this->userDb->login = $login;
        $this->userDb->selectUser();

        $data = '{"status": ';

        if ($this->userDb->id > 0) {
            $data .= '"0","text": "Данное имя уже занято","r":"' . $this->userDb->id . '"';
        } else {
            $data .= '"1","text": "Данное имя свободно","r":"' . $this->userDb->id . '"';
        }

        $data .= '}';
        return $data;
    }

    public function notSqlIngection(): void
    {
        $find = ["\n", "\"", "'",];
        $replase = ["\\n", "\\\"", "\'",];

        $this->userDb->patronymic = str_replace($find, $replase, $this->userDb->patronymic);
        $this->userDb->birthday = str_replace($find, $replase, $this->userDb->birthday);
        $this->userDb->surname = str_replace($find, $replase, $this->userDb->surname);
        $this->userDb->login = str_replace($find, $replase, $this->userDb->login);
        $this->userDb->phone = str_replace($find, $replase, $this->userDb->phone);
        $this->userDb->name = str_replace($find, $replase, $this->userDb->name);
        $this->userDb->city = str_replace($find, $replase, $this->userDb->city);
        $this->userDb->mail = str_replace($find, $replase, $this->userDb->mail);
        $this->userDb->sex = str_replace($find, $replase, $this->userDb->sex);
    }

    public function registrationVk(): string
    {
        $this->userDb->patronymic = ' ';
        $this->userDb->password = (string)(random_int(100000,999999).$this->deCode($_GET['uid']).(string)(random_int(100000,999999);
        $this->userDb->birthday = date('Y-m-d');
        $this->userDb->surname = $_GET['last_name'];
        $this->userDb->login = $_GET['first_name'].'_'.$_GET['uid'];
        $this->userDb->about = ' ';
        $this->userDb->phone = ' ';
        $this->userDb->name = $_GET['first_name'];
        $this->userDb->city = 'Ярославль';
        $this->userDb->mail = $_GET['uid'] . '@islandgift.ru';
        $this->userDb->sex = 3;

        $this->userDb->login = str_replace(' ','_',$this->userDb->login);

        $dir = 'user/avatar/' . $this->userDb->login;
        $photo = $_GET['photo'];
        $photos = explode('/', $photo);
        $uploadFile = $dir . basename($photos[6]);
        $this->userDb->img = $uploadFile;

        $this->notSqlIngection();
        $this->userDb->selectUser(0);

        if (!$this->userDb->id) {
            $this->userDb->insertUser();

            if (!copy($photo, $uploadFile)) {
                $fileError = fopen('error/user.log', 'a');
                $text = ' ';
                $text .= date('Y-m-d H:i:s');
                $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                $text .= $this->userDb->login . ' mail: ' . $this->userDb->mail;
                $text .= "Ошибка загрузки файла.\n";
                fwrite($fileError, $text);
                fclose($fileError);
            }
        }

        $this->avtVk($this->userDb->login);
        return '<script>document.location.href = \'/you\';</script>';
    }

    public function registration(): string
    {
        $info = new SplFileInfo($_FILES['img']['name']);
        $imageStatus = false;

        switch (mb_strtolower($info->getExtension())) {
            case 'png':
                $imageStatus = true;
                break;
            case 'jpg':
                $imageStatus = true;
                break;
            case 'jpeg':
                $imageStatus = true;
                break;
            case 'ico':
                $imageStatus = true;
                break;
            case 'svg':
                $imageStatus = true;
                break;
        }

        if ($imageStatus) {
            $this->userDb->login = $_POST['login'];
            $this->userDb->password = $this->deCode($_POST['password']);

            $this->userDb->name = $_POST['name'];
            $this->userDb->surname = $_POST['surname'];
            $this->userDb->patronymic = $_POST['patronymic'] ?? ' ';

            $this->userDb->sex = $_POST['sex'];
            $this->userDb->birthday = $_POST['birthday'];
            $this->userDb->city = $_POST['city'];
            $this->userDb->about = $_POST['about'] ?? ' ';

            $this->userDb->mail = $_POST['mail'];
            $this->userDb->phone = $_POST['phone'] ?? ' ';

            $dir = 'user/avatar/' . $this->userDb->login;
            $uploadFile = $dir . basename($_FILES['img']['name']);
            $this->userDb->img = $uploadFile;

            $this->notSqlIngection();
            $this->userDb->selectUser(0);

            if (!$this->userDb->id) {
                $this->userDb->insertUser();

                if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
                    $fileError = fopen('error/user.log', 'a');
                    $text = ' ';
                    $text .= date('Y-m-d H:i:s');
                    $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                    $text .= $this->userDb->login . ' mail: ' . $this->userDb->mail;
                    $text .= "Ошибка загрузки файла.\n";
                    fwrite($fileError, $text);
                    fclose($fileError);
                }

                $this->avt($this->userDb->login, $_POST['password']);
                return '<script>document.location.href = \'/you\';</script>';
            }

            return '<script>alert(\'Данное имя занято\');</script>';
        }

        return '<script>alert(\'Данный тип файла не поддерживается! Используйте картинку!\');</script>';
    }

    public function updateUserInfo($dataPost): string
    {
        $this->userDb->name = $dataPost['newName'];
        $this->userDb->surname = $dataPost['surname'];
        $this->userDb->patronymic = $dataPost['patronymic'];
        $this->userDb->sex = $dataPost['sex'];
        $this->userDb->city = $dataPost['city'];
        $this->userDb->birthday = $dataPost['birthday'];
        $this->userDb->about = $dataPost['about'];
        $this->userDb->mail = $dataPost['mail'];
        $this->userDb->phone = $dataPost['phone'];

        $fileNew = $dataPost['file'];

        if ($fileNew != -1 || $fileNew != '-1') {

            $filePrev = 'user/tmp/' . $fileNew;
            $fileNew = 'user/avatar/' . $this->userDb->login . '' . $fileNew;

            if (copy($filePrev, $fileNew)) {
                unlink($this->userDb->img);
                unlink($filePrev);
                $this->userDb->img = $fileNew;
            }
        }

        $this->notSqlIngection();
        $res = $this->userDb->updateUser();

        setcookie('idSession', $this->userDb->id, 0, '/');
        setcookie('userSession', $this->userName, 0, '/');
        setcookie('fullnameSession', $this->fullName(), 0, '/');
        setcookie('lessnameSession', $this->lessName(), 0, '/');
        setcookie('avtSession', true, 0, '/');

        return '{"status":"' . $res[0] . '","msg":"' . $res[1] . '"}';
    }

    public function newPassword($pass): void
    {
        $this->userDb->password = $this->deCode($pass);
        $this->userDb->updateUser();
    }

    public function logIn(): array
    {
        $login = $_POST['login'];
        $pass = $_POST['password'];
        $res = $this->avt($login, $pass);
        $data = [];

        if ($res == 0) {
            $data[] = 1;
            $data[] = '<script>document.location.href= \'/you\';</script>';
        } else if ($res == 1) {
            $data[] = 0;
            $data[] = '<script>alert(\'Неверный логин или пароль!\');</script>';
        }

        return $data;
    }

    public function deCode($pass)
    {
        return password_hash($pass, PASSWORD_DEFAULT, ['cost' => 14]);
    }

    public function enCode(): void
    {
    }

    public function avt($user, $pass, $passwordHash = false): int
    {
        $this->exitAvt();
        $this->userDb->login = $user;
        $find = ["\n", "\"", "'", '--'];
        $replase = ["\\n", "\\\"", "\'", ''];
        $this->userDb->login = str_replace($find, $replase, $this->userDb->login);
        $this->userDb->selectUser();

        if ($this->userDb->id) {

            if ($passwordHash == true) {
                $verification = ($pass == $this->userDb->password) ? 1 : 0;
            } else {
                $verification = password_verify($pass, $this->userDb->password);
            }

            if ($verification) {
                $this->userName = $this->userDb->login;
                $this->name = $this->userDb->name;
                $this->surname = $this->userDb->surname;
                $this->patronymic = $this->userDb->patronymic;
                $this->avtTriger = true;

                setcookie('idSession', $this->userDb->id, 0, '/');
                setcookie('userSession', $this->userName, 0, '/');
                setcookie('fullnameSession', $this->fullName(), 0, '/');
                setcookie('lessnameSession', $this->lessName(), 0, '/');
                setcookie('avtSession', true, 0, '/');
                return 1;
            }
            return 0;
        }
        return 3;
    }

    public function avtVk($user): int
    {
        if ($user) {

            $this->userName = $this->userDb->login;
            $this->name = $this->userDb->name;
            $this->surname = $this->userDb->surname;
            $this->patronymic = $this->userDb->patronymic;
            $this->avtTriger = true;

            setcookie('idSession', $this->userDb->id, 0, '/');
            setcookie('userSession', $this->userName, 0, '/');
            setcookie('fullnameSession', $this->fullName(), 0, '/');
            setcookie('lessnameSession', $this->lessName(), 0, '/');
            setcookie('avtSession', true, 0, '/');

            return 1;
        }
        return 3;
    }

    public function exitAvt(): void
    {
        setcookie('idSession', '', time() - 3600, '/');
        setcookie('userSession', '', time() - 3600, '/');
        setcookie('fullnameSession', '', time() - 3600, '/');
        setcookie('lessnameSession', '', time() - 3600, '/');
        setcookie('avtSession', '', time() - 3600, '/');
    }

    public function userInfo(): array
    {
        $result = [];

        if ($this->avtTriger == true) {

            if ($this->userDb->admin == 1)
                $result[] = 3;
            else
                $result[] = 1;

            $result[] = $this->userName;
            $result[] = $this->fullName();
            $result[] = 'Выход';
        } else {
            $result[] = 0;
            $result[] = 'Войти/Регистрация';
            $result[] = 'Вы не авторизованны!\nЗарегистрируйтесь и попробуйте зайти еще раз.';
            $result[] = '';
        }

        return $result;
    }

    public function fullName(): string
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }

    public function lessName(): string
    {
        $text = $this->name . ' ' . mb_substr($this->surname, 0, 1) . '.';

        if ($this->patronymic)
            $text .= ' ' . mb_substr($this->patronymic, 0, 1) . '.';

        $text .= '';
        return $text;
    }

    public function restorePass($dataPost): array
    {
        $this->userDb->login = $dataPost['login'];
        $this->userDb->name = $dataPost['userName'];
        $this->notSqlIngection();
        $sql = 'SELECT l.password,u.name,l.mail FROM user u INNER JOIN login l ON l.id = u.login WHERE l.login = "' . $this->userDb->login . '" ORDER BY u.id LIMIT 1';
        $datas = $this->userDb->select($sql);
        $trigger = 0;

        if ($datas && mysqli_num_rows($datas)) {
            $data = mysqli_fetch_array($datas, MYSQLI_NUM);
            $this->userDb->password = $data[0];
            $this->userDb->mail = $data[2];

            if ($this->userDb->name == $data[1]) {
                $this->userDb->name = $data[1];
                $trigger = 1;
            }

            mysqli_free_result($datas);
        }
        $result = [];
        $result[1] = $trigger;
        $result[2] = $this->userDb->login;
        $result[3] = $this->userDb->name;
        $result[4] = $trigger ? $this->userDb->password : '';
        $result[5] = $trigger ? $this->userDb->mail : '';
        return $result;
    }
}