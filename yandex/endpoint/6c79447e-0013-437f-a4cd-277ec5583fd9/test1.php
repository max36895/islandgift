<?php
if($_POST){
    $dataPost = json_decode($_POST['data'], 1);
    $text = $dataPost['text'];
    $output = '{
  "meta": {
    "locale": "ru-RU",
    "timezone": "Europe/Moscow",
    "client_id": "ru.yandex.searchplugin/5.80 (Samsung Galaxy; Android 4.4)"
  },
  "request": {
     "type": "SimpleUtterance",
     "markup": {
        "dangerous_context": true
     },
     "command": "' . $text . '",
     "original_utterance": "' . $text . '",
     "payload": {}
  },
  "session": {
    "new": true,
    "session_id": "2eac4854-fce721f3-b845abba-20d60",
    "message_id": 4,
    "skill_id": "3ad36498-f5rd-4079-a14b-788652932056",
    "user_id": "AC9WC3DF6FCE052E45A4566A48E6B7193774B84814CE49A922E163B8B29881DC"
  },
  "version": "1.0"
}';
    if ($output) {
        require_once 'YandexAlisa.php';

        $yandex = new YandexAlisa();
        $yandex->isLog = false;
        echo $yandex->alisa($output);

    } else {
        echo 'Ok';
    }
}