<?php
function fileName($trigger = 0, $mail = '', $success = 'success')
{
    $date = date('d-m-Y_h');
    $minutes = date('m');
    $seconds = (int)date('s');
    $seconds /= 10;
    $dir = 'yandex/' . $success;

    if (isset($mail) && ($mail != '' || $mail != ' ')) {
        return $dir . '/' . $date . '_' . $mail . '.log';
    }

    if ($trigger) {

        $files = scandir($dir, 1);
        return $files[0];

    } else
        return $dir . '/' . $date . '-' . $minutes . '-' . $seconds . '.log';
}

if ($_POST) {
    if (isset($_POST['notification_type'], $_POST['amount'])) {
        $texts = '';
        $sha = $_POST['notification_type'] . '&' . $_POST['operation_id']
            . '&' . $_POST['amount'] . '&' . $_POST['currency'] . '&' . $_POST['datetime'] . '&' . $_POST['sender']
            . '&' . $_POST['codepro'] . '&&' . $_POST['label'];

        $texts = sha1($sha) . ';';
        $texts .= $_POST['sha1_hash'] . ';';

        $texts .= $_POST['notification_type'] . ';';
        $texts .= ($_POST['operation_id'] ?? 0) . ';';
        $texts .= $_POST['amount'] . ';';
        $texts .= ($_POST['withdraw_amount'] ?? 0) . ';';
        $texts .= $_POST['datetime'] . ';';
        $texts .= ($_POST['unaccepted'] ?? 0) . ';';
        $texts .= $_POST['lastname'] . ';';
        $texts .= $_POST['firstname'] . ';';
        $texts .= $_POST['fathersname'] . ';';
        $texts .= $_POST['email'] . ';';
        $texts .= $_POST['label'] ?? ' ';

        $file = fopen(fileName(0, $_POST['email']), 'a');
        fwrite($file, $texts);
        fclose($file);
    } else {
        $date = date('d-m-Y_h');
        $texts = 'Ошибка';
        $sha = $_POST['notification_type'] . '&' . $_POST['operation_id']
            . '&' . $_POST['amount'] . '&' . $_POST['currency'] . '&' . $_POST['datetime'] . '&' . $_POST['sender']
            . '&' . $_POST['codepro'] . '&&' . $_POST['label'];

        $texts .= sha1($sha) . "\n";
        foreach ($_POST as $k => $v) {
            $text .= $k . '->' . $v . "\n";
        }
        $file = fopen(fileName(0, $_POST['email'], 'error'), 'a');
        fwrite($file, $texts);
        fclose($file);
        echo "<script>document.lacation.href='/404'</script>";
    }
}

if ($_GET) {
    if (isset($_GET['id'], $_GET['price'], $_GET['mail'], $_GET['name'])) {

        $price = $_GET['price'];
        $orderId = $_GET['id'];
        $mail = $_GET['mail'];
        $name = $_GET['name'];

        if (is_numeric($orderId)) {

            require_once 'Order.php';
            $order = new Order();
            $order->id = $orderId;
            $order->selectOrderWhere('WHERE id=' . $order->id);

            if ($order->fullPrice == $price) {

                $order->state = 1;
                $date = date('d-m-Y_h');
                $file = fopen(fileName(1, $mail), 'r');

                if (!$file)
                    $file = fopen(fileName(1), 'r');

                if ($file) {
                    while ($text = fgets($file, 4096)) {

                        $text = explode(';', $text);

                        if ($text[0] == $text[1]) {
                            $userPrice1 = $text[4];
                            $userPrice2 = $text[5];

                            if ($price == $userPrice1 || $price == $userPrice2) {

                                $order->updateOrder();
                                fclose($file);
                                echo "<script>document.location.href='/success.php?name=" . $name . '&mail=' . $mail . "'</script>";

                            } else
                                echo "<script>document.location.href='/payerror'</script>";

                        } else {

                            $errorFile = fopen('yandex/error.log', 'a');
                            $text = ' ';
                            $text .= date('Y-m-d H:i:s');
                            $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                            $text .= 'sha1_yandex->' . $text[1] . ' sha1_result->: ' . $text[0];
                            $text .= "Ошибка транзакции.\n";
                            fwrite($errorFile, $text);
                            fclose($errorFile);
                            echo "<script>document.location.href='/payerror'</script>";

                        }
                    }
                } else {

                    $errorFile = fopen('yandex/error.log', 'a');
                    $text = ' ';
                    $text .= date('Y-m-d H:i:s');
                    $text .= ' ; ' . $_SERVER['REMOTE_ADDR'] . ';' . $_SERVER['HTTP_USER_AGENT'];
                    $text .= "Ошибка Файл не найден.\n";
                    fwrite($errorFile, $text);
                    fclose($errorFile);
                    echo "<script>document.location.href='/payerror'</script>";

                }
            } else
                echo "<script>document.location.href='/payerror'</script>";

        }
    } else
        echo "<script>document.lacation.href='/404'</script>";
}