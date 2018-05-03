<?php
class mailMessage
{
    protected function sendMessage($from, $replyTo, $subject, $mess)
    {
        require_once '../script/vendor/autoload.php';
        $params = [
            'replyTo' => $replyTo,
            'subject' => $subject,
            'to' => $replyTo
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
            ->setUsername('')
            ->setPassword('');

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
            $fileName = '../error/';
            $fileName .= time();
            $fileName .= random_int(1, 99);
            $fileName .= '.txt';

            $file = fopen($fileName, 'a');
            fwrite($file, $e->getMessage() . "\n" . $message . "\n===================================================\n");
            fclose($file);
            return 0;
        }
    }

    protected function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public function send()
    {
        $subject = 'Пришло время достойных подарков! У нас вы легко сможете найти хороший подарок';
        $message = '';

        $fileMail = fopen('mail/address.txt', 'r');
        if ($fileMail) {
            while ($address = fgets($fileMail, 2048)) {
                sleep(0);
                $address = str_replace(["\n", "\r", "\t"], '', $address);
                if ($this->isEmail($address)) {
                    $message = "<h1 style=\"text-align: center\">Добрый день, " . $address . "!</h1> <p> Вас приветствует Магазин подарков Maximko<br> Интернет-магазин подарков Max<span style=\"color: #8bc63e\">imko</span> – это то самое место, где вы всегда найдете море подарков🎁 на любой вкус и к каждому торжественному случаю🎈.<br> На страницах нашего сайта представлен большой ассортимент необычных товаров и сувениров✨<br> А также мы подбираем и упаковываем подарки за Вас😊 На нашем сайте вы можете найти всю необходимую информацию.<br> Или можете связаться с нами по любому вопросу, <br>мы обязательно вам поможем, и предложим хорошую идею для подарка😇<br> Мы приложим все усилия, для воплощения вашей задумки в жизнь.<br> </p> <h2>Наш сайт</h2> <a href=\"https://www.islandgift.ru\" style=\" cursor: pointer; color: #000; border-color: #8bc63e; background: #8bc63e; border-style: none; border-radius: 5px; display: inline-block; outline: 0; padding: 7px 14px; text-decoration: none; max-width: 100%; white-space: normal; word-wrap: break-word; font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif' !important; font-size: 16px !important; line-height: 162% !important; \">https://www.islandgift.ru</a> <h2 style=\"text-align: center\">Наш сервис✌</h2> <p> Всех рано или поздно мучил вопрос о том,что можно подарить своим близким или знакомым вам людям. Порой приходится сидеть в интернете и искать различные варианты для подарка. Иногда все сводится к тому, что было потрачено много времени и ресурсов на поиск подарка, а в итоге была найдена скудная и не интересная информация или совсем ничего не удалось найти. Порой находилась то, до чего вы и сами могли догадаться.В целях экономии Вашего времени и сил был создан данный сайт, а так же наш <a href=\"https://www.islandgift.ru/picking\">сервис по генерации подарков.</a> <br> Он позволит вам как минимум предложить идею для хорошего подарка, и как максимум приобрести его у нас. Если данный сервис предложил вам то,чего вы не хотели или не ожидали,то свяжитесь с нами. Мы постараемся подобрать хороший подарок для вас и тех, кого вы хотите порадовать.<br> Дарите близким радость и приятные воспоминания. <br> </p> <h2>Наш сервис для генерации подарков</h2> <a href=\"https://www.islandgift.ru/picking\" style=\" cursor: pointer; color: #000; border-color: #8bc63e; background: #8bc63e; border-style: none; border-radius: 5px; display: inline-block; outline: 0; padding: 7px 14px; text-decoration: none; max-width: 100%; white-space: normal; word-wrap: break-word; font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif' !important; font-size: 16px !important; line-height: 162% !important; \">https://www.islandgift.ru</a> <p> Если вам не сложно, то поучавствуйте в нашем <a href=\"https://www.islandgift.ru/survey\">опросе</a>. Также если у вас есть предложения или идеи по улучшению сайта, то напишите об этом нам.<br> Нам важно мнение каждого. Вместе мы сможем сделать сайт лучше.<br> </p> <h2>Опрос</h2> <a href=\"https://www.islandgift.ru/survey\" style=\" cursor: pointer; color: #000; border-color: #8bc63e; background: #8bc63e; border-style: none; border-radius: 5px; display: inline-block; outline: 0; padding: 7px 14px; text-decoration: none; max-width: 100%; white-space: normal; word-wrap: break-word; font-family: 'Roboto', 'Helvetica', 'Arial', 'sans-serif' !important; font-size: 16px !important; line-height: 162% !important; \">https://www.islandgift.ru</a> <h3>Мы в соц сетях😉</h3> <p> <span style=\"display: inline-block;vertical-align: middle\"> <a style=\" width: 40px; height: 40px; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; margin-right: 3px; margin-top: 0; margin-bottom: 3px; display: block; background: url(https://www.islandgift.ru/templates/c_bestday/img/social.png) no-repeat; background-size: auto !important; content: ''; text-decoration: inherit; display: inline-block; speak: none; line-height: normal; vertical-align: middle; color: #fff !important; background-position: left top; \" href=\"https://vk.com/islandgift\"> </a> </span> <span style=\"display: inline-block;vertical-align: middle\"> <a style=\" width: 40px; height: 40px; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; margin-right: 3px; margin-top: 0; margin-bottom: 3px; display: block; background: url(https://www.islandgift.ru/templates/c_bestday/img/social.png) no-repeat; background-size: auto !important; content: ''; text-decoration: inherit; display: inline-block; speak: none; line-height: normal; vertical-align: middle; color: #fff !important; background-position: -40px top; \" href=\"http://t.me/max36895\"> </a> </span> <span style=\"display: inline-block;vertical-align: middle\"> <a style=\" width: 40px; height: 40px; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; margin-right: 3px; margin-top: 0; margin-bottom: 3px; display: block; background: url(https://www.islandgift.ru/templates/c_bestday/img/social.png) no-repeat; background-size: auto !important; content: ''; text-decoration: inherit; display: inline-block; speak: none; line-height: normal; vertical-align: middle; color: #fff !important; background-position: -80px top;\" href=\"skype://live:max36895?chat\"> </a> </span><span style=\"display: inline-block;vertical-align: middle\"> <a style=\" width: 40px; height: 40px; border-radius: 3px; -webkit-border-radius: 3px; -moz-border-radius: 3px; margin-right: 3px; margin-top: 0; margin-bottom: 3px; display: block; background: url(https://www.islandgift.ru/templates/c_bestday/img/social.png) no-repeat; background-size: auto !important; content: ''; text-decoration: inherit; display: inline-block; speak: none; line-height: normal; vertical-align: middle; color: #fff !important; background-position: -120px top;\" href=\"https://api.whatsapp.com/send?phone=79092813520\"> </a> </span> </p> <p>Благодарим Вас за то что уделили Нам свое время. Надеемся что мы никак не отвлеки и не помешали Вам.<br> Всего Вам доброго и хорошей рабочей/учебной недели.<br> <span style=\"text-align: center;\">С наилучшими пожеланиями <a href=\"https://www.islandgift.ru/\">Maximko</a>.</span><br> </p>";
                    try {
                        $this->sendMessage('islandgift@mail.ru', $address, $subject, $message);
                    }catch (Exception $e){
                        $file = fopen('../error/messageError.txt','a');
                        fwrite($file,$e->getMessage());
                        fclose($file);
                    }
                }
            }
        }
    }

}