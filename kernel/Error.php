<?php
require_once 'Connect.php';

class ErrorSite
{
    private $db;
    public $id;

    public function __construct()
    {
        $this->db = new Connect();
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function selectError()
    {
        if ($this->db->getError()[0] == 1) {
            return $this->db->select(' *  ', ' `error` ', ' WHERE status = 0 ORDER BY dateIn DESC');
        }
        return 0;
    }

    public function updateError()
    {
        if ($this->db->getError()[0] == 1) {
            $dateOut = date('Y-m-d');
            return $this->db->update(' `error` ', '`dateOut` = "' . $dateOut . '", `status` = 1', ' id = ' . $this->id . '');
        }
        return 0;
    }

    public function insertError($fileError): void
    {
        if ($this->db->getError()[0] == 1) {
            $dateIn = date('Y-m-d');
            $login = $_POST['login'];
            $name = $_POST['name'];
            $error = $_POST['error'];
            $mail = $_POST['mail'];
            $into = ' `error`(`name`,`login`,`error`,`mail`,`dateIn`,`dateOut`,`img`,`status`)';
            $value = '("' . $name . '","' . $login . '","' . $error . '","' . $mail . '","' . $dateIn . '","000-00-00","' . $fileError . '",0)';
            $this->db->insert($into, $value);
        }
    }
}

$referer = '';

if (isset($_SERVER['HTTP_REFERER'])) {
    $referer = $_SERVER['HTTP_REFERER'];
}

$referer = strstr($referer, '/siteerror');

if ($referer == '/siteerror') {
    $fileError = '';

    if (isset($_FILES['img'])) {
        if ($_FILES['img']['name']) {
            $dir = '../error/' . date('d-m-Y h:m:s') . '_' . random_int(0, 36895) . '_';
            $fileError = $dir . basename($_FILES['img']['name']);

            if (!move_uploaded_file($_FILES['img']['tmp_name'], $fileError)) {
                $fileError = fopen('../error/error.log', 'a');
                $text = ' ';
                $text .= date('Y-m-d H:i:s');
                $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                $text .= "Ошибка загрузки файла.\n";
                fwrite($fileError, $text);
                fclose($fileError);
            }

            unset($_FILES);
        }
    }

    if ($_POST) {
        $error = new ErrorSite();

        $error->insertError($fileError);
        unset($_POST);

        echo '<script>document.location.href = "/siteerror/thanks"</script>';
    }
}