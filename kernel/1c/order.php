<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="order.export"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

include '../SITE.php';
$order = new Order();
$datas = $order->selectAllOrder();

$result = '';
$trigger = false;

if ($datas) {
    while ($data = mysqli_fetch_array($datas, MYSQLI_NUM)) {
        if ($trigger) {
            $result .= "$\n";
        } else {
            $trigger = true;
        }
        $status = 'доставлен';
        if ($data[4] == 1) {
            $status = 'Не оплачен';
        } else if ($data[4] == 2) {
            $status = 'оплачен';
        }
        $result .= $data[8] . '_' . str_replace(['_'], ['?*'], $data[9]) . '_' . $status . '_доставка ' . ($data[6] ? 'нужна' : 'не нужна') . '_';
        $result .= str_replace(['<br>', '_'], ' ', $data[7]) . '_' . $data[2] . '_' . $data[3] . '#';
        $order->id = $data[0];
        $products = $order->selectAllGiftOrder();
        if ($products) {
            $triggerProduct = false;
            while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
                if ($triggerProduct) {
                    $result .= ':';
                } else {
                    $triggerProduct = true;
                }
                $result .= substr_replace('&', ' and ', $product[9]) . '&' . $product[11] . '&' . $product[12];
            }
            mysqli_free_result($products);
        }
    }
    mysqli_free_result($datas);
}
echo $result;

file_get_contents('php://output');