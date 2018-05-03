<?php

class Connect
{
    public $fromName;
    public $where;
    public $data = [];
    public $column;

    private $host;
    private $database;
    private $user;
    private $pass;

    private $dbconnect;
    protected $error = [];

    public function __construct()
    {
        $this->error[0] = 1;
        $this->error[1] = '';
        $this->host = '';
        $this->user = '';
        $this->pass = '';
        $this->database = '';

        $this->dbconnect = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        if ($this->dbconnect->connect_errno) {
            $this->error[0] = 0;
            $this->error[1] = 'Ошибка связи.\nПопробуйте позднеее или позвоните нам.';
            $fileError = fopen('error/error.log', 'a');

            $text = ' ';
            $text .= date('Y-m-d H:i:s');
            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
            $text .= 'Ошибка подключения.' . "Не удалось подключиться: %s\n" . $this->dbconnect->connect_error;

            fwrite($fileError, $text);

            fclose($fileError);
            exit();
        }

        mysqli_query($this->dbconnect, 'SET NAMES utf8');
    }

    public function getError(): array
    {
        return $this->error;
    }

    public function setParam($fHost, $fDatabase, $fUser, $fPass): void
    {
        $this->close();
        $this->error[0] = 1;
        $this->error[1] = '';
        $this->host = $fHost;
        $this->user = $fUser;
        $this->pass = $fPass;
        $this->database = $fDatabase;

        $this->dbconnect = mysqli_connect($this->host, $this->user, $this->pass, $this->database);

        if ($this->dbconnect->connect_errno) {
            $this->error[0] = 0;
            $this->error[1] = 'Ошибка связи.\nПопробуйте позднеее или позвоните нам.';
            $fileError = fopen('error/error.log', 'a');

            $text = ' ';
            $text .= date('Y-m-d H:i:s');
            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
            $text .= 'Ошибка подключения.' . "Не удалось подключиться: %s\n" . $this->dbconnect->connect_error;

            fwrite($fileError, $text);

            fclose($fileError);
            exit();
        }

        mysqli_query($this->dbconnect, 'SET NAMES utf8');
    }

    public function select($select, $table, $param = '')
    {
        $sql = 'SELECT ' . $select . ' FROM ' . $table . ' ' . $param . ';';
        $res = mysqli_query($this->dbconnect, $sql) or trigger_error(mysqli_error($this->dbconnect) . ' in ' . $sql);
        return $res;
    }

    public function update($table, $set, $where = 1)
    {
        $sql = 'UPDATE ' . $table . ' SET ' . $set . ' WHERE ' . $where . ';';
        $res = mysqli_query($this->dbconnect, $sql) or trigger_error(mysqli_error($this->dbconnect) . ' in ' . $sql);
        return $res;
    }

    public function insert($into, $value)
    {
        $sql = 'INSERT INTO ' . $into . ' VALUE ' . $value . ';';
        $res = mysqli_query($this->dbconnect, $sql) or trigger_error(mysqli_error($this->dbconnect) . ' in ' . $sql);
        $sql = explode('(', $into);
        $res = $this->select(' id ', $sql[0], ' ORDER BY id DESC LIMIT 1 ');

        if ($res) {
            $data = mysqli_fetch_array($res, MYSQLI_NUM);
            $result = $data[0];
            mysqli_free_result($res);
            return $result;
        }

        return $res;
    }

    public function delete($table, $where = 1)
    {
        $sql = 'DELETE FROM ' . $table . ' WHERE ' . $where;
        $res = mysqli_query($this->dbconnect, $sql) or trigger_error(mysqli_error($this->dbconnect) . ' in ' . $sql);

        return $res;
    }

    public function query($sql)
    {
        $res = mysqli_query($this->dbconnect, $sql) or trigger_error(mysqli_error($this->dbconnect) . ' in ' . $sql);
        return $res;
    }

    public function close(): void
    {
        $this->dbconnect->close();
    }
}