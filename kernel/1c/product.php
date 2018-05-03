<?php
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="product.export"');
header('Cache-Control: max-age=0');
header('Cache-Control: max-age=1');
header('Expires: Mon, 26 Jul 1997 05:00:00 GMT');
header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT');
header('Cache-Control: cache, must-revalidate');
header('Pragma: public');

include '../SITE.php';
$productDb = new Product();

$products = $productDb->allGift();

$result = '';
$trigger = false;

if ($products) {
    while ($product = mysqli_fetch_array($products, MYSQLI_NUM)) {
        if ($trigger) {
            $result .= '$';
        } else {
            $trigger = true;
        }
        $result .= $product[1] . '_' . str_replace(['<br>', "\n", '$', '_'], ' ', $product[2]) . '_' . $product[4];
    }
    mysqli_free_result($products);
}

echo $result;


file_get_contents('php://output');