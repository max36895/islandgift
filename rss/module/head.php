<?php
header('Content-Type: text/xml; charset=UTF-8');
$params = include __DIR__.'/../../kernel/param/PageParam.php';
return "<?xml version=\"1.0\" encoding=\"utf-8\"?>
<rss xmlns:yandex=\"http://news.yandex.ru\" xmlns:media=\"http://search.yahoo.com/mrss/\"
     xmlns:turbo=\"http://turbo.yandex.ru\" version=\"2.0\">

    <channel>
        <title>" . $params['']['title'] . "</title>
        <link>https://www.islandgift.ru/</link>
        <description>" . $params['']['description'] . "</description>
        <language>ru</language>
        <author>Maximko</author>
        <yandex:analytics type=\"Yandex\" id=\"47399530\"/>
";