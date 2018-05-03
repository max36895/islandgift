<?php
if ($_SERVER['HTTP_HOST'] != $_SERVER['SERVER_NAME']) {

    header('HTTP/1.0 404 Not Found');
    header('Status: 404 Not Found');
    echo '{"status":"0","msg":"Несанкционированный доступ! Атата"}';

} else {
    // отправка сообщения
    function send($from, $replyTo, $subject, $mess, $triggerTo = false)
    {
        require_once 'script/vendor/autoload.php';
        $params = [
            'replyTo' => $replyTo,
            'subject' => $subject,
            'to' => $triggerTo ? $replyTo : 'max36895@gmail.com'
        ];

        $mailParams = [];
        $mailParams['body'] = '';
        $mailParams['subject'] = $params['subject'];
        $mailParams['to'] = $params['to'];
        $mailParams['replyTo'] = $params['replyTo'];

        $message = (new \Swift_Message())
            ->setSubject($subject)
            ->setReplyTo($mailParams['replyTo'])
            ->setFrom($from)
            ->setTo($mailParams['to'])
            ->setBody($mailParams['body'] . $mess, 'text/html');

        $transport = (new \Swift_SmtpTransport('smtp.mail.ru', 587, 'tls'))
            ->setUsername('max18071995@mail.ru')
            ->setPassword('max1807199536895');

        $transport->setLocalDomain(gethostname());

        $mailer = new \Swift_Mailer($transport);

        $logger = new \Swift_Plugins_Loggers_ArrayLogger();
        $mailer->registerPlugin(new \Swift_Plugins_LoggerPlugin($logger));

        try {
            if ($result = $mailer->send($message)) {
                return 1;
            }

            return 0;
        } catch (\Swift_TransportException $e) {
            $fileName = 'error/';
            $fileName .= time();
            $fileName .= random_int(1, 99);
            $fileName .= '.txt';

            $file = fopen($fileName, 'a');
            fwrite($file, $e->getMessage() . "\n" . $message . "\n===================================================\n");
            fclose($file);
            return 0;
        }
    }

    function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    //если пользователь меняет фото
    if ($_FILES) {

        if (0 < $_FILES['file']['error']) {
            echo '{"Error": "' . $_FILES['file']['error'] . '","file":"-1"}';
        } else {
            $fileName = $_FILES['file']['name'];

            $info = new SplFileInfo($_FILES['file']['name']);
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
                $fileDir = 'user/tmp/' . $_FILES['file']['name'];

                move_uploaded_file($_FILES['file']['tmp_name'], $fileDir);
                echo '{"file":"' . $fileName . '"}';
            } else {
                echo '{"Error": "Данный тип файла не поддерживается! Используйте картинку!","file":"-1"}';
            }

        }

    }

    if ($_POST) {

        $dataPost = json_decode($_POST['data'], 1);

        switch ($dataPost['name']) {
            case 'avt':
                $login = $dataPost['data'];

                require_once 'kernel/Authorization.php';
                $avt = new Authorization();

                $avt = $avt->isLogin($login);
                echo $avt;
                break;
            case 'Authorization':

                require_once 'kernel/Authorization.php';
                $avt = new Authorization();
                $res = $avt->avt($dataPost['avtLogin'], $dataPost['avtPassword']);
                $data = '/you';

                if ($avt->userDb->admin)
                    $data = '/kernel/siteadminka';

                echo '{"status":"' . $res . '","href":"' . $data . '"}';

                break;
            case 'newPassword':

                require_once 'kernel/Authorization.php';
                $avt = new Authorization();

                if ($avt->avtTriger) {
                    $avt->newPassword($dataPost['pass']);
                    echo '{"msg":"Пароль успешно изменен"}';
                } else
                    echo '{"msg":"Ошибка при изменении пароля"}';

                break;
            case 'updateUserData':

                require_once 'kernel/Authorization.php';
                $avt = new Authorization();

                echo $avt->updateUserInfo($dataPost);

                break;
            case 'restorePass':

                require_once 'kernel/Authorization.php';
                $restore = new Authorization();

                $result = $restore->restorePass($dataPost);
                $status = '';
                $msg = '';

                if ($result[1] == 0) {
                    $status = '0';
                    $msg = 'Данного пользователя не существует!';
                } else {
                    $status = '1';
                    $emailTo = $result[5];
                    $userName = $dataPost['userName'];
                    $mail = 'info@island.ru';
                    $userMess = $dataPost['userMessage'];

                    $message = '<h1>Восстановление пароля на сайте <a href="https://www.islandgift.ru">islandgift.ru</a></h1>';
                    $message .= '<h2>Уважаемый, ' . $result[3] . '</h2><p>Для восстановления вашего пароля перейдите по следующей ссылке ';
                    $message .= '<a href="https://www.islandgift.ru/restorepass.php?login=' . $result[2] . '&urluser=' . $result[4] . '">ссылка</a><br>Благодарим что пользуетесь нашими услугами.<br>С наилучшими пожеланиями Maximko.</p>';

                    if (send($mail, $emailTo, 'Восстановление пароля', $message, true)) {
                        $msg = 'На вашу почты было высланно сообщение с дальнейшими действиями.';
                    } else {
                        $status = 3;
                        $msg = 'Не удалось отправить сообщение на вашу почту.<br>Cвяжитесь с нами или попробуйте еще раз.';
                    }

                }
                echo '{"status":' . $status . ',"msg":"' . $msg . '"}';
                break;
            case 'exit':

                require_once 'kernel/Authorization.php';
                $avt = new Authorization();

                $avt->exitAvt();
                echo '{"status":"1"}';

                break;

            case 'reviews':

                $emailTo = 'max18071995@mail.ru';
                $userName = $dataPost['userName'];
                $userMail = $dataPost['userMail'];
                $userMess = $dataPost['userMessage'];

                if (($userMail != '') && ($userMess != '' && $userName != '') && isEmail($userMail)) {
                    $message = '<h2>Отзыв</h2>';
                    $message .= '<table border="1">';
                    $message .= '<tr><td>Имя:</td><td>' . $userName . '</td></tr><tr><td>Почта:</td><td>' . $userMail . '</td></tr><tr><td>Сообщение:</td><td>' . $userMess . '</td></tr>';
                    $message .= '</table>';

                    $fileName = 'script/mail/';
                    $fileName .= time();
                    $fileName .= random_int(1, 99);
                    $fileName .= '.txt';

                    $file = fopen($fileName, 'a');
                    fwrite($file, $message);
                    fclose($file);

                    if (send($emailTo, $userMail, 'Отзыв с сайта', $message)) {
                        echo '{"status":"1","mail":"' . $userMail . '"}';
                    } else {
                        echo '{"status": "0"}';
                    }

                } else {
                    echo '{"status":"0"}';
                }

                break;
            case 'reviewsOrder':

                $emailTo = 'max18071995@mail.ru';
                $userName = $dataPost['userName'];
                $userMail = $dataPost['userMail'];
                $userOrder = $dataPost['orderNumber'];
                $userMess = $dataPost['userMessage'];

                if (($userMail != '') && ($userMess != '' && $userName != '') && isEmail($userMail)) {
                    $message = '<h2>Отзыв на товар</h2>';
                    $message .= '<table border="1">';
                    $message .= '<tr><td>Имя:</td><td>' . $userName . '</td></tr><tr><td>Почта:</td><td>' . $userMail . '</td></tr><tr><td>Номер заказа:</td><td>' . $userOrder . '</td></tr><tr><td>Сообщение:</td><td>' . $userMess . '</td></tr>';
                    $message .= '</table>';

                    $fileName = 'script/mail/';
                    $fileName .= time();
                    $fileName .= random_int(1, 99);
                    $fileName .= '.txt';

                    $file = fopen($fileName, 'a');
                    fwrite($file, $message);
                    fclose($file);

                    if (send($emailTo, $userMail, 'Отзыв с сайта', $message)) {

                        require_once 'kernel/Reviews.php';
                        $reviews = new Reviews();

                        $reviews->userId = $dataPost['userId'];

                        if (!$reviews->userId) {
                            $reviews->userId = 0;
                        }

                        $reviews->comment = $userMess;
                        $reviews->userName = $userName;
                        $reviews->order = $userOrder;

                        if (!$reviews->order) {
                            $reviews->order = 0;
                        }

                        $reviews->publication = 1;
                        $reviews->insert();
                        echo '{"status":"1","mail":"' . $userMail . '"}';
                    } else {
                        echo '{"status": "0"}';
                    }
                } else {
                    echo '{"status":"0"}';
                }

                break;

            case 'orderAdd':

                $id = $dataPost['id'];
                $price = $dataPost['price'];
                $img = $dataPost['img'];
                $name = $dataPost['nameP'];
                $res = [0, 0, 0, 0, 0];

                require_once 'kernel/SITE.php';
                $prod = new Product();

                $res = $prod->orderAddproduct($id, $price, $img, $name);
                echo '{"state":"1","price":"' . $res[0] . '","count":"' . $res[1] . '","idPrice":"' . $res[2] . '","idCount":"' . $res[3] . '","idText":"' . $res[4] . '","statusOrder":"' . $res[5] . '"}';

                break;
            case 'orderRemove':

                $id = $dataPost['id'];
                $price = $dataPost['price'];
                $res = [0, 0, 0, 0, 0];

                require_once 'kernel/SITE.php';
                $prod = new Product();

                $res = $prod->orderRemoveProduct($id, $price);
                echo '{"state":"1","price":"' . $res[0] . '","count":"' . $res[1] . '","idPrice":"' . $res[2] . '","idCount":"' . $res[3] . '","idText":"' . $res[4] . '"}';

                break;
            case 'orderRemoveProduct':

                $id = $dataPost['id'];
                $price = $dataPost['price'];

                require_once 'kernel/SITE.php';
                $prod = new Product();

                $res = $prod->orderRemoveProductAll($id, $price);
                echo '{"state":"1","price":"' . $res[0] . '","count":"' . $res[1] . '","idPrice":"' . $res[2] . '","idCount":"' . $res[3] . '","idText":"' . $res[4] . '"}';

                break;
            case 'orderRemoveAll':

                require_once 'kernel/SITE.php';
                $prod = new Product();

                $prod->orderRemoveAllProduct();
                echo '{"state":"1","price":"0"}';

                break;
            case 'isOrder':

                require_once 'kernel/SITE.php';
                $prod = new Product();

                $res = $prod->isOrderCache();
                $user = new SITE();

                echo '{"state":"1","price":"' . $res[0] . '","count":"' . $res[1] . '","userStart":"' . $user->startUser() . '"}';

                break;
            case 'createOrder':

                $emailTo = 'max18071995@mail.ru';
                $userName = $dataPost['orderName'];
                $userMail = $dataPost['orderMail'];
                $userMess = $dataPost['orderMess'];
                $shipping = $dataPost['shipping'];

                require_once 'kernel/Product.php';
                require_once 'kernel/Authorization.php';
                $prod = new Product();

                $avt = new Authorization();
                $prod->userId = $avt->userDb->id;
                $prod->state = 1;
                $prod->shipping = $shipping;
                $prod->comment = $userMess;
                $prod->name = $userName;
                $prod->mail = $userMail;

                if (($userMail != '') && $prod->isOrder() && isEmail($userMail)) {
                    $productAll = $prod->getOrderTmp();

                    $message = '<h2>Покупка с сайта</h2>';
                    $message .= '<table border="1">';
                    $message .= '<tr><td>Имя:</td><td>' . $userName . '</td></tr><tr><td>Почта:</td><td>' . $userMail . '</td></tr><tr><td>Сообщение:</td><td>' . $userMess . '</td></tr>';
                    $message .= '</table>';

                    $message .= '<br><br><table border="1"><tr><td>Товар</td><td>Количество</td><td>Цена</td><td>Изображение</td></tr>';
                    $countAll = $productAll[0][7];

                    if ($shipping == 1)
                        $shipping = 300;
                    else
                        $shipping = 0;

                    $prod->fullPrice = $productAll[0][6] + $shipping;
                    $priceAll = $productAll[0][6] + $shipping;

                    foreach ($productAll as $product) {
                        $message .= '
                        <tr>
                            <td>' . $product[4] . '</td>
                            <td>' . $product[2] . '</td>
                            <td>' . $product[5] . '</td>
                            <td><img src="https://islandgift.ru/' . $product[3] . '" style="width: 50%"></td>
                        </tr>';
                    }

                    $message .= '
                    <tr>
                        <td> </td>
                        <td>' . $countAll . '</td>
                        <td>' . $priceAll . '</td>
                        <td></td>
                    </tr>
                    </table>';

                    $fileName = 'script/mail/';
                    $fileName .= time();
                    $fileName .= random_int(1, 99);
                    $fileName .= '.txt';

                    $file = fopen($fileName, 'a');
                    fwrite($file, $message);
                    fclose($file);

                    if (send($emailTo, $userMail, 'Покупка', $message)) {
                        $prod->orderRemoveAllProduct();
                        echo '{"status":"' . $prod->insertOrder() . '","mail":"' . $userMail . '"}';
                    } else {
                        echo '{"status": "0"}';
                    }

                } else {
                    echo '{"status":"0","msg":"Не правильно введена почта!<br>Либо ваш заказ пустой!<br>Перепроверьте данные"}';
                }

                break;

            case 'generateGift':

                require_once 'kernel/SITE.php';
                $prod = new Product();

                echo $prod->generateGift($dataPost);

                break;
            case 'findProduct':

                require_once 'kernel/SITE.php';
                $prod = new Product();

                echo $prod->printGift($dataPost);

                break;
            case 'weather':

                $url = 'http://api.openweathermap.org/data/2.5/forecast?id=468902&APPID=ec054f895d32d7474a92e07fd6629d89&units=metric&cnt=7&lang=ru';
                $data = file_get_contents($url);
                $data = json_decode($data, 1);

                $temp_min = 0;
                $temp_max = 0;
                $temp = 0;

                if (isset($data['list'][0]['main']['temp_min'])) {

                    $temp_min = $data['list'][0]['main']['temp_min'];
                    $temp_max = $data['list'][0]['main']['temp_max'];
                    $temp = $data['list'][0]['main']['temp'];

                    $param = $temp . ';' . $temp_min . ';' . $temp_max;

                    $file = fopen('weather/weather.txt', 'w');
                    fwrite($file, $param);
                    fclose($file);

                } else {
                    $file = fopen('weather/weather.txt', 'r');

                    if ($file) {
                        while ($text = fgets($file, 4096)) {
                            $text = explode(';', $text);
                            $temp = $text[0];
                            $temp_min = $text[1];
                            $temp_max = $text[2];
                        }
                    }
                }
                $temp = explode('.', $temp);
                $temp = $temp[0];

                $msg = 'Сегодня в Ярославле ' . $temp . '°';

                if ($temp_min <= -30)
                    $msg = 'Сегодня на улице очень холодно(' . $temp . '°).<br>Посидите лучше дома.😁';
                else if ($temp_min <= -20)
                    $msg = 'Сегодня на улице холодно(' . $temp . '°).<br>Одевайтесь тепло.';
                else if ($temp_min < -10)
                    $msg = 'Сегодня на улице прохладно(' . $temp . '°).<br>Одевайтесь теплее.';

                if ($temp_max >= 30)
                    $msg = 'Сегодня на улице очень жарко(' . $temp . '°).<br>Определенно нужно взять мороженку.';
                else if ($temp_max >= 20)
                    $msg = 'Сегодня на улице жарко(' . $temp . '°).<br>Отличный повод искупаться.✌';
                else if ($temp_max > 10)
                    $msg = 'Сегодня на улице тепло(' . $temp . '°).<br>Сходите погулять.';

                echo '{"msg":"' . $msg . '"}';

                break;
        }

    } else
        if (!$_FILES) {
            echo "<script>document.location.href = '/404';</script>";
        }
}